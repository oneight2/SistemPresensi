$('#absenMasuk').on('change', function () {
        $('.ajax').load('app/module/absen/ajaxMasuk.php?kode_rfid=' + $('#absenMasuk').val());
    })

$('#absenPulang').on('change', function () {
        $('.ajax').load('app/module/absen/ajaxPulang.php?kode_rfid=' + $('#absenPulang').val());
    })