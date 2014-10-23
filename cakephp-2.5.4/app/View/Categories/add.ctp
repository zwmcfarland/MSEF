<h1>Add Category</h1>
<?php
    echo $this->Form->create('Category');
    echo $this->Form->input('Name');
    echo $this->Form->input('Description');
    echo $this->Form->input('MaxCapacity');
    echo $this->Form->end('Save Category');
?>