@extends('layout.adminindex')

@section('con')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>轮播图修改</span>
                    </div>        
					
                    <div class="mws-panel-body no-padding">

                    	<form action="/admin/lunbo/update" class="mws-form" method='post' enctype='multipart/form-data'>
                    		{{csrf_field()}}
                              <!-- 添加隐藏域,携带用户的id信息 -->
                              <input type="hidden" name='id' value='{{$vo['id']}}'>
                    		<div class="mws-form-inline">

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">图片</label>
                    				<div class="mws-form-item">
                    					<input type="file" class="small" name="pic" value='{{$vo['pic']}}' >
                    				</div>
                    			</div>

                                   <div class="mws-form-row">
                                      <label class="mws-form-label"></label>
                                      <div class="mws-form-item">
                                           <img src="{{$vo['pic']}}" alt="" style="width:300px">
                                      </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">图片备注</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="desc" value='{{$vo['desc']}}'>
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">状态</label>
                                        <div class="mws-form-item">
                                             <select name="status" id="" class="small">
                                                  <option value="0" @if($vo['status']=='0') selected @endif>显示</option>
                                                  <option value="1" @if($vo['status']=='1') selected @endif>不显示</option>
                                             </select>
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