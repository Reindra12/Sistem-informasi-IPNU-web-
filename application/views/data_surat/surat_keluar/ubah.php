<?php foreach ($keluar as $data) { ?>


    <!-- Begin Page Content -->
    <form action="<?= base_url('keluar/edit') ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="col-lg-12 mb-4" id="container">
                <div class="card border-bottom-success shadow mb-4 bounce animated">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $data->keluar_id ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" class="form-control" name="no_surat" value="<?= $data->no_surat ?>" placeholder="Masukan Nomor Surat..." required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_surat">Tanggal Keluar</label>
                                    <input type="date" class="form-control" value="<?= $data->tgl_keluar ?>" name="tgl_keluar" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" name="pengirim" value="<?= $this->fungsi->user_login()->nama ?>" readonly>
                        </div>

                        <div class="form-group"><label>Penerima</label>
                            <select name="penerima" class="form-control chosen">
                                <?php foreach ($cabang as $c) : ?>
                                    <?php if ($data->cabang_id == $c->cabang_id) : ?>
                                        <option value="<?= $c->cabang_id ?>" selected><?= $c->nama_cabang ?></option>
                                    <?php else : ?>
                                        <option value="<?= $c->cabang_id ?>"><?= $c->nama_cabang ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group"><label>sifat</label>
                                    <select name="sifat" class="form-control chosen">
                                        <?php foreach ($sifat as $s) : ?>
                                            <?php if ($data->sifat_id == $s->sifat_id) : ?>
                                                <option value="<?= $s->sifat_id ?>" selected><?= $s->nama_sifat ?></option>
                                            <?php else : ?>
                                                <option value="<?= $s->sifat_id ?>"><?= $s->nama_sifat ?></option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><label>perihal</label>
                                    <select name="perihal" class="form-control chosen">
                                        <?php foreach ($perihal as $k) : ?>
                                            <?php if ($data->perihal_id == $k->perihal_id) : ?>
                                                <option value="<?= $k->perihal_id ?>" selected><?= $k->nama_perihal ?></option>
                                            <?php else : ?>
                                                <option value="<?= $k->perihal_id ?>"><?= $k->nama_perihal ?></option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isi">Ringkasan Isi Surat</label>
                            <textarea class="form-control" name="isi" id="" cols="30" rows="10" placeholder="Masuka Isi Ringkasan Surat..."><?= $data->isi ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto"> Foto </label>
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                <input type="hidden" name="fotoLama" value="<?= $data->berkas_keluar ?>">
                            </div>
                        </div>
                        <div>
                            <center>
                                <div id="img">
                                    <img src="<?= base_url() ?>/assets/upload/surat_keluar/<?= $data->berkas_keluar ?>" id="outputImg" width="300" maxheight="300">
                                </div>
                            </center>
                            <br>
                            <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        </div>
                    </div>

                </div>
                <div class="card-footer justify-content-between">
                    <button type="submit" class="btn btn-success">Ubah <i class="fas fa-pen"></i></button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>