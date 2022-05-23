<div class="row" style="margin-top:16px ;"></div>

<div class="container">
<div class="jumbotron">
	<h4 class="display-4" style="text-align: center;">ADMIN & CO-ADMIN LOGIN</h4>

	<div class="my-3">
	<div class="row">
		<div class="col-lg-4"></div>
        <div class="col-lg-4">
		<?php if($chkAdminExist>0):?>
		<?php else:?>
		<?php echo anchor("welcome/adminRegister", "ADMIN REGISTER", ['class'=>'btn btn-info'])?>
		<?php endif;?>
		<?php echo anchor("welcome/adminLogin", "ADMIN LOGIN", ['class'=>'btn btn-info'])?>
		</div>
		<div class="col-lg-4"></div>
	</div>
	</div>
	
</div>	
</div>



	
