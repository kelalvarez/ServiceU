/*! jQuery v1.11.1 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
var $dcounter=0;
    var $dmax = 3;
    var slots = [ 21 ,31 , 41 , 51];
    
    $( "#addDegree" ).on( "click", function( event ) {
        if( slots[0] == 21 || slots[1] == 31 || slots[2] == 41 || slots[3] == 51 ){
            for( c = 0 ; c < slots.length ; c++){
                if(slots[c] == 21){
                    $i = 2;
                    slots[0] = 2;
                    break;
                }
                else if(slots[c] == 31){
                    $i = 3;
                    slots[1] = 3;
                    break;
                }
                else if(slots[c] == 41){
                    $i = 4;
                    slots[2] = 4;
                    break;
                }   
                else if(slots[c] == 51){
                    $i = 5;
                    slots[3] = 5;
                    break;
                }
            }
            
            
        var $text = "<div id=\"degree" + $i + "\" class=\"row\"><div class=\"col-md-4 col-lg-push-2\">" + 
                    "<select style=\"color: #269abc; float: left; margin-top: 15px;\" id=\"degreeType\" name=\"degree" + $i +"Part1\"  required=\"required\" >" + 
                    "<option value=\"na\" selected=\"\">Choose Type:</option>" + 
                    "<option value=\"bs\">BS.</option>" + 
                    "<option value=\"ba\">BA.</option>" + 
                    "<option value=\"ms\">MS.</option>" +
                    "<option value=\"ma\">MA.</option>" +
                    "<option value=\"phd\">PhD</option>" +
                    "<option value=\"certificate\">Certificate</option>" +
                    "<option value=\"other\">Other</option>" + 
                    "</select>" + 
                "</div>" + 
                "<div class=\"col-md-4 col-lg-push-1\">" + 
                    "<input name=\"degree" + $i + "Part2\" class=\"form-control\" type=\"text\" style=\"float: left;width: 240px; background-color: #fff; border-color:#cccccc \" id=\"formGroupInputSmall\" placeholder=\"Degree Name\">" +  
                "</div>" +
                "<div class=\"col-md-1 col-lg-push-1\">" + 
                    "<span id=\"deleteDegree" + $i + "\" class=\"glyphicon glyphicon-minus\" style=\" margin-top: 17px; color: red\"></span>" +
                "</div>" +
                "</div>";   
        
            $( "#degreeList" ).append($text);
        
            $(document).ready(function(){
                $("#deleteDegree2").click(function(){
                    $("#degree2").remove();
                    slots[0] = 21;
                });

            });
            $(document).ready(function(){
                $("#deleteDegree3").click(function(){
                    $("#degree3").remove(); 
                    slots[1] = 31;
                });

            });
            $(document).ready(function(){
                $("#deleteDegree4").click(function(){
                    $("#degree4").remove();
                    slots[2] = 41;
                });
            });
            $(document).ready(function(){
                $("#deleteDegree5").click(function(){
                    $("#degree5").remove();
                    slots[3] = 51;
                });
            });

       }
        else {
            alert("You have reached the maximum number of fields");
            
        }
        

    });
    
    $icount = 2 ;
     $( "#addInterest" ).on( "click", function( event ) {
         
        if ($icount < 10){    
            var $newInterest = "<div id=\"interest" + $icount + "\" class=\"row\">" +
                        " <div class=\"col-md-3 col-lg-offset-3\">" +
                        "<input name=\"interestName" + $icount +"\" class=\"form-control\" type=\"text\" style=\"float: left;width: 300px; background-color: #fff; border-color:#cccccc \" id=\"formGroupInputSmall\" placeholder=\"Interest\">" +
                        "</div>" +
                        "</div>";   
            $icount++;
                $( "#interestList" ).append($newInterest);
        }
        else
            alert('You have reached the list of interests');

    });

    