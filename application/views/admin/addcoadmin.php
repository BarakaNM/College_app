<div class="row" style="margin-top: 20px;"></div>

<div class="container">
	<?php echo form_open("admin/createCoadmin",['class'=>'form-horizontal']);?>
	<?php if($msg = $this->session->flashdata('message')):?>
	<div class="row">
		<div class="col-md-6">
		<div class="alert alert-dismissable alert-success"><?php echo $msg;?></div>
		</div>	
	</div>
	<?php endif?>
	<h2> Co-Admin Registration </h2>

<hr>

<!--Username label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label class="col-md-3 control-label">Username:</label>
		<div class="col-md-9">
		<?php echo form_input(['name'=>'username','value'=>set_value('username'), 'class'=>'form-control', 'placeholder'=>'Username'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('username', '<div class="text-danger">','</div>')?>
	</div>
</div>

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

<!--College Name label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">College Name:</div>
			<select class="col-md-9 form-control" name="college_id">
				<option value="">Select</option>
				<?php if(count($cols)):?>
					<?php foreach($cols as $col):?>
				<option value=<?php echo $col->college_id?>><?php echo $col->collegename?></option>
			        <?php endforeach;?>
                <?php endif;?>
			</select>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('collegename', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--Gender label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">Gender:</div>
			<select class="col-md-9 form-control" name="gender">
				<option value="">Select</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('gender', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--Role label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">Role:</div>
			<select class="col-md-9 form-control" name="role_id">
				<option value="">Select</option>
				<?php if(count($roles)):?>
					<?php foreach($roles as $role):?>
				<option value=<?php echo $role->role_id?>><?php echo $role->rolename?></option>
			        <?php endforeach;?>
                <?php endif;?>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<?php echo form_error('role', '<div class="text-danger">','</div>')?>
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

<!--Password label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label class="col-md-3 control-label">PasswordAgain:</label>
		<div class="col-md-9">
			<?php echo form_input(['name'=>'confpwd', 'class'=>'form-control','type'=>'password','value'=>set_value('confpwd'), 'placeholder'=>'password'])?>
		</div>
		</div>
		
	</div>
	<div class="col-md-6">
		<?php echo form_error('confpwd', '<div class="text-danger">','</div>')?>
	</div>
</div>


<button class="btn btn-info" type="submit">Register</button> 
<?php echo anchor("ADMIN/dashboard", "BACK",['class'=>'btn btn-info'])?>
<?php echo form_close();?>
</div>

