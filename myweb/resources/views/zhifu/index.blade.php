@extends('layout.home1')
@section('con')
<main class="main-content slab-light order-payments-revision opr">
    <div class="wrapper">
      <ul class="breadcrumb">
  <li>
    <a href="http://www.oppo.com/cn/">
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  <a href="http://www.opposhop.cn/products?is_promotion=0&amp;category=1">
            在线购物
            <span>/</span>
          </a>
              </li>
          <li>
                  <a href="http://www.opposhop.cn/trade">
            购物车结算
            <span>/</span>
          </a>
              </li>
          <li>
                  支付
              </li>
      </ul>
      <div class="brick-bottom">
        <ul class="steps"><li class="one active ">
    <div class="step-content">
            <h5 class="step-heading">购物车</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="two  active">
    <div class="step-content palm-right-text">
            <h5 class="step-heading">填写订单</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="three active step-completed">
    <div class="step-content">
            <h5 class="step-heading">支付</h5>
      <div class="step-gradient"></div>
    </div>
  </li></ul>
      </div>





  <div class="slab-white opr-detail" >
    <div class="g">
      <div class="gi desk-two-thirds one-whole">
        <div class="opr-title">订单提交成功！</div>
        <div class="opr-text">订单号为 <i id="order_num">170210150222648</i>请您在提交订单后<span class="alert-danger">48</span>小时内付款（逾期订单将自动取消）。</div>
      </div>
      <div class="gi desk-one-third one-whole opr-prices">
        <div class="opr-price">应付金额：<span >￥<span id="opr-price">3499</span>.00</span></div>
        <div class="opr-order-detail"><a href="javascript:;" id="xq" class="oppo-tj" data-tj="store|link|order|detail">订单详情&nbsp;<span class="icon icon-arrow-down-green"></span></a></div>
      </div>
    </div>
    <div class="opr-order-details" style="display:none">
      <p id="chc"><label>商品清单：</label></p>
      <div id="siyou">
        <br>
        <p><span></span>&nbsp;&nbsp;&nbsp;<span></span></p>
        <br>
      </div>

      <p><label>收货信息：</label></p>
      <p id="mydizhi"></p>
    </div>
  </div>
  {{csrf_field()}}

        <div class="slab-white opr-platform">
        <div class="opr-platform-title">选择支付平台：<!-- <span>（默认推荐您常用的支付平台）</span> --></div>
        <div class="brick-shadow">
          <div class="select-platforms"><a href="javascript:;" class="open-platforms oppo-tj" data-tj="store|link|order|platforms">选择其他支付平台&nbsp;<span class="icon icon-arrow-down-green"></span></a></div>
          <div class="list-platforms">
            <form>
              <div class="g g-wrapper-s payment-group">

                
                                                      <!--支付宝支付-->
                    <div class="gi one-whole">
  <div style="display: block;" class="field radio-item pay dark xl">
    <span class="radio mozilla mozilla45 not_msie custom-form_radio_alipay checked_radio"><input class="parent_radio oppo-tj" id="radio_alipay" checked="checked" name="payonline_category" code="alipay" bankcode="directpay" paymethod="0" seed="payment_alipay" qr_pay="0" data-tj="store|radio|order|alipay" type="radio"></span>
    <label for="radio_alipay">
      <img alt="" src="/zhifu/index.blade_files/alipay_logo.png">
                                                                        
                                                                        
                                                              </label>
    
  </div>
