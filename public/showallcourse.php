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
                             <th>Course Name</th>
                             <th>Total Users</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $resulttopic=select_Domain();
                        $course=null;
                        $totalInteresr=0;
                        while ($rowtopic=$resulttopic->fetch_assoc()) {
                           $data[]=$rowtopic['topic_Name'];
                        }
                        foreach ($data as $key => $value) {
                            $result4=getUserCourseInterest($value);
                            $row=$result4->fetch_assoc();
                            $totalCourseCount[]=$row['total'];
                            $coursename[]=$value;
                            $totalCourseCountcopy[]=$row['total'];
                        }
                         sort($totalCourseCount);
                         $totalCourseCount=array_reverse($totalCourseCount);
                        foreach ($totalCourseCount as $key => $value){
                            $pos=array_search($value, $totalCourseCountcopy);
                            unset($totalCourseCountcopy[$pos]);
                            ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $coursename[$pos]; ?></td>
                            <td class=" "><?php echo $value; ?></td>
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