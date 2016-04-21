<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<script src="js/cropping/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="js/cropping/jquery.form.js"></script>
<link rel="stylesheet" href="css/cropping/imgareaselect.css">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profile <small>Change Profile Picture</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div style="margin-bottom: 20px;"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2"><img class="xxxx" id="avatar-edit-img" height="128" data-src="images/userImage/<?php if($pic!==""){echo $pic;}else{ echo "users.png";}?>"  data-holder-rendered="" style="width: 140px; height: 140px;" src="images/userImage/<?php if($pic!==""){echo $pic;}else{ echo "users.png";}?>"/><br><br>&nbsp;&nbsp;<a type="button" class="btn btn-primary" id="change-pic">Change Image</a></div>
                        <div class="col-sm-10">
                            <div id="changePic" class="" style="display:none">
                                <form id="cropimage" method="post" enctype="multipart/form-data" action="userChangeDPProcess.php">
                                    <label style="color:darkblue"><h3>Upload your image</h3>Max size: 3072x3072px</label>
                                    <input type="file" name="photoimg" id="photoimg" />
                                    <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
                                    <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                                    <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                                    <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                                    <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                                    <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                                    <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                                    <input type="hidden" name="action" value="" id="action" />
                                    <input type="hidden" name="image_name" value="" id="image_name" />
                                    <div id='preview-avatar-profile'></div>
                                    <div id="thumbs" style="padding:5px; width:600p"></div>
                                </form>
                                <div class=""> 
                                    <div class="coll-ms-12">
                                        <button type="button" class="btn btn-primary" onclick='window.location.reload();'>Close</button>
                                        <button type="button" name="save" id="btn-crop" class="btn btn-primary" onclick='window.location.reload();'>Crop & Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
              
    <script type="text/javascript">
        jQuery(document).ready(function(){
        
        jQuery('#change-pic').on('click', function(e){
            jQuery('#changePic').show();
            jQuery('#change-pic').hide();
            
        });
        
        jQuery('#photoimg').on('change', function()   
        { 
            jQuery("#preview-avatar-profile").html('');
            jQuery("#preview-avatar-profile").html('Uploading....');
            jQuery("#cropimage").ajaxForm(
            {
            target: '#preview-avatar-profile',
            success:    function() { 
                    jQuery('img#photo').imgAreaSelect({
                    aspectRatio: '1:1',
                    onSelectEnd: getSizes,
                });
                jQuery('#image_name').val(jQuery('#photo').attr('file-name'));
                }
            }).submit();

        });
        
        jQuery('#btn-crop').on('click', function(e){
        e.preventDefault();
        params = {
                targetUrl: 'userChangeDPProcess.php?action=save',
                action: 'save',
                x_axis: jQuery('#hdn-x1-axis').val(),
                y_axis : jQuery('#hdn-y1-axis').val(),
                x2_axis: jQuery('#hdn-x2-axis').val(),
                y2_axis : jQuery('#hdn-y2-axis').val(),
                thumb_width : jQuery('#hdn-thumb-width').val(),
                thumb_height:jQuery('#hdn-thumb-height').val()
            };

            saveCropImage(params);
        });
        function getSizes(img, obj)
        {
            var x_axis = obj.x1;
            var x2_axis = obj.x2;
            var y_axis = obj.y1;
            var y2_axis = obj.y2;
            var thumb_width = obj.width;
            var thumb_height = obj.height;
            if(thumb_width > 0)
                {

                    jQuery('#hdn-x1-axis').val(x_axis);
                    jQuery('#hdn-y1-axis').val(y_axis);
                    jQuery('#hdn-x2-axis').val(x2_axis);
                    jQuery('#hdn-y2-axis').val(y2_axis);
                    jQuery('#hdn-thumb-width').val(thumb_width);
                    jQuery('#hdn-thumb-height').val(thumb_height);
                    
                }
            else
                alert("Please select portion..!");
        }
        
        function saveCropImage(params) {
        jQuery.ajax({
            url: params['targetUrl'],
            cache: false,
            dataType: "html",
            data: {
                action: params['action'],
                id: jQuery('#hdn-profile-id').val(),
                 t: 'ajax',
                                    w1:params['thumb_width'],
                                    x1:params['x_axis'],
                                    h1:params['thumb_height'],
                                    y1:params['y_axis'],
                                    x2:params['x2_axis'],
                                    y2:params['y2_axis'],
                                    image_name :jQuery('#image_name').val()
            },
            type: 'Post',
           // async:false,
            success: function (response) {
                    jQuery('#changePic').hide();
                    jQuery('#change-pic').show();
                    jQuery(".imgareaselect-border1,.imgareaselect-border2,.imgareaselect-border3,.imgareaselect-border4,.imgareaselect-border2,.imgareaselect-outer").css('display', 'none');
                    
                    jQuery("#avatar-edit-img").attr('src', response);
                    jQuery("#preview-avatar-profile").html('');
                    jQuery("#photoimg").val('');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('status Code:' + xhr.status + 'Error Message :' + thrownError);
            }
        });
        }
        });
    </script>                                      
<?php include("../includes/layouts/footer.php");?>