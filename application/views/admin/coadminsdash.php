<div class="row" style="margin-top:30px;"></div>
<div class="container">
	<h3>CO-ADMIN DASHBOARD</h3>
	<?php $username = $this->session->userdata('username')?>
	<h5>Welcome <?php echo $username;?></h5>
	<div class="row" style="margin-top:30px;"></div>
	
    <div class="row">
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th scope="col">ID</th>
    				<th scope="col">College Name</th>
    				<th scope="col">Branch</th>
    				<th scope="col">Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php if(count($colls)): ?>
    				<?php foreach($colls as $coll):?>
    			<tr>
    				<td><?php echo $coll->college_id?></td>
    				<td><?php echo $coll->collegename?></td>
    				<td><?php echo $coll->branch?></td>
    				<td>
    				<?php echo anchor("admin/viewStudents/{$coll->college_id}",'View Students', ['class'=>'btn btn-success']);?>
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