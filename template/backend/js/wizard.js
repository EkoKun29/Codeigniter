(function ($) {
    'use strict';
    var form = $("#example-form");
    var url = $('#example-form').attr('action');
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex) {
            console.log(form.serialize());
            $.post(url, form.serialize(), function(response) {
                // Log the response to the console
                console.log("Response: "+response);
            });
            alert("Submittedqqw!");
        
        }
    });
    var validationForm = $("#example-validation-form");
    validationForm.val({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    validationForm.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            validationForm.val({
                ignore: [":disabled",":hidden"]
            })
            return validationForm.val();
        },
        onFinishing: function (event, currentIndex) {
            validationForm.val({
                ignore: [':disabled']
            })
            return validationForm.val();
        },
        onFinished: function (event, currentIndex) {
            alert("Submittede!");
            print(form.serialized());
        }
    });
    var verticalForm = $("#example-vertical-wizard");
    verticalForm.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
        onFinished: function (event, currentIndex) {
            alert("Submittedee!");
        }
    });
})(jQuery);
