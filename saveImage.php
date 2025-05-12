<?php 
require "inc.koneksi.php";

$fileName = time(). '_' . uniqid();
define('UPLOAD_DIR', 'upload/');

$imageData = mysqli_real_escape_string($conn, $_POST['imageData']);
$kodeGambar = mysqli_real_escape_string($conn, $_POST['kodeGambar']);

$image_parts = explode(";base64,", $imageData);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);

$file = UPLOAD_DIR . $fileName . '.' . $image_type;
file_put_contents($file, $image_base64);

if (file_exists($file)){
    if(!$kodeGambar) {
        $text   = "SELECT MAX(RIGHT(kodegambar,4)) AS nokode FROM gambar";
        $sql    = mysqli_query($conn, $text);
        $row    = mysqli_num_rows($sql);
        if($row > 0) {
            $rec    = mysqli_fetch_array($sql);
            $nokode = $rec['nokode'] + 1;
            if($nokode > 9999) {
                $nokode = 1;
            } else {
                $nokode = $nokode;
            }
        }
        
        $kodeGambar = "GR".str_pad($nokode, 4, "0", STR_PAD_LEFT);
        $file_url = mysqli_real_escape_string($conn, $file);
    
        $input   = "INSERT INTO gambar (kodegambar, path, tglupload, onview) 
                    VALUES ('$kodeGambar', '$file_url', NOW(), 1)";
        mysqli_query($conn, $input);
    
        $text1  = "SELECT kodegambar FROM gambar WHERE kodegambar='$kodeGambar'";
        $sql1   = mysqli_query($conn, $text1);
        $ada1   = mysqli_num_rows($sql1);
        
        $pesan = ($ada1 > 0) ? "Gambar sukses disimpan" : "Gambar gagal disimpan";
    }
} else {
    $pesan = "Gagal menyimpan gambar";
}

$data['pesan'] = $pesan;

echo json_encode($data);
?>