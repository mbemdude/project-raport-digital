<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $insertSql = "INSERT INTO tb_guru (nip, nama, mapel_id) VALUES (?, ?, ?)";
    $stmt = $db->prepare($insertSql);
    $stmt->bindParam(1, $_POST['nip']);
    $stmt->bindParam(1, $_POST['nama']);
    $stmt->bindParam(2, $_POST['mapel_id']);
    if ($stmt->rowCount() > 0) {
?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <h5><i class="icon fa fa-ban"></i> Gagal</h5>
        Nama guru sudah ada
    </div>
<?php
    } else {
        $insertSql = "INSERT INTO tb_guru (nip, nama, mapel_id) VALUES (?, ?, ?)";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(1, $_POST['nip']);
        $stmt->bindParam(1, $_POST['nama']);
        $stmt->bindParam(2, $_POST['mapel_id']);
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=gururead'>";
    }
}

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Guru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=gururead">Guru</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Mata Pelajaran</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" name="nip">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama">
                    <label for="mapel_id">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control">
                        <option value="">>-- Pilih Mapel --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM tb_mapel";
                        $stmt_guru = $db->prepare($selectSql);
                        $stmt_guru->execute();
                        
                        while($row_guru = $stmt_guru->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_guru['id'] .   "\">" . $row_guru['mapel'] . "</option>";
                        } 
                        ?>
                    </select>
                </div>
                <a href="?page=gururead" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>