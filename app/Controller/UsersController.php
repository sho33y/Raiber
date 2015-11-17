<?php

class UsersController extends AppController {

	public $helpers = array('Html','Form','Session');
	public $components = array('Session');
	public $uses = array('User', 'Item');


	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'add', 'logout');
        $this->userSession = $this->Auth->user();
    }


	public function index() {

	}

	public function add() {
		if ($this->request->is('post')) {
	        $this->User->create();
	        if ($this->User->save($this->request->data)) {
	        	$this->Session->setFlash(__('The user has been saved'));
	            return $this->redirect(array('action' => 'login'));
	        }
	        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	    }
	}

	public function login() {
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$this->Session->setFlash(__('ログイン完了'));
	            $this->redirect($this->Auth->redirect(array('controller' => 'items', 'action' => 'index')));
	        } else {
	            $this->Session->setFlash(__('ログインできませんでした。入力内容をもう一度お確かめください。'));
	        }
	    }
	}

	public function logout() {
		$this->Session->setFlash(__('ログアウト完了'));
	    $this->redirect($this->Auth->logout());
	}


	public function mypage($id) {
		$this->set('items', $this->Item->find('all', array('conditions' => array('Item.user_id' => $id))));
	}


	public function edit($id) {
		if (!$id) {
	    	throw new NotFoundException(__('Invalid post'));
	    }
	    $user = $this->User->findById($id);
	    if (!$user){
	    	throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	    	$this->User->id = $id;
			$picture = $this->request->data['User']['user_pic'];
			$this->request->data['User']['picture'] = $picture['name'];
	    	if ($this->User->save($this->request->data)) {
	    		$path = IMAGES.DS.'user_img';
			    move_uploaded_file($picture['tmp_name'], $path . DS . $picture['name']);
	    		$this->Session->setFlash(__('Your post has been updated.'));
	    		return $this->redirect(array('action' => 'mypage', $id));
	    	}
	    	$this->Session->setFlash(__('Unable to updata your post.'));
	    }

	    if (!$this->request->data) {
	    	$this->request->data = $user;
	    }

		$this->set(compact('user'));
	}


	public function delete() {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }
	    $this->User->id = $this->Auth->user();
	    
	    if ($this->User->delete($this->User->id, true)) {
	    	$this->Auth->logout();
	        $this->Session->setFlash(__('退会処理が完了しました'));
	        return $this->redirect(array('controller' => 'tops', 'action' => 'index'));
	    } else {
	        $this->Session->setFlash(__('削除エラー'));
	        return $this->redirect(array('controller' => 'items', 'action' => 'index'));
	    }
	}

}