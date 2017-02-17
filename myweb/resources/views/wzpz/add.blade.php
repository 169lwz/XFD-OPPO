@extends('layout.adminindex')

@section('con')

  <style type="text/css">
/**/

  </style>


<div class="mws-panel grid_8">
  <div class="mws-panel-header">
      <span>添加配置</span>
    </div>

    <div class="mws-panel-body no-padding">
      <form class="mws-form" action="/wzpz/add1" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="mws-form-inline">

          <div class="mws-form-row">
            <label class="mws-form-label">title ico </label>
            <div class="mws-form-item">
               <input type="file" name='ico' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">网站 Logo </label>
            <div class="mws-form-item">
               <input type="file" name='pic' multiple style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">网站名称 </label>
            <div class="mws-form-item">
              <input type="text" name="name" value="">
            </div>
          </div>                       

          <div class="mws-form-row">
            <label class="mws-form-label">联系方式 </label>
            <div class="mws-form-item">
              <input type="text" name="phone" value="">
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">版权信息 </label>
            <div class="mws-form-item">
              <input type="text" name="con" value="">
            </div>
          </div>                      

          <div class="mws-form-row">
            <label class="mws-form-label">关键字 </label>
            <div class="mws-form-item">
              <input type="text" name="keyword" value="">
            </div>
          </div>

          <div class="mws-form-row">
            <label class="mws-form-label">网站介绍 </label>
            <div class="mws-form-item">
              <textarea name="desc" class="large autosize" cols="" rows="" style="overflow: hidden; word-wrap: break-word; resize: none; height: 130px;"></textarea>
            </div>
          </div>                       

        </div>
        <div class="mws-button-row">
          <input type="submit" value="提交">
          <input type="reset" class="btn " value="重置">
        </div>
      </form>
    </div>      
</div>






  <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
  <script type="text/javascript">


  </script>

@endsection