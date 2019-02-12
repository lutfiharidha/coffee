<!DOCTYPE html>
<html>
<head>
  <title>BloKupie @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Arvo:700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <nav class="uk-background-secondary uk-padding-small uk-light" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="{{route('beranda')}}"><img width="100" src="{{asset('img/logo.png')}}"></a>
        <ul class="uk-navbar-nav">
            <li class="uk-active">
                <a href="#">SHOP<span class="uk-margin-small-right" uk-icon="icon:  chevron-down; ratio: 1"></span></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-nav-header">Arabica</li>
                        @foreach($arabica as $arab)
                        <li><a href="{{ route('cat', [$arab->id,preg_replace('/\+/', '-',urlencode(strtolower($arab->category))),preg_replace('/\+/', '-',urlencode(strtolower($arab->sub)))]) }}">{{$arab->sub}}</a></li>
                        @endforeach
                        <li class="uk-nav-header">Robusta</li>
                        @foreach($robusta as $robu)
                        <li><a href="#">{{$robu->sub}}</a></li>
                        @endforeach
                        <li class="uk-nav-header">Other</li>
                         @foreach($other as $othe)
                        <li><a href="#">{{$othe->sub}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li class="uk-active"><a href="#">BLOG</a></li>
            <li class="uk-active"><a href="#">Contact</a></li>
            <li class="uk-active"><a href="#">About</a></li>
          </ul>
    </div>
        <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
          @guest
          <li class="uk-active">
                <a href="{{ route('login') }}">Login</a>
          </li>
          <li class="uk-active">
                <a href="{{ route('register') }}">Register</a>
          </li>
          @else
          <li class="uk-active">
                <a href="@if(Auth::user()->admin == 1) {{route('admin')}} @else {{route('home')}} @endif">Account</a>
          </li>
          <li class="uk-active">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </li>
          @endguest
        </ul>
    </div>
  </nav>
@yield('content')
<div id="contact" class="uk-light uk-background-secondary uk-padding">
    <div class="uk-container uk-container-medium uk-column-1-3 ">
        <p class="uk-margin uk-text-center uk-padding uk-padding-remove-top"><img width="150" height="150" src="{{asset('img/logo.png')}}"><br>Jalan Panglateh, Sumurbor No 24<br>Lhokseumawe, Aceh - Indonesia<br>info@blokupie.com</p>
        <p class="uk-margin-large-top"><h4 class="uk-heading-line "><span>Customer Support</span></h4>
        <ul class="uk-list">
            <li>Telkomsel: 085370225224</li>
            <li>Three: 0895611177270</li>
        </ul>
        <h4 class="uk-heading-line"><span>Tentang Kami</span></h4>
        <ul class="uk-list">
            <li><a class="uk-button uk-button-text" href="privacy">Kebijakan Privasi</a></li>
            <li><a class="uk-button uk-button-text" href="#">Cara Order</a></li>
            <li><a class="uk-button uk-button-text" href="#">Tentang Kami</a></li>
            <li><a class="uk-button uk-button-text" href="#">Hubungi Kami</a></li>
        </ul>
    </p>
    <p><form class="uk-margin-large-top">

    <div class="uk-margin">
        <div class="uk-form-controls">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Email">
        </div>
    </div>

        <div class="uk-margin">
        <div class="uk-form-controls">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Name">
        </div>
    </div>

 <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Message"></textarea>
        </div>
    <button class="uk-float-right uk-button uk-button-primary ">Send</button>

</form>
    </p>
    </div>
</div>
<div class="uk-background uk-background-muted uk-dark uk-text-center">Created By <a href="https://www.mekode.com/">Mekode</a> &copy; 2018</div>
</body>
</html>