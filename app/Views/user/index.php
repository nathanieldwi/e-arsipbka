<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $pages ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">List Data <?= $pages ?></h5>
                        <button type="button" class="btn btn-primary" onclick="location.href='<?= base_url('user/create') ?>'">Tambah Data</button>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($result as $res) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $res->nama_lengkap ?></td>
                                        <td><?= $res->username ?></td>
                                        <td><?= $res->level ?></td>
                                        <td>
                                            <a href="<?= base_url('user/edit/' . $res->user_id) ?>" class="btn btn-info btn-sm">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                            <form action="user/delete/<?= $res->user_id ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya')">
                                                    <i class="align-middle" data-feather="trash"></i>
                                                </button>
                                            </form>
                                            <a href="<?= base_url('user/password/' . $res->user_id) ?>" class="btn btn-info btn-sm">
                                                <i class="align-middle" data-feather="lock"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection() ?>