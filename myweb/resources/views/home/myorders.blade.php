@extends('layout.home')
@section('con')

<main class="main-content user">
    <div class="wrapper">
      <ul class="breadcrumb">
  <li>
    <a href="http://www.oppo.com/cn/">
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  我的订单
              </li>
      </ul>
      <div class="myOppo-menu">
  <h1 class="h-gamma">我的订单</h1>
  <ul class="navigation">
    <li class="is-active">
      <a href="/myhome_files/myhome.html">我的订单</a>
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
      <div class="g">
                <div class="gi one-whole my-oppo-content slab-white-border order">
          <div class="gi brick-shadow order-list-top">
  暂无订单
</div>
        </div>
        <div class="gi lap-three-fifths desk-three-quarters pagination-content">
          
        </div>
      </div>
    </div>
  </main>
  <div id="dialog-confirm" class="hidden">
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class="dialog-title-common">您确定取消订单吗？</h4>
            </div>
               <div class="dialog-common-content"></div>
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


@endsection