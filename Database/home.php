<?php
  include 'connection.php';
?>
<?php

$query2="select Country_Name from country";
$result=mysqli_query($connection,$query2);
if(!$result)
{
  die("Database connection fail".mysqli_error($connection));
}

if(isset($_POST['submi']))
{
  $coutry = mysql_real_escape_string($_POST['country']);
  $state = mysql_real_escape_string($_POST['InputState']);
  //$city = mysql_real_escape_string($_POST['InputCountry']);
  $query3="select Country_ID from country where Country_Name='{$coutry}' ORDER BY Country_Name ASC";

  $result1=mysqli_query($connection,$query3);
  if($result1)
  { 
      $temp="";$temp2="";
      while($row=mysqli_fetch_assoc($result1))
      {
        $temp=$row["Country_ID"];
      }
      $query7="select State_Name from state where State_Name='{$state}' AND Country_ID='$temp'";
      $result7=mysqli_query($connection,$query7);
      while($row=mysqli_fetch_assoc($result7))
      {
        $temp2=$row['State_Name'];
      }
      $strin = substr($temp2, 0, strlen($temp2));
      //echo $temp2 ."      hhh     ".$temp;
      if($strin==$state)
      {
        echo $state." Already Exist";
      }else
      {
        $query2="insert into state(State_Name,Country_ID) values('{$state}','{$temp}')";
        $result1=mysqli_query($connection,$query2);
        if($result1)
        {
          echo "Success";
        }else
        {
            die("Database connection fail in insert".mysqli_error($connection));
        }
      }
    
  }
  else
  {
    die("Database connection fail in select".mysqli_error($connection));
  }
}
if(isset($_POST['submit']))
{
    $country = mysql_real_escape_string($_POST['InputCountry']);
    $state = mysql_real_escape_string($_POST['InputCountry']);
    $city = mysql_real_escape_string($_POST['InputCountry']);
    $query="insert into country(Country_Name) values('{$country}')";
    //$query2="insert into country(Country_Name) values('{$country}')";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        echo "Success";
    }else
    {
        echo "Fail ".$country." Might already Exist";
        //die("Database connection fail".mysqli_error($connection));
    }
}

