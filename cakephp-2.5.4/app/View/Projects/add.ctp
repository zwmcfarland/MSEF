<h2>Add Project</h2>

<?php echo $this->Form->create('Project'); ?>
<fieldset>
	<div class="form-group">
		<label>Name</label>
		<?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
	</div>
	<div class="form-group">
		<label>Description</label>
		<?php echo $this->Form->textarea('Description', array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label>Abstract</label>
		<?php echo $this->Form->textarea('Abstract', array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<div style="margin-left:20px;">
			<?php echo $this->Form->input('Electrical', array('label' => 'This project will require an electrical connection.')); ?>
		</div>
	</div>
	<button type="button" class="btn btn-warning">Cancel</button>
	<button type="button" class="btn btn-primary">Save Project</button>
</fieldset>
<?php echo $this->Form->end(); ?>
