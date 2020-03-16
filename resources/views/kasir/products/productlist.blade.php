@extends('kasir.template')
@section('contentkasir')
<script type="text/javascript">
	$(document).ready(function(){
		//get data pesanan
		function getPesanan(){
			$.ajax({
				type : 'GET',
				url : "{{url('kasir/getitem')}}",
				dataType : 'json',
				success : function(data){
					var no = 1;
					var total = 0;
					//refresh table pesanan
					var tbodycart = $("#tbodycart");
					tbodycart.html("");
					//baris total pesanan
					var tbltotal = $("#tbl-total");
					var barisbarutotal = $("<tr>");
					var barisdata = tbltotal.append(barisbarutotal);
					//foreach data json pesanan
					$.each(data.pesanan, function(i,val){
						var id = val.id;
						// console.log(id);
						var name = val.product_name;
						var qty = val.qty;
						var price = val.price;
						var subtotal = price*qty;
						total += subtotal;
						var opsi = "<button data-id="+id+" class='cancel'>Cancel</button>";
						var barisbaru = $('<tr>');
						barisbaru.html(
						`<td>`+no+`</td>
						<td>`+name+`</td>
						<td>`+qty+`</td>
						<td>Rp. `+price+`</td>
						<td>Rp. `+subtotal+`</td>
						<td>`+opsi+`</td>`);
						tbodycart.append(barisbaru);
						no++;
					})
					barisdata.html("<th>Total</th><td>Rp. "+total+"</td>");
					// console.log(total);
					$('#cartlist').show('slow');
				}
			})
		}

		// cancel pesanan
		$('.cancel').click(function(){
			    alert('test');
				var id = $(this).data('id');
				console.log(id);	
			// function cancelPesanan(){
			// $.ajax({
			// 	type : 'GET',
			// 	url :'',
			// 	dataType :,
			// 	success : function(data){
			// 		// getPesanan();
			// 		console.log(data)
			// 	}
			// })
			// }
		});
		$('.cart').click(function(e){
			e.preventDefault();
			var idmenu = $(this).data('idmenu');
			// alert(idmenu);
			$.ajax({
				type: "POST",
				data: {
					idmenu : idmenu
				},
				url: "{{url('kasir/additem/')}}/"+idmenu,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				success : function(){
					getPesanan();
				}
			})			
			$(".pesanan").hide();

		});
		$("#close-cart").click(function(){
			// console.log("test");
			$('#cartlist').hide('slow');
		});

	});
</script>
<div style="
display: none;
background:#f5f6f7; 
height: 100% ; 
width: 570px;  
position: fixed; 
right: 0 ; 
top : 0; 
z-index: 100;
" id="cartlist">
<span class="badge badge-dark" id="close-cart" style="position: fixed; z-index: 100; margin-left: 540px; margin-top: 10px;">X</span>
<!-- <button type="button" class="btn btn-sm btn-dark">X</button> -->
<!-- <h4 style="text-align: centre; margin-left: 20px; margin-top: 30px;">Daftar Pesanan</h4> -->
<div class="card" style="text-align: centre; margin-left: 10px; margin-top: 35px;">
	<!-- <img class="card-img-top" src="https://via.placeholder.com/50" alt="Product image "> -->

	<div class="row container-fluid">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Daftar Pesanan</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<thead>
							<th>No.</th>
							<th>Pesanan</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Sub Total</th>
							<th>Opsi</th>
						</thead>
						<tbody id="tbodycart">
						</tbody>
					</table>
					<table class="table table-hover">
						<tbody id="tbl-total">
							<th>Total</th>
						</tbody>
					</table>
					<div class="box-footer">
						<a href="{{url('kasir/order/')}}" class="btn btn-flat btn-default">Pembayaran</a>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>


</div>
</div>
<section class="content">
	<button class="btn btn-flat btn-default cart" style="margin-top: 10px; position: absolute; right: 50px;"><i class="fa fa-cart-arrow-down"></i> Open Cart</button>
	<h3>Daftar Menu</h3>
	<div class="row container-fluid">
		<div class="box">
			<div class="box-header">	
				<h5 class="box-title">Makanan</h5>
				<hr>
				@foreach($makanan as $m)
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-green"><img src="" alt=""></span>
						<div class="info-box-content">
							<span class="info-box-text">{{$m->name}}</span>
							<span class="info-box-number">Harga: Rp{{$m->price}}</span>
							<span class="info-box-text">Stock: {{$m->stock}}</span>
							<span class="info-box-text">id: {{$m->id}}</span>
							<div class="row" style="margin-left: 100px;">	
								<button onclick="" class="btn btn-sm-primary cart" data-idmenu="{{$m->id}}"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row container-fluid">
		<div class="box">
			<div class="box-header">	
				<h5 class="box-title">Minuman</h5>
				<hr>
				@foreach($minuman as $mn)
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-aqua"><img src="" alt=""></span>
						<div class="info-box-content">
							<span class="info-box-text">{{$mn->name}}</span>
							<span class="info-box-number">Harga: Rp{{$mn->price}}</span>
							<span class="info-box-text">Stock: {{$mn->stock}}</span>
							<span class="info-box-text">id: {{$mn->id}}</span>
							<div class="row" style="margin-left: 100px;">	
								<button class="btn btn-sm-primary cart" data-idmenu="{{$mn->id}}"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				@endforeach
			</div>
			<!-- /.info-box -->
		</div>
	</div>
	<div class="row container-fluid">
		<div class="box">
			<div class="box-header">	
				<h5 class="box-title">Dessert</h5>
				<hr>
				@foreach($dessert as $d)
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-red"><img src="" alt=""></span>

						<div class="info-box-content">
							<span class="info-box-text">{{$d->name}}</span>		
							<span class="info-box-number">Harga: RP{{$m->price}}</span>
							<span class="info-box-text">Stock: {{$d->stock}}</span>		
							<span class="info-box-text">id: {{$d->id}}</span>
							<div class="row" style="margin-left: 100px;">	
								<button class="btn btn-sm-primary cart" data-idmenu="{{$d->id}}"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				@endforeach
			</div>
			<!-- /.info-box -->
		</div>
	</div>
</section>
@endsection