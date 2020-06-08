<?php 

if (isset($_POST["editJam"])) {
    if (editJam($_POST) > 0) {
        echo "
            <script>
                document.location.href='" . BASE_URL . "setting_presensi';
            </script>
        ";
    }
}
if (isset($_POST["editKeterangan"])) {
    $nip = $url[1];
    if (editKeterangan($_POST) > 0) {
        echo "
            <script>
                document.location.href='" . BASE_URL . "setting_presensi';
            </script>
        ";
    }
}
function editJam($data)
{
    global $koneksi;
    $jamMasuk1 = $data["jamMasuk1"];
    $jamMasuk2 = $data["jamMasuk2"];
    $jamPulang1 = $data["jamPulang1"];
    $jamPulang2 = $data["jamPulang2"];

    

    $query = "UPDATE jam_presensi
                SET  
               jam_masuk1='$jamMasuk1', jam_masuk2='$jamMasuk2', jam_pulang1='$jamPulang1', jam_pulang2='$jamPulang2'";
        
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function editKeterangan($data)
{
    global $koneksi, $nip;
    $keterangan = $data["keterangan"];
    $tanggal = date('Y-m-d');

    

    $query = "INSERT INTO presensi
                VALUES
                ('','$nip','$tanggal','','','$keterangan')";
        
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
 ?>