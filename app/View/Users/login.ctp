<div class="container">

<p><?php echo $this->Html->link("新規会員登録はこちら", array('controller' => 'users', 'action' => 'add')); ?></p>

<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo h(__('ログイン画面')); ?></legend>
        <div class="form-group"><?php echo $this->Form->input('username', array('label' => 'お名前', 'class' => 'form-control', 'style' => 'width:50%;')); ?></div>

        <div class="form-group"><?php echo $this->Form->input('password', array('label' => 'パスワード', 'class' => 'form-control', 'style' => 'width:50%;')); ?></div>
    </fieldset>
<?php echo $this->Form->end(array('label' => 'ログイン', 'class' => 'btn btn-success')); ?>

</div>