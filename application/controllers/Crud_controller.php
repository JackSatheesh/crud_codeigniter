<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_controller extends CI_Controller {
	public function index()
	{
		$this->load->model('crud_model');
		$data['value'] = $this->crud_model->student_view();
		$this->load->view('crud_view', $data);
	}
	public function crud_add()
	{
		
		$this->load->view('crud_add');
	}
	public function add_student()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('usermail', 'UserEmail', 'required|valid_email');
		$this->form_validation->set_rules('usercity', 'Usercity', 'required');
		
		if($this->form_validation->run() == TRUE){
			$data = array(
				"user_name" => $this->input->post("username"),
				"user_email" => $this->input->post("usermail"),
				"user_city" => $this->input->post("usercity"),
			);
			if(isset($_FILES['userimage']) && $_FILES['userimage']['size'] > 0){
				$config['upload_path'] = "uploads"; 
				$config['allowed_types'] = "gif|jpg|png";

				$new_filename = 'student' . time() . '-' . $_FILES['userimage']['name'];
				$config['file_name'] = $new_filename;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('userimage')) {
					$uploaddata = $this->upload->data();
					//print_r($uploaddata); die;
					$data['user_image'] = "uploads/" . $uploaddata['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata("error",$error['error']);
					redirect(base_url(). "insertafter");
				}
			}else{
				if($this->input->post('current_image')){
					$data['user_image'] = $this->input->post('current_image');
				}
			}
			if($this->input->post("add")){
				$this->load->model('crud_model');
				$this->crud_model->student_add($data);
				$this->session->set_flashdata("success","Student details added successfully");
			}
			if($this->input->post("update")){
				$id = $this->input->post("userid");
				$this->load->model('crud_model');
				$this->crud_model->student_update($id, $data);
				$this->session->set_flashdata("success","Student details updated successfully");
			}	
			
			redirect(base_url(). "insertafter");
		}else{
			$this->session->set_flashdata("error",validation_errors());
			redirect(base_url(). "insertafter");
		}
	}
	public function insertafter()
	{
		$this->index();
	}
	public function student_edit($id)
	{
		$this->load->model('crud_model');
		$data['edit'] = $this->crud_model->student_edit($id);
		$this->load->view('crud_edit', $data);
	}
	public function delete($id)
	{
		$this->load->model('crud_model');
		$this->crud_model->student_delete($id);
		redirect(base_url(). "insertafter");
	}
}
