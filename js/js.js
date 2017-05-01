$(document).ready(function(){
  
  $(".dropdown-button").dropdown();

   $('.tooltipped').tooltip({delay: 200});
 
 $('select').material_select();
 
  Materialize.updateTextFields();
   $('.collapsible').collapsible();
   

  
   $('.materialboxed').materialbox();
 
   $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15 // Creates a dropdown of 15 years to control year
   });
 
});

