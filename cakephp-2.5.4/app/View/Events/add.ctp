<h1>Add Event</h1>
<?php echo $this->Form->create('Event', array('class' => 'form-inline')); ?>
    <div class="row">
        <div class="form-group">
            <?php echo $this->Form->input('StartDate', array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?php echo $this->Form->input('EndDate', array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?php echo $this->Form->input('Description', array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group"> 
            <?php echo $this->Form->input('Location', array('class' => 'form-control')); ?>
        </div>
    </div>
<?php echo $this->Form->end('Save Event', array('class' => 'form-control')); ?>