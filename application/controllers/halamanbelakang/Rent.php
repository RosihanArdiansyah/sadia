<?php
class Rent extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('halamaninputnya');
            redirect($url);
        };
		$this->load->model('backend/Tag_model','tag_model');
		$this->load->model('backend/Category_model','category_model');
		$this->load->model('backend/rent_model','rent_model');
		$this->load->model('backend/Users_model','users_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$x['data'] = $this->rent_model->get_all_rent();
		$this->load->view('backend/v_rent',$x);
	}

	function add_new(){
		$x['tag']	   = $this->tag_model->get_all_tag();
		$x['category'] = $this->category_model->get_all_category();
		$this->load->view('backend/v_add_rent',$x);
	}

	function get_edit(){
		$rent_id = $this->uri->segment(4);
		$x['tag']	   = $this->tag_model->get_all_tag();
		$x['category'] = $this->category_model->get_all_category();
		$x['data'] = $this->rent_model->get_rent_by_id($rent_id);
		$this->load->view('backend/v_edit_rent',$x);
	}

	function publish(){
		
		$category = $this->input->post('category',TRUE);
		$sum = $this->input->post('sum',TRUE);
		$dataRent = array();		
		$xtags[]=$this->input->post('tag');
		foreach($xtags as $tag){
			$tags = @implode(",", $tag);
		}


		$description=htmlspecialchars($this->input->post('description',TRUE),ENT_QUOTES);
		$dataRent = array(
			'rent_name'	=> $category,
			'rent_tags'		=> $tags,
			'rent_description'	=> $description,
			'rent_sum' => $sum,
			'rent_status' 	   => 0,
			'rent_acc' 	   => 0,
	        'rent_user_id'	   => $this->session->userdata('id')
		);

		$this->db->insert('tbl_rents', $dataRent);
		// $this->rent_model->save_rent($title,$contents,$category,$slug,$image,$document,$tags,$description);
		echo $this->session->set_flashdata('msg','success');
		redirect('halamanbelakang/rent');

	}

	function edit(){

		$id 	  = $this->input->post('rent_id',TRUE);
		$user_id 	  = $this->input->post('rent_user_id',TRUE);
		$category = $this->input->post('category',TRUE);
		$sum = $this->input->post('sum',TRUE);
		$status = $this->input->post('status',TRUE);
		$acc = $this->input->post('acc',TRUE);
		$dataRent = array();		
		$xtags[]=$this->input->post('tag');
		foreach($xtags as $tag){
			$tags = @implode(",", $tag);
		}


		$description=htmlspecialchars($this->input->post('description',TRUE),ENT_QUOTES);
		$dataRent = array(
			'rent_name'	=> $category,
			'rent_tags'		=> $tags,
			'rent_description'	=> $description,
			'rent_sum' => $sum,
			'rent_status' 	   => $status,
			'rent_acc' 	   => $acc,
	        'rent_user_id'	   => $user_id
		);
		

		$this->db->where('rent_id', $id);
		$this->db->update('tbl_rents', $dataRent);


		// $this->db->insert('tbl_rents', $datarent);
		
		

		// print_r($datarent);
		// var_dump($datarent);

		
		#$this->rent_model->edit_rent_with_img($id,$title,$contents,$category,$slug,$image,$tags,$description);
		echo $this->session->set_flashdata('msg','info');
		redirect('halamanbelakang/rent');

	}

	function delete(){
		$rent_id = $this->input->rent('id',TRUE);
		$this->rent_model->delete_rent($rent_id);
		echo $this->session->set_flashdata('msg','success-delete');
		redirect('halamanbelakang/rent');
	}

	//upload image summernote
	function upload_image(){
		if(isset($_FILES["file"]["name"])){
			 $config['upload_path'] = './assets/images/';
			 $config['allowed_types'] = 'jpg|jpeg|png|gif';
			 $this->upload->initialize($config);
			 if(!$this->upload->do_upload('file')){
					$this->upload->display_errors();
					return FALSE;
			 }else{
					$data = $this->upload->data();
		            //Compress Image
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/'.$data['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= TRUE;
		            $config['quality']= '60%';
		            $config['width']= 800;
		            $config['height']= 800;
		            $config['new_image']= './assets/images/'.$data['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();
					echo base_url().'assets/images/'.$data['file_name'];
			 }
		}
	}


	function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 370,
                'height'        => 237,
                'new_image'     => './assets/images/thumb/'.$file_name
                ));

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }


}
