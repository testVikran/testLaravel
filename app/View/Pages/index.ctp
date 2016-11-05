<script type="text/javascript" src="<?php echo ABSOLUTE_URL;?>/js/jquery.validate.js"></script>
<body>
	

	<div class="container  margin-top-30">
		<div class="row  padding-md-0 well">
		<div class="clearfix"></div> 
		<?php if(!$this->Session->read('User')) { ?>
		<a href="<?php echo ABSOLUTE_URL;?>/pages/logins" class="btn btn-default btn-lg pull-right">Login</a>
		<?php } ?>
		<?php if($this->Session->read('User.id') ==1) { ?>
		<a href="<?php echo ABSOLUTE_URL;?>/pages/createHotel" class="btn btn-default btn-lg pull-right">Add Hotel</a>
		<a href="<?php echo ABSOLUTE_URL;?>/pages/logout" class="btn btn-default btn-lg pull-right">Logout</a>
		<?php } ?>
		<h3>Hotels</h3>

		<div class="clearfix"></div> 
			<table class="table-responsive table" >
				<tr>
				<td>Name</td>
				<td>Address</td>
				<td>comments</td>
				<?php if ($this->Session->read('User')) { ?>
				<td>Write Your Comment</td>
				<?php } ?>
				</tr>
				<?php foreach ($hotels as $key => $value) { ?>
					<tr>
						<td><?php echo $value['Hotel']['name'];?></td>
						<td><?php echo $value['Hotel']['location'];?></td>
						<td><a id="<?php echo $value['Hotel']['id'];?>" href="javascript:void(0);" onclick="showComments(this.id)">view Comments</a></td>
						<td>
						<?php if ($this->Session->read('User')) { ?>
							<input type="text" name="comment" id="val<?php echo $value['Hotel']['id'];?>">
							<button type="submit" onclick="submitComment(<?php echo $value['Hotel']['id'];?>)">Submit</td>
						<?php } ?>
						
					</tr>
				<?php } ?>

			</table>
			<div>
			<h3>Comments</h3>
			<?php foreach ($comments as $key => $value) { ?>
			<div id="com<?php echo $value['Comment']['hotel_id'];?>" class="comments hidden"><h3 class="text-danger"><?php echo $value[0]['group_concat(`comment`)'];?></h3></div>
			<?php } ?>
			</div>

		</div>
	</div>
</body>
<script type="text/javascript">
function submitComment(id){
	var val =$("#val" + id).val();
	if (!val) {alert("Please write your comment first");
return false;}
$.ajax({
            type: "POST",
            url: "<?php echo ABSOLUTE_URL;?>/pages/addComment",
            data: {comment:val,hotel:id},
            success: function(data){
                if(data){
                	$('input').val(null);
                	alert("Submitted");
                } else {
                	alert("Something went wrong");
                }
            }, error: function (request, status, error) {
                alert("Something went wrong");
            }
        });
}
function showComments(id){
	//alert(id);
	$(".comments").addClass('hidden');
	$("#com" +id).removeClass('hidden').addClass('show');
}
	$(document).ready(function () {
       
    });

</script><body>
	
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
					<div class="clearfix"></div>
					<a href="<?php echo ABSOLUTE_URL;?>" style="margin-bottom:30px;" class="btn btn-lg btn-default">Home</a>
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