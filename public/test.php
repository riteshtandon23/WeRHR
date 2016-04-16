
<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

<?php if(isset($_GET['key'])){
?>
<script type="text/javascript">

    $(document).ready(function(){

        $("#myModal").modal('show');

    });

</script>
<?php
} ?>
</head>
  <body class="nav-md">
<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sucess!!</h4>
        </div>
        <div class="modal-body">
          <p>Your feedback has been succesfully send to the Administrator. We will work towards your problem.</p>
          <p>Thank You</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
<script type="text/javascript"></script>
  <script>
  </script>



    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  
</html>