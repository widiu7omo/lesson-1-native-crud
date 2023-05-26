<?php
include_once '../Database.php';
$db = new Database();
if ($_POST) {
    session_start();
    $queryInsertSiswa = <<<SQL
    UPDATE akademik.siswa SET nisn = :nisn, nama_siswa = :nama_siswa, alamat =:alamat, no_hp=:no_hp WHERE id = :id
SQL;
    [$status] = $db->query($queryInsertSiswa, $_POST);

    $_SESSION['status'] = ['type' => 'success', 'message' => 'Data siswa berhasil diubah'];
    header('Location: ./index.php');
}
$queryGetMahasiswa = <<<SQL
SELECT * FROM akademik.siswa WHERE id = ?
SQL;

$row = $db->get($queryGetMahasiswa, [$_GET['id']]);
?>

<?php include_once '../layout/head.php' ?>
<div class="max-w-4xl mx-auto">
    <form method="POST">
        <?php include_once './form.php' ?>
    </form>
</div>
<?php include_once '../layout/tail.php' ?>
