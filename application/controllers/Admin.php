<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("user_id"))
			return redirect("welcome/adminLogin");

	}

	public function dashboard()
	{
		$this->load->model('queries');
		$colls = $this->queries->viewColleges();
		$this->load->view('inc/header');
		$this->load->view('admin/dashboard',['colls'=>$colls]);
		$this->load->view('inc/footer');
	}

	public function addCollege()
	{
		$this->load->view('inc/header');
		$this->load->view('admin/addcollege');
		$this->load->view('inc/footer');
	}

	public function createCollege()
	{
        $this->form_validation->set_rules('collegename', 'College Name', 'required');
		$this->form_validation->set_rules('branch', 'Branch', 'required');

		if($this->form_validation->run()){
			$data = $this->input->post();
			$this->load->model('queries');
			$inscol = $this->queries->insCollege($data);
			if($inscol)
			{
				$this->session->set_flashdata('message', 'College successfully added');
				return redirect("admin/addCollege");
			}
			else
			{
				$this->session->set_flashdata('message','Something went wrong, Please try again later');
				$this->addCollege();
			}
		}
		else
		{

			$this->addCollege();
		}
	}

	public function addCoadmin()
	{
		$this->load->model('queries');
		$roles = $this->queries->getRoles();
		$cols = $this->queries->getCollege();
		$this->load->view('inc/header');
		$this->load->view('admin/addcoadmin',['cols'=>$cols, 'roles'=>$roles]);
		$this->load->view('inc/footer');
		
	}

	public function createCoadmin()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role_id','Role','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confpwd','PasswordAgain','required');

		if($this->form_validation->run())
		{
			$data = $this->input->post();
			$data['password'] = sha1($data['password']);
			$data['confpwd'] = sha1($data['confpwd']);

			$this->load->model('queries');
			$ins = $this->queries->insCoadmin($data);
			if($ins)
			{
				$this->session->set_flashdata('message', "Co-admin successfully added");
				$this->addCoadmin();
			}
			else
			{
				$this->session->flashdata('message', "Something went wrong, please try again");
			}

		}
		else
		{
			$this->	addCoadmin();	
		}
	}

	public function addStudents(){
		$this->load->model('queries');
		$cols = $this->queries->getCollege();

		$this->load->view('inc/header');
		$this->load->view('admin/addstudents',['cols'=>$cols]);
		$this->load->view('inc/footer');
	}

	public function createStudent(){
		$this->form_validation->set_rules('studentname','Student Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course','required');

		if($this->form_validation->run())
		{
			$data = $this->input->post();
			$this->load->model('queries');

			$check = $this->queries->adStudent($data);
            if($check)
            {
              	$this->session->set_flashdata('message', 'Student Added Successfully');
              	$this->addStudents();
            }
            else
            {
            	$this->session->set_flashdata('message', 'Something went wrong.Please try again later');
            	$this->addStudents();
            }

		}
		else
		{
			echo"wa";
		}
	}

	public function viewStudents($college_id)
	{
		$this->load->model('queries');
		$students = $this->queries->fetchStudents($college_id);
		$this->load->view('inc/header');
		$this->load->view('admin/viewstudents',['students'=>$students]);
		$this->load->view('inc/footer');
	}

	public function editStudents($studid)
	{
		$this->load->model('queries');
		$student = $this->queries->getStudent($studid);
		$colls = $this->queries->getCollege();
		$this->load->view('inc/header');
		$this->load->view('admin/editStudents',['student'=>$student,'colls'=>$colls]);
		$this->load->view('inc/footer');
	}

	public function modifyStudent($id)
	{
		$this->form_validation->set_rules('studentname','Student Name','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course','required');

		if($this->form_validation->run())
		{
			$data = $this->input->post();
			$this->load->model('queries');
			if($this->queries->updateStudent($id,$data))
			{
				$this->session->set_flashdata('message','Student updated successfully');
				$this->editStudents($id);
			}
			else
			{
				$this->session->set_flashdata('message','Student not updated successfully');
			}
		}
		else
		{
			echo validation_errors();
		}
	}

	public function deleteStudent($id)
	{
		$this->load->model('queries');
		if($this->queries->deleteData($id))
		{
			$this->session->set_flashdata('message','Student deleted successfully');
			$this->dashboard();
		}
		else
		{
			$this->session->set_flashdata('message', 'Student not deleted');
		}
	}
}
?>
