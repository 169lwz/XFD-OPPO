@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i> 商品浏览</span>
	</div>
	<div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
		<form action='/admin/goods/index' method='get'>	<!--要传参数,自己提交给自己,所以用get-->
			<div id="DataTables_Table_1_length" class="dataTables_length">		
				<label>显示
					<select name="num" size="1" aria-controls="DataTables_Table_1">
						<option value="5"
							@if(!empty($request['num']) && $request['num']=='5')
								selected
							@endif
						>5</option>
						<option value="10"
							@if(!empty($request['num']) && $request['num']=='10')
								selected
							@endif
						>10</option>
						<option value="20"
							@if(!empty($request['num']) && $request['num']=='20')
								selected
							@endif
						>20</option>
						<option value="40"
							@if(!empty($request['num']) && $request['num']=='40')
								selected
							@endif
						>40</option>		
						
					</select> 条
				</label>
			</div>
			<div class="dataTables_filter" id="DataTables_Table_1_filter">
				<label>Search: <input type="text" aria-controls="DataTables_Table_1" name='keyword' value='@if(!empty($request['keyword'])){{$request['keyword']}}@endif'></label>
				<input type="submit" class="btn btn-primary" value='搜索'>
			</div>
				<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
		            <thead>
		                <tr role="row">
			                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">商品名称</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">类别</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 221px;" aria-label="Engine version: activate to sort column ascending">主图</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">价格</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">描述</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">详细信息</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">库存</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">状态</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
		                </tr>
		            </thead>                         
		                <tbody role="alert" aria-live="polite" aria-relevant="all">
		                	@foreach($list as $k=>$v)
		                		@if($k%2=='0')
				                	<tr class="odd">
				                @else
				                	<tr class="even">
				                @endif
				                        <td class=" ">{{$v['id']}}</td>
				                        <td class=" ">{{$v['gname']}}</td>
				                        <td class=" ">{{$v['tid']}}</td>
				                        <td class=" "><img src="{{$v['pic']}}" width="60px"></td>
				                        <td class=" ">{{$v['price']}}</td>
				                        <td class=" ">{{$v['desc']}}</td>
				                        <td class=" ">
				                        	<a href="/admin/detail/indexh"><font color="green">详细信息</font></a>
				                        </td>
				                        <td class=" ">{{$v['store']}}</td>                    
				                        <td class=" ">
				                        	@if($v['status']=='1')
				                        		新上架
				                        	@elseif($v['status']=='2')
				                        		在售
				                        	@else
				                        		下架
				                        	@endif
				                        </td>
				                        <td class=" " align='center' font-size='30px'>
				                        	<a href='/admin/goods/del/{{$v['id']}}' class="icon-trash" style='font-size:25px;color:red' title='删除'></a> | 
				                        	<a href='/admin/goods/edit/{{$v['id']}}' class="icon-cogs" style='font-size:25px;color:green' title='修改'></a>
				                        </td>
				                    </tr>
		                   	@endforeach
		                </tbody>
		       	</table>
	       	</form>
        <div class="dataTables_paginate paging_full_numbers" id="page">  
        		 <!-- 参数注入appends 分页页数大小-->
            	{!!$list->appends($request)->render()!!}	<!--双叹号,解析标签-->                
        </div>
	</div>
</div>
@endsection