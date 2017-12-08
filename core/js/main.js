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
     selectYears: 150, // Creates a dropdown of 15 years to control year,
     today: 'Today',
     clear: 'Clear',
     close: 'Ok',
     closeOnSelect: false // Close upon selecting a date,
   });

  //Tabs
  $('ul.tabs').tabs('select_tab', 'tab_id');

  //Data tables
  $('#solicitudes_vacantes').DataTable( {
      dom: 'Bfrtip',
      language: {
              "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
              paginate: {
                  first:    '«',
                  previous: '‹',
                  next:     '›',
                  last:     '»'
              },
      },
      buttons: [
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ]
  } );


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


//UPPY UPLOADER 
  const Uppy = require('uppy/lib/core')
  const Dashboard = require('uppy/lib/plugins/Dashboard')
  const Tus = require('uppy/lib/plugins/Tus')
  
  const uppy = Uppy({ autoProceed: false })
    .use(Dashboard, {
      trigger: '#subirCV'
    })
    .use(Tus, {endpoint: '//master.tus.io/files/'})
    .run()
   
  uppy.on('core:complete', (result) => {
    console.log(`Upload complete! We’ve uploaded these files: ${result.successful}`)
  })

