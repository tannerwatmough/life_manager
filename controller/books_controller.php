<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/collection_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

$books = get_all_books();
$search_fl = false;

// Direct user to page based on link action
switch ($action) {
  case 'search':
    $search_fl = true;
    $search_text = filter_input(INPUT_POST,'search');
    $search_text = "%".$search_text."%";
    $search_results = get_books($search_text);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php"); 
    break;
  case 'add_view':
    $book_fl = true;
    $game_fl = false;
    $course_fl = false;
    $edit_fl = false;
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
    break;
  case 'edit_view':
    $book_fl = true;
    $game_fl = false;
    $course_fl = false;
    $edit_fl = true;
    $book_id = filter_input(INPUT_POST,'book_id');
    $book = get_book($book_id);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
    break;
  case 'add':
    // get data from form
    $name = filter_input(INPUT_POST,'name');
    $author = filter_input(INPUT_POST, 'author');
    $genre = filter_input(INPUT_POST,'genre');
    $platform = filter_input(INPUT_POST,'platform');
    $priority = filter_input(INPUT_POST,'priority');
    $complete_date = filter_input(INPUT_POST,'completed');
    $summary = filter_input(INPUT_POST,'summary');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($author == null) {
      $err_message = 'Author cannot be empty.';
    } else if ($genre == null) {
      $err_message = 'Genre cannot be empty.';
    } else if ($platform == null) {
      $err_message = 'Platform cannot be empty.';
    }

    if ($priority == 'priority') {
      $priority = 1;
    }

    if ($complete_date != NULL) {
      $complete_date = date("Y-m-d", strtotime($complete_date));
    } else {
      $complete_date = NULL;
    }

    // Display any errors
    if (!empty($err_message)) {
      echo '<p>';
      echo htmlspecialchars($err_message);
      echo '</p>';
      $book_fl = true;
      $game_fl = false;
      $course_fl = false;
      $edit_fl = false;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
      break;
    } else {
      // Add book to database
      add_book($name, $author, $genre, $platform, $priority, $complete_date, $summary);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  case 'edit':
     // get data from form
    $book_id = filter_input(INPUT_POST, 'book_id');
    $name = filter_input(INPUT_POST,'name');
    $author = filter_input(INPUT_POST, 'author');
    $genre = filter_input(INPUT_POST,'genre');
    $platform = filter_input(INPUT_POST,'platform');
    $priority = filter_input(INPUT_POST,'priority');
    $complete_date = filter_input(INPUT_POST,'completed');
    $summary = filter_input(INPUT_POST,'summary');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($author == null) {
      $err_message = 'Author cannot be empty.';
    } else if ($genre == null) {
      $err_message = 'Genre cannot be empty.';
    } else if ($platform == null) {
      $err_message = 'Platform cannot be empty.';
    }

    if ($priority == 'priority') {
      $priority = 1;
    }

    if ($complete_date != NULL) {
      $complete_date = date("Y-m-d", strtotime($complete_date));
    } else {
      $complete_date = NULL;
    }

    // Display any errors
    if (!empty($err_message)) {
      echo '<p>';
      echo htmlspecialchars($err_message);
      echo '</p>';
      $book = get_book($book_id);
      $book_fl = true;
      $game_fl = false;
      $course_fl = false;
      $edit_fl = true;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
      break;
    } else {
      // Update book in database
      update_book($book_id, $name, $author, $genre, $platform, $priority, $complete_date, $summary);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  case 'order_by_name':
    $str = 'name';
    $books = order_books_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  case 'order_by_author':
    $str = 'author';
    $books = order_books_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  case 'order_by_genre':
    $str = 'genre';
    $books = order_books_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  case 'order_by_platform':
    $str = 'platform';
    $books = order_books_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  case 'order_by_date':
    $str = 'date';
    $books = order_books_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
  default:
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/books_view.php");
    break;
}
?>