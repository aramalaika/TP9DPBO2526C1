<?php
interface KontrakPresenterLowongan {
    public function tampilkanLowongan(): string;
    public function tampilkanFormLowongan(?int $id = null): string;

    public function tambahLowongan(
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ): void;

    public function ubahLowongan(
        int $id,
        string $namaLowongan,
        string $departemen,
        string $deskripsi,
        string $status
    ): void;

    public function hapusLowongan(int $id): void;
}
?>