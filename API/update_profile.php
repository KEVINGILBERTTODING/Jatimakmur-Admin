<?php
include_once("connection.php");


class emp
{
}

$username = $_POST["kode_konsumen"];
$nmkonsumen = $_POST["nm_konsumen"];
$alamat = $_POST["alamat"];
$kodepos = $_POST["kodepos"];
$kota = $_POST["kota"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];
<<<<<<< HEAD
$usernamex = $_POST["username"];

$photo = $_POST["photo"];

$nama_file = $usernamex . ".png";
=======
$photo = $_POST["photo"];

$nama_file = "profile" . $username . ".png";
>>>>>>> f0b0b727fd1fc5da70db68f5ecd25427f9c3b07f

$path = "../uploads/photo_profile/" . $nama_file;

// sesuiakan ip address laptop/pc atau URL server
$actualpath = "http://192.168.11.92/android/upload_image/$path";


$query = "UPDATE konsumen SET nm_konsumen='$nmkonsumen', alamat='$alamat', kodepos='$kodepos', kota='$kota', no_hp='$no_hp', foto='$nama_file', email='$email' WHERE kd_konsumen='$username'";
$result = mysqli_query($koneksi, $query);

if ($query) {
	file_put_contents($path, base64_decode($photo));

	$response = new emp();
	$response->success = 1;
	$response->message = "Success ! Data berhasil diperbarui";
	die(json_encode($response));
} else {
	$response = new emp();
	$response->success = 0;
	$response->message = "Failed ! Data gagal diperbarui";
	die(json_encode($response));
}
mysqli_close($con);

$response = array();
if ($result) {
	$response['message'] = "Success ! Data berhasil diperbarui";
} else {
	$response['message'] = "Failed ! Data gagal diperbarui";
}
echo json_encode($response);
