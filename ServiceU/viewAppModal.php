
<div class="modal fade text-center" id="viewApplication" data-focus-on="input:first" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="viewApp" style="margin-top:50px; width: 100%" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #286090">
                        <span class="modal-title" id="myModalLabel" style="color: #fff">Applicants</span>
                        <button class="close" data-dismiss="modal"><span style="color: #fff">×</span></button>
                    </div>
                    <div class="panel-body" >
                        <form id="viewApplicationform" class="form-horizontal" action="#" name="editDegree" method="POST">
                            <div class="form-group">           
                                <div class="form-group" style="color: #2e6da4">
                                    <div class="col-sm-10 col-md-offset-1">
                                    <div id="jobt" class="row text-left" > 
                                            
                                            
                                        <?php  
                                            $result = getJobApplicants($jobID);
                                            
                                            if (!$result) {
                                                echo "Could not process successfully";
                                            }

                                            if (mysqli_num_rows($result) == 0) {
                                                echo "There are no applications";
                                                
                                            }
                                            else {
                                        ?>
                                        <table class="table table-hover table-condensed table-responsive">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Application Date</th>
                                                <th> Review </th>
                                                <th> Select </th>
                                            </tr>
                                        <?php     
                                            while ($row = mysqli_fetch_assoc($result)) { 
                                            ?>
                                            <tr>
                                            <td>
                                            <?php
                                                echo $row['orderApp'];
                                                echo ". ";
                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                echo getFullName($row['employeeID']);
                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                echo $row['dateApplication'];
                                            ?>
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="userReviews.php?employeeEmail=<?php echo $row['employeeID']; ?>&jobID=<?php echo $jobID; ?>"><span class="glyphicon glyphicon-open-file"></span></a>
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-ok"></span>
                                            </td>
                                            
                                            </tr>
                                            <?php 
                                            }
                                            
                                            }
                                            ?>
                                                
                                        </table>
                                       
                                        <a data-toggle="modal" href="#reviewShort" class="btn btn-primary">Launch modal</a>
                                        
                                    </div>
                                    </div>
                                    <br>
                                    
                                    
                                </div>
                            </div>
                        </form>
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>

