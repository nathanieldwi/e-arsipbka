<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= base_url() ?>">
            <span class="align-middle">
                <img src="<?= base_url() ?>assets/img/logo-kemahasiswaan-kotak.png" alt="" width="50px">
                E-Arsip BKA
            </span>
        </a>

        <?php if (session()->get('level') == 'superadmin') : ?>
            <ul class="sidebar-nav">

                <li class="sidebar-item <?= $pages == 'Dashboard' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url() ?>">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Master Data
                </li>

                <li class="sidebar-item <?= $pages == 'Surat Masuk' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('surat-masuk') ?>">
                        <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $pages == 'Surat Keluar' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('surat-keluar') ?>">
                        <i class="align-middle" data-feather="send"></i> <span class="align-middle">Surat Keluar</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Pengaturan
                </li>

                <li class="sidebar-item <?= $pages == 'Jenis' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('jenis') ?>">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Jenis</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $pages == 'User' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('user') ?>">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">User</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Laporan
                </li>

                <li class="sidebar-item <?= $pages == 'Laporan Surat Masuk' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('laporan-surat-masuk') ?>">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $pages == 'Laporan Surat Keluar' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('laporan-surat-keluar') ?>">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Surat Keluar</span>
                    </a>
                </li>

                <!-- <li class="sidebar-header">
                    Lainnya
                </li>

                <li class="sidebar-item <?= $pages == 'Tentang Sekolah' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('tentang-sekolah') ?>">
                        <i class="align-middle" data-feather="info"></i> <span class="align-middle">Tentang Sekolah</span>
                    </a>
                </li> -->
            </ul>
        <?php elseif (session()->get('level') == 'admin') : ?>
            <ul class="sidebar-nav">

                <li class="sidebar-item <?= $pages == 'Dashboard' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url() ?>">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Master Data
                </li>

                <li class="sidebar-item <?= $pages == 'Surat Masuk' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('surat-masuk') ?>">
                        <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $pages == 'Surat Keluar' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('surat-keluar') ?>">
                        <i class="align-middle" data-feather="send"></i> <span class="align-middle">Surat Keluar</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Laporan
                </li>

                <li class="sidebar-item <?= $pages == 'Laporan Surat Masuk' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('laporan-surat-masuk') ?>">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $pages == 'Laporan Surat Keluar' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('laporan-surat-keluar') ?>">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Surat Keluar</span>
                    </a>
                </li>

                <!-- <li class="sidebar-header">
                    Lainnya
                </li>

                <li class="sidebar-item <?= $pages == 'Tentang Sekolah' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('tentang-sekolah') ?>">
                        <i class="align-middle" data-feather="info"></i> <span class="align-middle">Tentang Sekolah</span>
                    </a>
                </li> -->
            </ul>
        <?php elseif (session()->get('level') == 'user') : ?>
            <ul class="sidebar-nav">

                <li class="sidebar-item <?= $pages == 'Dashboard' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url() ?>">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Laporan
                </li>

                <li class="sidebar-item <?= $pages == 'Laporan Surat Masuk' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('laporan-surat-masuk') ?>">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $pages == 'Laporan Surat Keluar' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('laporan-surat-keluar') ?>">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Laporan Surat Keluar</span>
                    </a>
                </li>

                <!-- <li class="sidebar-header">
                    Lainnya
                </li>

                <li class="sidebar-item <?= $pages == 'Tentang Sekolah' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= base_url('tentang-sekolah') ?>">
                        <i class="align-middle" data-feather="info"></i> <span class="align-middle">Tentang Sekolah</span>
                    </a>
                </li> -->
            </ul>
        <?php endif; ?>
    </div>
</nav>