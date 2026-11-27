
<?php
require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/KontrakLowongan.php';
require_once __DIR__ . '/Lowongan.php';

class TabelLowongan extends DB implements KontrakLowongan {

    public function __construct(
        string $host = "localhost",
        string $db_name = "mvp_kandidat_db",
        string $username = "root",
        string $password = ""
    ) {
        parent::__construct($host, $db_name, $username, $password);
    }

    private function mapRowToLowongan(array $row): Lowongan {
        return new Lowongan(
            (int)$row['id'],
            $row['nama_lowongan'],
            $row['departemen'],
            $row['deskripsi'] ?? '',
            $row['status']
        );
    }

    public function getAllLowongan(): array {
        $query = "SELECT * FROM lowongan ORDER BY id DESC";

        $this->executeQuery($query);
        $rows = $this->getAllResult();

        $list = [];

        foreach ($rows as $row) {
            $list[] = $this->mapRowToLowongan($row);
        }

        return $list;
    }

    public function getLowonganById(int $id): ?Lowongan {
        $query = "SELECT * FROM lowongan WHERE id = :id LIMIT 1";

        $this->executeQuery($query, [':id' => $id]);
        $rows = $this->getAllResult();

        if (empty($rows)) {
            return null;
        }

        return $this->mapRowToLowongan($rows[0]);
    }

    public function addLowongan(
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ): void {
        $query = "INSERT INTO lowongan
                  (nama_lowongan, departemen, deskripsi, status)
                  VALUES (:nama_lowongan, :departemen, :deskripsi, :status)";

        $params = [
            ':nama_lowongan' => $namaLowongan,
            ':departemen' => $departemen,
            ':deskripsi' => $deskripsi,
            ':status' => $status
        ];

        $this->executeQuery($query, $params);
    }

    public function updateLowongan(
        int $id,
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ): void {
        $query = "UPDATE lowongan
                  SET nama_lowongan = :nama_lowongan,
                      departemen = :departemen,
                      deskripsi = :deskripsi,
                      status = :status
                  WHERE id = :id";

        $params = [
            ':id' => $id,
            ':nama_lowongan' => $namaLowongan,
            ':departemen' => $departemen,
            ':deskripsi' => $deskripsi,
            ':status' => $status
        ];

        $this->executeQuery($query, $params);
    }

    public function deleteLowongan(int $id): void {
        $query = "DELETE FROM lowongan WHERE id = :id";

        $this->executeQuery($query, [':id' => $id]);
    }
}
?>
