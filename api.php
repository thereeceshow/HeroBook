<?php

$servername = "localhost";
$username = "root";
$password = "ainc";
$dbname = "HeroBookDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$route = $_GET['route'];

switch ($route) {
  case "getAllHeroes":
    $myData = getAllHeroes($conn);
    break;
  case "createBattle":
    $myData = createBattle($conn, 2, 4, 4);
    break;
  case "getHeroByID":
    //
    $id = $_GET["hero_id"];
    $myData = getHeroByID($conn, $id);
    break;
  case "resetReboots":
    $myData = resetReboots($conn);
    break;
  case "addRebootToHero":
    $id = $_GET["hero_id"];
    $reboots = $_GET["reboots"];
    $myData = addRebootToHero($conn, $id, $reboots);
    break;
  case "createHero":
    $myData = createHero($conn);
    break;
  case "deleteHero":
    $myData = deleteHero($conn);
    break;
  default:
   $myData = json_encode([]);
}

echo $myData;

$conn->close();


function createBattle ($conn, $h1, $h2, $w){
  
  $sql = "INSERT INTO battles (hero1, hero2, winner)
  VALUES ($h1, $h2, $w)";

  if ($conn->query($sql) === TRUE) {
    $record = "{'success':'created new battle'}"; // needs the data from the created record
  } else {
    echo "{'error': '" . $sql . " - " . $conn->error . "'}";
  }
  
  return json_encode([$record]);
}

function getAllHeroes($conn){
  $data=array();
  
  $sql = "SELECT * FROM heroes";
  $result = $conn->query($sql);
  
   // blank array
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
//          unset($row['nombre']);
         array_push($data,$row); // push rows to array $myData
      }
  } 
  
  return json_encode($data);
}

function getHeroByID ($conn, $heroID){
  $data=array();
  
  $sql = "SELECT * FROM heroes WHERE id = " . $heroID;
  $result = $conn->query($sql);

  // blank array
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
//          unset($row['nombre']);
         array_push($data,$row); // push rows to array $myData
      }
  } 
  
  return json_encode($data);
  
}

function resetReboots ($conn){
  $data=array();
  
  $sql = "UPDATE heroes SET reboots = 0";
  $sql2 = "SELECT * FROM heroes";
  $update = $conn->query($sql);
  $result = $conn->query($sql2);
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
//          unset($row['nombre']);
         array_push($data,$row); // push rows to array $myData
      }
  }
  
  return json_encode($data);
  
}

function addRebootToHero ($conn, $id, $reboots){
  $data=array();
  
  $sql = "UPDATE heroes SET reboots = 5' WHERE id = ".$id;
  $sql2 = "SELECT name, reboots FROM heroes WHERE id = ".$id;
  $update = $conn->query($sql);
  $result = $conn->query($sql2);
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
//          unset($row['nombre']);
         array_push($data,$row); // push rows to array $myData
      } 
  }
  
  return json_encode($data);
  
}

function createHero($conn) {
  
  $sql = "INSERT INTO heroes (id, NAME, about_me, biography, image_url, reboots)
  VALUES (7, 'Impeccable Ian', 'Impeccable Ian has the Super Power of Great Hair.  It can defy gravity.  He can make IG posts go viral.  He has two weaknesses,  If Google is down, or Freebird is on, he is rendered unable to do anything.', 'Ian was born with more hair than most people have as Adults.  He instantly began to woo the nurses with his awesome hair',null, 17)";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    }   else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function deleteHero($conn){
  $sql = "DELETE FROM heroes WHERE id=7";

  if (mysqli_query($conn, $sql)) {
   echo "Record deleted successfully";
  } else {
   echo "Error deleting record: " . mysqli_error($conn);
  }
}


?>