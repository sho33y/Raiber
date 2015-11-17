<h1>Postリスト</h1>
<p><?php echo $this->Html->link("Add Post", array('action' => 'add')); ?></p>

<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('message');
	echo $this->Form->end('Save Post');
?>

<table>

<tr>
	<th>ID</th>
	<th>message</th>
	<th>created</th>
	<th>modified</th>
	<th>action</th>
</tr>

<?php foreach ($posts as $post): ?>

<tr>
	<td><?php echo h($post['Post']['id']); ?></td>
	<td><?php echo h($post['Post']['message']); ?></td>
	<td><?php echo h($post['Post']['created']); ?></td>
	<td><?php echo h($post['Post']['modified']); ?></td>
	<td>
		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?')); ?>
	</td>
</tr>

<?php endforeach; ?>
<?php unset($post); ?>

</table>