@extends('layout.adminindex')

@section('con')

	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>广告图片添加</span>
        </div>        
		
        <div class="mws-panel-body no-padding">

        	<form action="/admin/guanggao/insert" class="mws-form" method='post' enctype='multipart/form-data'>
            <!-- <form action="/admin/article/insert" class="mws-form" method='post' enctype='multipart/form-data'> -->
        		{{csrf_field()}}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
                          <label class="mws-form-label">添加图片</label>
                          <div class="mws-form-item">
                               <div style="position: relative;" class="fileinput-holder">
                                   <input type="file" name='pic' value='{{old('pic')}}' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                               </div>
                         </div>
                    </div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">备注</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="desc" value='{{old('desc')}}'>
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