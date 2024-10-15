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
                  "/bilder/mickael-jonsson-it-amnen-apl-samordnare-300x300.jpg", 
                  "/bilder/lars-jonsson-larare-it-amnen-apl-samordnare-300x300.jpg", 
                  "/bilder/marcus-300x308.jpg", 
                  "/bilder/pooya-mehrpooyan-larare-matematik-300x300.jpg", 
                  "/bilder/robert-shipton-larare-engelska-och-religion-300x300.jpg", 
                  "/bilder/robin-300x306.jpg", 
                  "/bilder/toshihide-shirahama-larare-japanska-scaled-300x300.jpg", 
                  "/bilder/arrow-right-solid.svg"
                );
     foreach ($lar as $index => $knapp) {
        // creates buttons for the elements in the array, all with an unique id based on their placement in the array.
        echo "<button class='button' id='button-$index' type='button'>
                <img class='lararbild' id='img-$index' src='$knapp' alt='Button Image'>
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
    <script src="/scripts/pageOneBtn.js"></script>
  </body>
  </html>