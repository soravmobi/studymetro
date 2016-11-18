<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model 
{
    function getAllRecords($table)
	{
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function getAllRecordsCount($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	function getAllRecordsByOrder($table, $field, $short)
	{	
		$this->db->order_by($field, $short);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	
    function getSingleRecordById($table,$conditions)
	{
	   $query = $this->db->get_where($table,$conditions);
	   return $query->row_array();
	}
	 
	function getAllRecordsById($table,$conditions)
	{
	   $query = $this->db->get_where($table,$conditions);
		return $query->result_array();
	}

	function getAllRecordsOrderById($table, $field, $short, $conditions,$limit="")
	{
	   $this->db->order_by($field, $short);
	   if(!empty($limit)){
	   		$this->db->limit($limit);
	   }
	   $query = $this->db->get_where($table,$conditions);
	   return $query->result_array();
	}

    function addRecords($table,$post_data)
	{
		$this->db->insert($table,$post_data); 
		return $this->db->insert_id(); 
	}

	function addRecordsReturnId($table,$post_data)
	{
		$this->db->insert($table,$post_data);
		return $this->db->insert_id(); 
	}
	
	function updateRecords($table, $post_data, $where_condition)
	{
		$this->db->where($where_condition);
		$this->db->update($table, $post_data);
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}
	
	function deleteRecords($table, $where_condition, $condition)
	{		
	    $this->db->where($where_condition,$condition);
		$this->db->delete($table);
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}

	function deleteRecord($table, $condition)
	{		
	    $this->db->where($condition);
		$this->db->delete($table);
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}	
	
	function getPaginateRecords($table, $result, $offset = 0)
	{
		$query = $this->db->get($table,$result,$offset);
	    return $query->result_array();
	}

	function getPaginateRecordsByConditions($table, $result, $offset=0, $condition)
	{
		$query = $this->db->get_where($table, $condition, $result, $offset);
	    return $query->result_array();
	}

	function getPaginateRecordsByLikeConditions($table, $result, $offset=0, $condition, $like_field, $like_value)
	{
		$this->db->like($like_field, $like_value);
		$query = $this->db->get_where($table, $condition, $result, $offset);
	    return $query->result_array();
	}

	function getTotalRecords($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	function getTotalRecordsByIdLike($table, $condition, $like_field, $like_value)
	{
	    $this->db->like($like_field, $like_value);
	    $query = $this->db->get_where($table, $condition);
		return $query->num_rows();
	}
	
	function getPaginateRecordsByCondition($table,$result,$offset=0,$where_condition,$condition)
	{
	    $this->db->where($where_condition,$condition);
		$query = $this->db->get($table,$result,$offset);
	    return $query->result_array();
	}

	function getPaginateRecordsByOrderByCondition($table, $field, $short, $result, $offset = 0, $condition = '')
	{
	    if(!empty($condition)) {
	    	$this->db->where($condition);
	    }
	    $this->db->order_by($field, $short);
		$query = $this->db->get($table, $result, $offset);
	    return $query->result_array();
	}

	function getTotalRecordsByCondition($table, $condition)
	{
	    $this->db->where($condition);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	function fetchMaxRecord($table,$field)
	{
		$this->db->select_max($field,'max');
        $query = $this->db->get($table);
		return $query->row_array();	
	}

	function fetchRecordsByOrder($table,$field,$sort)
	{
	    $this->db->order_by($field,$sort);
		$query = $this->db->get($table);
		return $query->result_array();
	}			
			
	function getAllRecordsByLimitId($table,$conditions,$limit)
	{
	    $this->db->limit($limit);
		$query = $this->db->get_where($table,$conditions);
		return $query->result_array();
	}
	
	function getLatestRecords($table, $order, $limit)
	{
	    $this->db->order_by($order,'desc');
	    $this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	
	function getRelatedRecords($table,$date,$conditions)
	{
	    $this->db->order_by($date,'desc');
	    $this->db->limit(4);
		$query = $this->db->get_where($table,$conditions);
		return $query->result_array();
	}
	
	function getAscLatestRecords($table,$date,$limit)
	{
	    $this->db->order_by($date,'asc');
	    $this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	
	function getLimitedRecords($table,$limit)
	{
	    $this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function getRecordCount($table, $where_condition)
	{
	    $this->db->where($where_condition);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	function getPaginateRecordsByOrderByLikeCondition($table, $like_field = '', $like_value = '', $like_rel = '', $order_field = '', $order_short = '', $result = 0, $offset = 0, $condition = '')
	{	
		if(!empty($condition)) {
	    	$this->db->where($condition);
	    }

	    if(!empty($like_field) && !empty($like_value)) {
			if(is_array($like_field) && is_array($like_value)) {
				if($like_rel == 'OR') {
					$this->db->like($like_field[0], $like_value[0]);
					unset($like_field[0], $like_value[0]);
					foreach($like_field as $key => $val) {
						$this->db->or_like($val, $like_value[$key]);
					}
				} elseif($like_rel == 'AND') {
					foreach($like_field as $key => $val) {
						$this->db->like($val, $like_value[$key]);
					}
				}
			} elseif(is_array($like_field) && !is_array($like_value)) {
				if($like_rel == 'OR') {
					$this->db->like($like_field[0], $like_value);
					foreach($like_field as $key => $val) {
						$this->db->or_like($val, $like_value);
					}
				} elseif($like_rel == 'AND') {
					foreach($like_field as $key => $val) {
						$this->db->like($val, $like_value[$key]);
					}
				}
			} else {
			    $this->db->like($like_field, $like_value);
			}
		}

		if(!empty($order_field) && !empty($order_short)) {
	    	$this->db->order_by($order_field, $order_short);
	    }

	    if(!empty($result)) {
	    	$query = $this->db->get($table, $result, $offset);
	    } else {
	    	$query = $this->db->get($table);
	    }
	    return $query->result_array();
	}

	function getTotalPaginateRecordsByOrderByLikeCondition($table, $like_field = '', $like_value = '', $like_rel = '', $condition = '')
	{	
		if(!empty($condition)) {
	    	$this->db->where($condition);
	    }

	    if(!empty($like_field) && !empty($like_value)) {
			if(is_array($like_field) && is_array($like_value)) {
				if($like_rel == 'OR') {
					$this->db->like($like_field[0], $like_value[0]);
					unset($like_field[0], $like_value[0]);
					foreach($like_field as $key => $val) {
						$this->db->or_like($val, $like_value[$key]);
					}
				} elseif($like_rel == 'AND') {
					foreach($like_field as $key => $val) {
						$this->db->like($val, $like_value[$key]);
					}
				}
			} elseif(is_array($like_field) && !is_array($like_value)) {
				if($like_rel == 'OR') {
					$this->db->like($like_field[0], $like_value);
					foreach($like_field as $key => $val) {
						$this->db->or_like($val, $like_value);
					}
				} elseif($like_rel == 'AND') {
					foreach($like_field as $key => $val) {
						$this->db->like($val, $like_value[$key]);
					}
				}
			} else {
			    $this->db->like($like_field, $like_value);
			}
		}

		$query = $this->db->get($table);
	    return $query->num_rows();
	}

	function getCustomSqlCount($sql) {
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function getCustomSqlResult($sql) {
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function getCustomSqlRow($sql) {
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function updateCustomSql($sql) {
		 $this->db->query($sql);
	}

	function searchPrograms($data) {
		$sql = 'SELECT `P`.`university_id` FROM '.PROGRAMS.' AS P  INNER JOIN '.UNIVERSITIES.' AS U
		 	   WHERE P.country = "'.$data['country'].'"';

		if(!empty($data['id'])) {
			$sql .= ' AND P.university_id = '.$data['id'];
		}

		if(!empty($data['program'])) {
			$sql .= ' AND P.program_name LIKE "%'. $data['program'].'%"';
		}

		if(!empty($data['course'])) {
			$sql .= ' AND P.course_type LIKE "%'.$data['course'].'%"';
		}
		$sql .= ' GROUP BY P.university_id';
		$query = $this->db->query($sql);
		$university_ids = $query->result_array();
		if(!empty($university_ids)){
			$university_ids = array_column($university_ids, 'university_id');
			$query   = $this->db->query(" SELECT `name`,`logo`,`location`,`country`,`founded`,`institution`,`estimated_cost`,`tution_fee`,`id` AS `univ_id` FROM ".UNIVERSITIES." WHERE `id` IN (".implode(",", $university_ids).") ORDER BY `name` ASC ");
            return $query->result_array();
		}else{
			return array();
		}
	}

	function getFilteredPrograms($table, $key, $order, $condition, $program){
		$this->db->where($condition);
		if(!empty($program)) {
			$this->db->like('program_name', $program);
		}
		$this->db->order_by($key, $order);
		$query = $this->db->get($table);
		return $query->result_array();
	}
}