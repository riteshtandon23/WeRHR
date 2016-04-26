<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>

<?php
    if(isset($_GET['callcount']))
    {
        //$key=$_GET['keysearch'];
        $data = array();
        $result=countUnreadFeedback();
        while($row=$result->fetch_assoc())
        {
            $data[]=array("unread"=>$row['unread']);
        }
        echo json_encode($data);
    }
    
?>
<?php
    if(isset($_GET['callmessage']))
    {
        //$key=$_GET['keysearch'];
        $data = array();
        $result126=selectFeedback();
        while($row126=$result126->fetch_assoc())
        {
            $result129=getProfilepicfeedback($row126['Email']);
            $row129=$result129->fetch_assoc();
            $tim=null;
            $ppic=$row129['Profile_pic'];
            if($ppic==="" || !isset($ppic)){ $ppic="default.jpg";}
            $fromtime=$row126['Date']." ".$row126['Time']; 
                                               //echo $fromtime;
            $fromtime=strtotime($fromtime);
            $totime=date("Y-m-d")." ".date("h:i:s");
             //echo $totime;
            $totime=strtotime($totime);
            //echo $fromtime;
            //echo round(abs($totime-$fromtime)/60)." Minutes ago";
            $timet=round(abs($totime-$fromtime)/60,2);
            if($timet>=60)
            {
                $Hours=round(abs($timet)/60,2);
                if($Hours>24)
                {
                        $tim=round(abs($Hours)/24)." Days ago";
                }else{
                    $tim=round(abs($timet)/60)." Hours ago";
                }
                
            }
            else
            {
                $tim=round(abs($totime-$fromtime)/60)." Minutes ago";
            }

            $data[]=array("Name"=>$row126['Name'],"email"=>$row126['Email'],"time1"=>$tim,"mesg"=>$row126['Message'],"pic"=>$ppic);
        }
        echo json_encode($data);
    }
    
?>
<?php
    if(isset($_GET['id']))
    {
        echo "string";
        $key=$_GET['id'];
        $data = array();
        $result=DisplayAllUsersDetails($key);
        while($row=$result->fetch_assoc())
        {
            $data[]=array("Name"=>$row["firstname"],"LName"=>$row["lastname"],"email"=>$row["email"],"status"=>$row["Status"],"address"=>$row["address"],"city"=>$row["city"],"country"=>$row["country"],"stat"=>$row["act_status"]);
        }
        echo json_encode($data);
    }
    
?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>

