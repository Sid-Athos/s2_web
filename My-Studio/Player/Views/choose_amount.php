<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="../Controllers/Functions/JS/img_preview.js"></script>
  <script type="text/javascript" src="../Controllers/Functions/JS/datepicker.js"></script>
  <script type="text/javascript" src="../Controllers/Functions/JS/body_load.js"></script>
  
<style>
  body {
    max-width:100%;
    margin-left:500px;
    display: none;
    font-family: 'Encode Sans Condensed', sans-serif;
    font-size: 18px;
    color: #decba4;
    background-color :#C71585;
  }
  .parent{
  width: 200px;
  height: 90px;
  margin-top:-32%;
  border: 2px solid #decba4;
  border-radius:6px;
  overflow: hidden;
  background-color: #333333;
}
.child{
  height: 100%;
  margin-right: -50px; /* maximum width of scrollbar */
  padding-right: 50px; /* maximum width of scrollbar */
  overflow-y: scroll;
  background-color: #333333;
}
  div {
    float:right;
    margin-top:10px;
    font-family: 'Encode Sans Condensed', sans-serif;
  }
   a {
    color: #decba4;
    font-family: 'Encode Sans Condensed', sans-serif;
  }
  audio{
    font-size: 18px;
    color: #decba4;
    background-color :#C71585;
  }
  input, button {
    font-family: 'Encode Sans Condensed', sans-serif;
    color: #333333;
    width : 170px;
    height: 35px;
    margin-top: 20px;
    border-radius: 6px;
    border-color: 6px solid #decba4;
}
  input:hover{
    font-family: 'Encode Sans Condensed', sans-serif;
    background:#FFFFFF;
    border:none;
    color:#333333;
    box-shadow: 0 0 5px #FFEDBC;
    border: 2px solid #FFEDBC;
border-radius:5px;
  }
  input:active{
    font-family: 'Encode Sans Condensed', sans-serif;
    background:#FFFFFF;
    border:none;
    color:#333333;
    box-shadow: 0 0 5px #FFEDBC;
    border: 2px solid #FFEDBC;
border-radius:5px;
  }
  input:focus{
    font-family: 'Encode Sans Condensed', sans-serif;
    background:#FFFFFF;
    border:none;
    color:#333333;
    box-shadow: 0 0 5px #FFEDBC;
    border: 2px solid #FFEDBC;
border-radius:5px;
  }
  input[type=file]{
    background:#FFFFFF;
    border:none;
    color:#333333;
    box-shadow: 0 0 5px #FFEDBC;
    border: 2px solid #FFEDBC;
    border-radius:5px;
    width: 150px;
  }
</style>
<body onload="">
  <center>
    <div class="container" style ="float:left; margin-left:15%; margin-top:0; display: inline;max-width: 350px; text-align:center">
      <form action="../Controllers/upload_music.php" method="POST" name="album_choice" enctype="multipart/form-data">
      <div class="form-group">
        Artiste<br>
        <input type="text" required data-toggle="Tooltip"  data-placement="right" placeholder='Artiste' title="Nom de l'artiste" name='artist' style='text-align:center'><br>
        Titre de l'album <br>
        <input type="text" style ="text-align:center" title ="Nom de l'album" name="album" required placeholder="Nom de l'album"><br>
        Nombre de pistes<br>
        <input type="number" style ="width:50px; text-align:center " title="Nombre de pistes dans l'album" required min ="1" max="30" step="1" name="track_count"value="1"><br>
        Date (jj/mm/aaaa) <br>
        <input type="date" onclick="datepicker()" id="datepicker" title="Date de sortie de l'album"  required style="width:70px" name="release_date"><br>
        <div class="container" style="display:inline-block; text-align:center">
        Cover <br>
        <input type='file' name ='coverFile' title="Pochette" onchange="readURL(this);" />
        <img id="blah" style="max-width:100px;text-align:bottom; max-height:150px;vertical-align:middle; position:relative;opacity: 0.75;filter: alpha(opacity=50)" 
        alt="Preview" />
        </div><br>
        <input type="submit" name="confirmer" value="Confirmer">
        </div>
      </form>
    </div>
  </center>
<div class="audio" style="position: relative; margin-right:81%; float: bottom">
  <audio controls id="myaudio">
    
  </audio>
  </div>
</body>
<script>
body_load();
datepicker();
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
function myFunction() {
    location.reload();
}
</script>
</html>

