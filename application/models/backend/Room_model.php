<?php
class Room_model extends CI_Model{

	//BACKEND
	function get_all_room(){
		$result = $this->db->get('tbl_rooms');
		return $result; 
	}

	function add_new_row($room){
		$data = array(
	        'room_name' => $room
		);
		$this->db->insert('tbl_rooms', $data);
	}

	function edit_row($id,$room){
		$data = array(
	        'room_name' => $room
		);
		$this->db->where('room_id', $id);
		$this->db->update('tbl_rooms', $data);
	}

	function delete_row($id){
		$this->db->where('room_id', $id);
		$this->db->delete('tbl_rooms');
	}
	
	
	//END BACKEND

}