<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('queries');
		$chkAdminExist = $this->queries->chkAdminExist();
		$this->load->view('inc/header');
		$this->load->view('main',['chkAdminExist'=>$chkAdminExist]);
		$this->load->view('inc/footer');
	}

	public function adminRegister()
	{
		$this->load->model('queries');
		$roles = $this->queries->getRoles();
		$this->load->view('inc/header');
		$this->load->view('register',['roles'=>$roles]);
		$this->load->view('inc/footer');
	}

	public function adminSignup()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role_id','Role','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confpwd','PasswordAgain','required');
		/*$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');*/
		if($this->form_validation->run())
		{
			$data = $this->input->post();
			$data['password'] = sha1($data['password']);
			$data['confpwd'] = sha1($data['confpwd']);

			$this->load->model('queries');
			if($this->queries->registerAdmin($data))
			{
				$this->session->set_flashdata('message', 'Admin Registered Successfully');
				 return redirect("welcome/adminRegister");
			}
			else
			{
				$this->session->set_flashdata('message', 'Admin not Registered Successfully');
				return redirect("welcome/adminRegister");
			}
			}

		else
		{
			$this->adminRegister();
		}
	}

	public function adminLogin()
	{
		$this->load->view('inc/header');
		$this->load->view('adminlogin');
		$this->load->view('inc/footer');
	}

	public function adminSignin()
	{
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('password', 'Password','required');

		if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password')) ;
			$this->load->model('queries');
			$userExist = $this->queries->adminExist($email, $password);

			if($userExist)
			{
				$session_data = [
                     'user_id'=>$userExist->user_id,
                     'username'=>$userExist->username,
                     'email'=>$userExist->email,
                     'role_id'=>$userExist->role_id,
				];
				$userid = $session_data['user_id'];
				if($session_data['role_id'] == 1)
				{
					$this->session->set_userdata($session_data);
				    return redirect("admin/dashboard");
				}
				elseif($session_data['role_id'] > 1)
				{
					$this->session->set_userdata($session_data);
					return redirect("coadmin/users/".$userid);
				}
				
			}
			else
			{
                echo"It cant be";
			}
		}
		else
		{
			$this->adminSignup();
		}
		}

		public function logout()
		{
            $this->session->unset_userdata("user_id");
            return redirect('welcome/adminLogin');
		}

   


}
