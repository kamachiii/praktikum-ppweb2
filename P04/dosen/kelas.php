<?php

class Mahasiswa {
    private $nama;
    private $nim;
    private $semester;

    // public function __construct($nama, $nim, $semester) {
    //     $this->nama = $nama;
    //     $this->nim = $nim;
    //     $this->semester = $semester;
    // }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    public function setSemester($semester) {
        $this->semester = $semester;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getNim() {
        return $this->nim;
    }

    public function getSemester() {
        return $this->semester;
    }
}

$budi = new Mahasiswa();
$budi->setNama('Budi');
$budi->setNim('202012345');
$budi->setSemester(3);

echo 'Nama : ' . $budi->getNama() . '<br>';
echo 'NIM : ' . $budi->getNim() . '<br>';
echo 'Semester : ' . $budi->getSemester() . '<br>';
