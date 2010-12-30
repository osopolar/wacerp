<?php
/**
 * Description of PathCleanser
 * provide clear up path methods
 *
 * @author sun
 */
class QueryHelper {
	/*
	 * This method should be called by otherClass::processOption(), for processing query option
	 * @param &$objQuery a Doctrine Query
	 * @param $arrParam an parameter array for extension
	 * e.g. orderBy/defaultOrderBy/andWhere/andWhereIn/limit/offset
	 * @return void
	 * @author sun
	 */
    public static function processOption(Doctrine_Query &$objQuery, $arrParam = array())
    {
		if(isset($arrParam['andWhere'])) {
			foreach($arrParam['andWhere'] as $objAndWhere) {
				if(is_array($objAndWhere)) {
					$objQuery->andWhere($objAndWhere[0], $objAndWhere[1]);
				}
				else {
					$objQuery->andWhere($objAndWhere);
				}
			}
		}
		
		if(isset($arrParam['andWhereIn'])) {
			foreach($arrParam['andWhereIn'] as $objAndWhereIn) {
				if(is_array($objAndWhereIn)) {
					$objQuery->andWhereIn($objAndWhereIn[0], $objAndWhereIn[1]);
				}
			}
		}
		
		if(isset($arrParam['orderBy'])) {
			$objQuery->orderBy($arrParam['orderBy']);
		}
		elseif(isset($arrParam['defaultOrderBy'])) {
			$objQuery->orderBy($arrParam['defaultOrderBy']);
		}
					
		if(isset($arrParam['limit'])) {
			$objQuery->limit($arrParam['limit']);
		}
					
		if(isset($arrParam['offset'])) {
			$objQuery->offset($arrParam['offset']);
		}
    }
}
