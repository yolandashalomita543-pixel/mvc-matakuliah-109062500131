<?php
class MataKuliahController
{
    public function __construct(private MataKuliah $model) {}

    public function index(): void
    {
        $matakuliah = $this->model->getAll();
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/matakuliah/index.php';
    }

    public function create(): void
    {
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/matakuliah/create.php';
    }

    public function store(): void
    {
        [$data, $error] = $this->validateInput($_POST);
        if ($error) {
            $this->flash('error', $error);
            $this->redirect('create');
        }

        try {
            $this->model->insert($data);
            $this->flash('success', 'Mata kuliah berhasil ditambahkan.');
            $this->redirect('index');
        } catch (PDOException $e) {
            $msg = $e->getCode() === '23000'
                ? 'Kode mata kuliah sudah terdaftar.'
                : 'Gagal menyimpan data.';
            $this->flash('error', $msg);
            $this->redirect('create');
        }
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $matakuliah = $this->model->findById($id);

        if (!$matakuliah) {
            http_response_code(404);
            exit('Data mata kuliah tidak ditemukan.');
        }

        $flash = $this->pullFlash();
        require __DIR__ . '/../views/matakuliah/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        [$data, $error] = $this->validateInput($_POST);
        if ($error) {
            $this->flash('error', $error);
            $this->redirect('edit&id=' . $id);
        }

        try {
            $this->model->update($id, $data);
            $this->flash('success', 'Mata kuliah berhasil diperbarui.');
            $this->redirect('index');
        } catch (PDOException $e) {
            $msg = $e->getCode() === '23000'
                ? 'Kode mata kuliah sudah dipakai data lain.'
                : 'Gagal memperbarui data.';
            $this->flash('error', $msg);
            $this->redirect('edit&id=' . $id);
        }
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        try {
            $this->model->delete($id);
            $this->flash('success', 'Mata kuliah berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('error', 'Gagal menghapus data.');
        }
        $this->redirect('index');
    }

    private function validateInput(array $input): array
    {
        $data = [
            'kode_mk'  => trim($input['kode_mk'] ?? ''),
            'nama_mk'  => trim($input['nama_mk'] ?? ''),
            'sks'      => trim($input['sks'] ?? ''),
            'semester' => trim($input['semester'] ?? ''),
            'dosen'    => trim($input['dosen'] ?? '')
        ];

        foreach ($data as $value) {
            if ($value === '') {
                return [$data, 'Semua field wajib diisi.'];
            }
        }
        if (strlen($data['kode_mk']) > 10) {
            return [$data, 'Kode mata kuliah maksimal 10 karakter.'];
        }
        if (!ctype_digit($data['sks']) || (int) $data['sks'] < 1 || (int) $data['sks'] > 6) {
            return [$data, 'SKS harus angka 1 sampai 6.'];
        }
        if (!ctype_digit($data['semester']) || (int) $data['semester'] < 1 || (int) $data['semester'] > 8) {
            return [$data, 'Semester harus angka 1 sampai 8.'];
        }

        $data['sks'] = (int) $data['sks'];
        $data['semester'] = (int) $data['semester'];
        return [$data, null];
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }

    private function redirect(string $action): void
    {
        header('Location: index.php?page=matakuliah&action=' . $action);
        exit;
    }
}