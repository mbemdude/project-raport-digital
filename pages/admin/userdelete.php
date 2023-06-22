<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM tb_user WHERE id = ?";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(1, $_GET['id']);
    if($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Mata pelajaran berhasil dihapus";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "Mata pelajaran gagal dihapus";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=userread'>";
?>