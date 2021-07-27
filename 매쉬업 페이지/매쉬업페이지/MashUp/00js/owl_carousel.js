
    $(document).ready(function() {
       
     /* $("#owl-demo").owlCarousel({
          loop:true,
          autoPlay : 3000,
          stopOnHover : true,
          navigation:true,
          paginationSpeed : 1000,
          goToFirstSpeed : 2000,
          singleItem : true,
          autoHeight : true,
          transitionStyle:"fade"
        });  */

      $("#owl-demo").owlCarousel({
          loop:true,
          navigation:true,
          paginationSpeed : 1000,
          goToFirstSpeed : 2000,
          items:1,
          autoPlay:false,
          dotsData:true,
          dots:true
         // center:true,
         // margin:10,
         // URLhashListener:true,
         // autoplayHoverPause:true,
          //startPosition: 'URLHash'
        }); 
     
       $("#owl-demo2").owlCarousel({
          
          navigation:true,
          paginationSpeed : 1000,
          goToFirstSpeed : 2000,
          items:5
        }); 
  

  
       
     });