<h1>Add Event</h1>
<?php echo $this->Form->create('Event', array('class' => 'form-inline')); ?>
<fieldset>
    <div class="row">
        <div class="form-group">
        	<label>Start Date</label>
            <?php echo $this->Form->input('StartDate', array('class' => 'form-control', 'label' => '')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
        	<label>End Date</label>
            <?php echo $this->Form->input('EndDate', array('class' => 'form-control', 'label' => '')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
        	<label>Description</label>
            <?php echo $this->Form->input('Description', array('class' => 'form-control', 'label' => '')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group"> 
        	<label>Location</label>
            <?php echo $this->Form->input('Location', array('class' => 'form-control', 'label' => '')); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group"> 
       	<button type="button" class="btn btn-warning">Cancel</button>
    	<button type="submit" class="btn btn-primary">Save Event</button>
    	</div>
    </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
