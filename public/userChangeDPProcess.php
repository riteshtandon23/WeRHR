<?php
/*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/
     session_start();
	 $post = isset($_POST) ? $_POST: array();
	 //print_R($post);die;
	 switch($post['action']) {
	  case 'save' :
		saveAvatarTmp();
	  break;
	  default:
		changeAvatar();
		
	 }
	
	 function changeAvatar() {
        $post = isset($_POST) ? $_POST: array();
        $max_width = "500"; 
        $userId = isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
        $path = 'images/tmp';
        //$path = 'images/userImage';

        $valid_formats = array("jpg", "png", "gif", "bmp","jpeg", "JPG", "PNG", "GIF", "BMP","JPEG");
        $name = $_FILES['photoimg']['name'];
        $size = $_FILES['photoimg']['size'];
        if(strlen($name))
        {
        list($txt, $ext) = explode(".", $name);
        if(in_array($ext,$valid_formats))
        {
        if($size<(3072*3072)) // Image size max 3 MB (approx)
        {
        $actual_image_name = 'avatar' .'_'.$userId .'.'.$ext;
        $filePath = $path .'/'.$actual_image_name;
        $tmp = $_FILES['photoimg']['tmp_name'];
        
        if(move_uploaded_file($tmp, $filePath))
        {
        $width = getWidth($filePath);
            $height = getHeight($filePath);
            //Scale the image if it is greater than the width set above
            if ($width > $max_width){
                $scale = $max_width/$width;
                $uploaded = resizeImage($filePath,$width,$height,$scale);
            }else{
                $scale = 1;
                $uploaded = resizeImage($filePath,$width,$height,$scale);
            }
        /*$res = saveAvatar(array(
                        'userId' => isset($userId) ? intval($userId) : 0,
                                                'avatar' => isset($actual_image_name) ? $actual_image_name : '',
                        ));*/
                        
        //mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
        echo "<img id='photo' file-name='".$actual_image_name."' class='' src='".$filePath.'?'.time()."' class='preview'/>";
        }
        else
        echo "failed";
        }
        else
        echo "Image file size max 3072x3072 pixels"; 
        }
        else
        echo "Invalid file format.."; 
        }
        else
        echo "Please select image..!";
        exit;
        
        
    }
    /*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/
     function saveAvatarTmp() {
        $post = isset($_POST) ? $_POST: array();
        $userId = isset($post['id']) ? intval($post['id']) : 0;
        $path ='images/userImage/';
        $t_width = 300; // Maximum thumbnail width
        $t_height = 300;    // Maximum thumbnail height
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        if(isset($_SESSION['Type']) && $_SESSION['Type']==="Admin")
        {
            $id=$_SESSION['AID'];
            $imagename = "Admindp_".$id;
        }elseif(isset($_SESSION['Type']) &&  $_SESSION['Type']==="user")
        {
             $imagename = "userdp_".$id;
        }elseif(isset($_SESSION['Type']) &&  $_SESSION['Type']==="employer")
        {
            $imagename = "Employeedp_".$id;
        }
        
        $ext = null;
        require("../includes/dbconnection.php");
		
    if(isset($_POST['t']) and $_POST['t'] == "ajax")
    {
        extract($_POST);
        
        $profilepic = $_POST['image_name'];
        $ext = end(explode(".", $profilepic));
        $imagePath = "images/tmp/".$profilepic;
        $ratio = ($t_width/$w1); 
        $nw = ceil($w1 * $ratio);
        $nh = ceil($h1 * $ratio);
        $nimg = imagecreatetruecolor($nw,$nh);
        $im_src = imagecreatefromjpeg($imagePath);
        imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
        imagejpeg($nimg,$imagePath,90);
        if(isset($_SESSION['Type']) && $_SESSION['Type']==="Admin")
        {
            $query1 = mysqli_query($connection,"UPDATE we_are_hr_admin SET Profile_pic='$imagename.$ext' WHERE email='$email'");
        }elseif(isset($_SESSION['Type']) && $_SESSION['Type']==="user")
        {
             $query1 = mysqli_query($connection,"UPDATE users SET Profile_pic='$imagename.$ext' WHERE email='$email'");
                
        }elseif(isset($_SESSION['Type']) && $_SESSION['Type']==="employer")
        {

        }
       $destination = "images/userImage/".$imagename.".".$ext;      #writing cropped image
        copy($imagePath,$destination);
        //$imagename = "userdp_".".".$ext;
        
    }
    echo $imagePath.'?'.time();
    exit(0);    
    }
    
    /*********************************************************************
     Purpose            : resize image.
     Parameters         : null
     Returns            : image
     ***********************************************************************/
    function resizeImage($image,$width,$height,$scale) {
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    $source = imagecreatefromjpeg($image);
    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    imagejpeg($newImage,$image,90);
    chmod($image, 0777);
    return $image;
}
/*********************************************************************
     Purpose            : get image height.
     Parameters         : null
     Returns            : height
     ***********************************************************************/
function getHeight($image) {
    $sizes = getimagesize($image);
    $height = $sizes[1];
    return $height;
}
/*********************************************************************
     Purpose            : get image width.
     Parameters         : null
     Returns            : width
     ***********************************************************************/
function getWidth($image) {
    $sizes = getimagesize($image);
    $width = $sizes[0];
    return $width;
}
?>
