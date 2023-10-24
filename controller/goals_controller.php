<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/task_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

$goals = get_all_goals();

// Direct user to page based on link action
switch ($action) {
  case 'add_view':
    $edit_fl = false;
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
    break;
  case 'edit_view':
    $edit_fl = true;
    $goal_id = filter_input(INPUT_POST,'goal_id');
    $goal = get_goal($goal_id);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
    break;
  case 'add':
    // get data from form
    $name = filter_input(INPUT_POST,'name');
    $category = filter_input(INPUT_POST, 'category');
    $info = filter_input(INPUT_POST,'info');
    $priority = filter_input(INPUT_POST,'priority');
    $complete_date = filter_input(INPUT_POST,'completed');
    $due_date = filter_input(INPUT_POST,'due_date');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($category == null) {
      $err_message = 'Category cannot be empty.';
    } 

    if ($category == 'career') {
      $category = 10;
    } else if ($category == 'environment') {
      $category = 6;
    } else if ($category == 'growth') {
      $category = 11;
    } else if ($category == 'health') {
      $category = 7;
    } else if ($category == 'life') {
      $category = 9;
    } else if ($category == 'relations') {
      $category = 8;
    } 

    if ($priority == 'priority') {
      $priority = 1;
    }

    if ($due_date != NULL) {
      $due_date = date("Y-m-d", strtotime($due_date));
    } else {
      $due_date = NULL;
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
      $edit_fl = false;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
      break;
    } else {
      // Add goal to database
      add_goal($name, $category, $info, $priority, $due_date, $complete_date);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/goals_view.php");
    break;
  case 'edit':
     // get data from form
    $goal_id = filter_input(INPUT_POST, 'goal_id');
    $name = filter_input(INPUT_POST,'name');
    $category = filter_input(INPUT_POST, 'category');
    $info = filter_input(INPUT_POST,'info');
    $priority = filter_input(INPUT_POST,'priority');
    $complete_date = filter_input(INPUT_POST,'completed');
    $due_date = filter_input(INPUT_POST,'due_date');

    // validate fields
    if ($name == null) {
      $err_message = 'Name cannot be empty.';
    } else if ($category == null) {
      $err_message = 'Author cannot be empty.';
    } 

    if ($priority == 'priority') {
      $priority = 1;
    }

    if ($due_date != NULL) {
      $due_date = date("Y-m-d", strtotime($due_date));
    } else {
      $due_date = NULL;
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
      $goal = get_goal($goal_id);
      $edit_fl = true;
      include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
      break;
    } else {
      // Update goal in database
      update_goal($goal_id, $name, $category, $info, $priority, $due_date, $complete_date);
    }
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/goals_view.php");
    break;
  case 'order_by_name':
    $str = 'name';
    $goals = order_goals_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/goals_view.php");
    break;
  case 'order_by_priority':
    $str = 'priority';
    $goals = order_goals_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/goals_view.php");
    break;
  case 'order_by_date':
    $str = 'date';
    $goals = order_goals_by($str);
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/goals_view.php");
    break;
  default:
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/goals_view.php");
    break;
}
?>