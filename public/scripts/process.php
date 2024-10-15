<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();

        $tagInputJSON = isset($_POST['keys']) ? $_POST['keys'] : '';
        $tagID = json_decode($tagInputJSON, true);

        if (is_array($tagID)) {
            $tagID = implode(array_map('htmlspecialchars', $tagID));
        }

        $connectionInfo = array( "Database"=>"RCARDSYSTEM", "UID"=>"TE4", "PWD"=>"!TeknikFyra1234");
        $dbLink = sqlsrv_connect( "WIN-D4UO4KA65FF\\RAINSTANCE", $connectionInfo);

        $sql = "SELECT FkUserNumber FROM Cards WHERE CardIdentity = '$tagID'";
        $stmtoutput = sqlsrv_query($dbLink, $sql);
        sqlsrv_fetch($stmtoutput);
        $userNum = sqlsrv_get_field( $stmtoutput, 0 );

        $sql = "SELECT FirstName FROM Users WHERE PkUserNumber = '$userNum'";
        $stmtoutput = sqlsrv_query($dbLink, $sql);
        sqlsrv_fetch($stmtoutput); 
        $_SESSION['firstName'] = sqlsrv_get_field( $stmtoutput, 0 );

        $sql = "SELECT LastName FROM Users WHERE PkUserNumber = '$userNum'";
        $stmtoutput = sqlsrv_query($dbLink, $sql);
        sqlsrv_fetch($stmtoutput);
        $_SESSION['lastName'] = sqlsrv_get_field( $stmtoutput, 0 );
      
        
        if ($_SESSION['lastName'] != null && $_SESSION['firstName'] != null) {
            echo json_encode(['status' => 'success', 'redirect' => 'teachers']);
        }
        else {
            echo json_encode(['status' => 'error', 'message' => 'Försök igen']);
        }
    }
?>
    