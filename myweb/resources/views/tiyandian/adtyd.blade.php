@extends('layout.adminindex')
@section('con')
<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i>门店浏览</span>
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
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">所在城市</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">门店名称</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">营业时间</th>
		            	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">类型</th>
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
		<table id="text-color" border="1" width="800px">
			<tr><th colspan="10">门店详情</th></tr>
			<tr id="lll">
				<th colspan="10" id="zz" >
					<div id="zz">
						<p id="sjr">店面名称 : </p><p id="sjr1">165</p>
						<p id="sjr3">店面类型 : </p><p id="sjr2">165</p>
						<p id="dh">电话 : </p><p id="dh1">444</p>
						<p id="dz">地址 : </p><p id="dz1">55</p>				
						<p id="zj">营业时间 : </p><p id="zj1">55</p>
						<button id="quxiao">取消</button>				
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
			}
		myajax(num,page,key);
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
		var id=$(this).parents('.odd').find('td:eq(0)').html(); //获取id
		var _token=$('input[name="_token"]').val();
		var num=$('select:eq(0)').val();
		var page=$('#ye').val();
		var key=$('#search').val();
		$.ajax({
			url:'/ty/del',
			type:'post',
			data:{'id':id,'_token':_token},
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

	$('.edit0').live('change',function(){ //修改店面类型
		var dz=$(this).val();
		var id=$(this).parents('.odd').find('td:eq(0)').html(); //获取id
		// return false;
		var _token=$('input[name="_token"]').val();
		$.ajax({
			url:'/ty/edit',
			type:'post',
			data:{'id':id,'type':dz,'_token':_token},
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

	$('.edit1').live('change',function(){ //修改店面类型
		var dz1=$(this).val();
		var id1=$(this).parents('.odd').find('td:eq(0)').html(); //获取id
		// return false;
		var _token=$('input[name="_token"]').val();
		$.ajax({
			url:'/ty/edit1',
			type:'post',
			data:{'id':id1,'jobtime':dz1,'_token':_token},
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
		var id=$(this).parents('.odd').find('td:eq(0)').html(); //获取id
		// console.log($(this).parents('.odd').find('td:eq(0)'));
		// return false;
		
		var _token=$('input[name="_token"]').val();
		var dd=$('#lll');
		$.ajax({
		url:'/ty/detail',
		type:'post',
		data:{'id':id,'_token':_token},
		dataType:'json',
		success:function(mes){
			$(mes).each(function(){
				$('#sjr1').html($(this).attr('name'));
				$('#sjr2').html($(this).attr('type'));
				$('#dh1').html($(this).attr('phone'));
				$('#dz1').html($(this).attr('sheng')+$(this).attr('shi')+$(this).attr('name'));
				$('#zj1').html($(this).attr('jobtime'));
				// dd.before(con);

			});
		}
	});
});


	

	$(window).keyup(function(ent){ //显示订单详情的DIV
		if(ent.key=='Escape'){
			$('#big1').css('display','none');
		}
	});

	$('#quxiao').click(function(){ //点击显示订单详情的DIV
		$('#big1').css('display','none');
	})

	function myajax(num,page,key){ //num =每页显示条数 page= 当前页数 key=搜索条件
		$.ajax({
			url:'/ty/show',
			type:'get',
			data:{'num':num,'page':page,'key':key},
			dataType:'json',
			async:false,
			success:function(mes){
				$('select:eq(1)').val(page);
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
				$('#mo').attr('info',$(mes)[$(mes).length-1]);//末页最大页数
				$(mes).each(function(i){
					if(i==$(mes).length-1)return;
					
				a= $('<tr class="odd" align="center"><td>'+$(this).attr('id')+'</td><td>'+$(this).attr('shi')+'</td><td>'+$(this).attr('name')+'</td>       <td><select class="edit1"><option value="9:00--17:00">9:00--17:00</option><option value="12:00--00:00">12:00--00:00</option><option value="10:00--20:00">10:00--20:00</option></select></td>       <td><select class="edit0"><option value="旗舰店">旗舰店</option><option value="体验店">体验店</option></select></td><td><a href="javascript:;" class="icol32-bin"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="icol32-cog-edit"></a></td></tr>');
					$('#z').append(a);
					$(a).find('.edit0').val($(this).attr('type'));
					$(a).find('.edit1').val($(this).attr('jobtime'));
					// console.log($(this).attr('status'));
				});
			}
		});
		$('#shang').attr('info',page);
		$('#xia').attr('info',page);
	}
	
</script>

@endsection