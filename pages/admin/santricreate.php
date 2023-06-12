<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $insertSql = "INSERT INTO tb_santri (nis, nisn, nama_santri, kelas_id) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($insertSql);
    $stmt->bindParam(1, $_POST['nis']);
    $stmt->bindParam(2, $_POST['nisn']);
    $stmt->bindParam(3, $_POST['nama_santri']);
    $stmt->bindParam(4, $_POST['kelas_id']);
    if ($stmt->rowCount() > 0) {
?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <h5><i class="icon fa fa-ban"></i> Gagal</h5>
        Nama santri sudah ada
    </div>
<?php
    } else {
        $insertSql = "INSERT INTO tb_santri (nis, nisn, nama_santri, kelas_id) VALUE (?, ?, ?, ?)";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(1, $_POST['nis']);
        $stmt->bindParam(2, $_POST['nisn']);
        $stmt->bindParam(3, $_POST['nama_santri']);
        $stmt->bindParam(4, $_POST['kelas_id']);
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=santriread'>";
    }
}

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Santri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=santriread">Santri</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Santri</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn">
                    <label for="nama_santri">Nama Santri</label>
                    <input type="text" class="form-control" name="nama_santri">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="" class="form-control">
                        <option value="">>-- Kelas --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM tb_kelas";
                        $stmt_santri = $db->prepare($selectSql);
                        $stmt_santri->execute();
                        
                        while($row_santri = $stmt_santri->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_santri['id'] .   "\">" . $row_santri['kelas'] . "</option>";
                        } 
                        ?>
                    </select>
                </div>
                <a href="?page=santriread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>

<!-- <?php include_once 'partials_script.php' ?> -->