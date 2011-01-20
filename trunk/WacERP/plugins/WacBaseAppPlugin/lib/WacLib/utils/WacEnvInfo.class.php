<?php

/**
 * WacLogger
 *
 * @package    Wac
 * @subpackage lib/utils
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class WacEnvInfo {

    public static $_instance = null;

    protected $_browserInfo = null;

    public static function getInstance() {
        $class = __CLASS__;
        if (is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct() {   // construct method
        $this->_browserInfo = $this->getBrowserInfo();
    }

    /**
     * check the running system whether windows
     *
     * @param	void
     * @return	boolean
     * @access  public
     *
     */
    public function isWindows() {
        return (substr(PHP_OS, 0, 3) == 'WIN');
    }

    /**
     * get the OS infomation
     *
     * @param	void
     * @return	string $PHP_OS
     * @access  public
     *
     */
    public function getOs() {
        return PHP_OS;
    }

    /**
     * get the system infomation
     *
     * @param	void
     * @return	string $COMPUTERNAME
     * @access  public
     *
     */
    public function getSystemName() {
        return $this->get('COMPUTERNAME');
    }

    /**
     * get the KEY infomation from enviroment
     *
     * @access  public
     *
     */
    public function get($key) {
        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }
        if (@getenv($key))
            return getenv($key);
        else
            return false;
    }

    /**
     * check the KEY infomation whether exist
     *
     * @access  public
     *
     */
    public function has($key) {
        if (isset($_SERVER[$key])) {
            return TRUE;
        }
        if (@getenv($key))
            return TRUE;
        else
            return false;
    }

    /**
     * get the temp directory from system
     *
     * @access  public
     *
     */
    public function getTempDir() {
        if ($this->isWindows())
            if ($this->has('TEMP'))
                return $this->get('TEMP');
            else if ($this->has('TMP'))
                return $this->get('TMP');
            else if ($this->has('windir'))
                return $this->get('windir') . '\temp';
            else
                return $this->get('SystemRoot') . '\temp';
        else if ($this->has('TMPDIR'))
            return $this->get('TMPDIR');
        else
            return '/tmp';
    }

    /**
     * load the php extension
     *
     * @access  public
     *
     */
    public function loadExtension($extensionName) {
        $extensionMap = array(
            'HP-UX' => '.sl',
            'AIX' => '.a',
            'OSX' => '.bundle',
            'LINUX' => '.so'
        );
        if (!extension_loaded($extensionName)) {
            if (ini_get('enable_dl') != 1 || ini_get('safe_mode') == 1) {
                throw new sfException("Wac Error: failed to load extension!");
                return false;
            }
            $osName = $this->getOs();
            if ($this->isWindows()) {
                $resourceName = $extensionName . '.dll';
            } else if (isset($extensionMap[strtoupper($osName)])) {
                $resourceName = $extensionName . $extensionMap[$osName];
            } else {
                $resourceName = $extensionName . '.so';
            }
            return @dl('php_' . $resourceName) || @dl($resourceName);
        }
        return TRUE;
    }

    /**
     * Get Browser Infomations
     *
     * @access  public
     *
     */
    public function getBrowserInfo() {
        $userAgent = getenv('HTTP_USER_AGENT');
        if (!$userAgent)
            return array();
        $browsersArray = array(
            'microsoft internet explorer' => 'ie',
            'msie' => 'ie',
            'chrome' => 'chrome',
            'firefox' => 'firefox',
            'safari' => 'safari',
            'netscape6' => 'ns',
            'mozilla' => 'ns',
            'opera' => 'op',
            'konqueror' => 'kq',
            'galeon' => 'gl',
            'icab' => 'ic',
            'lynx' => 'lx',
            'ncsa mosaic' => 'mo',
            'amaya' => 'ay',
            'omniweb' => 'ow',
        );
        $gecko = NULL;
        $build = NULL;
        $allowMasquerading = false;
        $browsersString = '';
        foreach ($browsersArray as $fullName => $abreviation) {
            $browsersString .= $fullName . "|";
        }
        $browsersString = substr($browsersString, 0, -1);

        $versionString = "[\/\sa-z]*([0-9]+)([\.0-9a-z]+)";
        $regExp = "/($browsersString)$versionString/i";
        if (preg_match_all($regExp, $userAgent, $results)) {

            $count = count($results[0]) - 1;
            if ($allowMasquerading && ($count > 0))
                $count--;
            $browser = $browsersArray[strToLower($results[1][$count])];

            $major = $results[2][$count];
            preg_match('/([.\0-9]+)([\.a-z0-9]+)?/i', $results[3][$count], $match);
            $minor = substr($match[1], 1);
            $verlet = (isSet($match[2])) ? $match[2] : NULL;
            $full = $major . '.' . $minor . $verlet;
            if (preg_match("/gecko/i", $userAgent))
                $gecko = TRUE;
            else
                $gecko = false;

            if ($gecko) {
                if (preg_match('/gecko\/([0-9]{8})/i', $userAgent, $geckoMatch)) {
                    $build = $geckoMatch[1];
                }
            }

            $this->_browserInfo = array(
                'browser' => $browser,
                'fullver' => $full,
                'major' => $major,
                'minor' => $minor,
                'verlet' => $verlet,
                'gecko' => $gecko,
                'build' => $build);
        }
        else {
          $this->_browserInfo = array(
                'browser' => NULL,
                'fullver' => NULL,
                'major' => NULL,
                'minor' => NULL,
                'verlet' => NULL,
                'gecko' => $gecko,
                'build' => $build);
        }

        return $this->_browserInfo;
    }

    /**
     * Get Browser Name
     *
     * @access  public
     *
     */
    public function getBrowserName() {
        return $this->_browserInfo['browser'];
    }

    /*
     * detect stupid ie :(
     */
    public function isIeBrowser(){
        return ($this->_browserInfo['browser'] === "ie");
    }

}
