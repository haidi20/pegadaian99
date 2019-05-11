$("#basic-forms").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    enableContentCache: true,
    autoFocus: true
});
$("#verticle-wizard").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slide",
    stepsOrientation: "vertical",
    autoFocus: true
});

$("#design-wizard").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    autoFocus: true
});




var form = $("#example-advanced-form").show();

form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffectSpeed: 600,
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
        var def = $.Deferred();
        // console.log(event)
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }

        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
            var modal = $('#modal-akad')
           
            // alert('muncul')
            if(form.valid()){
                modal.modal('show')
            }

            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }

        $('#tidak').on('click', function(){
            // def.resolve(true);
            // console.log('iya terklik')
            form.steps("previous");
        });

        // return def;

        // form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    // onStepChanged: function(event, currentIndex, priorIndex) {

    //     // Used to skip the "Warning" step if the user is old enough.
    //     if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
    //         form.steps("next");
    //     }
    //     // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
    //     if (currentIndex === 2 && priorIndex === 3) {
    //         form.steps("previous");
    //     }
    // },
    onFinishing: function(event, currentIndex) {
        // console.log(currentIndex)
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        alert("Submitted!");
        $('.content input[type="text"]').val('');
        $('.content input[type="email"]').val('');
        $('.content input[type="password"]').val('');
    }
}).validate({
    errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    },
    // rules: {
    //     confirm: {
    //         equalTo: "#password-2"
    //     }
    // }
});