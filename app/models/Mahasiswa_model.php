<?php

class Mahasiswa_model
{
    private $mhs = [
        [
            "nama" => "Felix",
            "nim" => "412020015",
            "email" => "felix.412020015@civitas.ukrida.ac.id",
            "jurusan" => "Teknik Informatika"
        ],
        [
            "nama" => "Albert",
            "nim" => "412020031",
            "email" => "albert.412020031@civitas.ukrida.ac.id",
            "jurusan" => "Teknik Informatika"
        ],
        [
            "nama" => "Andri",
            "nim" => "412020032",
            "email" => "andri.412020032@civitas.ukrida.ac.id",
            "jurusan" => "Teknik Elektro"
        ]
    ];

    public function getAllMahasiswa()
    {
        return $this->mhs;
    }
}
