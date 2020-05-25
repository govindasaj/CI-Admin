<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	public function index()
	{
		if($this->session->userdata('userlogin'))
		{
			return redirect('Admin/dashboard');
		}
		$this->load->view('admin_panel/login_view');
	}
	public function do_login()
	{
		$userdata=$this->input->post();
		$userdata['password']=md5($userdata['password'].Salts);
		$results=$this->Common_models->get_entry('admin',$userdata);
		if(count($results))
		{
			$this->session->set_userdata('userlogin', $results[0]);
			return redirect('Admin/dashboard');
		}
		else
		{
			$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Invalid login details.</p>');
		}
		return redirect('Admin');
	}
	public function dashboard()
	{
		$this->load->view('admin_panel/common_layout/header');
		$this->load->view('admin_panel/dashboard_view');
		$this->load->view('admin_panel/common_layout/footer');
	}
	public function manage_profile()
	{
		$this->load->view('admin_panel/common_layout/header');
		$this->load->view('admin_panel/myprofile_view'); 
		$this->load->view('admin_panel/common_layout/footer');
	}
	public function update_profile()
	{
		$admin_data=$this->session->userdata('userlogin');
		$userdatas=$this->input->post();
		$userdata['name']=$userdatas['name'];
		$results=$this->Common_models->update_entry('admin',$userdata,array('id'=>$admin_data['id']));
		if($results)
		{
			$results_data=$this->Common_models->get_entry('admin',array('id'=>$admin_data['id']));
			$this->session->set_userdata('userlogin', $results_data[0]);
			$this->session->set_flashdata('response','<p class="alert alert-success">Success! Profile Updated Successfully.</p>');
		}
		else
		{
			$this->session->set_flashdata('response','<p class="alert alert-danger">Error! Something went wrong.</p>');
		}
		return redirect('Admin/manage_profile');

	}
	public function changeuserpassword()
	{
		$userdatas=$this->input->post();
		$admin_data=$this->session->userdata('userlogin');
		$password=md5($userdatas['Current_Password'].Salts);
		$results_data=$this->Common_models->get_entry('admin',array('id'=>$admin_data['id'],'password'=>$password));
		if(count($results_data))
		{
			$userdata['password']=md5($userdatas['New_Password'].Salts);
			$this->Common_models->update_entry('admin',$userdata,array('id'=>$admin_data['id']));
			echo "1";
		}
		else 
		{
			echo "0";
		}
		die;
	}
	public function logout()
	{
		$this->session->unset_userdata('userlogin');
		return redirect('Admin/manage_profile');
	}
	
}
