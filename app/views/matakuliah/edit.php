<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Mata Kuliah</h2>

    <?php if ($flash): ?>
        <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?page=matakuliah&action=update">
        <input type="hidden" name="id" value="<?= (int) $matakuliah['id'] ?>">

        <label>Kode Mata Kuliah</label><br>
        <input type="text" name="kode_mk" maxlength="10"
               value="<?= htmlspecialchars($matakuliah['kode_mk']) ?>" required><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_mk"
               value="<?= htmlspecialchars($matakuliah['nama_mk']) ?>" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" min="1" max="6"
               value="<?= (int) $matakuliah['sks'] ?>" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" min="1" max="8"
               value="<?= (int) $matakuliah['semester'] ?>" required><br><br>

        <label>Dosen Pengampu</label><br>
        <input type="text" name="dosen"
               value="<?= htmlspecialchars($matakuliah['dosen']) ?>" required><br><br>

        <button class="btn" type="submit">Update</button>
        <a class="btn btn-gray" href="index.php?page=matakuliah">Kembali</a>
    </form>
</body>
</html>