@extends('kasir.template')
@section('contentkasir')
<script type="text/javascript">
	$(document).ready(function(){
		// get data cart
		$.ajax({
			type : 'GET',
			url : "{{url('kasir/getitem')}}",
			dataType : 'JSON',
			success : function(data){
				var no = 1;
				var tblpesanan = $("#datapesanan");
				tblpesanan.html('');
				var total = 0;
				var htmltotal1 = $('#htmltotal');
				$.each(data.pesanan , function(index,item){
					var barisbaru = $('<tr>');			
					tblpesanan.append(barisbaru);
					var pesanan = item.product_name;
					var qty = item.qty;
					var price = item.price;
					var subtotal = qty*price;
					var user = item.user_name;
					total += subtotal;
					$("[name='namakasir']").val(user);
					$("[name='total']").val(total);
					barisbaru.html(
						`<td>`+no+`</td>
						<td>`+pesanan+`</td>
						<td>`+qty+`</td>
						<td>Rp`+price+`</td>
						<td>Rp`+subtotal+`</td>`
						);
					no++;
				})
				//show total
				htmltotal1.html('<h1>TOTAL : Rp'+total+'</h1>');
				//show subs
				$("[name='dibayar']").keyup(function(){
					var dibayar = $("[name='dibayar']").val();
					var kembalian = dibayar - total;
					if(dibayar < total){
						$("[name='kembalian']").val('Uang Kurang !');
					}
					else if(dibayar == total)
					{
						$("[name='kembalian']").val(0);
					}
					else if(dibayar == "")
					{
						$("[name='kembalian']").val(0);
					}
					else
					{
						$("[name='kembalian']").val(kembalian);
					}
				})
			}
		});
		// func Get data tagihan
		function getdatacart(){
			$.ajax({
				type : 'GET',
				url : "{{url('kasir/getitem')}}",
				dataType : 'JSON',
				success : function(data){
					var no = 1;
					var tblpesanan = $("#datapesanan");
					tblpesanan.html('');
					var total = 0;
					var htmltotal1 = $('#htmltotal');
					$.each(data.pesanan , function(index,item){
						var barisbaru = $('<tr>');			
						tblpesanan.append(barisbaru);
						var pesanan = item.product_name;
						var qty = item.qty;
						var price = item.price;
						var subtotal = qty*price;
						var user = item.user_name;
						total += subtotal;
						$("[name='pemesan']").val(null);
						$("[name='nomeja']").val(null);
						$("[name='total']").val(null);
						$("[name='dibayar']").val(null);
						$("[name='kembalian']").val(null);
						no++;
					})
				//show total
				htmltotal1.html('<h1>TOTAL : Rp'+total+'</h1>');
			}
		});
		}
		//table order
		$.ajax({
			type : 'GET',
			url : "{{url('kasir/orderdetails')}}",
			dataType : 'JSON',
			success: function(data){
				var no = 0;
				var tblorder = $('#dataorder');
				tblorder.html("");
				$.each(data.order, function(i,el){
					console.log(el);
					var barisbaru = $("<tr>");
					tblorder.append(barisbaru);
					var id = el.id;
					// console.log(id);
					var kasir = el.caseername;
					var pemesan = el.pemesan;
					var nomeja = el.nomeja;
					var total = el.total;
					var dibayar = el.dibayar;
					var kembalian = el.kembalian;
					var tgl = el.created_at;
					no++;
					barisbaru.html(
						`<td>`+no+`</td>
						<td>`+kasir+`</td>
						<td>`+pemesan+`</td>
						<td>`+nomeja+`</td>
						<td>Rp`+total+`</td>
						<td>Rp`+dibayar+`</td>
						<td>Rp`+kembalian+`</td>
						<td>`+tgl+`</td>
						<td><button onclick="getorderdetailbyid(`+id+`)" class='btn btn-sm btn-default orderdetail' data-idorderdetail="id" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></button></td>`
						);
				});
			}
		})
		//Get data order
		function getdataorder(){
			$.ajax({
				type : 'GET',
				url : "{{url('kasir/orderdetails')}}",
				dataType : 'JSON',
				success: function(data){
					var no = 0;
					var tblorder = $('#dataorder');
					tblorder.html("");
					$.each(data.order, function(i,el){
						var barisbaru = $("<tr>");
						tblorder.append(barisbaru);
						var id = el.id;
						var kasir = el.caseername;
						var pemesan = el.pemesan;
						var nomeja = el.nomeja;
						var total = el.total;
						var dibayar = el.dibayar;
						var kembalian = el.kembalian;
						var tgl = el.created_at;
						no++;
						barisbaru.html(
							`<td>`+no+`</td>
							<td>`+kasir+`</td>
							<td>`+pemesan+`</td>
							<td>`+nomeja+`</td>
							<td>Rp`+total+`</td>
							<td>Rp`+dibayar+`</td>
							<td>Rp`+kembalian+`</td>
							<td>`+tgl+`</td>
							<td><button onclick='getorderdetailbyid(`+id+`)' class="btn btn-sm btn-default orderdetail" data-target="#modal-default" data-toggle="modal"><i class="fa fa-eye"></button></td>`
							);
					});
				}
			})
		};
		//Post data form order 
		$('#bayar').click(function(e){	
			e.preventDefault();
			$.ajax({
				type : 'POST',
				url : "{{url('kasir/formorder')}}",
				data : $('#formorder').serialize(),
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				success: function(){
					// console.log('terkirim')
					getdatacart();
					getdataorder();
				}
			})
		})
	});
	//get orderdetails by id
	function getorderdetailbyid(id){
		console.log(id);
		$.ajax({
			type : "GET",
			data : id,
			url : "{{url('kasir/orderdetailbyid')}}/"+id,
			success : function(data){
				var no = 1;
				var total = 0;
				var tabledata = $('#tblbodyinvoice');
				$.each(data.orderdetails, function(i,el){
					var pelanggan = el.pemesan;
					var	nomeja = el.nomeja;
					var tgl = el.created_at;
					var total = el.total;
					var petugas = el.caseername;
					var pesanan = el.pesanan;
					var harga = el.price;
					var qty = el.qty;
					var subtotal = harga * qty;
					total = total + subtotal;
					var dibayar = el.dibayar;
					var kembalian = el.kembalian;
					console.log(subtotal);
					$('#invoiceinfo').html(
						`<p>Pelanggan : `+pelanggan+`</p>
						<p>No. Meja : `+nomeja+`</p>
						<p>Tanggal : </p>
						<p>Jam : </p>
						<p>Petugas : `+petugas+`</p>`
						);
					var tablerow = $("<tr>");
					tabledata.append(tablerow);
					tablerow.html(
						`<td>`+no+`</td>
						<td>`+pesanan+`</td>
						<td>`+qty+`</td>
						<td>`+harga+`</td>
						<td>`+subtotal+`</td>`
						);
					no++;

				})
			},
			
		})
	}
