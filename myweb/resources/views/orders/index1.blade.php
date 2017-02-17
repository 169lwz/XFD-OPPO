@extends('layout.adminindex')
@section('con')


<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i>订单回收</span>
	</div>
	<div class="mws-panel-body no-padding">
	    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

	    
	    	<div id="DataTables_Table_1_length" class="dataTables_length">
	    		<label>Show 
	    			<select name="num" size="1" aria-controls="DataTables_Table_1">
	    				<option value="5">5</option>
	    				<option value="10">10</option>
	    				<option value="25">25</option>
	    				<option value="50">50</option>
	    			</select> 
	    		entries</label>
	    	</div>

	    	<div class="dataTables_filter" id="DataTables_Table_1_filter">
	    		<label>Search: <input type="text" name="key" aria-controls="DataTables_Table_1" id="search"></label>
	    	</div>
		

	    	<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
		        <thead>
		            <tr role="row">
		            	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">用户名</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">收件人</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">订单号</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">下单时间</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">状态</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
		            </tr>
		        </thead>

				<tbody role="alert" aria-live="polite" id="z" aria-relevant="all"></tbody>
	   		</table>
		   	<div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				<a  id="shou" class="paginate_button" tabindex="0">首页</a>
				<a  id="shang" class="paginate_button" tabindex="0">上一页</a>
				<a  id="xia" class="paginate_button" tabindex="0">下一页</a>
				<a  id="mo" class="paginate_button" tabindex="0">末页</a>
				当前页<select class="paginate_button" id="ye" style="width:60px"></select>
		   	</div>
	   	</div>
	</div>
</div>
<div id="big1" style="display:none">

	<div id="small1">
		<table id="text-color" border="1" width="900px">
			<tr><th colspan="6">订单详情</th></tr>
			<tr >
				<th>商品名称</th>
				<th width="300px">商品描述</th>
				<th>购买数量</th>
				<th>单价</th>
				<th>图例</th>
				<th>小计</th>
			</tr>
			<tr id="lll">
				<th colspan="6" id="zz" >
					<div id="ww">
						<p id="z1">收&nbsp;&nbsp;件&nbsp;&nbsp;人 :&nbsp;&nbsp;&nbsp;&nbsp;<span>fds</span></p> 
						<p id="z2">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话 : &nbsp;&nbsp;&nbsp;&nbsp;<span>sss</span></p>	
						<p id="z3">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址 :&nbsp;&nbsp;&nbsp;&nbsp;<span>csdfs</span></p>	
						<p id="z4">应付金额 :&nbsp;&nbsp;&nbsp;&nbsp;<span>xxxx</span></p>	
						<p id="zeng"></p>
						<p id="zeng1">赠品 :</p>
						<button id="quxiao1">取消</button>
					</div>

				</th>
			</tr>
		</table>
	</div>
</div>
<div id="del" style="display:none">
	<div id="del1">
		删除成功~1...
	</div>
</div>
{{csrf_field()}}
<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
<script type="text/javascript">
	myajax(5,1);
	
	$('#shou').click(function(){
		$('#ye').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		myajax(num,1,key);
	});

	$('#mo').click(function(){
		$('#ye').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		myajax(num,$(this).attr('info'),key);
	});	

	$('#shang').click(function(){
		$('#ye').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		var page=parseInt($(this).attr('info'));
		if(page==1){
			page=1;
		}else{
			page=page-1;
		}
		myajax(num,page,key);
	});
	
	$('#xia').click(function(){
		$('#ye').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		var page=parseInt($(this).attr('info'));
		if(page>=$('#mo').attr('info')){
				page=$('#mo').attr('info');
			}else{
				page=page+1;
				myajax(num,page,key);
			}
		
	});

	$('select:eq(0)').change(function(){
		var key=$('#search').val();
		$('#ye').empty();
		var num=$(this).val();
		myajax(num,1,key);
		
	});

	$('#ye').change(function(){
		var key=$('#search').val();
		var y2=$(this).val();
		var n2=$('select:eq(0)').val();
		$(this).empty();
		myajax(n2,y2,key);		
	});

//====================搜索条件===================================
	$('#search').keyup(function(){
		$('#ye').empty();
		var key=$(this).val();
		var num=$('select:eq(0)').val();
		console.log(key);
		console.log(num);
		myajax(num,1,key);
	});
//====================删除操作===================================
	// $('.icol32-bin').live('click',function(){
	// 	var id=$(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td').html(); //订单号
	// 	var uid=$(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td').parent().find('input').val();
	// 	var _token=$('input[name="_token"]').val();
	// 	var num=$('select:eq(0)').val();
	// 	var page=$('#ye').val();
	// 	var key=$('#search').val();
	// 	$.ajax({
	// 		url:'/orders/del',
	// 		type:'post',
	// 		data:{'id':id,'_token':_token,'uid':uid},
	// 		dataType:'text',
	// 		success:function(mes){
	// 			if(mes=='yes'){
	// 				$('#del').css('display','block');

	// 				setTimeout(function(){
	// 					$('#del').css('display','none');
	// 				},1000);
	// 				$('#ye').empty();
	// 				myajax(num,page,key);
	// 			}else{

	// 			}
	// 		}
	// 	});

	// });
