<html><head><meta charset="utf-8"/><link rel="stylesheet" type="text/css" href="theme.css"><title>Debray Rémi</title></head><body>
<?php
    $affichage = 0; // 0=Jours uniquement / 1=JHMS / 2=jour de paye

    $annee = date('Y');
    $mois = date('n');
    $jour_actuel = date('j');
    $paye = mktime(0, 0, 0, $mois, 20, $annee);

    if($jour_actuel > 20) {
       $paye = mktime(0, 0, 0, ++$mois, 20, $annee);
       $affichage = 0;
    } elseif ($jour_actuel == 20){
        $affichage = 2;
    } elseif ($jour_actuel == 19) {
        $affichage = 1;
    } else {
        $affichage = 0;
    }

    $tmpreste = $paye - (time()+3600);

    $mr = $tmpreste/60;
    $hr = $mr/60;
    $jr = $hr/24;
    $sr = floor($tmpreste%60);
    $mr = floor($mr%60);
    $hr = floor($hr%24);
    $jr = floor($jr);
    
    
    switch(2) {
        case 0:
            echo "Il reste ",$jr+1," jours avant la paye..";
            break;
        case 1:
            echo "Preparez la carte bancaire ! Il reste ",$hr," heures ",$mr," minutes et ",$sr," secondes avant la paye !";
            break;
        case 2:
            ?> <h1>C'est jour de paye !</h1>
                <img src="t2PgQt.gif" class="imfront">
                <audio autoplay id="bgsound">
 <source src="musique.mp3"
         type="audio/mp3">
            <?php
    }

?>
</body></html>