</script>
<!-- modal invoice -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h2 class="modal-title" style="text-align: center;">Invoice</h2>
					<div style="float: left;">
						<h5 >Restaurant Jayabaya</h5>
						<p>Jalan Bandung km 81</p>
						<p>Tlp (021) 678634</p>
					</div>
					<div style="float: right;" id="invoiceinfo">
					</div>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Pesanan</th>
								<th>Kuantiti</th>
								<th>Harga</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody id="tblbodyinvoice">
						</tbody>
					</table>
					<h5 style="text-align: center;">Terima kasih atas kunjungan anda</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
				</div>
			</div>
		</div>
	</div>
	<!-- form payment -->
	<section class="content">
		<div class="container" style="margin-right: 30px;">
			<h2>Pembayaran</h2>	
			<div class="row">
				<div class="col-md-4">
					<!-- Horizontal Form -->
					<div class="box">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Data Pemesan</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form class="form-horizontal" id="formorder" method="POST">
								@csrf
								<div class="box-body">
						  <!-- <div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Kode Pesanan</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="kode" id="kode" readonly="" placeholder="PSN0001">
									</div>
								</div> -->
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Kasir</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="namakasir" name="namakasir" readonly="" placeholder="Kasir">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Nama Pemesan</label>

									<div class="col-sm-10">
										<input type="text" class="form-control @error('pemesan') is-invalid @enderror" name="pemesan" id="pemesan" placeholder="Nama Pemesan">
									</div>
									@error('pemesan')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">No. Meja</label>

									<div class="col-sm-10">
										<input type="text" class="form-control @error('nomeja') is-invalid @enderror" name="nomeja" id="nomeja" placeholder="No. Meja">
									</div>
									@error('nomeja')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Total Tagihan</label>

									<div class="col-sm-10">
										<input type="" class="form-control" name="total" id="total" readonly="" placeholder="0">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Bayar</label>

									<div class="col-sm-10">
										<input type="number" class="form-control @error('dibayar') is-invalid @enderror" name="dibayar" id="dibayar" placeholder="Bayar">
									</div>
									@error('dibayar')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Kembali</label>

									<div class="col-sm-10">
										<input type="text"  value="0" class="form-control" name="kembalian" id="kembalian" readonly="" placeholder="Kembalian">
									</div>
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-default">Cancel</button>
								<button type="submit" id="bayar" class="btn btn-info pull-right">Bayar</button>
							</div>
							<!-- /.box-footer -->
						</form>
					</div>
				</div>
			</div>
			<!-- daftar pesanan -->
			<div class="col-md-7">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Daftar Tagihan</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table class="table table-bordered">
							<thead>		
								<tr>
									<th style="width: 10px">No.</th>
									<th>Pesanan</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody id="datapesanan">
							</tbody>
						</table>
					</div>
				</div>
				<div id="htmltotal">
				</div>
				<!-- /.box -->
			</div>
			<!-- daftar terbayar-->
			<div class="container">
				<div class="row">
					<div class="col-md-11">
						<!-- <h2>Daftar Penjualan</h2> -->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Item Terbayar</h3>

								<div class="box-tools">
									<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
										<input type="text" name="table_search" class="form-control pull-right" placeholder="Cari Kode Pesanan">

										<div class="input-group-btn">
											<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<thead>
										
										<tr>
											<th>No</th>
											<th>Kasir</th>
											<th>Pemesan</th>
											<th>No. Meja</th>
											<th>Total</th>
											<th>Bayar</th>
											<th>Kembali</th>
											<th>Date Order</th>
											<th>Detail</th>
										</tr>
									</thead>
									<tbody id="dataorder">
									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
				</div>
			</div>	
		</div>

	</div>
</section>
@endsection