</div>                    <!--花呗支付-->
                    <div class="gi one-whole parent-huabei">
  <div class="field radio-item pay dark xl" style="display:block!important;">
    <span class="radio mozilla mozilla45 not_msie custom-form_radio_alipay_hb"><input class="parent_radio oppo-tj" id="radio_alipay_hb" name="payonline_category" value="alipay_hb" code="alipay" bankcode="directpay" paymethod="0" seed="payment_alipay_hb" qr_pay="0" data-tj="store|radio|order|alipay-hb" type="radio"></span>
    <label for="radio_alipay_hb">
      <img alt="" src="/zhifu/index.blade_files/alipay_hb.jpg">
      <font class="alipay-hb-tip">3/6期免息</font>
      <div class="radio-extend ">
        <div class="g g-wrapper-s alipay-hb-extend ">
                    <div class="gi desk-one-third one-whole">
            <div class="field input-big-radio">
              <span class="radio mozilla mozilla45 not_msie custom-form_due_3"><input code="alipay_huabei_qishu oppo-tj" name="alipay_huabei_qishu" class="alipay_huabei_qishu" id="due_3" value="3" data-tj="store|radio|order|installment_3" type="radio"></span>
              <label for="due_3">
                <div class="g alipay-hb-top">
                  <div class="gi two-fifths">
                    <span class="icon-hbs icon-hb-3"></span>
                  </div>
                  <div class="gi three-fifths alipay-hb-info">分期价<br><font>￥1166.33</font>X3</div>
                </div>
                <div class="g alipay-hb-bottom">
                  <div class="gi one-whole">共 ￥3499 &nbsp;&nbsp;<span>免手续费</span></div>
                  <!-- <div class='gi two-fifths'></div> -->
                </div>
              </label>
              <input name="huabei_qishu" value="3" class="installment_str_1" type="hidden">
            </div>
          </div>
                    <div class="gi desk-one-third one-whole">
            <div class="field input-big-radio">
              <span class="radio mozilla mozilla45 not_msie custom-form_due_6"><input code="alipay_huabei_qishu oppo-tj" name="alipay_huabei_qishu" class="alipay_huabei_qishu" id="due_6" value="6" data-tj="store|radio|order|installment_6" type="radio"></span>
              <label for="due_6">
                <div class="g alipay-hb-top">
                  <div class="gi two-fifths">
                    <span class="icon-hbs icon-hb-6"></span>
                  </div>
                  <div class="gi three-fifths alipay-hb-info">分期价<br><font>￥583.17</font>X6</div>
                </div>
                <div class="g alipay-hb-bottom">
                  <div class="gi one-whole">共 ￥3499 &nbsp;&nbsp;<span>免手续费</span></div>
                  <!-- <div class='gi two-fifths'></div> -->
                </div>
              </label>
              <input name="huabei_qishu" value="6" class="installment_str_1" type="hidden">
            </div>
          </div>
                    <div class="gi desk-one-third one-whole">
            <div class="field input-big-radio">
              <span class="radio mozilla mozilla45 not_msie custom-form_due_12"><input code="alipay_huabei_qishu oppo-tj" name="alipay_huabei_qishu" class="alipay_huabei_qishu" id="due_12" value="12" data-tj="store|radio|order|installment_12" type="radio"></span>
              <label for="due_12">
                <div class="g alipay-hb-top">
                  <div class="gi two-fifths">
                    <span class="icon-hbs icon-hb-12"></span>
                  </div>
                  <div class="gi three-fifths alipay-hb-info">分期价<br><font>￥314.91</font>X12</div>
                </div>
                <div class="g alipay-hb-bottom">
                  <div class="gi one-whole">共 ￥3778.92 &nbsp;&nbsp;</div>
                  <!-- <div class='gi two-fifths'></div> -->
                </div>
              </label>
              <input name="huabei_qishu" value="12" class="installment_str_1" type="hidden">
            </div>
          </div>
                    <div class="gi one-whole">
            <p>0首付&nbsp;|&nbsp;分期无压力&nbsp;|&nbsp;支付宝自动还款&nbsp;|&nbsp;轻松无忧&nbsp;&nbsp;<a href="https://ds.alipay.com/fd-iiiblm8p/index.html" target="_blank">了解更多&gt;</a></p>
          </div>
        </div>
      </div>
    </label>
    
  </div>
</div>
                                    <!--微信扫码支付-->
                  <div class="gi one-whole">
  <div class="field radio-item pay dark xl">
    <span class="radio mozilla mozilla45 not_msie custom-form_radio_weixin_qrcode"><input class="parent_radio" id="radio_weixin_qrcode" value="weixin_qrcode" name="payonline_category" code="weixin_qrcode" bankcode="directpay" paymethod="0" seed="payment_tenpay" qr_pay="0" data-tj="store|radio|order|weixin_qrcode" type="radio"></span>
    <label for="radio_weixin_qrcode">
      <img alt="" src="/zhifu/index.blade_files/weixin.jpg">
      <div class="radio-extend portable-hide">
        <div class="g">
          <div class="gi one-half">
            <p class="align-center mg-50"><img id="weixin_qrcode" src="/zhifu/index.blade_files/loader.gif" data-src="http://www.opposhop.cn/orders/pay?order_sn=170210150222648&amp;payment_code=weixin_js&amp;payment_bankcode=scan"></p>
            <p class="align-center" id="weixin_qrtext">使用微信扫码完成付款</p>
          </div>
          <div class="gi one-half">
            <p class="align-center"><img src="/zhifu/index.blade_files/phone-bg.png"></p>
          </div>
        </div>
      </div>
    </label>
    
  </div>
