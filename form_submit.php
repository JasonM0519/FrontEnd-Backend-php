<?php
$host = "127.0.0.1";
$db_name = "seller_information";
$username = "root";
$password = "password";
$connection = null;
try{
$connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
$connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}

function saveData($name, $address, $city, $province, $postalcode, $phone, $email){
global $connection;
$query = "INSERT INTO seller_information(name, address, city, province, postalcode, phone, email) VALUES( :name, :address, :city, :province, :postalcode, :phone, :email)";

$callToDb = $connection->prepare( $query );
$username=htmlspecialchars(strip_tags($name));
$address=htmlspecialchars(strip_tags($address));
$city=htmlspecialchars(strip_tags($city));
$province=htmlspecialchars(strip_tags($province));
$postalcode=htmlspecialchars(strip_tags($postalcode));
$phone=htmlspecialchars(strip_tags($phone));
$email=htmlspecialchars(strip_tags($email));
$callToDb->bindParam(":name",$name);
$callToDb->bindParam(":address",$address);
$callToDb->bindParam(":city",$city);
$callToDb->bindParam(":province",$province);
$callToDb->bindParam(":postalcode",$postalcode);
$callToDb->bindParm(":phone",$phone);
$callToDb->bindParm(":email",$email);

if($callToDb->execute()){
return '<h3 style="text-align:center;">We will get back to you very shortly!</h3>';
}
}

if( isset($_POST['submit'])){
$name = htmlentities($_POST['name']);
$email = htmlentities($_POST['address']);
$city = htmlentities($_POST['city']);
$province = htmlentities($_POST['province']);
$postalcode = htmlentities($_POST['postalcode']);
$phone = htmlentities($_POST['phone']);
$email = htmlentities($_POST['email']);
//then you can use them in a PHP function. 
$result = saveData($name, $address, $city, $province, $postalcode, $phone, $email);
echo $result;
}
else{
echo '<h3 style="text-align:center;">Error Data Was Not Sent ( ͡° ͜ʖ ͡°)</h3>';
}
?>