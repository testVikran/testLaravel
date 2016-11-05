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
				<td>Write Your Comment</td>
				</tr>
				<?php foreach ($hotels as $key => $value) { ?>
					<tr>
						<td><?php echo $value['Hotel']['name'];?></td>
						<td><?php echo $value['Hotel']['location'];?></td>
						<td><a id="<?php echo $value['Hotel']['id'];?>" href="javascript:void(0);" onclick="showComments(this.id)">view Comments</a></td>
						<td>
						<input type="text" name="comment" id="val<?php echo $value['Hotel']['id'];?>">
						<button type="submit" onclick="submitComment(<?php echo $value['Hotel']['id'];?>)">Submit</td>
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

</script>