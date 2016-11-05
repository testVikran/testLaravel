<body>
	
<div class="container  margin-top-30">
		<div class="row  padding-md-0 well">
		<div class="clearfix"></div> 
		<?php echo $this->Session->flash(); ?>
		<div class="col-md-4 col-md-offset-5" style="margin-top:100px;"><h3 class="text-info" ><strong>Add a Hotel</strong></h3></div>

		<div class="clearfix"></div> 
			<div class="table-responsive border-2" >
				<div class="">
					<form class="form-horizontal" method="post" action="<?php echo ABSOLUTE_URL;?>/pages/createHotel" id="hotelForm">
						<div class="form-group control-group controls">
							<label for="input1" class="col-sm-2 control-label margin-right-100">Hotel name</label>
							<div class="col-sm-7">
								<input type="text" class="form-control required" title="Please Enter the name of your firm" name="name" id="name" >
							</div>
						</div>
						<div class="form-group control-group controls " >
							<label for="input2" class="col-sm-2 control-label margin-right-100">Adderess</label>
							<div id="lab2" class="col-md-7">
								<input type="text" class="form-control required col-sm-6" title="Please enter the adderess" name="location" id="input2"  >
							</div> 
						</div>
						
						<div class="form-group control-group controls col-sm-11">
							<div class="pull-right margin-right-70">
								<button type="submit" class="btn btn-default btn-lg ">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
      
           $("#hotelForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "name": {
                    message: "Please enter your a name",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter a  name'
                        } 
                    }
                },
                "location": {
                    message: "Please enter a location ",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter  location'
                        }
                    }
                }
            }

        }) ;
    });

</script>