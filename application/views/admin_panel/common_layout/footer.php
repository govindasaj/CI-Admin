<footer class="main-footer">
<p><b>99Media</b> Copyright 2020. All rights reserved.</p>
</footer>  
</div>

<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>js/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<script src="<?php echo base_url('assets/admin/'); ?>custom/custom.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/croppie.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" type="text/javascript"></script>	
<script src="<?php echo base_url('assets/admin/'); ?>js/jquery-chosen-sortable.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/admin/'); ?>js/toastr.min.js"></script>

<script>
  $(function () {
    $('.DataTable').DataTable();
  })
</script>

<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"> </script>
<script>  
	$(function () {    
	CKEDITOR.replace('artist_biographi');    
	$(".textarea").wysihtml5();
	});
	</script>
<script>
$(document).ready(function(){
   $uploadCrop = $('#upload-demo').croppie({
      
       viewport: {
           width: 500,
           height: 500,
            type: 'square'
       },
       boundary: { width: 500, height: 500 },
       
	    
	   
   });
   $('#upload').on('change', function() {
       console.log('hello');
       var reader = new FileReader();
       reader.onload = function(e) {
           $uploadCrop.croppie('bind', {
               url: e.target.result
           }).then(function() {
               console.log('jQuery bind complete');
           });
       }
       reader.readAsDataURL(this.files[0]);
   });


   $('.upload-result').on('click', function(ev) {
   	if($('#upload').val())
   	{
       $uploadCrop.croppie('result', {
           type: 'canvas',
           //size: 'viewport'
       }).then(function(resp) {
		   $('.img_logo').html('<a><span class="close">X</span></a><img src="'+resp+'" style="height:40%; width:150px" /> <input type="hidden" required value="'+resp+'" name="thumbnail_image" />');
		   $('#imageModal').modal('hide');
       });
   	}
   	else 
   	{
   		alert('Please Select an image!');
   		return false;
   	}
   	
   });
   
});
</script>

</body>
</html>