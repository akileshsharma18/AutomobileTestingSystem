<?php
include 'config2.php';

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//cho "Connected successfully";
$sql = "select distinct name from vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	$a=array();
	
	while($row = $result->fetch_assoc()) {
        //echo "name: " . $row["name"]."<br>";
        array_push($a,$row["name"]);
    }
    echo json_encode($a);
}
else
{
    echo "Error creating table: " . $conn->error;
}

$conn->close();



?>


