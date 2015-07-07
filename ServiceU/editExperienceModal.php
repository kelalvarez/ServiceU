<!-- Upload Pin Modal -->
<div class="modal fade" id="editExperience" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="interestEdited" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090; text-align: center;">
                        <span class="modal-title" id="myModalLabel" style="color: #fff"><span class="glyphicon glyphicon-plus"> </span> Edit Experience</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="editInterestform" class="form-horizontal" name="editDegree" action="profile.php?email=<?php echo $_SESSION['loginEmail']; ?>" method="POST">
                            <div class="form-group">
                                
                                
                                <div class="form-group">
                                    <div id="interest1" class="row">
                                        <div class="col-md-3 col-lg-offset-3">
                                                <input name="interest1" class="form-control" type="text" style="float: left;width: 300px; background-color: #fff; border-color:#cccccc " id="formGroupInputSmall" placeholder="Experience">

                                        </div>
                                    </div>
                                    
                                    <div id="interestList">
                                        
                                    </div>
                                </div>
                                
                                <div style="text-align: center;">
                                
                                 <button name="submitExperience" type="button" class="btn btn-default"><span id="addExperience" class="glyphicon glyphicon-plus" aria-hidden="true" style="color: #286090"></span></button>
                                </div>
                                
                                

                                <div style="text-align: center; margin-top: 30px;">
                                    <button name="submitExperience" type="submit" type="button" class="btn btn-primary"><i class="icon-hand-right"></i>Save</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>