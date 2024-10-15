<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pages.css">
    <title>larare</title>
  </head>
    
  <body>
    <div class="banner">
      <img class="banner-img" src="/bilder/Asset 1Iris_symbol.svg">
        <p><?php
            session_start();
            echo "hej, ". htmlspecialchars($_SESSION['firstName']). " ". htmlspecialchars($_SESSION['lastName']);
        ?></p>     
    </div>
      
      
      
    <div class="bildlada">
      <?php
        if (!isset($_SESSION['index'])) {
            $_SESSION['index'] = 0;
        }

        $umbrella = array(1, 2, 3);
        $teachers = array();

        if ($umbrella[$_SESSION['index']] == 1) {
            $teachers = array(
                "mickael", "lars", "marcus", "pooya", 
                "robert", "robin", "toshihide", "right"
            );
        } 
        elseif ($umbrella[$_SESSION['index']] == 2) {
            $teachers = array(
                "edvard", "jonn", "ann-kristin", "maria",
                "left", "mans", "tyra", "right"
            );
        } 
        elseif ($umbrella[$_SESSION['index']] == 3) {
            $teachers = array(
                "anna-lena", "chandra", "pauline", "katarina",
                "left"
            );
        }

        foreach ($teachers as $index => $teacher) {
            $teacherImage = "/bilder/" . $teacher . ".jpg";
            echo "<button class='button' id='$teacher' type='button'>
                    <img class='lararbild' src='$teacherImage' alt='Button Image'>
                  </button>";
        }
      ?>
    
      </div>
      

      <style>
        #button-7 {
        background: transparent;
        border: none;
        }
      </style>
      <script src="/scripts/teacherButtons.js"></script>
    </body>
  </html>