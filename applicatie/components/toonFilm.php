<?php
function toonFilms($data) {
    foreach ($data as $film) {
        echo <<<OTD
        <div class="film-card">
        <a href="film.php?movieid={$film['movie_id']}"><img class="film-card-img" src="../resources/images/img3.jpg" alt="{$film['title']}"></a>
        <p>{$film['title']}</p>
        </div>
        OTD;
    }
}