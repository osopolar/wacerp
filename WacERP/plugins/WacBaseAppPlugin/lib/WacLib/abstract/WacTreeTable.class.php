<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class WacTreeTable extends WacCommonTable
{
    protected static $_maxNodesPerGet = 10000;
    protected $_customFilterParams = array();

//    public $maxLayerNum = 10;
//    public $limitNodes = 500;  // number per get list

    /*
     * getListByParent
     *
     * $parent - node object
     * $isAvail - can be -1, 1, 0
     */
    public function getChildren($parent, $recursive=false, $isArr= false, $maxPerPage=-1, $isAvail=-1, $orderBy= "t1.left_number asc, t1.position asc", $params=array())
    {
        $arrParam = array();
        $arrParam['orderBy'] = $orderBy;
        if($isAvail != -1){
            $arrParam['andWhere'][] = "t1.is_avail={$isAvail}";
        }
        if($recursive){  // get all children
            $arrParam['andWhere'][] = "t1.left_number>=".$parent->getLeftNumber();
            $arrParam['andWhere'][] = "t1.right_number<=".$parent->getRightNumber();
        }
        else{
            $arrParam['andWhere'][] = "t1.parent_id=".$parent->getId();
        }

        $limitRows = ($maxPerPage == -1) ? self::$_maxNodesPerGet : $maxPerPage;

        return $this->getAbstractList(array_merge_recursive($arrParam, $this->getCustomFilter()), 1, $limitRows, $isArr);
    }

    /*
     * getAllLeaf
     */
    public function getAllLeaf(Doctrine_Record $node, $isArr= false, $maxPerPage=-1, $isAvail=-1, $orderBy= "t1.left_number asc"){
        $arrParam = array();
        $arrParam['orderBy'] = $orderBy;
        if($isAvail != -1){
            $arrParam['andWhere'][] = "t1.is_avail={$isAvail}";
        }
        $arrParam['andWhere'][] = "t1.right_number = t1.left_number + 1";
        $limitRows = ($maxPerPage == -1) ? self::$_maxNodesPerGet : $maxPerPage;
        return $this->getAbstractList(array_merge_recursive($arrParam, $this->getCustomFilter()), 1, $limitRows, $isArr);
    }

    /*
     * createNode
     * @return node
     */
    public function createNode($parent, $params=array(), $isAvail=-1){
        
        $this->updateTreeBeforeCreate($parent, $params["position"],1, $isAvail);

        $newNode = $this->create($params);
        $newNode->setParentId($parent->getId());
        $newNode->setLeftNumber($parent->getRightNumber());
        $newNode->setRightNumber($parent->getRightNumber()+1);
        $newNode->setLevel($parent->getLevel()+1);
        $newNode->save();

        $this->updateTreeAfterCreate($newNode, $isAvail);

        return $newNode;
    }

    /*
     * updateNodes before create a node
     * $nodesNum = nodes number
     */
    public function updateTreeBeforeCreate($parent, $position=0, $nodesNum=1, $isAvail=-1){
        $customFilterStr = $this->getCustomFilter(true);
        $increaseNum = $nodesNum * 2;

        //update ancestor's branch nodes
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("right_number", "right_number + {$increaseNum}")
                        ->where("right_number>=" . $parent->getRightNumber());
        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }

        $objQuery->execute();

        //update greater branch's nodes
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("left_number", "left_number + {$increaseNum}")
                        ->where("left_number>" . $parent->getRightNumber());

        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }

        $objQuery->execute();

         //update same layer nodes 
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("left_number", "left_number + {$increaseNum}")
                        ->set("right_number", "right_number + {$increaseNum}")
                        ->where("left_number>" . $parent->getLeftNumber())
                        ->andWhere("right_number<" . $parent->getRightNumber())
                        ->andWhere("position>=" . $position);

        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }

        $objQuery->execute();
        $objQuery->free();
    }

    /*
     * updateNodes after create a node
     */
    public function updateTreeAfterCreate($node, $isAvail=-1){
        //update position
        $customFilterStr = $this->getCustomFilter(true);
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("position", "position + 1")
                        ->where("parent_id=" . $node->getParentId())
                        ->andWhere("position>". $node->getPosition());
        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }
        $objQuery->execute();
        $objQuery->free();
    }

    /*
     * updateNodes after create a node
     */
    public function updateTreeAfterInsert($node, $isAvail=-1){
        //update position
        $customFilterStr = $this->getCustomFilter(true);
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("position", "position + 1")
                        ->where("parent_id=" . $node->getParentId())
                        ->andWhere("position>=". $node->getPosition());
        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }
        $objQuery->execute();
        $objQuery->free();
    }

    /*
     * editNode
     * @return node
     */
    public function editNode(Doctrine_Record $node, $params=array()){
        if(is_array($params) && count($params)>0){
            foreach($params as $k=>$v){
                $node->set($k, $v);
            }
            $node->save();
        }
        
    }

    /*
     * moveNode
     * @return node
     */
    public function moveNode(Doctrine_Record $node, Doctrine_Record $targetParentNode, $params=array()){
        // to fix jstree wrong position bug when move the node under the same parent
        $position = $params["position"];
        if(($position>0) && ($targetParentNode->getId()==$node->getParentId())){
            $maxPosition = $this->getMaxPositionOfSameParent($targetParentNode);
            if($maxPosition < $position){
                $position = $maxPosition;
            }
//            echo "fffff: ".$node->getId().":".$node->getPosition().":".$maxPosition.":".$position;
        }

        $this->disableNode($node, 1);
        $this->updateTreeBeforeRemove($node, 1);
        $this->updateTreeAfterRemove($node, 1);
        $targetParentNode->refresh();  // reflesh current data, it was effect by previous operation

        $node->setPosition($position);
        $node->setParentId($targetParentNode->getId());
        $node->save();
        
        $nodesNum = ($node->getRightNumber() - $node->getLeftNumber() + 1) / 2;
        $this->updateTreeBeforeCreate($targetParentNode, $position, $nodesNum, 1);
        $targetParentNode->refresh();  // reflesh current data, it was effect by previous operation
        $this->reindexNode($node, $targetParentNode, $position, 0, $params);
        $this->updateTreeAfterInsert($node, 1);
        $this->enableNode($node, 0);
        
        return $node;
    }

    /*
     * copyNode
     * @return node
     */
    public function copyNode(Doctrine_Record $node, Doctrine_Record $targetParentNode, $params=array()){
        // to fix jstree wrong position bug when move the node under the same parent
        $position = $params["position"];
        $copyNodeRoot = null;
        
        $nodes = $this->getChildren($node, true, false, -1, 1);
        if($nodes->count(0) > 0){
            $i = 0;
            $parentId = $targetParentNode->getId();
            foreach($nodes as $node){
                $newNode = $node->copy(false);
                $newNode->setParentId($parentId);
                $newNode->setIsAvail(0);                
                if($i==0){
                    $copyNodeRoot = $newNode;
                    $newNode->setPosition($position);
                }
                $newNode->save();
                $parentId = $newNode->getId();
                $i++;
            }
        }

        $nodesNum = ($copyNodeRoot->getRightNumber() - $copyNodeRoot->getLeftNumber() + 1) / 2;
        $this->updateTreeBeforeCreate($targetParentNode, $position, $nodesNum, 1);
        $targetParentNode->refresh();  // reflesh current data, it was effect by previous operation
        $this->reindexNode($copyNodeRoot, $targetParentNode, $position, 0, $params);
        $this->updateTreeAfterInsert($copyNodeRoot, 1);
        $this->enableNode($copyNodeRoot, 0);

        return $copyNodeRoot;
    }

    /*
     * reindexNode
     */
    public function reindexNode(Doctrine_Record $node, Doctrine_Record $targetParentNode, $position=0, $isAvail=-1, $params=array()){
        $customFilterStr    = $this->getCustomFilter(true);
        $prevNode           = $this->getPrevNode($targetParentNode, $position);
        $nodeLevel          = ($position == 0) ? $prevNode->getLevel() + 1 : $prevNode->getLevel();
//        $nodeLeftNumber     = $prevNode->getLeftNumber() + 1;
//        $nodeRightNumber    = $prevNode->getRightNumber() + 1;
        $nodeIncreaseNumber = ($position == 0) ? $prevNode->getLeftNumber() + 1 : $prevNode->getRightNumber() + 1;
        $oriNodeLeftNumber  = $node->getLeftNumber();
        $oriNodeLevel       = $node->getLevel();

        //update left/right number in the moving node branch
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("left_number", "left_number - {$oriNodeLeftNumber} + {$nodeIncreaseNumber}")
                        ->set("right_number", "right_number - {$oriNodeLeftNumber} + {$nodeIncreaseNumber}")
                        ->set("level", "level - {$oriNodeLevel} + {$nodeLevel}")
                        ->where("left_number>=" . $node->getLeftNumber())
                        ->andWhere("right_number<=" . $node->getRightNumber());

        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }
        $objQuery->execute();
        $node->refresh();
    }

    /*
     * get previous node
     *@return node
     */
    public function getPrevNode($parent, $position=0){
        if($position == 0){
            return $parent;
        }
        else{
            $objQuery = $this->createQuery('t1')
                    ->select("*")
                    ->where("parent_id=".$parent->getId())
                    ->andWhere("position<".$position)
                    ->orderBy("position desc");
            $node = $objQuery->fetchOne();

            $objQuery->free();
            if($node!=false){
                return $node;
            }
            else{
                return $parent;
            }
        }
    }

    /*
     * return max position under a same parent
     */
    public function getMaxPositionOfSameParent($parent){
        $objQuery = $this->createQuery('t1')
                    ->select("max(position) as max_position")
                    ->where("parent_id=".$parent->getId());

        $dataResult = $objQuery->fetchOne(array(), Doctrine::HYDRATE_ARRAY);
        if($dataResult){
//            print_r($dataResult);
            return $dataResult["max_position"];
        }
        else{
            return 0;
        }
    }

    public function disableNode($node, $isAvail=-1){
        $properties = array("is_avail"=>"0");
        return $this->setBranchProperties($properties, $node, true, -1, $isAvail);
    }

    public function enableNode($node, $isAvail=-1){
        $properties = array("is_avail"=>"1");
        return $this->setBranchProperties($properties, $node, true, -1, $isAvail);
    }

    /*
     * setNodeProperties
     */
    public function setBranchProperties(array $properties, $theNode, $recursive=true, $maxPerPage=-1, $isAvail=-1){
        $nodes = $this->getChildren($theNode, $recursive, false, $maxPerPage, $isAvail);
        if($nodes->count(0) > 0){
            foreach($nodes as $node){
                if(is_array($properties) && count($properties)>0){
                    foreach($properties as $k=>$v){
                         $node->set($k, $v);
                    }
                    $node->save();
                }
            }
        }
        return true;
    }


    /*
     * removeNode
     * @return node
     */
    public function removeNode($node, $params=array(), $isAvail=-1){
        $children = $this->getChildren($node, true);

        $succFlag = true;
        if($children->count()>0){
            foreach($children as $child){
                if(!$child->delete()){
                    $succFlag = false;
                    break;
                }
            }
        }        

        if($succFlag){
            $this->updateTreeBeforeRemove($node, $isAvail);
            $succFlag = $node->delete();
            $this->updateTreeAfterRemove($node, $isAvail);
        }

        return $succFlag;
    }

    /*
     * updateNodes before remove a node
     * $isAvail - can be -1, "1", "0"
     */
    public function updateTreeBeforeRemove($node, $isAvail=-1){
        $customFilterStr = $this->getCustomFilter(true);
        $minusNumber = $node->getRightNumber() - $node->getLeftNumber() + 1;

        //update right number greater than the node
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("right_number", "right_number - {$minusNumber}")
                        ->where("right_number>" . $node->getRightNumber());
                        
        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }
        $objQuery->execute();

        //update left number greater than the node
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("left_number", "left_number - {$minusNumber}")
                        ->where("left_number>" . $node->getRightNumber());
        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }
        
        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }
        $objQuery->execute();

        $objQuery->free();
    }

    /*
     * updateNodes after remove a node
     * $isAvail - can be -1, "1", "0"
     */
    public function updateTreeAfterRemove($node, $isAvail=-1){
        //update position
        $customFilterStr = $this->getCustomFilter(true);
        $objQuery = $this->createQuery()
                        ->update($this->getComponentName()." t1")
                        ->set("position", "position - 1")
                        ->where("parent_id=" . $node->getParentId())
                        ->andWhere("position>". $node->getPosition());
        if($isAvail != -1){
            $objQuery->andWhere("is_avail={$isAvail}");
        }

        if($customFilterStr!=""){
            $objQuery->andWhere($customFilterStr);
        }
        $objQuery->execute();

        $objQuery->free();
    }

    /*
     * set custom filter params in the tree
     * canbe override by children
     * @params - array("Key"=>"Value"), looks like
     *   $params = array(
     *      "user_id" => 1
     *   )
     */
    public function setCustomFilter(array $params){
        $this->_customFilterParams = $params;
    }

    /*
     * get custom filter params in the tree
     * canbe override by children
     */
    public function getCustomFilter($toStr=false){
        $arrParams = array();
        if(!$toStr){
            if(is_array($this->_customFilterParams) && count($this->_customFilterParams)>0){
                foreach($this->_customFilterParams as $k => $v){
                    $arrParams['andWhere'][] = "t1.{$k}={$v}";
                }
            }
            return $arrParams;
        }
        else{
            $filterStr = "";
            if(is_array($this->_customFilterParams) && count($this->_customFilterParams)>0){
                foreach($this->_customFilterParams as $k => $v){
                    $arrParams[] = "t1.{$k}={$v}";
                }
                $filterStr = implode(" and ", $arrParams);
            }
            return $filterStr;
        }
    }

}