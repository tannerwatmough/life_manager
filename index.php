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
  default:
    include('view/home_view.php');
    break;
}
?>