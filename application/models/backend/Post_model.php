<?php
class Post_model extends CI_Model{

	//BACKEND
	function get_all_post(){
		$result = $this->db->query("SELECT post_id,post_description,post_category_name,post_image,post_needs,DATE_FORMAT(post_date,'%d %M %Y') AS tanggal,category_name,post_tags,post_status,post_acc,user_id,user_name,post_sum FROM tbl_posts JOIN tbl_category ON post_category_id=category_id JOIN tbl_user ON post_user_id=user_id ORDER BY post_date DESC");
		return $result;
	}

	function get_post_by_id($post_id){
		$result = $this->db->query("SELECT * FROM tbl_posts WHERE post_id='$post_id'");
		return $result;
	}

	

	function delete_post($post_id){
		$this->db->where('post_id', $post_id);
		$this->db->delete('tbl_posts');
	}
	
	//END BACKEND

}