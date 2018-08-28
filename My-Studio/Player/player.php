<!DOCTYPE html>

<html>


<head>

    <meta charset="utf-8">
    
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
    <style type="text/CSS">
        body{
           font-family: 'Raleway', sans-serif;
           background-color:#E6DADA;
           height:auto;
           font-size:26px;
           overflow-x:hidden;
        }
        .main{
            width:200px;
            border-radius:15px;
            border-bottom-left-radius:0px;
            border-bottom-right-radius:0px;
            height:335px;
            position:absolute;
            bottom:-168px;
            left:100px;
            transform: translate(-50%,-50%);
            background-color: #C6426E;
        }
        .cover{
            height:180px;
            width:200px;
            border-top-left-radius:15px;
            border-top-right-radius:15px;
            top:0px;
            z-index:1;
        }
        .player{
            padding: 15px;
            color:#decba4;
        }
       .song_title{
           font-family: 'Raleway', sans-serif;
           font-size:20px;
           position:absolute;
           width:100%;
           text-align:center;
            top:65%;
            left:50%;
            transform: translate(-50%,-50%);
            color :#FFFFFF;
        }
        .controls{
            height:50px;
            width:100%;
            position:absolute;
            left:20%;
            padding-top:60px;
            z-index:99;
        }
        .play{
            border:0;
            background-color: transparent;
            cursor: pointer;
            outline:none;
            z-index:99;

        }
        .pre{
            border:0;
            cursor: pointer;
            background-color: transparent;
            z-index:99;

        }
        .next{
            border:0;
            cursor: pointer;
            background-color: transparent;
            z-index:99;

        }
        .seek_bar_vol {
            width:130px;
            height:2px;
            background-color: #780206;
            display:none;
            position:absolute;
            bottom:70px;
            right:35px;
            cursor: pointer;
            border-radius:4px;
            z-index:99;
            display:none;
        }
        .seek_bar_vol:hover {
            width:100px;
            height:2px;
            background-color: #780206;
            display:none;
            position:absolute;
            bottom:30%;
            right:40px;
            cursor: pointer;
            border-radius:4px;
            z-index:99;
            display:inline;
        }
        .fill_vol{
            height:2.2px;
            width:100px;
            position:absolute;
            bottom:0px;
            background-color:#FFFFFF;
            border-radius:20px;
        }
        .handle_vol{
            width:4px;
            height:4px;
            right:0.5px;
            background-color:#FFFFFF;
            position:relative;
            border-radius:50%;
            transform:scale(1.9);
        }
        
        .seek_bar {
            width:200px;
            height:5px;
            background-color: gray;
            display:flex;
            position:absolute;
            top:180px;
            left:0px;
            cursor: pointer;
            border-top-right-radius:2px;
            border-bottom-right-radius:2px;
            z-index:99;
        }
        .fill{
            height:5px;
            width:33px;
            position:relative;
            top:0px;
            background-color:#FFFFFF;
            border-radius:20px;
            z-index:99;
        }
        .handle{
            width:5px;
            height:5px;
            left:0px;
            top:-1px;
            background-color:#FFFFFF;
            position:absolute;
            border-radius:50%;
            transform:scale(1.9);
            bottom:0.1px;
            z-index:99;
        }
        
        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        ul {
            list-style: none;
            position:relative;
            overflow-y:scroll;
            max-height:740px;
            z-index:3;
        }
        .btn.btn-primary:focus{
            border:none;
            box-shadow: none;
        }
        .btn.btn-primary:active{
            border:none;
            box-shadow: none;
        }
        .modal-dialog{
            width:200px;
            height:90px;
        }
        .modal-content{
            position:absolute;
            width:680px;
            margin-top:40px;
            left:-190px;
        }
        .btn.btn-secondary{
            background-color:#c31432;
        }
        .btn.btn-primary{
            position:absolute;
            left:0;
            bottom:0;
            background-color:#c31432;
            opacity:1.2;
            border:none;
            z-index:99;
            width:25px;
        }
        .btn.btn-primary{
            position:absolute;
            right:150px;
            bottom:0;
            background-color:#c31432;
            opacity:0.6;
            border:none;
            z-index:99;
            width:25px;
        }
        .modal-body{
            font-family: 'Raleway', sans-serif;
            font-size:18px;
            white-space:pre-wrap;
            color:#2980B9;
            text-align:center;
        }
        .btn.btn-primary.dropdown{
            position:fixed;
            right:0;
            height:30px;
            top:0;
            width:290px;
            background-color:#516395;
            border:none;
        }
        .dropdown{
            position: fixed;
            right: -0px;
            height: 30px;
            top: 0;
            width: 290px;
            font-size:16px;
            background-color: #516395;
            border: none;
            border-radius:3px;
            margin-bottom:10px;
        }
        .dropdown-toggle{
            width:300px;
            color:#FFFFFF;
            margin-top:-10px;
            background-color:transparent;
            border:none;
            outline:none;
            color:#decba4;
        }
    </style>
  
<body onload="player();auto_close_control_volume();mute_unmute()" style="cursor:default">
<div id="TxtHint" style="top:0"> 
Mettre la playlist en global pour gérer la lecture random<br>
gérer l'ajout à la file d'attente (push dans la playlist)<br>
gérer l'ajout en lecture suivante (push à l'indice where + 1)

