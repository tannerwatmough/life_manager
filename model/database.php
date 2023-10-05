<?php 
    $dsn = 'mysql:host=localhost;dbname=life_manager';
    $username = 'lm_admin';
    $password = 'pa55word';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/error_view");
        exit();
    }

    function display_db_error($error_message) {
        include($_SERVER['DOCUMENT_ROOT']."/life_manager/view/error_view.php");
        exit();
    }
?>