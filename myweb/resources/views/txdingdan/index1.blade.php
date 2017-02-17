@extends('layout.home')
@section('con')
<style type="text/css">
              select:hover{
        border:1px solid #2aad6f;
      }
      select{
        border:1px solid #ccc;
        border-radius: 4px;
        opacity: 1;
      }
</style>
  <main class="main-content slab-light">
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
  <a href="http://www.opposhop.cn/cart">
  购物车结算
  <span>/</span>
  </a>
  </li>
  <li>
  填写订单
  </li>
</ul>
      <div class="brick-bottom">
<ul class="steps"><li class="one active ">
  <div class="step-content">
  <h5 class="step-heading">购物车</h5>
  <div class="step-gradient"></div>
  </div>
  </li><li class="two step-completed active ">
  <div class="step-content palm-right-text">
  <h5 class="step-heading">填写订单</h5>
  <div class="step-gradient"></div>
  </div>
  </li><li class="three ">
  <div class="step-content">
  <h5 class="step-heading">支付</h5>
  <div class="step-gradient"></div>
  </div>
  </li>
</ul>

<div class="row">
  <div class="col-md-12">
  <div class="alert alert-danger" role="alert">
  <ul class="list-unstyled">
  <strong class="error_msg_note"></strong>
  </ul>
  </div>
  </div>
</div>



<form id="order-create-form" class="g">
<div class="gi one-whole slab-white-border">
  <div class="delivery-header">
    <h1 class="h-epsilon">选择配送方式:</h1>
  </div>
  <div class='brick-shadow'>
    <div id="charu" class='radio-title'>
      <strong>手机发货默认顺丰快递，如收货地址顺丰快递不能送达，我们会更改为EMS快递为您配送。</strong>
    </div>


    <div class="content" style="display:none">
      <div class="address-form-field">
        <div class="field radio-item dark xl">
          <span class="radio mozilla mozilla45 not_msie custom-form_radio1284411 checked_radio">
            <img src="/quan.jpg" alt="">
          </span>
          <label for="radio1284411">
            <div class="g address-form-content">
              <div class="gi desk-one-fifth one-whole"></div>
              <div class="gi desk-one-fifth one-whole"></div>
              <div class="gi desk-one-fifth one-whole"></div>
              <div class="gi desk-two-fifths one-whole"></div>
            </div>
            <div class="links">
              <a class="bianji" href="javascript:;">编辑</a>
              <a data-id="1284411" class="remove-address" href="javascript:;">删除</a>
            </div>
          </label>
        </div>
      </div>
    </div>

  <div class="field center-text">
    <a class="address-more"><span>查看更多地址<span><br><img src="/jian.jpg" alt=""></a>
  </div>

    

