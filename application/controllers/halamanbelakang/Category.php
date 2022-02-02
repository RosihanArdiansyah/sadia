<?php
class Category extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('halamaninputnya');
            redirect($url);
        };
		$this->load->model('backend/Category_model','category_model');
		$this->load->helper('text');
	}

	function index(){
		$x['data'] = $this->category_model->get_all_category();
		$this->load->view('backend/v_category',$x);
	}

	function save(){
		$category = htmlspecialchars($this->input->post('category_name',TRUE),ENT_QUOTES);
		$code = htmlspecialchars($this->input->post('category_code',TRUE),ENT_QUOTES);
		$price = htmlspecialchars($this->input->post('category_price',TRUE),ENT_QUOTES);
		$sum = htmlspecialchars($this->input->post('category_sum',TRUE),ENT_QUOTES);
		$date = $this->input->post('category_date');
		$tanggal = substr($date,0,10);
		
		$this->category_model->add_new_row($category,$code,$price,$sum,$tanggal);
		$this->session->set_flashdata('msg','success');
		redirect('halamanbelakang/category');
	}

	function edit(){
		$id		  = $this->input->post('kode',TRUE);
		$category = htmlspecialchars($this->input->post('category_name',TRUE),ENT_QUOTES);
		$code = htmlspecialchars($this->input->post('category_code',TRUE),ENT_QUOTES);
		$price = htmlspecialchars($this->input->post('category_price',TRUE),ENT_QUOTES);
		$sum = htmlspecialchars($this->input->post('category_sum',TRUE),ENT_QUOTES);
		$date = $this->input->post('category_date');
		$tanggal = substr($date,0,10);
		$this->category_model->edit_row($id,$category,$code,$price,$sum,$tanggal);
		$this->session->set_flashdata('msg','info');
		redirect('halamanbelakang/category');
	}

	function delete(){
		$id = $this->input->post('id',TRUE);
		$this->category_model->delete_row($id);
		$this->session->set_flashdata('msg','success-delete');
		redirect('halamanbelakang/category');
	}
}