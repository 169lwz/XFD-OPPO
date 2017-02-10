@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i> 用户浏览</span>
	</div>
	<div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
		<form action='/admin/guanli/index' method='get'>	<!--要传参数,自己提交给自己,所以用get-->
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
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">用户名</th>
			                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">电话</th>
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
				                        <td class="  sorting_1">{{$v['id']}}</td>
				                        <td class=" ">{{$v['username']}}</td>
				                        <td class=" ">{{$v['phone']}}</td>
				                        <td class=" ">
				                        	@if($v['status']=='0')
				                        		禁用
				                        	@else
				                        		启用
				                        	@endif
				                        </td>
				                        <td class=" " align='center' font-size='30px'>
				                        	<a href='/admin/guanli/hs/{{$v['id']}}' class="icon-trash" style='font-size:25px;color:red' title='放入回收站'></a> | <a href='/admin/guanli/edit/{{$v['id']}}' class="icon-cogs" style='font-size:25px;color:green' title='修改'></a>
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