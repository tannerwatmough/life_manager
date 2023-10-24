<?php
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/database.php");

// Get all books
function get_all_books() {
    global $db;
    $query = 'SELECT * FROM books ORDER BY name';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Get one book by id
function get_book($book_id) {
    global $db;
    $query = 'SELECT * FROM books WHERE bookId = :book_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Get books by search text.
function get_books($search_text) {
    global $db;
    $query = 'SELECT * FROM books 
              WHERE name LIKE :search_text
              OR author LIKE :search_text
              OR platform LIKE :search_text
              OR genre LIKE :search_text
              ORDER BY name';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':search_text', $search_text);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Add book to database
function add_book($name, $author, $genre, $platform, $priority, $completed, $summary) {
    global $db;
    $query = 'INSERT INTO books
                (email, name, author, genre, platform, priority, completedDate, summary)
              VALUES
                (:email, :name, :author, :genre, :platform, :priority, :completedDate, :summary)';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':email', 'tannerwatmough@gmail.com'); 
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':author', $author); 
        $statement->bindValue(':genre', $genre); 
        $statement->bindValue(':platform', $platform); 
        $statement->bindValue(':priority', $priority); 
        $statement->bindValue(':completedDate', $completed); 
        $statement->bindValue(':summary', $summary); 
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Update book
function update_book($book_id, $name, $author, $genre, $platform, $priority, $completed, $summary) {
    global $db;
    $query = 'UPDATE books
            SET 
                name = :name,
                author = :author,
                genre = :genre,
                platform = :platform,
                priority = :priority,
                completedDate = :completed,
                summary = :summary
            WHERE bookId = :book_id';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':book_id', $book_id);
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':author', $author); 
        $statement->bindValue(':genre', $genre); 
        $statement->bindValue(':platform', $platform); 
        $statement->bindValue(':priority', $priority); 
        $statement->bindValue(':completed', $completed); 
        $statement->bindValue(':summary', $summary); 
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Order books
function order_books_by($str) {
    global $db;
    
    $sort_direction = 'DESC';

    if ($str != 'date') {
        $sort_direction = 'ASC';
    }

    $query = "SELECT * FROM books ORDER BY 
                case :string 
                    when 'name' then name
                    when 'author' then author
                    when 'genre' then genre
                    when 'platform' then platform
                    else completedDate
                end
                $sort_direction
            ";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':string', $str);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}


// Get all courses
function get_all_courses() {
    global $db;
    $query = 'SELECT * FROM courses ORDER BY completedDate DESC';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Get one course by id
function get_course($course_id) {
    global $db;
    $query = 'SELECT * FROM courses WHERE courseId = :course_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Add course to database
function add_course($name, $area, $location, $completed, $summary) {
    global $db;
    $query = 'INSERT INTO courses
                (email, name, area, url, completedDate, notes)
              VALUES
                (:email, :name, :area, :url, :completedDate, :summary)';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':email', 'tannerwatmough@gmail.com'); 
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':area', $area); 
        $statement->bindValue(':url', $location); 
        $statement->bindValue(':completedDate', $completed); 
        $statement->bindValue(':summary', $summary); 
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Update course
function update_course($course_id, $name, $area, $location, $completed, $summary) {
    global $db;
    $query = 'UPDATE courses
            SET 
                name = :name,
                area = :area,
                url = :url,
                completedDate = :completed,
                notes = :summary
            WHERE courseId = :course_id';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':area', $area); 
        $statement->bindValue(':url', $location); 
        $statement->bindValue(':completed', $completed); 
        $statement->bindValue(':summary', $summary); 
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Get all games
function get_all_games() {
    global $db;
    $query = 'SELECT * FROM games ORDER BY length';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Get one game by id
function get_game($game_id) {
    global $db;
    $query = 'SELECT * FROM games WHERE gameId = :game_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':game_id', $game_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Add a game
function add_game($name, $platform, $length, $recording, $completed, $summary) {
    global $db;
    $query = 'INSERT INTO games
                (email, name, platform, length, completedDate, url, notes)
              VALUES
                (:email, :name, :platform, :length, :completedDate, :recording, :summary)';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':email', 'tannerwatmough@gmail.com'); 
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':platform', $platform); 
        $statement->bindValue(':length', $length); 
        $statement->bindValue(':completedDate', $completed); 
        $statement->bindValue(':recording', $recording);
        $statement->bindValue(':summary', $summary); 
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Update game
function update_game($game_id, $name, $platform, $length, $recording, $completed, $summary) {
    global $db;
    $query = 'UPDATE games
            SET 
                name = :name,
                platform = :platform,
                length = :length,
                completedDate = :completed,
                url = :recording,
                notes = :summary
            WHERE gameId = :game_id';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':game_id', $game_id);
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':platform', $platform); 
        $statement->bindValue(':recording', $recording);
        $statement->bindValue(':length', $length); 
        $statement->bindValue(':completed', $completed); 
        $statement->bindValue(':summary', $summary); 
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}




?>