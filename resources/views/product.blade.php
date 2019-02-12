@extends('layouts.nav')

@section('content')
<style type="text/css"> 
ul.share-buttons{
}

ul.share-buttons li{
  display: inline;
}

ul.share-buttons .sr-only{
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}

ul.share-buttons img{
}
 
</style>
  <main class="uk-container uk-container-medium uk-padding">

<dt>   <ul class="uk-margin-right share-buttons">Bagikan :
  <li><a class="uk-icon-button"  href="https://www.facebook.com/sharer/sharer.php?u={{route('product.view',[$prod->id,preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($prod->name)))])}}&quote=Beli {{$prod->name}} hanya di BloKupie.com" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" uk-icon="icon:facebook"/></a></li>
  <li><a class="uk-icon-button"  href="https://twitter.com/intent/tweet?source={{route('product.view',[$prod->id,preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($prod->name)))])}}}&text=Beli {{$prod->name}} hanya di BloKupie.com%20" target="_blank" title="Tweet"><img alt="Tweet"  uk-icon="icon:twitter"/></a></li>
  <li><a class="uk-icon-button"  href="https://plus.google.com/share?url={{route('product.view',[$prod->id,preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($prod->name)))])}}" target="_blank" title="Share on Google+"><img alt="Share on Google+"  uk-icon="icon:google-plus"/></a></li>
  <li><a class="uk-icon-button"  href="http://pinterest.com/pin/create/button/?url={{route('product.view',[$prod->id,preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($prod->name)))])}}&description=Beli {{$prod->name}} hanya di BloKupie.com" target="_blank" title="Pin it"><img alt="Pin it" uk-icon="icon:pinterest"/></a></li>
</ul>
</dt> 
<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        <div class="uk-text-center uk-card uk-margin-bottom">
<div class="uk-position-relative uk-visible-toggle uk-light uk-height-medium" uk-slider="center: true">

    <ul class="uk-slider-items uk-grid">
        @foreach(explode('|',$prod->image) as $ima)
        <li class="uk-width-1">
            <div class="uk-panel">
               <img class="uk-prod" src="/img/products/{{$ima}}" alt="">
            </div>
        </li>
     @endforeach
    </ul>
<a class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-large" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-large" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
        </div>
    </div>
    <div>
<div class="uk-panel">
    <dl class="uk-description-list uk-description-list-divider">
    <p class="uk-text-uppercase uk-h4">{{$prod->name}}</p>
    <span class="uk-text-large">$ {{$prod->price}}</span>
    <dt>   </dt>

    <dd class="uk-child-width-1-2 uk-remove-margin" uk-grid>
            <b>Pengiriman Dari <br> Minimal Beli <br>Berat<br>Stock <br>Brand </b>
            <span>Lhokseumawe<br>1<br>{{$prod->weight}} gram<br>{{$prod->stock}}<br>{{$prod->brand}}</span>
</dd>
<dt class="uk-margin-bottom">Deskripsi Product</dt>
    <dd>
    	{!!$prod->description!!}
</dd>
</dl>
</div>
</div>
<div class="uk-panel">
    <dl class="uk-description-list uk-description-list-divider">   
             <dd class="uk-padding">@guest
    <a href="{{ route('login') }}"><button class="uk-width-1 uk-button uk-button-secondary">Login</button></a>
    @else
    <form class="" action="{{route('step1' ,[$prod->id,preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($prod->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($prod->name)))])}}" uk-grid>
      <div>
      <input class="uk-input uk-form-width-xsmall" name="stock" value="1" max="{{$prod->stock}}" min="1" type="number" required>
      </div>
      <div>
      <input class="uk-button uk-button-secondary" type="submit" name="submit" value="Checkout Now">
      </div>
    </form>
    @endguest</dd>
       <dd class="uk-child-width-1-2 uk-remove-margin" uk-grid>
            <b>Checkout With</b>
            <span><a href="https://www.tokopedia.com/blokupie/{{$prod->tokopedia}}" target="_blank"><img class="uk-margin-small-bottom" src="{{asset('img/tokoped.png')}}"></a>
            <a href="https://www.bukalapak.com/{{$prod->bukalapak}}" target="_blank"><img class="uk-margin-small-bottom" src="{{asset('img/bl.png')}}"></a>
            <a href="https://shopee.co.id/{{$prod->shopee}}" target="_blank"><img class="uk-margin-bottom" src="{{asset('img/shopee.png')}}"></a>
        </span>
      </dd>

</dl>
</div>
</div>
<h4 class="uk-heading-line"><span>Barang Lainnya</span></h4>
<div class="uk-child-width-1-5@m uk-margin-bottom" uk-grid>
    @foreach($prodc as $prodt)
    <div>
        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
            @foreach(array_slice(explode('|',$prodt->image), 0, 1) as $ima)
                <img class="uk-contr" src="/img/products/{{$ima}}" alt="">
            @endforeach
            <p class="uk-text-bold uk-text-center">{{$prodt->name}}</p>
            <div class="uk-card-body">
                <div class="uk-position-top-right">
                    <span class="uk-label uk-label-warning">@if($prodt->brand == null)BloKupie @else {{$prodt->brand}} @endif</span>
                </div>
                <div class="uk-position-small uk-position-bottom-right"uk-tooltip="Brand"><i class="fa fa-tag" style="color: gold;"></i></div>
            </div>
            <div class="uk-padding uk-text-center uk-transition-fade uk-position-cover  uk-overlay uk-overlay-default">
                <a class="uk-button uk-button-text" href="{{route('product.view',[$prodt->id,preg_replace('/\+/', '-',urlencode(strtolower($prodt->cat->category))),preg_replace('/\+/', '-',urlencode(strtolower($prodt->cat->sub))),preg_replace('/\+/', '-',urlencode(strtolower($prodt->name)))])}}">Order Now!</a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</main>
@if($errors->any())
<div class="uk-text-center uk-text-lead uk-text-danger" uk-alert>
   <a class="uk-text-danger uk-alert-close" uk-close></a>
   <h3 class="uk-text-danger">Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
<script type="text/javascript">
function checkTotal() {
    var kuantitas = $('#kuantitas').val();
     var result    = parseFloat(kuantitas)*parseFloat({{$asli}}); 
     document.getElementById("total").value = "Rp " + result;
   }
    </script>
@endsection