<br>
        <a class='button-light field' id="address_new" href='javascript:;'>添加新地址</a>
        <span><font id="sxs" color="red" size="2px"></font></span>
        <div id="block" class='js-content address-form-new' style='display:none;'>
          <div id='address-create' class='g'>
            <div class='gi field lap-one-whole desk-one-quarter'>
              <label>*收货人姓名</label>
              <input type='text' name='name'>
            </div>
            <div class='g'>
              <div class='gi field lap-one-whole desk-one-quarter'>
                <label>*手机号码</label>
                <input type='text' name='phone'><span><font id="phone" color="red" size="2px"></font></span>
              </div>
            </div>
            <div class='g field'>
              <label>*收货地址</label>
              <div class id="g">
                <div class='gi basic-input one-whole desk-one-fifth'>
                  <div class="gg">
                    请选择
                  </div>
                  <span class='icon icon-grey-arrow-down'></span>
                    <select class="selectzjl" id='select1' style="height:63px" ><option value="999999999999">省份/自治区</option></select>
                </div>

                <div class='gi basic-input one-whole desk-one-fifth'>
                  <div class="gg">
                    请选择
                  </div>
                  <span class='icon icon-grey-arrow-down'></span>
                  <select class="selectzjl" id='select2' style="height:63px" name='city_id'><option value="999999999999">城市/地区</option></select>
                </div>
                <div class='gi basic-input one-whole desk-one-fifth'>
                  <div class="gg">
                    请选择
                  </div>              
                  <span class='icon icon-grey-arrow-down'></span>
                  <select class="selectzjl" id='select3' style="height:63px" name='district_id'><option value="999999999999">区/县</option></select>
                </div>
                <div class='gi basic-input one-whole desk-one-fifth'>
                  <div class="gg">
                    请选择
                  </div>              
                  <span class='icon icon-grey-arrow-down'></span>
                  <select class="selectzjl" id='select4' style="height:63px" name='town_id'><option value="999999999999">配送区域</option></select>
                </div>
              </div>
              <span><font id="sss" color="red" size="2px"></font></span>
            <div class="g">
              <div class="gi desk-two-thirds one-whole">
                <input class='address-detail' type="text" name="address-detail" value='' placeholder="详细街道地址">
              </div>
            </div>
          </div>

            <div class='g'>
              <div class='gi field lap-one-whole desk-one-quarter'>
                <label>联系邮箱</label>
                <input type='text' name='email'><span><font id="email" color="red" size="2px"></font></span>
              </div>
            </div>
            <div class='form-actions'>
              <div class='pull-left'>
                <a class='button-light pull-left address-store' id="submit">保存</a>
                <a class='button-light pull-left address-new-cancel' id="reset">取消</a>
                <span><font id="aaa" color="red" size="2px"></font></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>



                        <div class="brick-shadow" id="payment_method_filed">
              <h3 class="h-epsilon">支付方式:</h3>
              <div class="g g-wrapper-s">
                                <div class="gi one-whole desk-one-half g-hide">
                  <div class="field radio-item payment_method_jsd">
                    <span class="radio mozilla mozilla45 not_msie custom-form_payment_method_radio11"><input id="payment_method_radio11" name="payment_method_radio" value="11" data-fee="0" type="radio"></span>
                    <label for="payment_method_radio11">
                      <span class="main">
                        货到付款<font class="payment_inside">（当日下单，当日送达）</font>
                        <a class="color-primary font-weight-normal" href="http://hd.oppo.com/act/2016/fast/index.html" target="_blank">&nbsp;“去了解当日达”&gt;&gt;</a>
                      </span>
                    </label>
                  </div>
                </div>
                                <div class="gi one-whole desk-one-half g-hide">
                  <div class="field radio-item payment_method_online">
                                        <span class="radio mozilla mozilla45 not_msie custom-form_payment_method_radio0"><input id="payment_method_radio0" name="payment_method_radio" value="0" data-fee="0" type="radio"></span>
                    <label for="payment_method_radio0">
                      <span class="main">
                        在线支付
                      </span>
                    </label>
                  </div>
                </div>
                                <div class="gi one-whole desk-one-half g-hide">
                  <div class="field radio-item payment_method_cod">
                    <span class="radio mozilla mozilla45 not_msie custom-form_payment_method_radio4"><input id="payment_method_radio4" name="payment_method_radio" value="4" data-fee="0" type="radio"></span>
                    <label for="payment_method_radio4">
                      <span class="main">
                        我想要货到付款
                        <a class="color-primary font-weight-normal" href="http://www.oppo.com/cn/service/help/596?name=%E8%B4%AD%E4%B9%B0%E5%B8%AE%E5%8A%A9" target="_blank">&nbsp;  了解更多货到付款详情&gt;&gt;</a>
                      </span>
                    </label>
                  </div>
                </div>
              </div>

                            <div class="g-hide">
                <div class="field radio-item">
                  <span class="radio mozilla mozilla45 not_msie custom-form_payment_method_radio3"><input id="payment_method_radio3" name="payment_method_radio" value="3" data-fee="0" type="radio"></span>
                    <label for="payment_method_radio3">
                      <span class="main">
                        自提
                        <a class="subtitle" href="#">了解上门自提流程</a>
                      </span>
                    </label>
                  
                </div>
                <div class="g g-wrapper-s delivery-pick" style="display:none">
                  <div class="gi lap-one-half">
                    <div class="field">
                      <label for="text1">选择自提点</label>
                      <input id="text1" type="text">
                      <p class="instructions">请在支付完成后到您选择的实体店自提</p>
                    </div>
                  </div>
                  <div class="gi lap-one-half field">
                    <div class="radio-title">选择自提时间</div>
                    <div class="g g-wrapper-s">
                      <div class="gi field one-half">
                        <div class="basic-input">
                          <span class="icon icon-grey-arrow-down"></span>
                          <select id="select">
                            <option selected="selected" value="option1">8月6日</option>
                            <option value="option2">8月7日</option>
                            <option value="option3">8月8日</option>
                            <option value="option4">8月9日</option>
                            <option value="option5">8月10日</option>
                          </select><a class="select mozilla mozilla45 not_msie custom-form_select responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span>8月6日</span></span></span></a>
                        </div>
                      </div>
                      <div class="gi field one-half">
                        <div class="basic-input">
                          <span class="icon icon-grey-arrow-down"></span>
                          <select id="select">
                            <option selected="selected" value="option1">9:00 - 12:00</option>
                            <option value="option2">14:00 - 18:00</option>
                          </select><a class="select mozilla mozilla45 not_msie custom-form_select responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span>9:00 - 12:00</span></span></span></a>
                        </div>
                      </div>
                      <p class="instructions gi one-whole">请在下单7天内到对应自提店自提</p>
                    </div>
                  </div>
                  <div class="gi lap-one-half">
                    <div class="field">
                      <label for="text2">填写接受自提券码的手机号</label>
                      <input id="text1" type="text">
                      <p class="instructions">我们会将自提券码发送到该手机号</p>
                    </div>
                  </div>
                  <div class="gi one-whole">
                    <button class="button" type="button">确认</button>
                  </div>
                </div>
              </div>
            </div>
            
                        <div class="brick-shadow">
              <div class="invoice-head js-collapse">
                <a class="js-collapse-open" style="display:inline-block">
                  <h3 class="h-epsilon">电子发票:<span class="icon icon-arrow-light-down"></span></h3>
                </a>
                <p class="invoice-head-tip">
                  电子发票法律效力、基本用途及使用规定同纸质发票，可在订单详情中查看和下载，打印后可用于报销且不易丢失。<br>
                  <a class="color-primary" href="http://hd.oppo.com/act/2016/e-invoice/index.html" target="_blank">什么是电子发票？</a>
                </p>
              </div>
              <div class="lap-one-whole field">
                  *发票抬头：<span id="invoice-title"></span>
                  <input value="" name="invoice_title" type="hidden">
              </div>
              <div class="invoice" id="invoice-new" style="display:none">
                <div class="g field lap-one-whole desk-two-thirds">
                  <input class="edit-invoice-title" name="invoicetitle" type="text">
                </div>
                <div class="form-actions">
                  <div class="form-actions-left">
                    <a class="button-light" href="javascript:;" id="save-invoice-title">保存</a>
                  </div>
                </div>
              </div>
              <div>
                <a href="javascript:;" id="update-invoice-btn" class="button button-light">重新编辑</a>
              </div>
            </div>
           
