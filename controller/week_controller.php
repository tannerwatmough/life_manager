<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/task_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Get weekly_id for increment/decrement/edit.
$week_id = filter_input(INPUT_POST, 'week_id');
if ($week_id == NULL) {
  $week_id = filter_input(INPUT_GET, 'week_id');
}

// Get location for redirect.
$location = filter_input(INPUT_POST, 'location');
if ($location == NULL) {
  $location = filter_input(INPUT_GET, 'location');
}

// Direct user to page based on link action
switch ($action) {
  case 'increment_value':
    // Get array of habits from database
    $weeklies = get_all_weekly();
    foreach ($weeklies as $weekly) {
      if ($weekly['weeklyId'] == $week_id) {
        $current = $weekly['currStreak'];
        $longest = $weekly['maxStreak'];
        $current++;
        if ($current > $longest) {
          $longest = $current;
        }
        update_weekly_streak($week_id, $current, $longest);
      }
    }
    header("Location: ../view/week_view.php".$location);
    break;
  case 'decrement_value':
    // Get array of habits from database
    $weeklies = get_all_weekly();
    foreach ($weeklies as $weekly) {
        if ($weekly['weeklyId'] == $week_id) {
            $current = $weekly['currStreak'];
        // Ensure no negative values.
        if ($current > 0) {
            $current--;
        }
        $longest = $weekly['maxStreak'];
        update_weekly_streak($week_id, $current, $longest); 
      }
    }
    header("Location: ../view/week_view.php".$location);
    break;
  case 'edit':
    // Get array of habits from database
    $habits = get_all_weekly();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
    break;  
  default:
    // Get array of habits from database
    $habits = get_all_weekly();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/week_view.php");
    break;
}
?>