//====================修改操作====================================

	$('.edit0').live('change',function(){
		var dz=$(this).val();
		var id=$(this).parent().prev().prev('td').html(); //订单号
		var uid=$(this).parent().parent().find('input').val(); //用户id
		console.log(uid);
		console.log(id);
		// return false;
		var _token=$('input[name="_token"]').val();
		$.ajax({
			url:'/orders/edit',
			type:'post',
			data:{'editid':id,'editval':dz,'_token':_token,'uid':uid},
			dataType:'text',
			async:false,
			success:function(mes){
				var page1=$('#ye').val();
				var num1=$('select:eq(0)').val();
				var key1 =$('#search').val();
				if(mes=='yes'){
					alert('修改成功');
					$('#ye').empty();
					myajax(num1,page1,key1);
				}else{
					alert('修改失败');
				}		
			}
		});
	});
//====================查看操作====================================
	$('.icol32-cog-edit').live('click',function(){
		$('.sc').remove(); 
		$('#big1').css('display','block');
		var id=$(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td').html(); //订单号
		var uid=$(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td').parent().find('input').val();
		// console.log($(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td'));
		// return false;
		// console.log($(this).parent().parent().find('td:eq(0)'));
		var _token=$('input[name="_token"]').val();
		var dd=$('#lll');
		$.ajax({
		url:'/orders/detail',
		type:'post',
		data:{'order_num':id,'_token':_token,'uid':uid},
		dataType:'json',
		success:function(mes){
			$(mes).each(function(){
				$('#z4').find('span').html($(this).attr('total')+'.00');
				$('#z1').find('span').html($(this).attr('name'));
				$('#z2').find('span').html($(this).attr('phone'));
				var zou=$(this).attr('zp1');
				// console.log(zou);
				$(zou).each(function(i){
					// var con1=$('<span>赠品: </span><span>'+$(this).attr('gfit')+'</span>');
					$('#zeng').append('<span class="sc">+'+'<img src="'+$(this).attr('picture1')+'" width="60px"></span>');
				});
				$('#z3').find('span').html($(this).attr('sheng1')+$(this).attr('shi1')+$(this).attr('xian1')+$(this).attr('jiedao1')+$(this).attr('xiangxi'));
				var con=$('<tr class="sc"><td>'+$(this).attr('gname')+'</td><td>'+$(this).attr('desc')+'</td><td>'+$(this).attr('num')+'</td><td>'+$(this).attr('price')+'</td><td><img src="'+$(this).attr('pic')+'" width="90px"/></td><td>'+$(this).attr('num')*$(this).attr('price')+'.00'+'</td></tr>');
				dd.before(con);
			});
		}
	});
});


	

	$(window).keyup(function(ent){ //显示订单详情的DIV
		if(ent.key=='Escape'){
			$('#big1').css('display','none');
		}
	});

	$('#quxiao1').click(function(){ //点击显示订单详情的DIV
		$('#big1').css('display','none');
	})

	function myajax(num,page,key){ //num =每页显示条数 page= 当前页数 key=搜索条件
		$.ajax({
			url:'/orders/show1',
			type:'get',
			data:{'num':num,'page':page,'key':key},
			dataType:'json',
			async:false,
			success:function(mes){
				// $('select:eq(1)').val(page);
				$('#ye').val(page);
				var y=$('#ye');
				var y1=$(mes)[$(mes).length-1]; //最大页数
				// console.log(y1);
				for(var i=1;i<=y1;i++){
					if(i==page){
						var op=$('<option selected>'+i+'</option>');
					}else{
						var op=$('<option >'+i+'</option>');
					}
					y.append(op);
				}	

				$('#z tr').remove();
				var a= null;
				// console.log($(mes)[$(mes).length-1])
				$('#mo').attr('info',$(mes)[$(mes).length-1]);//末页最大页数
				$(mes).each(function(i){
					if(i==$(mes).length-1)return;
					
				a= $('<tr class="odd" align="center"><td>'+$(this).attr('username')+'</td><input type="hidden" name="uid" value="'+$(this).attr('uid')+'"><td>'+$(this).attr('name')+'</td><td>'+$(this).attr('order_num')+'</td><td>'+$(this).attr('addtime')+'</td><td><select class="edit0"><option value="1">新订单</option><option value="2">已发货</option><option value="3">已收货</option><option value="4">未支付</option><option value="5">已取消</option></select></td><td><a href="javascript:;" class="icol32-bin"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="icol32-cog-edit"></a></td></tr>');
					$('#z').append(a);
					$(a).find('select').val($(this).attr('status'));
					// console.log($(this).attr('status'));
				});
			}
		});
		$('#shang').attr('info',page);
		$('#xia').attr('info',page);
	}
	
</script>

@endsection