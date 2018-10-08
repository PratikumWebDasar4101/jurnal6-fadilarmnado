<?php
include_once 'koneksi.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = $conn -> prepare("select * from pendaftaran where id = $id ");
  $sql -> execute();

  $row = $sql -> fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>update</title>
  </head>
  <body>
    <form method="post">
      <table>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
        </tr>
        <tr>
          <td>NIM</td>
          <td><input type="text" name="nim" value="<?php echo $row['nim']; ?>"></td>
        </tr>
        <tr>
          <td>kelas</td>
          <td><input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"></td>
        </tr>
        <tr>
          <td>jenis kelamin</td>
          <td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"> </td>
        </tr>
        <tr>
          <td>hobi</td>
          <td><input type="text" name="hobi" value="<?php echo $row['hobi']; ?>"> </td>
        </tr>
        <tr>
          <td>fakultas</td>
          <td><input type="text" name="prodi" value="<?php echo $row['fakultas']; ?>"></td>
        </tr>
        <tr>
          <td>alamat</td>
          <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"> </td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Kirim"> </td>
        </tr>
      </table>
    </form>
  </body>
</html>


<?php
session_start();
if (isset($_POST['nama'])) {
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $kelas = $_POST['kelas'];
  $gender = $_POST['gender'];
  $hobi = $_POST['hobi'];
  $prodi = $_POST['prodi'];
  $alamat = $_POST['alamat'];
  $_SESSION['nama'] = $nama;
  $_SESSION['nim'] = $nim;
  $_SESSION['kelas'] = $kelas;
  $_SESSION['gender'] = $gender;
  $_SESSION['hobi'] = $hobi;
  $_SESSION['prodi'] = $prodi;
  $_SESSION['alamat'] = $alamat;

  $sql = $conn -> prepare("UPDATE pendaftaran set nama = '$nama',
                  nim = '$nim', kelas = '$kelas',
                  gender = '$gender', hobi = '$hobi', fakultas = '$prodi',
                  alamat = '$alamat'
                  where id = '$id' ");
  $sql -> execute();

  if ($sql) {
    echo "sukses";
    header("location: edit_data.php");
  }else {
    echo "gagal";
  }
}
?>
