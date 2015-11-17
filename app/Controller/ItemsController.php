<?php

class ItemsController extends AppController {

	public $helpers = array('Html','Form','Session');
	public $components = array('Session', 'Paginator');
	public $uses = array('Item', 'Post', 'Category');


	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
        $this->userSession = $this->Auth->user();
    }



	public function index() {
		// Itemにページネーションを使用
		$this->paginate = array('Item' => array('limit' => 2, 'conditions' => array('status' => '0')));
		$items = $this->Paginator->paginate('Item');
		$this->set('items', $this->paginate());
		// カテゴリー
		$categories = $this->Category->find('all');
		$this->set(compact('categories'));
	}


	public function category_index($category_id) {
		$items = $this->Item->find('all', array('conditions' => array('status' => '0', 'category_id' => $category_id)));
		$categories = $this->Category->find('all');
		$pages_category = $this->Category->findById($category_id);
		$this->set(compact('items', 'categories', 'pages_category'));
	}


	public function view($id = null, $user_id = null) {
		if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $item = $this->Item->findById($id);
        if (!$item) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('item', $item);

        // 掲示板投稿の処理
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['post'])) {
				$this->Post->create();
			    if ($this->Post->save($this->request->data)) {
			    	$this->Session->setFlash(__('投稿完了！ Your post has been saved.'));
			        return $this->redirect(array('action' => 'view',$id));
			    }
			    $this->Session->setFlash(__('投稿できませんでした Unable to add your post.'));
			} elseif (isset($this->request->data['item'])) {
				if ($item['Item']['user_id'] !== $user_id) {
					$this->Session->setFlash(__('成立ボタンは投稿者本人しか押せません'));
			        return $this->redirect(array('action' => 'view', $id, $user_id));
				} else {
					$this->Item->id = $id;
					if ($this->Item->save($this->request->data['Item'])) {
						$this->Session->setFlash(__('交渉成立！'));
						return $this->redirect(array('action' => 'index'));
					}
				}
			}
		}

		$posts = $this->Post->find('all', array('conditions' => array('Post.item_id' => $id)));
		$item_category = $item['Item']['category_id'];
		$categories = $this->Category->find('list', array('conditions' => array('Category.id' => $item_category)));
		$this->set(compact('posts', 'categories'));
	}


	public function add() {
		if ($this->request->is('post')) {
	        $this->Item->create();
	        // items/addでアップロードしたファイルを$imageの中に格納
			$image1 = $this->request->data['Item']['imageimage1'];
			$image2 = $this->request->data['Item']['imageimage2'];
			$image3 = $this->request->data['Item']['imageimage3'];
			// itemsデータベースのカラムimageにファイル名を送る
			$this->request->data['Item']['image1'] = $image1['name'];
			$this->request->data['Item']['image2'] = $image2['name'];
			$this->request->data['Item']['image3'] = $image3['name'];
	        if ($this->Item->save($this->request->data)) {
	        	// 画像保存先のパス  webroot/img/item_img/イメージファイル名
	    		$path = IMAGES.DS.'item_img' ;
			    move_uploaded_file($image1['tmp_name'], $path . DS . $image1['name']);
			    move_uploaded_file($image2['tmp_name'], $path . DS . $image2['name']);
			    move_uploaded_file($image3['tmp_name'], $path . DS . $image3['name']);
	            $this->Session->setFlash(__('投稿しました。'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('投稿できませんでした。入力内容をお確かめください。'));
	    }
	    $this->set('categories', $this->Category->find('list'));
	}


	public function edit($id = null, $user_id = null) {
		if(!$id) {
	    	throw new NotFoundException(__('不正なアクセスです'));
	    }
	    if(!$user_id) {
	    	throw new NotFoundException(__('ログインしてください'));
	    }
	    $item = $this->Item->findById($id);
	    if(!$item){
	    	throw new NotFoundException(__('不正なアクセスです'));
	    }

	    if($this->request->is(array('post', 'put'))) {
	    	$this->Item->id = $id; //指定プライマリーキーのデータをセット
	    	if($this->Item->save($this->request->data)) {
	    		$this->Session->setFlash(__('編集しました。'));
	    		return $this->redirect(array('controller' => 'users', 'action' => 'mypage', $this->userSession['id']));
	    	}
	    	$this->Session->setFlash(__('編集できませんでした。入力内容をお確かめください。'));
	    }

	    if(!$this->request->data) {
	    	$this->request->data = $item;
	    }
	    $categories = $this->Category->find('list');
		$this->set(compact('item', 'categories'));
	}

	public function edit_img($id = null, $user_id = null) {
		if(!$id) {
	    	throw new NotFoundException(__('不正なアクセスです'));
	    }
	    if(!$user_id) {
	    	throw new NotFoundException(__('ログインしてください'));
	    }
	    $item = $this->Item->findById($id);
	    if(!$item){
	    	throw new NotFoundException(__('不正なアクセスです'));
	    }

	    if($this->request->is(array('post', 'put'))) {
	    	$this->Item->id = $id; //指定プライマリーキーのデータをセット
	    	// items/addでアップロードしたファイルを$imageの中に格納
			$image1 = $this->request->data['Item']['imageimage1'];
			$image2 = $this->request->data['Item']['imageimage2'];
			$image3 = $this->request->data['Item']['imageimage3'];
			// itemsデータベースのカラムimageにファイル名を送る
			$this->request->data['Item']['image1'] = $image1['name'];
			$this->request->data['Item']['image2'] = $image2['name'];
			$this->request->data['Item']['image3'] = $image3['name'];
	    	if($this->Item->save($this->request->data)) {
	    		// 画像保存先のパス  webroot/img/item_img/イメージファイル名
	    		$path = IMAGES.DS.'item_img';
			    move_uploaded_file($image1['tmp_name'], $path . DS . $image1['name']);
			    move_uploaded_file($image2['tmp_name'], $path . DS . $image2['name']);
			    move_uploaded_file($image3['tmp_name'], $path . DS . $image3['name']);
	    		$this->Session->setFlash(__('編集しました。'));
	    		return $this->redirect(array('action' => 'edit', $id, $this->userSession['id']));
	    	}
	    	$this->Session->setFlash(__('編集できませんでした。入力内容をお確かめください。'));
	    }

	    if(!$this->request->data) {
	    	$this->request->data = $item;
	    }

	    $this->set(compact('item'));
	}


	public function delete($id, $user_id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }
	    $item = $this->Item->findById($id);
	    
	    $item_user_id = $item['Item']['user_id'];
	    if($user_id !== $item_user_id) {
	    	$this->Session->setFlash(__('自分が投稿したアイテムのみ削除できます。'));
	        return $this->redirect(array('action' => 'index'));
	    }

	    if ($this->Item->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	    } else {
	        $this->Session->setFlash(
	            __('The post with id: %s could not be deleted.', h($id))
	        );
	    }
	    return $this->redirect(array('action' => 'index'));
	}

}