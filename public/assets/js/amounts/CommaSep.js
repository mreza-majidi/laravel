function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function moneyCommaSep(ctrl) {
    var separator = ",";
    var int = ctrl.value.replace(new RegExp(separator, "g"), "");
    var regexp = new RegExp("\\B(\\d{3})(" + separator + "|$)");
    do {
        int = int.replace(regexp, separator + "$1");
    }
    while (int.search(regexp) >= 0)
    ctrl.value = int;
}
