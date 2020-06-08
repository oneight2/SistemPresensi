<?php 
$id=$url[1];
if (isset($_POST["editPegawai"])) {
    if (editPegawai($_POST) > 0) {
        echo "
            <script>
                document.location.href='" . BASE_URL . "kelola_pegawai';
            </script>
        ";
    }
}
if (isset($_POST["editPegawaiSendiri"])) {
    if (editPegawaiSendiri($_POST) > 0) {
        echo "
            <script>
                document.location.href='" . BASE_URL . "dashboard';
            </script>
        ";
    }
}
if (isset($_POST["resetPassword"])) {
    if (resetPassword($_POST) > 0) {
        echo "
            <script>
                document.location.href='" . BASE_URL . "kelola_pegawai';
            </script>
        ";
    }
}
function editPegawai($data)
{
    global $koneksi, $id;
    $nama = $data["nama"];
    $nip = $data["nip"];
    $kd_rfid = $data["kd_rfid"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tgl_lahir = $data["tgl_lahir"];
    $alamat = $data["alamat"];
    $jabatan = $data["jabatan"];
    $email = $data["email"];
    $no_telp = $data["no_telp"];

    $query = "UPDATE pegawai
                SET  
                nip='$nip', rfid='$kd_rfid', nama_pgw='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tgl_lahir', alamat_pgw='$alamat', jabatan='$jabatan', no_telp='$no_telp', email='$email' WHERE nip=$id";
        
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function editPegawaiSendiri($data)
{
    global $koneksi, $id;
    $nama = $data["nama"];
    $nip = $data["nip"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tgl_lahir = $data["tgl_lahir"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $password = $data["password"];
    $no_telp = $data["no_telp"];

    $query = "UPDATE pegawai
                SET  
                nip='$nip', nama_pgw='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tgl_lahir', alamat_pgw='$alamat', no_telp='$no_telp', email='$email', password='$password' WHERE nip=$id";
        
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function resetPassword($data)
{
    global $koneksi, $id;
    $password = $data["nip"];
    $query = "UPDATE pegawai
                SET  
               password='$password' WHERE nip=$id";
        
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}