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
    $game_fl = false;
    $course_fl = true;
    $edit_fl = false;
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
    break;
  case 'edit_view':
    $book_fl = false;
    $game_fl = false;
    $course_fl = true;
    $edit_fl = true;
    $course_id = filter_input(INPUT_POST,'course_id');
    $course = get_course($course_id);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
    break;
  case 'add':
    // get data from form
    $name = filter_input(INPUT_POST,'name');
    $area = filter_input(INPUT_POST, 'area');
    $location = filter_input(INPUT_POST,'location');
    $complete_date = filter_input(INPUT_POST,'completed');
    $summary = filter_input(INPUT_POST,'summary');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($area == null) {
      $err_message = 'Area cannot be empty.';
    } else if ($location == null) {
      $err_message = 'Location cannot be empty.';
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
      $game_fl = false;
      $course_fl = true;
      $edit_fl = false;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
      break;
    } else {
      // Add course to database
      add_course($name, $area, $location, $complete_date, $summary);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/course_view.php");
    break;
  case 'edit':
     // get data from form
    $course_id = filter_input(INPUT_POST, 'course_id');
    $name = filter_input(INPUT_POST,'name');
    $area = filter_input(INPUT_POST, 'area');
    $location = filter_input(INPUT_POST,'url');
    $complete_date = filter_input(INPUT_POST,'completed');
    $summary = filter_input(INPUT_POST,'summary');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($area == null) {
      $err_message = 'Area cannot be empty.';
    } else if ($location == null) {
      $err_message = 'Location cannot be empty.';
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
      $course = get_course($course_id);
      $book_fl = false;
      $game_fl = false;
      $course_fl = true;
      $edit_fl = true;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_collection_view.php");
      break;
    } else {
      // Update course in database
      update_course($course_id, $name, $area, $location, $complete_date, $summary);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/course_view.php");
    break;
  default:
    $courses = get_all_courses();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/course_view.php");
    break;
}
?>