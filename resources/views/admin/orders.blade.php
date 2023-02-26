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
    <title>Hexa shop - categories</title>
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
                                            <a href="" class="mb-1">Add new Category</a>
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
                                    <h5 class="card-header" style="text-align: center">All Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            
                                            <table class="table" style="text-align: center">
                                                
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Order number</th>
                                                        <th class="border-0">Customer name</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Phone</th>
                                                        <th class="border-0">Address</th>
                                                        <th class="border-0">City</th>
                                                        <th class="border-0">Product title</th>
                                                        <th class="border-0">Product image</th>
                                                        <th class="border-0">Product price</th>
                                                        <th class="border-0">Price after discount</th>
                                                        <th class="border-0">Quantity</th>
                                                        <th class="border-0">Size</th>
                                                        <th class="border-0">Color</th>
                                                        <th class="border-0">Total pay</th>
                                                        <th class="border-0">Payment method</th>
                                                        <th class="border-0">Payment status</th>
                                                        <th class="border-0">Delivery status</th>
                                                        <th class="border-0">Order time</th>
                                                        <th class="border-0">Deliverd</th>
                                                        <th class="border-0">Cancel order</th>



                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                   @foreach ($users as $user)
                                                       @foreach($orders as $order)
                                                       @if($user->id == $order->user_id)
                                                       <tr>
                                                        
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$order->phone}}</td>
                                                        <td>{{$order->address}}</td>
                                                        <td>{{$order->city}}</td>
                                                        <td>{{$order->product_title}}</td>
                                                        <td><img src="/products/{{$order->product_image}}" alt="image not found" style="width: 100px;height:100px;"></td>
                                                        <td>{{$order->product_price}}</td>
                                                        @if($order->product_price_with_discount != null)
                                                        <td>{{$order->product_price_with_discount}}</td>
                                                        @else
                                                            <td>--</td>
                                                        @endif
                                                        <td>{{$order->product_quantity}}</td>
                                                        <td>{{$order->product_size}}</td>
                                                        <td>{{$order->product_color}}</td>
                                                        <td>{{$order->total_pay}}</td>
                                                        <td>{{$order->payment_method}}</td>
                                                        <td>{{$order->payment_status}}</td>
                                                        <td>{{$order->delivery_status}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td>
                                                            @if($order->delivery_status=='Processing')
                                                            <a href="{{url('delivery_status',$order->id)}}" onclick="return confirm('Are you sure this order is deliverd?')" class="btn btn-success">Delivered</a>
                                                            <td>
                                                                <a href="{{url('cancel_order',$order->id)}}" onclick="return confirm('Are you sure you want to delete this order?')" class="btn btn-danger">Cancel order</a>
                                                              </td>
                                                            @else
                                                            <p style="color:green;"><b>Delivered</b></p>
                                                            <td style="color: blue"><p>Can't be cancelled!</p></td>
                                                            @endif
                                                          </td>
                                                  
                                                    </tr>
                                                   
                                                       {{-- @else
                                                       <tr>
                                                        <p>no orders yet</p>
                                                       </tr> --}}
                                                       
                                                       @endif
                                                       @endforeach
                                                   @endforeach
                                                   
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