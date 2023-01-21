
      


jQuery(function($) {
  var path = window.location.href; 
  console.log(path);
  // because the 'href' property of the DOM element is the absolute path
  $('.ul-aside a').each(function() {
    if (this.href === path) {
      $("a").removeClass("active")
      $(this).addClass('active');
    }
  });
});


jQuery(function($) {
  var path = window.location.href; 
  console.log(path);
  // because the 'href' property of the DOM element is the absolute path
  $('.edit-mid').each(function() {
    if (this.href === path) {
      $("a").removeClass("active")
      $(this).addClass('active');
    }
  });
});

// $(".ul-aside a").on("click", function() {
//     $("a").removeClass("active");
//     $(this).addClass("active");
//     var sectionId = $(this).attr("href");
//     var x_section = $(sectionId)
//     if( $(sectionId).css("display") == "none" ){
//         $("section").css("display" , "none");
//       $(sectionId).css("display", "block");
//     }
//     else{
//         $(sectionId).css("display", "block");
//     }
   
//   });

// $(".edit-mid").on("click", function() {
//     var sectionId = $(this).attr("href");
//     var x_section = $(sectionId)
//     if( $(sectionId).css("display") == "none" ){
//         $("section").css("display" , "none");
//         $(sectionId).css("display", "block");
//     }
//     else{
//         $(sectionId).css("display", "block");
//     }

// });
