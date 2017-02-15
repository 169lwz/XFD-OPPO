@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
     <div class="mws-panel-header"><span>赠品修改</span></div>
    <div class="mws-panel-body no-padding">
     <form action="/admin/val/updategift" class="mws-form" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$vo['id']}}">
          <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">所属商品</label>
                    <div class="mws-form-item">
                        <select class="small" name="tid" disabled>
                            <option value="0">商品</option>
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
                    <label class="mws-form-label">赠品名称</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="gift" value="{{$vo['gift']}}">
                    </div>
                </div>    
                <div class="mws-form-row">
                    <label class="mws-form-label">赠品颜色</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="giftcolor" value="{{$vo['giftcolor']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">赠品价格</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="gprice" value="{{$vo['gprice']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">赠品描述</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="gdesc" value="{{$vo['gdesc']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">主图</label>
                    <div class="mws-form-item">
                         <img src="{{$vo['picture1']}}" alt="" width="100px">
                    </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">更换主图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='picture1' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                  </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">辅图</label>
                    <div class="mws-form-item">
                         <img src="{{$vo['picture2']}}" alt="" width="100px">
                    </div>
                </div>
                <div class="mws-form-row">
                  <label class="mws-form-label">更换辅图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='picture2' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
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