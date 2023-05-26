<?php
include_once '../Database.php';
session_start();
$db = new Database();
$queryInsertSiswa = <<<SQL
    DELETE FROM akademik.siswa WHERE id = ?
SQL;
[$status] = $db->query($queryInsertSiswa, [$_GET['id']]);

$_SESSION['status'] = ['type' => 'success', 'message' => 'Data siswa berhasil dihapus'];
header('Location: ./index.php');
?>