</div>                  
                                                  
                                  <!--网银支付-->
                  <div class="gi one-whole">
  <div class="field radio-item pay dark xl">
    <span class="radio mozilla mozilla45 not_msie custom-form_radio_wangyin"><input class="parent_radio oppo-tj" id="radio_wangyin" name="payonline_category" value="wangyin" data-tj="store|radio|order|wangyin" type="radio"></span>
    <label for="radio_wangyin">
      <img alt="" src="/zhifu/index.blade_files/payment_wangyin.jpg">
      <div class="radio-extend">
        <div class="g g-wrapper-s payment-group">
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_ICBCB2C"><input class="bank_radio oppo-tj" id="radio_ICBCB2C" name="payonline_bank" code="alipay" bankcode="ICBCB2C" paymethod="1" seed="payment_bank_ICBCB2C" data-tj="store|radio|order|wangyin_ICBCB2C" type="radio"></span>
                <label for="radio_ICBCB2C">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico4.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_CMB"><input class="bank_radio oppo-tj" id="radio_CMB" name="payonline_bank" code="alipay" bankcode="CMB" paymethod="1" seed="payment_bank_CMB" data-tj="store|radio|order|wangyin_CMB" type="radio"></span>
                <label for="radio_CMB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico3.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_CCB"><input class="bank_radio oppo-tj" id="radio_CCB" name="payonline_bank" code="alipay" bankcode="CCB" paymethod="1" seed="payment_bank_CCB" data-tj="store|radio|order|wangyin_CCB" type="radio"></span>
                <label for="radio_CCB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico5.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_BOCB2C"><input class="bank_radio oppo-tj" id="radio_BOCB2C" name="payonline_bank" code="alipay" bankcode="BOCB2C" paymethod="1" seed="payment_bank_BOCB2C" data-tj="store|radio|order|wangyin_BOCB2C" type="radio"></span>
                <label for="radio_BOCB2C">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico7.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_ABC"><input class="bank_radio oppo-tj" id="radio_ABC" name="payonline_bank" code="alipay" bankcode="ABC" paymethod="1" seed="payment_bank_ABC" data-tj="store|radio|order|wangyin_ABC" type="radio"></span>
                <label for="radio_ABC">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico6.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_COMM"><input class="bank_radio oppo-tj" id="radio_COMM" name="payonline_bank" code="alipay" bankcode="COMM" paymethod="1" seed="payment_bank_COMM" data-tj="store|radio|order|wangyin_COMM" type="radio"></span>
                <label for="radio_COMM">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico8.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_PSBC-DEBIT"><input class="bank_radio oppo-tj" id="radio_PSBC-DEBIT" name="payonline_bank" code="alipay" bankcode="PSBC-DEBIT" paymethod="1" seed="payment_bank_PSBC-DEBIT" data-tj="store|radio|order|wangyin_PSBC-DEBIT" type="radio"></span>
                <label for="radio_PSBC-DEBIT">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico9.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_CEB-DEBIT"><input class="bank_radio oppo-tj" id="radio_CEB-DEBIT" name="payonline_bank" code="alipay" bankcode="CEB-DEBIT" paymethod="1" seed="payment_bank_CEB-DEBIT" data-tj="store|radio|order|wangyin_CEB-DEBIT" type="radio"></span>
                <label for="radio_CEB-DEBIT">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico12.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_SPDB"><input class="bank_radio oppo-tj" id="radio_SPDB" name="payonline_bank" code="alipay" bankcode="SPDB" paymethod="1" seed="payment_bank_SPDB" data-tj="store|radio|order|wangyin_SPDB" type="radio"></span>
                <label for="radio_SPDB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico11.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_CITIC"><input class="bank_radio oppo-tj" id="radio_CITIC" name="payonline_bank" code="alipay" bankcode="CITIC" paymethod="1" seed="payment_bank_CITIC" data-tj="store|radio|order|wangyin_CITIC" type="radio"></span>
                <label for="radio_CITIC">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico16.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_CIB"><input class="bank_radio oppo-tj" id="radio_CIB" name="payonline_bank" code="alipay" bankcode="CIB" paymethod="1" seed="payment_bank_CIB" data-tj="store|radio|order|wangyin_CIB" type="radio"></span>
                <label for="radio_CIB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico14.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_SDB"><input class="bank_radio oppo-tj" id="radio_SDB" name="payonline_bank" code="alipay" bankcode="SDB" paymethod="1" seed="payment_bank_SDB" data-tj="store|radio|order|wangyin_SDB" type="radio"></span>
                <label for="radio_SDB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico17.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_CMBC"><input class="bank_radio oppo-tj" id="radio_CMBC" name="payonline_bank" code="alipay" bankcode="CMBC" paymethod="1" seed="payment_bank_CMBC" data-tj="store|radio|order|wangyin_CMBC" type="radio"></span>
                <label for="radio_CMBC">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico15.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_HZCBB2C"><input class="bank_radio oppo-tj" id="radio_HZCBB2C" name="payonline_bank" code="alipay" bankcode="HZCBB2C" paymethod="1" seed="payment_bank_HZCBB2C" data-tj="store|radio|order|wangyin_HZCBB2C" type="radio"></span>
                <label for="radio_HZCBB2C">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico21.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_SHBANK"><input class="bank_radio oppo-tj" id="radio_SHBANK" name="payonline_bank" code="alipay" bankcode="SHBANK" paymethod="1" seed="payment_bank_SHBANK" data-tj="store|radio|order|wangyin_SHBANK" type="radio"></span>
                <label for="radio_SHBANK">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico18.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_BJRCB"><input class="bank_radio oppo-tj" id="radio_BJRCB" name="payonline_bank" code="alipay" bankcode="BJRCB" paymethod="1" seed="payment_bank_BJRCB" data-tj="store|radio|order|wangyin_BJRCB" type="radio"></span>
                <label for="radio_BJRCB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico19.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_SPABANK"><input class="bank_radio oppo-tj" id="radio_SPABANK" name="payonline_bank" code="alipay" bankcode="SPABANK" paymethod="1" seed="payment_bank_SPABANK" data-tj="store|radio|order|wangyin_SPABANK" type="radio"></span>
                <label for="radio_SPABANK">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico13.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_FDB"><input class="bank_radio oppo-tj" id="radio_FDB" name="payonline_bank" code="alipay" bankcode="FDB" paymethod="1" seed="payment_bank_FDB" data-tj="store|radio|order|wangyin_FDB" type="radio"></span>
                <label for="radio_FDB">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico23.png">
                </label>
              
            </div>
          </div>
                    <div class="gi desk-one-quarter">
            <div class="field radio-item pay dark">
              <span class="radio mozilla mozilla45 not_msie custom-form_radio_NBBANK"><input class="bank_radio oppo-tj" id="radio_NBBANK" name="payonline_bank" code="alipay" bankcode="NBBANK" paymethod="1" seed="payment_bank_NBBANK" data-tj="store|radio|order|wangyin_NBBANK" type="radio"></span>
                <label for="radio_NBBANK">
                  <img alt="" src="/zhifu/index.blade_files/payment_ico20.png">
                </label>
              
            </div>
          </div>
                  </div>
      </div>
    </label>
    
  </div>
