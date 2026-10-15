<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Mata Kuliah</h2>

    <?php if ($flash): ?>
        <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?page=matakuliah&action=store">
        <label>Kode Mata Kuliah</label><br>
        <input type="text" name="kode_mk" maxlength="10" required><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_mk" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" min="1" max="6" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" min="1" max="8" required><br><br>

        <label>Dosen Pengampu</label><br>
        <input type="text" name="dosen" required><br><br>

        <button class="btn" type="submit">Simpan</button>
        <a class="btn btn-gray" href="index.php?page=matakuliah">Kembali</a>
    </form>
</body>
</html>