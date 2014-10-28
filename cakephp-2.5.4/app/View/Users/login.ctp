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
			<?php echo $this->Form->end(__('Login', array('label' => 'Sign in', 'class' => 'btn btn-primary'))); ?>
		</div>
</div>