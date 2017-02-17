@extends('layout.home')
@section('con')
<main class='main-content slab-light'>
    <div class="slab-white">
        <div class='wrapper'>
            <ul class='breadcrumb'>
                <li>
                    <a href='/home'> 首页<span>/</span></a>
                </li>
                <li>手机列表</li>
            </ul>
        </div>
    </div>
    <div class="selectors-wrapper slab-white">
        <div class="wrapper">
            <div class="category-selectors">
                <div class="s-module s-category-phone" id="type-category">
                    <div class="g g-wrapper-s">
                        <div class="gi one-half lap-one-sixth ">
                            <a href="javascript:;" info="phone"><img src="/qiantai/images/selector-icon-all.jpg" alt="手机"></a>
                        </div>
                        <div class="gi one-half lap-one-sixth ">
                            <a href="javascript:;" info="phone"><img src="/qiantai/images/selector-icon-r.jpg" alt="R系列"></a>
                        </div>
                        <div class="gi one-half lap-one-sixth ">
                            <a href="javascript:;" info="phone"><img src="/qiantai/images/selector-icon-a.jpg" alt="A系列"></a>
                        </div>
                    </div>
            
                  	<div class="s-module">
	                    <div class="s-label">价格：</div>
	                    <div class="s-attributes">
	                        <ul class="clearfix" id="type-price">
	                            <li class="active">
	                              <a href="javascript:;">全部</a>
	                            </li>	                         
	                            <li>
	                                <a href="javascript:;">&yen;1000-&yen;1999</a>
	                            </li>
	                            <li>
	                                <a href="javascript:;">&yen;2000-&yen;2999</a>
	                            </li>
	                            <li>
	                                <a href="javascript:;">&yen;3000以上</a>
	                            </li>
	                        </ul>
	                    </div>
                  	</div>
	                <div class="s-module">
	                    <div class="s-label">屏幕尺寸：</div>
	                    <div class="s-attributes">
	                        <ul class="clearfix" id="type-size">
	                          <li class="active" >
	                            <a href="javascript:;">全部</a>
	                          </li>
	                          <li>
	                             <a href="javascript:;">5.0-5.5</a>
	                          </li>
	                           <li>
	                             <a href="javascript:;">6.0</a>
	                          </li>                               
	                        </ul>
	                    </div>
	                </div>
    			</div>
    		</div>
    	</div>
    </div>	
    <div class='wrapper'>
	    <div class="col-main one-whole"> 
	    <div class="category-filters clearfix">
    	<div class="sort-filter"></div>
		</div>           
		    <div class="category-products">
			    <div class="products-grid grid-box slab-white equalize">
			        <div class='box ' style="display:none" info="goodsshow" dd='yincang'>
			              <a target='_blank' href='' title="">
			              <div class='box-photo' >
			                  <img alt='' title="" src='' info="goodsphoto">
			              </div>
			              <h2 class='box-heading'>
			                  <span info="goodscon"></span>
			              </h2>
			              <div class='box-details'>
			                  <p class='box-price'><span class='normal'>&nbsp;</span>
			                    <strong info="goodsprice"></strong>
			                  </p>
			              </div>
			            </a>
			        </div>
			    </div>
		    </div>
		    <div class='brick-s'></div>
	    </div> 
    </div>
</main>

		<script type="text/javascript" src="/myhome_files/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
		// $('a[info="phone"]').click(function(){
		// 	$('a[info="phone"]').parent().attr('class','gi one-half lap-one-sixth');
		// 	$(this).parent().attr('class','gi one-half lap-one-sixth active');

		// 	var name = $(this).find('img').attr('alt');
		// 	// $(window).keydown()
		// 	// $.ajax({
		// 	// 	url:'/spss/select/phoneselect',
		// 	// 	data:{'tname':name},
		// 	// 	type:'get',
		// 	// 	dataType:'json',
		// 	// 	success:function(mes){
		// 	// 		console.log(mes);
		// 	// 		$(mes).each(function(){
		// 	// 			var path = '/home/detail/indexq/'+$(this).attr('id')+'/'+$(this).attr('color');
		// 	// 			newdiv.find('a').attr('href',path);
		// 	// 			newdiv.find('img[info="goodsphoto"]').attr('src',$(this).attr('pic7'));
		// 	// 			newdiv.find('span[info="goodscon"]').html($(this).attr('con'));
		// 	// 			newdiv.find('strong[info="goodsprice"]').html('￥'+$(this).attr('price'));
		// 	// 			newdiv.css('display','block').css('float','left');
		// 	// 			$('div[info="goodsshow"]:eq(0)').css('display','none');
		// 	// 			$('div[info="goodsshow"]').parent().append(newdiv);
		// 	// 			$('')
		// 	// 		});
		// 		}
		// 	});
		// })
		  
		</script>
@endsection