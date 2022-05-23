<div class="row" style="margin-top: 20px;">
	
</div>

<div class="container">
	<?php echo form_open("admin/modifyStudent/{$student->student_id}",['class'=>'form-horizontal']);?>
	<?php if($msg = $this->session->flashdata('message')):?>
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-dismissable alert-success"><?php echo $msg;?></div>
			</div>	
		</div>
	<?php endif?>
	<h2> Student Form </h2>

<hr>

<!--Student Name label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label class="col-md-3 control-label">Student Name:</label>
		<div class="col-md-9">
		<?php echo form_input(['name'=>'studentname','value'=>set_value('studentname',$student->studentname), 'class'=>'form-control', 'placeholder'=>'studentname'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('studentname', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--Course label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">Course:</div>
		<div class="col-md-9">
			<?php echo form_input(['name'=>'course','value'=>set_value('course',$student->course), 'class'=>'form-control', 'placeholder'=>'course'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
		<?php echo form_error('course', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--College Name label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">College Name:</div>
			<select class="col-md-9 form-control" name="college_id">
				<option value="<?php echo($student->college_id);?>"><?php echo($student->collegename);?></option>
				<?php if(count($colls)):?>
					<?php foreach($colls as $col):?>
				<option value=<?php echo $col->college_id?>><?php echo $col->collegename?></option>
			        <?php endforeach;?>
                <?php endif;?>
			</select>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('role', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--Gender label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">Gender:</div>
			<select class="col-md-9 form-control" name="gender">
				<option value=""><?php echo($student->gender);?></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<?php echo form_error('gender', '<div class="text-danger">','</div>')?>
	</div>
</div>

<button class="btn btn-info" type="submit">Update</button> 
<?php echo anchor("Welcome", "BACK",['class'=>'btn btn-info'])?>
<?php echo form_close();?>
</div>

