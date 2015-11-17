<div class="container">

<p><?php echo $this->Html->link("戻る", array('controller' => 'users', 'action' => 'mypage', $userSession['id'])); ?></p>

<div class="edit-itme-wrap">
<h2>編集画面</h2>

<?php echo $this->Form->create('Item',array('type' => 'file','enctype' =>' multipart/form-data')); ?>
<div class="form-group"><?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => 'タイトル', 'style' => 'width:50%;')); ?></div>
<div class="form-group"><?php echo $this->Form->input('discription', array('class' => 'form-control', 'label' => '説明', 'rows' => '5', 'style' => 'width:50%;')); ?></div>

<div class="row">
	<div class="edit-item-img">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<p>商品画像1</p>
			<img src="/Raiber/img/item_img/<?php echo $item['Item']['image1']; ?>" alt="商品画像1">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<p>商品画像2</p>
			<img src="/Raiber/img/item_img/<?php echo $item['Item']['image2']; ?>" alt="商品画像2">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<p>商品画像3</p>
			<img src="/Raiber/img/item_img/<?php echo $item['Item']['image3']; ?>" alt="商品画像3">
		</div>
	</div>
</div>
<?php echo $this->Html->link('画像を変更する', array('action' => 'edit_img', $item['Item']['id'], $userSession['id'])); ?>

<div class="item-float-clear">
<div class="form-group"><?php echo $this->Form->input('category_id',array('class' => 'form-control', 'label' => 'カテゴリー', 'options' => $categories, 'style' => 'width:30%;')); ?></div>
<?php echo $this->Form->hidden('user_id',array('value' => $userSession['id'])); ?>
<div class="form-group"><?php echo $this->Form->end(array('label' => '編集', 'class' => 'btn btn-success')); ?></div>
</div>

</div>
</div>