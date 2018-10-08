<?php
include_once 'koneksi.php';
session_start();

if (isset($_POST['submit'])) {
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

  $sql = "INSERT INTO pendaftaran(nama,nim,kelas,gender,hobi,fakultas,alamat)
          VALUES ('$nama','$nim','$kelas',
                  '$gender','$hobi',
                  '$prodi','$alamat')";
  $conn->exec($sql);
  if ($conn) {
    echo "berhasil masuk database";
  }else {
    echo "gagal";
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form action="edit_data.php" method="post" enctype="multipart/form-data">
      <center>
      <table>
        <tr>
          <td colspan="2"><center><h1>LOGIN</h1></center> </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text"
              name="nama1" value="<?php echo $_SESSION['nama']; ?>"></td>
        </tr>
        <tr>
          <td>Nim</td>
          <td><input type="text" name="nim1"
              value="<?php echo $_SESSION['nim']; ?>"> </td>
        </tr>
        <tr>
          <td><input type="submit" name="submit1" value="Login"></td>
        </tr>
      </table>
    </center>
    </form>
  </body>
</html>
<?php
if (isset($_POST['submit1'])) {
  $nama1 = $_POST['nama1'];
  $nim1 = $_POST['nim1'];
  $_SESSION['nama1'] = $nama1;
  $_SESSION['nim1'] = $nim1;
  if ($nama1 == $sql && $nim1 == $sql) {
    echo "sukses";
  }else {
    die("salah");
  }
}
?>
