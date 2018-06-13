<?php
$template = $page->get_page_template();

?>
  <!--footer -->
  <footer>
    <div class="wrapper">
      <ul id="icons">
        <li><a href="javascript:void(0)" class="normaltip"><img src="../inc/images/icon1.jpg" alt=""></a></li>
        <li><a href="javascript:void(0)" class="normaltip"><img src="../inc/images/icon4.jpg" alt=""></a></li>
        <li><a href="javascript:void(0)" class="normaltip"><img src="../inc/images/icon5.jpg" alt=""></a></li>
      </ul>
      <div class="links">Copyright 2018 &copy; <a href="#">Web Site</a> All Rights Reserved<br></div>
    </div>
  </footer>
  <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>


<?php if ($template=='home'){ ?>
<script type="text/javascript">
$(document).ready(function () {
    tabs.init();
});
jQuery(document).ready(function ($) {
    $('#form_1, #form_2, #form_3').jqTransform({
        imgPath: 'jqtransformplugin/img/'
    });
});
$(window).load(function () {
    $('#slider').nivoSlider({
        effect: 'fade', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft' 
        slices: 15,
        animSpeed: 500,
        pauseTime: 6000,
        startSlide: 0, //Set starting Slide (0 index)
        directionNav: false, //Next & Prev
        directionNavHide: false, //Only show on hover
        controlNav: false, //1,2,3...
        controlNavThumbs: false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel: false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav: true, //Use left & right arrows
        pauseOnHover: true, //Stop animation while hovering
        manualAdvance: false, //Force manual transitions
        captionOpacity: 1, //Universal caption opacity
        beforeChange: function () {},
        afterChange: function () {},
        slideshowEnd: function () {} //Triggers after all slides have been shown
    });
});
</script>
<?php } ?>


<?php if ($template == 'book'){ ?>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    $('.form_5').jqTransform({
        imgPath: 'jqtransformplugin/img/'
    });
});
$(document).ready(function () {
    tabs2.init();
});
</script>
<?php } ?>


<script type="text/javascript" src="../inc/js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="../inc/js/cufon-yui.js"></script>
<script type="text/javascript" src="../inc/js/cufon-replace.js"></script>
<script type="text/javascript" src="../inc/js/Cabin_400.font.js"></script>
<script type="text/javascript" src="../inc/js/tabs.js"></script>
<script type="text/javascript" src="../inc/js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="../inc/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="../inc/js/atooltip.jquery.js"></script>
<script type="text/javascript" src="../inc/js/script.js"></script>

</body>
</html>
