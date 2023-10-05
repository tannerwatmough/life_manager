<?php 
    // Define login info for database.
    $dsn = 'mysql:host=localhost;dbname=life_manager';
    $username = 'lm_admin';
    $password = 'pa55word';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Connect to database or display error message.
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
        exit();
    }

    // Displays error messages.
    function display_db_error($error_message) {
        include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/error_view.php");
        exit();
    }
?>