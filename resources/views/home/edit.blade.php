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
    <title>Chỉnh sửa thông tin</title>

    <!-- Custom fonts for this template -->
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
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa thông tin nhân viên</h1>
               <div class="container py-1 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
        	<form action="<?= route('qlns.update', $edit['id']) ?>" method="POST" enctype="multipart/form-data">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #4835d4;">Thông tin nhân viên</h3>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" class="form-control form-control-lg" name="MaNv" value="<?= $edit['MaNv'] ?>" />
                        <label class="form-label" for="form3Examplev2">Mã nhân viên</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input value="<?= $edit['HoTen'] ?>" name="HoTen" type="text" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplev3">Họ tên nhân viên	</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input value="<?= $edit['NgaySinh'] ?>" name="NgaySinh" type="date" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplev3">Ngày sinh </label>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input value="<?= $edit['ChucVu'] ?>" name="ChucVu" type="text" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplev5">Chức vụ</label>
                      </div>

                    </div>
                    <div class="col-md-6">

                      <select class="select">
                        <option value="1">Chức vụ</option>
                        <option value="2">Trưởng phòng CNTT</option>
                        <option value="3">Trưởng phòng Marketing</option>
                        <option value="4">Nhân viên CNTT</option>
                        <option value="5">Nhân viên Marketing</option>
                      </select>

                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input value="<?= $edit['GioiTinh'] ?>" name="GioiTinh" type="text" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplev5">Giới tính</label>
                      </div>

                    </div>
                    <div class="col-md-6">

                      <select class="select">
                        <option value="1">Giới tính</option>
                        <option value="2">Nam</option>
                        <option value="3">Nữ</option>
                        <option value="4">Khác</option>
                      </select>

                    </div>
                    
                  </div>
                   <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input name="Avatar" type="file" />
                        <label class="form-label" for="form3Examplev5">Ảnh nhận dạng</label>
                         <div>
                          @if ($edit['Avatar'])
                              <img src="{{ asset('storage/'.$edit['Avatar']) }}" alt="Ảnh nhân viên" width="120">
                          @else
                              <span>Không có ảnh</span>
                          @endif
        </div>
                      </div>

                    </div>
                  
                  </div>

                </div>
              </div>
              <div class="col-lg-6 bg-indigo text-white">
                <div class="p-5">
                  <h3 class="fw-normal mb-5">Thông tin liên hệ</h3>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2">Quê quán</label>
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input type="text" id="form3Examplea3" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea3">Địa chỉ thường trú</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <input type="text" id="form3Examplea4" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea4">Số nhà/chung cư</label>
                      </div>

                    </div>
                    <div class="col-md-7 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <input type="text" id="form3Examplea5" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea5">Tên đường</label>
                      </div>

                    </div>
                  </div>

                  

                  <div class="row">
                    <div class="col-md-5 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <input type="text" id="form3Examplea7" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea7">Số điện thoại</label>
                      </div>

                    </div>
                    <div class="col-md-7 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <input type="text" id="form3Examplea8" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea8">Địa chỉ email</label>
                      </div>

                    </div>
                  </div>
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-light btn-lg"
                    data-mdb-ripple-color="dark">Sửa</button>
                    <button type="reset" class="btn btn-light btn-lg"
                    data-mdb-ripple-color="dark">Xóa</button>

                </div>
              </div>
            </div>
          </div>
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