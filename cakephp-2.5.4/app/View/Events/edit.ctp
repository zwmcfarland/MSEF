<h2>Edit Post</h2>
<div class="row">
	<?php echo $this->Form->create('Event'); ?>
		<fieldset>
			<div class="form-group">
				<label>Name</label>
				<?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
			</div>
	        <div class="form-group form-inline">
	        	<label>Start Date</label>
	            <?php echo $this->Form->input('StartDate', array('class' => 'form-control', 'label' => '')); ?>
	        </div>
        	<div class="form-group form-inline">
        		<label>End Date</label>
            	<?php echo $this->Form->input('EndDate', array('class' => 'form-control', 'label' => '')); ?>
        	</div>
	        <div class="form-group">
	        	<label>Description</label>
	            <?php echo $this->Form->textarea('Description', array('class' => 'form-control', 'label' => '', 'cols' => '5')); ?>
	        </div>
	        <div class="form-group"> 
	        	<label>Location</label>
	            <?php echo $this->Form->textarea('Location', array('class' => 'form-control', 'label' => '', 'cols' => '5')); ?>
	        </div>
        	<div class="form-group"> 
       			<button type="button" class="btn btn-warning">Cancel</button>
    			<button type="submit" class="btn btn-primary">Save Event</button>
    		</div>
    	</fieldset>
	<?php echo $this->Form->end();?>
</div>
