<h1>Edit Form</h1>
<?php
echo $this->Form->create('Form');
echo $this->Form->input('Name');
echo $this->Form->input('FormPath'); /*Maybe we should update this so it allows file upload? */
echo $this->Form->input('Id', array('type' => 'hidden'));
echo $this->Form->end('Save Form');
?>