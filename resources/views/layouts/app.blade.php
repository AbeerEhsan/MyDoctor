<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/medino/assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="/medino/assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="/medino/assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="/medino/assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="/medino/assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="/medino/assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/medino/assets/css/linearicons.css">
    
    <link rel="stylesheet" href="/medino/assets/css/style.css">
    <link href="/medino/assets/css/nice-select.css" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body>

    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <header class="header-area">
       
        <div id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="/medino/assets/images/logo/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        
                         @guest
                         <?php
                            $menus = App\Menu::where('active',1)->get();
                        ?>
                        @foreach($menus->where('parent_id',0) as $topMenu)
                        <?php
                            $subMenus = $menus->where('parent_id',$topMenu->id);
                            //dd($topMenu);
                        ?>

                        @if(count($subMenus)>0)
                        <li class="menu-has-children"><a href="">{{$topMenu->title}}</a>
                            <ul>
                                @foreach($subMenus as $subMenu)
                                <li><a href="{{$subMenu->url}}">{{$subMenu->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li class="menu-active"><a href="{{$topMenu->url}}">{{$topMenu->title}}</a></li>
                        @endif

                        @endforeach
                         
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">Patient Register</a>
                                </li>
                                <li>
                                    <a href="{{ route('doctor-register') }}">Doctor Register</a>
                                </li>
                            @endif
                        @else
                        
                            
                            @if(Auth::user()->type == 'admin')
                                <li  class="menu-active">
                                    <a href='/admin/users'>Admin Panel</a>
                                </li>
                                
                            @elseif(Auth::user()->type == 'doctor')
<!--                                <li  class="menu-active">
                                    <a href='/doctor/updateInfo'>Doctor Panel</a>
                                </li>-->
                                <li  class="menu-active">
                                    <a href='/doctor/post'>Doctor post</a>
                                </li>
                                <li  class="menu-active">
                                    <a href='/doctor/question'>Doctor Question</a>
                                </li>
                            @else
<!--                                <li  class="menu-active">
                                    <a href='/patient/updateInfo'>Patient Panel</a>
                                </li>-->
                                <li  class="menu-active">   
                                  <a href='/patient/question'>My Previous Question</a>
                                </li>
                                 <li  class="menu-active">
                                    <a href='/patient/question/create'>Create New Question</a>
                                </li>
                                <li  class="menu-active">
                                    <a href='/MyDoctor/posts'>posts</a>
                                </li>
                            @endif
                            
                            <li class="menu-has-children">
                            <a href="/">{{ Auth::user()->name }} - {{ Auth::user()->type }} <span class="caret"></span></a>
                                <ul>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                        @if(Auth::user()->type == 'admin')
                                        <a class="dropdown-item" href="/admin/home/changepassword">
                                        Change Password
                                      </a>
                                         @elseif(Auth::user()->type == 'doctor')
                                         <a class="dropdown-item" href="/doctor/home/changepassword">
                                        Change Password
                                      </a>
                                        @else
                                         <a class="dropdown-item" href="/patient/home/changepassword">
                                        Change Password
                                      </a>
                                        @endif
                                        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
                    @include('_msg')
                    @yield('content')
 <br>
    <br>
    <br>
    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">top products</h3>
                            <ul>
                                <li class="mb-2"><a href="#">managed website</a></li>
                                <li class="mb-2"><a href="#">managed reputation</a></li>
                                <li class="mb-2"><a href="#">power tools</a></li>
                                <li><a href="#">marketing service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">newsletter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>  
                            <form action="#">
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <h3 class="mb-4">instagram feed</h3>
                            <div class="feed">
                                <img src="/medino/assets/images/feed1.jpg" alt="feed">
                                <img src="/medino/assets/images/feed2.jpg" alt="feed">
                                <img src="/medino/assets/images/feed3.jpg" alt="feed">
                                <img src="/medino/assets/images/feed4.jpg" alt="feed">
                                <img src="/medino/assets/images/feed5.jpg" alt="feed">
                                <img src="/medino/assets/images/feed6.jpg" alt="feed">
                                <img src="/medino/assets/images/feed7.jpg" alt="feed">
                                <img src="/medino/assets/images/feed8.jpg" alt="feed">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <span>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="/medino/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="/medino/assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="/medino/assets/js/vendor/wow.min.js"></script>
    <script src="/medino/assets/js/vendor/owl-carousel.min.js"></script>
    <script src="/medino/assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="/medino/assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="/medino/assets/js/vendor/superfish.min.js"></script>
    <script src="/medino/assets/js/main.js"></script>
    
    @yield('js')
</body>
</html>
