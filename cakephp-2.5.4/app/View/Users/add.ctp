<h1>Add User</h1>
<?php echo $this->Form->create('User', array(
	'class' => 'form-horizontal', 
	'role' => 'form',
	'inputDefaults' => array(
	    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
	    'div' => array('class' => 'form-group'),
	    'class' => array('form-control'),
	    'label' => array('class' => 'col-sm-2  control-label'),
	    'between' => '<div class="col-sm-10">',
	    'after' => '</div>',
	    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
))); ?>

	<fieldset>
	    <div class="form-group">
		<label>First Name</label>
	    	<?php echo $this->Form->input('FirstName', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
                <label>Last Name</label>
                <?php echo $this->Form->input('LastName', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Email</label>
                <?php echo $this->Form->input('Email', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Password</label>
                <?php echo $this->Form->input('Password', array('label' => '', 'type' => 'password')); ?>
            </div>
	    <div class="form-group">
                <label>Phone Number</label>
                <?php echo $this->Form->input('PhoneNumber', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Secondary Phone Number</label>
                <?php echo $this->Form->input('AltPhoneNumber', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>School</label>
                <?php echo $this->Form->input('school_id', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Grade</label>
                <?php echo $this->Form->input('Grade', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Parent's First Name</label>
                <?php echo $this->Form->input('ParentFirstName', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Parent's Last Name</label>
                <?php echo $this->Form->input('ParentLastName', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Parent's Phone Number</label>
                <?php echo $this->Form->input('ParentPhoneNumber', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Parent's Email Address</label>
                <?php echo $this->Form->input('ParentEmail', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Security Type</label>
                <?php echo $this->Form->input('security_type_id', array('label' => '')); ?>
            </div>
	    <div class="form-group">
                <label>Position</label>
                <?php echo $this->Form->input('Position', array('label' => '')); ?>
            </div>
	    <div class="form-group">
	        <label>City</label>
	        <?php echo $this->Form->input('City', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>State</label>
	    	<?php echo $this->Form->input('State', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>Address 1</label>
	        <?php echo $this->Form->input('Address1', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>Address 2</label>
	    	<?php echo $this->Form->input('Address2', array('label' => '')); ?>
	    </div>
	    <div class="form-group">
	    	<label>Zip</label>
	    	<?php echo $this->Form->input('Zip', array('label' => '')); ?>
	    </div>
	</fieldset>
	<button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
	<button type="submit" class="btn btn-primary">Save User</button>
<?php echo $this->Form->end(); ?>
