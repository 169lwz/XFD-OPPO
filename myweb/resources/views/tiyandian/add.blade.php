@extends('layout.adminindex')

@section('con')

  <style type="text/css">
    #weizhi{
      width:560px;
      height:424px;
      /*border:1px solid red;*/
      position: absolute;
      margin-left:468px;
      margin-top:68px;
      overflow: hidden;
    }
  .small1{
    width:30%;
  }
  </style>


<div class="mws-panel grid_8">
  <div class="mws-panel-header">
      <span>添加分类</span>
    </div>

    <div class="mws-panel-body no-padding">
      <form class="mws-form">
      {{csrf_field()}}
        <div class="mws-form-inline">
          <div class="mws-form-row">
            <label class="mws-form-label">省级/自治区</label>
            <div class="mws-form-item">
              <select id="select1" class="small1" name="id"></select>
            </div>
          </div>
          <div class="mws-form-row">
            <label class="mws-form-label">城市/地区</label>
            <div class="mws-form-item">
              <select id="select2" class="small1" name="id"></select>
            </div>
          </div>
          <div class="mws-form-row">
            <label class="mws-form-label">门店类型</label>
            <div class="mws-form-item">
              <select id="select3" class="small1" name="id">
                <option value="1">旗舰店</option>
                <option value="1">体验店</option>
              </select>
            </div>
          </div>   
          <div class="mws-form-row">
            <label class="mws-form-label">营业时间</label>
            <div class="mws-form-item">
              <select id="select4" class="small1" name="id">
                <option value="1">9:00--17:00</option>
                <option value="1">12:00--00:00</option>
                <option value="1">10:00--20:00</option>
              </select>              
            </div>
          </div>                                    
          <div class="mws-form-row">
            <label class="mws-form-label">联系电话</label>
            <div class="mws-form-item">
              <input id="phone" type="text" class="small1" name="name">
            </div>
          </div>  
          <div class="mws-form-row">
            <label class="mws-form-label">地理经度</label>
            <div class="mws-form-item">
              <input id="jing_du" type="text" class="small1" name="name" readonly>
            </div>
          </div> 
          <div class="mws-form-row">
            <label class="mws-form-label">地理纬度</label>
            <div class="mws-form-item">
              <input id="wei_du" type="text" class="small1" name="name" readonly>
            </div>
          </div>
          <div class="mws-form-row">
            <label class="mws-form-label">门店名称</label>
            <div class="mws-form-item">
              <input id="mdname" type="text" class="small1" name="name">
            </div>
          </div>                                    
        </div>
        <div class="mws-button-row">
          <button class="btn btn-danger">添加</button>
          <input type="reset" class="btn " value="重置">
        </div>
      </form>
    </div>      
</div>
  <div id="weizhi">
    <link href="/ty1/css/fenye.css" rel="stylesheet" type="text/css">





<!-----------------------------------------地图------------------------------------------------------------------------>

  <script type="text/javascript" src="/ty1/other/api"></script>

  <script type="text/javascript" src="/ty1/other/getscript"></script>

  <script type="text/javascript" src="/ty1/other/getscript(1)"></script>

  <script type="text/javascript" src="/ty1/js/SearchInfoWindow_min.js"></script>

  <link rel="stylesheet" href="/ty1/css/SearchInfoWindow_min.css">





<!-- 头部信息end -->

  <!--引入tou wan-->

<!-----------------------------------------头部结束------------------------------------------------------------------------>

