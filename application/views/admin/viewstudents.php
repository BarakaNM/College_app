<div class="row" style="margin-top:30px;"></div>
<div class="container">
	<h3>STUDENT'S LIST</h3>
	<?php $username = $this->session->userdata('username')?>
	<h5>Welcome <?php echo $username;?></h5>
	<div class="row" style="margin-top:10px;"></div>
	<?php echo anchor('welcome/','BACK',['class'=>'btn btn-info']);?>
   <div class="row" style="margin-top:20px;"></div>

    <div class="row">
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th scope="col">Name</th>
    				<th scope="col">College Name</th>
    				<th scope="col">Course</th>
    				<th scope="col">Gender</th>
    				<!--<th scope="col">Email</th>
    				<th scope="col">Role</th>
    				<th scope="col">Gender</th>
    				<th scope="col">Branch</th>
    				<th scope="col">Action</th>-->
    			</tr>
    		</thead>
    		<tbody>
    			<?php if(count($students)): ?>
    				<?php foreach($students as $student):?>
    			<tr>
    				<td><?php echo $student->studentname?></td>
    				<td><?php echo $student->collegename?></td>
    				<td><?php echo $student->course?></td>
    				<td><?php echo $student->gender?></td>
    				<td>
    					<?php echo anchor("admin/editStudents/{$student->student_id}",'Edit',['class'=>'btn btn-info']);?>

    					<?php echo anchor("admin/deleteStudent/{$student->student_id}",'Delete',['class'=>'btn btn-success']);?>
    				</td>
    				</tr>
    				<?php endforeach?> 
    		    <?php else:?>
    			<tr>
    				<td>No record</td>
    			</tr>
    			<?php endif?>
    		</tbody>
    	</table>
    </div>	
</div>