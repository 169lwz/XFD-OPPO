@extends('layout.home')
@section('con') 
    <main class='main-content slab-white'>
      <div class='full-carousel slick-dot-circle'>
        <div class='hero slick-slide'>
          <div class='hero-image center'>
            <a  href='http://www.opposhop.cn/products/406.html' target='_blank' title=''>
              <picture>    
                <source media='(min-width: 990px)' srcset='http://static.oppo.com/archives/201701/201701120601405877547ca34b1.jpg' />
                <source media='(min-width: 750px)' srcset='http://static.oppo.com/archives/201701/20170112060144587754804ee3f.jpg' />
                <source media='(min-width: 300px)' srcset='images/2017011206014758775483c28ef.jpg' />
                <img alt='' title='' src='/qiantai/images/2017011206014758775483c28ef.jpg'  srcset='http://static.oppo.com/archives/201701/201701120601405877547ca34b1.jpg'>
              </picture>
            </a>
          </div>
        </div>
      </div>
   
  
      <section class='brick-m'>
               
        <div class='wrapper'>
        <div class='grid-special equalize top-bar'>
            
             @foreach($list as $val)
              <div class='box '>
                <a target='_blank' href='http://www.lamp169.com/home/detail/indexq/{{$val['id']}}/{{$val['color']}}' title="">
                  <div class='box-photo'>
                      <img alt='' title="{{$val['con']}}" src='{{$val['pic7']}}'>
                  </div>
                  <h2 class='box-heading'>
                      <a target='_blank' href='http://www.lamp169.com/home/detail/indexq/{{$val['id']}}/{{$val['color']}}' title="{{$val['con']}}">{{$val['con']}}</a>
                  </h2>
                  <div class='box-details'>
                      <p class='box-price'>
                          <span class='normal'>&nbsp;</span>
                          <strong>￥{{$val['price']}}</strong>
                      </p>
                  </div>
                  <i class="ribbon  ribbon-new "></i>  
                </a>
              </div>
             @endforeach
        </div>
        </div> 
      
      </section>
       
    

     
      <section class='brick-s grid-one store-portable-hidden'>
          <div class="wrapper">
            <img src="images/services.png" alt="">
          </div>
      </section>
    </main>
@endsection