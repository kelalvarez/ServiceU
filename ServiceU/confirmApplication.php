
<div class="modal fade text-center" id="confirmApplication" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="changePass" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Are you sure you want to apply?</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="confirmApplicationform" class="form-horizontal" action="" name="confirmApplication" method="POST">
                            <div class="form-group">           
                            <div class="row">
                                <div class="col-lg-8 col-sm-offset-2">
                                  <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required> Acknowledge that I will be able to cancel my application in the next 24 hours or before the user close the job.<br>
                                      After the job employeer closes the job post or the time period ends, I will not be able to cancel my application and is my responsibility to contact the employeer for further actions. 
                                    </label>
                                  </div>
                                </div>
                            </div>
                            <div class="row">   
                                <br><br>
                                <button name="confirmApp" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Yes</button>
                                <button name="denyApp" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>No</button>
                            </div>
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>