<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Mata Kuliah</h2>

    <?php if ($flash): ?>
        <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <a class="btn" href="index.php?page=matakuliah&action=create">Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Dosen</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($matakuliah as $i => $m): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($m['kode_mk']) ?></td>
            <td><?= htmlspecialchars($m['nama_mk']) ?></td>
            <td><?= (int) $m['sks'] ?></td>
            <td><?= (int) $m['semester'] ?></td>
            <td><?= htmlspecialchars($m['dosen']) ?></td>
            <td>
                <a class="btn" href="index.php?page=matakuliah&action=edit&id=<?= (int) $m['id'] ?>">Edit</a>
                <form method="post" action="index.php?page=matakuliah&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="id" value="<?= (int) $m['id'] ?>">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>