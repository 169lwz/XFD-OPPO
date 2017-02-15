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
  配送地址
  </li>
  </ul>
  <div class='myOppo-menu'>
    <h1 class='h-gamma'>配送地址</h1>
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
    <a href='/home/myhome'>账户信息</a>
    </li>
    </ul>
  </div>
<div class="brick-shadow">
    <div class="radio-title" id="charu">
      <strong>手机发货默认顺丰快递，如收货地址顺丰快递不能送达，我们会更改为EMS快递为您配送。</strong>
    <div style="display:block" class="content" info="charu1" id="110">
      <div class="address-form-field">
        <div class="field radio-item dark xl">
          <span class="radio mozilla mozilla45 not_msie custom-form_radio1284411 checked_radio">
            <img alt="" src="/quan1.jpg">
          </span>
          <label for="radio1284411" style="border: 1px solid rgb(204, 204, 204); color: rgb(204, 204, 204); background: rgb(247, 247, 247) none repeat scroll 0% 0%;">
            <div class="g address-form-content">
              <div class="gi desk-one-fifth one-whole">邹京亮</div>
              <div class="gi desk-one-fifth one-whole">13904210121</div>
              <div class="gi desk-one-fifth one-whole">8949819@qq.com</div>
              <div class="gi desk-two-fifths one-whole">北京市西城区展览路街道配送区域和平路</div>
            </div>
            <div class="links">
              <a href="javascript:;" class="bianji" style="color: rgb(204, 204, 204);">编辑</a>
              <a href="javascript:;" class="remove-address" data-id="1284411" style="color: rgb(204, 204, 204);">删除</a>
            </div>
          </label>
        </div>
      </div>
    </div></div>


    <div style="display:none" class="content">
      <div class="address-form-field">
        <div class="field radio-item dark xl">
          <span class="radio mozilla mozilla45 not_msie custom-form_radio1284411 checked_radio">
            <img alt="" src="/quan.jpg">
          </span>
          <label for="radio1284411">
            <div class="g address-form-content">
              <div class="gi desk-one-fifth one-whole"></div>
              <div class="gi desk-one-fifth one-whole"></div>
              <div class="gi desk-one-fifth one-whole"></div>
              <div class="gi desk-two-fifths one-whole"></div>
            </div>
            <div class="links">
              <a href="javascript:;" class="bianji">编辑</a>
              <a href="javascript:;" class="remove-address" data-id="1284411">删除</a>
            </div>
          </label>
        </div>
      </div>
    </div>

  <div class="field center-text">
    <a class="address-more"><span>查看更多地址<span><br><img alt="" src="/jian.jpg"></span></span></a>
  </div>

    

