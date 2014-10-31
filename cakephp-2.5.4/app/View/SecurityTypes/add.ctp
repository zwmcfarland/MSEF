<h1>Add Security Type</h1>
<?php
    echo $this->Form->create('SecurityType'); ?>
<fieldset>
    <div class="form-group">
    	<label>Name</label>
        <?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
    </div>
    <div class="form-group">
    	<label>Description</label>
        <?php echo $this->Form->input('Description', array('class' => 'form-control', 'label' => '')); ?>
    </div>
    <div class="form-group"> 
       	<button type="button" class="btn btn-warning">Cancel</button>
    	<button type="submit" class="btn btn-primary">Save Security Type</button>
    </div>
</fieldset>
<?php echo $this->Form->end();
?>
