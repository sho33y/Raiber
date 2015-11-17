<div class="container">

<div class="add-itme-wrap">
<h2>出品画面</h2>

<?php echo $this->Form->create('Item',array('type' => 'file','enctype' =>' multipart/form-data')); ?>
<div class="form-group"><?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => 'タイトル', 'style' => 'width:50%;')); ?></div>
<div class="form-group"><?php echo $this->Form->input('discription', array('class' => 'form-control', 'label' => '説明', 'rows' => '5', 'style' => 'width:50%;')); ?></div>
<p>商品画像1</p>
<div class="form-group"><?php echo $this->Form->file('imageimage1',array('class' => 'form-control', 'type' => 'file', 'style' => 'width:30%;')); ?></div>
<p>商品画像2</p>
<div class="form-group"><?php echo $this->Form->file('imageimage2',array('class' => 'form-control', 'type' => 'file', 'style' => 'width:30%;')); ?></div>
<p>商品画像3</p>
<div class="form-group"><?php echo $this->Form->file('imageimage3',array('class' => 'form-control', 'type' => 'file', 'style' => 'width:30%;')); ?></div>
<div class="form-group"><?php echo $this->Form->input('category_id',array('class' => 'form-control', 'label' => 'カテゴリー', 'options' => $categories, 'style' => 'width:30%;')); ?></div>
<?php echo $this->Form->hidden('user_id',array('value' => $userSession['id'])); ?>
<div class="form-group"><?php echo $this->Form->end(array('label' => '出品', 'class' => 'btn btn-success')); ?></div>

</div>
</div>