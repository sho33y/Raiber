<!--navbar-inverseで黒色のナビゲーションへ-->
<nav class="navbar navbar-default navbar-fixed-top">
   
   <!--ウィンドウ幅に合わせて可変-->
  <div class="container-fluid">
      
    <div class="navbar-header">  
      <!--スマホ用トグルボタンの設置-->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        
      <!--ロゴ表示の指定-->
      <a class="navbar-brand" href="/Raiber/tops/index"></a>
    </div>
      
      <!--スマホ用の画面幅が小さいときの表示を非表示にする-->
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="username">
          <?php if (!empty($userSession)): ?>
          <?php echo "Welcome to Raiber!!&ensp;".$userSession['username']; ?>
          <?php else: ?>
          <?php echo "Welcome to Raiber!!&ensp;Guest"; ?>
          <?php endif; ?>
        </li>
        <li><?php echo $this->Html->link('商品一覧へ', array('controller' => 'items', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link('出品する', array('controller' => 'items', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link('マイページ', array('controller' => 'users', 'action' =>'mypage', $userSession['id'])); ?></li>
        <li style="background:orange;"><?php if ($userSession === null) {
                        echo $this->Html->link('ログイン', array('controller' => 'users', 'action' => 'login'));
                      } else {
                        echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout'));
                      }?></li>
      </ul>
    </div>

  </div><!--/.container-fluid -->
</nav>