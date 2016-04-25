<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#example').dataTable({
    //         aaSorting:[[1,'desc']]
    //     });
    // });
</script>
<form class="form-horizontal form-label-left" novalidate>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
            <label id="test"></label>
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                             <th>Toper Name</th>
                             <th>Toper Email</th>
                             <th>Toper Contact No.</th>
                             <th>Course Name</th>
                             <th>Topper Score</th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php 
                        $result12=getTopperreult();
                        while ($row12=$result12->fetch_assoc()) {
                            $data6=$row12['Scores'];
                            $data7=$row12['Total'];
                            $totalscore[]=($data6/$data7)*100;
                            $data8[]=$row12['Course_Name'];
                            $data9[]=$row12['users'];
                        }
                        foreach ($data9 as $key => $value) {
                            $result69=getTopperName($value);
                            while ($row69=$result69->fetch_assoc()) {
                                $ToperName[]=$row69['firstname'];
                                $Topercontact[]=$row69['firstname'];
                            }
                        }
                        $totalscorecopy=$totalscore;
                        sort($totalscore);
                        $totalscore=array_reverse($totalscore);
                     ?>
                     <?php 
                        foreach ($totalscore as $key => $value) {
                         $pos=array_search($value, $totalscorecopy);
                         unset($totalscorecopy[$pos]);
                         ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $ToperName[$pos]; ?></td>
                            <td class=" "><?php echo $data9[$pos]; ?></td>
                            <td class=" "><?php echo $Topercontact[$pos]; ?></td>
                            <td class=" "><?php echo $data8[$pos]; ?></td>
                            <td class=" "><?php echo $value; ?>%</td>
                            
                        </tr>
                       <?php
                    }                             
                 ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />

</div>
</form>

<?php include("../includes/layouts/footer.php");?>