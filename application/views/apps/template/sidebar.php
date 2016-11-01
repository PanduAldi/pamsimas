
  <div class="tanggal">
	<?php echo "Tanggal : ".date('d M Y') ?> 	
  </div>

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('home') ?>"> <i class="fa fa-home"></i> Home</a>
                        </h4>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <i class="fa fa-folder"></i> Master Data</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <i class="fa fa-users"></i> <a href="<?php echo site_url('pelanggan') ?>">Pelanggan</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-flash text-success"></span><a href="<?php echo site_url('golongan') ?>">Golongan</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-credit-card"></i>
                            </span>Transaksi</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('pendaftaran') ?>"><i class="fa fa-list"></i> Pendaftaran</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('pembayaran') ?>"><i class="fa fa-money"></i> Pembayaran</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('laporan') ?>"><span class="glyphicon glyphicon-file">
                            </span>Laporan</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-cog"></i> Akun User</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('ganti_password') ?>"><i class="fa fa-key"></i> Ubah Password</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('edit_user') ?>"><i class="fa fa-gear"></i> Edit User</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('user') ?>"><i class="fa fa-user"></i> User</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('logout') ?>"> <i class="fa fa-sign-out"></i> Logout</a>
                        </h4>
                    </div>
                </div>
            </div>

<style>
	.glyphicon { margin-right:10px; }
	.panel-body { padding:0px; }
	.panel-body table tr td { padding-left: 15px }
	.panel-body .table {margin-bottom: 0px; }
</style>