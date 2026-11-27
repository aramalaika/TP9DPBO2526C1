<?php
/**
 * Kontrak View Lowongan (Strict Passive View)
 * View hanya bertugas menampilkan HTML.
 */
interface KontrakViewLowongan {
    public function renderDaftar(string $tableRowsHtml, int $totalData): string;

    public function renderForm(
        string $title,
        string $action,
        array $formData = []
    ): string;
}
?>