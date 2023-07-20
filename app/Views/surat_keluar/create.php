<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $pages ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Tambah Data <?= $pages ?></h5>
                        <button type="button" class="btn btn-warning" onclick="history.back()">Kembali</button>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('surat-keluar/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat Keluar</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('no_surat') ? 'is-invalid' : '' ?>" name="no_surat" id="no_surat" autocomplete="off" placeholder="Masukan Nomor Surat Keluar" value="<?= set_value('no_surat') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('no_surat') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="judul_surat" class="col-sm-2 col-form-label">Judul Surat Masuk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('judul_surat') ? 'is-invalid' : '' ?>" name="judul_surat" id="judul_surat" autocomplete="off" placeholder="Masukan Judul Surat Keluar" value="<?= set_value('judul_surat') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('judul_surat') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_id" class="col-sm-2 col-form-label">Jenis Surat</label>
                                <div class="col-sm-10">
                                    <select name="jenis_id" id="jenis_id" class="form-select <?= validation_errors('jenis_id') ? 'is-invalid' : '' ?>">
                                        <option value="">--- Pilih Jenis Surat ---</option>
                                        <?php foreach ($jenis as $j) : ?>
                                            <option value="<?= $j->jenis_id ?>" <?= set_value('jenis_id') == $j->jenis_id ? 'selected' : '' ?>><?= $j->nama_jenis ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-text text-danger"><?= validation_show_error('jenis_id') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('tujuan') ? 'is-invalid' : '' ?>" name="tujuan" id="tujuan" autocomplete="off" placeholder="Masukan Tujuan" value="<?= set_value('tujuan') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('tujuan') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= validation_errors('tgl_keluar') ? 'is-invalid' : '' ?>" name="tgl_keluar" id="tgl_keluar" autocomplete="off" placeholder="Masukan Tanggal Keluar" value="<?= set_value('tgl_keluar') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('tgl_keluar') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control <?= validation_errors('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" cols="30" rows="3" placeholder="Masukan Keterangan"><?= set_value('keterangan') ?></textarea>
                                    <div class="form-text text-danger"><?= validation_show_error('keterangan') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="berkas" class="col-sm-2 col-form-label">Berkas</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control <?= validation_errors('berkas') ? 'is-invalid' : '' ?>" name="berkas" id="berkas" autocomplete="off" placeholder="Masukan Berkas" value="<?= set_value('berkas') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('berkas') ?></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection() ?>