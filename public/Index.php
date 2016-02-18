<?php include("../includes/layouts/header.php");?>
<!--***********************************************************************************************************************************-->
<!--**      include the header and footer and start working your project in between two file   										***-->
<!--**      or your work should start below this comment                             		  									    ***-->
<!--**      if you want to used Database connection include require_once("../includes/dbconnection.php"); at the top inside php tag ***-->
<!--**      if u want to used all function include require_once("../includes/all_functions.php");below the dbconnection.php 		***-->
<!--**      Create By Da O Hi Paya Lamare                              						   										***-->
<!--***********************************************************************************************************************************-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="Modal">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h2 class="modal-title" id="myModalLabel2">Sucessfull</h2>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Successfully Inserted</h4>
                                                <p>Please note that your change has save into Database.</p>
                                                <p>
                                                Thank You</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

<?php include("../includes/layouts/footer.php");?>