<h1>Add Status</h1>
<?php
    echo $this->Form->create('Status');
    echo $this->Form->input('Name');
    echo $this->Form->input('Description');
    echo $this->Form->end('Save Status');
?>