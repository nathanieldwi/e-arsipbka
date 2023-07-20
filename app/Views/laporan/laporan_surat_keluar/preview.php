<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $pages ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Preview Data <?= $pages ?></h5>
                        <button type="button" class="btn btn-warning" onclick="history.back()">Kembali</button>
                    </div>
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?= base_url('assets/uploads/' . $result->berkas) ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection() ?>