<section class="content-header">
</section>
<section class="content">
<div class="container">
	
</div>
<div class="row">
    <div class="form-group col-sm-12 page-body">
     <div class="row">
        <div class="col-md-12">
          <div class="card  card-danger">
            <div class="card-header">
              <h3 class="card-title" style="color: white" >Upload  Video Review Product</h3><br>
              </div>
               <div class="card-body">
				<form method="post" name="image_upload_form" id="image_upload_form" enctype="multipart/form-data" action="page/image_upload.php" autocomplete="off">   
					<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="datefrom" name="date" placeholder="" required="">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Choose Image</label>
                    <div class="col-sm-4">
                       <input type="file" class="form-control" name="images_upload[]" id="image_upload" multiple > 
                    </div>
                  </div>
				</form>
				<br>
				<div class="progress" style="display:none;">
					<div class="percent">0%</div >
					<div class="bar"></div >
				</div>
				<div id="status"></div>		
				<br>	
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
	var today = new Date();

      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();

      if(dd<10) {
          dd = '0'+dd
      } 

      if(mm<10) {
          mm = '0'+mm
      }
      // today = yyyy + '/' + mm + '/' + dd;
       today = yyyy + '-' + mm + '-' + dd;

      console.log(today);
      document.getElementById('datefrom').value = today;
</script>
<script type="text/javascript">
	$(document).ready(function(){
	var bar = $('.bar');
	var percent = $('.percent');
	var status = $('#status');
	$('#image_upload').on('change',function(){   
		 $('#image_upload_form').ajaxForm({           
			beforeSend: function() {
				$(".progress").show();
				status.empty();
				var percentVal = '0%';
				bar.width(percentVal);
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {		
				var percentVal = percentComplete + '%';
				bar.width(percentVal);
				percent.html(percentVal);
			},
			success: function(data, statusText, xhr) {
				var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);
				status.html(xhr.responseText);
			},
			error: function(xhr, statusText, err) {
				status.html(err || statusText);
			}    
		 }).submit();
	});   
});
</script>






