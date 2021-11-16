$('body').on('keydown', 'input, select, textarea', function (e) {
    var self = $(this)
        , form = self.parents('form:eq(0)')
        , focusable
        , next
        ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this) + 1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

$(document).ready(function () {
    $(".input-decimal").keydown(function (e) {
        _filterInput("decimal", e);
    });
    $(".input-digit").keydown(function (e) {
        _filterInput("digit", e);
    });
});

function _filterInput(type, e) {
    var keyCodes = [46, 8, 9, 27, 13, 110];
    if (type == "decimal") {
        keyCodes.push(188); // ,
        keyCodes.push(190); // .
    }
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, keyCodes) !== -1 ||
        // Allow: Ctrl/cmd+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+C
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+X
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
}