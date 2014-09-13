<?php
class Display_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
	
	private function in_array_r($needle, $haystack) {
    $found = false;
    foreach ($haystack as $item) {
    if ($item === $needle) { 
            $found = true; 
            break; 
        } elseif (is_array($item)) {
            $found = in_array_r($needle, $item); 
            if($found) { 
                break; 
            } 
        }    
    }
    return $found;
}
	
	public function getCategories () {
		// returns Multidimensional Array of Category items.
		$categoriesQry = $this->db->get("tag_categories"); 
		return $categoriesQry->result();
	}
	
	public function getTags () {
		// returns Multidimensional Array of Tag items.
		$tagQry = $this->db->get("all_tags");
		return $tagQry->result();
	}
	
	public function makeObject() {
	
		$Categories = $this->getCategories();
		$Tags = $this->getTags();
		
		
		$resultArray = array("categories"=>$Categories, "tags"=>$Tags);
		
		
		return $resultArray;
	}
	
	public function testValidate( $request ) {
		// unique array
		$testThisArray = array("email"=>$request['email']);
		$whereCondition = $this->db->where( $testThisArray );
		$query = $this->db->get('user_profile');
		return $query->result();
	}
	
	public function tagRelationsObject(){
		$Tag_Relations_Store = array();
		// get all tag_id's
		// get all cit_id's per tag_id from cit_tag_map
		// get all tag_id's per cit_id
		// distill all tag_id's into unique array
		// push entry of tag_id=>[]~relatedTagsArray into Aggregate Object
		// return Aggregate Object
		
		$TAGS_QRY = $this->db->get('all_tags');
		$TAGS = $TAGS_QRY->result();
		
		foreach ($TAGS as $TAG) {
			$tagsRelated = array();
			// get tag_cit_mapping
			$where = array('tag_id'=>$TAG->tag_id);
			$related_cits_query = $this->db->get_where('cit_tag_map', $where);
			$related_cits = $related_cits_query->result();
			foreach ($related_cits as $related_cit) {
				$whereCit = array('cit_id'=>$related_cit->cit_id);
				$related_tags = $this->db->get_where('cit_tag_map', $whereCit);
				foreach ($related_tags->result() as $related_tag) {
					if (!in_array($related_tag->tag_id, $tagsRelated) && $related_tag->tag_id !== $TAG->tag_id) {
						array_push($tagsRelated, $related_tag->tag_id);
					}
				}
			}
			array_push($Tag_Relations_Store, array("tag_id"=>$TAG->tag_id,"related_tags"=>$tagsRelated));
			
		}
		
		return $Tag_Relations_Store;
	}

public function orderSignificance(){
		$Tag_Relations_Store = array();
		// get all tag_id's
		// get all cit_id's per tag_id from cit_tag_map
		// get all tag_id's per cit_id
		// distill all tag_id's into unique array
		// push entry of tag_id=>[]~relatedTagsArray into Aggregate Object
		// return Aggregate Object
		
		$TAGS_QRY = $this->db->get('all_tags');
		$TAGS = $TAGS_QRY->result();
		
		foreach ($TAGS as $TAG) {
			$tagsRelated = array();
			// get tag_cit_mapping
			$where = array('tag_id'=>$TAG->tag_id);
			$related_cits_query = $this->db->get_where('cit_tag_map', $where);
			$related_cits = $related_cits_query->result();
			foreach ($related_cits as $related_cit) {
				$whereCit = array('cit_id'=>$related_cit->cit_id);
				$related_tags = $this->db->get_where('cit_tag_map', $whereCit);
				foreach ($related_tags->result() as $related_tag) {
					if (!in_array($related_tag->tag_id, $tagsRelated) && $related_tag->tag_id !== $TAG->tag_id) {
						array_push($tagsRelated, $related_tag->tag_id);
					}
				}
			}
			array_push($Tag_Relations_Store, array("tag_id"=>$TAG->tag_id,"related_tags"=>$tagsRelated));
			
		}
		
		return $Tag_Relations_Store;
	}
public function ExistsInMasterPossibilitiesArray( $COMBINATION, $MASTER_ARRAY ) {
	// search master array for array existence
	for ($i=0; $i<count($MASTER_ARRAY); $i++)
	{
		$ARRAY_DIFFS = array_diff($COMBINATION, $MASTER_ARRAY[$i]);
		if (count($ARRAY_DIFFS) == 0) {
			return TRUE;
		}
	}
	return FALSE;
}

