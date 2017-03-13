
  <!-- Footer Starts -->
  <div class="footer text-center spacer">
    <p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-flickr fa-2x"></i></a> </p>
    Copyright <?= date('Y') ?> Amigos Automation Solutions. All rights reserved.
  </div>
  <!-- # Footer Ends -->
  <a href="#works" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>
  <!-- jquery -->
  <script src="assets/jquery.js"></script>
  <!-- wow script -->
  <script src="assets/wow/wow.min.js"></script>
  <!-- boostrap -->
  <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
  <!-- jquery mobile -->
  <script src="assets/mobile/touchSwipe.min.js"></script>
  <script src="assets/respond/respond.js"></script>
  <!-- gallery -->
  <script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>
  <!-- custom script -->
  <script src="assets/script.js"></script>
  <script src="assets/jquery.etalage.min.js" charset="utf-8"></script>
  <script src="assets/responsiveslides.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#package').change(function(){
         if ($(this).val() == 'hourly') {
            $('#hourly').css({'display':'block'});
            $('#mnths').css({'display':'none'});
            $('#wks').css({'display':'none'});
            $('#day').css({'display':'none'});
         }
         if ($(this).val() == 'daily') {
            $('#day').css({'display':'block'});
            $('#mnths').css({'display':'none'});
            $('#wks').css({'display':'none'});
            $('#hourly').css({'display':'none'});
         }
         if ($(this).val() == 'weekly') {
           $('#hourly').css({'display':'none'});
            $('#day').css({'display':'none'});
            $('#mnths').css({'display':'none'});
            $('#wks').css({'display':'block'});
         }
         if ($(this).val() == 'monthly')
          {
            $('#hourly').css({'display':'none'});
            $('#day').css({'display':'none'});
            $('#mnths').css({'display':'block'});
            $('#wks').css({'display':'none'});
         }
         if ($(this).val() == 'no')
          {
            $('#day').css({'display':'none'});
            $('#mnths').css({'display':'none'});
            $('#wks').css({'display':'none'});
         }
      });
    });
  </script>
  <script type="text/javascript"
     src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBmBBDd9eIbjruPE9_2A-64kttSbj6amlc&libraries=places">
  </script>
  <script src="assets/jquery.placepicker.js" charset="utf-8"></script>
 <script src="assets/bootstrap-clockpicker.js" charset="utf-8"></script>
 <script type="text/javascript">
   $(document).ready(function()
   {
     $('.clockpicker').clockpicker();
     $(".placepicker").placepicker();
   });
 </script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <script>
  jQuery(document).ready(function($){

    $('#etalage').etalage({
      thumb_image_width: 400,
      thumb_image_height: 400,
      source_image_width: 800,
      source_image_height: 1000,
      show_hint: true,
      click_callback: function(image_anchor, instance_id){
        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
      }
    });
  });
</script>
</body>
</html>
