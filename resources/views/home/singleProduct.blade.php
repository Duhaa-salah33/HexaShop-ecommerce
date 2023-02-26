<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Detail Page</title>


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
            <form action="{{url('add_cart',$product->id)}}" method="POST">
                @csrf
            <div class="row">
                <div class="col-lg-4">
                <div class="left-images">
                    <img src="/products/{{$product->image1}}" alt="image not found">
                    <img src="/product/{{$product->image2}}" alt="image not found">
                </div>

            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4 name="title">{{$product->title}}</h4>
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
                    {{-- <span>Category: </span>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <span style="color:black">{{$product->category->name}}</span>
                            </div>
                        </div> --}}

                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Category : </h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <h4 style="color:black">{{$product->category->name}}</h4>
                                </div>
                            </div>
                        </div>

                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>{{$product->details}}</p>
                    </div>

                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Quantity available : </h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">

                                {{$product->quantity - $count}}
                                {{-- <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="{{$product->quantity}}" value="1" title="Qty" class="input-text qty text" size="4"><input type="button" value="+" class="plus"> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Sizes : </h6>
                        </div>
                         
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                @php
                                $sizes = json_decode($product->size)
                                @endphp
                                <select name="size">
                                    @foreach($sizes as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                </select>
                            
                            {{-- <input type="checkbox" id="" name="size[]" value="{{$size}}">
                            <label  for=""> {{$size}} </label><br> --}}
                                {{-- {{$product->size}} --}}
                                {{-- <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="{{$product->quantity}}" value="1" title="Qty" class="input-text qty text" size="4"><input type="button" value="+" class="plus"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Colors available : </h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">

                                @php
                                $colors = json_decode($product->color)
                                @endphp
                                {{-- <input type="checkbox" id="" name="color[]" value="{{$col}}">
                                <label  for=""> {{$col}} </label><br> --}}
                                <select name="color">
                                    @foreach($colors as $col)
                                    <option value="{{$col}}" name="color">{{$col}}</option>
                                    @endforeach
                                </select> 
                                {{-- {{$product->color}} --}}
                                {{-- <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="{{$product->quantity}}" value="1" title="Qty" class="input-text qty text" size="4"><input type="button" value="+" class="plus"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        {{-- <label>Total:</label>
                        <input type="number" name="price" value="{{$product->price}}"> --}}
                        {{-- <h4> </h4> --}}
                        
                            <div class="row">
                                <div class="left-content">
                                    <h6>No. of Orders</h6>
                                </div>
                                <div class="col-mid-4">
                                   <input type="number" name="quantity" value="1" min="1" style="width: 100px" max="{{$product->quantity}}">
                                </div>
                                
                                <div class="col-mid-4">
                                   @if($product->quantity - $count >= 1)

                                    <div class="main-border-button"><button class="btn btn-success" type="submit">Add to cart</button></div>
                                        
                                    @else
                                    <div class="right-content">
                                        <p style="color: red;">Out of stock</p>
                                    </div>
                                    @endif
                                </div>
                             </div>
                    {{-- </form> --}}
                    </div>
                </div>
            </div>
            
            </div>
        </form>
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
