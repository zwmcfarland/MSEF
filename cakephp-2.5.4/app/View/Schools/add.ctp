<h2>Add School</h2>
<?php echo $this->Form->create('School', array(
	'class' => 'form-horizontal', 
	'role' => 'form',
	'inputDefaults' => array(
	    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
	    'div' => array('class' => 'form-group'),
	    'class' => array('form-control'),
	    'label' => array('class' => 'col-sm-2  control-label'),
	    'between' => '<div class="col-sm-10">',
	    'after' => '</div>',
	    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
))); ?>

<<<<<<< HEAD
	<fieldset>
		<div class="form-group">
			<label>Name</label>
	    	<?php echo $this->Form->input('Name', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	        <label>City</label>
	        <?php echo $this->Form->input('City', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>State</label>
	    	<?php echo $this->Form->input('State', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>Address 1</label>
	        <?php echo $this->Form->input('Address1', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>Address 2</label>
	    	<?php echo $this->Form->input('Address2', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>Zip</label>
	    	<?php echo $this->Form->input('Zip', array('label' => '')); ?>
	    </div>
	</fieldset>
	<button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
	<button type="submit" class="btn btn-primary">Save School</button>
<?php echo $this->Form->end(); ?>



=======
<fieldset>
    <?php echo $this->Form->input('Name'); ?>
    <?php echo $this->Form->input('City'); ?>
    <?php echo $this->Form->input('State'); ?>
    <?php echo $this->Form->input('Address1'); ?>
    <?php echo $this->Form->input('Address2'); ?>
    <?php echo $this->Form->input('Zip'); ?>
    <div class="col-sm-offset-2 col-sm-10">
	<?php echo $this->Form->submit('Save School', array('class' => 'btn btn-default')); ?>
    </div>
</fieldset>    
>>>>>>> 55804c13c9673455f724790bcf932889e21646ff
