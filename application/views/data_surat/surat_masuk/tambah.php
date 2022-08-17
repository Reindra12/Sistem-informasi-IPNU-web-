<form action="<?= base_url('cabang/simpan') ?>" name="tambah_cabang" method="POST" enctype="multipart/form-data" onsubmit="return form_cabang()">
    <div class="modal-body">
        <div class="form-group">
            <label>Nama cabang</label>
            <input type="text" name="cabang" class="form-control" placeholder="Masukan Nama cabang...">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Masukan Alamat Lengkap..."></textarea>
        </div>

        <div class="form-group"><label>Kecamatan</label>
            <select name="kecamatan" class="form-control chosen">
                <option value="">--Pilih Kecamatan--</option>
                <?php foreach ($kecamatan as $k) : ?>
                    <option value="<?= $k->kecamatan_id ?>"><?= $k->nama_kecamatan ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="username"> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda">
        </div>

        <div class="form-group">
            <label for="password"> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda">
        </div>
        <div class="card-body">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    Format
                    <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                </div>
            </div>
        </div>
        <!-- foto -->
        <div class="form-group">
            <label for="foto"> Foto </label>
            <div class="custom-file">
                <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                <label class="custom-file-label" for="customFile">Pilih File</label>
            </div>
        </div>


    </div>
    <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
    </div>
</form>