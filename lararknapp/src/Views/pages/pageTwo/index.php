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
       <p>tjenare [insert name here] klicka på den lärare vars schema du vill ha.</p>
       
    </div>
    
    <div class="bildlada">
    <?php
    $lar = array(
                    "/bilder/edvard-mattsson-larare-svenska-historia-scaled-300x300.jpg", 
                    "/bilder/jonn-berndtsson-larare-samhallskunskap-och-psykologi-scaled-300x300.jpg", 
                    "/bilder/ann-kristin-lindgren-estet-och-medialarare-scaled-300x300.jpg", 
                    "/bilder/maria-gardeman-holmberg-larare-estet-mediaamnen-300x300.jpg", 
                    "/bilder/arrow-right-solid.svg", 
                    "/bilder/mans-300x312.jpg", 
                    "/bilder/tyra-bjurman-larare-teknikamnen-scaled-300x300.jpg", 
                    "/bilder/arrow-right-solid.svg"
                );
     foreach ($lar as $index => $knapp) {
        // creates buttons for the elements in the array, all with an unique id based on their placement in the array.
        echo "<button class='button' id='button-$index' type='button'>
                <img class='lararbild' src='$knapp' alt='Button Image'>
              </button>";
      
    
     } 
    ?>
   
    </div>
     <style>
      #button-4 {
      background: transparent;
      border: none;
      transform: scaleX(-1);
      }
      #button-7 {
      background: transparent;
      border: none;
      }
    </style>
  
    <script src="/scripts/pageTwoBtn.js"></script>
  </body>
  </html>