<br>
        <a href="javascript:;" id="address_new" class="button-light field">添加新地址</a>
        <div style="" class="js-content address-form-new" id="block">
          <div class="g" id="address-create" style="display:none" >
            <div class="gi field lap-one-whole desk-one-quarter">
              <label>*收货人姓名</label>
              <input type="text" name="name">
            </div>
            <div class="g">
              <div class="gi field lap-one-whole desk-one-quarter">
                <label>*手机号码</label>
                <input type="text" name="phone"><span><font size="2px" color="red" id="phone"></font></span>
              </div>
            </div>
            <div class="g field">
              <label>*收货地址</label>
              <div id="g" class="">
                <div class="gi basic-input one-whole desk-one-fifth">
                  <div class="gg">
                    请选择
                  </div>
                  <span class="icon icon-grey-arrow-down"></span>
                    <select style="height:63px" id="select1" ><option value="999999999999">省份/自治区</option><option value="1">北京市</option><option value="2">天津市</option><option value="3">河北省</option><option value="4">山西省</option><option value="5">内蒙古自治区</option><option value="6">辽宁省</option><option value="7">吉林省</option><option value="8">黑龙江省</option><option value="9">上海市</option><option value="10">江苏省</option><option value="11">浙江省</option><option value="12">安徽省</option><option value="13">福建省</option><option value="14">江西省</option><option value="15">山东省</option><option value="16">河南省</option><option value="17">湖北省</option><option value="18">湖南省</option><option value="19">广东省</option><option value="20">广西壮族自治区</option><option value="21">海南省</option><option value="22">重庆市</option><option value="23">四川省</option><option value="24">贵州省</option><option value="25">云南省</option><option value="26">西藏自治区</option><option value="27">陕西省</option><option value="28">甘肃省</option><option value="29">青海省</option><option value="30">宁夏回族自治区</option><option value="31">新疆维吾尔自治区</option><option value="32">台湾省</option><option value="33">香港特别行政区</option><option value="34">澳门特别行政区</option><option value="35">海外</option><option value="36">其他</option></select>
                </div>

                <div class="gi basic-input one-whole desk-one-fifth">
                  <div class="gg">
                    请选择
                  </div>
                  <span class="icon icon-grey-arrow-down"></span>
                  <select name="city_id" style="height:63px" id="select2" ><option value="999999999999">城市/地区</option></select>
                </div>
                <div class="gi basic-input one-whole desk-one-fifth">
                  <div class="gg">
                    请选择
                  </div>              
                  <span class="icon icon-grey-arrow-down"></span>
                  <select name="district_id" style="height:63px" id="select3" ><option value="999999999999">区/县</option></select>
                </div>
                <div class="gi basic-input one-whole desk-one-fifth">
                  <div class="gg">
                    请选择
                  </div>              
                  <span class="icon icon-grey-arrow-down"></span>
                  <select name="town_id" style="height:63px" id="select4" ><option value="999999999999">配送区域</option></select>
                </div>
              </div>
              <span><font size="2px" color="red" id="sss"></font></span>
            <div class="g">
              <div class="gi desk-two-thirds one-whole">
                <input type="text" placeholder="详细街道地址" value="" name="address-detail" class="address-detail">
              </div>
            </div>
          </div>

            <div class="g">
              <div class="gi field lap-one-whole desk-one-quarter">
                <label>联系邮箱</label>
                <input type="text" name="email"><span><font size="2px" color="red" id="email"></font></span>
              </div>
            </div>
            <div class="form-actions">
              <div class="pull-left">
                <a id="submit" class="button-light pull-left address-store">保存</a>
                <a id="reset" class="button-light pull-left address-new-cancel">取消</a>
                <span><font size="2px" color="red" id="aaa"></font></span>
              </div>
            </div>
          </div>
        </div>
      </div>


    {{csrf_field()}}
  <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
  <script type="text/javascript">
    var token=$('input[name="_token"]').val();
    myajax(0); //显示城市联动 第一个select;
    myadd();//显示收货地址/
    
    addressnum(); //显示'查看更多地址'
  
    $('#address_new').click(function(){
      $('#address-create').css('display','block');
      // $('#block').
    });

    $('#reset').click(function(){
      $('#address-create').css('display','none');
      $('#submit').parents('#address-create').removeAttr('id1');
      $('input').val(''); $('select').val('999999999999');
      $('#phone').html('');
      $('#email').html('');
      $('#sss').html('');
    });

    $('select').live('change',function(){
      var d=$(this).parent().next().find('select');
      console.log(d);
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
    // console.log($('#submit').parents('#address-create'))
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
            $('#address-create').css('display','none');
            $('input').val(''); $('select').val('999999999999');//赋值999999999999的原因是因为在没选择第一个select之前 不能选中下一个select并产生省的数据
            myadd();
          }else{
            $('#aaa').html('请将地址添加完整!');
          }
        }
      });
    });



    $('.address-more').click(function(){ //隐藏多条用户收货地址的方法
      $('div[info="charu1"]:gt(1)').slideToggle();
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
      // console.log($('#tijiao').attr('address_id'))  
    });
  

    function myadd(){ //添加完地址后无刷新显示地址 或显示当前用户的所以收货地址
      $.ajax({
        url:'/shop/myadd',
        type:'get',
        dataType:'json',
        async:false,
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
               $('div[info="charu1"]:gt(1)').attr('style','display:none');//地址框的样式
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
              $('#address-create').css('display','block');
            }
          })
        }
      });
    });



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
          $(mes).each(function(){
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
