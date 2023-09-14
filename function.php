<?php 
    // $conn = mysqli_connect("localhost", "root", "", "eabsen");
    // function query($query){
    //     global $conn;
    //     $result = mysqli_query($conn, $query);
    //     $rows = [];
    //     while ($row = mysqli_fetch_assoc($result)){
    //         $rows[] = $row;
    //     }
    //     return $rows;
    // }

    function simpanKaryawan($data) {
        global $conn;

        $idkaryawan = htmlspecialchars($data["idKaryawan"]);
        $nama = htmlspecialchars($data["nama"]);
        $jabatan = htmlspecialchars($data["jabatan"]);
        $foto = htmlspecialchars($data["foto"]);
        $keterangan = htmlspecialchars($data["keterangan"]);

        $query = "INSERT INTO karyawan values
        ('$idkaryawan', '$nama', '$jabatan', '$foto','$keterangan')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function tambahPegawai($data){
        global $conn;

        $id = strtolower(stripslashes($data["idpegawai"]));
        $nama = htmlspecialchars($data["namapegawai"]);
        $role = htmlspecialchars($data["role"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $hp = htmlspecialchars($data["nohp"]);
        $password = mysqli_real_escape_string($conn, $data["pass"]);
        $password2 = mysqli_real_escape_string($conn, $data["pass2"]);
    

        // memeriksa username
        $result = mysqli_query($conn, "SELECT idpegawai FROM pegawai WHERE
        idpegawai = '$id'"); 
        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('username sudah terdaftar')
                </script>";
            return false;
        }

        // cek konfirmasi pass
        if ($password !== $password2) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai');
                </script>";
            return false;
        }

          // enkripsi pass
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO pegawai VALUES('$id','$password','$nama','$role','$alamat','$hp')");

        return mysqli_affected_rows($conn);


    }

    function tambahKonsumen($data){
        global $conn;

        $nama = htmlspecialchars($data['namaKonsumen']);
        $hp = htmlspecialchars($data['nohp']);

        $query = "INSERT INTO konsumen values 
        ('','$nama', '$hp')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

?>