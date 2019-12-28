<?php
include 'config2.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//cho "Connected successfully";
$sql = "select model from vehicles where name=\"".$_GET["car"]."\"";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	$a=array();
	
	while($row = $result->fetch_assoc()) {
        //echo "name: " . $row["name"]."<br>";
        array_push($a,$row["model"]);
    }
    echo json_encode($a);
}
else
{
    echo "Error creating table: " . $conn->error;
}

$conn->close();



?>


