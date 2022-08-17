<section class="content">
    <div class="container-fluid">
        <div class="card bounceIn">
            <div class="card-body">
                <form method="get" action="">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Filter Berdasarkan</label></br>
                            <select class="custom-select" name="filter" id="filter">
                                <option value="">Pilih</option>
                                <option value="1">Per Tanggal</option>
                                <option value="2">Per Bulan</option>
                                <option value="3">Per Tahun</option>
                            </select>
                        </div></br>
                        <div class="col-md-3" id="form-tanggal">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="col-md-3" id="form-bulan">
                            <label>Bulan</label><br>
                            <select class="custom-select" name="bulan">
                                <option value="">Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <br /><br />
                        </div>
                        <div class="col-md-3" id="form-tahun">
                            <label>Tahun</label><br>
                            <select class="custom-select" name="tahun">
                                <option value="">Pilih</option>
                                <?php
                                foreach ($option_tahun as $data) {
                                    echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                        <a href="<?= base_url('laporan') ?>" class="btn btn-danger"> <i class="fas fa-sync-alt"></i> Reset Filter</a>
                        <a href="<?php echo $url_cetak; ?>" class="btn btn-info"> <i class="fa fa-print"></i> Cetak PDF</a>
                    </div>
                    <br />
                </form>
                <div class="card-header">
                    <h3 class="card-title text-center">
                        <?php echo $ket; ?>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead class="bg-info text-white">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pemohon</th>
                                <th scope="col">Jumlah Pengajuan</th>
                                <th scope="col">Jumlah Pengajuan Diterima</th>
                                <th scope="col">Bunga</th>
                                <th scope="col">Total Kredit</th>
                                <th scope="col">Jangka Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($transaksi)) {
                                $no = 1;
                                foreach ($transaksi as  $data) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= indo_date($data->tanggal) ?></td>
                                        <td><?= $data->nama_nasabah ?></td>
                                        <td>Rp. <?= number_format($data->jumlah_pengajuan, 0, ',', '.')  ?></td>
                                        <td>Rp. <?= number_format($data->diterima, 0, ',', '.')  ?></td>
                                        <td><?= $data->bunga ?>%</td>
                                        <td>Rp. <?= number_format($data->total, 0, ',', '.')  ?></td>
                                        <td><?= $data->jangka_waktu ?> Bulan</td>

                                    </tr>

                            <?php
                                    $no++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>