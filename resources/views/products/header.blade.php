<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{url('/')}}" class="logo">
                        <img src="assets/images/logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{url('/')}}" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="{{url('men_products')}}">Men's</a></li>
                        <li class="scroll-to-section"><a href="{{url('women_products')}}">Women's</a></li>
                        <li class="scroll-to-section"><a href="{{url('kids')}}">Kid's</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Pages</a>
                            <ul>
                                <li><a href="{{url('/about')}}">About Us</a></li>
                                <li><a href="{{url('view_products')}}">Products</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </li>
                        
                        @if (Route::has('login'))
                        @auth
                        <li class="submenu">
                            <a href="javascript:;">Hello <span style="color: green;"> {{Auth::user()->name}}</span></a>
                            <ul>
                                <li><a href="{{url('/profile')}}">Profile</a></li>
                                <li><a href="{{url('carts')}}">Cart</a></li>
                                <li><a href="{{url('all_orders')}}">Order</a></li>
                                <li>
                                    <form action="{{route('logout')}}" method="POST">
                                       @csrf
                                       <button class="btn btn-dark btn-block" type="submit">Logout</button>
                                    </form>
                                 </li>
                               </ul>
                        </li>
                       
                        @else
                        <li class="submenu">
                            <a href="javascript:;">Account</a>
                            <ul>
                                <li><a href="{{url('login')}}">Login</a></li>
                                <li><a href="{{url('register')}}">Register</a></li>
                               </ul>
                        </li>
                        @endauth
                        @endif
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
