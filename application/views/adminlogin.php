<div class="row" style="margin-top: 20px;"></div>

<div class="container">
	<?php echo form_open("welcome/adminSignin",['class'=>'form-horizontal']);?>
	<?php if($msg = $this->session->flashdata('message')):?>
		<div class="row">
		 <div class="col-md-6">
			<div class="alert alert-dismissable alert-success"><?php echo $msg;?></div>			</div>
    	 </div>
	<?php endif?>
	<h2> Admin Login </h2>
 <hr>

 <!--Email label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">Email:</div>
		<div class="col-md-9">
		<?php echo form_input(['name'=>'email','value'=>set_value('email'), 'class'=>'form-control', 'placeholder'=>'eg @ example.com'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('email', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--Password label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label class="col-md-3 control-label">Password:</label>
		<div class="col-md-9">
		<?php echo form_input(['name'=>'password','type'=>'password','value'=>set_value('password'), 'class'=>'form-control', 'placeholder'=>'password'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('password', '<div class="text-danger">','</div>')?>
	</div>
</div>

<button class="btn btn-info" type="submit">LOGIN</button> 
<?php echo anchor("Welcome", "BACK",['class'=>'btn btn-info'])?>
<?php echo form_close();?>
</div>
