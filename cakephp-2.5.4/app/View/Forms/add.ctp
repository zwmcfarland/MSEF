<h2>Add Form</h2>
<div class="row">
    <?php echo $this->Form->create('Form'); ?>
        <fieldset>
            <div class="form-group">
                <label>Name</label>
                <?php echo $this->Form->input('Name', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Path</label> <!-- TODO: this should probably be a file upload. --->
                <?php echo $this->Form->input('FormPath', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Form</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>