</div>                
                
                <!--财付通支付-->
                <div class="gi one-whole">
  <div class="field radio-item pay dark xl">
    <span class="radio mozilla mozilla45 not_msie custom-form_radio_tenpay"><input class="parent_radio oppo-tj" id="radio_tenpay" name="payonline_category" code="tenpay" bankcode="directpay" paymethod="0" seed="payment_tenpay" qr_pay="0" data-tj="store|radio|order|tenpay" type="radio"></span>
    <label for="radio_tenpay">
      <img alt="" src="/zhifu/index.blade_files/tenpay.png">
    </label>
    
  </div>
</div>
                
              </div>
            </form>
          </div>
          <div class="opr-btn-pay">
            <div class="g">
              <div class="gi desk-three-quarters">
                <p class="error_msg_note">
                                  </p>
              </div>
              <div class="gi desk-one-quarter">
                <a info="submit" class="button cart-button oppo-tj" id="pay_action"  data-tj="store|btn|order|lijizhifu">立即支付</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
  <script type="text/javascript">
    var token=$("input[name='_token']").val();
    function myajax(){ //遍历提交订单成功的订单信息
      $.ajax({
        url:'/dingdan/xbl', 
        type:'post',
        data:{'_token':token},
        dataType:'json',
        success:function(mes){
          $('div[info="cha"]').remove();     
          $(mes).each(function(){
            var div=$('#siyou:eq(0)').clone().attr({'info':'cha','style':'display:none'});
            div.find('p').find('span').html($(this).attr('gname')).css('color','black');
            div.find('p').find('span').next('span').html('x '+$(this).attr('num')).css('color','#008b56');
            $('.opr-text').find('i').html($(this).attr('order_num'));
            $('#opr-price').html($(this).attr('total'));
            $('#mydizhi').html($(this).attr('sheng1')+$(this).attr('shi1')+$(this).attr('xian1')+$(this).attr('jiedao1')+$(this).attr('xiangxi')+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+$(this).attr('name')+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+'（'+$(this).attr('phone')+'）');
            $('#chc').append(div);
          });
        }
      });
    }
    $('#xq').click(function(){
      $('div[info="cha"]').show();
      $('.opr-order-details').slideToggle();
    });
    myajax();

    $('a[info="submit"]').click(function(){
      // alert('支付成功');
      var result = prompt("请输入你的支付密码：", "");
      
      if(result == 'yes') {  
       alert('支付成功');
       var coco=$('#order_num').html();
      // console.log(coco);
      
       // 要该状态的订单 订单号
      $.ajax({
        url:'/dingdan/edit1', //修改订单状态
        type:'post',
        data:{'_token':token,'order_num':coco},
        dataType:'text',
        success:function(mes){
          location.href='/dingdan/index';
        }
      });
      return false;
      } else {
       alert("你未输入值或者输入错误");
      }  
    });
  </script>
@endsection