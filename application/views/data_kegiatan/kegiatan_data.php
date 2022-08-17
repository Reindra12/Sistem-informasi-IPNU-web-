<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kegiatan</h1>
        <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-success btn-icon-split">
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
                                <th>Nama kegiatan</th>
                                <th>Tempat</th>
                                <th>Tanggal</th>
                                <th>Pelaksana</th>
                                <th>Foto Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kegiatan->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->nama_kegiatan ?></td>
                                    <td><?= $data->tempat ?></td>
                                    <td><?= $data->tgl ?></td>
                                    <td><?= $data->nama_cabang ?></td>
                                    <td>
                                        <img style="border-radius: 1px;" src="assets/upload/kegiatan/<?= $data->foto_kegiatan ?>" alt="" width="100px">
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modaledit<?php echo $data->kegiatan_id ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pen"></i></button>

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
            <div class="modal-header bg-success">
                <h4 class="modal-title text-white font-weight-bold">Tambah Data kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kegiatan/simpan') ?>" name="tambah_kegiatan" method="POST" enctype="multipart/form-data" onsubmit="return form_kegiatan()">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control" placeholder="Masukan Nama kegiatan...">
                    </div>

                    <div class="form-group">
                        <label for="ket">Tempat Kegiatan</label>
                        <textarea name="tempat" class="form-control" placeholder="Masukan Nama Tempat..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal kegiatan</label>
                        <input type="date" name="tgl" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Pelaksana kegiatan</label>
                        <input type="text" class="form-control" readonly value="<?= $this->fungsi->user_login()->nama ?>">
                        <input type="hidden" name="pelaksana" value="<?= $this->fungsi->user_login()->cabang_id ?>">
                    </div>

                    <div class="form-group">
                        <label for="foto"> Foto </label>
                        <div class="custom-file">
                            <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
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
foreach ($kegiatan->result_object() as $i) {
    $kegiatan_id = $i->kegiatan_id;
    $nama_kegiatan = $i->nama_kegiatan;
    $tempat = $i->tempat;
    $tgl = $i->tgl;
    $foto_kegiatan = $i->foto_kegiatan;
?>
    <div class="modal fade" id="modaledit<?php echo $kegiatan_id ?>">
        <div class="modal-dialog scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Edit Data kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kegiatan/edit') ?>" name="edit_kegiatan" method="POST" onsubmit="return form_edit_kegiatan()">
                    <?php echo form_hidden('id', $i->kegiatan_id); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama kegiatan</label>
                            <input type="text" value="<?= $nama_kegiatan ?>" name="kegiatan" class="form-control" placeholder="Masukan Nama kegiatan...">
                        </div>

                        <div class="form-group">
                            <label for="ket">Tempat Kegiatan</label>
                            <textarea name="tempat" class="form-control" placeholder="Masukan Nama Tempat..."><?= $tempat ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tempat kegiatan</label>
                            <input type="date" value="<?= $tgl ?>" name="tgl" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Pelaksana kegiatan</label>
                            <input type="text" class="form-control" readonly value="<?= $this->fungsi->user_login()->nama ?>">
                            <input type="hidden" name="pelaksana" value="<?= $this->fungsi->user_login()->cabang_id ?>">
                        </div>

                        <div class="form-group">
                            <label for="foto"> Foto Kegiatan </label>
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="photo">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                <input type="hidden" name="fotoLama" value="<?= $foto_kegiatan ?>">
                            </div>
                        </div>
                        <div>
                            <center>
                                <div id="img">
                                    <img src="<?= base_url() ?>/assets/upload/kegiatan/<?= $foto_kegiatan ?>" id="outputImg" width="100" maxheight="200">
                                </div>
                            </center>
                            <br>
                            <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
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