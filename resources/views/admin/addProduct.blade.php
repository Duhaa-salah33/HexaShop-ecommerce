<!doctype html>
<html lang="en">
 
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="admin/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="admin/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Hexa shop - Products</title>

    <style type="text/css">

        .close {
       cursor: pointer;
       position: absolute;
       top: 50%;
       right: 0%;
       padding: 12px 16px;
       transform: translate(0%, -50%);
     }
    
     .close:hover {background: #bbb;}
     .div_center
   {
    text-align: center;
    padding-top: 40px;
   }
   .input_color
   {
    color:black;
    padding-bottom: 20px;
   }
   label
   {
    display: inline-block;
    text-align: center;
    width: 200px;
   }
   .div_design
   {
    padding-bottom: 15px;
   }
   input
   {
    display: inline-block;
   }
 

     </style>
     
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        @include('admin.navbar')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('admin.leftSide')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->

                   
                    <div class="ecommerce-widget">
                        @if(session()->has('message'))
                <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                 {{session()->get('message')}}
                </div>
                @endif

                        <div class="row" style="text-align:center">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card" >
                                    <div class="card-body">
                                        
                                        <div class="metric-value d-inline-block">
                                            <a href="{{url('All-products')}}" class="mb-1">Show All Products</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <br>
                            <br>
                             <!-- recent categories  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align:center; margin:auto;">
                                <div class="card" style="text-align:center;">
                                    <h5 class="card-header">Add a new Product</h5>
                                    <br>
                                    <div class="card-body p-0" style="text-align:center;">
                                        <div class="table-responsive" style="text-align:center;">
                                            <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <label>Product title:</label>
                                            <input type="text" name="title" id="title" required>
                                            <br>
                                            <label>Category:</label>
                                            <select name="category_id">
                                            @foreach ($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                            </select> 
                                            
                                            
                                            <br><br>
                                            <label>Product quantity:</label>
                                            <input type="quantity" name="quantity" id="quantity" required>
                                            <br><br>
                                            <label>Details:</label>
                                            <input type="details" name="details" id="details" required>
                                            <br><br>
                                            <label>Price:</label>
                                            <input type="price" name="price" id="price" required>
                                            <br><br>
                                            <label>Discount percentage:</label>
                                            <input type="discount_rate" name="discount_rate" id="discount_rate">
                                            <br><br>
                                            <label>Price after discount:</label>
                                            <input type="price_with_discount" name="price_with_discount" id="price_with_discount">
                                            <br><br>

                                            <label style="text-align:left;">Sizes available:</label>
                                            <br>
                                            <input type="checkbox" id="" name="size[]" value="xsmall">
                                            <label  for=""> xsmall </label><br>

                                            <input type="checkbox" id="" name="size[]" value="small">
                                            <label for=""> Small </label><br>

                                            <input type="checkbox" id="" name="size[]" value="mediam">
                                            <label for=""> Mediam </label><br>

                                            <input type="checkbox" id="" name="size[]" value="large">
                                            <label for=""> Large </label><br>

                                            <input type="checkbox" id="" name="size[]" value="xlarge">
                                            <label  for=""> Xlarge </label><br>

                                            <input type="checkbox" id="" name="size[]" value="xxlarge">
                                            <label for=""> XXlarge </label><br>

                                            {{-- <select name="size">
                                                <option value="small">small</option>
                                                <option value="medium" selected>medium</option>
                                                <option value="large">large</option>
                                                <option value="Xlarge">Xlarge</option>
                                                <option value="XXlarge">XXlarge</option>
                                            </select> --}}
                                            <br><br>

                                            <label style="text-align:left;">Colors available:</label>
                                            <br>
                                            <input type="checkbox" id="" name="color[]" value="white">
                                            <label  for=""> White </label><br>

                                            <input type="checkbox" id="" name="color[]" value="black">
                                            <label for=""> Black </label><br>

                                            <input type="checkbox" id="" name="color[]" value="gray">
                                            <label for=""> gray </label><br>

                                            <input type="checkbox" id="" name="color[]" value="red">
                                            <label for=""> Red </label><br>

                                            <input type="checkbox" id="" name="color[]" value="yellow">
                                            <label  for=""> Yellow </label><br>

                                            <input type="checkbox" id="" name="color[]" value="green">
                                            <label for=""> Green </label><br>

                                            <input type="checkbox" id="" name="color[]" value="blue">
                                            <label for=""> Blue </label><br>
                                            
                                            <input type="checkbox" id="" name="color[]" value="pink">
                                            <label for=""> Pink </label><br>

                                            {{-- <input type="submit" value="Submit"> --}}

                                            {{-- <label style="text-align:left;">Color:</label>
                                            <select name="color" required>
                                                <option value="Black">Black</option>
                                                <option value="White" selected>White</option>
                                                <option value="Pink">Pink</option>
                                                <option value="Gray">Gray</option>
                                                <option value="Yellow">Yellow</option>
                                            </select> --}}
                                            <br><br>
                                            <label style="text-align:left;">Image 1:</label>
                                            <input type="file" name="image1" required>
                                            <br><br>
                                            <label style="text-align:left;">Image 2:</label>
                                            <input type="file" name="image2">
                                            <br><br>
                                            <button type="submit" class="btn btn-dark btn-block">Add Product</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <!-- ============================================================== -->
                            <!-- end recent categories  -->

                        
                </div>
            </div>
        </div>

    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>


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

    {{-- <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script> --}}
</body>
 
</html>