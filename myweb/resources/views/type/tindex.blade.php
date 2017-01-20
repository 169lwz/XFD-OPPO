@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><b class="icon-table">分类浏览</b></span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
	        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
	            <thead>
	                <tr role="row">
		                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 141px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Browser: activate to sort column ascending">分类名称</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 179px;" aria-label="Platform(s): activate to sort column ascending">父类</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">路径</th>
		                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 86px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
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
			                    <td class=" ">{{$v['tname']}}</td>
			                    <!--将子类的pid替换成父类的名称  (指定命名空间 调用控制器中的静态方法)-->
			                    <td class=" ">{{\App\Http\Controllers\TypeController::funame($v['pid'])}}</td>
			                    <td class=" ">{{$v['path']}}</td>
			                    <td class=" ">
									<a href="/admin/type/del/{{$v['id']}}" class="icon-trash" style="font-size:25px;color:orange"></a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="/admin/type/add/{{$v['id']}}" class="icon-plus" style="font-size:25px;color:orange"></a>	
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="/admin/type/edit/{{$v['id']}}" class="icon-legal" style="font-size:25px;color:orange"></a>	
			                    </td>		                   
					      	</tr>
			        @endforeach
		        </tbody>
	        </table>
	        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
        </div>
    </div>
</div>
@endsection