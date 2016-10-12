<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Nama</th>
				<th>Quantity</th>
				<th>Harga Satuan</th>
				<th>Harga Total</th>
				<th><button onclick="hapusSemua()" class="btn btn-default hapus-semua">Hapus Semua</button>
			</th>
			<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($this->cart->contents() as $items){ ?>
			<tr>
				<td><?= $items['id'] ?></td>	 
				<td><?= $items['name'] ?></td> 
				<td><?= $items['qty'] ?></td>
				<td><?= $items['price'] ?></td>
				<td><?= $total = $items['price']*$items['qty'] ?></td>
				<td><a class="btn btn-danger col-md-12" onClick='delete_row("<?= $items['rowid'] ?>")'>Hapus</a> 
				</td>
				<td>
					<a class="btn btn-warning" onClick='add_qty("<?= $items['id'] ?>")'><i class="fa fa-plus"></i></a><a class="btn btn-warning" onClick='minus_qty("<?= $items['id'] ?>")'><i class="fa fa-minus"></i></a>
				</td>
			</tr>
		<?php
		}
		?> 
	</tbody>
</table>
<script>
var site_url = '<?=site_url()?>';

function delete_row (id){
	$.ajax({
		url: site_url+'/teller/cart/deleterow/'+id,
		type: 'get',
		cache: false
	})
		.success(function(){
			kolom();
			total();
		});
}
	function add_qty (id)
	{
		$.ajax({
			url: site_url+'/teller/cart/pluscart/'+id,
			type: 'get',
			cache: false
		})
			.success(function(){
				kolom();
				total();
			});
	}

	function minus_qty(id)
	{
		$.ajax({
			url:site_url+'/teller/cart/minuscart/'+id,
			type:'get',
			cache:false
		})
			.success(function(){
				kolom();
				total();
			});
	}
</script>