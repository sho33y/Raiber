<h1>ユーザー情報編集ページ</h1>
<p><?php echo $this->Html->link("Back", array('action' => 'mypage', $userSession['id'])); ?></p>

<?php
echo $this->Form->create('User', array('type' => 'file', 'enctype' => 'multipart/form-data'));
echo $this->Form->input('username', array('type' => 'name'));
echo $this->Form->input('email', array('type' => 'email'));
echo $this->Form->file('user_pic',array('type' => 'file'));
echo $this->Form->end('Edit');
?>