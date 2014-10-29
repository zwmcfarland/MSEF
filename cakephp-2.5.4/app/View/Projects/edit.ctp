<h2>Edit Project</h2>
<?php echo $this->Form->create('Project'); ?>
<fieldset>
	<div class="form-group">
		<label>Name:</label>
		<?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
	</div>
	<div class="form-group">
		<label>Status:</label>
		<?php echo $this->Form->select('StatusId', array('class' => 'form-control', 'label' => '')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('Description'); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('Abstract'); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('Electrical'); ?>
		<?php echo $this->Form->input('Id', array('type' => 'hidden')); ?>
	</div>
	
</fieldset>
<?php echo $this->Form->end('Save Project'); ?>
