
<div class="modal fade" id="confirmCode" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="changePass" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Verify Code</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="confirmCodeform" class="form-horizontal" action="" name="editDegree" method="POST">
                            <div class="form-group">           
                                <div class="form-group" style="color: #2e6da4">
                                    
                                    <div id="verifyCodediv" class="row" >
                                        <div class="col-md-4 col-lg-push-2">
                                            <label for="password" class="control-label">Code</label>
                                        </div>
                                        <div class="col-md-4 col-lg-push-1">
                                                <input  class="form-control" name="verificationCode">
                                        </div>
                                    </div>
                                    <br>

                                </div>
 
                                <button name="verifyCode" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Save</button>
                                
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>