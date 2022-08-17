<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat Masuk</h1>
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
                                <th>Tanggal Masuk</th>
                                <th>Sifat Surat</th>
                                <th>Perihal Surat</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                                <th>Isi Singkat</th>
                                <th>Berkas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($arsip as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->no_surat ?></td>
                                    <td><?= $data->tgl_masuk ?></td>
                                    <td><?= $data->nama_sifat ?></td>
                                    <td><?= $data->nama_perihal ?></td>
                                    <td><?= $data->isi ?></td>
                                    <td><img style="border-radius: 1px;" src="assets/upload/surat_keluar/<?= $data->berkas ?>" alt="" width="100px" height="100px"></td>
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