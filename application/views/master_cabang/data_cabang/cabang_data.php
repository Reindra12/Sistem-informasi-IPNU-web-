<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pimpinan Cabang</h1>
        <a href="<?= base_url('cabang/tambah') ?>" class="btn btn-sm btn-success btn-icon-split">
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
                                <th>Nama Anak cabang</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Username</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($cabang->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->nama_cabang ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <td><?= $data->nama_kecamatan ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><img style="border-radius: 1px;" src="assets/upload/cabang/<?= $data->foto_cabang ?>" alt="" width="100px"></td>
                                    <td>
                                        <a href="<?= base_url('cabang/ubah/' . $data->cabang_id) ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pen"></i></a>

                                        <a href="<?= base_url('cabang/hapus/' . $data->cabang_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
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