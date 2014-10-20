<h1>Edit Award</h1>
<?php
echo $this->Form->create('Award');
echo $this->Form->input('Name');
echo $this->Form->input('Description');
echo $this->Form->input('Reward');
echo $this->Form->input('Id', array('type' => 'hidden'));
echo $this->Form->end('Save Award');
?>