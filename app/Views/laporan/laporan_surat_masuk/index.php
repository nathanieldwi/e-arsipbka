<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $pages ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="<?= base_url('cetak-surat-masuk') ?>" method="post" target="_blank">
                            <div class="row align-items-center">
                                <div class="col">
                                    <select name="jenis_id" id="jenis_id" class="form-select">
                                        <option value="">--- Pilih Jenis Surat ---</option>
                                        <?php foreach ($jenis as $j) : ?>
                                            <option value="<?= $j->jenis_id ?>"><?= $j->nama_jenis ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col"><input type="date" name="start" id="start" class="form-control"></div>
                                        <div class="col"><input type="date" name="end" id="end" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" name="cetak" id="cetak" class="btn btn-info d-inline">Cetak</button>
                                    <button type="reset" name="reset" id="reset" class="btn btn-secondary d-inline">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped table-bordered">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($result as $res) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $res->no_surat ?></td>
                                        <td><?= Carbon\Carbon::parse($res->tgl_masuk)->toFormattedDateString() ?></td>
                                        <td><?= $res->judul_surat ?></td>
                                        <td><?= Carbon\Carbon::parse($res->tgl_diterima)->toFormattedDateString() ?></td>
                                        <td><?= $res->asal_surat ?></td>
                                        <td><?= $res->nama_jenis ?></td>
                                        <td><a href="<?= base_url('laporan-surat-masuk/preview/' . $res->suratmasuk_id) ?>"><?= $res->dokumen ?></a></td>
                                        <td><?= $res->keterangan ?></td>
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