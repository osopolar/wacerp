<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JsonRpcUploadHelper
 *
 * according to the prototype of plupload upload script, provides upload methods
 *
 * @author ben
 * @time 12/24/2009 6:36:51 PM
 */
class JsonRpcUploadHelper {

    protected static $_instance = null;
    protected $_jsonRpcData = null;
    protected $_config     = array();
    protected $_chunk      = 0;
    protected $_chunks     = 0;
    protected $_fileName   = "";
    protected $_fileFirstName = "";
    protected $_fileNameExt = "";

    public static function getInstance() {
        $class = __CLASS__;
        if (is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct() {   // construct method
        @set_time_limit(3000);   // 50 minutes execution time

        $default = array(
            "targetDir" => sfConfig::get("sf_upload_dir_name") . sfConfig::get("app_wac_setting_upload_path"),
            "maxFileAge" => 3600,
        );

        $this->setup($default);
    }

    public function setupConfig($params) {
        $this->_config = $params;
    }

    public function process(sfWebRequest $request) {
        if ($request->hasParameter("chunk")) {
            $this->_chunk = $request->getParameter("chunk");
        }

        if ($request->hasParameter("chunks")) {
            $this->_chunks = $request->getParameter("chunks");
        }

        if ($request->hasParameter("name")) {
            // Clean the fileName for security reasons
            $this->_fileName = preg_replace('/[^\w\._]+/', '', $request->getParameter("name"));
        }

        // Make sure the fileName is unique but only if chunking is disabled
        if ($this->_chunk < 2 && file_exists($this->_config["targetDir"] . $this->_fileName)) {
            $ext = strrpos($this->_fileName, '.');
            $this->_fileFirstName = substr($this->_fileName, 0, $ext);
            $this->_fileNameExt = substr($this->_fileName, $ext);

            $count = 1;
            while (file_exists($this->_config["targetDir"] . $this->_fileFirstName . '_' . $count . $this->_fileNameExt))
                $count++;

            $this->_fileName = $this->_fileFirstName . '_' . $count . $this->_fileNameExt;
        }

        // Create target dir
        if (!file_exists($this->_config["targetDir"])) {
            @mkdir($this->_config["targetDir"]);
        }


        // Remove old temp files
        if (is_dir($this->_config["targetDir"]) && ($dir = opendir($this->_config["targetDir"]))) {
            while (($file = readdir($dir)) !== false) {
                $filePath = $this->_config["targetDir"] . $file;

                // Remove temp files if they are older than the max age
                if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $this->_config["maxFileAge"]))
                    @unlink($filePath);
            }

            closedir($dir);
        } else
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');

        // Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];

        // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = fopen($this->_config["targetDir"] . $this->_fileName, $this->_chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    fclose($in);
                    fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = fopen($this->_config["targetDir"] . $this->_fileName, $this->_chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                fclose($in);
                fclose($out);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        // Return JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

}

