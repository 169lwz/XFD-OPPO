
@extends('layout.home')

@section('con')
     <main class="main-content user">
    <div class="wrapper">
      <ul class="breadcrumb">
  <li>
    <a href="/home/index">
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  <a href="/dingdan/index">
            我的订单
            <span>/</span>
          </a>
              </li>
          <li>
                  {{$list1['order_num']}}
              </li>
      </ul>
      <div class="myOppo-menu">
  <h1 class="h-gamma">订单详情</h1>
  <ul class="navigation">
    <li class="is-active">
      <a href="/dingdan/index">我的订单</a>
    </li>
    <li class="">
      <a href="http://www.opposhop.cn/user/addresses">配送地址</a>
    </li>
    <li class="">
      <a href="http://www.opposhop.cn/coupons/show">优惠券</a>
    </li>
    <li>
      <a href="/home/myhome">账户信息</a>
    </li>
              </ul>
</div>
      <div class="g slab-white-border order">
        <div class="g brick-shadow order-list-top clearfix">
  <div class="gi one-whole desk-three-quarters pull-left">
    <div class="one-whole lap-width-auto">
      <span>订单编号：<strong>{{$list1['order_num']}}</strong></span>
    </div>
    <div class="one-whole lap-width-auto">
      <span id="ddzt">订单状态：@if($list1['status']==1)新订单@elseif($list1['status']==2)已发货@elseif($list1['status']==3)已收货@elseif($list1['status']==4)未支付@elseif($list1['status']==5)已取消@endif</span>
    </div>
    <div class="gi one-whole lap-width-auto">
      <div id="zhifu" class="gi pull-left" style="display:none">
        <a class="button button-s" href="http://www.opposhop.cn/orders/170212025045677/payments">立即支付</a>
      </div>
      <div id="quxiao" class="gi pull-left" style="display:none">
        <a class="box-link" href='javascript:%20vm.cancel("170212025045677");'>取消订单</a>
      </div>
    </div>
  </div>
  <div class="gi one-whole desk-one-quarter pull-left desk-text-align-right">
    <span>下单时间：<?php echo date('Y-m-d H:i:s',$list1['addtime']); ?></span>
  </div>
</div>

<div class="order-list">
  <div class="order-summary">
    <div class="order-show-item one-whole lap-one-half desk-one-half">
      <div class="title">收货信息:</div>
      <div class="row">收&nbsp;&nbsp;件&nbsp;&nbsp;人：{{$list1['name']}}</div>
              <div class="row">收货地址：{{$list1['sheng1'].$list1['shi1'].$list1['xian1'].$list1['jiedao1'].$list1['xiangxi']}}</div>
            <div class="row">联系电话：{{$list1['phone']}}</div>
              <div class="row">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：{{$list1['email']}}</div>
          </div>
    <div class="order-show-item one-whole lap-one-half desk-one-half">
      <div class="title">支付及配送信息：</div>
      <div class="row">支付方式：在线支付</div>
            <div class="row">配送方式：圆通速递</div>
            <div class="row">支付状态：@if($list1['status']==1)新订单@elseif($list1['status']==2)已发货@elseif($list1['status']==3)已收货@elseif($list1['status']==4)未支付@elseif($list1['status']==5)已取消@endif</div>
              <div class="row">发票抬头：周杰伦&nbsp;&nbsp;
                  </div>
                  </div>
  </div>
</div>

<div class="g clearfix">



  <div class="order-product-list brick-shadow one-whole desk-two-thirds pull-left">
    <div class="order-good-title">商品清单：</div>

@foreach($list as $v)
    <div class="goods-list">
      <div class="goods-list-show">
        <a class="goods-list-image" href="http://www.opposhop.cn/products/323" target="_blank">
          <img src="{{$v['pic']}}">
        </a>
      </div>
      <div class="goods-list-detail">
        <div class="goods-list-info goods-list-main">
          <div class="goods-list-description">
            <h4 class="heading">
              <a href="http://www.opposhop.cn/products/323" target="_blank">{{$v['gname']}}</a>
            </h4>
            <p>{{$v['desc']}}</p>
          </div>
          <div class="goods-list-quantity"><strong>×{{$v['num']}}</strong></div>
          <div class="goods-list-price"><strong>￥{{$v['price']}}.00</strong></div>
        </div>
      </div>
    </div>

@endforeach


</div>









  <div class="total-price slab-extra-light gi one-whole desk-one-third">
    <div class="title hidden">您的订单</div>
    <ul>
      <li>
        <span class="product">商品数量：</span>
        <span class="amount">{{$list2}}</span>
      </li>
      <li>
        <span class="product">总价：</span>
        <span class="amount">￥<span class="amount1"></span>.00</span>
      </li>
    </ul>
    <ul>
      <li>
        <span class="product">邮费：</span>
        <span class="amount">+ ￥<span id="l">10</span>.00</span>
      </li>
      <li>
        <span class="product">优惠：</span>
        <span class="amount">- ￥<span id="l1">20.00</span></span>
      </li>
                </ul>
    <div class="total">
      <span class="label">应付总额：</span>
      <span class="price">￥<span>{{$list1['total']}}</span>.00</span>
    </div>
   <!--            <div class="total one-whole desk-text-align-right">
        <a class="button button-s" href="http://www.opposhop.cn/orders/170212025045677/payments">立即支付</a>
      </div -->
                                
  </div>