<div class="brick-shadow">
  <h4>商品清单：</h4>
  @foreach($arr1 as $v) 
  <div class="goods-list">
    <div class="goods-list-show">
      <a class="goods-list-image" href="http://www.opposhop.cn/products/393" target="_blank">
        <img id="tu5" src="{{$v['pic']}}">
      </a>
    </div>
    <div class="goods-list-detail">
      <div class="goods-list-info goods-list-main">
        <div class="goods-list-description">
          <h4 class="heading">
            <a href="http://www.opposhop.cn/products/393" target="_blank">{{$v['gname']}}</a>
          </h4>
          <p>{{$v['desc']}}</p>
          <input type="hidden" name="spid" value="{{$v['id']}}">
          <input type="hidden" name="yance" value="{{$v['color']}}">
        </div>
        <div class="goods-list-quantity"><strong>×<span id="ggs">{{$v['num']}}</span></strong></div>
        <div class="goods-list-price"><strong>￥<span>{{$v['price']}}.00</span></strong></div>
      </div>


      <div class="goods-list-info goods-list-attach goods-list-service">
        <div class="goods-list-description">
          <i class="goods-list-flag-service">延保</i>
          延长保半年                   
        </div>
        <div class="goods-list-quantity">×<span>1</span></div>
        <div class="goods-list-price">￥<span>0.00</span></div>
      </div>
    </div>
  </div>
  @endforeach
