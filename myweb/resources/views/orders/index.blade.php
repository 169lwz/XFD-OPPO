@extends('layout.adminindex')
@section('con')
<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i>订单浏览</span>
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
		            	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">姓名</th>
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
<div id="edit" style="display:none">
	<table border="1">
		<tr>
			<td id="edit1"></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	myajax(5,1);
	
	$('#shou').click(function(){
		$('select:eq(1)').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		myajax(num,1,key);
	});

	$('#mo').click(function(){
		$('select:eq(1)').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		myajax(num,$(this).attr('info'),key);
	});	

	$('#shang').click(function(){
		$('select:eq(1)').empty();
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
		$('select:eq(1)').empty();
		var key=$('#search').val();
		var num=$('select:eq(0)').val();
		var page=parseInt($(this).attr('info'));
		if(page>=$('#mo').attr('info')){
				page=$('#mo').attr('info');
			}else{
				page=page+1;
			}
		myajax(num,page,key);
	});

	$('select:eq(0)').change(function(){
		var key=$('#search').val();
		$('select:eq(1)').empty();
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
		$('select:eq(1)').empty();
		var key=$(this).val();
		var num=$('select:eq(0)').val();
		console.log(key);
		myajax(num,1,key);
	});

//====================修改操作====================================
	$('.icol32-cog-edit').live('click',function(){
		$('#edit').css('display','block');
	});

	
	function myajax(num,page,key){ //num =每页显示条数 page= 当前页数
		$.ajax({
			url:'/orders/show',
			type:'get',
			data:{'num':num,'page':page,'key':key},
			dataType:'json',
			async:false,
			success:function(mes){
				$('select:eq(1)').val(page);
				var y=$('#ye');
				var y1=$(mes)[$(mes).length-1]; //最大页数
				console.log(y1);
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
				$('#mo').attr('info',$(mes)[$(mes).length-1]);//末页最大页数
				$(mes).each(function(i){
					if(i==$(mes).length-1)return;
					a= $('<tr class="odd"><td>'+$(this).attr('id')+'</td><td>'+$(this).attr('name')+'</td><td>'+$(this).attr('code')+'</td><td>'+$(this).attr('addtime')+'</td><td>'+$(this).attr('status')+'</td><td><a href="javascript:;" class="icol32-bin"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="icol32-cog-edit"></a></td></tr>');
					$('#z').append(a);
				});
			}
		});
		$('#shang').attr('info',page);
		$('#xia').attr('info',page);
	}
	


</script>
@endsection