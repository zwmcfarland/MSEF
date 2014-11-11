<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class User extends AppModel {
        var $name = 'User';
        var $hasOne = array('School', 'SecurityType');
        public $hasAndBelongsToMany = array(
                'Sponsor' => array(
                    'className' => 'Perfile',
                    'joinTable' => 'modelo_perfiles',
                    'foreignKey' => 'modelo_id',
                    'associationForeignKey' => 'perfil_id',
                    'unique' => true,
                )
        );
        
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