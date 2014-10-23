<h1>Add School</h1>
<?php
    echo $this->Form->create('School');
    echo $this->Form->input('Name');
    echo $this->Form->input('City');
    echo $this->Form->input('State');
    echo $this->Form->input('Address1');
    echo $this->Form->input('Address2');
    echo $this->Form->input('Zip');
    echo $this->Form->end('Save School');
?>