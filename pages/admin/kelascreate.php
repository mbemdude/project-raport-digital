<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $validationSql = "SELECT * FROM tb_kelas WHERE kelas = :kelas";
    $stmtValidation = $db->prepare($validationSql);
    $stmtValidation->bindParam(':kelas', $_POST['kelas']);
    $stmtValidation->execute();

    if ($stmtValidation->rowCount() > 0) {
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fa fa-ban"></i> Gagal</h5>
            Kelas sudah ada
        </div>
        <?php
    } else {
        $insertSql = "INSERT INTO tb_kelas (kelas) VALUES (:kelas)";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(':kelas', $_POST['kelas']);
        
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=kelasread'>";
    }
}
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=kelasread">Kelas</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Kelas</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas">
                    <label for="guru_id">Wali Kelas</label>
                    <select name="guru_id">
                        <option value="">>-- Pilih Wali Kelas --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM tb_guru";
                        $stmt_guru = $db->prepare($selectSql);
                        $stmt_guru->execute();
                        
                        while($row_kelas = $stmt_guru->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_kelas['id'] .   "\">" . $row_kelas['guru'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <a href="?page=kelasread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>