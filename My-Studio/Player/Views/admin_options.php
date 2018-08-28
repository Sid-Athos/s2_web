<!doctype>
<html>
<head>
    <title>MyStudio, admin</title>
    <meta content='http-equiv' content-type='text/html'/>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../Controllers/Functions/JS/img_preview.js"></script>
    <script type="text/javascript" src="../Controllers/Functions/JS/body_load.js"></script>
    <link type="text/CSS" rel="stylesheet" href="../Player/Views/CSS/stylesheet.css">
</head>
<body style="width:98%">
    <table style="width:101.45%;height:95%"><thead style="width:100%;height:8%"><tr><td colspan="2"style="float:right;text-align:center;vertical-align:top">Bienvenue à toi jeune éphèbe</td></tr></thead>
    <tr style="height:10%"><td class="body_zone"style="text-align:center;float:middle">Lorem Ipsum Dolor Sit Amet</td>
    <td class="options_zone" rowspan="2"style="text-align:center;width:12%;height:auto">
        <form action="../Player/index.php?page=administration" name="options" method="POST">
        <ul ss-container style="padding:5px">
            <li><div style="background-color:#decba4">Vos options :</div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="add_style" value="Ajouter un Genre"></div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="add_lyrics" value="Ajouter des Paroles"></div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="add_artist" value="Nouvel Artiste"></div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="add_album" value="Nouvel Album"></div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="remove_album" value="Supprimer un Album"></div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="remove_artist" value="Supprimer un Artiste"></div></li>
            <li><div class="button_choice"><input class = "button" type="submit" name="suppress_music" value="Supprimer une musique"></div></li>
        </ul>
        </form>
    </td></tr>
    <tr><td style="text-align:center">Petites infos</td></tr>
    <tfoot class="footer_zone" style="width:101.45%;height:10%;margin-left:-15px"><tr><td colspan="2"style="text-align:center">Footer
    il semble que sid ait compris bootstrap et soit capable d'appliquer le concept a plein plein de choses</td></tr></tfoot>
    </table>