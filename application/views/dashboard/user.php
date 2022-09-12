<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->


        <!-- ****** Top Header -->
        <?php $this->load->view('component/_header') ?>
        <!-- ****** Top Header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('component/_sidebar') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <!-- <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> User Akun
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Start Sales Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcard') 
                        ?> -->
                <!-- End Sales Charts Section -->

                <!-- Start Location and Earnings Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcardtwo') 
                        ?> -->
                <!-- Row -->
                <!-- multi-column ordering -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?= $this->session->flashdata('notif') ?>
                                <h4 class="card-title">Daftar User</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="<?php site_url('welcome/mas_user') ?>" class="btn btn-outline-info float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Profile</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Terverifikasi</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($user as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->foto_pengguna ?></td>
                                                    <td><?php echo $data->nama_pengguna ?></td>
                                                    <td><?php echo $data->email_pengguna ?></td>
                                                    <td><?php echo $data->telepon_pengguna ?></td>
                                                    <td><?php if($data->terverifikasi == 0){echo "Tidak";}else{echo "Ya";} ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('welcome/edit_user/' . $data->id_pengguna) ?>" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>

                                                        <a onclick="deleteConfirm('<?php echo site_url('welcome/deleteuser/' . $data->id_pengguna) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                            <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Row -->
                <!-- End Location and Earnings Charts Section -->

                <!-- Start Top Leader Table -->
                <!-- <?php //$this->load->view('component/_table') 
                        ?> -->
                <!-- End Top Leader Table -->
            </div>

            <!-- End Container fluid  -->

            <!-- footer -->
            <?php $this->load->view('component/_footer') ?>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- Jquery -->
    <?php $this->load->view('component/_jquery') ?>
    <!-- End JQuery -->

    <!-- Modal Delete-->
    <!-- Delete Header Modal -->
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="warning-header-modalLabel">Konfirmasi hapus data user
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    Apakah anda akan menghapus data tersebut?
                    <!-- End Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <a id="btn-delete" href="<?php echo site_url('welcome/deleteuser/' . $data->id_user) ?>" class="btn btn-success">Ya</a>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Form Add Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah User
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('welcome/save_user') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                        <div class="form-group">
                            <label for="username"><strong>Username</strong></label>
                            <input class="form-control" <?php echo form_error('username') ? 'is-invalid' : '' ?> type="email" name="username" min="20" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('username') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password"><strong>Password</strong></label>
                            <input class="form-control" <?php echo form_error('password') ? 'is-invalid' : '' ?> type="password" name="password" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('password') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role"><strong>Role Akses</strong></label>
                            <select class="form-control" name="role_id" required>
                                <option value="">--Pilih Role Akses--</option>
                                <?php foreach ($role as $data) : ?>
                                    <option value="<?php echo $data->role_id; ?>"> <?php echo $data->role_name; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nickname"><strong>Nickname</strong></label>
                            <input class="form-control" <?php echo form_error('nickname') ? 'is-invalid' : '' ?> type="text" name="nickname" min="20" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('nickname') ?>
                            </div>
                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>