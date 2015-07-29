
<div class="modal fade text-center" id="clearPayment" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="clearP" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Clear Payment</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="clearPaymentform" class="form-horizontal" action="#" name="clearPaym" method="POST">
                            <div class="form-group">           
                                <div class="row">
                                <div class="col-lg-8 col-sm-offset-2">
                                    <input type="hidden" class="form-control" value="<?php echo $row['jobID'];?>" name="jobID">
                                    <button name="clearPay" type="submit"  class="btn btn-success"><i class="icon-hand-right"></i>Clear</button> &nbsp;
                                    <button name="denyPay" type="submit"  class="btn btn-danger"><i class="icon-hand-right"></i>Deny</button>
                                </div>
                            </div>
                                
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>