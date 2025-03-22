<?php
$proses = $_POST['proses'];
$nama_siswa = $_POST['nama'];
$mata_kuliah = $_POST['matkul'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];
$nilai_tugas = $_POST['nilai_tugas'];

$nilai_akhir = (30/100 * $nilai_uts + 35/100 * $nilai_uas + 35/100 * $nilai_tugas);

if($nilai_akhir > 55){
    $status = "lulus";
}else{
    $status = "tidak lulus";
}

if($nilai_akhir >= 0 && $nilai_akhir <= 35) {
    $grade = 'E';
}elseif($nilai_akhir >= 36 && $nilai_akhir <= 55){
    $grade = 'D';
}elseif($nilai_akhir >= 56 && $nilai_akhir <= 69){
    $grade = 'C';
}elseif($nilai_akhir >= 70 && $nilai_akhir <= 84){
    $grade = 'B';
}elseif($nilai_akhir >= 85 && $nilai_akhir <=100){
    $grade = 'A';
}else{
    $grade = 'I';
}

switch ($grade) {
    case 'E':
        $predikat = 'Sangat Kurang';
        break;
    case 'D':
        $predikat = 'Kurang';
        break;
    case 'C':
        $predikat = 'Cukup';
        break;
    case 'B':
        $predikat = 'Memuaskan';
        break;
    case 'A':
        $predikat = 'Sangat Memuaskan';
        break;
    case 'I':
        $predikat = 'Tidak Ada';
        break;
}

// MENCETAK HASIL
if (!empty($proses)) {
    echo 'Proses : ' . $proses;
    echo '<br/>Nama : ' . $nama_siswa;
    echo '<br/>Mata Kuliah : ' . $mata_kuliah;
    echo '<br/>Nilai UTS : ' . $nilai_uts;
    echo '<br/>Nilai UAS : ' . $nilai_uas;
    echo '<br/>Nilai Tugas Praktikum : ' . $nilai_tugas;
    echo '<br/>Nilai Akhir : ' . $nilai_akhir;
    echo '<br/>Status : ' . $status;
    echo '<br/>Grade : ' . $grade;
    echo '<br/>Predikat : ' . $predikat;
}
