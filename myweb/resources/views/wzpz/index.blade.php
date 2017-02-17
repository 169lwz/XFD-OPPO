@extends('layout.adminindex')
@section('con')


<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i>配置浏览</span>

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
	    				<select name="" id="qudong">
			<option value="0">开启</option>
			<option value="1">关闭</option>
		</select>
	    	</div>

	    	<div class="dataTables_filter" id="DataTables_Table_1_filter">
	    		<label>Search: <input type="text" name="key" aria-controls="DataTables_Table_1" id="search"></label>
	    	</div>
		

	    	<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
		        <thead>
		            <tr role="row">
		            	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 130px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ico</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 140px;" aria-label="Browser: activate to sort column ascending">关键字</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Platform(s): activate to sort column ascending">网站logo</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">网站名称</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">联系电话</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">版权信息</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">网站介绍</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 128px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
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
	<table border="1">
		<form></form>
	</table>
	
</div>
<div id="del" style="display:none">
	<div id="del1">
		删除成功~1...
	</div>
</div>
{{csrf_field()}}
<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
<script type="text/javascript">
	var _token=$('input[name="_token"]').val();

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
	$('.icol32-bin').live('click',function(){
		var id=$(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td').html(); //订单号
		var uid=$(this).parent().parent().find('td:eq(1)').next('td').next('td').prev('td').parent().find('input').val();
		var _token=$('input[name="_token"]').val();
		var num=$('select:eq(0)').val();
		var page=$('#ye').val();
		var key=$('#search').val();
		$.ajax({
			url:'/orders/del',
			type:'post',
			data:{'id':id,'_token':_token,'uid':uid},
			dataType:'text',
			success:function(mes){
				if(mes=='yes'){
					$('#del').css('display','block');

					setTimeout(function(){
						$('#del').css('display','none');
					},1000);
					$('#ye').empty();
					myajax(num,page,key);
				}else{

				}
			}
		});

	});
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
//====================修改操作====================================


	

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
			url:'/wzpz/show',
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
					
				a= $('<tr class="odd" align="center"><td><img src="'+$(this).attr('ico')+'" width="50px"></td><input type="hidden" name="id" value="'+$(this).attr('id')+'"><td>'+$(this).attr('keyword')+'</td><td><img src="'+$(this).attr('pic')+'" width="50px"></td><td>'+$(this).attr('name')+'</td><td>'+$(this).attr('phone')+'</td><td>'+$(this).attr('con')+'</td><td>'+$(this).attr('desc')+'</td><td><a href="/wzpz/delete/'+$(this).attr('id')+'" class="icol32-bin"></a>&nbsp;&nbsp;&nbsp;<a href="/wzpz/edit/'+$(this).attr('id')+'" class="icol32-cog-edit"></a><input type="radio" name="xz" value="'+$(this).attr('auto')+'"></td></tr>');
					var c=$(a).find('input[name="xz"]');
					if(c.val()=='1'){
						c.attr('checked',true);
					}
					$('#z').append(a);
					$('#qudong').val($(this).attr('status'));
					// console.log($(this).attr('status'));
				});
			}
		});
		$('#shang').attr('info',page);
		$('#xia').attr('info',page);
	}

	$('input[name="xz"]').live('click',function(){
		var id=$(this).parent().parent().find('input[name="id"]').val();
		$.ajax({
			url:'/wzpz/xz',
			type:'get',
			data:{'id':id},
			dataType:'text',
			success:function(mes){
				if(mes=='yes'){
					
				}
			}
		});
	});


	$('#qudong').change(function(){
		var oo=$(this).val();
		console.log(oo);
		$.ajax({
			url:'/wzpz/qd',
			type:'get',
			data:{'status':oo},
			dataType:'text',
			success:function(mes){
				if(mes=='yes'){
					alert('修改成功');
				}
			}
		});
	});

	
</script>

@endsection