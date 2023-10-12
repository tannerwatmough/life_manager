<?php
include('header.php');

// Checks if the $habits array is populated.
$habits = filter_input(INPUT_POST, 'habits');
if ($habits == NULL) {
  $habits = filter_input(INPUT_GET, 'habits');
}
// If habits array still unpopulated, run database query to get habits.
if ($habits == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/habit_database.php");
  $habits = get_all_habits();
}
?>

<?php include('footer.php'); ?>