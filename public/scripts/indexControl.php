<?php
    session_start();

    if (!isset($_SESSION['index'])) {
        $_SESSION['index'] = 0;
    }

    if (isset($_POST['direction'])) {
        $direction = $_POST['direction'];
        $pages = 2; 

        if ($direction === 'right' && $_SESSION['index'] < $pages) {
            $_SESSION['index']++;
        } 
        elseif ($direction === 'left' && $_SESSION['index'] > 0) {
            $_SESSION['index']--;
        }
    }

    echo json_encode(['status' => 'success']);
?>
