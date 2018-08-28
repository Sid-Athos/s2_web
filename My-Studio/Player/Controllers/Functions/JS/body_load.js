function body_load() {
    $(window).load(function () {
        /* Evite un affichage dégueulasse quand la page se charge */
        $("body").fadeIn(100);
        $("div").fadeIn(100);
    });
}