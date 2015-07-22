<div id="panel1" class="panel row">
                            <span class="input-sm"><strong> </strong></span>
                            <br>
                            <!------ Review Section ------------->    
                            <table class="table table-striped">
                            <?php 
                                
                                $nroComments = getNroComments($employeeEmail);
                                if ( $nroComments == 0){
                                    echo "No comments available";
                                }
                                else {
                                $result = getComments($employeeEmail);
                                
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr><td class="col-md-3">';
                            ?>   
                                
                                    <?php        
                                    echo "<strong>Overall Rating</strong>";
                                    echo "<br>";
                                    drawStars($row['stars']);
                            ?>
                                    
                                
                            <?php        
                                    echo "</td>";
                                    
                                    echo "<td>";
  
                                    $date = date_create( $row['entryDate']);
                                    echo date_format($date, 'm/d/Y H:i');
                                    
                                    echo "<br>By: ";
                                    echo getFullName($row['senderID']);
                                    
                                    
                                    echo "<br><br>";
                                    echo $row['comment'];
                                    echo "<br><br>";
                                    echo "<strong>Would you recommend this service?</strong>";
                                    echo "<br>";
                                    isRecommended($row['recommend']);
                                    
                                    echo "</td></tr>";
                                }
                            
                            ?>
                            
                            </table>
                            
                            
                                <?php } ?>
                        </div>

          
           <div id="panel3" class="panel row">
                            <span class="input-sm"><strong></strong></span>
                            <br>
                            <!------ Review Section ------------->    
                            <table class="table table-striped">
                            <?php 
                                
                                $stars4Comments = getNroStarsComments($employeeEmail, 4);
                                if ( $stars4Comments == 0){
                                    echo "No comments available";
                                }
                                else {
                                $result = getStarComments($employeeEmail, 4);
                                
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr><td class="col-md-3">';
                            ?>   
                                
                                    <?php        
                                    echo "<strong>Overall Rating</strong>";
                                    echo "<br>";
                                    drawStars($row['stars']);
                            ?>
                                    
                                
                            <?php        
                                    echo "</td>";
                                    
                                    echo "<td>";
  
                                    $date = date_create( $row['entryDate']);
                                    echo date_format($date, 'm/d/Y H:i');
                                    
                                    echo "<br>By: ";
                                    echo getFullName($row['senderID']);
                                    
                                    
                                    echo "<br><br>";
                                    echo $row['comment'];
                                    echo "<br><br>";
                                    echo "<strong>Would you recommend this service?</strong>";
                                    echo "<br>";
                                    isRecommended($row['recommend']);
                                    
                                    echo "</td></tr>";
                                }
                            
                            ?>
                            
                            </table>
                            
                            
                                <?php } ?>
                        </div>

           <div id="panel4" class="panel row">
                            <span class="input-sm"><strong> </strong></span>
                            <br>
                            <!------ Review Section ------------->    
                            <table class="table table-striped">
                            <?php 
                                
                                $stars3Comments = getNroStarsComments($employeeEmail, 3);
                                if ( $stars3Comments == 0){
                                    echo "No comments available";
                                }
                                else {
                                $result = getStarComments($employeeEmail, 3);
                                
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr><td class="col-md-3">';
                            ?>   
                                
                                    <?php        
                                    echo "<strong>Overall Rating</strong>";
                                    echo "<br>";
                                    drawStars($row['stars']);
                            ?>
                                    
                                
                            <?php        
                                    echo "</td>";
                                    
                                    echo "<td>";
  
                                    $date = date_create( $row['entryDate']);
                                    echo date_format($date, 'm/d/Y H:i');
                                    
                                    echo "<br>By: ";
                                    echo getFullName($row['senderID']);
                                    
                                    
                                    echo "<br><br>";
                                    echo $row['comment'];
                                    echo "<br><br>";
                                    echo "<strong>Would you recommend this service?</strong>";
                                    echo "<br>";
                                    isRecommended($row['recommend']);
                                    
                                    echo "</td></tr>";
                                }
                            
                            ?>
                            
                            </table>
                            
                            
                                <?php } ?>
                        </div>
           <div id="panel5" class="panel row">
                            <span class="input-sm"><strong> </strong></span>
                            <br>
                            <!------ Review Section ------------->    
                            <table class="table table-striped">
                            <?php 
                                
                                $stars2Comments = getNroStarsComments($employeeEmail, 2);
                                if ( $stars2Comments == 0){
                                    echo "No comments available";
                                }
                                else {
                                $result = getStarComments($employeeEmail, 2);
                                
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr><td class="col-md-3">';
                            ?>   
                                
                                    <?php        
                                    echo "<strong>Overall Rating</strong>";
                                    echo "<br>";
                                    drawStars($row['stars']);
                            ?>
                                    
                                
                            <?php        
                                    echo "</td>";
                                    
                                    echo "<td>";
  
                                    $date = date_create( $row['entryDate']);
                                    echo date_format($date, 'm/d/Y H:i');
                                    
                                    echo "<br>By: ";
                                    echo getFullName($row['senderID']);
                                    
                                    
                                    echo "<br><br>";
                                    echo $row['comment'];
                                    echo "<br><br>";
                                    echo "<strong>Would you recommend this service?</strong>";
                                    echo "<br>";
                                    isRecommended($row['recommend']);
                                    
                                    echo "</td></tr>";
                                }
                            
                            ?>
                            
                            </table>
                            
                            
                                <?php } ?>
                        </div>
           <div id="panel6" class="panel row">
                            <span class="input-sm"><strong> </strong></span>
                            <br>
                            <!------ Review Section ------------->    
                            <table class="table table-striped">
                            <?php 
                                
                                $stars1Comments = getNroStarsComments($employeeEmail, 1);
                                if ( $stars1Comments == 0){
                                    echo "No comments available";
                                }
                                else {
                                $result = getStarComments($employeeEmail, 1);
                                
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr><td class="col-md-3">';
                            ?>   
                                
                                    <?php        
                                    echo "<strong>Overall Rating</strong>";
                                    echo "<br>";
                                    drawStars($row['stars']);
                            ?>
                                    
                                
                            <?php        
                                    echo "</td>";
                                    
                                    echo "<td>";
  
                                    $date = date_create( $row['entryDate']);
                                    echo date_format($date, 'm/d/Y H:i');
                                    
                                    echo "<br>By: ";
                                    echo getFullName($row['senderID']);
                                    
                                    
                                    echo "<br><br>";
                                    echo $row['comment'];
                                    echo "<br><br>";
                                    echo "<strong>Would you recommend this service?</strong>";
                                    echo "<br>";
                                    isRecommended($row['recommend']);
                                    
                                    echo "</td></tr>";
                                }
                            
                            ?>
                            
                            </table>
                            
                            
                                <?php } ?>
                        </div>
        