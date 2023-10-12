<?php
require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/database.php");

// Get all weeklies
function get_all_weekly() {
    global $db;
    $query = 'SELECT * FROM weeklytask ORDER BY weeklyId';
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

// Get all monthlies
function get_all_monthly() {
    global $db;
    $query = 'SELECT * FROM monthlytask ORDER BY monthlyId';
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
// Updates routine streak, longest streak, and last date a routine was done.
function update_weekly_streak($id, $current, $longest) {
    global $db;
    $query = 'UPDATE weeklytask 
              SET currStreak = :current_streak,
                  maxStreak = :longest_streak,
                  lastDate = now()
              WHERE weeklyId = :week_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':current_streak', $current);
        $statement->bindValue(':longest_streak', $longest);
        $statement->bindValue(':week_id', $id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Update monthly streak, longest, and last date done
function update_monthly_streak($id, $current, $longest) {
    global $db;
    $query = 'UPDATE monthlytask 
              SET currStreak = :current_streak,
                  maxStreak = :longest_streak,
                  lastDate = now()
              WHERE monthlyId = :month_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':current_streak', $current);
        $statement->bindValue(':longest_streak', $longest);
        $statement->bindValue(':month_id', $id);
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