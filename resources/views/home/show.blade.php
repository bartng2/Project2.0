<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?= asset('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= asset('css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= asset('css/') ?>">
	<link href="<?= asset('css/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= asset('vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	<title>Thông tin chi tiết</title>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('home.pages.left_menu')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               @include('home.pages.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            <div class="container-fluid">
            	    <h1 class="h3 mb-2 text-gray-800">Thông tin nhân viên</h1>

               <div class="container py-5 h-50">
   
       <div class="container">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="190px" height="200px" src="<?= asset('storage/'.$show['Avatar']) ?>"><span class="font-weight-bold"><?= $show['HoTen'] ?></span><span class="text-black-50"><?= $show['ChucVu'] ?></span><span> </span></div>
        </div>
        <div class="col-md-3 border-right">
            <div class="p-5 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mã nhân viên</label><label class="form-control"><?= $show['MaNv'] ?></label></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Ngày sinh</label><label class="form-control"><?= $show['NgaySinh'] ?></label></div>
                    <div class="col-md-12"><label class="labels">Giới tính</label><label class="form-control"><?= $show['GioiTinh'] ?></label></div>
                   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-1 py-5">
                 <div class="col-md-12"><label class="labels">Quê quán</label><label class="form-control"></label></div>
                    <div class="col-md-12"><label class="labels">Số nhà / Chung cư</label><label class="form-control"></label></div>
                    <div class="col-md-12"><label class="labels">Tên đường</label><label class="form-control"></label></div>
                    <div class="col-md-12"><label class="labels">Số điện thoại</label><label class="form-control"></label></div>
                    <div class="col-md-12"><label class="labels">Địa chỉ email</label><label class="form-control"></label></div>
            </div>
        </div>
    </div>
    <form action="<?= route('qlns.edit', $show['id']) ?>">
    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Chỉnh sửa thông tin</button></div>
    </form>
</div>
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
    

    <!-- Bootstrap core JavaScript-->
    <script src="<?= asset('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= asset('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= asset('js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= asset('vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= asset('js/demo/datatables-demo.js') ?>"></script>

</body>
</html>