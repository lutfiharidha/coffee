@extends('layouts.nav')
@section('content')
<main id="main" class="uk-container uk-container-large uk-padding" uk-height-viewport="offset-top: false">
   <div class="uk-grid-match uk-child-width-1@m uk-hidden@m" uk-grid>
      <div>
         <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="ratio: 7:3; autoplay:true; animation: push">
            <ul class="uk-slideshow-items">
               <li>
                  <img src="https://getuikit.com/docs/images/photo.jpg" alt="" uk-cover>
               </li>
               <li>
                  <img src="https://getuikit.com/docs/images/dark.jpg" alt="" uk-cover>
               </li>
               <li>
                  <img src="https://getuikit.com/docs/images/light.jpg" alt="" uk-cover>
               </li>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
         </div>
      </div>
   </div>
   <div class="uk-width-1">
      <div class="uk-visible@m uk-child-width-1-4@m" uk-grid>
         @foreach($lain as $product)
         <div>
            <a href="{{route('product.view',[$product->id,preg_replace('/\+/', '-',urlencode(strtolower($product->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($product->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($product->name)))])}}"><header class="uk-grid-small" uk-grid>
               <div class="uk-width-auto">
                  @foreach(array_slice(explode('|',$product->image), 0, 1) as $ima)
                  <img src="{{url('img/products/'.$ima)}}" class="uk-contr" alt="">
                  @endforeach
               </div>
               <div class="uk-width-expand">
                  <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" >{{$product->name}}</a></h4>
                  <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                     <li>${{$product->price}}</li>
                  </ul>
               </div>
            </header></a>
         </div>
         @endforeach
      </div>
   </div>
   <div class="uk-container uk-container-large">
      <div class="uk-section">
         <div class="uk-container">
            <div  uk-grid>
               <div class="uk-visible@m uk-width-1-5">
                  <div class="uk-card">
                     <div>
                        <ul class="uk-text-left uk-nav-default uk-nav-parent-icon" uk-nav>
                           <li>
                              <div class="uk-margin-bottom">
                              <form class="uk-search uk-search-default uk-width-1">
                                 <span class="uk-search-icon-flip" uk-search-icon></span>
                                 <input id="search" class="uk-search-input" type="search" placeholder="Search...">
                              </form>
                              </div>
                           </li>
                           <li><h3 class="uk-heading-line uk-text-center"><span class="uk-margin-top">Categories</span></h3></li>
                           <li class="uk-parent uk-nav-header">
                              <a href="#">Arabica</a>
                                 <ul class="uk-nav-sub">
                                    @foreach($arabica as $arab)
                                       <li><a href="{{ route('cat', [$arab->id,preg_replace('/\+/', '-',urlencode(strtolower($arab->category))),preg_replace('/\+/', '-',urlencode(strtolower($arab->sub)))]) }}">{{$arab->sub}}</a></li>
                                    @endforeach
                                  </ul>
                           </li>
                           <li class="uk-parent uk-nav-header">
                              <a href="#">Robusta</a>
                                 <ul class="uk-nav-sub">
                                    @foreach($robusta as $robu)
                                       <li><a href="{{ route('cat', [$robu->id,preg_replace('/\+/', '-',urlencode(strtolower($robu->category))),preg_replace('/\+/', '-',urlencode(strtolower($robu->sub)))]) }}">{{$robu->sub}}</a></li>
                                    @endforeach
                                  </ul>
                           </li>
                           <li class="uk-parent uk-nav-header">
                              <a href="#">Others</a>
                                 <ul class="uk-nav-sub">
                                    @foreach($other as $othe)
                                       <li><a href="{{ route('cat', [$othe->id,preg_replace('/\+/', '-',urlencode(strtolower($othe->category))),preg_replace('/\+/', '-',urlencode(strtolower($othe->sub)))]) }}">{{$othe->sub}}</a></li>
                                    @endforeach
                                  </ul>
                           </li>
                           <li>
                              <div class="uk-margin-top uk-dark uk-background-secondary">
                                 <h3 class="uk-heading-line uk-text-center uk-text-white"><span class="uk-margin-top">Our Promise</span></h3>
                                    <div class="uk-text-center uk-text-large uk-light" style="font-family: 'Arvo', serif;">
                                 <p class="uk-padding">GOOD QUALITY</p>
                                 <p class="uk-padding">GOOD PACKING</p>
                                 <p class="uk-padding">FRESH</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class=" uk-width-expand ">
                  <div class="uk-card ">
                     <div class=" uk-hidden@m">
                        <div class="uk-child-width-1-3 uk-grid-small uk-text-center uk-text-small" uk-grid>
                           <div>
                              <div class="uk-card uk-card-default">
                                 <div class="uk-card-media-top">
                                    <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                    <p>Baju</p>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="uk-card uk-card-default">
                                 <div class="uk-card-media-top">
                                    <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                    <p>Baju</p>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="uk-card uk-card-default">
                                 <div class="uk-card-media-top">
                                    <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                    <p>Baju</p>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="uk-card uk-card-default">
                                 <div class="uk-card-media-top">
                                    <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                    <p>Baju</p>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="uk-card uk-card-default">
                                 <div class="uk-card-media-top">
                                    <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                    <p>Baju</p>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <div class="uk-card uk-card-default">
                                 <div class="uk-card-media-top">
                                    <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                    <p>Baju</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="uk-child-width-expand uk-grid-small" uk-grid>
                           <div>
                              <ul uk-accordion="beforeshow: true">
                                 <li>
                                    <a class="uk-accordion-title" href="#">LIHAT SEMUA KATEGORI</a>
                                    <div class="uk-accordion-content">
                                       <div class="uk-child-width-1-3 uk-grid-small uk-text-center uk-text-small" uk-grid>
                                          <div>
                                             <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                   <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                                   <p>Baju</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                   <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                                   <p>Baju</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                   <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                                   <p>Baju</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                   <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                                   <p>Baju</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                   <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                                   <p>Baju</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                   <img src="https://ecs7.tokopedia.net/img/cache/260x200/attachment/2017/2/17/95/95_66f3de21-3af8-4a46-b893-5d49a66e2312.jpg" alt="">
                                                   <p>Baju</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="uk-child-width-1 uk-grid-small " uk-grid>
                        <div>
                           <div class="uk-position-relative uk-visible-toggle ">
                              <ul class="uk-child-width-1-3@m uk-grid">
                                 @if($prod->count())
                                 @foreach($prod as  $bij)
                                 <li>
                                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                                       @foreach(array_slice(explode('|',$bij->image), 0, 1) as $ima)
                                       <img class="uk-cont" src="/img/products/{{$ima}}" alt="">
                                       @endforeach
                                       <p class="uk-text-bold uk-text-center">{{$bij->name}}</p>
                                       <div class="uk-card-body">
                                          <div class="uk-position-top-right"><span class="uk-label uk-label-warning">@if($bij->brand == null)BloKupie
                                             @else
                                             {{$bij->brand}}
                                             @endif</span>
                                          </div>
                                          <div class="uk-position-small uk-position-bottom-right"uk-tooltip="Kede Premium"><i class="fa fa-tag" style="color: gold;"></i></div>
                                       </div>
                                       <div class="uk-padding uk-text-center uk-transition-fade uk-position-cover  uk-overlay uk-text-middle uk-overlay-default">
                                          <p>${{$bij->price}}</p>
                                          <p>{!!str_limit($bij->description,100,' ...')!!}</p>
                                          <a href="{{route('product.view',[$bij->id,preg_replace('/\+/', '-',urlencode(strtolower($bij->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($bij->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($bij->name)))])}}" class="uk-button uk-button-text" >Order Now!</a>
                                       </div>
                                    </div>
                                 </li>
                                 @endforeach
                                 @else
                                 <li><h1 class="uk-margin-large-top uk-position-center" style="font-family: 'Arvo', serif;">NOTHING PRODUCTS</h1></li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript">
$(document).ready(function(){
    $("#search").autocomplete({
        source: "{{ url('demos/autocompleteajax') }}",
            focus: function( event, ui ) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        select: function( event, ui ) {
            window.location.href = ui.item.url;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div class="uk-text-small uk-text-center"><a href="' + item.url + '" >' + item.name + '</a></div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
});
</script>
@endsection