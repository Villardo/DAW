$(document).ready(function () {
    $(".usuario").addClass("animate__bounceIn");
    setTimeout(() => {
        $(".usuario").removeClass("animate__bounceIn");
    }, 1000);
});
