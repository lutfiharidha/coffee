<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>BloKupie</title>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/css/uikit.min.css" />
      <link rel="stylesheet" href="{{ url('css/app.css') }}" />
      <!-- UIkit JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit-icons.min.js"></script>
   </head>
   <body>
         @guest
         @else
         <nav class="uk-background-secondary uk-navbar-transparant uk-light" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="{{route('beranda')}}">BLO KUPIE</a>
        </div>
        <div class="uk-navbar-right uk-margin-right">
            <a class="uk-navbar-item uk-button" href="">Change Password</a>
            <a class="uk-navbar-item uk-button" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </div>
    </div>
</nav>
      <main class="uk-container uk-container-large">
         <div uk-grid>
            <div class="uk-background-cover uk-background-secondary uk-light uk-padding-small uk-visible@m uk-width-1-6" uk-height-viewport="offset-top: true">
               <div class="uk-card">
                  <div>
                     <ul class="uk-text-left uk-nav-default uk-nav-parent-icon" uk-nav>
                        
                        <li class="uk-active uk-divider">
                           <a href="/admin">Dashboard</a>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Categories</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{route('add.category')}}">Add Category</a></li>
                              <li><a href="{{route('data.category')}}">Update Category</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Products</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{route('add.product')}}">Add Product</a></li>
                              <li><a href="{{route('data.product')}}">Update Product</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Sliders</a>
                           <ul class="uk-nav-sub">
                              <li><a href="{{route('add.slider')}}">Add Slider</a></li>
                              <li><a href="{{route('data.slider')}}">Update Slider</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Blogs</a>
                           <ul class="uk-nav-sub">
                              <li><a href="">Add Blog</a></li>
                              <li><a href="">Update Blog</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider uk-parent">
                           <a href="#">Testimonials</a>
                           <ul class="uk-nav-sub">
                              <li><a href="">Add Testi</a></li>
                              <li><a href="">Update Testi</a></li>
                           </ul>
                        </li>
                        <li class="uk-active uk-divider">
                           <a href="#">Newsletter</a>
                        </li>
                        <li class="uk-active uk- uk-divider">
                           <a href="#">Customers</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            @endguest
            <div class="uk-width-expand uk-section">
               @yield('content')

            </div>
         </div>
         </div>
      </main>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> $('textarea').froalaEditor({
  toolbarButtons: ['undo', 'redo' , 'bold', 'italic', 'clear']
});</script>
   </body>
</html>