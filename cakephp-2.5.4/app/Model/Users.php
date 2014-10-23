<?php
	App::uses('AppModel', 'Model');
	App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
	
	class Users extends AppModel {

		public function beforeSave($options = array()) {
		    if (isset($this->data[$this->alias]['password'])) {
		        $passwordHasher = new BlowfishPasswordHasher();
		        $this->data[$this->alias]['password'] = $passwordHasher->hash(
		            $this->data[$this->alias]['password']
		        );
		    }
		    return true;
		}
	}
?>