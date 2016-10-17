<nav class="menuku">
	<ul>
		<li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
		<li><a><?=$user_name?></a></li>
		<li><a href="<?= site_url('teller/cart') ?>">KASIR</a></li>
		<li><a href="<?=site_url('teller/inv')?>">INVENTORY</a></li>
		<li><a href="<?=site_url('teller/inv/history')?>">HISTORY</a></li>
		<li><a href="<?=site_url('auth/logout')?>">LOGOUT</a></li>
	</ul>
</nav>

<!-- Header -->
<header>
	<i class="fa fa-bars fa-2x pull-left menu"></i>
	<div class="container">
		<div class="col-lg-12 text-center">
			<h1><?= $judule ?></h1>
		</div>
	</div>
</header>