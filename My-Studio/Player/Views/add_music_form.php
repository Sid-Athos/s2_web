<!doctype html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="../Controllers/Functions/JS/img_preview.js"></script>
  <script type="text/javascript" src="../Controllers/Functions/JS/datepicker.js"></script>
  <script type="text/javascript" src="../Controllers/Functions/JS/body_load.js"></script>
  <style>
    body {
    font-family: 'Encode Sans Condensed', sans-serif;
    font-size: 18px;
    color: #decba4;
    background-color :#C71585;
  }
  audio{
    font-size: 18px;
    color: #C71585;
    background-color :#decba4;
  }
  div {
    float:right;
    font-family: 'Encode Sans Condensed', sans-serif;
  }
   a {
    color: #decba4;
    font-family: 'Encode Sans Condensed', sans-serif;
  }
  audio {
    color: #333333;
    font-family: 'Encode Sans Condensed', sans-serif;
  }
  div.container1{
    position: absolute;
    bottom: 0px;
    left: 0px;
  }
  div.container{
    position:relative;
    left:0px;
  }
  input {
    font-family: 'Encode Sans Condensed', sans-serif;
    color: #333333;
    width : 170px;
    height: 35px;
    margin-top: 20px;
    border:0;
    border-radius: 6px;
    border-color: #decba4;
}
  </style>
<body>
  <div class="container" style ="max-width: 750px; max-height:350px;position:relative; margin-right:30%; overflow-y:scroll;overflow-x:hidden;float:center; margin-left:0px">
      <form action="../Controllers/upload_music.php" method="Post" name="musics" enctype="multipart/form-data">
          <caption><bold><center> Formulaire d'ajout de musiques :</center></bold></caption>
          <table><tr><th>Titre :</th><th>Featuring :</th><th>Fichier :</th></tr>
            <?php
            for($i=0; $i<$tracks_amount;$i++){
              echo "<tr><td>Titre : </br>
              <input type ='text' name ='title[]'><input type='hidden' name='album_name' value='".$album_name."'/></td><td>Featuring :<br>
              <input type ='text' name ='feat[]' value=' '></td><td><input type='file' style='vertical-align: middle; padding-top:8px' name ='audioFile[]'/></td></tr>";
            }
            ?>
          </table>
          <center><input type="submit" name = "upload" value = "Télécharger"></center>
      </form>
  </div>
  <br>
  <div class="container1">
  <audio controls>
    <?php if(isset($row)){
      for($i=0;$i<count($row);$i++){
        if(!empty($row[$i]['music_path'])){
          echo "<source src='../{$row[$i]['music_path']}' type='audio/mpeg'>";
        }
      }
    }?>
  </audio>
  </div>
<script>
  datepicker();
  body_load();
 </script>
