<?php
class Category_model extends CI_Model{

	function get_all_category(){
		$result = $this->db->get('tbl_category');
		return $result; 
	}

	function add_new_row($category,$code,$price,$sum,$tanggal){
		$data = array(
	        'category_name' => $category,
	        'category_code' => $code,
			'category_price' => $price,
			'category_sum' => $sum,
			'category_date' => $tanggal
		);
		$this->db->insert('tbl_category', $data); 
	}

	function edit_row($id,$category,$code,$price,$sum,$tanggal){
		$data = array(
	        'category_name' => $category,
	        'category_code' => $code,
			'category_price' => $price,
			'category_sum' => $sum,
			'category_date' => $tanggal
		);
		$this->db->where('category_id', $id);
		$this->db->update('tbl_category', $data);
	}

	function edit_sum($id,$sum){
		$this->db->set('category_sum','category_sum-'.$sum,FALSE);
		
		$this->db->where('category_id', $id);
		$this->db->update('tbl_category');
	}	

	function delete_row($id){
		$this->db->where('category_id', $id);
		$this->db->delete('tbl_category');
	}


}