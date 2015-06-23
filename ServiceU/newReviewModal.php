
<div class="modal fade text-center" id="newReview" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div id="newR" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">New Review</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="newReviewform" class="form-horizontal" action="postComplete.php?jobID=<?php echo $jobID ?>" name="editDegree" method="POST">
                            <div class="form-group">           
                                <div class="form-group" style="color: #2e6da4">
                                    
                                    <div id="puncR" class="row" >
                                        <div class="col-md-4">
                                            Punctuality Stars:
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="puncRadio" id="puncRadios1" required value="1">
                                                1
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="puncRadio" id="puncRadios2" value="2">
                                                2
                                        </div>    
                                        <div class="col-sm-1 col-md-1 ">
                                                <input type="radio" name="puncRadio" id="puncRadios3" value="3">
                                                3
                                        </div>  
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="puncRadio" id="puncRadios4" value="4">
                                                4
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="puncRadio" id="puncRadios5" value="5">
                                                5                                        
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="puncRadio" id="puncRadiosNone" value="0">
                                                None
                                        </div>  
                                    </div>
                                    <br>
                                    <div id="perfR" class="row" >
                                        
                                        <div class="col-md-4">
                                            Performance Stars:
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="perfRadio" id="perfRadios1" required value="1">
                                                1
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="perfRadio" id="perfRadios2" value="2">
                                                2
                                        </div>    
                                        <div class="col-sm-1 col-md-1 ">
                                                <input type="radio" name="perfRadio" id="perfRadios3" value="3">
                                                3
                                        </div>  
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="perfRadio" id="perfRadios4" value="4">
                                                4
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="perfRadio" id="perfRadios5" value="5">
                                                5                                        
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="perfRadio" id="perfRadiosNone" value="0">
                                                None
                                        </div>  
                                    </div>
                                    
                                    <br>
                                    <div id="review" class="row" >
                                        <div class="col-md-4">
                                            Review:
                                        </div>
                                        <div class="col-sm-2 col-md-7">
                                                <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div id="oveR" class="row" >
                                        <div class="col-md-4">
                                            Overall Experience:
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="overRadio" id="overRadios1" required value="1">
                                                1
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="overRadio" id="overRadios2" value="2">
                                                2
                                        </div>    
                                        <div class="col-sm-1 col-md-1 ">
                                                <input type="radio" name="overRadio" id="overRadios3" value="3">
                                                3
                                        </div>  
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="overRadio" id="overRadios4" value="4">
                                                4
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="overRadio" id="overRadios5" value="5">
                                                5                                        
                                        </div>
                  
                                    </div>
                                    
                                    
                                    <br>
                                    <div id="oveR" class="row" >
                                        <div class="col-md-4">
                                            Would you recommend this user?
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="recomRadio" id="recomRadios1" required value="1">
                                                Yes
                                        </div>
                                        <div class="col-sm-1 col-md-1">
                                                <input type="radio" name="recomRadio" id="recomRadios2" value="2">
                                                No
                                        </div>    
                                        
                  
                                    </div>
                                    
                                    
                                </div>
 
                                <button name="submitReview" type="submit"  class="btn btn-primary"><i class="icon-hand-right"></i>Submit</button>
                                
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>