<?php
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/database.php");

// Get all habits
function get_all_habits() {
    global $db;
    $query = 'SELECT * FROM dailyHabit ORDER BY dailyId';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

function update_streak($habit_id, $current, $longest) {
    global $db;
    $query = 'UPDATE dailyHabit 
              SET currStreak = :current_streak,
                  maxStreak = :longest_streak,
                  lastDate = now()
              WHERE dailyId = :habit_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':current_streak', $current);
        $statement->bindValue(':longest_streak', $longest);
        $statement->bindValue(':habit_id', $habit_id);
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