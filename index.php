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
    header('Location: https://localhost/life_manager/controller/collections_controller.php');
    break;
  case 'tasks':
    header('Location: https://localhost/life_manager/controller/tasks_controller.php');
    break;
  case 'goals':
    header('Location: https://localhost/life_manager/controller/goals_controller.php');
    break;
  case 'dashboard':
    header('Location: https://localhost/life_manager/controller/dashboard_controller.php');
    break;
  default:
    include('view/home_view.php');
    break;
}
?>