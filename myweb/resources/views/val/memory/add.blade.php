@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header"><span>商品内存添加</span></div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/val/insertmemory" class="mws-form" method="post" enctype="multipart/form-data">
    		{{csrf_field()}}
    		<div class="mws-form-inline">
            <div class="mws-form-row">
                <label class="mws-form-label">商品名称</label>
                <div class="mws-form-item">
                    <select class="small" name="gid">
                        <option value="0">商品</option>
                        @foreach($list as $k=>$v)
                            <option value="{{$v['id']}}">{{$v['gname']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>      
         
      			<div class="mws-form-row">
      				<label class="mws-form-label">商品版本</label>
      				<div class="mws-form-item">
      					<input type="text" class="small" name="memory" value="">
      				</div>
      			</div>
           
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="添加">
                <input type="reset" class="btn " value="重置">
            </div>  
         </div>      
    	</form>
    </div>    	
</div>
@endsection	