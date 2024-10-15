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
                  "/bilder/anna-lena-300x298.jpg", 
                  "/bilder/chandra-ronnberg-skolskoterska-scaled-300x300.jpg", 
                  "/bilder/foto-eht-skylt-svartvit-300x667.jpg", 
                  "/bilder/katarina-vestlund-specialpedagog-scaled-300x300.jpg", 
                  "/bilder/arrow-right-solid.svg"
                  );
     foreach ($lar as $index => $knapp) {
        // creates buttons for the elements in the array, all with an unique id based on their placement in the array.
        echo "<button class='button' id='button-$index' type='button'>
                <img class='lararbild' src='$knapp' alt='Button Image'>
              </button>";
      //echo "<img class='lararbild' src=$x>";
    
     } 
    ?>
    <!--<button class="arrowbutton">next ➾</button>-->
    <!--<img class="arrow" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Black_Right_Arrow.png/640px-Black_Right_Arrow.png">-->
    </div>

    <style>
    #button-4 {
    background: transparent;
    border: none;
    transform: scaleX(-1);
    }
</style>

    <script src="/scripts/pageThreeBtn.js"></script>
  </body>
  </html>