<?php

/*App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');*/

	class User extends AppModel {
		public $validate = array(
	        'FirstName' => array(
	            'rule' => 'notEmpty'
	        ),
	        'LastName' => array(
	            'rule' => 'notEmpty'
	        )
	    );	
		/*public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }*/
		
			
	}
?>