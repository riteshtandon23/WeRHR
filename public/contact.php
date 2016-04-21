<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>

<form class="form-horizontal form-label-left" novalidate>
 <div class="form-group">
        <span>
            <?php
                 if (isset($_GET['mesg'])&&$_GET['mesg']!=="000011") 
                {
             ?>
                    <label style="color:red" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "Fail to send";?></h4></Label> 

            <?php
                }elseif(isset($_GET['mesg'])&&$_GET['mesg']==="000011"){ 
            ?>
            <label style="color:green" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-check fa-2x"></span></strong><?php echo "Successfully send";?></h4></Label>
            <?php } ?>
        </span>
    </div>
<div class="row">
    <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">

                    <div class="row row-height">

                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <ul class="pagination pagination-split">
                                <li><a href="#">A</a>
                                </li>
                                <li><a href="#">B</a>
                                </li>
                                <li><a href="#">C</a>
                                </li>
                                <li><a href="#">D</a>
                                </li>
                                <li><a href="#">E</a>
                                </li>
                                <li><a href="#">F</a>
                                </li>
                                <li><a href="#">G</a>
                                </li>
                                <li><a href="#">H</a>
                                </li>
                                <li><a href="#">I</a>
                                </li>
                                <li><a href="#">J</a>
                                </li>
                                <li><a href="#">K</a>
                                </li>
                                <li><a href="#">L</a>
                                </li>
                                <li><a href="#">M</a>
                                </li>
                                <li><a href="#">O</a>
                                </li>
                                <li><a href="#">P</a>
                                </li>
                                <li><a href="#">Q</a>
                                </li>
                                <li><a href="#">R</a>
                                </li>
                                <li><a href="#">S</a>
                                </li>
                                <li><a href="#">T</a>
                                </li>
                                <li><a href="#">U</a>
                                </li>
                                <li><a href="#">V</a>
                                </li>
                                <li><a href="#">W</a>
                                </li>
                                <li><a href="#">X</a>
                                </li>
                                <li><a href="#">Y</a>
                                </li>
                                <li><a href="#">Z</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="container" id="container">
                        <?php 
                        $result=getAdminContact();
                        while ($row=$result->fetch_assoc()) {
                           $pic=$row['Profile_pic'];
                           ?>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12" style="height:180px;  overflow: scroll;">
                                    <h4 class="brief"><i>Administrator</i></h4>
                                    <div class="left col-xs-7">
                                        <h2><?php echo  $name=$row['Admin_Name']; ?></h2>
                                        <p><strong>Email: </strong> <?php echo $email=$row['Email']; ?></p>
                                        <input type="hidden" id="email" value="<?php echo "$email"; ?>"></input>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-phone"></i> Contact:<?php echo $contact=$row['Contact']; ?> </li>
                                            <li><i class="fa fa-location-arrow"></i> Address: <?php echo $address=$row['Address']; ?></li>

                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="images/userImage/<?php if($pic!==""){echo $pic;}else{ echo "default.jpg";} ?>" alt="" class="img-circle img-responsive">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis passval">
                                        <button type="button" id="sendmesg" class="btn btn-success btn-xs" value="<?php echo $email; ?>"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o" ></i> </button>
                                        <a href="#" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                            </i> View Profile </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }

                        ?>
                        <?php 
                            $result2=getEmployerContact("comp");
                            while ($row=$result2->fetch_assoc()) {
                                $pic=$row['Profile_pic'];

                         ?>
                         <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12" style="height:180px; overflow: scroll;">
                                    <h4 class="brief"><i>Employers</i></h4>
                                    <div class="left col-xs-7">
                                        <h2><?php echo  $name=$row['firstname']; ?></h2>
                                        <p><strong>Email: </strong> <?php echo $email=$row['email']; ?></p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-phone"></i> Contact:<?php echo $contact=$row['contact']; ?> </li>
                                            <li><i class="fa fa-location-arrow"></i> Address: <?php echo $address=$row['address']; ?></li>

                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="images/userImage/<?php if($pic!==""){echo $pic;}else{ echo "default.jpg";}?>" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis passval">
                                        <button type="button" value="<?php echo $email; ?>" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <a href="#" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                            </i> View Profile </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<div class="modal fade" id="contactmodal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
               <form class="form-horizontal form-label-left" action="controllers/sendemails.php?id=1010" method="POST" novalidate>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><span class="fa fa-check fa-2x" style="color: green"></span>Sucess!!!</h4>
                </div>
                <div class="modal-body">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Messagebody">To:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="multiplesendemail" class="form-control col-md-7 col-xs-12"  name="multiplesendemail[]" required="required" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Messagebody">Subject:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="Subject" class="form-control col-md-7 col-xs-12"  name="Subject" placeholder="subject" required="required" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Messagebody">Message<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="Messagebody" name="Messagebody" class="form-control col-md-7 col-xs-12" placeholder="e.g Message body" required="required"></textarea>
                         <input type="hidden" id="fromfeedback" name="fromfeedback"></input>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button id="sendmailfromcontact" name="sendmailfromcontact" type="submit" class="btn btn-primary">Send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              </form>
            </div>
          </div>
<script type="text/javascript">

    $(document).on('click','#menu121',function(){
        //alert($(this).data('id'));
        var data=$(this).data('id');
        var res=data.split("$$");
        $('#inputemail').val(res[0]);
        $('#multiplesendemail').val(res[0]);
        $('#from').text(res[0]);
        $('#message').text(res[1]);
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/changeAdminPass.php',
            data:'key='+res[0],
            success:function(data){

            }
        });
        $("#readfeedback").modal('show');
    });
    $('.passval').on('click','button',function(){
        // alert($(this).val());
         var email=$(this).val();
         $('#multiplesendemail').val(email);
          $("#contactmodal").modal('show');
    });
   
</script>
<?php include("../includes/layouts/footer.php");?>
