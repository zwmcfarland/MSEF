<?php
    App::uses('AppModel', 'Model');
    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
    class User extends AppModel {
        var $name = 'User';
        var $belongsTo = array('School', 'SecurityType');
        
        public $validate = array(
            'FirstName' => array(
                'rule' => 'notEmpty'
            ),
            'LastName' => array(
                'rule' => 'notEmpty'
            )
        );    
        public function beforeSave($options = array()) {
            if (isset($this->data[$this->alias]['Password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['Password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['Password']
                );
            }
            return true;
        }
        
        public function isCurrent($post, $user) {
            return $post == $user;
        }
    }
?>