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
    <style type="text/css">
    label
    {
        display: inline-block;
        text-align: left;
        margin: auto;
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
                    <div class="ecommerce-widget">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                    <!-- ============================================================== -->
                   
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card" style="text-align:center">
                            <h5 class="card-header">Add a new Copoun</h5>
                            <br>
                            <div class="card-body p-0">
                                <div class="table-responsive" style="text-align:center; margin:auto;">
                                    <form action="add_copoun" method="POST">
                                        @csrf
                                    <label for="category_name">Copoun :</label>
                                    <input type="text" name="copoun" id="copoun">
                                    <br><br>
                                    <label for="category_name">Discount percentage :</label>
                                    <input type="text" name="discount_percentage" id="discount_percentage">
                                    <br><br>
                                    <button type="submit" class="btn btn-dark btn-block">Add Copoun</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                             <!-- recent categories  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">All Copouns</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            
                                            <table class="table">
                                                
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">id</th>
                                                        <th class="border-0">Copoun</th>
                                                        <th class="border-0">Discount percentage</th>
                                                        <th class="border-0">Edit</th>
                                                        <th class="border-0">Delete</th>

                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                    @foreach($copouns as $copoun)
                                                    <tr>
                                                        
                                                        <td>{{$copoun->id}}</td>
                                                        <td>{{$copoun->copoun}}</td>
                                                        <td>{{$copoun->discount_percentage}}</td>
                                                        <td><a href="" class="btn btn-success">Edit</a></td>
                                                        <td><a href="" class="btn btn-danger">Delete</a></td>
                                                    </tr>
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