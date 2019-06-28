function decimalonly(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function textonly(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[A-Za-z0-9\s]|\.|\´|\,|\-|\_|\?|\¿|\!|\¡|\#|\$|\%|\(|\)/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function searchText(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[A-Za-z0-9\s]/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function filterFloat(event) {
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var field = event;
    key = event.keyCode ? event.keyCode : event.which;

    if (key == 8) return true;
    if (key > 47 && key < 58) {
        if (field.val() === "") return true;
        var existePto = (/[.]/).test(field.val());
        if (existePto === false){
            regexp = /.[0-9]{10}$/;
        }
        else {
            regexp = /.[0-9]{2}$/;
        }
        return !(regexp.test(field.val()));
    }
    if (key == 46) {
        if (field.val() === "") return false;
        regexp = /^[0-9]+$/;
        return regexp.test(field.val());
    }
    return false;
}

function validar_porcentaje(event) {
    if (event.value > 100.0) {
        event.value = "100.0";
    }
}

function validar_nota(event) {
    if (event.value > 10.0) {
        event.value = "10.0";
    }
}