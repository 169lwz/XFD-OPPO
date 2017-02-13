@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i> 广告图片浏览</span>
	</div>
	<div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

		<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
	                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">图片名称</th>
	                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">图片</th>
	                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">图片备注</th>
	                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">状态</th>
	                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                </tr>
            </thead>                         
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                	@foreach($lis as $k=>$v)
                		@if($k%2=='0')
		                	<tr class="odd">
		                @else
		                	<tr class="even">
		                @endif
		                        <td align='center' class="  sorting_1">图片{{$v['id']}}</td>
		                        
		                        <td class=" " align='center'><img src="{{$v['pic']}}" style="width:100px"></td>

		                        <td align='center' class="  sorting_1">{{$v['desc']}}</td>

		                        <td align='center' class=" ">
				                        	@if($v['status']=='0')
				                        		显示
				                        	@else
				                        		不显示
				                        	@endif
				                        </td>

		                        <td class=" " align='center' font-size='30px'>
		                        	<a href='/admin/guanggao/del/{{$v['id']}}' class="icon-trash" style='font-size:25px;color:red' title='删除图片'></a> | <a href='/admin/guanggao/edit/{{$v['id']}}' class="icon-cogs" style='font-size:25px;color:green' title='修改'></a>
		                        </td>
		                    </tr>
                   	@endforeach
                </tbody>
       	</table>

	</div>
</div>
@endsection