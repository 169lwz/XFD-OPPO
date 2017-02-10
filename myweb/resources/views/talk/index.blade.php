@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><b class="icon-table">查看评论</b></span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
	        <form action="/admin/user/index" method="get">
		        <div id="DataTables_Table_1_length" class="dataTables_length">
			        <label>查看 
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
						        <option value="25"
									@if(!empty($request['num']) && $request['num']=='25')
										selected
									@endif
						        >25</option>
						        <option value="50"
									@if(!empty($request['num']) && $request['num']=='50')
										selected
									@endif
						        >50</option>
						        <option value="100"
									@if(!empty($request['num']) && $request['num']=='100')
										selected
									@endif
						        >100</option>
					    </select> 条
					</label>
		        </div>

		        <div class="dataTables_filter" id="DataTables_Table_1_filter">
		        	<label>搜索: 
		        		<input type="text" name="keyword" value="@if(!empty($request['keyword'])){{$request['keyword']}}@endif" aria-controls="DataTables_Table_1">
		        		<input type="submit" class="btn btn-primary" value="查询">
		        	</label>
		        </div>
		    </form>

	        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
	            <thead>
	                <tr role="row">
		                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 141px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Browser: activate to sort column ascending">用户</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 179px;" aria-label="Platform(s): activate to sort column ascending">商品</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">评论内容</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">回复评论</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 86px;" aria-label="CSS grade: activate to sort column ascending">评论时间</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 86px;" aria-label="CSS grade: activate to sort column ascending">评分</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 86px;" aria-label="CSS grade: activate to sort column ascending">晒图</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 86px;" aria-label="CSS grade: activate to sort column ascending">追评</th>
	                </tr>
	            </thead>
	            
		        <tbody role="alert" aria-live="polite" aria-relevant="all">
			        @foreach($list as $k=>$v)
			        <!--判断奇偶行数, 实现隔行换色-->
				        @if($k%2==0)
							<tr class="odd">
				        @else
				        	<tr class="even">
				        @endif				        
			                    <td class="  sorting_1">{{$v['id']}}</td>
			                    <td class=" ">{{$v['uid']}}</td>
			                    <td class=" ">{{$v['gid']}}</td>
			                    <td class=" ">{{$v['con']}}</td>
			                    <td class=" ">{{$v['replay']}}</td>
			                    <td class=" ">{{$v['time']}}</td>
			                    <td class=" ">{{$v['points']}}</td>
			                    <td class=" ">{{$v['show']}}</td>
			                    <td class=" ">{{$v['addtalk']}}</td>
			                  
			                    <td class=" ">
									<a href="/admin/talk/del/{{$v['id']}}" class="icon-trash" style="font-size:25px;color:orange"></a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="/admin/talk/replay/{{$v['id']}}" class="icon-legal" style="font-size:25px;color:orange"></a>
									
			                    </td>		                   
					      	</tr>
			        @endforeach
		       

		        </tbody>
	        </table>
	        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
	        <!--分页开始-->
	        <div class="dataTables_paginate paging_full_numbers" id="page">
			<!--参数注入 给分页的url跳转注入跳转页大小参数 num-->
		     {!!$list ->appends($request) -> render()!!}  
	        </div>
	        <!--分页结束-->
        </div>
    </div>
</div>
@endsection