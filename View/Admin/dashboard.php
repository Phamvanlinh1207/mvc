 <!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>SB Admin 2 - Dashboard</title>

     <!-- Custom fonts for this template-->
     <link href="./public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="./Public/admin/css/sb-admin-2.min.css" rel="stylesheet">

     <script>
         var labels = ['pending', 'finished'];
         var data = [<?php echo count($pendingOrders); ?>, <?php echo count($finishedOrders); ?>];
     </script>

 </head>

 <body id="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">

         <!-- Sidebar -->
         <?php include_once './View/Admin/inc/sidebar.php' ?>
         <!-- End of Sidebar -->

         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">

             <!-- Main Content -->
             <div id="content">

                 <!-- Topbar -->
                 <?php include_once './View/Admin/inc/topbar.php' ?>
                 <!-- End of Topbar -->

                 <!-- Begin Page Content -->
                 <div class="container-fluid">

                     <div class="row">
                         <div class="col-md-4">
                             <!-- Pie Chart -->
                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
                                 </div>
                                 <div class="card-body">
                                     <div class="chart-bar">
                                         <canvas id="myPieChart"></canvas>
                                     </div>

                                 </div>
                             </div>
                         </div>

                         <div class="col-md-4">
                             <!-- Pie Chart -->
                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                                 </div>
                                 <div class="card-body">
                                     <div class="chart-bar">
                                         <canvas id="myBarChart"></canvas>
                                     </div>

                                 </div>
                             </div>
                         </div>

                         <div class="col-md-4">
                             <!-- Pie Chart -->
                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                 </div>
                                 <div class="card-body">
                                     <div class="chart-bar">
                                         <canvas id="myAreaChart"></canvas>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">List Orders Pending</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>STT</th>
                                             <th>Code</th>
                                             <th>Description</th>
                                             <th>Status</th>
                                             <th>Users_id</th>
                                             <th>Created_id</th>
                                             <th>#</th>
                                             <th>#</th>
                                         </tr>
                                     </thead>
                                    
                                     <tbody>

                                         <?php foreach ($pendingOrders as $order) { ?>
                                             <tr class="<?php echo orderStyle($order->status); ?>">
                                                 <td> <a href="<?php admin_url_pattern('orderdetailController', 'index', $order->code); ?>"><?php echo increment($i); ?></a></td>
                                                 <td> <a href=""><?php echo $order->code; ?></a></td>
                                                 <td><?php echo $order->description; ?></td>
                                                 <td><?php echo $order->status; ?></td>
                                                 <td><?php echo $order->users_id; ?></td>
                                                 <td><?php echo $order->created_at; ?></td>

                                                 <td><a href="<?php echo admin_url_pattern('orderController', 'edit', $order->id); ?>">Edit</a></td>
                                                 <td><a href="<?php echo admin_url_pattern('orderController', 'delete', $order->id); ?>">Delete</a></td>
                                             </tr>
                                         <?php } ?>


                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">List Orders Finished</h6>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>STT</th>
                                             <th>Code</th>
                                             <th>Description</th>
                                             <th>Status</th>
                                             <th>Users_id</th>
                                             <th>Created_id</th>
                                             <th>#</th>
                                             <th>#</th>
                                         </tr>
                                     </thead>
                                     
                                     <tbody>

                                         <?php foreach ($finishedOrders as $order) { ?>
                                             <tr class="<?php echo orderStyle($order->status); ?>">
                                                 <td> <a href="<?php admin_url_pattern('orderdetailController', 'index', $order->code); ?>"><?php echo increment($i); ?></a></td>
                                                 <td> <a href=""><?php echo $order->code; ?></a></td>
                                                 <td><?php echo $order->description; ?></td>
                                                 <td><?php echo $order->status; ?></td>
                                                 <td><?php echo $order->users_id; ?></td>
                                                 <td><?php echo $order->created_at; ?></td>
                                                 <td><a href="<?php echo admin_url_pattern('orderController', 'edit', $order->id); ?>">Edit</a></td>
                                                 <td><a href="<?php echo admin_url_pattern('orderController', 'delete', $order->id); ?>">Delete</a></td>
                                             </tr>
                                         <?php } ?>


                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->
             <!-- Footer -->
             <footer class="sticky-footer bg-white">
                 <div class="container my-auto">
                     <div class="copyright text-center my-auto">
                         <span>Copyright &copy; Your Website 2022</span>
                     </div>
                 </div>
             </footer>
             <!-- End of Footer -->

         </div>
         <!-- End of Content Wrapper -->

     </div>
     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
         <i class="fas fa-angle-up"></i>
     </a>

     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                     <a class="btn btn-primary" href="<?php echo url_pattern('homeController', 'home'); ?>">Logout</a>
                 </div>
             </div>
         </div>
     </div>

     <!-- Bootstrap core JavaScript-->
     <script src="./Public/admin/vendor/jquery/jquery.min.js"></script>
     <script src="./Public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="./Public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="./Public/admin/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="./Public/admin/vendor/chart.js/Chart.min.js"></script>

     <!-- Page level custom scripts -->
     <script src="./Public/admin/js/demo/chart-area-demo.js"></script>
     <script src="./Public/admin/js/demo/chart-pie-demo.js"></script>
     <script src="./Public/admin/js/demo/chart-bar-demo.js"></script>


 </body>

 </html>