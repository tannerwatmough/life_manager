<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/task_database.php");

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

// Get monthly_id for increment/decrement/edit.
$month_id = filter_input(INPUT_POST, 'month_id');
if ($month_id == NULL) {
  $month_id = filter_input(INPUT_GET, 'month_id');
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
    $monthlies = get_all_monthly();
    foreach ($monthlies as $monthly) {
      if ($monthly['monthlyId'] == $month_id) {
        $current = $monthly['currStreak'];
        $longest = $monthly['maxStreak'];
        $current++;
        if ($current > $longest) {
          $longest = $current;
        }
        update_monthly_streak($month_id, $current, $longest);
      }
    }
    header("Location: ../view/month_view.php".$location);
    break;
  case 'decrement_value':
    // Get array of habits from database
    $monthlies = get_all_monthly();
    foreach ($monthlies as $monthly) {
        if ($monthly['monthlyId'] == $month_id) {
            $current = $monthly['currStreak'];
        // Ensure no negative values.
        if ($current > 0) {
            $current--;
        }
        $longest = $monthly['maxStreak'];
        update_monthly_streak($month_id, $current, $longest); 
      }
    }
    header("Location: ../view/month_view.php".$location);
    break;
  case 'edit':
    // Get array of habits from database
    $habits = get_all_monthly();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/edit_task_view.php");
    break;  
  default:
    // Get array of habits from database
    $habits = get_all_monthly();
    include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/month_view.php");
    break;
}
?>