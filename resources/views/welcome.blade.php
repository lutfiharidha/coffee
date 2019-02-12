@extends('layouts.nav')

@section('content')
<div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="ratio: 8:3; animation: push; autoplay: true">

    <ul class="uk-slideshow-items">
        @foreach($sliders as $slider)
        <li>
            <img src="/img/sliders/{{$slider->image}}" alt="" uk-cover>
            <div class="uk-overlay uk-overlay-primary uk-position-right uk-text-center uk-transition-slide-right uk-width-medium">
                <h3 class="uk-margin-remove">{{$slider->title}}</h3>
                <p class="uk-text-left">{{$slider->description}}</p>
            </div>
        </li>
        @endforeach
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
<div class="uk-text-bold uk-text-center uk-padding uk-dark uk-child-width-1-3@s" style="background-color: #e2e2e2; font-family: 'Calligraffitti', cursive;" uk-grid>
    <div class="uk-divider-vertical">
        <a class="uk-text-large uk-button uk-button-text" href="">ARABICA</a>
    </div>
    <div class="uk-divider-vertical">
        <a class="uk-text-large uk-button uk-button-text" href="">ROBUSTA</a>
    </div>
    <div>
        <a class="uk-text-large uk-button uk-button-text" href="">OTHERS</a>
    </div>
</div>
<div class="uk-padding uk-dark uk-background-secondary">
    <h2 class="uk-heading-line uk-text-center uk-text-white"><span>Our Promise</span></h2>
    <div class="uk-text-center uk-text-large uk-light uk-child-width-1-3@s" uk-grid style="font-family: 'Arvo', serif;">
        <div>GOOD QUALITY</div>
        <div>GOOD PACKING</div>
        <div>FRESH</div>
    </div>
    <hr>

</div>
<div class="uk-light uk-text-center uk-child-width-1-3@s uk-grid-collapse" uk-grid>
<div>
            <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://images.unsplash.com/photo-1524350876685-274059332603?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=31aa9ab0a6a85bb9201fa34f1dca1347&w=1000&q=80);">
            <p class="uk-h3">Speciality</p>
        </div>

    </div>
<div>

        <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://images.pexels.com/photos/773958/pexels-photo-773958.jpeg?auto=compress&cs=tinysrgb&h=350);">
            <p class="uk-h3">LongBerry</p>

    </div>
</div>
<div>

         <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://www.coffechino.com/wp-content/uploads/2012/09/beans_for_sale_coffee.jpg);">
            <p class="uk-h3">PeaBerry</p>

    </div>
</div>

<div>

         <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://jooinn.com/images/coffee-beans-79.jpg);">
            <p class="uk-h3">G1</p>

    </div>
</div>
<div>

         <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://knowyourgrinder.com/wp-content/uploads/2017/06/bag-coffee-beans-shoulder-cup-spoon-coffee-coffee-aroma-bag-coffee-beans-blade-cup-spoon-coffee-coffee-aroma.jpg);">
            <p class="uk-h3">High Class</p>

    </div>
</div>
<div>

         <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://www.aquaspresso.co.za/wp-content/uploads/2014/10/Coffee-Beans-Roasting.jpg);">
            <p class="uk-h3">Blend</p>

    </div>
</div>
<div>
            <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://www.roastycoffee.com/wp-content/uploads/grind-coffee-beans-1-800x450.jpg);">
            <p class="uk-h3">Special</p>
        </div>

    </div>
<div>

        <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://sc01.alicdn.com/kf/UTB8LT_lfKvJXKJkSajhq6A7aFXaA/50-Completely-Chlorogenic-acidic-weight-conregulate-green.jpg);">
            <p class="uk-h3">Green Bean</p>

    </div>
</div>
<div>

         <div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(https://www.colourbox.dk/preview/7446543-ristede-kaffeboenner-paa-trae-arabica-kaffe.jpg);">
            <p class="uk-h3">Roasted Bean</p>

    </div>
</div>
</div>
<!-- <div id="testimonials" class="uk-position-relative uk-background-fixed uk-background-cover uk-visible-toggle uk-dark" uk-slideshow="ratio: 9:3;animation: push" style="background-color: #fff;">
   <ul class="uk-slideshow-items">
      <li>
         <div class="uk-position-center uk-text-center">
            <div class="image-cropper  uk-align-center">
            <img class="testi" uk-slideshow-parallax="y: -50,0,0; opacity: 1,1,0" src="/img/1.jpg" alt="1">
            </div>
            <p class="uk-text-capitalize uk-text-large" uk-slideshow-parallax="y: 0,0,0; opacity: 1,1,0">Derat</p>
            <p uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">Good Coffee</p>
            <a class="uk-text-small uk-button uk-button-text" href="https://www.instagram.com/derat" uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">@dadas</a>
         </div>
      </li>
      <li>
         <div class="uk-position-center uk-text-center">
            <div class="image-cropper  uk-align-center">
            <img class="testi" uk-slideshow-parallax="y: -50,0,0; opacity: 1,1,0" src="/img/2.png" alt="1">
            </div>
            <p class="uk-text-capitalize uk-text-large" uk-slideshow-parallax="y: 0,0,0; opacity: 1,1,0">Derat</p>
            <p uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">Good Coffee</p>
            <a class="uk-text-small uk-button uk-button-text" href="https://www.instagram.com/derat" uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">@dadas</a>
         </div>
      </li>
   </ul>
   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div> -->
<div class="uk-dark"  style="background-color: #e2e2e2;">
    <div class="uk-padding-small uk-text-center">
    <form class=" uk-margin-bottom ">
        <h3>Newsletter</h3>
        <input class="uk-input uk-form-width-large uk-form-large" type="text" placeholder="Email">
            <button class="uk-button uk-button-secondary uk-button-large">Submit</button>
    </div>
    </form>
    </div>
</div>
<div class="uk-dark" style="background-color: #acacac;">
    <div class="uk-padding-small uk-container uk-container-small uk-text-center">
        <h3>FOLLOW</h3>
        <a href="" class="uk-icon-button uk-margin-medium-right" uk-icon="icon: twitter; ratio: 1"></a>
        <a href="" class="uk-icon-button  uk-margin-medium-right" uk-icon="icon: facebook; ratio: 1"></a>
        <a href="" class="uk-icon-button  uk-margin-medium-right" uk-icon="icon: instagram; ratio: 1"></a>
        <a href="" class="uk-icon-button  uk-margin-medium-right" uk-icon="icon: youtube; ratio: 1"></a>
        <a href="" class="uk-icon-button  uk-margin-medium-right" uk-icon="icon: pinterest; ratio: 1"></a>
        <a href="" class="uk-icon-button" uk-icon="icon: google-plus; ratio: 1"></a>

    </div>
</div>
@endsection
