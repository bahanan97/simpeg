<?php
    $addstyles = '_assets/vendor/datatables/dataTables.bootstrap4.min.css';
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_pegawai') ?>" class="btn btn-info float-right"><i class="fas fa-user-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Status Kepegawaian</th>
                <th>Aktif/Nonaktif</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM pegawai");
                    while ($data_pegawai = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data_pegawai['nip'] ?></td>
                        <td><?= $data_pegawai['nama_pegawai'] ?></td>
                        <td><?= $data_pegawai['email'] ?></td>
                        <td><?= $data_pegawai['alamat'] ?></td>
                        <td><?= $data_pegawai['no_hp'] ?></td>
                        <td><?= strtoupper($data_pegawai['status_kepegawaian']) ?></td>
                        <td><?= ucwords($data_pegawai['status_user']) ?></td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                            <a href="<?= base_url('edit_pegawai') ?>?id=<?= $data_pegawai['nip'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php

    $addscript = '
        <script src="'.asset('_assets/vendor/datatables/jquery.dataTables.min.js').'"></script>
        <script src="'.asset('_assets/vendor/datatables/dataTables.bootstrap4.min.js').'"></script>
    
        <script src="'.asset('_assets/js/demo/datatables-demo.js').'"></script>
    ';
    require_once "_template/_footer.php";
?>