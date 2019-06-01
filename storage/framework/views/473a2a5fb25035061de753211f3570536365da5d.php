<script>
    var resizefunc = [];
</script>
<script src="<?php echo e(url('/dashboard/js/jquery.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $("#loading").hide();
    })

    $(".nav-link").click(function(){
    if(clicked){
        $(this).css('background-color', 'red');
        clicked  = false;
    }
});
</script>
<!-- Bootstrap plugins -->
<script src="<?php echo e(url('/dashboard/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(url('/dashboard/js/detect.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/fastclick.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/jquery.blockUI.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/waves.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/jquery.scrollTo.min.js')); ?>"></script>

<script src="<?php echo e(url('/dashboard/plugins/notifyjs/js/notify.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/plugins/notifications/notify-metro.js')); ?>"></script>

<script src="<?php echo e(url('/dashboard/js/jquery.uploadPreview.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/jquery.core.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/jquery.app.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/plugins/parsleyjs/parsley.min.js')); ?>"></script>

<script src="<?php echo e(url('/dashboard/js/dashboard.js')); ?>"></script>

<script src="<?php echo e(url('/dashboard/js/ckeditor/ckeditor.js')); ?>"></script>
    <script>
if($("textarea").length > 0){
        CKEDITOR.replace( 'ck_patientdetails' );
        CKEDITOR.config.height = 900;
      }

      if($("#ck_patientdetails_add").length > 0){
        CKEDITOR.replace( 'ck_patientdetails_add' );
        CKEDITOR.config.height = 400;
      }

      
    </script>
