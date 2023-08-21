<?php 
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM tb_kelas WHERE id = :id";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if(isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSql = "SELECT * FROM tb_kelas WHERE kelas = :kelas AND id != :id";
            $stmt = $db->prepare($validateSql);
            $stmt->bindParam('kelas', $_POST['kelas']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
?>
                <div class="alert alert-danger alert-dimissible">
                    <button type="button" class="close" data-disimissible="alert" aria-hidden="true"></button>
                    <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                    Kelas sudah ada
                </div>
        <?php 
            } else {
                $updateSql = "UPDATE tb_kelas SET id_guru = :id_guru, kelas = :kelas WHERE id = :id";
                $stmt = $db->prepare($updateSql);
                $stmt->bindParam(':kelas', $_POST['kelas']);
                $stmt->bindParam(':id_guru', $_POST['id_guru']);
                $stmt->bindParam(':id', $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=kelasread'>";
            }
        }
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Ubah Data Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=kelasread">Kelas</a></li>
                    <li class="breadcrumb-item active">Ubah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Kelas</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" value="<?php echo $row['kelas'] ?>">
                    <label for="id_guru">Guru</label>
                    <select name="id_guru" class="form-control">
                        <option value="">>-- Wali Kelas --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM tb_guru";
                        $stmt_kelas = $db->prepare($selectSql);
                        $stmt_kelas->execute();
                        
                        while($row_guru = $stmt_kelas->fetch(PDO::FETCH_ASSOC)) {
                            $selected = ($row_guru['id'] == $row['id_guru']) ? 'selected' : '';
                            echo "<option value=\"" . $row_guru['id'] . "\" $selected>" . $row_guru['nama'] . "</option>";
                        } 
                        ?>
                    </select>
                </div>
                <a href="?page=kelasread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_update" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>
<?php 
    } else {
        echo "<meta http-equiv='refresh' content='0;url=?page=kelasread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=kelasread'>";
}
?>