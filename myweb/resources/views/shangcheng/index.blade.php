@extends('layout.home')
@section('con') 
    <main class='main-content slab-white'>
      <div class='full-carousel slick-dot-circle'>
        <div class='hero slick-slide'>
          <div class='hero-image center'>
            <!-- <a  href='http://www.opposhop.cn/products/406.html' target='_blank' title=''> -->
            <img src="/lunbo/14869557372020.jpg" alt="">
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
   <span></span>

      @foreach($list as $vv)
      @if(isset($vv['good']))
      <span class="normal" style="margin-left:50px"><b>{{$vv['tname']}}</b></span>
      <section class='brick-m'>             
        <div class='wrapper'>
            <div class='grid-special equalize top-bar'>
                   @foreach($vv['good'] as $val)  
                  <div class='box'>
                          <a target='_blank' href='/home/detail/indexq/{{$val['spid']}}/{{$val['color']}}' title="">
                      <div class='box-photo'>
                          <img alt='' title="{{$val['con']}}" src='{{$val['pic7']}}'>
                      </div>
                      <h2 class='box-heading'>
                          <a target='_blank' href='/home/detail/indexq/{{$val['spid']}}/{{$val['color']}}' title="{{$val['con']}}">{{$val['con']}}</a>
                      </h2>
                      <div class='box-details'>
                          <p class='box-price'>
                              <span class='normal'>&nbsp;</span>
                              <strong>￥{{$val['price']}}</strong>
                          </p>
                      </div>
                      @if($val['color'] == '红色' || $val['color'] == '黑色')
                        <i class="ribbon  ribbon-cheap "></i>
                      @elseif($val['price'] == '1599')
                        <i class="ribbon  ribbon-new "></i>
                      @endif  
                    </a>
                  </div>
                  @endforeach                
            </div>
        </div> 
      </section>
      @endif
      @endforeach
    

     
      <section class='brick-s grid-one store-portable-hidden'>
          <div class="wrapper">
            <img src="/qiantai/images/201701120501255877534135d1f.jpg" alt="">
          </div>
      </section>
    </main>
@endsection