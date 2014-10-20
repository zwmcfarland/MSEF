<h1>Edit Keywords</h1>
<?php
echo $this->Form->create('Keyword');
echo $this->Form->input('Keyword');
echo $this->Form->input('Id', array('type' => 'hidden'));
echo $this->Form->end('Save Keyword');
?>