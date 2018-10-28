<?php
//search.php
$connect = mysqli_connect("localhost", "root", "", "autocomplete");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM countries WHERE name LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
   $data[] = $row;

 }

	echo json_encode($data);
}

?>