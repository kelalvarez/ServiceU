
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
                                            
                                                $hasSelected = isSelected($jobID);
                                                if($hasSelected == 1){
                                                    echo "<p style=\"color: red\"> You have already selected an applicant for this job </p>";
                                                }
                                        ?>
                                        
       
                                        <table class="table table-hover table-condensed table-responsive">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Application Date</th>
                                                <th> Review </th>
                                                <?php if($hasSelected != 1) { ?>
                                                <th> Select </th>
                                                <?php }?>    
                                            </tr>
                                        <?php     
                                            while ($row = mysqli_fetch_assoc($result)) { 
                                            ?>
                                            <form id="viewApplicationform" class="form-horizontal" action="#" name="viewApp" method="POST">
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
                                                    <input type="hidden" class="form-control" value="<?php echo $row['employeeID'];?>" name="applicantEmail">
                                            </td>
                                            <td>
                                            <?php
                                                echo $row['dateApplication'];
                                            ?>
                                            </td>
                                            
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php if ($hasSelected != 1) { ?>
                                            <td>
                                                <a href="userReviews.php?employeeEmail=<?php echo $row['employeeID']; ?>&jobID=<?php echo $jobID; ?>">
                                                
                                                <!--<a data-toggle="modal" href="#reviewShort">-->
                                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                                </a>
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;
                                                <!-- <a data-toggle="modal" href="#confirmApplicant" data-book-id="asd1">-->
                                                <button name="submitApplicant" type="submit">    
                                                    <span class="glyphicon glyphicon-ok-circle"></span></button>
                                                
                                            </td>
                                            <?php } 
                                                if($hasSelected == 1){ ?>
                                            <td>
                                                <a href="userReviews.php?employeeEmail=<?php echo $row['employeeID']; ?>&jobID=<?php echo $jobID; ?>">
                                                
                                                <!--<a data-toggle="modal" href="#reviewShort">-->
                                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                                </a>
                                            </td>
                                            
                                            
                                            <?php
                                                }
                                            ?>
                                            
                                            
                                            </tr>
                                            </form> 
                                            <?php 
                                            
                                            }
                                            
                                            }
                                            ?>
                                        </table>
                                       <!--
                                        <a data-toggle="modal" href="#reviewShort" class="btn btn-primary">Launch modal</a>
                                        -->
                                    </div>
                                    </div>
                                    <br>
                                    
                                    
                                </div>
                            </div>
                        
                        
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>
