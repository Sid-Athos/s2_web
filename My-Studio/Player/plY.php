sjqldgjqgd $dgsqkg

dsqdq
dsqdsq
<?php
/* Modifie l'avancement de la lecture selon les clicks sur la seek_bar (musique en cours) */
dragElement(document.getElementById("seek_bar"));

    function dragElement(elmnt) {
        var pos = 0, ref_pos = 0,  cal_pos = 0,pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        /* Quand la souris est relachée j'appelle la fonciton de déplacement */
        elmnt.onmouseup = dragMouseDown;

        function dragMouseDown(e) {
            e = e || window.event;
            /* J'évite toute action non désirée entre deux */
            e.preventDefault();
            // pos4 récupère la position de départ et je vais effectuer
            /* Des calculs en rapport à la taille maximale de la barre d'avancée de la musique */
            pos4 = e.clientX;
            ref_pos = e.clientX;
                if(ref_pos >= 0 && ref_pos <= 200){
                    var where = Number(document.getElementById('play_or_pause').value);
                    playlist = document.getElementsByTagName('audio');
                    var duration = Math.floor(playlist[where].duration);
                    console.log(duration);
                    var cal = ref_pos/200;
                    cal = Math.round(cal *360);
                    if(cal >= 1){
                        document.getElementById('mus_op').style.width = cal +"px";
                    } else {
                        cal = 0;
                        
                        document.getElementById('mus_op').style.width = cal +"px";

                    }
                    // set the element's new position:
                    document.getElementById('fill').style.width = ref_pos + "px";
                } 
        // call a function whenever the cursor moves:
        }

  

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
