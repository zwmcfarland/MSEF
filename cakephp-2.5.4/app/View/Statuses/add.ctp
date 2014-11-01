<h2>Add Status</h2>
<div class="row">
    <?php echo $this->Form->create('Status'); ?>
        <fieldset>
            <div class="form-group">
                <label>Name:</label>
                <?php echo $this->Form->input('Name', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Description</label>
                <?php echo $this->Form->input('Description', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <button type="button" class="btn-warning btn" onclick="window.location='./';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
