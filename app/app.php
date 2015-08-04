<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $first_cd = new CD("Master of Reality", "Black Sabbath", "img/reality.jpeg", 10.99);
        $second_cd = new CD("Electric Ladyland", "Jimi Hendrix", "img/ladyland.jpg", 10.99);
        $third_cd = new CD("Nevermind", "Nirvana", "img/nevermind.jpg", 10.99);
        $fourth_cd = new CD("I don't get it", "Pork Lion", "img/porklion.png", 49.99);
        $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

        $output = "";
        foreach ($cds as $album) {
          $output = $output . "<div class='row'>
              <div class='col-md-6'>
                  <img src=" . $album->getCoverArt() . ">
              </div>
              <div class='col-md-6'>
                  <p>" . $album->getTitle() . "</p>
                  <p>By " . $album->getArtist() . "</p>
                  <p>$" . $album->getPrice() . "</p>
              </div>
            </div>
          ";
        }
        return $output;
    });

    return $app;
?>
