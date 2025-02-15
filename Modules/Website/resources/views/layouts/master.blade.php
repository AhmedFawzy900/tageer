<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('seo')
    @show

    <link rel="preload" href="{{url('/')}}/website/css/font-awesome.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{url('/')}}/website/css/owl.carousel.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{url('/')}}/website/css/owl.theme.default.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!-- <link rel="preload" href="{{url('/')}}/website/css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->

    <link rel="preload" href="{{url('/')}}/website/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{url('/')}}/website/css/bootstrap.min.css"></noscript>
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{url('/')}}/website/css/bootstrap-rtl.min.css">
    @endif
    <link href="{{url('/')}}/website/css/style.css" rel="stylesheet">
    <link rel="preload" href="{{url('/')}}/website/css/media.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{url('/')}}/website/css/media.css"></noscript>
    <!-- <link rel="stylesheet" href="css/bootstrap-rtl.min.css"> -->

    <noscript><link rel="stylesheet" href="{{url('/')}}/website/css/font-awesome.css" ></noscript>
    <noscript><link rel="stylesheet" href="{{url('/')}}/website/css/owl.carousel.min.css" ></noscript>
    <noscript><link rel="stylesheet" href="{{url('/')}}/website/css/owl.theme.default.min.css" ></noscript>
    @section('css')
    @show

    @if(app()->getLocale() == 'ar')
    <link href="{{url('/')}}/website/css/rtl.css" rel="stylesheet">
    @endif
    <link rel="icon" href="/storage/{{app('settings')->get('header_logo')}}" type="image/x-icon">
    <link rel="canonical" href="{{ url()->current()  }}"/>

    <link rel="preload" href="{{url('/')}}/website/images/search_bg.webp" as="image">

    <!-- Preload Bootstrap JavaScript -->
    <link rel="preload" href="{{url('/')}}/website/js/bootstrap.min.js" as="script">
    <link rel="preload" href="{{url('/')}}/website/js/owl.carousel.min.js" as="script">
    <link rel="preload" href="{{url('/')}}/website/js/owl.carousel.min.js" as="script">
    <link rel="preload" href="{{url('/')}}/website/js/core.js" as="script">

    {!!app('settings')->get('scripts')!!}
