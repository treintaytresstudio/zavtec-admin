$(document).ready(function(){
	//Side nav
	// Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();
  //Select
  $('select').material_select();

  //Sidebar
  $("#leftside-navigation .sub-menu > a").click(function(e) {
    $("#leftside-navigation ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
    e.stopPropagation()
  })

  $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15, // Creates a dropdown of 15 years to control year,
     today: 'Today',
     clear: 'Clear',
     close: 'Ok',
     closeOnSelect: false // Close upon selecting a date,
   });
  
});

//UPLOAD CARE

  //UPLOAD CARE INFO
  UPLOADCARE_LOCALE = "es";
  UPLOADCARE_TABS = "file";
  UPLOADCARE_PUBLIC_KEY = "17359d2a181b8e65df55";

  //Mostrar imagen subida
  /*
  var image = document.getElementById('image');
  var widget = uploadcare.Widget('[role=uploadcare-uploader]');
  widget.onUploadComplete(function (fileInfo) {
    image.src = fileInfo.cdnUrl;
  });
*/
  var widget = uploadcare.initialize();
