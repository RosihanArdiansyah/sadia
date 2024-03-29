<?php
class Post extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('halamaninputnya');
            redirect($url);
        };
		$this->load->model('backend/Tag_model','tag_model');
		$this->load->model('backend/Category_model','category_model');
		$this->load->model('backend/Post_model','post_model');
		$this->load->model('backend/Users_model','users_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$x['data'] = $this->post_model->get_all_post();
		$this->load->view('backend/v_post',$x);
	}

	function add_new(){
		$x['tag']	   = $this->tag_model->get_all_tag();
		$x['category'] = $this->category_model->get_all_category();
		$this->load->view('backend/v_add_post',$x);
	}

	function get_edit(){
		$post_id = $this->uri->segment(4);
		$x['tag']	   = $this->tag_model->get_all_tag();
		$x['category'] = $this->category_model->get_all_category();
		$x['data'] = $this->post_model->get_post_by_id($post_id);
		$this->load->view('backend/v_edit_post',$x);
	}

	function publish(){
		
		$category = $this->input->post('category',TRUE);
		$categoryName = $this->input->post('categoryName');
		$sum = $this->input->post('sum',TRUE);
		$catSum = $this->db->query('select category_sum from tbl_category where category_id ='.$category);
		if($categoryName == null){
		    $categoryName='';
		}
		$finSum = $catSum->result(); 
		
		$needs = $this->input->post('needs',TRUE);
		
		$dataPost = array();		
		$xtags[]=$this->input->post('tag');
		foreach($xtags as $tag){
			$tags = @implode(",", $tag);
		}
		
		//untuk gambar, bila ada gambar yang diupload
		//maka upload gambarnya, dan buat thumbnailnya
		
	    if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = './assets/images/post';
	    	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    	$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('filefoto')){
	            $img = $this->upload->data();
	            
	            if($category != '3') {
	                //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/post'.$img['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 500;
	            $config['height']= 320;
	            $config['new_image']= './assets/images/'.$img['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	            $this->_create_thumbs($img['file_name']);
	            }
	            
				$image=$img['file_name'];
			}else{
	            echo $this->session->set_flashdata('msg','warning');
	            redirect('halamanbelakang/post');
			}
			
	    }else{
			$image = '';
		}


		$description=htmlspecialchars($this->input->post('description',TRUE),ENT_QUOTES);
		$dataPost = array(
			'post_category_id'	 => $category,
			'post_category_name' => $categoryName,
			'post_needs' => $needs,
			'post_tags'		     => $tags,
			'post_description'	 => $description,
			'post_sum'           => $sum,
			'post_status' 	     => 0,
			'post_acc'		 	 => 0,
			'post_image' 	   => $image,
	        'post_user_id'	     => $this->session->userdata('id')
		);

		$this->db->insert('tbl_posts', $dataPost);
		$this->category_model->edit_sum($category,$sum);
		// $this->post_model->save_post($title,$contents,$category,$slug,$image,$document,$tags,$description);
		echo $this->session->set_flashdata('msg','success');
		echo $finSum;
		redirect('halamanbelakang/post');

	}

	function edit(){

		$id 	  = $this->input->post('post_id',TRUE);
		$user_id 	  = $this->input->post('post_user_id',TRUE);
		$category = $this->input->post('category',TRUE);
		$categoryName = $this->input->post('categoryName',TRUE);
		$needs = $this->input->post('needs',TRUE);
		$sum = $this->input->post('sum',TRUE);
		$status = $this->input->post('status',TRUE);
		$acc = $this->input->post('acc',TRUE);
		$dataPost = array();		
		$xtags[]=$this->input->post('tag');
		foreach($xtags as $tag){
			$tags = @implode(",", $tag);
		}
		


		$description=htmlspecialchars($this->input->post('description',TRUE),ENT_QUOTES);
		$dataPost = array(
			'post_category_id'	=> $category,
			'post_category_name' => $categoryName,
			'post_needs' => $needs,
			'post_tags'		=> $tags,
			'post_description'	=> $description,
			'post_sum' => $sum,
			'post_status' 	   => $status,
			'post_acc' 	   => $acc,
			'post_image' 	   => $image,
	        'post_user_id'	   => $user_id
		);
		
		//kalau ada file foto yang dieditkan ... 
	    if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = './assets/images/post';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
	        if ($this->upload->do_upload('filefoto')){
				
	            $img = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/post'.$img['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 100;
	            $config['height']= 100;
	            $config['new_image']= './assets/images/'.$img['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $this->_create_thumbs($img['file_name']);

				$image=$img['file_name'];
				$dataPost['post_image'] = $image;
				
	            

			}else{
	            echo $this->session->set_flashdata('msg','warning');
	            redirect('halamanbelakang/post');
	        }}
		
		
		

		$this->db->where('post_id', $id);
		$this->db->update('tbl_posts', $dataPost);


		// $this->db->insert('tbl_posts', $dataPost);
		
		

		// print_r($dataPost);
		// var_dump($dataPost);

		
		#$this->post_model->edit_post_with_img($id,$title,$contents,$category,$slug,$image,$tags,$description);
		echo $this->session->set_flashdata('msg','info');
		redirect('halamanbelakang/post');

	}

	function delete(){
		$post_id = $this->input->post('id',TRUE);
		$this->post_model->delete_post($post_id);
		echo $this->session->set_flashdata('msg','success-delete');
		redirect('halamanbelakang/post');
	}

	//upload image summernote
	function upload_image(){
		if(isset($_FILES["file"]["name"])){
			 $config['upload_path'] = './assets/images/post';
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
		            $config['width']= 100;
		            $config['height']= 100;
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
