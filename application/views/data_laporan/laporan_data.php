<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">LaporanKegiatan</h1>
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
                            foreach ($pelaporan->result() as $key => $data) { ?>
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
                                        <a href="<?= base_url('pelaporan/hapus/' . $data->kegiatan_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
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