<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
  }

  public function validationDefault(Validator $validator)
  {
    $validator
      ->notEmpty('username')
      ->requirePresence('username')
      ->notEmpty('password')
      ->requirePresence('password')
      ->notEmpty('gender')
      ->requirePresence('gender')
      ->notEmpty('birthday')
      ->requirePresence('birthday');
      return $validator;
  }
}
