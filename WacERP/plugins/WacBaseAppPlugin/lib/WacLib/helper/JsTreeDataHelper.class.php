<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JsTreeDataHelper
 *
 * adopting "Nested set model" as tree structure, all operations are base on it
 *
 * @author ben
 * @time 12/24/2009 6:36:51 PM
 */
class JsTreeDataHelper {
    protected static $_instance=null;
    public static $_nodeCount=0;

    public static $typeLeaf   = "leaf";
    public static $typeBranch = "branch";
    public static $typeRoot   = "root";

    public static $stateClosed = "closed";
    public static $stateOpen   = "open";

    protected  $_defaultNodeState = "closed";
    public $maxDepth = 1;

    public static function getInstance()
    {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct()			// construct method
    {
       ;
    }

    /*
     *  convert data array to jq data array
     * $resultSet - array()
     * $pager - doctrine pager
     */
    public function convert($resultSet, $pager, $userdata=array(), $metaInfo=array())
    {
        $result = array();
        if(is_array($resultSet) && count($resultSet)>0)
        {
            foreach($resultSet as $node){
                $result[] = $this->getJsTreeNode($node);
            }
        }
        return $result;
    }

    /*
     * return JsTree format node
     * @params
     * array $node - node info,
     */
    public function getJsTreeNode($node)
    {
        return array(
            "data"  => $node['caption'],
            "state" => $this->getDefaultNodeState(),
            "attr"  => array(
                                "id"         => $node['id'],
                                "parent"     => $node['parent_id'],
                                "code"       => $node['code'],
                                "name"       => $node['name'],
                                "node_value" => $node['id'],
                                "level"      => $node['level'],
                                "rel"        => $node['type'],
                                "type"       => $node['type']
                ),
//            "children" => array()
        );
    }
//
//    /*
//     *
//     * return a Jstree required array according to a data table
//     * @params:
//     *    $srcTable - must contains (id, parent, node_type, code, name) fields
//     *    $limitNum - get max number children under a parent
//     */
//    public function getTree($srcTable, $limitNum=500)
//    {
//        return $this->traverseTree(0, $srcTable, $limitNum);
//    }
//
//
//    public function getDepth($parent, $srcTable, $limitNum, $initVal=1)
//    {
//        if(Doctrine::getTable($srcTable)->hasChildren($parent))
//        {
//            $this->depthTraverse($parent, $srcTable, $limitNum, $initVal);
//        }
//        else
//        {
//            $this->maxDepth = 0;
//        }
//        return $this->maxDepth;
//    }
//
//    /*
//     * get depth of this branch
//     */
//    public function depthTraverse($parent, $srcTable, $limitNum, $initVal=1)
//    {
//        $depth = $initVal;
//        $nodes = Doctrine::getTable($srcTable)->getListByParent($parent, $limitNum, true);
//        if(count($nodes)>0 && is_array($nodes))
//        {
//            foreach($nodes as &$node)
//            {
//                if($this->isBranch($node['node_type']))
//                {
//                   $this->depthTraverse($node['id'], $srcTable, $limitNum, $depth+1);
//                }
//            }
//        }
//
//        if($this->maxDepth < $depth)
//        {
//            $this->maxDepth = $depth;
//        }
//        return $depth;
//    }
//
//    /*
//     *
//     */
//    public function traverseTree($parent, $srcTable, $limitNum)
//    {
//        $nodes = Doctrine::getTable($srcTable)->getListByParent($parent, $limitNum, true);
//        if(count($nodes)>0 && is_array($nodes))
//        {
//            foreach($nodes as &$node)
//            {
//                self::$_nodeCount++;
//                if($this->isBranch($node['node_type']))
//                {
//                    $node = $this->getJsTreeNode($node);
//                    $children = Doctrine::getTable($srcTable)->getListByParent($node['attributes']['node_value'], $limitNum, true);
//                    if(count($children) && is_array($children))
//                    {
//                        foreach($children as $child)
//                        {
//                            $node['children'] = $this->traverseTree($node['attributes']['node_value'], $srcTable, $limitNum);
//                        }
//                    }
//                }
//                else
//                {
//                    $node = $this->getJsTreeNode($node);
//                }
//            }
//        }
//
//        return $nodes;
//    }
//
//    public function isBranch($val)
//    {
//        return ($val==1);
//    }

    /*
     * createNode
     * @return new node object
     */
    public function createNode($parent, $srcTable, $params=array())
    {
        return $srcTable->createNode($parent, $params);
    }

     /*
     * editNode
     * @return new node object
     */
    public function editNode($parent, $srcTable, $params=array())
    {
        return $srcTable->editNode($parent, $params);
    }

    /*
     * moveNode
     * @return new node object
     */
    public function moveNode($node, $targetParentNode, $srcTable, $params=array())
    {
        return $srcTable->moveNode($node, $targetParentNode, $params);
    }

    /*
     * removeNode
     * @return new node object
     */
    public function removeNode($parent, $srcTable, $params=array())
    {
        return $srcTable->removeNode($parent, $params);
    }

    /*
     * getChildren
     *
     * return children collection
     */
    public function getChildren($parent, $srcTable, $isArr=true, $maxPerPage=-1)
    {
        return $srcTable->getChildren($parent, false, $isArr, $maxPerPage);
    }

    /*
     * getTestDatum
     * 
     */
    public function getTestDatum(){

    }

    public function initRoot($srcTable){
        
    }

    public function getDefaultNodeState(){
        return $this->_defaultNodeState;
    }

    public function setDefaultNodeState($v){
        if($v != $this->_defaultNodeState){
            $this->_defaultNodeState = $v;
        }
    }

    public function getSuccDatum($id=0){
        if($id!=0){
            return array(
                "status" => 1,
                "id" => $id
            );
        }

        return array( "status" => 1);
    }

    public function getErrDatum(){
        return array(
            "status" => 0
        );
    }
}

