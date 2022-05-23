<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>College management System</title>
  <!--Bootstrap CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <!--Font-awesome-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
</head>

<body>
  <!--navbar-->
<nav class="navbar navbar-inverse  bg-info">
	<div class="container-fluid">
		<div class="navbar header col-lg-10">
			<a href="" class="navbar-brand" style="color:#fff;">COLLEGE MANAGEMENT SYSTEM</a>
		</div>
    
    <!--dropdown-->
 <div class="col-lg-2" style="margin-top:15px;" id = "bs-example-navbar-collapse-2">
   <div class="dropdown show">
  <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings
  </a>
  <?php  $role_id=$this->session->userdata('role_id');?>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <?php if($role_id == 1):?>
    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/dashboard');?>">Dashboard</a>
    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/coadmins');?>">View Co-admins</a>
    <a class="dropdown-item" href="<?php echo base_url('index.php/welcome/logout')?>"> logout</a>
    <?php elseif($role_id>1):?>
    <a class="dropdown-item" href="<?php echo base_url('index.php/welcome/logout')?>"> logout</a>
    <?php endif?>
  </div>
  </div>
 </div>
</nav>


