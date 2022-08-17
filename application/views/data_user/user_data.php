<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data user</h1>
        <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>
    <div class="col-lg-12 mb-4" id="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info') ?>"></div>
        <?php if ($this->session->flashdata('info')) : ?>
        <?php endif; ?>
        <!-- Illustrations -->
        <div class="card border-bottom-primary shadow mb-4 bounce animated">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="1%">No</th>
                                <th>Kode User</th>
                                <th>Username</th>
                                <th>Nama Pengguna</th>
                                <th>Alamat</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->user_id ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <td><?php if ($data->level == '1') : ?>
                                            Admin Cabang
                                        <?php elseif ($data->level == '2') : ?>
                                            Anak Cabang
                                        <?php elseif ($data->level == '3') : ?>
                                            Nasabah
                                        <?php else : ?>
                                            <?= $data->level ?>
                                        <?php endif; ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modaledit<?php echo $data->user_id ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pen"></i></button>

                                        <a href="<?= base_url('user/hapus/' . $data->user_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /.modal-tambah -->
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white font-weight-bold">Tambah Data user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/simpan') ?>" name="tambah_user" method="POST" onsubmit="return form_user()">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode User</label>
                        <input type="text" name="kd_user" class="form-control" value="<?= $kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan username...">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password...">
                    </div>

                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengguna ...">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" placeholder="Masukan Alamat Hp ..."></textarea>
                    </div>


                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="">--pilih--</option>
                            <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin Cabang</option>
                            <option value="2" <?= set_value('level') == 1 ? "selected" : null ?>>Anak Cabang</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- /.modal-edit -->
<?php
foreach ($user->result_object() as $i) {
    $user_id = $i->user_id;
    $username = $i->username;
    $password = $i->password;
    $nama = $i->nama;
    $alamat = $i->alamat;
    $level = $i->level;
?>
    <div class="modal fade" id="modaledit<?php echo $user_id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Edit Data user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/edit') ?>" name="edit_user" method="POST" onsubmit="return form_edit_user()">
                    <?php echo form_hidden('id', $i->user_id); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="masukan nama user...">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="masukan nama user...">
                        </div>

                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="masukan nama user...">
                        </div>

                        <div class="form-group">
                            <label for="ket">Alamat</label>
                            <input type="text" name="alamat" value="<?php echo $alamat; ?>" class="form-control" placeholder="masukan Keterangan...">
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>Sales</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-success">Update <i class="fas fa-pen"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>