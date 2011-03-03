<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class WacTreeTable extends WacCommonTable
{
    public $maxLayerNum = 10;
    public $limitNodes = 500;  // number per get list

    /*
     * Return a list
     */
//    public function getList($params, $page=1, $maxPerPage=20, $isArr=true, $isConcise=true)
////    public function getList($params = array(), $isArr=false, $isConcise=true)
//    {
//        if($isConcise)
//        {
//            $objQuery = $this->createQuery('t1')
//            ->select('t1.id, t1.parent, t1.node_type, t1.self_layer, t1.code, t1.name')
//            ->where('t1.is_avail=1');
//        }
//        else
//        {
//            $objQuery = $this->createQuery('t1')
//            ->select('t1.*')
//            ->where('t1.is_avail=1');
//        }
//
//        QueryHelper::processOption($objQuery, $params);
//        $dataResult = $isArr ? $objQuery->fetchArray() : $objQuery->execute();
//        $objQuery->free();
//        return $dataResult;
//    }

    /*
     * getListByParent
     *
     * $parent - node object
     */
    public function getChildren($parent, $recursive=false, $isArr= false, $maxPerPage=-1, $orderBy= "t1.id asc", $params=array())
    {
        $arrParam = array();
        $arrParam['orderBy'] = $orderBy;

        if($recursive){  // get all children
            $arrParam['andWhere'][] = "t1.left>=".$parent->getLeft();
            $arrParam['andWhere'][] = "t1.right<=".$parent->getRight();
        }
        else{
            $arrParam['andWhere'][] = "t1.parent_id=".$parent->getId();
        }


        $limitRows = ($maxPerPage == -1) ? 10000 : $maxPerPage;

        return $this->getAbstractList($arrParam, 1, $limitRows, $isArr);

    }

    /*
     * return ids array or objects colleciton
     */
    public function getIdsByCodes($codes=array(), $rowsLimit=500, $isArr=true, $orderBy= "t1.id asc")
    {
        $params = array();
        $params['andWhere'][] = "t1.code in (\"".implode('","', $codes)."\")";
        $params['limit']      = $rowsLimit;
        $params['orderBy']    = $orderBy;
        $items = $this->getList($params, 1, $rowsLimit, false);
        if($isArr)
        {
            $ids = array();
            if($items->count()>0)
            {
                foreach($items as $item)
                {
                    $ids[] = $item->getId();
                }
            }
            return $ids;
        }
        else
        {
            return $items;
        }
    }

    public function getListByParents($parents=array(), $rowsLimit=500, $isArr= false, $orderBy= "t1.id asc")
    {
        $params = array();
        $params['andWhere'][] = "t1.parent in (".implode(',', $parents).")";
        $params['limit']      = $rowsLimit;
        $params['orderBy']    = $orderBy;
        return $this->getList($params, 1, $rowsLimit, $isArr);
    }

    public function getIdNameHashListByParents($parents=array(), $rowsLimit=500, $orderBy= "t1.id asc")
    {
        $params = array();
        $params['andWhere'][] = "t1.parent in (".implode(',', $parents).")";
        $params['limit']      = $rowsLimit;
        $params['orderBy']    = $orderBy;
        return $this->getHashList("id", "name", $params);
    }

    
    /*
     * has children of the node
     * @return boolean
     */
    public function hasChildren($node)
    {
        $id = is_object($node) ? $node->getId() : $node;
        $objQuery = $this->createQuery('t1')
             ->select("count(*) as total")
             ->where("t1.parent=?", $id);
        $dataResult = $objQuery->fetchOne();
        $objQuery->free();
        return ($dataResult['total']>0);
    }

//    /*
//     * return current depth of the node
//     */
//    public function getDepth($node)
//    {
//        if($node->getSelfLayer()<=$this->maxLayerNum)
//        {
//            return $node->getSelfLayer();
//        }
//    }

    /*
     * del tree/branch
     */
    public function delTree($id, $layer)
    {
        $depth = JsTreeDataHelper::getInstance()->getDepth($id, WacTable::$goodsCategory, 500);
        if($this->maxLayerNum >= ($layer+$depth))  // fast delete
        {
            $objQuery = $this->createQuery('t1')
                    ->delete()
                    ->where("t1.layer{$layer}={$id}");
            $objQuery->execute();
        }
        else
        {
            $this->traverseDel($id, $this->limitNodes);
            $this->delete($id);
        }

    }

    /*
     * traverse del nodes
     */
    public function traverseDel($parent,$limitNum)
    {
        $nodes = $this->getListByParent($parent, $limitNum, true);
        if(count($nodes)>0 && is_array($nodes))
        {
            foreach($nodes as &$node)
            {
                if($this->isBranch($node['node_type']))
                {
                    $this->traverseDel($node['id'], $limitNum);
                    $this->delete($node['id']);
                }
                else
                {
                    $this->delete($node['id']);
                }
            }
        }
    }

    /*
     * del a node
     */
    public function delete($id)
    {
//        echo "<br/>delete : {$id}";
        $objQuery = $this->createQuery('t1')
                    ->delete()
                    ->where("t1.id={$id}");
        $objQuery->execute();
    }

    public function isBranch($val)
    {
        return ($val==1);
    }

}