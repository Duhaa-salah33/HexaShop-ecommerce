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
<style>
    input
    {
        display: inline-block;

    }
</style>
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
            <form action="{{url('make_order')}}" method="GET">
                @csrf

            <?php $totalPrice = 0; ?>
            <div class="col-xl-19 col-lg-22 col-md-16 col-sm-22 col-22">
                <div class="card">
                    <h5 class="card-header" style="text-align: center">Order details</h5>
                    <div class="card-body p-0" >
                        <div class="table-responsive" >
                            @foreach($cart as $cat)
                            <table class="table" style="text-align: center;">
                                
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">Title</th>
                                        <th class="border-0">Quantity</th>
                                        {{-- <th class="border-0">Details</th> --}}
                                        <th class="border-0">Price</th>
                                        <th class="border-0">Discount percentage</th>
                                        <th class="border-0">Price after Discount</th>
                                        <th class="border-0">Total price</th>
                                        {{-- <th class="border-0">Category</th> --}}
                                        <th class="border-0">Size</th>
                                        <th class="border-0">Color</th>
                                        <th class="border-0">Product image</th>
                                        <th class="border-0">Remove product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                       @foreach($products as $product)
                                       @if($product->id == $cat->product_id)
                                        <tr>
                                        <td>{{$product->title}}</td>
                                        <td>{{$cat->quantity}}</td>  
                                        {{-- <td>{{}}</td> --}}
                                        <td>${{$product->price}}</td>
                                        @if($product->price_with_discount != null)
                                        
                                            <td>{{$product->discount_rate}}</td>
                                            <td>${{$product->price_with_discount}}</td>
                                                    
                                        @else
                                            <td>--</td>
                                            <td>--</td>
                                        @endif
                                        <td>{{$cat->total_price}}</td>
                                        {{-- <td></td> --}}
                                        <td>{{$cat->product_size}}</td>
                                        <td>{{$cat->product_color}}</td>
                                        <td> <img src="/products/{{$product->image1}}" alt="image not found" style="width: 100px;height:100px;"></td>

                                        <td><a href="{{url('remove_cart',$cat->id)}}" class="btn btn-danger">Remove</a></td>
                                    </tr>
                                   
                                    
                                </tbody>
                                @endif
                                @endforeach
                            </table>
                            <?php $totalPrice = $totalPrice + $cat->total_price ?>
           
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
           <br>
           
            <div class="row">
                <div class="col-sm">

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: gray">Contact information</h5>

                            <p class="card-text" style="color: black;">Name:      {{Auth::user()->name;}}</p>
                            <p class="card-text" style="color: black;">Email:      {{Auth::user()->email;}}</p>
                            <p class="card-text" style="color: black;">Phone:</p>
                            <input type="number" name="phone"  placeholder="01*********" style="width:150px" required>
                            
                            <p class="card-text" style="color: black;">Address:</p>
                            <input type="text" name="address" required>
                            <p class="card-text" style="color: black;">City:</p> 
                            <select name="city" id="" required>
                                <option value="Cairo" selected>Cairo</option>
                                <option value="Cairo">Alexandria</option>
                                <option value="Cairo">Hurghada</option>
                                <option value="Cairo">Ismailia</option>
                                <option value="Cairo">Port saeed</option>
                            </select>
                            {{-- <form action="{{url('copoun')}}" method="POST"> --}}
                                @csrf
                            <p class="card-text" style="color: black;">Do you have a Copoun?</p>
                            <input type="text" name="copoun" placeholder="copoun ..">
                            <br><br>

                            {{-- <a href="" class="btn btn-success">Apply copoun</a> --}}
                            <button type="submit" class="btn-success">Apply copoun</button>
                        {{-- </form> --}}
                        </div>
                      </div>
                </div>

                
                <div class="row">
                    <div class="col-sm">
    
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title" style="color: gray">Order details</h5>
                               
                                {{-- @if($cop_discount !=0 )
                                
                                <p class="card-text" style="color: black;"><h5>Total price: ${{$totalPrice * $cop_discount }} </h5>    </p>
                                @else --}}
                                <p class="card-text" style="color: black;"><h5>Total price: ${{$totalPrice}} </h5>    </p>
                               
                               {{-- @endif --}}
                               
                                    {{-- <a href="" class="btn btn-success btn-block">Pay on delivery</a> --}}
                                <br>
                                <a href="" class="btn btn-primary btn-block"><i class="fa fa-credit-card"></i>  Pay using credit card</a>
                                <button class="btn-success btn-block" type="submit"><i class="fa fa-money"></i>  Pay Cash on delivery</button>
                                {{-- <a href="" class="btn btn-success btn-block"> </a>--}}
                            
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
