@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>修改分类</span>
    </div>

    <div class="mws-panel-body no-padding">
    	<form action="/admin/links/update" method="post" class="mws-form">
    	{{csrf_field()}}
    		<input type="hidden" name="id" value="{{$vo['id']}}">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">父分类</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="fname" value="{{$funame}}" disabled>
    				</div>
    			</div>			
    			<div class="mws-form-row">
    				<label class="mws-form-label">子分类</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="lname" value="{{$vo['lname']}}">
    				</div>
    			</div>			
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" class="btn btn-danger" value="修改">
    			<input type="reset" class="btn " value="重置">
    		</div>
    	</form>
    </div>    	
</div>
@endsection