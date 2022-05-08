$(document).ready(function(){


    var totalheight = 0;
    var nav_height = $(".navbar").height();
    $(".container").css("position","relative");
    $(".container").css("top",nav_height+"px");

    
//     var count_imgs=0;
// //  Next button of slider
//     $(".next").click(function(){
//        var currentImg = $('.active');
    
//        var nextImg = currentImg.next();
//        if(nextImg.length){
//          count_imgs+=1;
//           currentImg.removeClass('active').css("z-index",-10);
//           nextImg.addClass('active').css('z-index',10);
//        }
//       //  console.log(count);
//     });
// // Prev Button 
//     $(".prev").click(function(){
//       var currentImg = $('.active');
//       var prevImg = currentImg.prev();
//       count_imgs-=1;
//       if(prevImg.length){

//          currentImg.removeClass('active').css("z-index",-10);
//          prevImg.addClass('active').css('z-index',10);
//       }
//    });

 
});