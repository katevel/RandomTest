$(function() {
    var $forms = $("form");
    $forms.focusin(function() {
        $forms.removeClass("active-form");
        $(this).addClass("active-form");
    });
});
