<h1>Add Form</h1>
<?php
    echo $this->Form->create('Form');
    echo $this->Form->input('Name');
    echo $this->Form->input('FormPath');
    echo $this->Form->end('Save Form');
?>