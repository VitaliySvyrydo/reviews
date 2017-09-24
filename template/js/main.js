//Owl Carousel
$('#testimonial-item').owlCarousel({
    autoPlay: 5000,
    items:2,
    margin:90,
    stagePadding:90
});
(function() {
    "use strict";
    window.addEventListener("load", function() {
        var form = document.getElementById("needs-validation");
        form.addEventListener("submit", function(event) {
            if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);
    }, false);
}());