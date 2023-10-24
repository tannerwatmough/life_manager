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

// Get all seasonals
function get_all_seasonal() {
    global $db;
    $query = 'SELECT * FROM seasonaltask ORDER BY seasonalId';
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

// Update seasonal streak, longest, and last date done
function update_seasonal_streak($id, $current, $longest) {
    global $db;
    $query = 'UPDATE seasonaltask 
              SET currStreak = :current_streak,
                  maxStreak = :longest_streak,
                  lastDate = now()
              WHERE seasonalId = :season_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':current_streak', $current);
        $statement->bindValue(':longest_streak', $longest);
        $statement->bindValue(':season_id', $id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Get all goals
function get_all_goals() {
    global $db;
    $query = 'SELECT * FROM goals ORDER BY name';
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

// Get one goal by id
function get_goal($goal_id) {
    global $db;
    $query = 'SELECT * FROM goals WHERE goalId = :goal_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':goal_id', $goal_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Order goals
function order_goals_by($str) {
    global $db;
    
    $sort_direction = 'DESC';

    if ($str != 'date') {
        $sort_direction = 'ASC';
    }

    $query = "SELECT * FROM goals ORDER BY 
                case :string 
                    when 'name' then name
                    when 'priority' then priority
                    else dueDate
                end
                $sort_direction
            ";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':string', $str);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Add goal to database
function add_goal($name, $category, $info, $priority, $due_date, $complete_date) {
    global $db;
    $query = 'INSERT INTO goals
                (email, name, category, info, priority, dueDate, completedDate)
              VALUES
                (:email, :name, :category, :info, :priority, :dueDate, :completedDate)';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':email', 'tannerwatmough@gmail.com'); 
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':category', $category); 
        $statement->bindValue(':info', $info); 
        $statement->bindValue(':priority', $priority); 
        $statement->bindValue(':dueDate', $due_date); 
        $statement->bindValue(':completedDate', $complete_date);         
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

// Update goal
function update_goal($goal_id, $name, $category, $info, $priority, $due_date, $complete_date) {
    global $db;
    $query = 'UPDATE goals
            SET 
                name = :name,
                category = :category,
                info = :info,
                priority = :priority,
                dueDate = :dueDate,
                completedDate = :completed
            WHERE goalId = :goal_id';
    try {
        $statement = $db->prepare($query);
        // Needs to change to user logged in.
        $statement->bindValue(':goal_id', $goal_id);
        $statement->bindValue(':name', $name); 
        $statement->bindValue(':category', $category); 
        $statement->bindValue(':info', $info); 
        $statement->bindValue(':priority', $priority); 
        $statement->bindValue(':dueDate', $due_date); 
        $statement->bindValue(':completedDate', $complete_date);   
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }
}

?>