if(isset($_POST['submitprof']))
{
    $inputprofession = mysql_real_escape_string($_POST['InputProfession']);
    $query="insert into Profession(profession_name) values('{$inputprofession}')";
    //$query2="insert into country(Country_Name) values('{$country}')";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        echo "Success";
    }else
    {
        echo "Fail ".$inputprofession." Might already Exist";
        //die("Database connection fail".mysqli_error($connection));
    }
}
if(isset($_POST['submitpft']))
{
  $Profession = mysql_real_escape_string($_POST['pft']);
  $Professiontype = mysql_real_escape_string($_POST['Inputpft']);
  $query3="select Profession_id from Profession where profession_Name='{$Profession}' LIMIT 1";

  $result1=mysqli_query($connection,$query3);
   if($result1)
  { 
      $temp="";$temp2="";
      while($row=mysqli_fetch_assoc($result1))
      {
        $temp=$row["Profession_id"];
      }
      $query7="select Type_Name from typemaster where Type_Name='{$Professiontype}' AND Profession_id='{$temp}'";
      $result7=mysqli_query($connection,$query7);
      while($row=mysqli_fetch_assoc($result7))
      {
        $temp2=$row['Type_Name'];
      }
      $strin = substr($temp2, 0, strlen($temp2));
      //echo $temp2 ."      hhh     ".$temp;
      if($strin==$Professiontype)
      {
        echo $Professiontype."Type is Already Exist";
      }
      else
      {
          $query="insert into typemaster(type_name,Profession_id) values('{$Professiontype}','{$temp}')";
      //$query2="insert into country(Country_Name) values('{$country}')";
      $result=mysqli_query($connection,$query);
      if($result)
      {
        echo "Success";
      }else
      {
        echo "Fail!!! Please check your Profession";
        //die("Database connection fail".mysqli_error($connection));
      }
      }
      
    }else
      {
        echo "Fail to select";
        //die("Database connection fail".mysqli_error($connection));
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/getStateCity.js"></script>
    <script type="text/javascript" src="js/getCities.js"></script>
</head>
<body>

<div class="container">
  <h2>Welcome</h2>
  <!-- Trigger the modal with a button -->
  <div id="main" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
  <button type="button" class="btn btn-info btn-lg" onclick="$('#main').hide(); $('#myModal').show()">Location</button><br>
  <button type="button" class="btn btn-info btn-lg" onclick="$('#main').hide(); $('#myModal3').show()">Add Country</button><br>
<button type="button" class="btn btn-info btn-lg" onclick="$('#main').hide(); $('#myModal2').show()">Add State</button><br>
<button type="button" class="btn btn-info btn-lg" onclick="$('#main').hide(); $('#myModal4').show()">Add City</button><br>
 <button type="button" class="btn btn-info btn-lg" onclick="$('#main').hide(); $('#myModal5').show()">Add Profession</button><br>
 <button type="button" class="btn btn-info btn-lg" onclick="$('#main').hide(); $('#myModal6').show()">Add Profession Type</button><br>
 </div>
  <!-- Modal -->
 
    <div class="container" id="myModal" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="row">
    <a id="backlink" href="#" onclick="$('#myModal').hide(); $('#main').show()">Back to Main Panel</a>
            </div>
        <form role="form" name="form1" id="form1" method="post" action="submit.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Country</label>
                    <div class="input-group">
                         <select  class="form-control" name="country" id="country" onchange="window.getstates()">
              <option value="1">Select Country</option>
              <?php
                while($row=mysqli_fetch_assoc($result))
                {
                  //var_dump($row);
                  echo  "<option value={$row["Country_Name"]}>".$row["Country_Name"]."</option>";
                }
              ?>
            </select>
              
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Select State</label>
                    <div class="input-group">
                        <select  class="form-control" name="state" id="state" onchange="window.getCities()">
              <option>Select State</option>
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputEmail">Select City</label>
                    <div class="input-group">
                        <select  class="form-control" name="City" id="City">
              
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>
  </div>
</div>


<div class="container" id="myModal2" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php
      $query2="select Country_Name from country";
    $result=mysqli_query($connection,$query2);
    if(!$result)
    {
      die("Database connection fail".mysqli_error($connection));
    }
    ?>

    <div class="row">
    <a id="backlink" href="#" onclick="$('#myModal2').hide(); $('#main').show()">Back to Main Panel</a>
        <form role="form" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Country</label>
                    <div class="input-group">
                         <select  class="form-control" name="country"  required>
              <option>Select Country</option>
              <?php
                while($row=mysqli_fetch_assoc($result))
                {
                  //var_dump($row);
                  echo  "<option>".$row["Country_Name"]."</option>";
                }
              ?>
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter State</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputState" name="InputState" placeholder="Enter State" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 
                <input type="submit" name="submi" id="submi" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>


<div class="container" id="myModal3" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="row">
    <a id="backlink" href="#" onclick="$('#myModal3').hide(); $('#main').show()">Back to Main Panel</a>
        <form role="form" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Country</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputCountry" id="InputCountry" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="input-group">
                       <label for="error" name="error" id="error"></label> 
                    </div>
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>

<div class="container" id="myModal4" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="row">
    <?php
      $query2="select Country_Name from country";
    $result=mysqli_query($connection,$query2);
    if(!$result)
    {
      die("Database connection fail".mysqli_error($connection));
    }
    ?>
    <a id="backlink" href="#" onclick="$('#myModal4').hide(); $('#main').show()">Back to Main Panel</a>
        <form role="form2" name="form2" id="form2" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Country</label>
                    <div class="input-group">
                         <select  class="form-control" name="country" id="country" onchange="window.getstates()">
              <option>Select Country</option>
              <?php
                while($row=mysqli_fetch_assoc($result))
                {
                  //var_dump($row);
                  echo  "<option>".$row["Country_Name"]."</option>";
                }
              ?>
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Select State</label>
                    <div class="input-group">
                        <select  class="form-control" name="state"  required>
              <option>Select State</option>
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputEmail">Enter City</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputCity" name="InputCity" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submitcity" id="submitcity" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>

<div class="container" id="myModal5" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="row">
    <a id="backlink" href="#" onclick="$('#myModal5').hide(); $('#main').show()">Back to Main Panel</a>
        <form role="form" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Profession</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputProfession" id="InputProfession" placeholder="Enter Profession" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="input-group">
                       <label for="error" name="error" id="error"></label> 
                    </div>
                <input type="submit" name="submitprof" id="submitprof" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>
<div class="container" id="myModal6" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php
      $query2="select profession_name from Profession ORDER BY profession_name ASC";
    $result=mysqli_query($connection,$query2);
    if(!$result)
    {
      die("Database connection fail".mysqli_error($connection));
    }
    ?>

    <div class="row">
    <a id="backlink" href="#" onclick="$('#myModal6').hide(); $('#main').show()">Back to Main Panel</a>
        <form role="form" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Select Profession</label>
                    <div class="input-group">
                         <select  class="form-control" name="pft"  required>
              <option>Select Profession</option>
              <?php
                while($row=mysqli_fetch_assoc($result))
                {
                  //var_dump($row);
                  echo  "<option>".$row["profession_name"]."</option>";
                }
              ?>
            </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Profession Type</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="Inputpft" name="Inputpft" placeholder="Profession Type" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 
                <input type="submit" name="submitpft" id="submitpft" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>


</body>
</html>
<?php
mysqli_close($connection);
?>