public function Tag_Possibilities_Model() {
	$MASTER_POSSIBILITIES_DICTIONARY = array();
	// array("one_param"=>array())
	
	$TAGS_QRY = $this->db->get('all_tags');
		$TAGS = $TAGS_QRY->result();
		$TAGS_COUNT = count($TAGS);
		foreach ($TAGS as $TAG) 
		{
			$tagid = (int)$TAG->tag_id;
			array_push($MASTER_POSSIBILITIES_DICTIONARY, array($tagid));

			for($i=0; $i<$TAGS_COUNT; $i++)
			{
				$COMBINATION = ($TAGS[$i]->tag_id !== $tagid) ? array((int)$tagid, (int)$TAGS[$i]->tag_id) : FALSE;
				if ($COMBINATION)
				{
					//$COMBINATION = sort($COMBINATION);
					$EXISTS = self::ExistsInMasterPossibilitiesArray($COMBINATION, $MASTER_POSSIBILITIES_DICTIONARY);
					if (!$EXISTS) {
					array_push($MASTER_POSSIBILITIES_DICTIONARY, $COMBINATION);
					} else 
					{
						continue;
					}
				} 		
				else 
				{
					continue;
				}
			
			}	
		}
	return $MASTER_POSSIBILITIES_DICTIONARY;
}
public function RemainingItems( $BASE_ARRAY, $ARRAY_SIZE, $POSSIBLE_ITEMS ) {
	$remainingItems = array();
	$fromPossible = $POSSIBLE_ITEMS;
	foreach ($BASE_ARRAY as $key => $value) {
		unset($fromPossible[$value]);
	}
//	$POSSIBLE_ITEMS = array_values($POSSIBLE_ITEMS);
	// for ($i=0; $i < count($POSSIBLE_ITEMS); $i++) { 
		// array_push($remainingItems, $POSSIBLE_ITEMS[$i]->tag_id);
	// }
	//$REMAINING_ITEMS = array_unset($POSSIBLE_ITEMS, $BASE_ARRAY);
	foreach ($fromPossible as $key => $value) {
		array_push($remainingItems, $key);
	}
	return $remainingItems;
	
}
public function setValues($anchor_idx, $ARRAY_SIZE, $POSSIBLE_ITEMS, $OfItemsCount) {
	$valuesArr = array();
	if ($anchor_idx != ($OfItemsCount - 1)) { 
		for ($i=0; $i < $ARRAY_SIZE; $i++) {
				if($OfItemsCount > ($anchor_idx + $i)) {
					array_push($valuesArr,  ($anchor_idx + $i));
				} else {
					$offset = $OfItemsCount - $anchor_idx;
						
					array_push($valuesArr, ($i - $offset));
				}
			} 
	}
	else {
			for ($i=0; $i < $ARRAY_SIZE; $i++) {
				if (0 == $i) {
					array_push($valuesArr, ($anchor_idx + $i));
				} else {
					array_push($valuesArr, ($i - 1));
				}
			} 
		}
	return $valuesArr;
}
public function existsInMasterArray ( $MasterArray, $TEMP_ARRAY ) {
	for ($i=0; $i < count($MasterArray); $i++) { 
		if (0 == count(array_diff($MasterArray[$i], $TEMP_ARRAY))){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
/*	*
 	* @method substituteNonReferencedItems
 	*@params (int)$idx_position (array)$NonRefItems
 	* 
	*/   
public function substituteNonReferencedItems ( $BASE_ARRAY, $idx_position, $NonRefItems ) {
	$positionCombinations = array();
	$MasterArray = array();
	$TEMP_ARRAY = $BASE_ARRAY;
	if ((count($BASE_ARRAY) - 1) == $idx_position) {
		for ($i=0; $i < count($NonRefItems); $i++) { 
			$TEMP_ARRAY[$idx_position] = $NonRefItems[$i];
			$EXISTS = self::existsInMasterArray( $MasterArray, $TEMP_ARRAY );
			if (!$EXISTS) {
				array_push($MasterArray, $TEMP_ARRAY);
			}
		}
	}
	return $MasterArray;	
}

public function createArray( $ARRAY_SIZE, $POSSIBLE_ITEMS ) {
	$aggregateArrays = array();
		foreach ($POSSIBLE_ITEMS as $anchor_idx => $ITEM) {
			$array_set = self::setValues($anchor_idx, $ARRAY_SIZE, $POSSIBLE_ITEMS, count($POSSIBLE_ITEMS)); 
			$REMAINING_ITEMS = self::RemainingItems( $array_set, $ARRAY_SIZE, $POSSIBLE_ITEMS );
			$OTHER_ARRAYS = self::substituteNonReferencedItems( $array_set , ($ARRAY_SIZE -1), $REMAINING_ITEMS);
			array_push($aggregateArrays, array("initialSet"=>$array_set, "nonreferencedOptions"=>$REMAINING_ITEMS, "lastIndexCombos"=>$OTHER_ARRAYS));
		}
		return $aggregateArrays;
}


}
/*
 *  End of display_model.php
 */