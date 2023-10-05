<?php
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/database.php");

// Get all habits
function get_all_habits() {
    global $db;
    $queryHabits = 'SELECT * FROM dailyHabit ORDER BY dailyId';
    try {
        $statement = $db->prepare($queryHabits);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

?>