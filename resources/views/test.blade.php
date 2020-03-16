<!-- <table>
	<tr>
		<th>nama</th>
	</tr>
	@foreach($users as $u)
	<tr>
		<td>{{$u->name}}</td>
		<td>{{$u->level}}</td>
		<td>{{$u->email}}</td>
	</tr>
	@endforeach
</table>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<button id="test">test</button>

<script type="text/javascript">
	$(document).ready(function(){

		$('#test').click(function(){
			ob = $("#master").clone() ;
			ob.show() ;

			ob.find(".nama").html("product1") ; 
			ob.find(".qty").html("100") ; 

			$(".sidebar").append(ob); 

			$("#master").remove(); 
		});

	});
</script>

<div id="master" style="display: none">
	<div>
		<div style="float: left">nama : </div>
		<div style="float: left" class="nama">dodi</div>	
		<div style="clear:both"></div>
	</div>

	<div>
		<div style="float: left">qty : </div>
		<div style="float: left" class="qty">1</div>
		<div style="clear:both"></div>
	</div>
</div>

<div class="sidebar">loading..</div>

<hr>


<?php 


	// function arr($arr)
	// {
	// 	$tertinggi =  0 ; 
	// 	for ($i=0; $i < count($arr); $i++) 
	// 	{ 
	// 		if  ( $arr[$i] > $tertinggi)
	// 		{
	// 			$tertinggi = $arr[$i]; // 50
	// 		}
	// 	}
	// 	//echo $tertinggi ; 

	// 	$tertinggi2 =  0 ; 
	// 	for ($i=0; $i < count($arr); $i++) 
	// 	{ 
	// 		if ( $arr[$i] != $tertinggi )
	// 		{
	// 			if  ( $arr[$i] > $tertinggi2)
	// 			{
	// 				$tertinggi2 = $arr[$i]; // 50
	// 			}
	// 		}
			
	// 	}
	// 	echo $tertinggi2 ; 
	// }

	// $arr1 = [1,12,31,5,3,23,4,5,50,22];
	// arr($arr1);
?> -->

<script type="text/javascript">
	var a = [1,2,3];
	var b = 0;
	var c = 1;
	var d = 2;
	var e = 3;
	// a.forEach(getdata);
	// function getdata(i,val){
	// 	// console.log("index : "+i+" val :"+val);
	// 	console.log(i)
	// 	b = i+b;
	// }
	console.log(b = b + (c+d+e))
</script>