<?php 
// Start session management
// session_start();

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Direct user to page based on link action
switch ($action) {
  case 'collections':
    include('controller/collections_controller.php');
    break;
  case 'tasks':
    include('controller/tasks_controller.php');
    break;
  case 'goals':
    include('controller/goals_controller.php');
    break;
  case 'daily':
    include('controller/daily_controller.php');
    break;
  default:
    include('view/home_view.php');
    break;
}
?>