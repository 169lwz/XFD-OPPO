@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
     <div class="mws-panel-header"><span>商品修改</span></div>
    <div class="mws-panel-body no-padding">
     <form action="/admin/goods/update" class="mws-form" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$vo['id']}}">
          <input type="hidden" name="tid" value="{{$vo['tid']}}">
          <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">商品类别</label>
                    <div class="mws-form-item">
                        <select class="small" name="tid" disabled>
                            <option value="0">顶级分类</option>
                            @foreach($list as $k=>$v)
                                <option value="{{$v['id']}}" 
                                  @if($v['id']==$vo['tid'])
                                    selected
                                  @endif
                                >{{$v['tname']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>      
         
              <div class="mws-form-row">
                    <label class="mws-form-label">商品名称</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="gname" value="{{$vo['gname']}}">
                    </div>
              </div>
              <div class="mws-form-row">
                    <label class="mws-form-label">商品主图</label>
                    <div class="mws-form-item">
                         <img src="{{$vo['pic']}}" alt="" width="100px">
                    </div>
              </div>
              <div class="mws-form-row">
                  <label class="mws-form-label">更换主图</label>
                  <div class="mws-form-item">
                      <div style="position: relative;" class="fileinput-holder">
                            <input type="file" name='pic' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
                      </div>
                 </div>
              </div>
              <div class="mws-form-row">
                    <label class="mws-form-label">商品单价</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="price" value="{{$vo['price']}}">
                    </div>
              </div>
              <div class="mws-form-row">
                  <label class="mws-form-label">商品描述</label>
                  <div class="mws-form-item">
                      <input type="text" class="small" name="desc" value="{{$vo['desc']}}">
                  </div>
              </div>
              <div class="mws-form-row">
                  <label class="mws-form-label">商品库存</label>
                  <div class="mws-form-item">
                       <input type="text" class="small" name="store" value="{{$vo['store']}}">
                  </div>
              </div>
              <div class="mws-form-row">
                  <label class="mws-form-label">商品状态</label>
                  <div class="mws-form-item clearfix">
                      <ul class="mws-form-list inline">
                          <li><input type="radio" name="status" value="1" @if($vo['status']=="1") checked @endif> <label>新上架</label></li>
                          <li><input type="radio" name="status" value="2" @if($vo['status']=="2") checked @endif> <label>在售</label></li>
                          <li><input type="radio" name="status" value="3" @if($vo['status']=="3") checked @endif> <label>下架</label></li>                    
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