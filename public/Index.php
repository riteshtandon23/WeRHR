<?php include("../includes/layouts/header.php");?>
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