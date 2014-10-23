<h1>Add Event</h1>
<?php
    echo $this->Form->create('Event');
    echo $this->Form->input('StartDate');
	echo $this->Form->input('EndDate');
	echo $this->Form->input('Description');
	echo $this->Form->input('Location');
    echo $this->Form->end('Save Event');
?>