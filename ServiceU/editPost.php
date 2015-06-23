
<div class="modal fade text-center" id="editPost" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="editP" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Update Job</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="editPostform" class="form-horizontal" action="postComplete.php?jobID=<?php echo $jobID ?>" name="editDegree" method="POST">
                            <div class="form-group">           
                                <div class="form-group" style="color: #2e6da4">
                                    
                                    <div id="jobt" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label for="password" class="control-label">Job Title</label>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                                <input type="text" class="form-control" value="<?php echo strip_tags($title);?>" name="jobTitle">
                                                
                                        </div>
                                    </div>
                                    <br>
                                    <div id="jobd" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label class="control-label">Job Description</label>
                                        </div>
                                        
                                        <div class="col-md-4 col-lg-push-1">
                                            <input type="text" value="<?php echo strip_tags($description);?>" class="form-control" name="jobDescription">
                                        </div>
                                    </div>
                                    <br>
                                    <div id="jobp" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label class="control-label">Payment</label>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                            <input type="text" readonly="true" class="form-control" value="<?php echo $payment;?>" name="jobPayment">
                                        </div>
                                    </div>
                                    <div id="jobc" class="row">
                                        <div class="col-md-4 col-lg-push-2">
                                            <label for="passverify" class="control-label">Category</label>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                            <input type="text" class="form-control" value="<?php echo $category;?>" name="jobCategory">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
 
                                <button name="updateJob" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Update</button>
                                
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>