</div>

<div class="form-actions brick-shadow lap-invisible">
  <div class="form-actions-left">
    <a class="button-light" href="/dingdan/index">返回订单列表</a>
  </div>
</div>
      </div>
    </div>
  </main>
  <div id="return-confirm" class="hidden">
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class="dialog-title-common">您确定要提交退换货申请吗？</h4>
            </div>
                                    <div class="dialog-common-content">
                        </div>
                        <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                                <div class="gi lap-one-half">
                  <a class="button button-one">确定</a>
                </div>
                                                <div class="gi lap-one-half">
                  <a class="button-light button-two">取消</a>
                </div>
                              </div>
            </div>
                                  </div>
        </div>
      </div>
    </div>
    <div id="return-error" class="hidden">
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                                    <div class="dialog-common-content">
                        </div>
                                    <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                <div class="gi lap-one-whole">
                  <a class="button button-one-whole">好的</a>
                </div>
              </div>
            </div>
                      </div>
        </div>
      </div>
    </div>
    <div id="return-already" class="hidden">
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class="dialog-title-common">退换货申请提交成功！</h4>
            </div>
                                    <div class="dialog-common-content">
                          <p>请及时带上需退换的商品，选择就近的售后服务中心进行退换货业务办理。</p><p>为了方便您及时办理退换货业务，建议立即<a href="http://service.oppo.cn/reserve/" target="_blank">预约售后服务中心&gt;&gt;</a></p><p>如有疑问，请查看<a href="http://www.oppo.com/cn/service/help/550?name=%E6%9C%8D%E5%8A%A1%E6%94%BF%E7%AD%96" target="_blank">退换货流程说明</a>或联系我们的<a id="btn-kf" href="http://oim.oppo.com/oim/chatClient/chatbox.jsp?companyID=8092&amp;configID=890&amp;enterurl=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2Fpreview%2Ejsp&amp;pagereferrer=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2FembedScript%2Ejsp%3Ft%3D1517&amp;k=1" target="_blank">在线客服</a>，我们将竭诚为您服务，感谢您对OPPO的支持！</p>
                        </div>
                                    <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                <div class="gi lap-one-whole">
                  <a class="button button-one-whole">好的</a>
                </div>
              </div>
            </div>
                      </div>
        </div>
      </div>
    </div>
    <div id="return-twice" class="hidden">
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class="dialog-title-common">您已提交过退换货申请!</h4>
            </div>
                                    <div class="dialog-common-content">
                          <p>请及时带上需退换的商品，选择就近的售后服务中心进行退换货业务办理。</p><p>为了方便您及时办理退换货业务，建议立即<a href="http://service.oppo.cn/reserve/" target="_blank">预约售后服务中心&gt;&gt;</a></p><p>如有疑问，请查看<a href="http://www.oppo.com/cn/service/help/550?name=%E6%9C%8D%E5%8A%A1%E6%94%BF%E7%AD%96" target="_blank">退换货流程说明</a>或联系我们的<a id="btn-kf" href="http://oim.oppo.com/oim/chatClient/chatbox.jsp?companyID=8092&amp;configID=890&amp;enterurl=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2Fpreview%2Ejsp&amp;pagereferrer=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2FembedScript%2Ejsp%3Ft%3D1517&amp;k=1" target="_blank">在线客服</a>，我们将竭诚为您服务，感谢您对OPPO的支持！</p>
                        </div>
                                    <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                <div class="gi lap-one-whole">
                  <a class="button button-one-whole">好的</a>
                </div>
              </div>
            </div>
                      </div>
        </div>
      </div>
    </div>
    <div id="dialog-confirm" class="hidden">
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class="dialog-title-common">您确定取消订单吗？</h4>
            </div>
                                    <div class="dialog-common-content">
                        </div>
                        <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                                <div class="gi lap-one-half">
                  <a class="button button-one">确定</a>
                </div>
                                                <div class="gi lap-one-half">
                  <a class="button-light button-two">取消</a>
                </div>
                              </div>
            </div>
                                  </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
<script type="text/javascript">

  if($('#ddzt').html()=='订单状态：未支付'){
    $('#zhifu').attr('style','display:block');
    $('#quxiao').attr('style','display:block');
  }
  
  var a =parseInt($('.price').find('span').html());
  var b =parseInt($('#l').html());
  var c =parseInt($('#l1').html());
  $('.amount1').html(a-b+c);

</script>
@endsection