<h2>Add Category</h2>
<div class="row">
    <?php echo $this->Form->create('Category'); ?>
        <fieldset>
            <div class="form-group">
                <label>Name</label>
                <?php echo $this->Form->input('Name', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Description</label>
                <?php echo $this->Form->textarea('Description', array('label' => '', 'class' => 'form-control', 'rows' => '5')); ?>
            </div>

            <div class="form-group">
                <label>Max Capacity</label>
                <?php echo $this->Form->input('MaxCapacity', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>