gogogo<br>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" title="Perdu? Cliques ici!" data-toggle="modal" data-target="#exampleModal">
<span style="margin-left:-5px;opacity:1.3">
?</span>
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align:center;z-index:99;background-color:#FFFFFF">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;margin-left:290px">
        <center>Astuces</center></h5>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="z-index:99">X</button>
      </div>
           
      <div class="modal-body" style="margin-top:-25px;max-height:600px;overflow-y:scroll;z-index:3">
      <div style="position:relative" style="margin-top:-50px">
        <div class="btn" style="border:0.2px solid gray;font-size:20px;height:30px;width:200px;margin:0 auto;right:30px">
        <span style="position:relative;right:6px;bottom:5px">Espace</span></div><br>La touche espace sert à controler la lecture/pause</div>
        <div class="dropdown-divider"><p>100</p></div>
        <div style="position:relative" style="top:-90px">
        <div class="btn" style="border:0.2px solid gray;font-weight:bold;font-size:20px;height:30px;width:30px;margin:0 auto;">
        <span style="position:relative;right:6px;bottom:8px">→</span></div><br> La flèche directionnelle droite lance la musique suivante</div>
        <div class="dropdown-divider"><p>100</p></div>

        <div style="position:relative" style="margin-top:-90px">
        <div class="btn" style="border:0.2px solid gray;font-weight:bold;font-size:20px;height:30px;width:30px;margin:0 auto;">
        <span style="position:relative;right:9px;bottom:8px">←</span></div><br> La flèche directionnelle gauche lance la musique précèdente</div>
        <div class="dropdown-divider"><p>100</p></div>
        <div style="position:relative" style="top:-90px">
        <div class="btn" style="border:0.2px solid gray;font-size:20px;height:30px;width:30px;margin:0 auto;">
        <span style="position:relative;right:4px;bottom:5px">R</span></div><br> La touche 'R' réinitialise la durée de la musique</div>
        <div class="dropdown-divider"><p>100</p></div>
        <div style="position:relative" style="top:-90px">
        <div class="btn" style="border:0.2px solid gray;font-size:20px;height:30px;width:30px;margin:0 auto;">
        <span style="position:relative;right:4px;bottom:5px">D</span></div><br> La touche 'D' récupère la playlist en cours d'écoute
        dans un ordre de pistes aléatoire</div>
        <div class="dropdown-divider"><p>100</p></div>
        <div style="position:relative" style="top:-90px">
        <div class="btn" style="border:0.2px solid gray;font-weight:bold;font-size:20px;height:30px;width:30px;margin:0 auto;">
        <span style="position:relative;right:2px;bottom:8px">↑</span></div><br> La flèche directionnelle vers le haut augmente le volume du lecteur</div>
        <div class="dropdown-divider"><p>100</p></div>
        <div style="position:relative" style="top:-90px">
        <div class="btn" style="border:0.2px solid gray;font-weight:bold;font-size:20px;height:30px;width:30px;margin:0 auto;">
        <span style="position:relative;right:2px;bottom:8px">↓</span></div><br> La flèche directionnelle vers le bas diminue le volume du lecteur</div>
        <div class="modal-footer" style='position:absolute;left:40px;color:#780206'>
        En cas de panne ou pour toute assistance complémentaire, 
        les administrateurs sont joignables via la messagerie.

        Toute l'équipe de MyStudio vous souhaite une 
        agréable expérience sur notre site.

        <3
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
                <div class ="player" id="player">
            <div class="main" id="main">
                    <img src='./img/kake.jpg' id="cover" class="cover" />
        
                    <div id="song_title" class="song_title">
                        <div class="title" id="title">
                        MyStudio
                        </div>
                        <div class="current_artist" id="artist" style="opacity:0.5;color:#FFFFFF">by Sid B
                        </div>
                    </div>
                    <div class="controls">
                    
                        <button id="pre" class="pre" title="Musique précèdente" onclick="previous_song()" style="background-image:url('./img/pre.png');
                        background-size: 30px 30px;background-repeat:no-repeat;
                        height:30px;width:30px;position:absolute;right:180px;top:110px;outline:none;border:none"> </button>
            
                        <button id="play_or_pause" title="Play/pause" class="play_pause" onclick="play_or_pause(this.value)" 
                        style="background-image:url('./img/play.png');overflow:visible;background-size:100%;margin-left:30px;cursor:pointer;
                        width:80px;outline:none;background-color:#C6426E;background-repeat:no-repeat;outline:none;border:none;
                        height:50px;width:50px;top:100px;position:absolute;" width="90px" value="0">
                        </button>
                        <button id="next" class="next" title="Musique suivante" onclick="next_song()" style="background-image:url('./img/next.png');
                        background-size: 30px 30px;background-repeat:no-repeat;
                        height:30px;width:30px;position:absolute;right:80px;top:110px;outline:none;border:none"> </button>
                    </div>
                    <div id="seek_bar" class="seek_bar" title="Contrôle du volume">
                        <div id="fill" class="fill">
                        </div>
                        <div class ="handle" id="handle">
                        </div>
                    </div>
                    <button id="vol" class="vol" title="Controle volume" onclick="show_volume_control()" style="background-image:url('./img/high.png');
                        background-size: 30px 30px;background-repeat:no-repeat;
                        height:30px;width:45px;position:absolute;left:3px;top:75%;outline:none;border:none;z-index:99;background-color:transparent;cursor:pointer"> </button>
                        <button id="rep" class="rep" title="Controle volume" onclick="repeat_musics()" 
                        style="background-image:url('./img/rep.png');background-size: 32px 24px;background-repeat:no-repeat;
                        height:30px;width:45px;position:absolute;right:-12px;top:80%;outline:none;border:none;z-index:99;background-color:transparent;cursor:pointer"></button>
                        <button id="shuffle" class="shuffle" title="Controle volume" onclick="shuffle()" 
                        style="background-image:url('./img/sh_off.png');background-size: 32px 24px;background-repeat:no-repeat;
                        height:30px;width:45px;position:absolute;right:-12px;top:87%;outline:none;border:none;z-index:99;background-color:transparent;cursor:pointer"></button>
                        <button id="mute" class="mute" title="Controle volume" onclick="mute()" 
                        style="background-image:url('./img/mute.png');background-size: 20px 20px;background-repeat:no-repeat;
                        height:30px;width:45px;position:absolute;right:-18px;top:93%;outline:none;border:none;z-index:99;background-color:transparent;cursor:pointer"></button>
                        <div id="seek_bar_vol" class="seek_bar_vol" title="Contrôle du volume">
                        <div id="fill_vol" class="fill_vol">
                        </div>
                        <div class ="handle_vol" id="handle_vol">
                        </div>
                        </div>
                    </div>
            </div>
            <div class="dropdown" title="playlist en cours de lecture">
            <button class="dropdown-toggle" id="dropdown01" type="button"  style="outline:none;border:none;margin-top:3px;"
                aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">In'Tech<span id="d"></span>
                    </button>
    <div style="position:absolute;top:5px;right:285px;height:200px">
                <ul class="dropdown-menu"  id="dropdown-menu" style="position:absolute;margin-top:0px;width:290px;margin-left:20px;max-height:200px;color:#333333;background-color:#FFFFFF;border:none;outline:none;overflow-x:hidden;overflow-y:hidden">
    <div style="position:relative;width:307px;height:209px;overflow: scroll;">
    <li id="li" class="dd" style="font-size:16px;width:350px;height:25px;text-align:center">
    <span id="t_a" style="white-space:nowrap;display:inline;margin-left:30px;color:#B24592">xWxW</span></li>
    <div class="dropdown-divider"></div>  

    <li id="li0" class="dd" style="font-size:16px;width:350px;height:25px">
                    <div class="current_playlist" style="font-size:16px;width:350px;height:25px;display:inline;white-space:nowrap">
                    <button onclick="play_or_pause(this.value)" id="play_pause0" value="0" style="background:transparent;border:none;width:30px;display:inline;cursor:pointer">
                    <img src="./img/play.png" height="20px" width="20px" id="play_or_pause0" style="margin-bottom:3px;margin-right:4px">
                    </button></a>
                    <span id="title0" style="white-space:nowrap;display:inline;left:30px;color:#B24592"><a href="" target="_blank" style=";color:#403A3E;opacity:1">Summer Knights</a></span>
                    <span style="white-space:nowrap"> - </span>
                    <span id="artist0" style="white-space:nowrap;color:#B24592"><a href="" target="_blank" style=";color:#403A3E;opacity:0.7">Joey Bad4$$ </a></span>
                    </div>
                    <audio src='./musics/Summer_Knights.mp3' preload ="metadata" id="audio0" class="playlist" preload="none"></audio>
                </li>
                <div class="dropdown-divider"><p>100</p></div>  
                <li id="li1" class="dd" style="font-size:16px;width:350px;height:25px;margin-left:0px;">
                    <div class="current_playlist" style="font-size:16px;width:350px;height:25px;display:inline;white-space:nowrap">
                    <button onclick="play_or_pause(this.value)" id="play_pause1" value="1" style="background:transparent;border:none;width:30px;display:inline;cursor:pointer;">
                    <img src="./img/play.png" height="20px" width="20px" id="play_or_pause1" style="margin-bottom:3px;margin-right:4px">
                    </button></a>
                    <span id="title1" style="white-space:nowrap;display:inline;left:30px;">Waves</span>
                    <span style="white-space:nowrap"> - </span>
                    <span id="artist1" style="white-space:nowrap">Joey Bad4$$ </span>
                    <span style="white-space:nowrap"><a href="">dsqdjsq vdjv dvsqk vdkl dsqd dsq dd sqd dsq dsd qs</a></span>
                    </div>
                    <audio src='./musics/Waves.mp3' preload ="metadata" class="playlist" id="audio1" preload="none"></audio>
                </li>
                <div class="dropdown-divider"></div>  
                <li id="li2" class="dd" style="font-size:16px;width:350px;height:25px;margin-left:0px;">
                    <div class="current_playlist" style="font-size:16px;width:350px;height:25px;display:inline;white-space:nowrap">
                    <button onclick="play_or_pause(this.value)" id="play_pause2" value="2" style="background:transparent;border:none;width:30px;display:inline;cursor:pointer;">
                    <img src="./img/play.png" height="20px" width="20px" id="play_or_pause2" style="margin-bottom:3px;margin-right:4px">
                    </button></a>
                    <span id="title2" style="white-space:nowrap;display:inline;left:30px;">World Domination</span>
                    <span style="white-space:nowrap"> - </span>
                    <span id="artist2" style="white-space:nowrap">Joey Bad4$$ </span>
                    <span style="white-space:nowrap"><a href="">Page artiste</a></span>
                    <audio src='./musics/World Domination.mp3'class="playlist" preload ="metadata" id="audio2" ></audio>
                    </div>
                </li>
                <div class="dropdown-divider"></div>  
                <li id="li2" class="dd" style="font-size:16px;width:350px;height:25px;margin-left:0px;">
                    <div class="current_playlist" style="font-size:16px;width:350px;height:25px;display:inline;white-space:nowrap">
                    <button onclick="play_or_pause(this.value)" id="play_pause2" value="2" style="background:transparent;border:none;width:30px;display:inline;cursor:pointer;">
                    <img src="./img/play.png" height="20px" width="20px" id="play_or_pause2" style="margin-bottom:3px;margin-right:4px">
                    </button></a>
                    <span id="title2" style="white-space:nowrap;display:inline;left:30px;">World Domination</span>
                    <span style="white-space:nowrap"> - </span>
                    <span id="artist2" style="white-space:nowrap">Joey Bad4$$ </span>
                    <span style="white-space:nowrap"><a href="">Page artiste</a></span>
                    </div>
                    <audio src='./musics/World Domination.mp3'class="playlist" preload ="metadata" id="audio2" ></audio>
                </li>
                <div class="dropdown-divider"></div>  
                <li id="li2" class="dd" style="font-size:16px;width:350px;height:25px;margin-left:0px;">
                    <div class="current_playlist" style="font-size:16px;width:350px;height:25px;display:inline;white-space:nowrap">
                    <button onclick="play_or_pause(this.value)" id="play_pause2" value="2" style="background:transparent;border:none;width:30px;display:inline;cursor:pointer;">
                    <img src="./img/play.png" height="20px" width="20px" id="play_or_pause2" style="margin-bottom:3px;margin-right:4px">
                    </button></a>
                    <span id="title2" style="white-space:nowrap;display:inline;left:30px;">World Domination</span>
                    <span style="white-space:nowrap"> - </span>
                    <span id="artist2" style="white-space:nowrap">Joey Bad4$$ </span>
                    <span style="white-space:nowrap"><a href="">Page artiste</a></span>
                    </div>
                    <audio src='./musics/World Domination.mp3'class="playlist" preload ="metadata" id="audio2" ></audio>
                </li>
                <div class="dropdown-divider"></div>  
                <li id="li3" class="dd" style="font-size:16px;width:350px;height:25px;margin-left:0px;display:inline">
                <div class="current_playlist" style="font-size:16px;width:350px;height:25px;display:inline;white-space:nowrap">
                    <button onclick="play_or_pause(this.value)" id="play_pause3" value="3" style="background:transparent;border:none;width:30px;display:inline;cursor:pointer;">
                    <img src="./img/play.png" height="20px" width="20px" id="play_or_pause3" style="margin-bottom:3px;margin-right:4px">
                    </button>
                    <span id="title3" style="white-space:nowrap;display:inline;left:30px;">Suspect</span>
                    <span style="white-space:nowrap"> - </span>
                    <span id="artist3" style="white-space:nowrap">Joey Bad4$$ </span>
                    <span style="white-space:nowrap"><a href="">Page artiste</a></span>
                    <audio src='./musics/Suspect.mp3' class="playlist" preload ="metadata" id="audio3" ></audio>
                    </div>
                </li>
                <div id="divider2" class="dropdown-divider"></div>  
            </ul>
            </div>
            </div>
            <div id="lol"></div>
            <?php
            if(isset($_POST['song'])){
                echo '<br><br><br><br>b<br>';
                var_dump($_POST);
            }
            ?>
