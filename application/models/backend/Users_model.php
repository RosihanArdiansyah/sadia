<?php
class Users_model extends CI_Model{
	
	function get_users(){
		$hsl=$this->db->query("SELECT * FROM tbl_user");
		return $hsl;
	}

	function insert_user($nama,$email,$pass,$level,$gambar,$room){
		$hsl=$this->db->query("INSERT INTO tbl_user(user_name,user_email,user_password,user_level,user_status,user_photo,user_room_id) VALUES ('$nama','$email',MD5('$pass'),'$level','1','$gambar,$room')");
		return $hsl;
	}

	function insert_user_noimg($nama,$email,$pass,$level,$room){
		$hsl=$this->db->query("INSERT INTO tbl_user(user_name,user_email,user_password,user_level,user_status,user_room_id) VALUES ('$nama','$email',MD5('$pass'),'$level','1',$room)");
		return $hsl;
	}

	function update_user_nopass($userid,$nama,$email,$level,$gambar,$room){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_level='$level',user_photo='$gambar',user_room_id='$room' WHERE user_id='$userid'");
		return $hsl;
	}

	function update_user_nopassimg($userid,$nama,$email,$level,$room){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_level='$level',user_room_id='$room' WHERE user_id='$userid'");
		return $hsl;
	}

	function update_user($userid,$nama,$email,$pass,$level,$gambar,$room){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_password=MD5('$pass'),user_level='$level',user_photo='$gambar',,user_room_id='$room' WHERE user_id='$userid'");
		return $hsl;
	}

	function update_user_noimg($userid,$nama,$email,$pass,$level,$room){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_password=MD5('$pass'),user_level='$level',user_room_id='$room' WHERE user_id='$userid'");
		return $hsl;
	}

	function lock_user($user_id){
		$hsl=$this->db->query("UPDATE tbl_user SET user_status='0' WHERE user_id='$user_id'");
		return $hsl;
	}

	function unlock_user($user_id){
		$hsl=$this->db->query("UPDATE tbl_user SET user_status='1' WHERE user_id='$user_id'");
		return $hsl;
	}

	function delete_user($userid){
		$hsl=$this->db->query("DELETE FROM tbl_user WHERE user_id='$userid'");
		return $hsl;
	}

	function validasi_email($email){
		$hsl=$this->db->query("SELECT * FROM tbl_user WHERE user_email='$email'");
		return $hsl;
	}
}