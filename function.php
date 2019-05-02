<?php

    session_start();

    function connect(&$mysqli)
    {
        $mysqli = new mysqli("localhost","root","","proyek");
        checkError($mysqli);
    }

    function checkError($mysqli)
    {
        if($mysqli->connect_errno)
        {
            echo "Error: Failed to make a MySql COnnection, here is why : \n";
            echo "Error: ". $mysqli->connect_errno . "\n";
            echo "Error: ". $mysqli->connect_error . "\n";
            exit;
        }
    }

    connect($mysqli);

    function executeQuery($mysqli, $sql)
    {
        // $sql = "select * from user";
        if(!$result = $mysqli->query($sql))
        {
            echo "Sorry, the website is experiencing problems";

            echo "Error : our query failed to execute and here is why : \n";
            echo "Query ". $sql. "\n";
            echo "Errno: ". $mysqli->errno. "\n";
            echo "Error: ". $mysqli->error. "\n";
            exit;
        }

        $data = $result->fetch_all(MYSQLI_BOTH);
        return $data;
    }


    function executeNonQuery($mysqli, $sql)
    {
        if(!$result = $mysqli->query($sql))
        {
            echo "Sorry, the website is experiencing problems";

            echo "Error : our query failed to execute and here is why : \n";
            echo "Query ". $sql. "\n";
            echo "Errno: ". $mysqli->errno. "\n";
            echo "Error: ". $mysqli->error. "\n";
            exit;
        }
    }

    function insertRuangan($mysqli,$namaruangan) {
        // $cek = executeQuery($mysqli, "select nama_ruangan");

        // if ($namaruangan != $cek[0][0]) {
        //     # code...
        // }
        $hasil = executeQuery($mysqli,"select max(substr(id_ruangan,3,3)) from ruangan");
        $urutan = (int)$hasil[0][0] + 1;
        $id = "RU".str_pad((string)$urutan, 3, "0", STR_PAD_LEFT);
        executeNonQuery($mysqli,"insert into ruangan (id_ruangan,nama_ruangan) values('$id','$namaruangan')");
        echo "<script>alert('Berhasil Tambah Ruangan')</script>";
        // $message = "Berhasil Tambah Ruangan";
    }