$(document).ready(function () {
    var mask = new Inputmask("+7 (999) 999 9999");
    mask.mask($('#tel_number'));
});
