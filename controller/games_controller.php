<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/collection_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Direct user to page based on link action
switch ($action) {
  case 'add_view':
    $book_fl = false;
    $game_fl = true;
    $course_fl = false;
    $edit_fl = false;
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
    break;
  case 'edit_view':
    $book_fl = false;
    $game_fl = true;
    $course_fl = false;
    $edit_fl = true;
    $game_id = filter_input(INPUT_POST,'game_id');
    $game = get_game($game_id);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
    break;
  case 'add':
    // get data from form
    $name = filter_input(INPUT_POST,'name');
    $platform = filter_input(INPUT_POST, 'platform');
    $length = filter_input(INPUT_POST,'length');
    $recording = filter_input(INPUT_POST, 'recording');
    $complete_date = filter_input(INPUT_POST,'completed');
    $summary = filter_input(INPUT_POST,'summary');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($platform == null) {
      $err_message = 'Platform cannot be empty.';
    } else if ($length == null) {
      $err_message = 'Length cannot be empty.';
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
      $book_fl = false;
      $game_fl = true;
      $course_fl = false;
      $edit_fl = false;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
      break;
    } else {
      // Add game to database
      add_game($name, $platform, $length, $recording, $complete_date, $summary);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/games_view.php");
    break;
  case 'edit':
     // get data from form
    $game_id = filter_input(INPUT_POST, 'game_id');
    $name = filter_input(INPUT_POST,'name');
    $platform = filter_input(INPUT_POST, 'platform');
    $length = filter_input(INPUT_POST,'length');
    $recording = filter_input(INPUT_POST, 'recording');
    $complete_date = filter_input(INPUT_POST,'completed');
    $summary = filter_input(INPUT_POST,'summary');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($platform == null) {
      $err_message = 'Platform cannot be empty.';
    } else if ($length == null) {
      $err_message = 'Length cannot be empty.';
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
      $game = get_game($game_id);
      $book_fl = false;
      $game_fl = true;
      $course_fl = false;
      $edit_fl = true;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
      break;
    } else {
      // Update game in database
      update_game($game_id, $name, $platform, $length, $recording, $complete_date, $summary);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/games_view.php");
    break;
  default:
    $games = get_all_games();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/games_view.php");
    break;
}
?>