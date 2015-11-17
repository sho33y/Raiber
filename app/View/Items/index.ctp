<div id="wrapper">
    <!-- サイドバー -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">カテゴリー  Category</li>
            <li><?php echo $this->Html->link('全て  All', array('action' => 'index')); ?></li>
            <?php foreach ($categories as $category): ?>
            <li><?php echo $this->Html->link(h($category['Category']['name']), array('action' => 'category_index', $category['Category']['id'])); ?></a></li>
        	<?php endforeach; ?>
        </ul>
    </div>


    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                	<!-- サイドメニュー表示ボタン -->
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">カテゴリー表示</a>

                    <h2>商品一覧  Item list</h2>
                    <div class="item-list">
	                    <div class="table-responsive">
							<table class="table table-hover">
							<?php foreach ($items as $item): ?>
							<tr>
								<div class="col-xs-12">
									<td><?php echo $this->Html->link('<img src= "/Raiber/img/item_img/'.$item['Item']['image1'].'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?></td>
									<td>
								</div>
									<div class="item-detail col-xs-12">
										<ul>
											<li class="item-category"><?php echo h($item['Category']['name']); ?></li>
											<li class="item-title"><?php echo $this->Html->link(h($item['Item']['title']), array('controller'=>'items', 'action'=>'view', $item['Item']['id'], $userSession['id'])); ?></li>
											<li class="item-user"><span class="glyphicon glyphicon-user"></span><?php echo h($item['User']['username']); ?>
											<span class="item-created"><?php echo h($item['Item']['created']); ?></span></li>
											<li class="item-discription"><?php echo h($item['Item']['discription']); ?></li>
											
										</ul>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php unset($item); ?>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- サイドバー Script -->
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>

