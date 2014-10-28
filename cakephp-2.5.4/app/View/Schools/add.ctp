<h1>Add School</h1>

<?php echo $this->Form->create('School', array(
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
    <?php echo $this->Form->input('Name'); ?>
    <?php echo $this->Form->input('City'); ?>
    <?php echo $this->Form->input('State'); ?>
    <?php echo $this->Form->input('Address1'); ?>
    <?php echo $this->Form->input('Address2'); ?>
    <?php echo $this->Form->input('Zip'); ?>
    <div class="col-sm-offset-2 col-sm-10">
	<?php echo $this->Form->submit('Save School', array('class' => 'btn btn-default')); ?>
    </div>
</fieldset>    
