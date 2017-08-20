$(document).ready(function(){

//minimum 6 characters
var bad = /(?=.{6,}).*/;
//Alpha Numeric plus minimum 8
var good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
var better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{6,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
var best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{6,}$/;

$('#password').on('keyup', function () {
    var password = $(this);
    var pass = password.val();
    var passLabel = $('[for="password"]');
    var stength = 'Weak';
    var pclass = 'danger';
    if (best.test(pass) == true) {
        stength = 'Shum i sigurt';
        pclass = 'success';
    } else if (better.test(pass) == true) {
        stength = 'I sigurt';
        pclass = 'success';
    } else if (good.test(pass) == true) {
        stength = 'Mesatar';
        pclass = 'warning';
    } else if (bad.test(pass) == true) {
        stength = 'Shum i dobet';
    } else {
        stength = 'Passwordi duhet të përmbaj së paku 6 karaktere';
    }

    var popover = password.attr('data-content', stength).data('bs.popover');
    popover.setContent();
    popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);

});

$('input[data-toggle="popover"]').popover({
    placement: 'right',
    trigger: 'active'
});

})