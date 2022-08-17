<?php foreach ($cabang as $data) { ?>

    <form action="<?= base_url('cabang/edit') ?>" name="edit_cabang" method="POST" enctype="multipart/form-data" onsubmit="return form_edit_cabang()">
        <div class="modal-body">
            <input type="hidden" name="id" value="<?= $data->cabang_id ?>">
            <div class="form-group">
                <label>Nama Anak cabang</label>
                <input type="text" name="cabang" class="form-control" value="<?= $data->nama_cabang ?>" placeholder="Masukan Nama cabang...">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $data->alamat ?>" placeholder="Masukan Alamat Lengkap...">
            </div>

            <div class="form-group"><label>Kecamatan</label>
                <select name="kecamatan" class="form-control chosen">
                    <?php foreach ($kecamatan as $k) : ?>
                        <?php if ($data->kecamatan_id == $k->kecamatan_id) : ?>
                            <option value="<?= $k->kecamatan_id ?>" selected><?= $k->nama_kecamatan ?></option>
                        <?php else : ?>
                            <option value="<?= $k->kecamatan_id ?>"><?= $k->nama_kecamatan ?></option>
                        <?php endif; ?>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- foto -->
            <div class="form-group">
                <label for="foto"> Foto </label>
                <div class="custom-file">
                    <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                    <label class="custom-file-label" for="customFile">Pilih File</label>
                    <input type="hidden" name="fotoLama" value="<?= $data->foto_cabang ?>">
                </div>
            </div>
            <div>
                <center>
                    <div id="img">
                        <img src="<?= base_url() ?>/assets/upload/cabang/<?= $data->foto_cabang ?>" id="outputImg" width="100" maxheight="200">
                    </div>
                </center>
                <br>
                <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
            </div>


        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-success">Ubah <i class="fas fa-pen"></i></button>
        </div>
    </form>

<?php } ?>