<?php
namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

class UsersController extends AppController
{
  public $paginate = [
    'limit' => 5,
    'soft' => 'id',
    'direction' => 'asc'
  ];

  public function login()
  {
    if($this->request->is('post')) {
      $user = $this->Auth->identify();
      if(!empty($user)) {
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error('ユーザー名かパスワードが間違っています。');
    }
  }

  public function logout()
  {
    $this->request->session()->destroy();
    return $this->redirect($this->Auth->logout());
  }

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['login', 'add', 'index']);
  }


  public function index()
  {
      $users = $this->paginate($this->Users);
      // $users = $this->Users->find('all');

      $this->set(compact('users'));
  }

  // public function index() {
  //   $posts = $this->Posts->find('all');
  //   $this->set(compact('posts'));
  // }

  // public function view($id = null) {
  //   $post = $this->Posts->get($id, ['contain'=>'Comments']);
  //   $this->set(compact('post'));
  // }

  public function add() {
    $user = $this->Users->newEntity();
    if($this->request->is('post')){
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if ($this->Users->save($user)) {
        $this->Flash->success('Add success!');
        return $this->redirect(['action'=>'index']);
      } else {
        $this->Flash->error('Add error!');
      }
    }
    $this->set(compact('user'));
  }

  // public function add()
  // {
  //     $user = $this->Users->newEntity();
  //     if ($this->request->is('post')) {
  //         $user = $this->Users->patchEntity($user, $this->request->getData());
  //         if ($this->Users->save($user)) {
  //             $this->Flash->success(__('The user has been saved.'));
  //
  //             //return $this->redirect(['action' => 'index']);
  //         }
  //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
  //     }
  //     $this->set(compact('user'));
  // }

  // public function edit($id = null) {
  //   $post = $this->Posts->get($id);
  //   if($this->request->is('post', 'put', 'patch')){
  //     $post = $this->Posts->patchEntity($post, $this->request->data);
  //     if ($this->Posts->save($post)) {
  //       $this->Flash->success('Add success!');
  //       return $this->redirect(['action'=>'index']);
  //     } else {
  //       $this->Flash->error('Add error!');
  //     }
  //   }
  //   $this->set(compact('post'));
  // }
  //
  // public function delete($id = null) {
  //   $this->request->allowMethod('post', 'delete');
  //   $post = $this->Posts->get($id);
  //     if ($this->Posts->delete($post)) {
  //       $this->Flash->success('Add success!');
  //       return $this->redirect(['action'=>'index']);
  //     } else {
  //       $this->Flash->error('Add error!');
  //     }
  // }
}
