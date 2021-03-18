<?php 
    // var_dump($mahasiswa); 
?>
<div class="container">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>Berhasil </strong><?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Mahasiswa . . ." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="sumbit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if(empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Mahasiswa Tidak Ditemukan
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach($mahasiswa as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a class="badge badge-danger float-right tombol-hapus" href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id'] ?>">Hapus</a>
                        <a class="badge badge-success float-right" href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id'] ?>">Ubah</a>
                        <a class="badge badge-primary float-right" href="<?= base_url(); ?>mahasiswa/detil/<?= $mhs['id'] ?>">Detil</a>
                    </li>                    
                <?php endforeach ?>
            </ul>
        </div>
    </div>    

</div>