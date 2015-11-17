<div class="container">

<h2 class="add-member-logo">会員登録  New membership</h2>

<?php echo $this->Form->create('User', array('type' => 'file', 'enctype' => 'multipart/form-data')); ?>
<div class="form-group"><?php echo $this->Form->input('username', array('type' => 'username', 'label' => 'お名前', 'class' => 'form-control', 'style' => 'width:50%;')); ?></div>
<div class="form-group"><?php echo $this->Form->input("password", array('type' => 'password', 'label' => 'パスワード', 'class' => 'form-control', 'style' => 'width:50%;')); ?></div>
<?php echo $this->Form->end(array('label' => '登録', 'class' => 'btn btn-success')); ?>


</div>