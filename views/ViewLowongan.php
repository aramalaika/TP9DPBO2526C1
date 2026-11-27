
<?php
require_once __DIR__ . '/KontrakViewLowongan.php';

class ViewLowongan implements KontrakViewLowongan {
    private string $skinPath;
    private string $formPath;

    public function __construct(string $skinPath = '', string $formPath = '') {
        $this->skinPath = $skinPath ?: __DIR__ . '/../template/lowongan_skin.html';
        $this->formPath = $formPath ?: __DIR__ . '/../template/lowongan_form.html';
    }

    public function renderDaftar(string $tableRowsHtml, int $totalData): string {
        $template = file_get_contents($this->skinPath);

        $tokens = [
            '{{TABLE_ROWS}}' => $tableRowsHtml,
            '{{TOTAL_DATA}}' => (string)$totalData,
        ];

        return str_replace(array_keys($tokens), array_values($tokens), $template);
    }

    public function renderForm(string $title, string $action, array $formData = []): string {
        $template = file_get_contents($this->formPath);

        $status = $formData['status'] ?? 'Dibuka';

        $tokens = [
            '{{FORM_TITLE}}' => htmlspecialchars($title),
            '{{ACTION}}' => htmlspecialchars($action),
            '{{ID}}' => htmlspecialchars((string)($formData['id'] ?? '')),
            '{{NAMA_LOWONGAN}}' => htmlspecialchars($formData['namaLowongan'] ?? ''),
            '{{DEPARTEMEN}}' => htmlspecialchars($formData['departemen'] ?? ''),
            '{{DESKRIPSI}}' => htmlspecialchars($formData['deskripsi'] ?? ''),
            '{{STATUS}}' => htmlspecialchars($status),
            '{{STATUS_DIBUKA}}' => $status === 'Dibuka' ? 'selected' : '',
            '{{STATUS_DITUTUP}}' => $status === 'Ditutup' ? 'selected' : '',
        ];

        return str_replace(array_keys($tokens), array_values($tokens), $template);
    }
}
?>