</body>

<script>
    /* Affichage manuel de la barre de volume lors d'un click */
    function show_volume_control(){
        var vol = document.getElementById('seek_bar_vol');
            if(vol.style.display === 'none'){
                vol.style.display = 'block';
            } else {
                vol.style.display = 'none';

            }
        
    }
    /* Garde (ou pas) la musique en mute state, applique le mute à la playlist */
    function mute_unmute(){
        var vol = document.getElementById('mute');
        var where = document.getElementById('play_or_pause').value;
            if(vol.style.backgroundImage === 'url("./img/mute.png")'){
                playlist[where].muted = false;
            } else {
                playlist[where].muted = true;
                
            }
        setTimeout(mute_unmute,200);
    }
    /* Change l'image mute/unmute et applique le choix sur la musique en cours */
    function mute(){
        var vol = document.getElementById('mute');
        var where = document.getElementById('play_or_pause').value;
        console.log(playlist);
        console.log(where);
            if(vol.style.backgroundImage === 'url("./img/mute.png")'){
                vol.style.backgroundImage = 'url("./img/unmute.png")';
                playlist[where].muted = true;
            } else {
                vol.style.backgroundImage = 'url("./img/mute.png")';
                playlist[where].muted = false;
                
            }
        
    }

/* état d'avancée de la piste, fonction qui permet de drag et de remplir la barre d'avancée, selon le déplacement le 
curseur */
dragElement(document.getElementById("handle"));