</head>
<body>

    <!-- <span class="loader">
        <i class="fa fa-spinner fa-spin"></i>
    </span> -->

    <input type="hidden" class="is-auth" value="{{auth()->guard('customers')->check() ? 'true' : 'false'}}"/>

    <!-- Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('lang.Sign up')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="signup-form" action="{{url('/')}}/signup" method="post">
                @csrf
                <div class="modal-body">
                    @if($errors->signup->any())
                    <div class="alert alert-danger">
                        @foreach($errors->signup->all() as $error)
                           {{$error}}
                        @endforeach
                    </div>
                    @endif

                    <div class="form-group">
                        <label>{{__('lang.Name')}}</label>
                        <input type="text" name="name" required class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>{{__('lang.Email')}}</label>
                        <input type="email" required name="email" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>{{__('lang.Password')}}</label>
                        <input type="password" required name="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <button type="submit">{{__('lang.Sign up')}}</button>
                    </div>

                    <div class="form-group">

                     
                            <a href="{{url('/')}}/login/google" class="google social-login">
                                <i class="fa fa-google"></i>
                                <p>{{__('lang.Login with google')}}</p>
                            </a>
                            <a href="{{url('/')}}/login/facebook" class="facebook social-login">
                                <i class="fa fa-facebook-square"></i>
                                <p>{{__('lang.Login with facebook')}}</p>
                            </a>

                    </div>

                    
                </div>
            </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('lang.Sign in')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/')}}/login" method="post">
                @csrf
                <div class="modal-body">
                        @if($errors->login->any())
                        <div class="alert alert-danger">
                            @foreach($errors->login->all() as $error)
                            {{$error}}
                            @endforeach
                        </div>
                        @endif
                    <div class="form-group">
                        <label>{{__('lang.Email')}}</label>
                        <input type="text" name="email" required class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>{{__('lang.Password')}}</label>
                        <input type="password" name="password" required class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <button type="submit">{{__('lang.Sign in')}}</button>
                    </div>

                    
                    <div class="form-group">

                     
                            <a href="{{url('/')}}/login/google" class="google social-login">
                                <i class="fa fa-google"></i>
                                <p>{{__('lang.Login with google')}}</p>
                            </a>
                            <a href="{{url('/')}}/login/facebook" class="facebook social-login">
                                <i class="fa fa-facebook-square"></i>
                                <p>{{__('lang.Login with facebook')}}</p>
                            </a>

                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>

    <div class="scroll-up">
        <img width="50" height="100" alt="scroll" src="{{url('/')}}/website/images/scroll_up.png" />
    </div>

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-5">
                    <a href="{{url('/')}}">
                        <div class="logo">
                            <img width="197" height="60" src="/storage/{{app('settings')->get('header_logo')}}" alt="logo">
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-7">
                    <a href="{{url('/')}}/listyourcar">
                        <div class="header__list_your_car">
                            <img width="30" height="30" alt="listcar" class="car" src="{{url('/')}}/website/images/header_car.png" />
                            <p>{{__('lang.List your cars in TAJEER platform')}}</p>
                            <img alt="upload" class="icon" width="26" height="25" src="{{url('/')}}/website/images/icons/upload.png" />
                        </div>
                    </a>
                </div>
                <div class="col-lg-7">
                    <ul class="header__actions desktop__header_actions">
                        <li class="header__actions_list_item">
                            <p>
                                <i class="fa fa-map-marker"></i>
                                <span>{{__('lang.City')}}</span>
                            </p>
                            <div class="header__actions_label">
                                {{app('country')->getCountry()->title}} <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @foreach(app('country')->getAllCountries() as $country)
                                    <li>
                                        <a href="{{url('/')}}/country/{{$country->id}}/switch">{{$country->title}}</a>
                                        @if(count($country->cities) > 0)
                                        <ul class="cities_menu">
                                        <li>
                                            <a href="{{url('/')}}/city/0/switch">
                                                {{__('lang.All')}}
                                                @if(app('country')->getCountry()->id == $country->id && !app('country')->getCity())
                                                <i class="fa fa-check"></i>
                                                @endif
                                            </a>
                                        </li>
                                        @foreach($country->cities as $city)
                                            <li>
                                                <a href="{{url('/')}}/city/{{$city->id}}/switch">{{$city->title}}

                                                    @if(app('country')->getCity() && $city->id == app('country')->getCity()->id)
                                                    <i class="fa fa-check"></i>
                                                    @endif
                                                </a>
                                            </li>

                                        @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="header__actions_list_item">
                            <p>
                                <i class="fa fa-money"></i>
                                <span>Currency</span>
                            </p>
                            <div class="header__actions_label">
                                {{app('currencies')->getCurrency()->code}} <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @foreach(app('currencies')->getAllCurrencies() as $currency)
                                    <li>
                                        <a href="{{url('/')}}/currency/{{$currency->id}}/switch">{{$currency->code}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="header__actions_list_item">
                            <p>
                            <i class="fa fa-language"></i>
                                <span>{{__('lang.Language')}}</span>
                            </p>
                            <div class="header__actions_label">
                                {{config('app.languages')[app()->getLocale()]}} <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @foreach(config('app.languages') as $key => $lang)
                                    <li>
                                        <a href="{{url('/')}}/lang/switch/{{$key}}">{{$lang}}</a>
                                    </li>
                                @endforeach                          
                            </ul>
                        </li>
                        <li class="header__actions_list_item">

                            <div class="header__actions_label">
                            <i class="fa fa-user"></i>
                                @if(!auth()->guard('customers')->check()) {{__('lang.My Account')}} @else {{__('lang.Welcome')}}, {{auth()->guard('customers')->user()->name}} @endif 
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @if(!auth()->guard('customers')->check())
                                <li data-toggle="modal" data-target="#signinModal">{{__('lang.Sign in')}}</li>
                                <li data-toggle="modal" data-target="#signupModal">{{__('lang.Sign up')}}</li>
                                @else
                                    <li>
                                        <a href="/account/wishlist">
                                        {{__('lang.Wishlist')}}
                                        </a>
                                    </li>
                                    <li >
                                        <a href="/logout">{{__('lang.Logout')}}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                <ul class="header__actions mobile__header_actions">
                        <li class="header__actions_list_item">
                            <p>
                                <i class="fa fa-map-marker"></i>
                            
                            </p>
                            <div class="header__actions_label">
                                {{app('country')->getCountry()->title}} <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @foreach(app('country')->getAllCountries() as $country)
                                    <li>
                                        <a href="{{url('/')}}/country/{{$country->id}}/switch">{{$country->title}}</a>
                                        @if(count($country->cities) > 0)
                                        <ul class="cities_menu">
                                        <li>
                                            <a href="{{url('/')}}/city/0/switch">
                                                {{__('lang.All')}}
                                                @if(app('country')->getCountry()->id == $country->id && !app('country')->getCity())
                                                <i class="fa fa-check"></i>
                                                @endif
                                            </a>
                                        </li>
                                        @foreach($country->cities as $city)
                                            <li>
                                                <a href="{{url('/')}}/city/{{$city->id}}/switch">{{$city->title}}

                                                    @if(app('country')->getCity() && $city->id == app('country')->getCity()->id)
                                                    <i class="fa fa-check"></i>
                                                    @endif
                                                </a>
                                            </li>

                                        @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
  
                        <li class="header__actions_list_item">
                            <p>
                                <i class="fa fa-money"></i>
                          
                            </p>
                            <div class="header__actions_label">
                                {{app('currencies')->getCurrency()->code}} <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @foreach(app('currencies')->getAllCurrencies() as $currency)
                                    <li>
                                        <a href="{{url('/')}}/currency/{{$currency->id}}/switch">{{$currency->code}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="header__actions_list_item">
                            <p>
                            <i class="fa fa-language"></i>
                                
                            </p>
                            <div class="header__actions_label">
                                {{config('app.languages')[app()->getLocale()]}} <i class="fa fa-angle-down"></i>
                            </div>
                            <ul class="header__actions_menu">
                                @foreach(config('app.languages') as $key => $lang)
                                    <li>
                                        <a href="{{url('/')}}/lang/switch/{{$key}}">{{$lang}}</a>
                                    </li>
                                @endforeach                          
                            </ul>
                        </li>
                      
                    </ul>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mobile-top-bar">
                    <img width="197" height="60" src="/storage/{{app('settings')->get('header_logo')}}" alt="logo">
                    <i class="fa fa-times close-menu"></i>

                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">{{__('lang.Home')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('lang.Car Brands')}}
                        </a>
                        <div class="dropdown-menu navbar__car_brand" aria-labelledby="navbarDropdown">
                           <div class="container">
                            <div class="row">
                                @foreach(app('cars')->brands as $item)
                                <div class="col-lg-3">
                                    <a href="{{url('/')}}/b/{{$item->sync_id}}/{{$item->slug}}">
                                        <div class="navbar__car_brand_item">
                                            <img loading="lazy" alt="{{$item->title}}" src="/storage/{{$item->image}}"/>
                                            <p>{{$item->title}} </p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
 
                            </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('lang.Rent a car')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(app('settings')->getRentCarPages() as $item)
                            <a class="dropdown-item" href="{{url('/')}}/p/{{$item->id}}/{{$item->slug}}">{{$item->name}}</a>
                            @endforeach
                            
                            
                        </div>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}/d/cars">{{__('lang.Rent a car with driver')}}</a>
                    </li>

                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}/yacht">{{__('lang.Rent yacht')}}</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}/blog">{{__('lang.Blog')}}</a>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('lang.Quick Links')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/')}}/contact">{{__('lang.Contact Us')}}</a>
                           
                            @foreach(app('settings')->getHeaderPages() as $item)
                            <a class="dropdown-item" href="{{url('/')}}/p/{{$item->id}}/{{$item->slug}}">{{$item->name}}</a>
                            @endforeach
                            
                            
                        </div>
                    </li>
                </ul>
                <div class="mobile-my-account">
                    <a data-toggle="modal" class="open-auth" data-target="#signinModal" href="#!">
                        {{__('lang.Sign in')}}
                    </a>
                    <a data-toggle="modal" class="open-auth" data-target="#signupModal" href="#!">
                        {{__('lang.Sign up')}}
                    </a>
                </div>

                <div class="nav-icons my-2 my-lg-0">
                    <ul>
                        <li>
                            <a href="tel:{{app('settings')->get('contact_phone')}}">
                                <img width="36" height="36" alt="call"  src="{{url('/')}}/website/images/icons/call.png" />
                            </a>
                        </li>
                        <li>
                            <a href="{{app('settings')->get('contact_facebook')}}">
                                <img width="36" height="36"  alt="fb"  src="{{url('/')}}/website/images/icons/facebook.png" />
                            </a>
                        </li>
                        <li>
                            <a href="{{app('settings')->get('contact_twitter')}}">
                                <img width="36" height="36" alt="twitter" src="{{url('/')}}/website/images/icons/twitter.png" />
                            </a>
                        </li>
                        <li>
                            <a href="{{app('settings')->get('contact_instagram')}}">
                                <img width="36" height="36" alt="instagrm" src="{{url('/')}}/website/images/icons/instagram.png" />
                            </a>
                        </li>
                        <li>
                            <a href="{{app('settings')->get('app_google_play')}}">
                                <img width="125" height="37" alt="app" class="apps-image" src="{{url('/')}}/website/images/icons/googleplay.webp" />
                            </a>
                        </li>
                        <li>
                            <a href="{{app('settings')->get('app_apple_store')}}">
                                <img alt="app" width="115" height="41"  class="apps-image" src="{{url('/')}}/website/images/icons/appstore.webp" />
                            </a>
                        </li>
                    </ul>
                </div>
  
            </div>
        </div>
    </nav> 

    @section("content")
    @show



    <footer>
        <img class="bg" loading="lazy" src="{{url('/')}}/website/images/footer_bg.webp" alt="bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <ul>
                        <li>
                            <a data-toggle="tooltip" data-placement="left" title="{{__('lang.FAQ')}}" href="{{url('/')}}/faq">{{__('lang.FAQ')}}</a>
                        </li>
                        <li>
                            <a data-toggle="tooltip" data-placement="left" title="{{__('lang.Blog')}}" href="{{url('/')}}/blog">{{__('lang.Blog')}}</a>
                        </li>
                        <li>
                            <a data-toggle="tooltip" data-placement="left" title="{{__('lang.Contact Us')}}" href="{{url('/')}}/contact">{{__('lang.Contact Us')}}</a>
                        </li>
                        @foreach(app('settings')->getFooterPages() as $key => $item)
                           
                            <li  >
                                <a data-toggle="tooltip" data-placement="left" title="{{$item->name}}" href="{{url('/')}}/p/{{$item->id}}/{{$item->slug}}">{{$item->name}}</a>
                            </li>
                          
                        @endforeach


  
                    </ul>
                </div>


                <div class="col-lg-3">
                    <div class="footer-apps">
                        <p>
                            <span>{{__('lang.Download on the')}} </span>
                            <!-- {{__('lang.App Store & Google play')}} </p> -->
                             
                            <a style="margin-top:15px;display:block" href="{{app('settings')->get('app_google_play')}}">

                                <img alt="app" width="125" height="37"  src="{{url('/')}}/website/images/icons/googleplay.webp" />
                            </a>
                             <a href="{{app('settings')->get('app_apple_store')}}">

                                <img loading="lazy" width="125" height="37" style="margin-top:10px" alt="app"  src="{{url('/')}}/website/images/icons/appstore2.webp" />

                            </a>
                            <ul class="contact-footer" style="margin-top:20px;display:block">
                                <li>
                                    <a href="tel:{{str_replace(' ', '', app('settings')->get('contact_phone') )}}"><i class="fa fa-phone"></i> {{app('settings')->get('contact_phone')}}</a>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/{{str_replace(' ', '', app('settings')->get('contact_whatsapp') )}}">
                                        <i class="fa fa-whatsapp whatsapp-contact"></i> {{app('settings')->get('contact_whatsapp') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{app('settings')->get('contact_email')}}"><i class="fa fa-envelope"></i> {{app('settings')->get('contact_email')}}
                                    </a>
                                </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-bottom">
                        <p>
                        {{app('settings')->get('footer_address')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{url('/')}}/website/js/jquery-3.2.1.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script  src="{{url('/')}}/website/js/bootstrap.min.js"></script>

    <script>
        jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.wheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("wheel", handle, { passive: true });
    }
};
jQuery.event.special.mousewheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("mousewheel", handle, { passive: true });
    }
};
    </script>

    <!-- <script  src="{{url('/')}}/website/js/sweetalert2.all.min.js" ></script> -->
    <script  src="{{url('/')}}/website/js/owl.carousel.min.js"></script>
    <script  src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>

    <script  src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.10.0/firebase-messaging.min.js" integrity="sha512-v5yEhqjlpSupFcjvkEP+AloVEjQBd/CK0pysyAw/YCChyiq54FUuucx2N9oACFBi1qHXsAuhOMsoHiFYxIXCMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script  src="{{url('/')}}/website/firebase/config.js"></script>
    <script src="{{url('/')}}/website/firebase/messaging.js"></script>
    @section('libs')
    @show

    <script src="{{url('/')}}/website/js/core.js"></script>

    @if($errors->signup->any())
    <script>
        $('#signupModal').modal('show');
    </script>
    @endif
    @if($errors->login->any() || request()->get('login'))
    <script>
        $('#signinModal').modal('show');
    </script>
    @endif

    
    @section('js')
    @show

    <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "LocalBusiness",
        "name": "TAJEER",
        "image": "{{url('/')}}/storage/{{app('settings')->get('header_logo')}}",
        "telephone": "{{app('settings')->get('contact_phone')}}",
        "email": "{{app('settings')->get('contact_email')}}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{app('settings')->get('footer_address')}}",
            "addressLocality": "Dubai",
            "addressCountry": "United Arab Emirats"
        },
        "url": "{{url('/')}}"
        }
    </script>
    @php
        $faq_length = \App\Models\Faq::where('type','home')->count();
    @endphp
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"FAQPage",
            "mainEntity":[
@foreach(\App\Models\Faq::where('type','home')->get()  as $key => $faq)
{"@type":"Question","name":"{{$faq->question}}","acceptedAnswer":{"@type":"Answer","text":"{{$faq->answer}}"} } @if($key != $faq_length - 1),@endif
@endforeach
            ]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org/",
            "@type": "ImageObject",
                "description":"{{app('settings')->get('title')}}",
                "image":"{{url('/')}}/storage/{{app('settings')->get('header_logo')}}",
                "name":"{{app('settings')->get('title')}}",
                "potentialAction":"logo",
                "url":"{{url('/')}}"
        }
    </script>

</body>
</html>
