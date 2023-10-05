<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/habit_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Get habit_id for increment/decrement/edit.
$habit_id = filter_input(INPUT_POST, 'habit_id');
if ($habit_id == NULL) {
  $habit_id = filter_input(INPUT_GET, 'habit_id');
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
    $habits = get_all_habits();
    foreach ($habits as $habit) {
      if ($habit['dailyId'] == $habit_id) {
        $current = $habit['currStreak'];
        $longest = $habit['maxStreak'];
        $current++;
        if ($current > $longest) {
          $longest = $current;
        }
        update_streak($habit_id, $current, $longest);
      }
    }
    header("Location: ../view/daily_view.php".$location);
    break;
  case 'decrement_value':
    // Get array of habits from database
    $habits = get_all_habits();
    foreach ($habits as $habit) {
      if ($habit['dailyId'] == $habit_id) {
        $current = $habit['currStreak'];
        // Ensure no negative values.
        if ($current > 0) {
          $current--;
        }
        $longest = $habit['maxStreak'];
        update_streak($habit_id, $current, $longest); 
      }
    }
    header("Location: ../view/daily_view.php".$location);
    break;
  case 'edit':
    // Get array of habits from database
    $habits = get_all_habits();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_habit_view.php");
    break;  
  default:
    // Get array of habits from database
    $habits = get_all_habits();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/daily_view.php");
    break;
}
?>