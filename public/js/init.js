/* Side nav */
$(".button-collapse").sideNav();

/* Modal */
$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});

/*Sensors checkboxes: at least one selected before saving node*/
/*var checkboxes = $("input[type='checkbox']"), submitButt = $("button[id='create']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});*/

$(document).ready(function(){
    $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});

/* scrollspy */
$(document).ready(function(){
    $('.scrollspy').scrollSpy();
});

/* Tooltip */
$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
});

/* Parallax */
$(document).ready(function(){
    $('.parallax').parallax();
});

/* Modal */
$(document).ready(function(){
    $('.modal-trigger').leanModal();
});

