<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
         <style>
          th.hidden {
            display: none;
          }
          td.hidden {
            display: none;
        </style>
    <title>Quản lí nhân sự - Admin</title>

    <!-- Custom fonts for this template -->
    <link href="<?= asset('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= asset('css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= asset('vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

</head>
@if(session('Thành công'))
    <div class="alert alert-success">
        {{ session('Thành công') }}
    </div>
@endif
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách nhân viên</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách và chức năng</h6>
                            <hr>
                        @if ($searchResults)
                            @include('home.pages.search')
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (count($searchResults) > 0)
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="hidden">Id</th>
                                            <th>Mã Nhân viên</th>
                                            <th>Họ tên</th>
                                            <th>Ngày Sinh</th>
                                            <th>Giới tính</th>
                                            <th>Chức vụ</th>
                                            <th>Ảnh</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       
                                         @foreach($searchResults as $items)
                                        <tr>
                                            <td class="hidden"><?= $items['id'] ?></td>
                                            <td><?= $items['MaNv'] ?></td>
                                            <td><?= $items['HoTen'] ?></td>
                                            <td><?= $items['NgaySinh'] ?></td>
                                            <td><?= $items['GioiTinh'] ?></td>
                                            <td><?= $items['ChucVu'] ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                 @if ($items['Avatar'])
                                                    <img src="<?= asset('storage/' . $items['Avatar']) ?>" alt="avatar" width="70">
                                                @endif
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <form action="<?= route('qlns.destroy', $items['id']) ?>" method="POST">
                                                </a>
                                                <a href="<?= route('qlns.show', $items['id']) ?>" class="btn btn-info btn-circle">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                 <a href="<?= route('qlns.edit',$items['id']) ?>" class="btn btn-warning btn-circle">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tfoot>
                                     @endforeach
                                </table>
                                @else
                                    <p>Không tìm thấy kết quả.</p>
                                @endif
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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