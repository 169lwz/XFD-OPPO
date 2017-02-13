@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
     <div class="mws-panel-header"><span>商品尺寸修改</span></div>
    <div class="mws-panel-body no-padding">
     <form action="/admin/val/updatesize" class="mws-form" method="post">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$vo['id']}}">
          <div class="mws-form-inline">
              <div class="mws-form-row">
                  <label class="mws-form-label">商品名称</label>
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
                    <label class="mws-form-label">商品尺寸</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name="size" value="{{$vo['size']}}">
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