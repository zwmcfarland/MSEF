<div class="users form">
	<h3>Sign In</h3>
	<?php echo $this->Form->create('User'); ?>
	<div class="form-group">
		<label for="txtEmail">Email Address</label>
		<?php echo $this->Form->input('Email', array('type' => 'text', 'class' => 'form-control', 'label' => ''));?>
	</div>
	<div class="form-group">
		<label for="txtEmail">Password</label>
		<?php echo $this->Form->input('Password', array('type' => 'password', 'class' => 'form-control', 'label' => '')); ?>
	</div>
	<div class="form-group" align="left">
		<button type="button" class="btn btn-info" onclick="window.location='add';">Register</button>
		<button type="submit" class="btn btn-success">Sign In</button>
		<?php echo $this->Form->end(); ?>
	</div>
</div>