<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Movie.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$movie = new Movie($db);

$movie->id = isset($_GET['id']) ? $_GET['id'] : die();
$movie->read_single();

$movie_arr = array(
  'id' => $movie->id,
  'title' => $movie->title,
  'summary' => $movie->summary,
  'producer' => $movie->producer,
  'genre_id' => $movie->genre_id,
  'genre' => $movie->genre
);

print_r(json_encode($movie_arr));
