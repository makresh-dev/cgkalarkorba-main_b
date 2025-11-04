$(document).ready(function(){
    $('.thumbnails a').click(function(e){
       e.preventDefault();
       $('.imageGallary img').attr('src',              
     $(this).attr('href'));
    });
 });