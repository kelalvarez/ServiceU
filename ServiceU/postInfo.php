
<div class="modal fade" id="postInformation" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="postInfo" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                     <?php

                            echo $test = '<input type="text" name="jobId" value=""/>';
                            
                            $postID = $jobId;

                    ?>

                    
                    <?php
                        $result = getJobPost($postID);
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff"><?php echo $row["jobTitle"]; ?></span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="postInformationform" class="form-horizontal" action="" name="editDegree" method="POST">
                            <div class="form-group">           
                                <div class="form-group" style="color: #2e6da4">
                                    
                                    
                                    <div id="oldpassword" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label for="password" class="control-label">Old Password</label>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                            <?php echo $row["jobDescription"]; ?>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div id="newpassword" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label for="password" class="control-label">New Password</label>
                                        </div>
                                        
                                        <div class="col-md-4 col-lg-push-1">
                                            <?php echo $row["payment"]; ?>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    
                                    <div id="confirmpassword" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label for="passverify" class="control-label">Confirm Password</label>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                            <?php echo $row["category"]; ?>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
 
                                <button name="goto" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Go To Post</button>
                                <?php
                                    }
                                ?>
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>