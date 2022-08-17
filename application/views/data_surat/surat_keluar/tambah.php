<!-- Begin Page Content -->
<form action="<?= base_url('keluar/simpan') ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="col-lg-12 mb-4" id="container">
            <div class="card border-bottom-success shadow mb-4 bounce animated">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="no_surat">Nomor Surat</label>
                                <input type="text" class="form-control" name="no_surat" placeholder="Masukan Nomor Surat..." required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="no_surat">Tanggal Kelar</label>
                                <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" name="tgl_keluar" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" name="pengirim" value="<?= $this->fungsi->user_login()->nama ?>" readonly>
                    </div>

                    <div class="form-group"><label>Penerima</label>
                        <select name="cabang" class="form-control chosen">
                            <option value="">--Pilih Penerima--</option>
                            <?php foreach ($cabang as $c) : ?>
                                <option value="<?= $c->cabang_id ?>"><?= $c->nama_cabang ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"><label>Sifat Surat</label>
                                <select name="sifat" class="form-control chosen">
                                    <option value="">--Pilih Sifat Surat --</option>
                                    <?php foreach ($sifat as $s) : ?>
                                        <option value="<?= $s->sifat_id ?>"><?= $s->nama_sifat ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label>Perihal Surat</label>
                                <select name="perihal" class="form-control chosen">
                                    <option value="">--Pilih Perihal Surat --</option>
                                    <?php foreach ($perihal as $p) : ?>
                                        <option value="<?= $p->perihal_id ?>"><?= $p->nama_perihal ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Ringkasan Isi Surat</label>
                        <textarea class="form-control" name="isi" id="" cols="30" rows="10" placeholder="Masuka Isi Ringkasan Surat..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto"> Foto </label>
                        <div class="custom-file">
                            <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer justify-content-between">
                    <button type="submit" class="btn btn-success">Kirim <i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>