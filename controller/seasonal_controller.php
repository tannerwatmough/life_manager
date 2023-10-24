<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/task_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Get seasonal_id for increment/decrement/edit.
$season_id = filter_input(INPUT_POST, 'season_id');
if ($season_id == NULL) {
  $season_id = filter_input(INPUT_GET, 'season_id');
}

// Get location for redirect.
$location = filter_input(INPUT_POST, 'location');
if ($location == NULL) {
  $location = filter_input(INPUT_GET, 'location');
}

// Direct user to page based on link action
switch ($action) {
  case 'increment_value':
    // Get array of seasonals from database
    $seasonals = get_all_seasonal();
    foreach ($seasonals as $seasonal) {
      if ($seasonal['seasonalId'] == $season_id) {
        $current = $seasonal['currStreak'];
        $longest = $seasonal['maxStreak'];
        $current++;
        if ($current > $longest) {
          $longest = $current;
        }
        update_seasonal_streak($season_id, $current, $longest);
      }
    }
    header("Location: ../view/seasonal_view.php".$location);
    break;
  case 'decrement_value':
    // Get array of seasonals from database
    $seasonals = get_all_seasonal();
    foreach ($seasonals as $seasonal) {
        if ($seasonal['seasonalId'] == $season_id) {
            $current = $seasonal['currStreak'];
        // Ensure no negative values.
        if ($current > 0) {
            $current--;
        }
        $longest = $seasonal['maxStreak'];
        update_seasonal_streak($season_id, $current, $longest); 
      }
    }
    header("Location: ../view/seasonal_view.php".$location);
    break;
  case 'edit':
    // Get array of seasonals from database
    $seasonals = get_all_seasonal();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
    break;  
  default:
    // Get array of seasonals from database
    $seasonals = get_all_seasonal();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/seasonal_view.php");
    break;
}
?>