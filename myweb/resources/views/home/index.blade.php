@extends('layout.home')
@section('con')
<main class="main-content">

    <section class='full-carousel slick-dot-circle'>
		@foreach($lun as $k=>$v)
	      	<div class='hero slick-slide'>
		  		<div class='hero-image center'>
		     		<!-- <a  href='http://hd.oppo.com/act/2017/0103/index.html' target='_blank' title=''> -->   <!--跳转到详情-->	     		
					    <picture>
  					      <source media='(min-width: 990px)' srcset='{{$v['pic']}}' />
  					      <img alt='' title='' src='' srcset='{{$v['pic']}}'>				    
					    </picture>
		    		</a>
		  		</div>
			</div>
		@endforeach
    </section></br>


    <section class="brick-feature">
      <div class="g g-wrapper-s">
         @foreach($ggao as $kk=>$vv)
           <div class="gi lap-one-third">
              <div class='feature-product'>
                <!-- <a href='http://www.opposhop.cn/products/405.html' target='_blank'> -->
                  <img alt='{{$vv['desc']}}' title="{{$vv['desc']}}" class='feature-product-image' src='{{$vv['pic']}}'>
                    <div class='feature-product-content'>
                      <h2 class='feature-product-heading'></h2>
                      <p class='feature-product-description'>
                        <strong></strong>
                      </p>
                  </div>
                <!-- </a> -->
              </div>
          </div>
        @endforeach

      </div>
    </section>
</main>
@endsection

