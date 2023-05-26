<?php
include_once '../Database.php';
if ($_POST) {
    session_start();
    $db = new Database();
    $queryInsertSiswa = <<<SQL
    INSERT INTO akademik.siswa(nisn, nama_siswa, alamat, no_hp) VALUE (:nisn, :nama_siswa, :alamat, :no_hp)
SQL;
    [$status] = $db->query($queryInsertSiswa, $_POST);

    $_SESSION['status'] = ['type' => 'success', 'message' => 'Data siswa berhasil dibuat'];
    header('Location: ./index.php');
}
?>

<?php include_once '../layout/head.php' ?>
<div class="max-w-4xl mx-auto">
    <form method="POST">
        <?php include_once './form.php' ?>
    </form>
</div>
<?php include_once '../layout/tail.php' ?>
