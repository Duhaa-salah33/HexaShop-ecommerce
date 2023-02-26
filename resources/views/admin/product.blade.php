<!doctype html>
<html lang="en">
 
<head>
    <base href="/public">
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

                        <div class="row" style="text-align:center">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card" >
                                    <div class="card-body">
                                        
                                        <div class="metric-value d-inline-block">
                                            <a href="{{url('add_product')}}" class="mb-1">Add new Product</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                             <!-- recent categories  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-19 col-lg-22 col-md-16 col-sm-22 col-22">
                                <div class="card">
                                    <h5 class="card-header" style="text-align: center">All Products</h5>
                                    <div class="card-body p-0" >
                                        <div class="table-responsive" >
                                            
                                            <table class="table" style="text-align: center;">
                                                
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Title</th>
                                                        <th class="border-0">Quantity</th>
                                                        <th class="border-0">Quantity available</th>
                                                        <th class="border-0">Details</th>
                                                        <th class="border-0">Price</th>
                                                        <th class="border-0">Discount percentage</th>
                                                        <th class="border-0">Price with Discount</th>
                                                        <th class="border-0">Category</th>
                                                        <th class="border-0">Size</th>
                                                        <th class="border-0">Colors</th>
                                                        <th class="border-0">First image</th>
                                                        <th class="border-0">Second image</th>
                                                        <th class="border-0">Edit Action</th>
                                                        <th class="border-0">Delete Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        @foreach ($products as $product)
                                                        <tr>
                                                        <td>{{$product->title}}</td>
                                                        <td>{{$product->quantity}}</td> 

                                                        {{-- @foreach($orders as $or)

                                                        @if ($product->id == $or->product_id) 
                                                      @php
                                                      $count =0;
                                                          $count = $or->product_quantity + $count;
                                                      @endphp
                                                        @endif
                                                        @endforeach --}}
                                                        {{-- @foreach($orders as $order)
                                                        @if($order->product_id == $product->id)

                                                        @php
                                                        $count = $order->product_quantity + $count;
                                                        @endphp
                                                        
                                                        @endif
                                                        
                                                        @endforeach --}}
                                                        <td><a href="{{url('availability',$product->id)}}" class="btn btn-dark">Details</a></td>
                                                        
                                                        <td>{{$product->details}}</td>
                                                        <td>{{$product->price}}</td>
                                                        <td>{{$product->discount_rate}}</td>
                                                        <td>{{$product->price_with_discount}}</td>
                                                        <td>{{$product->category->name}}</td>

                                                        <td>
                                                        @php
                                                            $sizes = json_decode($product->size)
                                                        @endphp
                                                        @foreach($sizes as $size)
                                                        {{$size}}
                                                        @endforeach
                                                        </td>

                                                        <td>
                                                        @php
                                                            $colors = json_decode($product->color)
                                                        @endphp
                                                        @foreach($colors as $col)
                                                        {{$col}}
                                                        @endforeach
                                                        </td>
                                                        {{-- <td></td> --}}
                                                        <td>
                                                            <img src="/products/{{$product->image1}}" alt="image not found" style="width: 100px;height:100px;">
                                                        </td>
                                                        <td>
                                                            <img src="/product/{{$product->image2}}" alt="image not found" style="width: 100px;height:100px;">
                                                        </td>
                                                        <td><a href="{{url('edit_product',$product->id)}}" class="btn btn-primary">Edit</a></td>
                                                        <td><a href="{{url('delete',$product->id)}}" class="btn btn-danger">Delete</a></td>
                                                    </tr>
                                                        @endforeach
                                                    
                                                        
                                                    {{-- @foreach($category as $cat)
                                                    <tr>
                                                        
                                                        <td>{{$cat->id}}</td>
                                                        <td>{{$cat->name}}</td>
                                                        <td><a href="" class="btn btn-primary">Edit</a></td>
                                                        <td><a href="" class="btn btn-danger">Delete</a></td>
                                                    </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
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
</body>
 
</html>