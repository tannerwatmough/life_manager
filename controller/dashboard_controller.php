<?php 
// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}


// Direct user to page based on link action
switch ($action) {
  case 'day':
    header('Location: https://localhost/life_manager/controller/day_controller.php');
    break;
  case 'week':
    header('Location: https://localhost/life_manager/controller/week_controller.php');
    break;
  case 'month':
    header('Location: https://localhost/life_manager/controller/month_controller.php');
    break;
  case 'seasonal':
    header('Location: https://localhost/life_manager/controller/seasonal_controller.php');
    break;
  default:
    include($_SERVER['DOCUMENT_ROOT'].'/life_manager/view/dashboard_view.php');
    break;
}
?>