function dragElement(elmnt) {
    var pos = 0, ref_pos = 0,  cal_pos = 0,pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    
    elmnt.onmousedown = dragMouseDown;
    function dragMouseDown(e) {
        var where = Number(document.getElementById('play_or_pause').value);
    playlist = document.getElementsByTagName('audio');
    playlist[where].muted = true;
    console.log(playlist[where].muted);
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        
        pos4 = e.clientX;
        
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    var where = Number(document.getElementById('play_or_pause').value);
    playlist = document.getElementsByTagName('audio');
    playlist[where].muted = true;

    pos = Number(e.clientX);
    cal = pos/200;
    time = Math.round(cal * playlist[where].duration);
    ref_pos = e.clientX+11;
        if(pos >= 0 && pos <= 200){
            // set the element's new position:
            document.getElementById('handle').style.left = pos + "px";
            document.getElementById('fill').style.width = pos + "px";
            playlist[where].currentTime = time;
            lol = document.getElementById('play_or_pause'+ where).src;
            if(document.getElementById('play_or_pause'+ where).src === 'http://localhost/code_s2/l-kgfulgqliu65QZDPH/My-Studio/Player/img/pause.png'){
                playlist[where].play();

            } else {
                playlist[where].pause();
            }
            elmnt.style.left = (pos-1) + "px";
        } else {
            document.getElementById('fill').style.width = 200 + "px";
            document.getElementById('mus_op').style.width = 360 + "px";

            elmnt.style.left = 197 + "px";
            return false;
        }
        document.getElementById('seek_bar').style.left = 0 + "px";

    }

    function closeDragElement() {
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
        var where = Number(document.getElementById('play_or_pause').value);
        playlist = document.getElementsByTagName('audio');
        playlist[where].muted = false;
    }
}

    /* Affiche/cache(automatiquement toutes les 10 secondes) la barre de volume */
    var count_vol = 0;
    function auto_close_control_volume(){
        var vol = document.getElementById('seek_bar_vol');
            if(vol.style.display === 'block' && count_vol > 3){
                vol.style.display = 'none';
                count_vol = 0;
            } else if(count <=3 && vol.style.display==="block"){
                vol.style.display = 'block';
                count_vol++;
            }
        setTimeout(auto_close_control_volume,2000);
    }