</div>









                        <input name="voucher" value="" type="hidden">
<div class="brick-shadow coupon-p">
  <div class="g">
    <div class="radio-item simple">
      <span class="radio mozilla mozilla45 not_msie custom-form_coupon-type-2 checked_radio"><input checked="checked" id="coupon-type-2" name="coupon-type" value="2" type="radio"></span>
      <label for="coupon-type-2">
        <span class="main">使用优惠码</span>
      </label>
    </div>
    <div style="display: block;" class="coupon-code">
      <div class="g g-wrapper-s coupon-code-field">
        <div class="gi one-half desk-one-quarter">
          <input name="coupon-code" placeholder="请输入优惠码" type="text">
        </div>
        <div class="gi one-half desk-three-quarters">
          <a class="button button-light coupon-code-use">立即使用</a>
          <a class="coupon-code-clear">清空</a>
        </div>
      </div>
      <p style="display: none;" class="coupon-code-result">优惠码已成功使用。现已为你减免<span></span>元。</p>
      <p class="alert-danger"></p>
      <p class="clickable">（优惠码一旦使用，不可取消）</p>
    </div>
  </div>

    </div>

<div class="brick-shadow coupon-m">
  <div class="coupon-choice-m">
    <div class="g">
      <div class="gi one-half">
        <a class="button button-light coupon-choice-code">使用优惠码</a>
      </div>
      <div class="gi one-half coupon-choice-2"></div>
    </div>
              </div>

    <div id="dialog-coupon-voucher" class="hidden">
    <div class="mask"></div>
    <div class="dialog-common dialog-box-common">
      <div class="dialog-container">
        <a class="dialog-close">×</a>
        <div class="dialog-content">玩命加载中。。。</div>
      </div>
    </div>
  </div>

  <div id="dialog-coupon-code" class="hidden">
    <div class="mask"></div>
    <div class="dialog-common dialog-box-common">
      <div class="dialog-container">
        <a class="dialog-close">×</a>
        <div class="dialog-content">
          <div class="g">
            <input name="coupon-code-m" placeholder="请输入优惠码" type="text">
          </div>
          <p class="alert-danger"></p>
          <p>（优惠码一旦使用，不可取消）</p>
          <p><a class="button one-whole use-btn">立即使用</a></p>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="brick-shadow fee-list">
    <ul>
      <li>
        <span class="fee-list-title">商品数量：</span>
        <span id="jishu" class="fee-list-data">5</span>
      </li>
      <li>
        <span class="fee-list-title">合计：</span>
        <span class="fee-list-data" id="trade_total_fee">￥<font>4398.00</font></span>
      </li>
      <li>
        <span class="fee-list-title">优惠券/码：</span>
        <span class="fee-list-data" id="discount_fee_price">- ￥<span id="yhq">20.00</span></span>
      </li>
      <li>
        <span class="fee-list-title">邮费（<font color="color_red">全场包邮</font>）：</span>
        <span class="fee-list-data" id="shipping_fee_price">+ ￥<span id="yf">10.00</span></span>
      </li>
      <li class="fee-list-payment">
        <span class="fee-list-title">手续费（货到付款手续费）：</span>
        <span class="fee-list-data" id="payment_fee_price">+ ￥<span>0.00</span></span>
      </li>
      <li>
        <span class="fee-list-title">应付金额：</span>
        <span class="fee-list-data fee-list-amount" id="amount_fee_price">￥<span id="yifu">4398.00</sapn></span>
      </li>
      <li class="cart-alipay-hb" data-checkfree="0">
        <span class="fee-list-title"><i class="icon-hb"></i>花呗最低月供：</span>
        <span class="fee-list-data total-hb">￥395.82x12期</span>
      </li>
    </ul>
  </div>

            <div class="form-actions brick-shadow right-text">
                <a id="tijiao" class="button cart-button">提交订单</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </main>
    {{csrf_field()}}
  <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
  <script type="text/javascript">
    var token=$('input[name="_token"]').val();
    myajax(0); //显示城市联动 第一个select;
    myadd();//显示收货地址
    jishu();//应付金额的方法;
    // addressnum(); //显示'查看更多地址'
    $('#address_new').click(function(){
      $('#block').show();
    });

    $('#reset').click(function(){
      $('#block').css('display','none');
      $('#submit').parents('#address-create').removeAttr('id1');
      $('input').val(''); $('select').val('999999999999');
      $('#phone').html('');
      $('#email').html('');
      $('#sss').html('');
    });

    $('select').live('change',function(){
      var d=$(this).parent().next().find('select');
      // console.log($('select'));
      if($(this).attr('id')=='select1'){
        $('#select2').find('option:gt(0)').remove();
        $('#select3').find('option:gt(0)').remove();
        $('#select4').find('option:gt(0)').remove();
      }else if($(this).attr('id')=='select2'){
        $('#select3').find('option:gt(0)').remove();
        $('#select4').find('option:gt(0)').remove();
      }else if($(this).attr('id')=='select3'){
        $('#select4').find('option:gt(0)').remove();
      }
      // console.log(d)
      var id=$(this).val();
      $.ajax({
        url:'/shop/site',
        type:'post',
        data:{'_token':token,'upid':id},
        dataType:'json',
        success:function(mes){
          $(mes).each(function(){
            var op=$('<option value="'+$(this).attr('id')+'">'+$(this).attr('name')+'</option>');
            d.append(op);
          });
        }
      });    
    });

    $('#submit').click(function(){ //填写收货地址的保存按钮
      var add_id=$(this).parents('#address-create').attr('id1');
      var obj=new Object();
      //将这些获取的数据(用户添加的新地址)放在一个对象里;
      obj.name=$('input[name="name"]').val();
      obj.phone=$('input[name="phone"]').val();
      obj.xiangxi=$('input[name="address-detail"]').val();
      obj.email=$('input[name="email"]').val();
      obj.sheng=$('#select1').val(); //城市联动的id
      obj.shi=$('#select2').val();
      obj.xian=$('#select3').val();
      obj.jiedao=$('#select4').val();
      obj.sheng1=$('#select1 option:selected').text(); //城市联动的名称
      obj.shi1=$('#select2 option:selected').text();
      obj.xian1=$('#select3 option:selected').text();
      obj.jiedao1=$('#select4 option:selected').text();
      // console.log(obj.phone);
      var patrn = /^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/;
      var patrn1 = /^([0-9A-Za-z\-_\.]+)@([0-9A-Za-z]+\.[A-Za-z]{2,3}(\.[A-Za-z]{2})?)$/g;
      //手机号正则匹配
      if(!patrn.exec(obj.phone)){ 
        $('#phone').html('手机号码格式不正确!');
        return false;
      }else{
        $('#phone').html('');
      }
      //邮箱正则匹配
      if(!patrn1.exec(obj.email)){
        $('#email').html('邮箱格式不正确!');
        return false;
      }else{
        $('#email').html('');
      }
      
        if($('#select1').val()=='999999999999'){
          $('#sss').html('请将地址填写完整!')
          return false;
        } else if($('#select2').val()=='999999999999') {
          $('#sss').html('请将地址填写完整!')
          return false;
        } else if($('#select3').val()=='999999999999') {
          $('#sss').html('请将地址填写完整!')
          return false;         
        }
      


      $.ajax({ //发送请求将这些数据添加到address表里
        url:'/shop/biao',
        type:'post',
        data:{'_token':token,'obj':obj,'add_id':add_id},
        dataType:'text',
        success:function(mes){
          if(mes){
            // addressnum();
            $('#block').hide();
            $('input').val(''); $('select').val('999999999999');//赋值999999999999的原因是因为在没选择第一个select之前 不能选中下一个select并产生省的数据
            myadd();
          }else{
            $('#aaa').html('请将地址添加完整!');
          }
        }
      });
    });

    $('.address-more').click(function(){ //隐藏多条用户收货地址的方法
      $('div[info="charu1"]:gt(0)').slideToggle();
    }); 

    $('.content').live('mouseover',function(){
      $(this).find('div').find('div').find('label').css({'border':'2px solid #2aad6f','color':'black','background':'white'});
      $(this).find('div').find('div').find('label').find('div').find('a').css('color','#2aad6f');
      $(this).find('div').find('div').find('label').prev('span').find('img').attr('src','/quan.jpg');
    });

    $('.content').live('mouseout',function(){
      if($(this).attr('show')=='zhong'){
        $(this).find('div').find('div').find('label').css({'border':'2px solid #2aad6f','color':'black','background':'white'});
        $(this).find('div').find('div').find('label').find('div').find('a').css('color','#2aad6f');
        $(this).find('div').find('div').find('label').prev('span').find('img').attr('src','/quan.jpg');       
      }else{
        $(this).find('div').find('div').find('label').css({'border':'1px solid #ccc','color':'#ccc','background':'#f7f7f7'});
        $(this).find('div').find('div').find('label').find('div').find('a').css('color','#ccc');
        $(this).find('div').find('div').find('label').prev('span').find('img').attr('src','/quan1.jpg');       
      } 
    });

    $('.content').live('click',function(){
      $('.content').removeAttr('show');
      $('.content').find('div').find('div').find('label').css({'border':'1px solid #ccc','color':'#ccc','background':'#f7f7f7'});
      $('.content').find('div').find('div').find('label').find('div').find('a').css('color','#ccc');
      $('.content').find('div').find('div').find('label').prev('span').find('img').attr('src','/quan1.jpg'); 
      $(this).attr('show','zhong');
      $(this).find('div').find('div').find('label').css({'border':'2px solid #2aad6f','color':'black','background':'white'});
      $(this).find('div').find('div').find('label').find('div').find('a').css('color','#2aad6f');
      $(this).find('div').find('div').find('label').prev('span').find('img').attr('src','/quan.jpg');
      $('#tijiao').attr('address_id',$(this).attr('id')); //把选中的地址id传到订单
      $('#sxs').html('');
      // console.log($('#tijiao').attr('address_id'))  
    });
  

    function myadd(){ //添加完地址后无刷新显示地址 或显示当前用户的所以收货地址
      $.ajax({
        url:'/shop/myadd',
        type:'get',
        dataType:'json',
        success:function(mes){
          // console.log(mes);
           $('div[info="charu1"]').remove();
           var add2 = null;
           $(mes).each(function(i){
              var add1=$('.content:eq(0)').clone().attr({'info':'charu1','style':'display:block','id':$(this).attr('id')});
               add2=add1.find('div').find('div').find('label').find('div').find('div');
               add2.html($(this).attr('name'));
               add2.next('div').html($(this).attr('phone'));
               add2.next('div').next('div').html($(this).attr('email'));
               add2.next('div').next('div').next('div').html(($(this).attr('sheng1'))+($(this).attr('shi1'))+($(this).attr('xian1'))+($(this).attr('jiedao1'))+($(this).attr('xiangxi')));
               $('#charu').append(add1);
               $('div[info="charu1"]:gt(0)').attr('style','display:none');//地址框的样式
               $('div[info="charu1"]').find('div').find('div').find('label').css('border','1px solid #ccc').css('color','#ccc').css('background','#f7f7f7');
               $('div[info="charu1"]').find('div').find('div').find('label').find('div').find('a').css('color','#ccc');
               $('div[info="charu1"]').find('div').find('div').find('label').prev('span').find('img').attr('src','/quan1.jpg');
            });
          }
        });
        
      }

    $('.remove-address').live('click',function(){ //删除添加的地址
      var bq=$(this).parents('div[info="charu1"]'); //根据父辈元素最快获取顶级标签
      $.ajax({
        url:'/shop/del1',
        type:'post',
        data:{'_token':token,'id':bq.attr('id')},
        success:function(mes){
          if(mes=='yes'){
            myadd();
            bq.remove();
          }
        }
      });
    });

    $('.bianji').live('click',function(){ //编辑用户收货地址
      var bq1=$(this).parents('div[info="charu1"]');
      $('#address-create').attr('id1',bq1.attr('id'));
      $.ajax({
        url:'/shop/myadd',
        type:'get',
        data:{'_token':token},
        dataType:'json',
        success:function(mes){
          // console.log($(mes));
          $(mes).each(function(){
            if($(this).attr('id')==bq1.attr('id')){
              $('input[name="name"]').val($(this).attr('name'));
              $('input[name="phone"]').val($(this).attr('phone'));
              $('input[name="address-detail"]').val($(this).attr('xiangxi'));
              $('input[name="email"]').val($(this).attr('email'));
              $('#select1').val($(this).attr('sheng')); //城市联动的id
              meajax($(this).attr('sheng'),$(this).attr('shi'),'select2');
              meajax($(this).attr('shi'),$(this).attr('xian'),'select3');
              meajax($(this).attr('xian'),$(this).attr('jiedao'),'select4');
              $('#block').show();
            }
          })
        }
      });
    });

    $('#tijiao').click(function(){ //提交订单的按钮
      var address_id=$('#tijiao').attr('address_id');//地址id
      var goodsid=$('input[name="spid"]').val();
      var yance=$('input[name="yance"]').val();
      var nu=$('#ggs').html(); //数量
      var tu=$('#tu5').attr('src');
      if(address_id==null){
        $('#sxs').html('请选择地址');
        return false;
      }
      var yftotal=$('#yifu').html();
      $.ajax({
        url:'/dingdan/scorders1',//生成订单
        type:'post',
        data:{'_token':token,'address_id':address_id,'yftotal':yftotal,'goodsid':goodsid,'color':yance,'num':nu,'pic':tu},
        dataType:'text',
        success:function(mes){
          if(mes=='yes'){
            location.href='/dingdan/zhifu';
          }else{
            alert('你已提交完成或没有可以提交的商品');
          }
        }
      });
    });
    // console.log($('.content').length+1);
    function jishu(){ //支付的价格 优惠券邮费合计的方法
      var a= 0; //数量
      var b=0;  //总计
      $('.goods-list-quantity').each(function(){
         a+=parseInt($(this).find('span').text());
         b+=(parseInt($(this).next('div').find('span').text()))*(parseInt($(this).find('span').text()));
      });
      $('#jishu').html(a);
      $('#trade_total_fee').find('font').html(b);
      $('#yifu').html(b+parseInt($('#yf').text())-parseInt($('#yhq').text()));
    }
    jishu();
    function addressnum(){
      $.ajax({
        url:'/dingdan/addressnum',
        type:'post',
        data:{'_token':token},
        dataType:'text',
        success:function(mes){
          if(mes==1 || mes==0){
            $('.address-more').parent().hide();
          }
        }
      });
    }
    
    function myajax(upid){ //城市联动的第一个select的方法
      $.ajax({
        url:'/shop/site',
        type:'post',
        data:{'_token':token,'upid':upid},
        dataType:'json',
        success:function(mes){
          // console.log($(mes));
          $(mes).each(function(){
            // console.log($(this).attr('id'))
            var op=$('<option value="'+$(this).attr('id')+'">'+$(this).attr('name')+'</option>');
            $('#select1').append(op); //将遍历创建的option插入第一个select框
          });
        }
      });
    }
    function meajax(upid,upid1,bb){ //城市联动的第一个select的方法
      $.ajax({
        url:'/shop/site',
        type:'post',
        data:{'_token':token,'upid':upid},
        dataType:'json',
        success:function(mes){
          $(mes).each(function(){
            var op=$('<option value="'+$(this).attr('id')+'">'+$(this).attr('name')+'</option>');
            $('#'+bb).append(op); //将遍历创建的option插入第一个select框
          });
            $('#'+bb).val(upid1);
        }
      });
    }
  </script>
@endsection