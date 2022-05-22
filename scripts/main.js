$(document).ready(function(){


    var totalheight = 0;
    var nav_height = $(".navbar").height();
    $(".container").css("position","relative");
    $(".container").css("top",nav_height+"px");

         // hamburger menu toggle
         //   $(".menu").click(function(){
         //       $(".nav-list").slideToggle("slow");
         //   });
         $('.nav-list').slicknav();
         //   $('.slicknav_menu').html('<h1 >Logo</h1>');
         //   saving admission form start
            $(document).on("submit",".Admission-Form",function(e){
               e.preventDefault();
               $('.loader').css('display','block');
               var data = new FormData(this);
               $.ajax({
                  url : "../scripts/php_scripts/actions.php",
                  method : "POST",
                  data : data,
                  processData : false,
                  contentType : false,
                  success : function(data){
                     $('.loader').css('display','none');
                     // var data = JSON.parse(data);
                   //  console.log(data);
                   $('.admission_result').html("<p>"+data+"</p>");
                
                  }
   
               });
            });
   
         // saving admission form Ends
   
   
         // Saving Class of student stars
          $(document).on('submit','#class_form',function(e){
             e.preventDefault();
             $('.loader').css('display','block');
             var data = new FormData(this);
             $.ajax({
                url : "../scripts/php_scripts/user_actions.php" ,
                method : "post",
                data : data,
                processData : false,
                contentType : false,
                success : function(res){
                  // console.log(res);
                  $('.loader').css('display','none');
                  $('.admission_result').css('color','green');
                   $('.admission_result').html("<p>"+res+"</p>");
                }
   
             });
          });
         // Saving Class of student ends
         // saving section of the classes
           $(document).on('submit','#section_form',function(e){
              e.preventDefault();
              $('.loader').css('display','block');
              var data = new FormData(this);
              $.ajax({
                 url : "../scripts/php_scripts/sections.php" ,
                 method : "post",
                 data : data,
                 processData : false,
                 contentType : false,
                 success : function(res){
                   // console.log(res);
                   $('.loader').css('display','none');
                   $('.admission_result').css('color','green');
                   $('.admission_result').html("<p>"+res+"</p>");
                 }
    
              });
           });
         // saving section of the classes ends
    
// Get  Details 

// Getting count of roll numbers from perticular class and section Start
  $(document).on('change','#class_std_section,#class_std',function(){
  
      var class_std = $('#class_std').val();
      if(!!class_std){
         var section = $(this).val();
         $.ajax({
            url : "../scripts/php_scripts/count_roll_rum.php",
            method : "GET",
            data : {std: class_std,std_section:section},
            success : function(data){
               $('input[name="rollno"]').attr('value',parseInt(data)+1);
            }
         });

      }else{
         alert("Please select class");
      }
  });

// Getting count of roll numbers from perticular class and section  End

// Get  Detals Ends

// testing functionality ajax
      $(document).on('click','#test_btn',function(e){
         e.preventDefault();
         $.ajax({
            url : "../test.php",
            method : "GET",
            // data : {test_data : "1"},
            success : function(data){
               console.log(JSON.parse(data));
               // console.log(data);
            }
         });
      })
// testing functionality ajax end

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