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
                        <button type="button" class="btn btn-primary" onclick="location.href='<?= base_url('surat-masuk/create') ?>'">Tambah Data</button>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Judul Surat Masuk</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Asal Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Dokumen Surat</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($result as $res) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $res->no_surat ?></td>
                                        <td><?= Carbon\Carbon::parse($res->tgl_masuk)->toFormattedDateString();?></td>
                                        <td><?= $res->judul_surat ?></td>
                                        <td><?= Carbon\Carbon::parse($res->tgl_diterima)->toFormattedDateString() ?></td>
                                        <td><?= $res->asal_surat ?></td>
                                        <td><?= $res->nama_jenis ?></td>
                                        <!-- <td><a href="<?= base_url('assets/uploads/' . $res->dokumen) ?>" download><?= $res->dokumen ?></a></td> -->
                                        <td><a href="<?= base_url('surat-masuk/preview/' . $res->suratmasuk_id) ?>"><?= $res->dokumen ?></a></td>
                                        <td><?= $res->keterangan ?></td>
                                        <td>
                                            <a href="<?= base_url('surat-masuk/edit/' . $res->suratmasuk_id) ?>" class="btn btn-info btn-sm">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                            <form action="surat-masuk/delete/<?= $res->suratmasuk_id ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya')">
                                                    <i class="align-middle" data-feather="trash"></i>
                                                </button>
                                            </form>
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