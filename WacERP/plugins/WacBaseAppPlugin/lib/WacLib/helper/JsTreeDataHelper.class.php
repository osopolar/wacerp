<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JsTreeDataHelper
 *
 * generate JsTree data format
 *
 * @author ben
 * @time 12/24/2009 6:36:51 PM
 */
class JsTreeDataHelper {
    public static $_instance=null;
    public static $_nodeCount=0;
    
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
     * return JsTree format node
     * @params
     * array $node - node info,
     */
    public function getJsTreeNode($node, $isSyncId=true, $idKey="node_", $state="open")
    {
        if($isSyncId!=0)
        {
            return array(
                 "attributes"=>array("id"=>$idKey.$node['id'], 
                                     "parent"=>$idKey.$node['parent'],
                                     "code"=>$node['code'],
                                     "node_value"=>$node['id'],
                                     "level"=>$node['level'],
                                     "rel"=> ($node['node_type']==1) ? "folder" : "file",
                                     "node_type"=>$node['node_type']),
                 "data"=>array("title"=>$node['caption']),
                 "state"=>"open",
                 "children"=>array()
            );

        }
        else
        {
            return array(
                 "attributes"=>array("id"=>$idKey.self::$_nodeCount, 
                                     "code"=>$node['code'],
                                     "node_value"=>$node['id'],
                                     "level"=>$node['level'],
                                     "rel"=> $node["type"]),
                 "data"=>array("title"=>$node['caption']),
                 "state"=>"open",
                 "children"=>array()
            );
        }
    }

    /*
     *
     * return a Jstree required array according to a data table
     * @params:
     *    $srcTable - must contains (id, parent, node_type, code, name) fields
     *    $limitNum - get max number children under a parent
     */
    public function getTree($srcTable, $limitNum=500)
    {
        return $this->traverseTree(0, $srcTable, $limitNum);
    }

    
    public function getDepth($parent, $srcTable, $limitNum, $initVal=1)
    {
        if(Doctrine::getTable($srcTable)->hasChildren($parent))
        {
            $this->depthTraverse($parent, $srcTable, $limitNum, $initVal);
        }
        else
        {
            $this->maxDepth = 0;
        }
        return $this->maxDepth;
    }
    
    /*
     * get depth of this branch
     */
    public function depthTraverse($parent, $srcTable, $limitNum, $initVal=1)
    {        
        $depth = $initVal;
        $nodes = Doctrine::getTable($srcTable)->getListByParent($parent, $limitNum, true);
        if(count($nodes)>0 && is_array($nodes))
        {
            foreach($nodes as &$node)
            {
                if($this->isBranch($node['node_type']))
                {
                   $this->depthTraverse($node['id'], $srcTable, $limitNum, $depth+1);
                }
            }
        }

        if($this->maxDepth < $depth)
        {
            $this->maxDepth = $depth;
        }
        return $depth;
    }

    /*
     *
     */
    public function traverseTree($parent, $srcTable, $limitNum)
    {
        $nodes = Doctrine::getTable($srcTable)->getListByParent($parent, $limitNum, true);
        if(count($nodes)>0 && is_array($nodes))
        {
            foreach($nodes as &$node)
            {
                self::$_nodeCount++;
                if($this->isBranch($node['node_type']))
                {
                    $node = $this->getJsTreeNode($node);
                    $children = Doctrine::getTable($srcTable)->getListByParent($node['attributes']['node_value'], $limitNum, true);
                    if(count($children) && is_array($children))
                    {
                        foreach($children as $child)
                        {
                            $node['children'] = $this->traverseTree($node['attributes']['node_value'], $srcTable, $limitNum);
                        }
                    }
                }
                else
                {
                    $node = $this->getJsTreeNode($node);
                }
            }
        }

        return $nodes;
    }

    public function isBranch($val)
    {
        return ($val==1);
    }

    public function getChildren($id, $srcTable, $limitNum)
    {
        return Doctrine::getTable($srcTable)->getListByParent($id, $limitNum, true);
    }

    /*
     * getTestDatum
     * 
     */
    public function getTestDatum(){

    }

    public function initRoot($srcTable){
        
    }
}

