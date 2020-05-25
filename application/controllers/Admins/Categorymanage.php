<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorymanage extends CI_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->userdata('userlogin'))
		{
			return redirect('Admin');
		}
		$this->admin_data=$this->session->userdata('userlogin');
    }
	public function index()
	{
		
		$results=$this->Common_models->get_entry('category_list','','id','DESC');
		$data['cat_lists']=$results;
		$this->load->view('admin_panel/common_layout/header');
		$this->load->view('admin_panel/category_management_view',$data);
		$this->load->view('admin_panel/common_layout/footer');
	}
	public function add_cat()
	{
		$userdata['category_name']=$this->input->post('category_name');
		if($_FILES['image']['name'])
		{
			$fname=time().'.png';
			if(move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/".$fname)){
				$userdata['image']=$fname;
			}
		}
		$datass=$this->Common_models->add_entry('category_list',$userdata);
		if($datass)
		{
			
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Category Added.</p>');
		}
		else
		{
			$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Invalid login details.</p>');
		}
		return redirect('Admins/Categorymanage');
	}
	public function edit_cat($id)
	{
		$userdata['category_name']=$this->input->post('category_name');
		if($_FILES['image']['name'])
		{
			$fname=time().'.png';
			if(move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/".$fname)){
				$userdata['image']=$fname;
			}
		}
		$datass=$this->Common_models->update_entry('category_list',$userdata,array('id'=>$id));
		if($datass)
		{
			
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Category Updated.</p>');
		}
		else
		{
			$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Invalid login details.</p>');
		}
		return redirect('Admins/Categorymanage');
	}
	public function delete_cat($id)
	{
		
		$datass=$this->Common_models->delete_entry('category_list',array('id'=>$id));
		if($datass)
		{
			
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Category Deleted.</p>');
		}
		else
		{
			$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Invalid login details.</p>');
		}
		return redirect('Admins/Categorymanage');
	}
	
	
	
}
