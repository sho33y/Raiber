<?php

class PostsController extends AppController{

	public $helpers = array('Html','Form','Session');
	public $components = array('Session');

	public function index() {
		$this->set('posts',$this->Post->find('all'));
		if ($this->request->is('post')) {
			$this->Post->create();
		    if ($this->Post->save($this->request->data)) {
		    	$this->Session->setFlash(__('投稿完了！ Your post has been saved.'));
		        return $this->redirect(array('action' => 'index'));
		    }
		    $this->Session->setFlash(__('投稿できませんでした Unable to add your post.'));
		}
	}

	public function delete($id,$item_id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	    } else {
	        $this->Session->setFlash(
	            __('The post with id: %s could not be deleted.', h($id))
	        );
	    }

	    return $this->redirect(array('controller' => 'items', 'action' => 'view', $item_id));
	}

}