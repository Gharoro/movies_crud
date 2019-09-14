<?php
class Movie
{
  /** Database properties */
  private $conn;
  private $table = 'movies';

  /** Movie Properties */
  public $id;
  public $genre_id;
  public $genre;
  public $title;
  public $summary;
  public $producer;
  public $created_at;

  /** Constructor with DB */
  public function __construct($db)
  {
    $this->conn = $db;
  }

  /** GET movies */
  public function read()
  {
    $query = 'SELECT g.name as genre, m.id, m.genre_id, m.title, m.summary, m.producer, m.created_at
    FROM ' . $this->table . ' m LEFT JOIN genres g ON m.genre_id = g.id ORDER BY m.created_at DESC';

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  /** Get Single Post */
  public function read_single()
  {
    $query = 'SELECT g.name as genre, m.id, m.genre_id, m.title, m.summary, m.producer, m.created_at
      FROM ' . $this->table . ' m LEFT JOIN genres g ON m.genre_id = g.id WHERE m.id = ? LIMIT 0,1';

    $stmt = $this->conn->prepare($query);
    // Bind ID
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // Set properties
    $this->title = $row['title'];
    $this->summary = $row['summary'];
    $this->producer = $row['producer'];
    $this->genre_id = $row['genre_id'];
    $this->genre = $row['genre'];
  }

  /** Create Movie */
  public function create()
  {
    $query = 'INSERT INTO ' . $this->table . ' SET title = :title, summary = :summary, producer = :producer, genre_id = :genre_id';
    $stmt = $this->conn->prepare($query);
    // Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->summary = htmlspecialchars(strip_tags($this->summary));
    $this->producer = htmlspecialchars(strip_tags($this->producer));
    $this->genre_id = htmlspecialchars(strip_tags($this->genre_id));
    // Bind data
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':summary', $this->summary);
    $stmt->bindParam(':producer', $this->producer);
    $stmt->bindParam(':genre_id', $this->genre_id);

    if ($stmt->execute()) {
      return true;
    }
    // Print error
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  /** Update Movie */
  public function update()
  {
    $query = 'UPDATE ' . $this->table . ' SET title = :title, summary = :summary, producer = :producer, genre_id = :genre_id WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    // Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->summary = htmlspecialchars(strip_tags($this->summary));
    $this->producer = htmlspecialchars(strip_tags($this->producer));
    $this->genre_id = htmlspecialchars(strip_tags($this->genre_id));
    $this->id = htmlspecialchars(strip_tags($this->id));
    // Bind data
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':summary', $this->summary);
    $stmt->bindParam(':producer', $this->producer);
    $stmt->bindParam(':genre_id', $this->genre_id);
    $stmt->bindParam(':id', $this->id);
    // Execute query
    if ($stmt->execute()) {
      return true;
    }
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  /** Delete Movie */
  public function delete()
  {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':id', $this->id);
    if ($stmt->execute()) {
      return true;
    }
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
