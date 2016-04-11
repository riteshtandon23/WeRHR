<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<form class="form-horizontal form-label-left" novalidate>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
            <label id="test"></label>
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                             <th>Username</th>
                             <th>User LastName</th>
                             <th>User Status</th>
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['key']))
                    	$result= DisplayAllUsers($_GET['key']);
                    while ($row=$result->fetch_assoc()) {
                        echo "<tr class=\"even pointer\">";
                        echo "<td class=\" \">".$row["firstname"]."</td>";
                        echo "<td class=\" \">".htmlspecialchars($row["lastname"])."</td>";
                        echo "<td class=\" \">".$row["Status"]."</td>";
                        echo "</tr>";
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