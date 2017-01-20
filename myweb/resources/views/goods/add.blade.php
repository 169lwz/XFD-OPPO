@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
   
    <div class="mws-panel-body no-padding">
    	<form action="/admin/goods/insert" class="mws-form" method='post'>
    	<!--生成_token-->
    	{{csrf_field()}}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">商品类别</label>
                    <div class="mws-form-item">
                        <select class="small" name="id">
                            <option value="0">顶级分类</option>
                        </select>
                    </div>
                </div>
            </div> 
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="gname" value="{{old('gname')}}">
    				</div>
    			</div>     		
    		</div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">原价</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="price1" value="{{old('price1')}}">
                    </div>
                </div>          
            </div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">现价</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="price2" value="{{old('price2')}}">
                    </div>
                </div>          
            </div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">图片</label>
    				<div class="mws-form-item">
    					<input type="file" style="width:50%" class="small" name="pic" value="{{old('username')}}">
    				</div>
    			</div>     		
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">版本</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="version" value="{{old('version')}}">
    				</div>
    			</div>     		
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">内存</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="memory" value="{{old('memory')}}">
    				</div>
    			</div>     		
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">颜色</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="color" value="{{old('color')}}">
    				</div>
    			</div>     		
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">描述</label>
    				<div class="mws-form-item">
                        <textarea name="desc" id="" cols="30" rows="10" value="{{old('desc')}}"></textarea>
    				</div>
    			</div>     		
    		</div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">库存</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="store" value="{{old('store')}}">
                    </div>
                </div>          
            </div>
    		<div class="mws-button-row">
    			<input type="submit" class="btn btn-danger" value="添加">
    			<input type="reset" class="btn " value="重置">
    		</div>
    	</form>
    </div>    	
</div>
@endsection