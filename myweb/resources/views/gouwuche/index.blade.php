@extends('layout.home')
@section('con')
          <main class='main-content slab-light'>
      <div class='wrapper'>
        <ul class='breadcrumb'>
  <li>
    <a href='http://www.oppo.com/cn/'>
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  购物车
              </li>
      </ul>
        <div class='brick-bottom'>
          <ul class='steps'><li class='one active step-completed'>
    <div class='step-content'>
            <h5 class='step-heading'>购物车</h5>
      <div class='step-gradient'></div>
    </div>
  </li><li class='two  '>
    <div class='step-content palm-right-text'>
            <h5 class='step-heading'>填写订单</h5>
      <div class='step-gradient'></div>
    </div>
  </li><li class='three '>
    <div class='step-content'>
            <h5 class='step-heading'>支付</h5>
      <div class='step-gradient'></div>
    </div>
  </li></ul>
          <div class="row">
            <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
              <ul class="list-unstyled">
                <strong class='error_msg_note'>
                </strong>
              </ul>
            </div>
            </div>
          </div>
          

  <form class='g'>
    <div class='gi one-whole slab-white-border cart-reversion'>
      <ul class='purchase-list-header'>
        <li class='first'>
          <label class="check-box-label check-box-all is-checked" for='checkAll'>
            <input type="checkbox" id="quanxuan1" name="like[]">
            <!-- <span class="icon icon-checkbox"></span> -->
            <span class="space-ml-10">全选</span>
          </label>
        </li>
        <li class='second'>产品</li>
        <li class='third'>数量</li>
        <li class='four'>单价</li>
        <li class='five'>操作</li>
      </ul>
      <div class="brick-shadow purchase-list">