<section class="lx_center1">

  <div class="dt">

      <div id="allmap" style="overflow: hidden; position: relative; z-index: 0; color: rgb(0, 0, 0); text-align: left; background-color: rgb(243, 241, 236);">

    <div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 36px; cursor: url(http://api0.map.bdimg.com/images/openhand.cur) 8 8, default;">

    <div class="BMap_mask" style="position: absolute; left: 0px; top: -36px; z-index: 9; overflow: hidden; -webkit-user-select: none; width: 1903px; height: 500px;"></div>

    <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;">

    <div style="position: absolute; height: 0px; width: auto; left: 0px; top: 0px; z-index: 800;">

    <!-- <div class="BMapLib_SearchInfoWindow" id="BMapLib_SearchInfoWindow0" style="width: 300px; -webkit-user-select: none; bottom: -193px; left: 837px;"> -->

    <div class="BMapLib_bubble_top"><div class="BMapLib_bubble_title" id="BMapLib_bubble_title0">河南疾风文化传播有限公司</div>

    <div class="BMapLib_bubble_tools"><div class="BMapLib_bubble_close" title="关闭" id="BMapLib_bubble_close0"></div>

    <div class="BMapLib_sendToPhone" title="发送到手机" id="BMapLib_sendToPhone0"></div></div></div>

    <div class="BMapLib_bubble_center">

    <div class="BMapLib_bubble_content" id="BMapLib_bubble_content0" style="height: 105px;">

    <div style="margin:0;line-height:20px;padding:2px;line-height:30px;">

    <img src="/ty1/images/LOGO.jpg" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;">

    地址：河南省郑州市二七区航海中路鼎盛时代<br>电话：0371-63362935</div></div>

        <div class="BMapLib_nav" id="BMapLib_nav0">

            <ul class="BMapLib_nav_tab" id="BMapLib_nav_tab0">

            <li class="BMapLib_current BMapLib_first" id="BMapLib_tab_search0" style="display: block; width: 99px;">

            <span class="BMapLib_icon BMapLib_icon_nbs"></span>在附近找</li>

            <li class="" id="BMapLib_tab_tohere0" style="display: block; width: 99px;"><span class="BMapLib_icon BMapLib_icon_tohere"></span>到这里去</li>

            <li class="" id="BMapLib_tab_fromhere0" style="display: block; width: 100px;"><span class="BMapLib_icon BMapLib_icon_fromhere"></span>从这里出发</li>

            </ul>

            <ul class="BMapLib_nav_tab_content">
                    <li id="BMapLib_searchBox0" style="display: block;">
                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="padding-left:8px;">
                                        <input id="BMapLib_search_text0" class="BMapLib_search_text" type="text" maxlength="100" autocomplete="off">
                                    </td>
                                    <td width="55" style="padding-left:7px;">
                                        <input id="BMapLib_search_nb_btn0" type="submit" value="搜索" class="iw_bt">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li id="BMapLib_transBox0" style="display:none">
                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="30" style="padding-left:8px;">
                                        <div id="BMapLib_stationText0">起点</div>
                                    </td>
                                    <td>
                                        <input id="BMapLib_trans_text0" class="BMapLib_trans_text" type="text" maxlength="100" autocomplete="off">
                                    </td>
                                    <td width="106" style="padding-left:7px;">
                                        <input id="BMapLib_search_bus_btn0" type="button" value="公交" class="iw_bt" style="margin-right:5px;">
                                        <input id="BMapLib_search_drive_btn0" type="button" class="iw_bt" value="驾车">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
        <div class="BMapLib_bubble_bottom">
            
        </div>
            <img src="/ty1/images/iw_tail.png" width="58" height="31" alt="" class="BMapLib_trans" id="BMapLib_trans0" style="left: 120px; top: 218px;">
        </div>
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;">
        <span class="BMap_Marker BMap_noprint" unselectable="on" "="" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 19px; height: 25px; left: 950px; top: 225px; z-index: -6945250; background: url(http://api0.map.bdimg.com/images/blank.gif);" title="">
        </span>
        <span class="BMap_Marker BMap_noprint" unselectable="on" "="" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 18px; height: 18px; left: 575px; top: 106px; z-index: 19000000; -webkit-user-select: none; display: none; background: url(http://api0.map.bdimg.com/images/blank.gif);" title="">
            
        </span>
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;">
            
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;">
        <label class="BMapLabel" unselectable="on" style="position: absolute; display: none; cursor: inherit; border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: arial, sans-serif; z-index: -20000; color: rgb(190, 190, 190); background-color: rgb(190, 190, 190);">
        shadow
        </label>
        <label class="BMapLabel" unselectable="on" style="position: absolute; display: none; cursor: inherit; border: 1px solid rgb(140, 140, 140); padding: 1px; white-space: nowrap; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: arial, sans-serif; z-index: 80; -webkit-user-select: none; color: rgb(77, 77, 77); background-color: rgb(255, 255, 225);">
        点击可查看详情
        </label>
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 400;">
        <span class="BMap_Marker" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; width: 0px; height: 0px; left: 950px; top: 225px; z-index: -6945250;">
        <div style="position: absolute; margin: 0px; padding: 0px; width: 19px; height: 25px; overflow: hidden;">
        <img src="/ty1/images/marker_red_sprite.png" style="display: block; border:none;margin-left:0px; margin-top:0px; "></div></span>
        <span class="BMap_Marker" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; width: 0px; height: 0px; left: 575px; top: 106px; z-index: 19000000; display: none;">
        <div style="position: absolute; margin: 0px; padding: 0px; width: 18px; height: 18px; overflow: hidden;">
        <img src="/ty1/images/spotmkrs.png" style="display: block; border:none;margin-left:-232px; margin-top:-208px; ">
        </div>
        </span>
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 300;">
        <span unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; width: 20px; height: 11px; left: 954px; top: 239px;">
        <div style="position: absolute; margin: 0px; padding: 0px; width: 20px; height: 11px; overflow: hidden;">
        <img src="/ty1/images/marker_red_sprite.png" style="display: block; border:none;margin-left:-19px; margin-top:-13px; ">
        </div>
        </span>
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;">
            
        </div>
        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;">
            
        </div>
        </div>
        <div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;">
        <div style="position: absolute; overflow: visible; z-index: -100; left: 951px; top: 214px; display: block; transform: translate3d(0px, 0px, 0px);">
        <img src="/ty1/other/tile" style="position: absolute; border: none; width: 256px; height: 256px; left: -116px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(1)" style="position: absolute; border: none; width: 256px; height: 256px; left: 140px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(2)" style="position: absolute; border: none; width: 256px; height: 256px; left: -372px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(3)" style="position: absolute; border: none; width: 256px; height: 256px; left: -116px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(4)" style="position: absolute; border: none; width: 256px; height: 256px; left: -116px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(5)" style="position: absolute; border: none; width: 256px; height: 256px; left: 396px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(6)" style="position: absolute; border: none; width: 256px; height: 256px; left: -628px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(7)" style="position: absolute; border: none; width: 256px; height: 256px; left: -372px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(8)" style="position: absolute; border: none; width: 256px; height: 256px; left: 140px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(9)" style="position: absolute; border: none; width: 256px; height: 256px; left: 140px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(10)" style="position: absolute; border: none; width: 256px; height: 256px; left: -372px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(11)" style="position: absolute; border: none; width: 256px; height: 256px; left: -884px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(12)" style="position: absolute; border: none; width: 256px; height: 256px; left: 652px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(13)" style="position: absolute; border: none; width: 256px; height: 256px; left: -628px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(14)" style="position: absolute; border: none; width: 256px; height: 256px; left: 396px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(15)" style="position: absolute; border: none; width: 256px; height: 256px; left: -628px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(16)" style="position: absolute; border: none; width: 256px; height: 256px; left: 396px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(17)" style="position: absolute; border: none; width: 256px; height: 256px; left: 908px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(18)" style="position: absolute; border: none; width: 256px; height: 256px; left: -1140px; top: -211px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(19)" style="position: absolute; border: none; width: 256px; height: 256px; left: -884px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(20)" style="position: absolute; border: none; width: 256px; height: 256px; left: 652px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(21)" style="position: absolute; border: none; width: 256px; height: 256px; left: -884px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(22)" style="position: absolute; border: none; width: 256px; height: 256px; left: 652px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(23)" style="position: absolute; border: none; width: 256px; height: 256px; left: -1140px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(24)" style="position: absolute; border: none; width: 256px; height: 256px; left: 908px; top: 45px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(25)" style="position: absolute; border: none; width: 256px; height: 256px; left: -1140px; top: -467px; max-width: none; opacity: 1;">
        <img src="/ty1/other/tile(26)" style="position: absolute; border: none; width: 256px; height: 256px; left: 908px; top: -467px; max-width: none; opacity: 1;">
        </div>
        </div>
        <div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 2; display: none;">
        <div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 0; display: none;">
            
        </div>
        </div>
        <div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 3;">
            
        </div>
        </div>
        <div class="pano_close" title="退出全景" style="z-index: 1201; display: none;"></div>
        <a class="pano_pc_indoor_exit" title="退出室内景" style="z-index: 1201; display: none;">
        <span style="float:right;margin-right:12px;">出口</span>
        </a>
        <div class=" anchorBL" style="height: 32px; position: absolute; z-index: 30; bottom: 0px; right: auto; top: auto; left: 1px;">
        <a title="到百度地图查看此区域" target="_blank" href="http://map.baidu.com/?sr=1" style="outline: none;">
        <img style="border:none;width:77px;height:32px" src="/ty1/images/copyright_logo.png">
        </a>
        </div>
        <div id="zoomer" style="position:absolute;z-index:0;top:0px;left:0px;overflow:hidden;visibility:hidden;cursor:url(http://api0.map.bdimg.com/images/openhand.cur) 8 8,default">
        <div class="BMap_zoomer" style="top:0;left:0;">
            
        </div>
        <div class="BMap_zoomer" style="top:0;right:0;">
            
        </div>
        <div class="BMap_zoomer" style="bottom:0;left:0;">
            
        </div>
        <div class="BMap_zoomer" style="bottom:0;right:0;">
            
        </div>
        </div>
        
        </div>
        
                <script type="text/javascript">

            // 百度地图API功能   

            var map = new BMap.Map('allmap');

            map.addEventListener("click",function(e){
                var jing_du_value = e.point.lng ;
                var wei_du_value =  e.point.lat;
                // alert(e.point.lng + "," + e.point.lat);
                var jing_du = document.getElementById("jing_du");
                var wei_du = document.getElementById("wei_du");
                jing_du.value= jing_du_value;
                wei_du.value= wei_du_value;
            });

            var poi = new BMap.Point(116.406881,39.146333);


            map.centerAndZoom(poi, 16);

            map.enableScrollWheelZoom();

        
            // 检索窗口的模版  里面有字
            var content = '<div style="margin:0;line-height:20px;padding:2px;line-height:30px;">' +

                            '<img src="images/LOGO.jpg" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +

                            '地址：河南省郑州市二七区航海中路鼎盛时代<br/>电话：0371-63362935' +

                          '</div>';

        

            //创建检索信息窗口对象 

            var searchInfoWindow = null;

            searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {

                    title  : "",      //标题

                    width  : 290,             //宽度

                    height : 105,              //高度

                    panel  : "panel",         //检索结果面板

                    enableAutoPan : true,     //自动平移

                    searchTypes   :[

                        BMAPLIB_TAB_SEARCH,   //周边检索

                        BMAPLIB_TAB_TO_HERE,  //到这里去

                        BMAPLIB_TAB_FROM_HERE //从这里出发

                    ]

                });

            var marker = new BMap.Marker(poi); //创建marker对象  创建小红点

            marker.enableDragging(); //marker可拖拽

            marker.addEventListener("click", function(e){

                searchInfoWindow.open(marker);

            })

            map.addOverlay(marker); //在地图中添加marker  显示小红点

      // window.onload = function() { searchInfoWindow.open(marker); };//页面加载时弹框  调用创建的检索信息窗口

      

      var myStyleJson=[{

             "featureType": "land",

             "elementType": "geometry.fill",

       }];

        

      map.setMapStyle({styleJson: myStyleJson });    

        </script>
    </div>
    </div>

