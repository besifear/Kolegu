$(document).ready(function(){

    var fillerDiv = $('#main-nav-bar-filler');
    var nav = $('#main-nav-bar');

    function addHeightToHeadderFiller(){
        fillerDiv.height( nav.height() + 5 );
    }

    //heren e pare qe loaded faqja
    addHeightToHeadderFiller();

    //per resize te faqes
    $(window).resize(function(){
        addHeightToHeadderFiller();
    });
});

