<div class="container">

<h3><?php echo $userSession['username']; ?> さんのMy Page</h3>
<p><?php echo $this->Html->link("ユーザー情報編集", array('action' => 'edit', $userSession['id'])); ?></p>

<table>
	<tr>
		<th>Image</th>
		<th>Title</th>
		<th>Add_date</th>
		<th>Action</th>
	</tr>

	<?php foreach ($items as $item): ?>

	<tr>
		<td><?php echo $this->Html->link('<img width=150px height=100px src= "/Raiber/img/item_img/'.$item['Item']['image1'].'">', array('controller' => 'items', 'action' => 'view', $item['Item']['id']), array('escape'=>false)); ?>
		</td>
		<td><?php echo $this->Html->link($item['Item']['title'], array('controller' => 'items', 'action' => 'view', $item['Item']['id'])); ?></td>
		<td><?php echo $item['Item']['created']; ?></td>
		<td><?php echo $this->Html->link("編集", array('controller' => 'items', 'action' => 'edit', $item['Item']['id'], $userSession['id'])); ?>
			<?php echo $this->Form->postLink('削除', array('controller' => 'items', 'action' => 'delete', $item['Item']['id'], $userSession['id']), array('confirm' => 'Are you sure?')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($items); ?>
</table>

</div>