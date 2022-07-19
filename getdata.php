<?php 
    // header hasil berbentuk json
    header("Content-Type: aplication/json");

    $method = $_SERVER['REQUEST_METHOD'];
    // variable
    $result = array();

    if($method == 'GET')
    {
    //     // jika metode sesuai
        $result['status'] = [
            "code" => 200,
            "description" => 'Request valid'
        ];

        // koneksi database
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sikampus';

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // query
        $sql = "SELECT * FROM mahasiswa";

        $hasil = $conn->query($sql);
        // masukkan ke array result

        $result['results'] = $hasil->fetch_all(MYSQLI_ASSOC);
    }
    else
    {
        // jika metode tidak sesuai
        $result['status'] = [
            "code" => 400,
            "description" => 'Request not valid'
        ];
    }
    // tampilkan data dalam format json
    echo json_encode($result);

?>