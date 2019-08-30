<?php
namespace App\Controller;

class PostsController extends AppController
{
  public function index() {
    $posts = $this->Posts->find('all');
    $this->set(compact('posts'));
  }

  public function view($id = null) {
    $post = $this->Posts->get($id, ['contain'=>'Comments']);
    $this->set(compact('post'));
  }

  public function add() {
    $post = $this->Posts->newEntity();
    if($this->request->is('post')){
      $post = $this->Posts->patchEntity($post, $this->request->data);
      if ($this->Posts->save($post)) {
        $this->Flash->success('Add success!');
        return $this->redirect(['action'=>'index']);
      } else {
        $this->Flash->error('Add error!');
      }
    }
    $this->set(compact('post'));
  }

  public function edit($id = null) {
    $post = $this->Posts->get($id);
    if($this->request->is('post', 'put', 'patch')){
      $post = $this->Posts->patchEntity($post, $this->request->data);
      if ($this->Posts->save($post)) {
        $this->Flash->success('Add success!');
        return $this->redirect(['action'=>'index']);
      } else {
        $this->Flash->error('Add error!');
      }
    }
    $this->set(compact('post'));
  }

  public function delete($id = null) {
    $this->request->allowMethod('post', 'delete');
    $post = $this->Posts->get($id);
      if ($this->Posts->delete($post)) {
        $this->Flash->success('Add success!');
        return $this->redirect(['action'=>'index']);
      } else {
        $this->Flash->error('Add error!');
      }
  }
}
