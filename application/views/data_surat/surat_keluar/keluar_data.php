<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Surat Keluar</h1>
        <a href="<?= base_url('keluar/tambah') ?>" class="btn btn-sm btn-success btn-icon-split">
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
        <div class="card border-bottom-success shadow mb-4 bounce animated">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-success text-white">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Keluar</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                                <th>Status</th>
                                <th>Berkas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($keluar->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->no_surat ?></td>
                                    <td><?= $data->tgl_keluar ?></td>
                                    <td> <?= $data->nama ?></td>
                                    <td><?= $data->nama_cabang ?></td>
                                    <td>
                                        <?php if ($data->status_keluar == '1') : ?>
                                            <font color="red"><b>Belum Dibaca</b></font>
                                        <?php elseif ($data->status_keluar == '2') : ?>
                                            <font color="blue"><b>Sudah Dibaca</b></font>
                                        <?php endif; ?>
                                    </td>
                                    <td><img style="border-radius: 1px;" src="assets/upload/surat_keluar/<?= $data->berkas_keluar ?>" alt="" width="100px" height="100px"></td>
                                    <td>
                                        <?php if ($data->status_keluar == '2') {
                                            echo
                                            '<a href="" class="btn btn-circle btn-success btn-sm disabled"><i class="fas fa-pen"></i></a>';
                                        } else {
                                        ?>
                                            <a href="<?= base_url('keluar/ubah/' . $data->keluar_id) ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pen"></i></a>

                                        <?php } ?>

                                        <?php if ($data->status_keluar == '2') {
                                            echo
                                            '<a href="" class="btn btn-circle btn-danger btn-sm disabled"><i class="fas fa-trash"></i></a>';
                                        } else {
                                        ?>
                                            <a href="<?= base_url('keluar/hapus/' . $data->keluar_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>

                                        <?php } ?>

                                        <button data-toggle="modal" data-target="#modaldetail<?php echo $data->keluar_id ?>" class="btn btn-circle btn-primary btn-sm"><i class="fas fa-eye"></i></button>
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

<!-- /.modal-detail -->
<?php
foreach ($keluar->result_object() as $i) {
    $keluar_id = $i->keluar_id;
    $tgl_keluar = $i->tgl_keluar;
    $no_surat = $i->no_surat;
    $pengirim = $i->nama;
    $penerima = $i->nama_cabang;
    $nama_perihal = $i->nama_perihal;
    $nama_sifat = $i->nama_sifat;
    $isi = $i->isi;
    $berkas_keluar = $i->berkas_keluar;
    $status_keluar = $i->status_keluar;
?>
    <div class="modal fade" id="modaldetail<?php echo $keluar_id ?>">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Detail Surat Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_hidden('id', $i->keluar_id); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nomor Surat</label>
                                <input readonly type="text" name="keluar" value="<?php echo $no_surat; ?>" class="form-control" placeholder="masukan nama keluar...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ket">Tanggal Keluar</label>
                                <input readonly type="text" name="ket" value="<?php echo $tgl_keluar; ?>" class="form-control" placeholder="masukan Keterangan...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Pengirim</label>
                                <input readonly type="text" name="keluar" value="<?php echo $pengirim; ?>" class="form-control" placeholder="masukan nama keluar...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ket">Penerima</label>
                                <input readonly type="text" name="ket" value="<?php echo $penerima; ?>" class="form-control" placeholder="masukan Keterangan...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Perihal Surat</label>
                                <input readonly type="text" name="keluar" value="<?php echo $nama_perihal; ?>" class="form-control" placeholder="masukan nama keluar...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ket">Sifat Surat</label>
                                <input readonly type="text" name="ket" value="<?php echo $nama_sifat; ?>" class="form-control" placeholder="masukan Keterangan...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Isi Ringkas Surat</label>
                                <input readonly type="text" name="keluar" value="<?php echo $isi; ?>" class="form-control" placeholder="masukan nama keluar...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ket">Status</label>
                                <input readonly type="text" value="<?php if ($data->status_keluar == '1') : ?>
                                            Belum Dibaca
                                        <?php elseif ($data->status_keluar == '2') : ?>
                                            Sudah Dibaca
                                        <?php endif; ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <img style="border-radius: 1px;" src="assets/upload/surat_keluar/<?= $berkas_keluar ?>" alt="" width="300px" height="300px">
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>