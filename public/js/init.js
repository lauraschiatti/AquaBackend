/* Side nav */
$(".button-collapse").sideNav();

/* Modal */
$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});

/*Sensors checkboxes: at least one selected before saving node*/
var checkboxes = $("input[type='checkbox']"), submitButt = $("button[id='create']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
