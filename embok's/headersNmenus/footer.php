<?php
    //session_start();
    if(isset($_SESSION["fname"])==FALSE && isset($_SESSION["lname"])==FALSE){
        header('Location: login.php');
        }
    else{
?>
<div class="">
    <p class="pull-right">WeRHR! a recruitment cum analysis tool by <a>Lovely Infotech</a>. |
        <span class="lead"> <i class="fa fa-paw"></i> WeRHR</span>
    </p>
</div>
<div class="clearfix"></div>
<?php
}
?>