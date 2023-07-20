<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle"><?= $pages ?></h1>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="<?= base_url() ?>assets/uploads/<?= $account->sampul ?>" alt="<?= $account->nama_lengkap ?>" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0"><?= $account->nama_lengkap ?></h5>
                        <div class="text-muted mb-2"><?= $account->level ?></div>

                        <div>
                            <a class="btn btn-primary" href="<?= base_url('edit_profile') ?>"><span data-feather="user"></span> Edit Profile</a>
                            <a class="btn btn-primary" href="<?= base_url('edit_password') ?>"><span data-feather="lock"></span> Edit Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>