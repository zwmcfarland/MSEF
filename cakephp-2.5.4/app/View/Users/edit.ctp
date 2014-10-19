<h1>Edit Post</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('FirstName');
echo $this->Form->input('LastName');
echo $this->Form->input('Id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>