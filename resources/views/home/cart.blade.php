<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Cart</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    @include('products.header')
    <!-- ***** Header Area End ***** -->

 
    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container" style="padding-top: 40px">
            @if(session()->has('message'))
       <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
       </div>
       @endif
            <?php $totalPrice = 0; ?>
            @foreach ($cart as $cart)
               @foreach($products as $product)

               @if($product->id == $cart->product_id)
            {{-- {{Product::products()->where('id',$car->product_id)}} --}}
            <div class="row">
               
                <div class="col-lg-4">
                <div class="left-images">
                    <img src="/products/{{$product->image1}}" alt="image not found">
                    {{-- <img src="/product/{{$product->image2}}" alt="image not found"> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                   
                    @if($product->price_with_discount != null)
                            <h5>Price after discount {{$product->discount_rate}}: </h5>
                            <h5>${{$product->price_with_discount}}</h5>
                            <br>
                            <h5 style="text-decoration: line-through; color:red;"> Price: ${{$product->price}}</h5>
                            @else
                            <h5> Price: ${{$product->price}}</h5>
                            @endif
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    @foreach($category as $cat)
                    @if($cat->id == $product->category_id)
                    <span>Category: <h6 style="color:black">{{$cat->name}}</h6></span>
                    @endif
                    @endforeach
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>{{$product->details}}</p>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <h5>{{$cart->quantity}}</h5>
                                {{-- <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="{{$cart->quantity}}" title="Qty" class="input-text qty text" size="4" ><input type="button" value="+" class="plus"> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Size:</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <h5>{{$cart->product_size}}</h5>
                                {{-- <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="{{$cart->quantity}}" title="Qty" class="input-text qty text" size="4" ><input type="button" value="+" class="plus"> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Color</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <h5>{{$cart->product_color}}</h5>
                                {{-- <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="{{$cart->quantity}}" title="Qty" class="input-text qty text" size="4" ><input type="button" value="+" class="plus"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <h4>Total price: {{$cart->total_price}}</h4>
                        <?php $totalPrice = $totalPrice + $cart->total_price ?>
                        <div class="main-border-button"><a href="{{url('remove_cart',$cart->id)}}">Delete</a></div>
                    </div>
                </div>
            </div>
        </div>
           
            <br>
            @endif
            
            @endforeach
            @endforeach
            
                <br><hr>
                <div style="text-align: center; margin:auto">
                    <h4 style="text-align: center; color:gray" >Total order price: <h5 style="color: black">{{$totalPrice}}</h5></h4>
                </div>

                <br>
            <div class="total">
                        
                <div class="main-border-button"><a href="{{url('confirm_order')}}" class="btn btn-block">confirm order</a></div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->

    @include('home.footer')
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/quantity.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>

</html>
