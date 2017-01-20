@extends('layout.adminindex')

@section('con')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>添加分类</span>
    </div>

    <div class="mws-panel-body no-padding">
    	<form action="/admin/type/insert" method="post" class="mws-form">
    	{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">父分类</label>
    				<div class="mws-form-item">
    					<select class="small" name="id">
	    					<option value="0">顶级分类</option>
	    					@foreach($list as $k=>$v)
	    						<option value="{{$v['id']}}"
									@if($id==$v['id'])
										selected
									@endif
	    						>{{$v['tname']}}</option>
	    					@endforeach
    					</select>
    				</div>
    			</div>   	
    			<div class="mws-form-row">
    				<label class="mws-form-label">子分类</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="name">
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