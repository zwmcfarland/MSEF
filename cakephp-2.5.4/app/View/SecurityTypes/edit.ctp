<h1>Edit Security Type</h1>
<?php
echo $this->Form->create('SecurityType'); ?>

<fieldset>
    <div class="row">
        <div class="form-group">
        	<label>Name</label>
            <?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
        	<label>Description</label>
            <?php echo $this->Form->input('Description', array('class' => 'form-control', 'label' => '')); ?>
        </div>
    </div>
    <div class="form-group"> 
       	<button type="button" class="btn btn-warning">Cancel</button>
    	<button type="submit" class="btn btn-primary">Save Award</button>
    </div>
</fieldset>
    
<?php echo $this->Form->input('Id', array('type' => 'hidden')); ?>
<?php echo $this->Form->end(); ?>