<?php
  require_once '../components/header.php';
  require_once '../components/footer.php';
  require_once '../components/filmdetails.php';
  require_once '../data/verwerkFilm.php';
  session_start();

  if (!isset($_SESSION['user'])) {
    header('Location: ../inloggen.php?inloggen=error');
  }

  if(!empty($_GET['movieid'])) {
      $titelTijdJaarVerhaal = haalTitelTijdJaarVerhaalOp($_GET['movieid']);
      $directors = haalDirectorsOp($_GET['movieid']);
      $cast = haalCastOp($_GET['movieid']);
  } else {
      header('Location: ingelogd.php');
  }

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/style/normalize.css">
    <link rel="stylesheet" href="../resources/style/styles.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico">
    <title>Fletnix - <?php echo $titelTijdJaarVerhaal['title']; ?></title>
</head>

<body>
    <header>
        <?php maakHeaderIngelogd('film')?>
    </header>

    <main>
        <section class="detailpagina-container">
            <article>
                <!-- Bron: https://www.europosters.nl/posters/one-punch-man-collage-v31633-->
                <img class="poster" src=../resources/images/placeholder.png alt="<?php echo $titelTijdJaarVerhaal['title'];?>">
                <h2><?php echo $titelTijdJaarVerhaal['title']; ?></h2>
                <h3><?php echo $titelTijdJaarVerhaal['publication_year']; ?> - <?php echo minutenNaarDuur($titelTijdJaarVerhaal['duration'])?></h3>

                <a class="btn" href="trailer.php">Speel af</a>

                <h4>Facts</h4>
                <p>Directors: 
                <?php
                $arrayGrootte = count($directors);
                    if($arrayGrootte > 1) {
                        echo implode(', ', array_map(function($d){return "$d[firstname] $d[lastname]";}, $directors));
                        
                    } else {
                        foreach($directors as $hoofdrolspelers) {
                            echo $hoofdrolspelers['firstname'] . ' ' . $hoofdrolspelers['lastname'];
                        }
                    }
                ?>
                </p>

                <h4>De cast</h4>
                <?php 
                foreach($cast as $hoofdrolspelers) {
                    echo '<p>' . $hoofdrolspelers['firstname'] . ' ' . $hoofdrolspelers['lastname'] . ' ' . $hoofdrolspelers['role'] . '</p>';
                }
                ?>

                <h4>Het verhaal</h4>
                <p><?php echo $titelTijdJaarVerhaal['description']?></p>
            </article>
        </section>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>

</html>