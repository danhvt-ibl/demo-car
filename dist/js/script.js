$('.carousel').carousel();
$(document).ready(function(){
   $(".anhxeMini").click(function(){
       var src = $(this).attr("src");
       var big = $("#anhxeBig");
       big.attr("src", src);
       
   })
    
});