<?php 

if (isset($_POST["tambahPegawai"])) {
    if (tambahPegawai($_POST) > 0) {
        echo "
            <script>
                document.location.href='" . BASE_URL . "kelola_pegawai';
            </script>
        ";
    }
}
if (isset($url[1])) {
    
    if (hapusData($url[1]) > 0) {
        echo "
             <script>
                document.location.href='" . BASE_URL . "kelola_pegawai';
            </script> ";
    }
}
function tambahPegawai($data)
{
    global $koneksi;
    $nama = $data["nama"];
    $nip = $data["nip"];
    $kd_rfid = $data["kd_rfid"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tgl_lahir = $data["tgl_lahir"];
    $alamat = $data["alamat"];
    $jabatan = $data["jabatan"];
    $email = $data["email"];
    $no_telp = $data["no_telp"];
    $password = $data["nip"];



   
    $query = "INSERT INTO pegawai
                VALUES  
                ('$nip','$kd_rfid','$nama','$jenis_kelamin','$tgl_lahir','$alamat','$jabatan','$no_telp','$email','$password','')";
        
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapusData($id)
{

    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip='$id'" );

    return mysqli_affected_rows($koneksi);
}