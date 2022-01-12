<?php
require_once 'components/header.php';
require_once 'components/footer.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/normalize.css">
    <link rel="stylesheet" href="resources/style/styles.css">
    <link rel="shortcut icon" href="resources/images/favicon.ico">
    <title>Fletnix - Abonnement</title>
</head>
<body>
    <header>
        <?=maakHeader('abonnement')?>
    </header>

    <main>
            <section class="abonnement-container">
                <article>
                    <h2>Basic</h2>
                    <p>€4.99 / maand</p>
                    <ul>
                        <!-- Bron: https://fonts.google.com/icons?selected=Material+Icons -->
                        <li><span class="icon"><img src="resources/icons/kruis.png" alt="Kruis icoon"></span>Met reclame</li>
                        <li><span class="icon"><img src="resources/icons/een.png" alt="Een persoon icoon"></span>1 scherm tegelijk</li>
                        <li><span class="icon"><img src="resources/icons/check.png" alt="Check icoon"></span>480p</li>
                    </ul>
                    <a class="btn" href="registratieformulier.php?abonnement=basic">Kies Basic</a>
                </article>
                <article>
                    <h2>Premium</h2>
                    <p>€7.99 / maand</p>
                    <ul>
                        <!-- Bron: https://fonts.google.com/icons?selected=Material+Icons -->
                        <li><span class="icon"><img src="resources/icons/check.png" alt="Check icoon"></span>Reclamevrij</li>
                        <li><span class="icon"><img src="resources/icons/twee.png" alt="Twee personen icoon"></span>2 schermen tegelijk</li>
                        <li><span class="icon"><img src="resources/icons/hd.png" alt="HD icoon"></span>1080p</li>
                    </ul>
                    <a class="btn" href="registratieformulier.php?abonnement=premium">Kies Premium</a>
                </article>
                <article>
                    <h2>Pro</h2>
                    <p>€11.99 / maand</p>
                    <ul>
                        <!-- Bron: https://fonts.google.com/icons?selected=Material+Icons -->
                        <li><span class="icon"><img src="resources/icons/check.png" alt="Check icoon"></span>Reclamevrij</li>
                        <li><span class="icon"><img src="resources/icons/vier.png" alt="Een groep mensen icoon"></span>4 schermen tegelijk</li>
                        <li><span class="icon"><img src="resources/icons/4k.png" alt="4K+ icoon"></span>4K+HDR</li>
                    </ul>
                    <a class="btn" href="registratieformulier.php?abonnement=pro">Kies Pro</a>
                </article>
            </section>
    </main>
    <footer>
        <?=maakFooter()?>
    </footer>
</body>
</html>