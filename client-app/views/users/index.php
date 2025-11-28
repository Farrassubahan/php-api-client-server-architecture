<!DOCTYPE html>
<html>

<head>
    <title>Data Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            text-decoration: none;
            color: #0366d6;
        }

        .btn {
            padding: 6px 10px;
            border: 1px solid #ddd;
            background: #f8f8f8;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background: #e8e8e8;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
        }

        .modal-header {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .close {
            float: right;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>Daftar User</h2>

    <!-- Tombol Tambah User -->
    <button class="btn" onclick="openModal('createModal')">+ Tambah User</button>
    <br><br>

    <!-- Tabel Data -->
    <?php if (!empty($users)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['created_at']) ?></td>
                    <td>
                        <button class="btn"
                            onclick="openEditModal('<?= $user['id'] ?>', '<?= $user['name'] ?>', '<?= $user['email'] ?>')">
                            Edit
                        </button>
                        <a class="btn"
                            href="web.php?action=delete&id=<?= $user['id'] ?>"
                            onclick="return confirm('Yakin hapus user ini?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Tidak ada data user.</p>
    <?php endif; ?>

    <!-- Modal Create User -->
    <div class="modal" id="createModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('createModal')">&times;</span>
            <div class="modal-header">Tambah User</div>
            <form method="POST" action="web.php?action=store">
                <input type="text" name="name" placeholder="Nama" required><br><br>
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="text" name="password" placeholder="Password" required><br><br>
                <button class="btn" type="submit">Simpan</button>
            </form>
        </div>
    </div>
    <!-- Modal Edit User -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <div class="modal-header">Edit User</div>

            <form id="editForm" method="POST">
                <label>Nama</label><br>
                <input type="text" id="editName" name="name" required><br><br>

                <label>Email</label><br>
                <input type="email" id="editEmail" name="email" required><br><br>

                <label>Password (kosongkan jika tidak ingin mengubah)</label><br>
                <input type="password" id="editPassword" name="password"><br><br>

                <button class="btn" type="submit">Update</button>
            </form>

        </div>
    </div>


    <!-- Modal Script -->
    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'block';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        function openEditModal(id, name, email) {
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editForm').action = 'web.php?action=update&id=' + id;
            openModal('editModal');
        }
    </script>

</body>

</html>