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

                    <div class="row">

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
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-star"></span></a>

                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis passval">
                                        <button type="button" id="sendmesg" class="btn btn-success btn-xs" value="<?php echo $email; ?>"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o" ></i> </button>
                                        <a href="#" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                            </i> View Status </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }

                        ?>
                        <?php 
                            $result2=getEmployerContact();
                            while ($row=$result2->fetch_assoc()) {
                                $pic=$row['Profile_pic'];

                         ?>
                         <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12" style="height:180px; overflow: scroll;">
                                    <h4 class="brief"><i><?php echo $type=$row['type']; ?></i></h4>
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
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-star"></span></a>

                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis passval">
                                        <button type="button" value="<?php echo $email; ?>" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <a href="<?php if($type=="user"){echo "usersAndemployersDetails.php?key=111111";}else{echo "usersAndemployersDetails.php?key=111112";} ?>" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                            </i> View Status </a>
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
                  <h4 class="modal-title"><span class="fa fa-share-square fa-2x" style="color: green"></span>  Send Email</h4>
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
 <script type="text/javascript">
        $(document).ready(function(e){
            $('#keywords').keyup(function(){
                $('#container').empty();
                var x=$(this).val();
                if(x!="")
                {
                    $.ajax({
                    type: 'GET',
                    url:'search.php',
                    data:'keysearch='+x,
                    success:function(data)
                    {
                        //alert(data);
                         //var myOb=JSON.stringify(data);
                        var myObject = JSON.parse(data);
                        //alert(myObject[0].Name);
                        for(i=0;i<myObject.length;i++)
                        {
                            //alert(myObject[i].name);
                            var Data1=myObject[i].Name;
                            var Data2=myObject[i].email;
                            var Data3=myObject[i].contact;  
                            var Data4=myObject[i].address;
                            var Data5=myObject[i].pic;
                            var data6="Administrator";
                             var res=Didplaycontact(Data1,Data2,Data3,Data4,Data5,data6);
                             $('#container').append(res);
                        }
                             
                    }

                });
                $.ajax({
                    type: 'GET',
                    url:'search.php',
                    data:'keysearch2='+x,
                    success:function(data1)
                    {
                        //alert(data);
                         //var myOb=JSON.stringify(data);
                        var myObject = JSON.parse(data1);
                        //alert(myObject[0].Name);
                        for(i=0;i<myObject.length;i++)
                        {
                            //alert(myObject[i].name);
                            var Data1=myObject[i].Name;
                            var Data2=myObject[i].email;
                            var Data3=myObject[i].contact;  
                            var Data4=myObject[i].address;
                            var Data5=myObject[i].pic;
                            var data6=myObject[i].type;
                             var res=Didplaycontact(Data1,Data2,Data3,Data4,Data5,data6);
                             $('#container').append(res);
                        }
                             
                    }

                });
                }else
                {
                    $.ajax({
                    type: 'GET',
                    url:'search.php',
                    data:'keysearchall='+x,
                    success:function(data)
                    {
                        //alert(data);
                         //var myOb=JSON.stringify(data);
                        var myObject = JSON.parse(data);
                        //alert(myObject[0].Name);
                        for(i=0;i<myObject.length;i++)
                        {
                            //alert(myObject[i].name);
                            var Data1=myObject[i].Name;
                            var Data2=myObject[i].email;
                            var Data3=myObject[i].contact;  
                            var Data4=myObject[i].address;
                            var Data5=myObject[i].pic;
                            var data6="Administrator";
                             var res=Didplaycontact(Data1,Data2,Data3,Data4,Data5,data6);
                             $('#container').append(res);
                        }
                             
                    }

                });
                $.ajax({
                    type: 'GET',
                    url:'search.php',
                    data:'keysearchall2='+x,
                    success:function(data1)
                    {
                        //alert(data);
                         //var myOb=JSON.stringify(data);
                        var myObject = JSON.parse(data1);
                        //alert(myObject[0].Name);
                        for(i=0;i<myObject.length;i++)
                        {
                            //alert(myObject[i].name);
                            var Data1=myObject[i].Name;
                            var Data2=myObject[i].email;
                            var Data3=myObject[i].contact;  
                            var Data4=myObject[i].address;
                            var Data5=myObject[i].pic;
                            var data6=myObject[i].type;
                             var res=Didplaycontact(Data1,Data2,Data3,Data4,Data5,data6);
                             $('#container').append(res);
                        }
                             
                    }

                });
                }
            });
            $('#display').on('click','li',function(){
                //alert($(this).text());
                $('#searchtopic').val($(this).text());
                $('#display').css('display','none');
            });

        });
        function Didplaycontact(data1,data2,data3,data4,data5,data6)
        {
            var dir;
            var output='<div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">';
            output +='<div class="well profile_view">';
                output +='<div class="col-sm-12" style="height:180px; overflow: scroll;">';
                    output +='<h4 class="brief"><i>'+data6+'</i></h4>';
                    output +='<div class="left col-xs-7">';
                        output +='<h2>'+data1+'</h2>';
                        output +='<p><strong>Email: </strong>'+data2+'</p>';
                        output +='<ul class="list-unstyled">';
                            output +='<li><i class="fa fa-phone"></i> Contact:'+data3+'</li>';
                            output +='<li><i class="fa fa-location-arrow"></i> Address: '+data4+'</li>';
                        output +='</ul>';
                    output +='</div>';
                    output +='<div class="right col-xs-5 text-center">';
                        output +='<img src="images/userImage/'+data5+'" alt="" class="img-circle img-responsive">';
                    output +='</div>';
                output +='</div>';
                output +='<div class="col-xs-12 bottom text-center">';
                    output +='<div class="col-xs-12 col-sm-6 emphasis">';
                        output +='<p class="ratings">';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star"></span></a>';
                            output +='<a href="#"><span class="fa fa-star-star"></span></a>';
                            if(data6!=="Administrator")
                            {
                                if(data6==="user")
                                {
                                    dir=111111;
                                }else{
                                    dir=111112;
                                }
                            }else{
                                dir="111111";
                            }
                        output +='</p>';
                    output +='</div>';
                    output +='<div class="col-xs-12 col-sm-6 emphasis passval">';
                        output +='<button type="button" value="'+data2+'" class="btn btn-success btn-xs" onclick="Displaymodal(this.value);"> <i class="fa fa-user">';
                            output +='</i> <i class="fa fa-comments-o"></i> </button>';
                        output +='<a href="usersAndemployersDetails.php?key='+dir+'" class="btn btn-primary btn-xs"> <i class="fa fa-user">';
                            output +='</i> View Status </a>';
                    output +='</div>';
                output +='</div>';
            output +='</div>';
        output +='</div>';
        return output;
        }
         $('input[type=button]').click(function(){
         alert($(this).val());
         // var email=$(this).val();
         // $('#multiplesendemail').val(email);
         //  $("#contactmodal").modal('show');
    });
         function Displaymodal(value){
             var email=value;
             $('#multiplesendemail').val(email);
            $("#contactmodal").modal('show');
         }
    </script>
<?php include("../includes/layouts/footer.php");?>
