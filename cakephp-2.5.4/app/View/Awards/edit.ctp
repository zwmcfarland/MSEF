<h2>Edit Award</h2>
<div class="row">
    <?php echo $this->Form->create('Award'); ?>
        <fieldset>
            <div class="form-group">
                <label>Name</label>
                <?php echo $this->Form->input('Name', array('class' => 'form-control', 'label' => '')); ?>
            </div>

            <div class="form-group">
                <label>Description</label>
                <?php echo $this->Form->textarea('Description', array('class' => 'form-control', 'label' => '','rows' => '5')); ?>
            </div>

            <div class="form-group">
                <label>Reward</label>
                <?php echo $this->Form->textarea('Reward', array('class' => 'form-control', 'label' => '','rows' => '5')); ?>
            </div>

            <div class="form-group"> 
                <button type="button" class="btn btn-warning" onclick="window.location='../';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Award</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>