@foreach($list as $v)
    <div info="kong1" class="cart-product cart-product-l cart-product-b5c161c6639cbf6eb3a51469ece3aa05 ">
          <div class="cart-product-choice">
            <label data-id="b5c161c6639cbf6eb3a51469ece3aa05" class="check-box-label check-box-item is-checked">
              <input type="checkbox" class="quanxuan1" name="like[]" info="1">
              <!-- <span class="icon icon-checkbox"></span> -->
            </label>
            <a target="_blank" href="http://www.opposhop.cn/products/397" class="cart-product-image">
              <img src="{{$v['pic']}}">
            </a>
          </div>
          <div class="cart-product-info">
            <div class="cart-product-description">
              <h3 class="heading">{{$v['gname']}}</h3>
              <p>{{$v['desc']}}</p>
                @if(isset($v['zp1']))
              <p>赠品: @foreach($v['zp1'] as $v1) <span>{{$v1['gift']}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> @endforeach </p>
                @endif
            </div>
            <div class="cart-counter-box">
              <input type="hidden" name="id" value="{{$v['id']}}">

              <div class="counter-box">
                  <a data-id="b5c161c6639cbf6eb3a51469ece3aa05" id="jian" class="btn minus">-</a>
                  <input type="hidden" name="store" value="{{$v['store']}}">
                  <input type="text" data-price="1599.00" data-quantity="1" name="num0" value="{{$v['num']}}" readonly="" class="number cart-product-quantity-b5c161c6639cbf6eb3a51469ece3aa05">
                  <a data-id="b5c161c6639cbf6eb3a51469ece3aa05" id="jia" class="btn plus">+</a><span><font size="2px" color="red" id="sss"></font></span>
                  
              </div>
            </div>
            <div class="cart-product-price">
              <span class="normal">{{$v['price']}}元</span>
            </div>
            
            <div data-id="b5c161c6639cbf6eb3a51469ece3aa05" id="del" class="cart-product-delete cart-product-delete-word">删除</div>
            <span data-id="b5c161c6639cbf6eb3a51469ece3aa05" class="cart-product-delete cart-product-delete-icon icon icon-close-circle"></span>
    </div>
    </div>
@endforeach
<div class="cart-fee">
  <ul>
    <li>
      <span class="cart-fee-title">商品数量:</span>
      <span id="count">0</span>
    </li>
    <li>
      <span class="cart-fee-title">总计:</span>
      <span id="price">￥0</span>
    </li>
    <li class="cart-alipay-hb">
      <span class="cart-fee-title"><i class="icon-hb"></i>订单满600可使用花呗分期3/6/12期</span>
    </li>
  </ul>
    </div>
    </div>

    <div id="kong" class='brick-shadow purchase-list' style="display:none">
      <center><h2>购物车空空的，去<a href='/' style='color:#1f8657;'>逛逛</a>吧</h2></center>
    </div>
    <div class="form-actions brick-shadow">
      <div class="form-actions-left">
        <a target="_blank" href="http://www.opposhop.cn" class="link-primary">继续购买&gt;&gt;</a>
      </div>

      <div class="form-actions-right">
        <a id="yd" class="button cart-button" href="">清空购物车</a>
        <a id="shipping_btn" class="button cart-button" href="javascript:;">结算</a>
      </div>
    </div>
  </div>
  </form>

        </div>
        <div class='cart-btn-check'>
          <a class='button cart-button oppo-tj' id='shipping_btn_m' href='/gouwuche/javascript:;' data-tj='store|btn|check|sticky' >结算</a>
        </div>
              </div>
    </main>
      <div id='dialog-error-msg' class='hidden'>
      <div class="mask-common"></div>
      <div class="dialog-common dialog-box-common">
        <div class="dialog-container">
          <a class="dialog-close-common">×</a>
          <div class="dialog-content-common">
                        <div class="field">
              <h4 class='dialog-title-common'>.</h4>
            </div>
                                    <div class="dialog-common-content">
                        </div>
                                    <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                <div class="gi lap-one-whole">
                  <a class='button button-one-whole'>确定</a>
                </div>
              </div>
            </div>
                      </div>
        </div>
      </div>
    </div>
    {{csrf_field()}}
<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
<script type="text/javascript">
    reckon(); //显示购物车数量
    qingkong();
    var token=$("input[name='_token']").val();
    $('#yd').click(function(){ //清空购物车
      var result = confirm("您确定要删除该商品吗");
      if(result==true){
        $.ajax({
          url:'/shop/clear',
          type:'post',
          data:{'_token':token,'username':'admin'},
          dataType:'text',
          success:function(mes){
            if(mes=='yes'){
              $('div[info="kong1"]').remove();
              change();
              reckon();
              qingkong();
            }
          }
        });
      }
      return false;
    });

    $('#del').live('click',function(){ //删除单独一个物品
      var result = confirm("您确定要删除该商品吗");
      if (result == true){
        var id=$(this).prev().prev().find('input').val();//获取当前商品的id
        var del=$(this);
        $.ajax({
          url:'/shop/del',
          type:'post',
          data:{'_token':token,'id':id},
          dataType:'text',
          success:function(mes){
            if(mes=='yes'){
              del.parent().parent().remove();
              change();
              reckon();
            }
          }
        });
      } 
    });

    $('.quanxuan1').live('click',function(){ //每个多选框 
      var num=0;
      var total=0;
      if($(this).attr('info')==1){ //1代表不选中 0代表选中
        $(this).attr('info',0);
      }else{
        $(this).attr('info',1);
      }
       $('input[info="0"]').each(function(){ //计算选中物品的总数
          var a=$(this).parent().parent().next().find('.cart-counter-box').find('div').find('input[name="num0"]').val();//每个选中物品的数量
          var price=$(this).parent().parent().next().find('div').next('div').next('div').find('span').html();//每个物品的单价
         
          // console.log(price);
          total+=parseInt(a)*parseInt(price);
          num+=parseInt(a);
      });
       $('#count').html(num);//将选中的物品的个数写到'商品数量'标签里
       $('#price').html('￥'+total); //将总价写到'总计'里
       getnum(); //设置所有物品都选中后 '全选'变'全不选'的样式
    });

    $('#quanxuan1').click(function(){
      var num1=0;
      var total1=0;
      if($('.space-ml-10').html()=='全选'){
        $('.quanxuan1').attr('checked',true);
        $('.space-ml-10').html('全不选');
        $('.quanxuan1').attr('info',0);
        $('.cart-product-quantity-b5c161c6639cbf6eb3a51469ece3aa05').each(function(){//获取所有选中物品的数量input框
          num1+=parseInt($(this).val());
          var price1=parseInt($(this).parent().parent().next().find('span').html());//相对节点找单件
          total1+=parseInt($(this).val())*price1;
        });
        $('#count').html(num1);
        $('#price').html('￥'+total1);
      }else{
        $('.quanxuan1').attr('checked',false);
        $('.space-ml-10').html('全选');
        $('.quanxuan1').attr('info',1);
        $('#count').html('');
        $('#price').html('');        
      }
    });

    $('#jia').live('click',function(){
      var store=parseInt($(this).prev('input').prev('input').val()); //库存量
      // console.log(store)
      var num3=0;
      var total=0;
      var id=$(this).parent().prev().val();//获取当前商品的id
      var num=parseInt($(this).prev().val())+1; //当前购买数量+1
      if(num>store){
        $('#sss').html('已超出库存量!');
        return false;
      }
      $(this).prev().val(num);
      if($('input[info="0"]').attr('info')==0){ //查看当前物品是否选中 选中的把数量和价格写到'商品数量'和'总计'里
          $('input[info="0"]').each(function(){
            var a=$(this).parent().parent().next().find('.cart-counter-box').find('div').find('input[name="num0"]').val();
            // console.log(a);
            var price=parseInt($(this).parent().parent().next().find('div').find('.normal').html());
            // console.log(price)
            total+=parseInt(a)*parseInt(price);
            num3+=parseInt(a);
          });
        $('#count').html(num3);
        $('#price').html('￥'+total);
      }
      myajax(num,id); //将改变后的数据在数据库更新
      reckon();
    });

    $('#jian').live('click',function(){
      var num3=0;
      var total=0;
      if($(this).next('input').next('input').val()==1){
        return false;
      }
      var id=$(this).parent().prev().val();
      var num=parseInt($(this).next('input').next('input').val())-1; //改变购物车表的数量
      $(this).next('input').next('input').val(num);
      if($('input[info="0"]').attr('info')==0){
          $('input[info="0"]').each(function(){
            var a=$(this).parent().parent().next().find('.cart-counter-box').find('div').find('input[name="num0"]').val();
            var price=$(this).parent().parent().next().find('div').find('.normal').html();
            total+=parseInt(a)*parseInt(price);
            num3+=parseInt(a);
          });
          console.log(num3)
          console.log(total)
        $('#count').html(num3);
        $('#price').html('￥'+total);
      }
      myajax(num,id);
      reckon();
    });

    //填写订单
    $('#shipping_btn').click(function(){
      if($('input[info="0"]').length<=0){
        alert('请选中要购买的商品');
        return;
      }
      var arr=[];
      $('input[info="0"]').each(function(i){
        arr[i]=$(this).parent().parent().next('div').find('div:eq(1)').find('input').val(); //购物车id
      });
      $.ajax({
        url:'/shop/txie',
        type:'post',
        data:{'_token':token,'arr':arr},
        dataType:'text',
        success:function(mes){
          if(mes=='yes'){
            $('.quanxuan1').attr('checked',false);
            $('#quanxuan1').attr('checked',false);
            location.href='/dingdan/address';
          }
        }
      });
    })

    function qingkong(){
      if($('div[info="kong1"]').length>0){ //显示和隐藏购物车有木有商品的样
        $('#kong').hide();
      }else{
        $('#kong').show();
      } 
    }

    function myajax(num,id){ //更新购买数量的方法
      $.ajax({
        url:'/shop/request',
        type:'post',
        data:{'_token':token,'num':num,'id':id},
        dataType:'json',
        success:function(mes){

        }
      });
    }

    function reckon(){  //显示购物车上物品数量的方法
      var num6=0;
        $('.cart-product-quantity-b5c161c6639cbf6eb3a51469ece3aa05').each(function(){ //获取所有选中物品的数量input框
          num6+=parseInt($(this).val());
        }); 
        $('#shopping-count').html(num6);
    }

    function getnum(){ //全选和全不选的改变样式
      if($('.quanxuan1').length==$('input[info="0"]').length){
        $('#quanxuan1').attr('checked',true);
        $('.space-ml-10').html('全不选');
      }else{
        $('#quanxuan1').attr('checked',false);
        $('.space-ml-10').html('全选');       
      }
    }

    function change(){ //删除物品后重新统计数量和总价
      var num4=0;
      var total4=0;
      $('input[info="0"]').each(function(){
        var b=parseInt($(this).parent().parent().next().find('.cart-counter-box').find('div').find('input').val());
        var price=parseInt($(this).parent().parent().next().find('div').find('span').html());
        num4+=b;
        total4+=b*price;
      });
        $('#count').html(num4);
        $('#price').html('￥'+total4);
    }
</script>
@endsection