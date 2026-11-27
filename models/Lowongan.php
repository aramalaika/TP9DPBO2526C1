<?php
class Lowongan {
    private ?int $id;
    private string $namaLowongan;
    private string $departemen;
    private string $deskripsi;
    private string $status;

    public function __construct(
        ?int $id,
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ) {
        $this->id = $id;
        $this->namaLowongan = $namaLowongan;
        $this->departemen = $departemen;
        $this->deskripsi = $deskripsi;
        $this->status = $status;
    }

    public function getId(): ?int { return $this->id; }
    public function getNamaLowongan(): string { return $this->namaLowongan; }
    public function getDepartemen(): string { return $this->departemen; }
    public function getDeskripsi(): string { return $this->deskripsi; }
    public function getStatus(): string { return $this->status; }

    public function setNamaLowongan(string $namaLowongan): void {
        $this->namaLowongan = $namaLowongan;
    }

    public function setDepartemen(string $departemen): void {
        $this->departemen = $departemen;
    }

    public function setDeskripsi(string $deskripsi): void {
        $this->deskripsi = $deskripsi;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }
}
?>