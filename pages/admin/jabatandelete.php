<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM jabatan WHERE id = ?";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(1, $_GET['id']);
    if($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Jabatan berhasil dihapus";
    } else {
        $_SESSION['haisl'] = false;
        $_SESSION['pesan'] = "Jabatan gagal dihapus";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=jabatanread'>";
?>