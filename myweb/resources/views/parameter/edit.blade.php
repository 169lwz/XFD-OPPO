@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header"><span>商品参数修改</span></div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/parameter/update" class="mws-form" method="post" enctype="multipart/form-data">
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
                  <label class="mws-form-label">商品图一</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['ppic1']}}" alt="" width="80px">
                      </div>
                 </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图一</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='ppic1' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>  
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图二</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['ppic2']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图二</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='ppic2' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>              

                <div class="mws-form-row">
                  <label class="mws-form-label">商品图三</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['ppic3']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图三</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='ppic3' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div>     
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图四</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['ppic4']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图四</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='ppic4' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div> 
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图五</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['ppic5']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图五</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='ppic5' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
                </div> 
                
                <div class="mws-form-row">
                  <label class="mws-form-label">商品图六</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$vo['ppic6']}}" alt="" width="80px">
                      </div>
                  </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">修改图六</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='ppic6' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
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