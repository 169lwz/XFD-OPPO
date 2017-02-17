@extends('layout.home')
@section('con')
    <!--主体开始--> 

  <style type="text/css">
    #p1{
      position: absolute;
      margin-left: 10px;
      margin-top: 10px;
      width:480px;
      height:480px;
    }
    .product-gallery-items{
           position: absolute;
      margin-left: 177px;
      margin-top: 464px;
    }
  </style>

  <main class='main-content'>
    <div class='wrapper'>
      <ul class='breadcrumb'>
          <li>
            <a href='http://www.oppo.com/cn/'>首页<span>/</span></a>
          </li>
          <li>
            <a href='http://www.opposhop.cn/products?is_promotion=0&category=1'>商品列表<span>/</span>
            </a>
          </li>
          <li id="con">{{$data['con']}}</li>
      </ul>
    </div>
    <!--购买信息开始-->
    <div class='buying-details'>
        <article class='wrapper'>
          <div class='buying-header-mov'></div>
          <div class='g'>
            <!--图片开始-->
            <img alt='' title='' src='{{$data["pic7"]}}' id="p1" sytle="display:block">
            <div class='gi lap-two-fifths desk-one-half'>
                <div class='product-gallery js-tabs' sytle="display:block">
                    <div class='product-gallery-view js-tab-content swipe' id="product-swipe" sytle="display:block">
                        <div class="swipe-wrap" sytle="display:block">
                            <div class='swipe-slide  is-active 'sytle="display:block">
                                
                            </div>
                        </div>
                    </div>
                    <div class='product-gallery-items'>
                        <div class="ps-carousel" id="product-carousel">
                            <div class="ps-item  ps-item-active ">
                                <a href='#'>
                                    <img alt='' src='{{$data["pic7"]}}' width="50px"  id="p2">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--图片结束-->
              <div class='gi lap-three-fifths desk-one-half'>
                <div class='buying-header-desk'>
                    <h1 class='product-title' data-desktop='.buying-header-desk' data-mobile='.buying-header-mov' id="con1">{{$data['con']}}</h1>
                    <p class="product-name-extra" data-desktop=".buying-header-desk" data-mobile=".buying-header-mov">{{$data['desc']}}</p>
                </div>
                <div class='buying-price'>
                    <p><strong class='price'>￥{{$data['price']}}</strong></p>
                </div>
                <input type="hidden" name="yyy" value="{{$data['color']}}"> 
                <input type="hidden" name="spid" value="{{$data['id']}}"> 
                <!--表单开始-->
                <div class='add-cart-form'>
                  <form id="add-cart-form" onsubmit="return false;">
                  {{csrf_field()}}
                      <section class="g module product-selector" data-common-name="attribute-0" data-selector-type="box">
                          <div class='gi one-quarter desk-one-fifth'>
                              <div class='radio-label'>颜色</div>
                          </div>
                          <div class="gi three-quarters desk-four-fifths">
                              <div class="g g-wrapper-s">
                              @foreach($color as $vc)
                                  <div class="gi one-half desk-one-third ">
                                      <a href="javascript:;" INFO="{{$vc['gid']}}/{{$vc['color']}}" class="swatch " show="color">
                                          <span info="yanse">{{$vc['color']}}</span>
                                      </a>
                                  </div>
                              @endforeach
                              </div>
                          </div>
                      </section>
                      <section class="g module product-selector" data-common-name="attribute-1" data-selector-type="box">
                          <div class='gi one-quarter desk-one-fifth'>
                              <div class='radio-label'>网络</div>
                          </div>
                          <div class="gi three-quarters desk-four-fifths">
                              <div class="g g-wrapper-s">
                              @foreach($version as $vv)
                                  <div class="gi one-half desk-one-third">
                                      <a href="javascript:;"  class="swatch selected">
                                          <span>{{$vv['version']}}</span>
                                      </a>
                                  </div>
                              @endforeach
                              </div>
                          </div>
                      </section>
                      <section class="g module product-selector" data-common-name="attribute-2" data-selector-type="box">
                          <div class='gi one-quarter desk-one-fifth'>
                              <div class='radio-label'>容量</div>
                          </div>
                          <div class="gi three-quarters desk-four-fifths">
                              <div class="g g-wrapper-s">
                              @foreach($memory as $vm)
                                  <div class="gi one-half desk-one-third ">
                                      <a href="javascript:;" class="swatch selected" >
                                          <span>{{$vm['memory']}}</span>
                                      </a>
                                  </div>
                              @endforeach
                              </div>
                          </div>
                      </section>
                      <div class="g product-gifts" id="good-gifts">
                          <div class="one-quarter desk-one-fifth">
                              <div class="y-label">赠品</div>
                          </div>
                          <div class="gi three-quarters desk-four-fifths">
                                @foreach($gift as $vg)
                                <div class="g gift-item clearfix">
                                    <input type="hidden" name="gift" value="387">
                                    <div class="y-img" ><img src="{{$vg['picture1']}}" alt="{{$vg['gift']}}"></div>
                                    <div class="y-name"><a href="http://www.opposhop.cn/products/387.html" title="{{$vg['gift']}}" target="_blank">{{$vg['gift']}}</a></div>
                                    <div class="y-attributes">
                                        <ul class="swatches">
                                            <li class="swatch  selected " data-gift-id="387" data-thumbnail="images/thumbnail_2016101002101957fb357b42e4d_60x60.jpg"><a href="javascript:;">{{$vg['giftcolor']}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                          </div>
                      </div>
                  
                                  
                      <input type="hidden" name="service-repair" value=" 0 "/>
                      <input type="hidden" name="service-screen" value="0"/>
                      <input type="hidden" name="service-accident" value="0"/>
                      <div class="g pro-service" id="product-services"></div>
                          
                      <div class="g product-gifts">
                          <div class="one-quarter desk-one-fifth">
                            <div class="y-label">分期</div>
                          </div>
                          <div class="gi three-quarters desk-four-fifths">
                              <p class='alipay-hb-product alipay-hb-product-free'><i class='icon-hb icon-hb-free'></i>订单满600可享3、6、12期分期免息</p>
                              <a href="http://www.oppo.com/cn/service/help/330?name=%E8%B4%AD%E4%B9%B0%E5%B8%AE%E5%8A%A9" target="_blank" class='huabei-more'>了解详情&gt;&gt;</a>
                          </div>
                      </div>
                      
                      <div class="g slab-white-border buying-actions">
                            <div class='gi lap-one-third'>
                                <div class='wrapper'>
                                    <div class='counter-box' id="product-amount">
                                      <a id="jian" class='btn minus disabled' data-bind="minus" value="-">-</a>
                                      <input class='number' type='text' id="amount-textbox" value='1' disabled><span ><font size="2px" color="red" id="cc"></font></span>
                                      <a id="jia" class='btn plus' data-bind="plus" value="+">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="gi lap-two-thirds">
                                <div class="g normal-button-container">
                                    <div class="gi one-half">
                                        <button class="button-light" id="button-buy">加入购物车</button>
                                    </div>
                                    <div class="gi one-half">
                                        <a id="tttt" class="button button-primary" href="/dingdan/ljgm/{{$data['id']}}">立即购买</a>
                                    </div>
                                </div>
                            </div>
                      </div>
                  </form>
                </div>
               
                <!--表单结束-->
                
                <!--服务信息开始-->
                <div class='g delivery-specs pro-delivery-specs'>
                    <div class='gi one-half desk-one-quarter'>            
                        <div class='badge'>
                            <div class='badge-item'><span class='icon icon-postage'></span></div>
                            <div class='badge-info'><span>全场包邮</span></div>
                        </div>
                    </div>
                    <div class='gi one-half desk-one-quarter'>
                        <a href="http://www.oppo.com/cn/service/help?name=%E6%9C%8D%E5%8A%A1%E6%94%BF%E7%AD%96" target="_blank">
                            <div class='badge'>
                              <div class='badge-item'><span class='icon icon-return'></span></div>
                              <div class='badge-info'><span>7天包退30天包换</span></div>
                            </div>
                        </a>
                    </div>
                    <div class='gi one-half desk-one-quarter'>
                        <a href="http://hd.oppo.com/act/2016/e-invoice/index.html" target="_blank">
                            <div class='badge'>
                              <div class='badge-item'><span class='icon icon-credit'></span></div>
                              <div class='badge-info'><span>电子发票</span></div>
                            </div>
                        </a>
                    </div>
                    <div class='gi one-half desk-one-quarter'>
                        <div class='badge'>
                            <div class='badge-item'><span class='icon icon-points'></span></div>
                            <div class='badge-info'><span>购物返积分</span></div>
                        </div>
                    </div>
                </div>
            <!--服务信息结束-->
              </div>             
          </div>
        </article>
    </div>
    <!--购买信息结束-->
    <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
    <script type="text/javascript">
        // 颜色选中
        var token=$('input[name="_token"]').val();
        $('a[show="color"]').click(function(){  
             $('a[show="color"]').find('span').attr('info1','ly00');
            $(this).find('span').attr('info1','ly');                  
            $('a[show="color"]').attr('class','swatch');
            $(this).attr('class','swatch selected');
             var arr = $(this).attr('INFO').split('/');
             // console.log(arr);
                      
            $.ajax({
              url:'/home/detail/indexqj',
              data:{'id':arr[0],'color':arr[1],'_token':$('input[name="_token"]').val()},
              type:'post',
              dataType:'json',
              success:function(mes){

                $('#p1').attr('src',$(mes).attr('pic7'));
                $('#p2').attr('src',$(mes).attr('pic7'));
                $('#con').html($(mes).attr('con'));
                $('#con1').html($(mes).attr('con'));
                for(var i=1;i<7;i++){
                  $('#pic'+i).attr('src',$(mes).attr('pic'+i));
                } 
              }         
            });
                           
        });
        var xxx=$('a[show="color"]').find('span');
        xxx.each(function(){
          if($(this).html()==$('input[name="yyy"]').val()){
            $(this).parent().attr('class','swatch selected');
            $(this).attr('info1','ly');
          }
        });
     
      

        $('#button-buy').click(function(){
          var pic=$('#p1').attr('src');//图片样式
          // console.log(pic);
          // return false;
          var ys=$('span[info1="ly"]').html(); //选中的颜色
          var spid=$('input[name="spid"]').val();//商品id
          var num=$('#amount-textbox').val(); //购买数量
          console.log(ys)
          $.ajax({
            url:'/shop/add',
            type:'post',
            data:{'ys':ys,'id':spid,'_token':token,'num':num,'pic':pic},
            dataType:'text',
            success:function(mes){
              if(mes=='yes'){
                location.href='/shop/index';
              }else{
                location.href='/home/login/login';
              }
            }
          });
        });

        $('#jia').click(function(){
          var num1=parseInt($('.number').val());
          // console.log(num1);
          var spid=$('input[name="spid"]').val();//商品id
          $.ajax({
            url:'/shop/numss',
            type:'get',
            data:{'id':spid},
            dataType:'text',
            // async:false,/
            success:function(mes){
              var num3=parseInt(mes);
              if((num1)<(num3)){
                // alert(1)
                $('#cc').html('');
                $('.number').val(parseInt(num1)+1);
              }else{
                $('#cc').html('已超出购买数量');
              }
            }
          });
        });

        $('#jian').click(function(){
          $('#cc').html('');
          var num1=parseInt($('.number').val());
          if(num1==1){
            return false;
          }else{
            $('.number').val(num1-1);
          }
        });

        $('#tttt').click(function(){
          var num12=$('.number').val();
          var ys1=$('span[info1="ly"]').html();
          var nnn=$(this).attr('href');
          $(this).attr('href',nnn+'/'+ys1+'/'+num12);
          // console.log($(this).attr('href'));
          // return false;

        });

      </script>


    <div class="product-view">
      <div class="product-view-tabs">
              <div class="wrapper">
                <ul class="clearfix tabs" id="product-tabs">
                    <li class="oppo-tj  y-tab-active " data-hash="features" data-tj="store|tab|product_detail|product_features"><a href="javascript:;" >商品详情</a></li>
                    <li class="oppo-tj " data-hash="params" data-tj="store|tab|product_detail|product_params"><a href="javascript:;" >规格参数</a></li>
                    <li class="oppo-tj " data-hash="comments" data-tj="store|tab|product_detail|product_comments"><a href="javascript:;"  onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'comment-tab']);">用户评价 <span id="comment-total">(0)</span> </a></li>
                </ul>
                <div class="sticky-buy">
                  <a href="javascript:;" class="go-buy oppo-tj" id="sticky-go-buy" data-tj="store|a|product_buy|sticky_buy">购买</a>
                </div>
              </div>
          </div>
          <div class="product-view-detail" id="product-detail">
          <!--商品详情图片开始-->
          <div class="product-detail-tab y-tab-frame  tab-item-active " id="product-detail-features">
            <section>
            @foreach($detail as $vd)
                @for($i=1;$i<7;$i++)
                <p style="text-align:center;">
                  <picture>                           
                      <img src='{{$vd["pic".$i]}}' alt='' id="pic<?php echo $i;?>">
                  </picture>
                </p>
                @endfor
            @endforeach             
            </section>
          </div>
          <!--商品详情图片结束-->

          <!--商品规格参数开始-->
          <div class="product-detail-tab y-tab-frame " id="product-detail-params">
            <section>
            @foreach($parameter as $vp)
              @for($p=1;$p<7;$p++)
                <p style="text-align:center;">
                  <picture>                                   
                      <img src='{{$vp["ppic".$p]}}' alt=''>
                  </picture>
                </p>
              @endfor
            @endforeach          
            </section>
          </div>
          <!--商品规格参数结束-->

          <div class="product-detail-tab y-tab-frame " id="product-detail-comments">
            <section>
              <div class="wrapper comments-wrapper">
                  <div class="y-comments-header clearfix">
                      <div class="reviews-switchable" id="comments-switchable">
                          <ul>
                              <li class="switchable checked">
                                  <a href="javascript:;" data-type="all" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'all-comments-button']);">
                                      <span class="cb-radio">
                                          <span class="cb-inner">
                                              <i></i>
                                          </span>
                                      </span>
                                      <label>全部评价</label>
                                  </a>
                              </li>
                                                  <li class="switchable">
                                  <a href="javascript:;" data-type="hasimages" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', '晒图按钮']);">
                                      <span class="cb-radio">
                                          <span class="cb-inner">
                                              <i></i>
                                          </span>
                                      </span>
                                      <label>晒图<span class="reviews-count" data-type="hasimages">（0）</span></label>
                                  </a>
                              </li>
                              <li class="switchable">
                                  <a href="javascript:;" data-type="hasappend" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'append-comment-button']);">
                                      <span class="cb-radio">
                                          <span class="cb-inner">
                                              <i></i>
                                          </span>
                                      </span>
                                      <label>追评<span class="reviews-count" data-type="hasappend">（0）</span></label>
                                  </a>
                              </li>
                          </ul>
                      </div>
                      <div class="comments-button">
                          <a class="button button-s" href="javascript:;" data-type="1" id="go-comment" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'comment-button']);">我要评论</a>
                                      </div>
                  </div>
              </div>
              <div class="wrapper">
                  <div id="comments" class="y-comments-view"></div>
                  <div class="y-comment-pagination clearfix" id="comments-pagination"></div>
                  <div id="respond" class="y-comment-respond" style="display: none;">
                      <div class="y-comment-form">
                          <input type="hidden" id="comment-product-id" value="393">
                          <input type="hidden" id="comment-type" value="1">
                          <input type="hidden" id="comment-score" value="0">
                          <input type="hidden" id="comment-id" value="0">
                          <input type="hidden" id="comment-archive-ids" value="">
                          <div class="field y-form-star" id="comment-star-box">
                              <label>评分</label>
                              <div class="group clearfix">
                                  <div class="comment-star" data-bind="rating">
                                      <a href="javascript:;" class="stars star-1" data-value="1">1</a>
                                      <a href="javascript:;" class="stars star-2" data-value="2">2</a>
                                      <a href="javascript:;" class="stars star-3" data-value="3">3</a>
                                      <a href="javascript:;" class="stars star-4" data-value="4">4</a>
                                      <a href="javascript:;" class="stars star-5" data-value="5">5</a>
                                  </div>
                              </div>
                          </div>
                          <div class="field y-form-list" id="comment-list-box" style="display: none;">
                              <label>请选择已提交的评论进行追评</label>
                              <div id="comment-list">
                                  正在加载中...
                                                      </div>
                          </div>
                          <div class="field y-form-comment">
                              <label id="comment-label">内容</label>
                              <textarea id="comment" placeholder="外观好看吗，拍照怎么样，好用吗？"></textarea>
                          </div>
                          <div class="y-comments-uploader" id="comments-uploader-container">
                              <a class="y-upload-button" href="javascript:;" id="comments-file">
                                                          <i></i>
                                  <span>上传图片</span>
                              </a>
                              <div class="y-upload-list">
                                  <ul id="comments-upload-list" style="display: none;">
                                                              </ul>
                              </div>
                              <div class="y-upload-note">最大可支持上传<em>2</em>M以内的JPG,PNG格式图片，最多允许上传<em>4</em>张图片</div>
                          </div>
                          <div class="y-form-button">
                              <a class="button button-s" href="javascript:;" id="submit-comment">提交评论</a>
                              <a class="button button-s" href="javascript:;" id="comment-loading" style="display: none;">提交评论中...</a>
                              <a class="button-light button-s" href="javascript:;" id="cancel-comment">取消评论</a>
                          </div>
                      </div>
                  </div>
              </div>
            </section>
          </div>
      </div>
    </div>
  </main>
  <!--主体结束-->
@endsection()