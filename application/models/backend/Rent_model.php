<?php
class Rent_model extends CI_Model{

	//BACKEND
	function get_all_rent(){
		$result = $this->db->query("SELECT rent_id,rent_description,DATE_FORMAT(rent_date,'%d %M %Y') AS tanggal,category_name,rent_tags,rent_status,rent_acc,user_id,user_name,rent_sum FROM tbl_rents JOIN tbl_category ON rent_category_id=category_id JOIN tbl_user ON rent_user_id=user_id ORDER BY rent_date DESC");
		return $result;
	}

	function get_rent_by_id($rent_id){
		$result = $this->db->query("SELECT * FROM tbl_rents WHERE rent_id='$rent_id'");
		return $result;
	}

	

	function delete_rent($rent_id){
		$this->db->where('rent_id', $rent_id);
		$this->db->delete('tbl_rents');
	}
	
	//END BACKEND

}