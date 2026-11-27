
<?php
require_once __DIR__ . '/KontrakPresenterLowongan.php';
require_once __DIR__ . '/../models/KontrakLowongan.php';
require_once __DIR__ . '/../models/Lowongan.php';
require_once __DIR__ . '/../views/KontrakViewLowongan.php';

class PresenterLowongan implements KontrakPresenterLowongan {
    private KontrakLowongan $model;
    private KontrakViewLowongan $view;

    public function __construct(KontrakLowongan $model, KontrakViewLowongan $view) {
        $this->model = $model;
        $this->view = $view;
    }

    /**
     * Helper untuk merakit satu baris HTML tabel lowongan.
     */
    private function buildRowHtml(int $no, Lowongan $lowongan): string {
        $id = (int)$lowongan->getId();
        $nama = htmlspecialchars($lowongan->getNamaLowongan());
        $departemen = htmlspecialchars($lowongan->getDepartemen());
        $deskripsi = htmlspecialchars($lowongan->getDeskripsi());
        $status = htmlspecialchars($lowongan->getStatus());

        $statusClass = $status === 'Dibuka'
            ? 'status-dibuka'
            : 'status-ditutup';

        return "<tr>
            <td>{$no}</td>
            <td><strong>{$nama}</strong></td>
            <td>{$departemen}</td>
            <td>{$deskripsi}</td>
            <td><span class='status {$statusClass}'>{$status}</span></td>
            <td>
                <a href='index.php?screen=lowongan_edit&id={$id}'
                   class='btn btn-edit'>Edit</a>

                <form method='post' action='index.php'
                      class='action-form'
                      onsubmit=\"return confirm('Hapus lowongan ini?')\">

                    <input type='hidden' name='action' value='lowongan_hapus'>
                    <input type='hidden' name='id' value='{$id}'>

                    <button type='submit' class='btn btn-delete'>
                        Hapus
                    </button>
                </form>
            </td>
        </tr>";
    }

    public function tampilkanLowongan(): string {
        $listLowongan = $this->model->getAllLowongan();
        $totalLowongan = count($listLowongan);

        $rowsHtml = '';

        if (empty($listLowongan)) {
            $rowsHtml = '<tr>
                <td colspan="6" style="text-align:center;padding:24px;">
                    Belum ada data lowongan.
                </td>
            </tr>';
        } else {
            $no = 1;

            foreach ($listLowongan as $lowongan) {
                $rowsHtml .= $this->buildRowHtml($no, $lowongan);
                $no++;
            }
        }

        return $this->view->renderDaftar($rowsHtml, $totalLowongan);
    }

    public function tampilkanFormLowongan(?int $id = null): string {
        if ($id !== null) {
            $lowongan = $this->model->getLowonganById($id);

            if ($lowongan === null) {
                header("Location: index.php?screen=lowongan");
                exit();
            }

            $formData = [
                'id' => $lowongan->getId(),
                'namaLowongan' => $lowongan->getNamaLowongan(),
                'departemen' => $lowongan->getDepartemen(),
                'deskripsi' => $lowongan->getDeskripsi(),
                'status' => $lowongan->getStatus(),
            ];

            return $this->view->renderForm(
                "Ubah Data Lowongan",
                "lowongan_ubah",
                $formData
            );
        }

        return $this->view->renderForm(
            "Tambah Lowongan Baru",
            "lowongan_tambah",
            []
        );
    }

    public function tambahLowongan(
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ): void {
        $this->model->addLowongan(
            $namaLowongan,
            $departemen,
            $deskripsi,
            $status
        );

        header("Location: index.php?screen=lowongan");
        exit();
    }

    public function ubahLowongan(
        int $id,
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ): void {
        $this->model->updateLowongan(
            $id,
            $namaLowongan,
            $departemen,
            $deskripsi,
            $status
        );

        header("Location: index.php?screen=lowongan");
        exit();
    }

    public function hapusLowongan(int $id): void {
        $this->model->deleteLowongan($id);

        header("Location: index.php?screen=lowongan");
        exit();
    }
}
?>
