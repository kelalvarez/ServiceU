<!-- Upload Pin Modal -->
<div class="modal fade" id="editInterest" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="interestEdited" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Edit Degree</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="editInterestform" class="form-horizontal" name="editDegree" action="sadas" method="POST">
                            <div class="form-group">
                                
                                
                                <div class="form-group">
                                    <div id="interest1" class="row">
                                        <div class="col-md-3 col-lg-offset-3">
                                                <input name="degree1Part2" class="form-control" type="text" style="float: left;width: 300px; background-color: #fff; border-color:#cccccc " id="formGroupInputSmall" placeholder="Interest">

                                        </div>
                                    </div>
                                    
                                    <div id="interestList">
                                        
                                    </div>
                                </div>
                                
                                <span id="addInterest" class="glyphicon glyphicon-plus" aria-hidden="true" style="color: #286090"></span>
                                
                                <br>
                                <br>
                                <br>
 
                                <button name="submitInterest" type="submit" type="button" class="btn btn-primary"><i class="icon-hand-right"></i>Upload</button>
                                
                            </div>
                        </form>
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>