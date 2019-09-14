<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Movie.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$movie = new Movie($db);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$movie->title = $data->title;
$movie->summary = $data->summary;
$movie->producer = $data->producer;
$movie->genre_id = $data->genre_id;

// Create post
if ($movie->create()) {
  echo json_encode(
    array('message' => 'Movie Created')
  );
} else {
  echo json_encode(
    array('message' => 'Movie Not Created')
  );
}
