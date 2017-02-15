@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header"><span>商品详情修改</span></div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/detail/update" class="mws-form" method="post" enctype="multipart/form-data">
    		{{csrf_field()}}
        <input type="hidden" name="id" value="{{$vo['id']}}">
    		<div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">商品名称</label>
                    <div class="mws-form-item">
                        <select class="small" name="gid">
                            <option value="0" readonly>商品</option>
                            @foreach($list as $k=>$v)
                                <option value="{{$v['id']}}" 
                                @if($v['id']==$vo['gid']) 
                                  selected 
                                @endif
                                >{{$v['gname']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">商品颜色</label>
                    <div class="mws-form-item">
                      <input type="text" class="small" name="color" value="{{$vo['color']}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">描述</label>
                    <div class="mws-form-item">
                      <input type="text" class="small" name="con" value="{{$vo['con']}}">
                    </div>
                </div>

                <div class="mws-form-row">
                  <label class="mws-form-label">商品主图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic7']}}" alt="" width="80px">
                      </div>
                 </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改主图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic7' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>   

                <div class="mws-form-row">
                  <label class="mws-form-label">商品图一</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic1']}}" alt="" width="80px">
                      </div>
                 </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图一</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic1' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>  
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图二</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic2']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图二</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic2' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>              

                <div class="mws-form-row">
                  <label class="mws-form-label">商品图三</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic3']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图三</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic3' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>     
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图四</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic4']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图四</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic4' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div> 
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图五</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic5']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图五</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic5' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div> 
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图六</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['pic6']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图六</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic6' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>                    
         		
                <div class="mws-button-row">
                    <input type="submit" class="btn btn-danger" value="修改">
                    <input type="reset" class="btn " value="重置">
                </div>  
            </div>      
    	</form>
    </div>    	
</div>
@endsection	