<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=cms;charset=utf8", "cms", "cms");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
  $data = array(
    ':cat_title'   => "%" . $_GET['cat_title'] . "%",
    ':cat_creator'     => "%" . $_GET['cat_creator'] . "%"
  );

  $query = "SELECT * FROM categories WHERE cat_title LIKE :cat_title AND cat_creator LIKE :cat_creator ORDER BY cat_id DESC";

  $statement = $connect->prepare($query);
  $statement->execute($data);
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output[] = array(
     'cat_id'    => $row['cat_id'],   
     'cat_title'  => $row['cat_title'],
     'cat_creator'   => $row['cat_creator']
    );
  }
  header("Content-Type: application/json");
    echo json_encode($output);
}

if($method == "POST")
{
  $data = array(
    ':cat_title'  => $_POST["cat_title"],
    ':cat_creator'    => $_POST["cat_creator"]
  );

  $query = "INSERT INTO categories (cat_title, cat_creator) VALUES (:cat_title, :cat_creator)";
  $statement = $connect->prepare($query);
  $statement->execute($data);
}

if($method == 'PUT')
{
  parse_str(file_get_contents("php://input"), $_PUT);
  $data = array(
    ':cat_id'   => $_PUT['cat_id'],
    ':cat_title' => $_PUT['cat_title'],
    ':cat_creator' => $_PUT['cat_creator']
  );
  $query = "
  UPDATE categories SET 
  cat_title = :cat_title, 
  cat_creator = :cat_creator
  WHERE cat_id = :cat_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
}

if($method == "DELETE")
{
  parse_str(file_get_contents("php://input"), $_DELETE);
  $query = "DELETE FROM categories WHERE cat_id = '".$_DELETE["cat_id"]."'";
  $statement = $connect->prepare($query);
  $statement->execute();
}

?>