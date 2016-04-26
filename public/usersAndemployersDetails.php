<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<form class="form-horizontal form-label-left" novalidate>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="btn-gx_content">
            <label id="test"></label>
                <table id="example22" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                             <th>Name</th>
                             <th>LastName</th>
                             <th>Email</th>
                             <th>Address</th>
                             <th>City</th>
                             <th>Country</th>
                             <th>Status</th>
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
    $(document).ready(function () {
        window.setInterval(function(){
            //alert("j");
            var id='<?php if(isset($_GET['key'])){echo $_GET['key'];} ?>';
            //alert(id);
            if(id!=="")
            {
                 $.ajax({
        type:'GET',
        dataType:'json',
        url:'controllers/refreshNotification.php',
        data:'id='+id,
        success:function(data)
        {
            var table = $('#example22').DataTable({
                "autoWidth":false,
                "destroy": true,
                'iDisplayLength': 12,
                "sPaginationType": "full_numbers"
            });
            table.clear().draw(false);
            var myOb=JSON.stringify(data);
            var myObject = JSON.parse(myOb);
            for(i=0;i<myObject.length;i++)
            {
                var Data1=myObject[i].Name;
                var Data2=myObject[i].LName;
                var Data3=myObject[i].email;
                var Data4=myObject[i].address;
                var Data5=myObject[i].city;
                var Data6=myObject[i].country;
                var Data7=myObject[i].status;
                var Data7=myObject[i].stat;
                    if(Data7==="1")
                    {
                        table.row.add([Data1,Data2,Data3,Data4,Data5,Data6,Data7,"<button type='button' class='btn btn-primary' id='blockOrunblock' value='"+Data3+"'>Block</button>"]).draw(false);
                    }else{
                        table.row.add([Data1,Data2,Data3,Data4,Data5,Data6,Data7,"<button type='button' class='btn btn-primary' id='blockOrunblock' value='"+Data3+"'>UnBlock</button>"]).draw(false);
                    }
            }

        }
    });
            }
        },5000);
    });
</script>
<?php include("../includes/layouts/footer.php");?>