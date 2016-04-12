<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Password <small>Change Your Password Below!</small></h2>
                <div class="clearfix"></div>
            </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" action="controllers/changeAdminPass.php" method="post" novalidate>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="currentPassword">Old Password<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">

                            <input type="password" data-minlength="6"name="currentPassword" id="currentPassword" class="form-control col-md-7 col-xs-12" required="required"/><span class="required"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newPassword">New Password<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="password" data-validate-length="6,8" name="newPassword" id="newPassword" class="form-control col-md-7 col-xs-12" required="required"/><span class="required"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmPassword">Confirm Password<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="password" name="confirmPassword" id="confirmPassword" data-validate-linked="newPassword" class="form-control col-md-7 col-xs-12" required="required"/><span class="required"></span>
                        </div>
                    </div>
                    <div class="form-group">
                    <span>
                        <?php
                             if (isset($_GET['key'])&&$_GET['key']==="000111") 
                            {
                         ?>
                                <label style="color:red" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-close fa-lg"></span></strong><?php echo "Your old password was wrong! Please try again.";?></h4></Label> 

                        <?php
                            }elseif (isset($_GET['key'])&&$_GET['key']==="111111"){

                            
                        ?>
                        <label style="color:green" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-check fa-lg"></span></strong><?php echo "Your Password has been change Successfully.";?></h4></Label>
                        <?php } ?>
                    </span></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="submit" name="submit" type="submit" class="btn btn-primary">update</button>
                        </div>
                    </div>
                   
            </form>
        </div>


</div>
<script type="text/javascript">
	// $(document).on('click','#submit',function(){
	// 	if($('form').valid())
	// 	{
	// 		opass=$('#currentPassword').val();
	// 		npass=$('#newPassword').val();
	// 		$.ajax({
	// 			type:'GET',
	// 			dataType:'json',
	// 			url:'controllers/changeAdminPass.php',
	// 			data:'oldpass='+opass+'&npass='+npass,
	// 			success:function(data){
	// 				alert(data);
	// 			}
	// 		});
	// 	}

	// });
</script>
<?php include("../includes/layouts/footer.php");?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>