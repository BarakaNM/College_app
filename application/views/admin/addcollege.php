<div class="row" style="margin-top: 20px;"></div>
	
<div class="container">
	<?php echo form_open("admin/createCollege",['class'=>'form-horizontal']);?>
	<?php if($msg = $this->session->flashdata('message')):?>
	<div class="row">
		<div class="col-md-6">
			<div class="alert alert-dismissable alert-success"><?php echo $msg;?></div>
		</div>
			
	</div>
	<?php endif?>
	<h2> ADD COLLEGE </h2>

<hr>

<!--College Name label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<div class="col-md-3 control-label">College Name:</div>
		<div class="col-md-9">
		<?php echo form_input(['name'=>'collegename','value'=>set_value('collegename'), 'class'=>'form-control', 'placeholder'=>'collegename'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('collegename', '<div class="text-danger">','</div>')?>
	</div>
</div>

<!--Branch label and input-->
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label class="col-md-3 control-label">Branch:</label>
		<div class="col-md-9">
		<?php echo form_input(['name'=>'branch','value'=>set_value('branch'), 'class'=>'form-control', 'placeholder'=>'password'])?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
	<?php echo form_error('branch', '<div class="text-danger">','</div>')?>
	</div>
</div>

<button class="btn btn-info" type="submit">ADD</button> 
<?php echo anchor("admin/dashboard", "BACK",['class'=>'btn btn-info'])?>
<?php echo form_close();?>
</div>
