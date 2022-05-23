<?php

class Coadmin extends CI_Controller
{

	public function users($userid)
	{
		$this->load->model('queries');
		$colls = $this->queries->coColleges($userid);
		$this->load->view('inc/header');
		$this->load->view('admin/coadminsdash',['colls'=>$colls]);
		$this->load->view('inc/footer');
	}
}