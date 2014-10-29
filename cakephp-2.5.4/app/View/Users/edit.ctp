<h1>Edit User</h1>
<?php echo $this->Form->create('User', array(
'class' => 'form-horizontal',
        'role' => 'form',
        'inputDefaults' => array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'form-group'),
            'class' => array('form-control'),
            'label' => array('class' => 'col-sm-2  control-label'),
            'between' => '<div class="col-sm-10">',
            'after' => '</div>',
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
))); ?>

        <fieldset>
            <div class="form-group">
                <label>First Name</label>
                <?php echo $this->Form->input('FirstName', array('label' => '')); ?>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <?php echo $this->Form->input('Last Name', array('label' => '')); ?>
            </div>
	    <?php echo $this->Form->input('Id', array('type' => 'hidden')); ?>
        </fieldset>
        <button type="button" class="btn btn-warning" onclick="window.location='..';">Cancel</button>
        <button type="submit" class="btn btn-primary">Save User</button>
<?php echo $this->Form->end(); ?>