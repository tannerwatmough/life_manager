<?php 

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Direct user to page based on link action
switch ($action) {
  default:
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/seasonal_view.php");
}
?>