/* Controle en keyup (touche relachée) */
$(document).ready(function(){
    $(window).keyup(function(e){
        switch(e.which){
            case(32):
            /* Espace : play/pause */
                    play_or_pause(document.getElementById('play_or_pause').value);
                break;
            case(37):
            /* flèche gauche : musique précèdente */
                    previous_song();
                break;
            case(38):
            /* Flèche du haut controle volume/Uparrow increase volume */
                    inc_volume();
                break;
            case(39):
            /* Flèche droite, musique suivante / RightArrow next music */
                    next_song();
                break;
            case(40):
            /* Flèche du bas controle volume/Downarrow decrease volume */
                    dec_volume();
                break;
            case(82):
            /* touche 'r', réinitialise/'r' key, resets music */
                    reset();
                break;
    }
    });
});
/* Controles en keydown (maintient appuyé) */
$(document).ready(function(){
    $(window).keydown(function(e){
        switch(e.which){
            case(70):
                    further_song();
                break;
            case(66):
                    bw_song();
                break;
                case(40):
                    dec_volume();
                break;
                case(38):
                    inc_volume();
                break;
    }
    });
});
    /* rembobine via la touche b */
    function bw_song(){
        var where = Number(document.getElementById('play_or_pause').value);
            playlist = document.getElementsByTagName('audio');
                if(playlist[where].currentTime > 10){
                    playlist[where].currentTime -= 2;
                }
    }
    /* timelapse, touche f */
    function further_song(){
        var where = Number(document.getElementById('play_or_pause').value);
            if(playlist[where].readyState > -1){
                var duration = Math.floor(playlist[where].duration);
                var cur_time = Math.floor(playlist[where].currentTime);
            }
            if(playlist[where].currentTime > 1.05){
                playlist[where].currentTime += 0.5;
                    if(playlist[where].currentTime !== 0 && playlist[where].currentTime >= duration - 3.5){
                        where;
                        playlist[where].pause();
                        playlist[where].currentTime = 0;
                        document.getElementById('play_or_pause' + where).src = './img/play.png';
                        document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                        document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                        document.getElementById('play_or_pause').value = where;
                        document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/play.png")';
                    }
            }   
    }
    


    /* Remet la musique en cours à 0
    Peut alternativement servir de touche Play */
   function reset(){
        var where = Number(document.getElementById('play_or_pause').value);
        playlist[where].currentTime = 0;
        playlist[where].play();
        document.getElementById('play_or_pause' + where).src = './img/pause.png';
        document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
        document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
        document.getElementById('play_or_pause').value = where;
        document.getElementById('play_or_pause').style.backgroundImage = "url('./img/pause.png')";
   }
    /* Hausse volume, flèche haut/bouton */
   function inc_volume(){
        var where = Number(document.getElementById('play_or_pause').value);
        playlist[where].volume += 0.05;
        act_vol = playlist[where].volume * 100;
   }
    /* Baisse du volume. flèche bas/bouton */
   function dec_volume(){
        var where = Number(document.getElementById('play_or_pause').value);
        
        if(playlist[where].volume >= 0.1){
            playlist[where].volume -= 0.05;
        } else {
            playlist[where].volume = 0;
            act_vol = 0;
        }
    }
    /* Ajout à une playlist, AJAX */
   function add_to_playlist(str){
       alert('Musique ajoutée à la playlist '+ str);
       alert.preventDefault();
   }
    /* Fonction avec timer qui actualise les informations du player et passe automatiquement
    à la prochaine musique */
    var fill = 0;
    var playlist = document.getElementsByClassName('playlist'); /* playlist en cours qui sera modifiée (shuffle/push) */
    var save = playlist;                /* Savegarde de la playlist qui recevra aussi les push */
   function player(){
        var where = Number(document.getElementById('play_or_pause').value);
        /* Affiche la taille et la durée de la playlist.
        A faire en PHP plutôt lors de la requ$ete Ajax pour afficher la playlist.
        Penser à afficher la plylist la plus écoutée lors de la connexion!!! */
        document.getElementById('t_a').textContent = playlist.length + " pistes";
        var t_content = 'Durée totale : '+ duration +' mins '+ seconds +'s 4 écoutes.';
        document.getElementById('t_a').textContent = t_content;
        var count_total_d = 0;
        for(i = 0; i< playlist.length;i++){
            if(playlist[i].readyState > 0){
                count_total_d += playlist[i].duration;
                duration = Math.round(count_total_d /60);
                var seconds = Math.round(count_total_d%60);
            }
        }

        if(playlist[where].readyState > 0){
            var current_time = Math.floor(playlist[where].currentTime);
            if(current_time <= 1){
                document.getElementById('mus_op').style.width = "-30px";

            }
            var duration = Math.floor(playlist[where].duration);
            var cal = current_time/duration;

        }
        if(!isNaN(current_time)){
            if(current_time === duration){
                where ++;
                var img = document.getElementById('rep').style.backgroundImage;
                
                /* On va à l'indice de la prochaine musique dans l'ordre de la playlist afin de 
                récupérer la source, si la playlist est finie et pas en mode repeat on stoppe */
                if(where > playlist.length -1){

                    where = playlist.length -1;
                    playlist[where].currentTime = 0;
                    playlist[where].pause();
                    where = 0;
                    document.getElementById('play_or_pause' + where).src = './img/play.png';
                    document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                    document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                    document.getElementById('play_or_pause').value = where;
                    document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/play.png")';
                    if(img === 'url("./img/rep_on.png")'){
                        console.log('all_rep');
                        playlist[where].currentTime = 0;
                        playlist[where].play();
                        document.getElementById('play_or_pause' + where).src = './img/pause.png';
                        document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/pause.png")';
                    } else if(img === 'url("./img/rep_one.png")'){
                        where = playlist.lenth - 1;
                        playlist[where].currentTime = 0;
                        playlist[where].play();
                        document.getElementById('play_or_pause' + where).src = './img/pause.png';
                        document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/pause.png")';
                        }
                } else {
                    for(i = 0; i < playlist.length; i++){
                        playlist[i].currentTime = 0;
                        playlist[i].pause();
                        document.getElementById('play_or_pause' + i).src = "./image/play.png";
                    }
                        previous = where -1;
                        if(img === 'url("./img/rep_one.png")'){
                            where--;
                        } else if(img === 'url("./img/rep_on')
                        if(fill === 0){
                        playlist[where].volume = 0.2;

                        } else {
                        playlist[where].volume = playlist[previous].volume;
                        }
                        playlist[where].play();
                        document.getElementById('play_or_pause' + where).src = './img/pause.png';
                        document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                        document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                        document.getElementById('play_or_pause').value = where;
                        document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/pause.png")';

                }
            } 
        } 
        
            if(playlist[where].currentTime < 2) {
                document.getElementById('mus_op').style.left = "-30px";
                document.getElementById('mus_op').style.width = "0px";
                document.getElementById('handle').style.left = "0px";
                document.getElementById('fill').style.width = "0px";
                var handle = 0;
            } else {
                var pos_op = Math.round(cal*200);
                var pos_fill = Math.round(cal*200);
                cal = pos_op - pos_fill;
                document.getElementById('handle').style.left = (pos_fill-2) + "px";
                w = String(document.getElementById('mus_op').style.width);
                w = w.split('');
                document.getElementById('fill').style.width = pos_fill + "px";
                document.getElementById('mus_op').style.width = pos_op+ "px";;

            }

            /* Listener pour les events (musique chargée tout ça tout ça) */
        setTimeout(player,1000);
    }

    /* Affichage manuel de la barre de volume lors d'un click */
    function repeat_musics(){
        var img = document.getElementById('rep').style.backgroundImage;
            if(img === 'url("./img/rep.png")'){
                document.getElementById('rep').style.backgroundImage = 'url("./img/rep_on.png")';
            } else if(document.getElementById('rep').style.backgroundImage === 'url("./img/rep_on.png")'){
                document.getElementById('rep').style.backgroundImage = 'url("./img/rep_one.png")';

            } else if(document.getElementById('rep').style.backgroundImage === 'url("./img/rep_one.png")'){
                document.getElementById('rep').style.backgroundImage = 'url("./img/rep.png")';

            }
        
    }
  /* Affichage manuel de la barre de volume lors d'un click */
  function shuffle(){
        var img = document.getElementById('shuffle').style.backgroundImage;
            if(img === 'url("./img/sh_off.png")'){
                document.getElementById('shuffle').style.backgroundImage = 'url("./img/sh_on.png")';
                
            } else if(document.getElementById('shuffle').style.backgroundImage === 'url("./img/sh_on.png")'){
                document.getElementById('shuffle').style.backgroundImage = 'url("./img/sh_off.png")';
                var where = String(playlist.length);
                playlist = save;
                console.log(playlist);
                var li = document.createElement('li');
                li.id ="li"+ playlist.length;
                liT = "li"+ playlist.length;
                li.style.width = "350px";
                li.style.height = "25px";
                li.style.marginLeft = "0px";
                var div = document.createElement('div');
                div.id ="playlist" + playlist.length;
                divT = "playlist"+ playlist.length
                div.style.width = "350px";
                div.style.display = "inline";
                div.style.border = "none";
                div.style.outline ="none";
                div.style.whiteSpace = "nowrap";
                var button = document.createElement('button');
                button.setAttribute('onclick',"play_or_pause(this.value)");
                button.style.height = "15px";
                button.style.display = "inline";
                button.style.marginLeft = "0px";
                button.style.cursor = "pointer";
                button.style.background = "transparent";
                button.style.border = "none";
                button.style.outline = "none";
                button.style.width = "15px";
                button.id= "play_pause" + where;
                buttonT = "play_pause" + where;
                button.value = where;
                var img = document.createElement('img');
                img.src = "./img/play.png";
                img.style.height = "20px";
                img.style.width = "20px";
                img.style.display = "inline";
                img.id = "play_or_pause"+ where;
                image = "li"+ where; 
                var span_title = document.createElement('span');
                span_title.id = "title"+ where;
                spanT = "title"+ where;
                span_title.style.whiteSpace = "nowrap";
                var spanUnion = document.createElement('span');
                spanUnion.style.whiteSpace = "nowrap";
                spanUnion.textContent = " - ";
                var span_art = document.createElement('span');
                span_art.id = "artist"+ where;
                span_art.style.display="inline";
                span_art.style.marginLeft = "18px";
                span_art.textContent = "TROLOLO";
                span_art.style.whiteSpace = "nowrap";
                var span_href = document.createElement('span');
                span_href.style.whiteSpace = "nowrap";
                span_href.id = "href"+ playlist.length;
                spanT = "href"+ playlist.length;
                var href = document.createElement('a');
                href.href = "";
                href.textContent = "Page artiste";
                var audio = document.createElement('audio');
                audio.src = "./musics/Waves.mp3";
                audio.id="audio"+ where;
                audio.className ="playlist";
                audio.preload = "matadata";
                var parentDiv = document.getElementById("li").parentNode;
                var divider = document.createElement('div');
                divider.style.height = "2px";
                divider.style.width = "300px";
                divider.style.marginTop = "6px";
                divider.style.marginBottom = "6px";
                divider.style.position = "relative";
                divider.style.backgroundColor = "#bdc3c7";
                divider.style.opacity = "0.2";
                div.className = "dropdown-divider";
                
                parentDiv.appendChild(li);
                document.getElementById(liT).appendChild(div);
                document.getElementById(divT).appendChild(button);
                document.getElementById(buttonT).appendChild(img);
                document.getElementById(divT).appendChild(span_art);

                document.getElementById(divT).appendChild(spanUnion);
                document.getElementById(divT).appendChild(span_title);
                document.getElementById(divT).appendChild(span_href);
                document.getElementById(spanT).appendChild(href);
                document.getElementById(divT).appendChild(audio);
                parentDiv.appendChild(divider);


                



               /** document.getElementById('playlist').appendChild(li);
               document.getElementById(li.id).appendChild(div);
               document.getElementById(div.id).append(button);
               document.getElementById(button.id).appendChild(img);
               document.getElementById(div.id).appendChild(span_title);
               document.getElementById(div.id).appendChild(audio);**/




            } 
        
                var playlist_html_content = document.getElementsByClassName('current_playlist').children;
                console.log(playlist_html_content);
    }
    /*  */
    function next_song(string){
        var where = Number(document.getElementById('play_or_pause').value);
        var playlist;
        playlist = document.getElementsByTagName('audio');
        /* On va à l'indice de la prochaine musique dans l'ordre de la playlist afin de 
        récupérer la source */
        where++;
        /* Si supérieur on revient au début de la playlist */
            if(where > playlist.length -1){
                where = playlist.length -1;
                playlist[where].currentTime = 0;
                playlist[where].pause();
                where = 0;
                previous = playlist.length -1;
                document.getElementById('play_or_pause' + where).src = './img/play.png';
                document.getElementById('play_or_pause' + previous).src = './img/play.png';
                document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                document.getElementById('play_or_pause').value = where;
                document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/play.png")';
            } else {
                /* On met tous sur pause */
                for(i = 0; i < playlist.length; i++){
                    playlist[i].currentTime = 0;
                    playlist[i].pause();
                }
                playlist[where].currentTime = 0;
                previous = where -1;
                document.getElementById('play_or_pause' + previous).src = './img/play.png';
                playlist[where].volume = playlist[previous].volume;
                playlist[where].play();
                document.getElementById('play_or_pause' + where).src = './img/pause.png';
                document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                document.getElementById('play_or_pause').value = where;
                document.getElementById('play_or_pause').style.backgroundImage = "url('./img/pause.png')";
        }
    }
    /* Fonction qui permet de passer à la musique précèdente
    dans la PL */
   function previous_song(){
        var where = Number(document.getElementById('play_or_pause').value);
        var playlist = document.getElementsByTagName('audio');
        playlist[where].pause();
        if(playlist[where].currentTime <= 10){
            playlist[where].currentTime = 0;
            previous = playlist[where].volume;
            document.getElementById('play_or_pause' + where).src = './img/play.png';
            where--;
            if(where < 0){
                where = playlist.length -1;
            }
            playlist[where].volume = previous;
            playlist[where].currentTime = 0;
            playlist[where].play();
            document.getElementById('play_or_pause' + where).src = './img/pause.png';
            document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
            document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
            document.getElementById('play_or_pause').value = where;
            document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/pause.png")';
        } else {
            playlist[where].currentTime = 0;
            playlist[where].play();
            

        }
   }

        /*  Afin d'être certain de l'action j'ai besoin de 3 variables
        i est la valeur du lecteur, where représente l'emplacement de la musique dans la
        Playlist. Count me sert à savoir, en plus de l'image, quel type d'action executer.
        D'abord on traite i == where, soit la première lecture, ou un click sur les controles de la même musique consécutivement
        dans la playlist. */
 
            var count = 0;
    function play_or_pause(str){
        var i = document.getElementById('play_or_pause').value;
        i = Number(i);
        var where = Number(str);
        var playlist = document.getElementsByTagName('audio');
        var img = document.getElementById('play_or_pause').style.backgroundImage;
        if(where === i){
            /* Compteur à 0. Je lance la musique  */
            if(count === 0){
                    document.getElementById('play_or_pause' + i).src = './img/pause.png';
                    playlist[where].play();
                    playlist[where].volume = 0.4;
                    
                    document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                    document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                    document.getElementById('play_or_pause').value = where;
                    document.getElementById('play_or_pause').style.backgroundImage = "url('./img/pause.png')";

                    count++;
             /* Compteur supérieur à 0 */       
            } else if(count>0){
                /* Musique en pause, je relance */
                if(document.getElementById('play_or_pause').style.backgroundImage === 'url("./img/play.png")'){
                    for(j=0;j<playlist.length;j++){
                        if(j !== where){
                        playlist[j].pause();
                        document.getElementById('play_or_pause' + j).src = './img/play.png';
                        }
                    }
                    document.getElementById('play_or_pause' + i).src = './img/pause.png';

                    playlist[where].play();
                    
                    document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                    document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                    document.getElementById('play_or_pause').value = where;
                    document.getElementById('play_or_pause').style.backgroundImage = "url('./img/pause.png')";

                    count++;
                /* Musique en cours de lecture, je pause */
                }else {
                    document.getElementById('play_or_pause' + i).src = './img/play.png';
                    document.getElementById('play_or_pause').value = where;
                    document.getElementById('play_or_pause' + where).src = './img/play.png';
                    
                    document.getElementById('play_or_pause').style.backgroundImage = 'url("./img/play.png")';
                    playlist[i].pause();
                    count++;

                }
            }
        }
        /* L'indice de la nouvelle musique est différent du précédent */
        if(where !== i) {
            /* Je mets tout en pause et à 0 */
            for(j=0;j<playlist.length;j++){
                    if(j !== where){
                    playlist[j].pause();
                    playlist[j].currentTime = 0;
                    document.getElementById('play_or_pause' + j).src = './img/play.png';
                    }
                }
                document.getElementById('play_or_pause' + where).src = './img/pause.png';
                playlist[where].volume = playlist[i].volume;
                /* Je lance la nouvelle musique */
                playlist[where].play();
                
                document.getElementById('title').textContent = document.getElementById('title'+ where).textContent;
                document.getElementById('artist').textContent = document.getElementById('artist'+ where).textContent;
                document.getElementById('play_or_pause').value = where;
                document.getElementById('play_or_pause').style.backgroundImage = "url('./img/pause.png')";

                count++;
        } 
        
            /* Easter egg */
            if(count > 15){
                document.getElementById('title').textContent = 'Yamete kudasai!!!';
                document.getElementById('cover').src = './img/yamate.jpg';
            }
        
    }
</script>