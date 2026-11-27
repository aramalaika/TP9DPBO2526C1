
<?php
// ==========================================
// 1. IMPORT FILE KANDIDAT
// ==========================================
require_once __DIR__ . '/models/TabelKandidat.php';
require_once __DIR__ . '/views/ViewKandidat.php';
require_once __DIR__ . '/presenters/PresenterKandidat.php';

// ==========================================
// 2. IMPORT FILE LOWONGAN
// ==========================================
require_once __DIR__ . '/models/TabelLowongan.php';
require_once __DIR__ . '/views/ViewLowongan.php';
require_once __DIR__ . '/presenters/PresenterLowongan.php';

// ==========================================
// 3. INISIALISASI KANDIDAT
// ==========================================
$modelKandidat = new TabelKandidat(
    'localhost',
    'mvp_kandidat_db',
    'root',
    ''
);

$viewKandidat = new ViewKandidat();

$presenterKandidat = new PresenterKandidat(
    $modelKandidat,
    $viewKandidat
);

// ==========================================
// 4. INISIALISASI LOWONGAN
// ==========================================
$modelLowongan = new TabelLowongan(
    'localhost',
    'mvp_kandidat_db',
    'root',
    ''
);

$viewLowongan = new ViewLowongan();

$presenterLowongan = new PresenterLowongan(
    $modelLowongan,
    $viewLowongan
);

// ==========================================
// 5. MENANGANI FORM POST
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';

    // ---------- CRUD KANDIDAT ----------

    if ($action === 'tambah') {

        $presenterKandidat->tambahKandidat(
            trim($_POST['nama']),
            trim($_POST['posisi']),
            trim($_POST['domisili']),
            (int)$_POST['skorTes'],
            (int)$_POST['pengalamanTahun']
        );

    } elseif ($action === 'ubah') {

        $presenterKandidat->ubahKandidat(
            (int)$_POST['id'],
            trim($_POST['nama']),
            trim($_POST['posisi']),
            trim($_POST['domisili']),
            (int)$_POST['skorTes'],
            (int)$_POST['pengalamanTahun']
        );

    } elseif ($action === 'hapus') {

        $presenterKandidat->hapusKandidat(
            (int)$_POST['id']
        );

    // ---------- CRUD LOWONGAN ----------

    } elseif ($action === 'lowongan_tambah') {

        $presenterLowongan->tambahLowongan(
            trim($_POST['namaLowongan']),
            trim($_POST['departemen']),
            trim($_POST['deskripsi']),
            trim($_POST['status'])
        );

    } elseif ($action === 'lowongan_ubah') {

        $presenterLowongan->ubahLowongan(
            (int)$_POST['id'],
            trim($_POST['namaLowongan']),
            trim($_POST['departemen']),
            trim($_POST['deskripsi']),
            trim($_POST['status'])
        );

    } elseif ($action === 'lowongan_hapus') {

        $presenterLowongan->hapusLowongan(
            (int)$_POST['id']
        );

    } else {

        header("Location: index.php");
        exit();
    }

// ==========================================
// 6. MENANGANI HALAMAN GET
// ==========================================
} else {

    $screen = $_GET['screen'] ?? 'list';

    // ---------- HALAMAN KANDIDAT ----------

    if ($screen === 'add') {

        echo $presenterKandidat->tampilkanFormKandidat();

    } elseif ($screen === 'edit' && isset($_GET['id'])) {

        echo $presenterKandidat->tampilkanFormKandidat(
            (int)$_GET['id']
        );

    // ---------- HALAMAN LOWONGAN ----------

    } elseif ($screen === 'lowongan') {

        echo $presenterLowongan->tampilkanLowongan();

    } elseif ($screen === 'lowongan_add') {

        echo $presenterLowongan->tampilkanFormLowongan();

    } elseif ($screen === 'lowongan_edit' && isset($_GET['id'])) {

        echo $presenterLowongan->tampilkanFormLowongan(
            (int)$_GET['id']
        );

    // ---------- HALAMAN DEFAULT ----------

    } else {

        echo $presenterKandidat->tampilkanKandidat();

    }
}
?>
