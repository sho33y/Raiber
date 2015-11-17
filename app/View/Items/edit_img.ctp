<div class="container">

<p><?php echo $this->Html->link("戻る", array('action' => 'edit', $item['Item']['id'], $userSession['id'])); ?></p>

<?php echo $this->Form->create('Item',array('type' => 'file','enctype' =>' multipart/form-data')); ?>
<div class="row">
	<table>

	<tr>
		<th>現在</th>
		<td>
			<div class="edit-item-img-detail col-xs-12 col-sm-12 col-md-4">
				<p>商品画像1</p>
				<img src="/Raiber/img/item_img/<?php echo $item['Item']['image1']; ?>" alt="商品画像1">
			</div>
		</td>
		<td>
			<div class="edit-item-img-detail col-xs-12 col-sm-12 col-md-4">
				<p>商品画像2</p>
				<img src="/Raiber/img/item_img/<?php echo $item['Item']['image2']; ?>" alt="商品画像2">
			</div>
		</td>
		<td>
			<div class="edit-item-img-detail col-xs-12 col-sm-12 col-md-4">
				<p>商品画像3</p>
				<img src="/Raiber/img/item_img/<?php echo $item['Item']['image3']; ?>" alt="商品画像3">
			</div>
			</td>
	</tr>

	<tr>
		<th>変更後</th>
		<td><?php echo $this->Form->file('imageimage1',array('label' => false, 'type' => 'file')); ?></td>
		<td><?php echo $this->Form->file('imageimage2',array('label' => false, 'type' => 'file')); ?></td>
		<td><?php echo $this->Form->file('imageimage3',array('label' => false, 'type' => 'file')); ?></td>
	</tr>
	</table>
</div>
<p>※現在使用している画像を変更せずに使いたい場合も再度一緒にアップロードしてください。お手数お掛けします。</p>
<div class="form-group"><?php echo $this->Form->end(array('label' => '編集', 'class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?></div>

</div>