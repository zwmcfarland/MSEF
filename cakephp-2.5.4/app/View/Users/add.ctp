<h1>Add User</h1>
<div class="row">
    <?php echo $this->Form->create('User'); ?>
        <fieldset>

            <div class="form-group">
                <label>First Name</label>
                <?php echo $this->Form->input('FirstName', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <?php echo $this->Form->input('LastName', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Email</label>
                <?php echo $this->Form->input('Email', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Password</label>
                <?php echo $this->Form->input('Password', array('label' => '', 'type' => 'password', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <?php echo $this->Form->input('PhoneNumber', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Secondary Phone Number</label>
                <?php echo $this->Form->input('AltPhoneNumber', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>School</label>
                <?php echo $this->Form->input('school_id', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Grade</label>
                <?php echo $this->Form->input('Grade', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Parent's First Name</label>
                <?php echo $this->Form->input('ParentFirstName', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Parent's Last Name</label>
                <?php echo $this->Form->input('ParentLastName', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Parent's Phone Number</label>
                <?php echo $this->Form->input('ParentPhoneNumber', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Parent's Email Address</label>
                <?php echo $this->Form->input('ParentEmail', array('label' => '', 'class' => 'form-control')); ?>
            </div>

	       <div class="form-group">
                <label>Security Type</label>
                <?php echo $this->Form->input('security_type_id', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Position</label>
                <?php echo $this->Form->input('Position', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>City</label>
                <?php echo $this->Form->input('City', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>State</label>
                <?php echo $this->Form->input('State', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Address 1</label>
                <?php echo $this->Form->input('Address1', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Address 2</label>
                <?php echo $this->Form->input('Address2', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label>Zip</label>
                <?php echo $this->Form->input('Zip', array('label' => '', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
                <button type="submit" class="btn btn-primary">Save User</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
