<h2>Edit Project</h2>
<div class="row">
    <?php echo $this->Form->create('Project'); ?>
        <fieldset>
            <div class="form-group">
                <label>Name</label>
                <?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
            </div>

            <div class="form-group">
                <label>Description</label>
                <?php echo $this->Form->textarea('Description', array('class' => 'form-control', 'rows' => '5')); ?>
            </div>

            <div class="form-group">
                <label>Abstract</label>
                <?php echo $this->Form->textarea('Abstract', array('class' => 'form-control', 'rows' => '5')); ?>
            </div>

            <div class="form-group">
                <label>Status</label>
                <?php echo $this->Form->input('status_id', array('class' => 'form-control', 'label' => '')); ?>
            </div>

            <div class="form-group">
                <div style="margin-left:20px;">
                    <?php echo $this->Form->input('Electrical', array('label' => 'This project will require an electrical connection.')); ?>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-warning" onclick="window.location='../';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Project</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
