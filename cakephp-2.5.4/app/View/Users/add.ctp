<h1>Add User</h1>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('FirstName');
    echo $this->Form->input('LastName');
    echo $this->Form->input('PhoneNumber');
    echo $this->Form->input('SchoolId');
    echo $this->Form->input('Grade');
    echo $this->Form->input('ParentFirstName');
    echo $this->Form->input('ParentLastName');
    echo $this->Form->input('ParentPhoneNumber');
    echo $this->Form->input('ParentEmail');
    echo $this->Form->input('SecurityTypeId');
    echo $this->Form->input('Email');
    echo $this->Form->input('Password');
    echo $this->Form->input('AltPhoneNumber');
    echo $this->Form->input('Position');
    echo $this->Form->input('City');
    echo $this->Form->input('State');
    echo $this->Form->input('Address1');
    echo $this->Form->input('Address2');
    echo $this->Form->input('Zip');
    echo $this->Form->end('Save User');
?>