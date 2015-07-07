
<div class="modal fade" id="editDegree" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="degreeEdited" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >

                    <div class="panel-heading" style="background-color: #286090; text-align: center;">
                        <span class="modal-title" id="myModalLabel" style="color: #fff"><span class="glyphicon glyphicon-education"> </span> Edit Degree</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    
                    <div class="panel-body" >
                        <form id="editDegreeform" class="form-horizontal" action="profile.php?email=<?php echo $_SESSION['loginEmail']; ?>" name="editDegree" method="POST">
                            <div class="form-group">
                      
                                <div class="form-group">
                                    <div id="degree1" class="row">
                                        <div class="col-md-4 col-lg-push-2">
                                            <select style="color: #269abc; float: left; margin-top: 15px;" id="degreeType" name="degree1Part1"  required="required" >
                                                <option value="na" selected="">Choose Type:</option>
                                                <option value="bs">BS</option>
                                                <option value="ba">BA</option>
                                                <option value="ms">MS</option>
                                                <option value="ma">MA</option>
                                                <option value="phd">PhD</option>
                                                <option value="certificate">Certificate</option>
                                                <option value="other">Other</option>
                                                </select>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                                <input name="degree1Part2" class="form-control" type="text" style="float: left;width: 240px; background-color: #fff; border-color:#cccccc " id="formGroupInputSmall" placeholder="Degree Name">

                                        </div>
                                    </div>
                                    
                                    <div id="degreeList">
                                        
                                    </div>
                                </div>
                                
                                <div style="text-align: center;">
                                   
                                    <button name="submitDegree" type="button" class="btn btn-default"><span id="addDegree" class="glyphicon glyphicon-plus" aria-hidden="true" style="color: #286090"></span></button>
                                </div>
                                
                                <div style="text-align: center; margin-top: 30px;">
                                    <button name="submitDegree" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Save</button>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>