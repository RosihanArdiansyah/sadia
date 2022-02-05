<?php
class Room extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('halamaninputnya');
            redirect($url);
        };
		$this->load->model('backend/Room_model','room_model');
		$this->load->helper('text');
	}

	function index(){
		$x['data'] = $this->room_model->get_all_room();
		$this->load->view('backend/v_room',$x);
		$this->load->helper('text');
	}

	function save(){
		$room = strip_tags(htmlspecialchars($this->input->post('room',TRUE),ENT_QUOTES));
		$this->room_model->add_new_row($room);
		$this->session->set_flashdata('msg','success');
		redirect('halamanbelakang/room');
	}

	function edit(){
		$id		 = $this->input->post('kode',TRUE);
		$room 	 = strip_tags(htmlspecialchars($this->input->post('room2',TRUE),ENT_QUOTES));
		$this->room_model->edit_row($id,$room);
		$this->session->set_flashdata('msg','info');
		redirect('halamanbelakang/room');
	}

	function delete(){
		$id = $this->input->post('id',TRUE);
		$this->room_model->delete_row($id);
		$this->session->set_flashdata('msg','success-delete');
		redirect('halamanbelakang/room');
	}
	

}