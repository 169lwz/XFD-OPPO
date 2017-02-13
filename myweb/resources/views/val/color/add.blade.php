@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header"><span>商品颜色添加</span></div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/val/insertcolor" class="mws-form" method="post" enctype="multipart/form-data">
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
                  <label class="mws-form-label">商品主图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='gpic' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
            </div>
			<div class="mws-form-row">
				<label class="mws-form-label">商品颜色</label>
				<div class="mws-form-item">
					<input type="text" class="small" name="color" value="">
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