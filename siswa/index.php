<?php
include_once '../Database.php';
$db = new Database();
$queryAmbilDataSiswa = <<<SQL
    SELECT * FROM akademik.siswa
SQL;

$result = $db->get($queryAmbilDataSiswa)
?>
<?php include_once '../layout/head.php' ?>
    <div class="mx-auto max-w-4xl p-6 space-y-2">
        <div class="w-full flex justify-between">
            <h3 class="text-2xl font-bold">Data Siswa</h3>
            <a href="./create.php" class="bg-red-100 text-red-500 border border-red-200 px-4 py-1 h-fit">Siswa Baru</a>
        </div>
        <?php if (isset($_SESSION['status'])): ?>
            <?php $sessionType = $_SESSION['status']['type'] ?>
            <?php $sessionMessage = $_SESSION['status']['message'] ?>
            <div class="px-6 py-4 flex flex-col border space-y-1 <?php echo ($sessionType == 'success') ? 'border-green-200 bg-green-50' : 'bg-red-50 border-red-200' ?>">
                <h3 class="text-lg font-bold text-gray-600"><?php echo ($sessionType == 'success') ? 'Berhasil' : 'Terjadi Kesalahan' ?></h3>
                <div class="text-sm text-gray-500"><?php echo $sessionMessage ?></div>
            </div>
            <?php unset($_SESSION['status']) ?>
        <?php endif; ?>
        <table class="w-full mx-auto border border-gray-300 pt-8">
            <thead>
            <tr class="bg-gray-100 text-center">
                <th class="px-4 py-1 border-b border-gray-300">NISN</th>
                <th class="px-4 py-1 border-b border-gray-300">Nama</th>
                <th class="px-4 py-1 border-b border-gray-300">Alamat</th>
                <th class="px-4 py-1 border-b border-gray-300">Nomor HP</th>
                <th class="px-4 py-1 border-b border-gray-300">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row): ?>
                <tr class="divide-y">
                    <td class="px-4 py-1 border-b border-gray-300"><?php echo $row->nisn ?></td>
                    <td class="px-4 py-1 border-b border-gray-300"><?php echo $row->nama_siswa ?></td>
                    <td class="px-4 py-1 border-b border-gray-300"><?php echo $row->alamat ?></td>
                    <td class="px-4 py-1 border-b border-gray-300"><?php echo $row->no_hp ?></td>
                    <td class="px-4 py-1 border-b border-gray-300">
                        <a class="w-5 border border-orange-200 text-xs text-orange-500 px-2" href="update.php?id=<?php echo $row->id ?>">Edit</a>
                        <a class="w-5 border border-red-200 text-xs text-red-500 bg-red-50 px-2" href="delete.php?id=<?php echo $row->id ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include_once '../layout/tail.php' ?>