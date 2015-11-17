<div class="container">
<p><?php echo $this->Html->link("戻る", array('action' => 'index')); ?></p>


<!-- 商品タイトル -->
<h1 style="font-size:36px;"><?php echo h($item['Item']['title']); ?></h1>
<!-- 商品画像 -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-4"><?php echo '<img width=350px height=320px src= "/Raiber/img/item_img/'.$item['Item']['image1'].'">'; ?></div>
	<div class="col-xs-12 col-sm-12 col-md-4"><?php echo '<img width=350px height=320px src= "/Raiber/img/item_img/'.$item['Item']['image2'].'">'; ?></div>
	<div class="col-xs-12 col-sm-12 col-md-4"><?php echo '<img width=350px height=320px src= "/Raiber/img/item_img/'.$item['Item']['image3'].'">'; ?></div>
</div>
<!-- カテゴリー -->
<?php foreach ($categories as $category): ?>
<p><?php echo $category; ?></p>
<?php endforeach; ?>
<!-- 商品説明 -->
<h2 style="font-size:18px;">[商品説明]</h2>
<p><?php echo h($item['Item']['discription']); ?></p>

<!-- 掲示板 -->
<div class="board-wrap">
	<table>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo '<img width=50px height=50px src= "/Raiber/img/user_img/'.$post['User']['picture'].'">'; ?></td>
		<td><?php echo h($post['User']['username']); ?></td>
		<td><?php echo h($post['Post']['message']); ?></td>
		<td><?php echo h($post['Post']['created']); ?></td>
		<td>
			<?php echo $this->Form->postLink('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'],$item['Item']['id']), array('confirm' => 'Are you sure?')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
	</table>


	<!-- メッセージ入力 -->
	<?php echo $this->Form->create('Post'); ?>
	<div class="form-group"><?php echo $this->Form->input('message', array('class' => 'form-control', 'label' => 'メッセージ', 'rows' => '3', 'style' => 'width:70%;')); ?></div>
	<div class="form-group"><?php echo $this->Form->hidden('item_id', array('value' => $item['Item']['id'])); ?>
	<div class="form-group"><?php echo $this->Form->hidden('user_id', array('value' => $userSession['id'])); ?>
	<div class="form-group"><?php echo $this->Form->submit('投稿', array('class' => 'btn btn-success', 'name' => 'post')); ?></div>
</div>

<?php echo $this->Form->create('Item'); ?>
<?php echo $this->Form->hidden('status', array('value' => '2')); ?>
<?php echo $this->Form->submit('交渉成立', array('class' => 'btn btn-warning', 'name' => 'item')); ?>

</div>
