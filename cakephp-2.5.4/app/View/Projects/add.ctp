<h1>Add Project</h1>
<?php
    echo $this->Form->create('Project');
    echo $this->Form->input('Name');
    echo $this->Form->input('Description');
    echo $this->Form->input('Abstract');
    echo $this->Form->input('Electrical');
    echo $this->Form->end('Save Project');
?>