</section>
  <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
  <script type="text/javascript">
  myajax(0,$('#select1'));
  myajax(1,$('#select2'));
    function myajax(upid,bq){
      $.ajax({
        url:'/ty/select',
        type:'get',
        data:{'upid':upid},
        dataType:'json',
        success:function(mes){
          $(mes).each(function(){
            var op=$('<option value="'+$(this).attr('id')+'">'+$(this).attr('name')+'</option>');
            bq.append(op);
          })
        }
      });
    }

    $('#select1').change(function(){
      var upid=$(this).val();
      $('#select2').find('option').remove();
      myajax(upid,$('#select2'));
    });

    $('button').click(function(){
      var sheng=$('#select1 option:selected').text();
      var shi =$('#select2 option:selected').text();
      var type=$('#select3 option:selected').text();
      var jobtime=$('#select4 option:selected').text();
      var phone =$('#phone').val();
      var jing =$('#jing_du').val();
      var wei =$('#wei_du').val();
      var name =$('#mdname').val();
      $.ajax({
        url:'/ty/ttt',
        type:'get',
        data:{'sheng':sheng,'shi':shi,'type':type,'jobtime':jobtime,'phone':phone,'jing':jing,'wei':wei,'name':name},
        dataType:'text',
        success:function(mes){
          if(mes=='yes'){
            alert('添加成功');
          }
        }
      });
      return false;
    });

  </script>

@endsection