<?php
/**
 * Description of WacCommonData
 *   abstract class for static class, normally act as the parent of standard/static data class
 *
 * @author ben
 */
abstract class WacCommonData
{
    protected $_params = array();  // canbe redeclare, below is an example
//    public static $params = array(
//        'active'    => array('id'=>"0", 'value'=>1, 'group'=>'1', 'name'=>"active", 'caption'=>"Status Active"),
//        'inactive' => array('id'=>"1", 'value'=>0, 'group'=>'1', 'name'=>"inactive", 'caption'=>"Status Inactive"),
//    );

    // to know the key in range or not
    public function inRange($key)
    {
        return in_array($key, array_keys($this->_params));
    }

    /*
     * get by group
     */
    public function getByGroup($group='1')
    {
        $tmpArr = array();
        foreach($this->_params as $param)
        {
            if($param['group']==$group)
            {
                $tmpArr[] = $param;
            }
        }
        return $tmpArr;
    }

    public function getParams(){
        return $this->_params;
    }

    public function setParams($v){
        return $this->_params = $v;
    }

    /*
     * get attribute
     */
    public function getAttribute($key, $attribute)
    {
        return (isset($this->_params[$key][$attribute])) ? $this->_params[$key][$attribute] : $key;
    }

    /*
     * getId
     */
    public function getId($key)
    {
        return $this->getAttribute($key, 'id');
    }

    /*
     * getName
     */
    public function getName($key)
    {
        return $this->getAttribute($key, 'name');
    }

    /*
     * getCaption
     */
    public function getCaption($key)
    {
        return sfContext::getInstance()->getI18N()->__($this->getAttribute($key, 'caption'));
    }

    /*
     * getValue
     */
    public function getValue($key)
    {
        return $this->getAttribute($key, 'value');
    }

    /*
     * getCaption
     */
    public function getCaptionById($id)
    {
        return sfContext::getInstance()->getI18N()->__($this->getAttributeById($id, 'caption'));
    }

    /*
     * @return caption
     */
    public function getAttributeById($id, $attribute)
    {
        $row = $this->getRowById($id);
        if($row != false){
            return $row[$attribute];
        }
        else{
            return "";
        }
    }

    /*
     *  getRowById
     * @return false or found array
     */
    public function getRowById($id)
    {
        $result = false;
        foreach($this->_params as $param)
        {
            if($param['id']==$id)
            {
                $result = $param;
                break;
            }
        }
        return $result;
    }

    /*
     *
     */
    public function getIdCaptionHash($isArr=true, $spliter=':', $pairSpliter=';', $isI18N=false )
    {
        return $this->getAttributeHash('id', 'caption', $isArr, $spliter, $pairSpliter, $isI18N);
    }

    /*
     * get Hash array or string
     */
    public function getAttributeHash($keyName, $valName, $isArr=true, $spliter=':', $pairSpliter=';', $isI18N=false)
    {
        $tmpArr = array();
        if(!$isI18N){
            if($isArr)
            {
                foreach($this->_params as $param) {
                    $tmpArr[$param[$keyName]] = $param[$valName];
                }
                return $tmpArr;
            }
            else
            {
                foreach($this->_params as $param) {
                    $tmpArr[] = $param[$keyName].$spliter.$param[$valName];
                }
                return implode($pairSpliter, $tmpArr);
            }
        }
        else{
            $i18n = sfContext::getInstance()->getI18N();
            if($isArr)
            {
                foreach($this->_params as $param) {
                    $tmpArr[$param[$keyName]] = $i18n->__($param[$valName]);
                }
                return $tmpArr;
            }
            else
            {
                foreach($this->_params as $param) {
                    $tmpArr[] = $param[$keyName].$spliter.$i18n->__($param[$valName]);
                }
                return implode($pairSpliter, $tmpArr);
            }
        }
    }

}
