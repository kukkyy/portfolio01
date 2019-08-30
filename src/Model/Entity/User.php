<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
  protected $_accessible = [
    'username' => true,
    'password' => true,
    'gender' => true,
    'birthday'=>true
  ];

  protected $_hidden = [
    'password'
  ];

  protected function _setPassword($password) {
    return (new DefaultPasswordHasher)->hash($password);
  }
}
