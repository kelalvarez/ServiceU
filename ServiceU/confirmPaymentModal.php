
<div class="modal fade text-center" id="confirmPayment" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="confirmP" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Payment Process Confirmation</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="closePostform" class="form-horizontal" action="" name="closePost" method="POST">
                            <div class="form-group">           
                                <div class="row">
                                <div class="col-lg-8 col-sm-offset-2">
                                  <div class="checkbox">
                                      By checking this, I make the commitment to transfer the correct amount to ServiceU Paypal Account.
                                      <br>The amount will be on hold until the job is done, then the payment will be transfered to your employeer as both agree that the job has been completed.
                                      <br><br>
                                    <label>
                             
                                        <input type="checkbox" required> I agreed<br>
                                    </label>
                                  </div>
                                </div>
                            </div>
                            <div class="row">   
                                <br><br>
                                <button name="confirmPayment" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Confirm</button>
                            </div>
                                
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>