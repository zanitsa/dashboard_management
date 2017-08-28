<?php
$server="localhost";
$db="dashboard_management";
$username="postgres";
$pass="admin";

$conn = pg_connect("host=$server port='5432' dbname=$db user=$username password =$pass") ;
//query
function result($query)
{
 	global $conn;
 	if($result = pg_query($conn, $query) or die ('Gagal Menampilkan Data')){
 		return $result;
	}
}
function escape($data)
{
 	global $conn;
	return pg_escape_string($conn, $data);
}
function run($query)
{
	global $conn;

	if (pg_query($conn, $query)) return true;
	else return false;
}
function check($username,$pass){
	$sql="SELECT * FROM admin WHERE username='$username' AND pass='$pass'";
	
	global $conn;
	$cek= pg_query($conn,$sql);
		
	if(isset($cek)){
		if (pg_num_rows($cek) != 0) return true;
		else return false;
	}
}
function user($user){
	$sql = "SELECT * FROM admin WHERE username='$user'";
	return result($sql);
}


/////////////// INPUT //////////////////
function input_master($a, $b, $c, $d, $e){
	$sql = "INSERT INTO master(nama,link,grup,icon,temp_grup) values ('$a','$b','$c','$d','$e')";
	return run($sql);
}
function input_grup($a, $b, $c){
	$sql = "INSERT INTO grup(grup,icon,temp_grup) values ('$a','$b','$c')";
	return run($sql);
}
function input_user($a, $b, $c ){
	$sql = "INSERT INTO user_link (nama,username,pass) values ('$a','$b','$c')";
	return run($sql);
}
function input_user_grup($a){
	$sql =" INSERT INTO user_grup (username) values ('$a')";
	return run($sql);
}
/////////////// VIEW //////////////////
function view_master(){
	$sql = "SELECT * FROM master";
	return result($sql);
}
function view_grup(){
	$sql="SELECT * FROM grup";
	return result($sql);
}
function view_user(){
	$sql="SELECT * FROM user_link";
	return result($sql);
}

/////////////// EDIT //////////////////
function edit_grup($a, $b){
	$sql = "UPDATE grup SET grup='$b' WHERE temp_grup='$a'";
	return run($sql);
}
function edit_grupmaster($a, $b){
	$sql = "UPDATE master SET grup='$b' WHERE temp_grup='$a'";
	return run($sql);
}
function icon_grup($a, $b){
	$sql = "UPDATE grup SET icon='$b' WHERE id='$a'";
	return run($sql);
}
function edit_master($a, $b, $c){
	$sql = "UPDATE master SET nama='$b', link='$c' WHERE id='$a'";
	return run($sql);
}
function icon_master($a,$b){
	$sql = "UPDATE master SET icon='$b' WHERE id='$a'";
	return run ($sql);
}
function edit_user($a ,$b ,$c ,$d) {
	$sql = "UPDATE user_link SET nama='$b',username='$c' ,pass='$d' WHERE id='$a'";
	return run($sql);
}

/////////////// DELETE //////////////////
function delete_master($a){
	$sql = "DELETE FROM master WHERE id='$a';";
	return run($sql);
}
function delete_grup($b){
	$sql="DELETE FROM grup WHERE id='$b';";
	return run($sql);
}
function delete_user($c){
	$sql ="DELETE FROM user_link WHERE id='$c';";
	return run($sql);
}

////////////////// CEK //////////////////
function cek_grup($a){
	$sql="SELECT * FROM grup WHERE grup='$a'";
	return result($sql);
}
function cek_user($a){
	$sql="SELECT * FROM user_link WHERE username='$a'";
	return result($sql);
}
function cek_temp($a){
	$sql="SELECT * FROM master WHERE temp_grup='$a'";
	return result($sql);	
}


function temp(){
	$query = "SELECT temp_grup FROM grup ORDER BY id DESC LIMIT 1";
	return result($query);
}
$cek_temp_grup = pg_fetch_assoc(temp());
if( pg_num_rows(temp()) == '' ){
	$plus = '1';
}else{
	$plus = $cek_temp_grup['temp_grup']+1;
}
?>