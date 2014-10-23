<h1>Edit Post</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('StartDate');
echo $this->Form->input('EndDate');
echo $this->Form->input('Description');
echo $this->Form->input('Location');
echo $this->Form->input('Id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>