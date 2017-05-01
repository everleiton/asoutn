$(document).ready(function(){
  
  $(".dropdown-button").dropdown();

   $('.tooltipped').tooltip({delay: 200});
 
 $('select').material_select();
 
  Materialize.updateTextFields();
   $('.collapsible').collapsible();
   
$('.chips').material_chip();
$('.chips-initial').material_chip('data');
$('.chips').material_chip();
 $('.chips-initial').material_chip({
   data: [{
     tag: 'Apple',
   }, {
     tag: 'Microsoft',
   }, {
     tag: 'Google',
   }],
 });
 $('.chips-placeholder').material_chip({
   placeholder: 'Enter a tag',
   secondaryPlaceholder: '+Tag',
 });
 $('.chips-autocomplete').material_chip({
   autocompleteOptions: {
     data: {
       'Apple': null,
       'Microsoft': null,
       'Google': null
     },
     limit: Infinity,
     minLength: 1
   }
 });
  
   $('.materialboxed').materialbox();
 
   $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15 // Creates a dropdown of 15 years to control year
   });
 
});

