require('./bootstrap');
// On reprend le même id que dans le précédent chapitre

$("#more_com").click(function() {

    $.ajax({
        url: 'more_com.php',
        type: 'GET',
        dataType: 'html',
        success: function(code_html, statut) {
            $(code_html).appendTo("#commentaires"); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
        },

        error: function(resultat, statut, erreur) {

        },

        complete: function(resultat, statut) {

        }

    });

});