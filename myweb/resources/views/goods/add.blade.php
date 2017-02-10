@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header"><span>商品添加</span></div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/goods/insert" class="mws-form" method="post" enctype="multipart/form-data">
    		{{csrf_field()}}
    		<div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">商品类别</label>
                    <div class="mws-form-item">
                        <select class="small" name="tid">
                            <option value="0">顶级分类</option>
                            @foreach($list as $k=>$v)
                                <option value="{{$v['id']}}">{{$v['tname']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>      
         
			<div class="mws-form-row">
				<label class="mws-form-label">商品名称</label>
				<div class="mws-form-item">
					<input type="text" class="small" name="gname" value="">
				</div>
			</div>
            <div class="mws-form-row">
                  <label class="mws-form-label">商品主图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
            </div>
			<div class="mws-form-row">
				<label class="mws-form-label">商品单价</label>
				<div class="mws-form-item">
					<input type="text" class="small" name="price" value="">
				</div>
			</div>
            <div class="mws-form-row">
                <label class="mws-form-label">商品描述</label>
                <div class="mws-form-item">
                    <input type="text" class="small" name="desc" value="">
                </div>
            </div>
			<div class="mws-form-row">
				<label class="mws-form-label">商品库存</label>
				<div class="mws-form-item">
					<input type="text" class="small" name="store" value="">
				</div>
			</div>
            <div class="mws-form-row">
                <label class="mws-form-label">商品状态</label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li><input type="radio" name="status" value="1"> <label>新上架</label></li>
                        <li><input type="radio" name="status" value="2"> <label>在售</label></li>
                        <li><input type="radio" name="status" value="3"> <label>下架</label></li>                    
                    </ul>
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