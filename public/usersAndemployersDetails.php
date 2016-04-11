<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<form class="form-horizontal form-label-left" novalidate>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="btn-gx_content">
            <label id="test"></label>
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                             <th>Name</th>
                             <th>LastName</th>
                             <th>Email</th>
                             <th>Status</th>
                             <th>Address</th>
                             <th>City</th>
                             <th>Country</th>
                             <th>Action</th>
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['key']))
                        $id=htmlentities($_GET['key']);
                        $stat=null;
                    	$result= DisplayAllUsersDetails($_GET['key']);
                    while ($row=$result->fetch_assoc()) {
                        echo "<tr class=\"even pointer\">";
                        echo "<td class=\" \">".$row["firstname"]."</td>";
                        echo "<td class=\" \">".htmlspecialchars($row["lastname"])."</td>";
                        echo "<td class=\" \">".$row["email"]."</td>";
                        echo "<td class=\" \">".$row["address"]."</td>";
                        echo "<td class=\" \">".$row["city"]."</td>";
                        echo "<td class=\" \">".htmlspecialchars($row["country"])."</td>";
                        echo "<td class=\" \">".$row["Status"]."</td>";
                        //if($row["act_status"]==="1"){$stat=0;}else{$stat=1;}
                        echo "<td class=\" \"><button type=\"button\" class=\"btn btn-primary\" id=\"blockOrunblock\" value=\"".$row["email"]."\">";if($row["act_status"]==="1"){echo " &nbsp;&nbsp;block&nbsp;&nbsp;";}else{echo "unblock";}
                        echo "</button></td>";
                        echo "</tr>";
                    }
                    ?>
                    
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
<input type="hidden" id="Utype" value="<?php echo $id ?>"></input>
<input type="hidden" id="stat" value="<?php echo $stat ?>"></input>
    <br />
    <br />
    <br />
</div>
</form>
<script type="text/javascript">
    $(document).on('click','button',function(){
        //alert($('#stat').val());
        var utype=$('#Utype').val();
        var uname=$(this).val();
        var vis=0;
        //var uname=uname.split('/');
        //alert(uname[1]);
        if($(this).text()==="unblock"){
            $(this).html(" block ");
            vis=1;
        }else{
            $(this).html("unblock");
            vis=0;
        }
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/blockOrunblockusers.php',
            data:'utype='+utype+'&uname='+uname+'&stat='+vis ,
            success:function(data){
                //alert(data);

            }
        });
    });
</script>
<?php include("../includes/layouts/footer.php");?>