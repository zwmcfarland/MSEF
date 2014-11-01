<h2>Add School</h2>
<div class="row">
    <?php echo $this->Form->create('School'); ?>
        <fieldset>
            <div class="form-group">
                <label>Name</label>
                <?php echo $this->Form->input('Name', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>City</label>
                <?php echo $this->Form->input('City', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>State</label>
                <?php echo $this->Form->input('State', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Address 1</label>
                <?php echo $this->Form->input('Address1', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Address 2</label>
                <?php echo $this->Form->input('Address2', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Zip</label>
                <?php echo $this->Form->input('Zip', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save School</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
