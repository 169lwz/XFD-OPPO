@extends('layout.home')
@section('con')
      <main class='main-content user'>
    <div class='wrapper'>
      <ul class='breadcrumb'>
  <li>
    <a href='http://www.oppo.com/cn/'>
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  我的订单
              </li>
      </ul>
  <div class='myOppo-menu'>
    <h1 class='h-gamma'>我的订单</h1>
    <ul class='navigation'>
    <li class='is-active'>
    <a href='/dingdan/index'>我的订单</a>
    </li>
    <li class=''>
    <a href='/address/myaddress'>配送地址</a>
    </li>
    <li class=''>
    <a href='http://www.opposhop.cn/coupons/show'>优惠券</a>
    </li>
    <li>
    <a href='https://id.oppo.com/account/profile?callback=http%3A%2F%2Fwww.opposhop.cn'>账户信息</a>
    </li>
    </ul>
  </div>




  <div class="g">







@foreach($list as $v)
    <div class="gi one-whole my-oppo-content slab-white-border order">
      <div class="g brick-shadow order-list-top">
        <div class="gi one-whole desk-one-half">
          订单编号：<strong><a href="javascript:;" class="clickable order-id">{{$v['order_num']}}</a></strong>
        </div>
        <div class="gi one-whole desk-one-half desk-text-align-right">
          下单时间：<?php echo date('Y-m-d H:i:s',$v['addtime']); ?>
        </div>
      </div>
      <ul class="order-list-header">
        <li class="order-product">商品</li>
        <li class="order-quantity">数量</li>
        <li class="order-amount">订单金额</li>
        <li class="order-detail">收货信息</li>
        <li class="order-primary">状态操作</li>
      </ul>
      <div class="order-list">
        <div class="order-item order-product desk-text-align-center">
          <a target="_blank" href="http://www.opposhop.cn/products/380">
            <img src="{{$v['pic']}}" alt="" class="order-product-thumbnail">
          </a>
          <div class="row">
            <a target="_blank" href="http://www.opposhop.cn/products/380">{{$v['gname']}}</a>
          </div>
          <p class="row" style="display:none">
            <a href="">+其余<span>1</span>款商品</a>
          </p>
        </div>
        <div class="order-item order-quantity desk-text-align-center">
          <span class="order-desk-hide">商品数量：</span>{{$v['num']}}
        </div>
        <div class="order-item order-amount desk-text-align-center">
          <span class="order-desk-hide">订单金额：</span>¥{{$v['total']}}.00
        </div>
        <div class="order-item order-detail">
          <div class="row order-username">{{$v['name']}}</div>
          <div class="row">{{$v['phone']}}</div>
          <div class="row">{{$v['email']}}</div>
          <div class="row">{{$v['sheng1'].$v['shi1'].$v['xian1'].$v['jiedao1'].$v['xiangxi']}}</div>
        </div>
        <div class="order-item order-primary desk-text-align-center" info="look">
          <div class="row">订单状态：<span>@if($v['status']==1)新订单@elseif($v['status']==2)已发货@elseif($v['status']==3)已收货@elseif($v['status']==4)未支付@elseif($v['status']==5)已取消@endif</span> 
          </div>
          <div class="row" style="display:none"><a  class="button button-s but">立即支付</a></div>
          <div class="row"><a href="" class="button button-s">查看详情</a></div>
          @if($v['status']==2) <div id="" class="row"><a  href="" class="button button-s qqq">确认收货</a></div> @endif
          <div class="row" style="display:none"><a  class="box-link">取消订单</a></div>
        </div>
      </div>

      <div class="gi lap-three-fifths desk-three-quarters pagination-content">
      </div>
    </div>

@endforeach    
{{csrf_field()}}

<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
<script type="text/javascript">
  var token=$("input[name='_token']").val();
  var s= $('div[info="look"]').find('div:eq(0)').find('span'); //订单状态的div
  var s1=s.parent().next('div').next('div').next('div').find('a'); //取消订单按钮
  var s2=s.parent().next('div').next('div').find('a');             //查看订单按钮
  myajax();
  myajax1();

  $('')

  function myajax(){
    $.ajax({
      url:'/dingdan/show',
      type:'post',
      data:{'_token':token},
      dataType:'json',
      success:function(mes){
        $(mes).each(function(){
          if($(this).attr('count')>1){
            // var b=$(this).attr('order_num');
            var a =$('a:contains("'+$(this).attr('order_num')+'")').parents('.order-list-top').siblings('.order-list').find('div').find('p');
            a.attr('style','display:block');
            a.find('a').find('span').html(parseInt($(this).attr('count'))-1);
          }
        })
      }
    });
  }

  function myajax1(){
    s.each(function(){
      if($(this).html()=='未支付'){
        $(this).parent().next('div').attr('style','display:block');
        $(this).parent().next('div').next('div').next('div').attr('style','display:block');
      }
    });
  }

  
 s1.click(function(){
    var ddh=$(this).parents('.order-list').prev('ul').prev('div').find('div').find('strong').find('a').html();//订单号

      $(this).parent().prev('div').prev('div').prev('div').find('span').html('已取消');
      $(this).parent().attr('style','display:none');
      $(this).parent().prev('div').prev('div').attr('style','display:none');

    $.ajax({
      url:'/dingdan/edit',
      type:'post',
      data:{'_token':token,'order_num':ddh},
      success:function(mes){
        if(mes=='yes'){ 
        }
      }
    });
 })
 
  s2.click(function(){
    var ddh1=$(this).parents('.order-list').prev('ul').prev('div').find('div').find('strong').find('a').html();//订单号    
    $(this).attr('href','/dingdan/xx/'+ddh1);
    
  })

  
  $('.but').click(function(){
    var a1=$(this).parents('.order-list').parent().find('div').find('div').find('strong').find('a').html();//相对应的订单号
    $.ajax({
      url:'/dingdan/edit1', //修改订单状态
      type:'post',
      data:{'_token':token,'order_num':a1},
      dataType:'text',
      success:function(mes){
        if(mes=='yes'){
          alert('支付成功');
          location.href='/dingdan/index';         
        }
      }
    });    
  });
</script>




</div>

  </main>
  <div id='dialog-confirm' class='hidden'>
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class='dialog-title-common'>您确定取消订单吗？</h4>
            </div>
                                    <div class="dialog-common-content">
                        </div>
                        <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                                <div class="gi lap-one-half">
                  <a class='button button-one'>确定</a>
                </div>
                                                <div class="gi lap-one-half">
                  <a class='button-light button-two'>取消</a>
                </div>
                              </div>
            </div>
                                  </div>
        </div>
      </div>
    </div>
@endsection
