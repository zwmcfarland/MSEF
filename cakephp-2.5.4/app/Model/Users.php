<?php
	class Users extends AppModel {
		public $validate = array(
	        'FirstName' => array(
	            'rule' => 'notEmpty'
	        ),
	        'LastName' => array(
	            'rule' => 'notEmpty'
	        )
	    );
	}
?>