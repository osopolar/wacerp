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
    protected $_config = array();
    protected $_chunk = 0;
    protected $_chunks = 0;
    protected $_fileName = "";
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
            "wacUploadDir"  => sfConfig::get("sf_upload_dir") . sfConfig::get("app_wac_setting_upload_path"),
            "targetDir"     => sfConfig::get("sf_upload_dir") . sfConfig::get("app_wac_setting_upload_path"),  // default same as wac upload
            "cachingPolicy" => true, // use caching policy to avoid too many files in a folder
            "cleanupTargetDir" => false, // Remove old files or not, work with maxFileAge
            "maxFileAge" => 3600, // expired file seconds
        );

        $this->setupConfig($default);

        // Create target dir
        if (!file_exists($this->_config["wacUploadDir"])) {
            @mkdir($this->_config["wacUploadDir"]);
        }
    }

    public function setupConfig($params) {
        $this->_config = $params;
    }

    /*
     * accroding $fileName, create two layer caching folder for it, to avoid too much file under a folder
     * $cachingLayer - how many folder layers will be created
     * $startCharNum - get random char start position or the flename, for plupload filename
     *
     * @return caching path, looks like "q/c/" etc.
     */
    public function setupCachingPath($fileName, $startCharNum=5, $cachingLayer=2){
        $path = "";
        $dir = $this->_config["wacUploadDir"];
        
        if(strlen($fileName) > ($startCharNum + $cachingLayer)){
            for($i=0;$i<$cachingLayer;$i++){
                $dirChar = substr($fileName, ($startCharNum+$i), 1);
                $dir .= DIRECTORY_SEPARATOR.$dirChar;
                if (!file_exists($dir)) {
                    @mkdir($dir);
                }
                $path .= $dirChar.DIRECTORY_SEPARATOR;
            }
        }
        else{
            throw new WacAppException("Filename is too short to create caching folders!", "104");
        }
        return $path;
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

        if($this->_config["cachingPolicy"]){
//            $test = $this->_config["wacUploadDir"].$this->setupCachingPath($this->_fileName);
            $this->_config["targetDir"] = $this->_config["wacUploadDir"].$this->setupCachingPath($this->_fileName);
        }

        // Make sure the fileName is unique but only if chunking is disabled
        if ($this->_chunk < 1 && file_exists($this->_config["targetDir"] . $this->_fileName)) {
            $ext = strrpos($this->_fileName, '.');
            $this->_fileFirstName = substr($this->_fileName, 0, $ext);
            $this->_fileNameExt = substr($this->_fileName, $ext);

            $count = 1;
            while (file_exists($this->_config["targetDir"] . $this->_fileFirstName . '_' . $count . $this->_fileNameExt))
                $count++;

            $this->_fileName = $this->_fileFirstName . '_' . $count . $this->_fileNameExt;
        }

//        sfContext::getInstance()->getLogger()->log(print_r($_FILES, true));
//        sfContext::getInstance()->getLogger()->log("{$this->_config["targetDir"]} : {$this->_chunk} : {$this->_chunks} : {$this->_fileName} : {$this->_fileFirstName} : {$this->_fileNameExt}");

        if ($this->_config["cleanupTargetDir"]) {
            // Remove old temp files
            if (is_dir($this->_config["targetDir"]) && ($dir = opendir($this->_config["targetDir"]))) {
                while (($file = readdir($dir)) !== false) {
                    $filePath = $this->_config["targetDir"] . $file;

                    // Remove temp files if they are older than the max age
                    if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $this->_config["maxFileAge"]))
                        @unlink($filePath);
                }

                closedir($dir);
            } else{
                throw new WacAppException("Failed to open temp directory.", "100");
            }
        }


        $contentType = $request->getContentType();
        // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            try {
                if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name']))
                {
                    // Open temp file
                    $out = fopen($this->_config["targetDir"] . $this->_fileName, $this->_chunk == 0 ? "wb" : "ab");
                    if ($out) {
                        // Read binary input stream and append it to temp file
                        $in = fopen($_FILES['file']['tmp_name'], "rb");

                        if ($in) {
                            while ($buff = fread($in, 4096))
                                fwrite($out, $buff);
                        }
                        else {
                            throw new WacAppException("Failed to open input stream.", "101");
                        }
                        fclose($in);
                    }
                    else {
                        throw new WacAppException("Failed to open output stream.", "102");
                    }                    
		    fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                }
                else {
                    throw new WacAppException("Failed to move uploaded file.", "103");
                }
            }
            catch (WacAppException $e) {
                if(isset($in) && is_resource($in)){fclose($in);}
                if(isset($out) && is_resource($out)){fclose($out);}
                @unlink($_FILES['file']['tmp_name']);
                throw $e;
            }
        }
        else {
            // Open temp file
            $out = fopen($this->_config["targetDir"] . $this->_fileName, $this->_chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else{
                    if(isset($in) && is_resource($in)){fclose($in);}
                    throw new WacAppException("Failed to open input stream.", "101");
                }

                fclose($in);
                fclose($out);
            } 
            else{
                if(isset($out) && is_resource($out)){fclose($out);}
                throw new WacAppException("Failed to open output stream.", "102");
            }
        }

        // at the end chunk, dispatch a upload finish event
        if($this->_chunks == ($this->_chunk + 1)){
            $parameters = array(
                "config"   => $this->_config,
                "fileName" => $this->_fileName,
                "file"     => $_FILES['file']["name"]
            );
            sfContext::getInstance()->getEventDispatcher()->notify(new sfEvent($this, sfConfig::get("app_wac_events_file_upload_finish"), $parameters));
        }

    }

}

