<html>
    <head>
        <title>Congress information search</title>
        <style>
            #wrapper {
                    margin: 0 auto;
                    width: 620px;
                    margin-top: 120px;  
                }

            #k1{
                margin-left: 0px;
                padding-left:0px;
                
            }
            #form-style{
                margin-bottom: 20px;
                width: 350px;
				margin-left: 120px;
                background-color: white;
				padding: 10px;
				border: 1px #d5d5d5 solid;
				
            }
            .text_center {
				text-align: center;
			}
			
			.text_left {
				text-align: left;
			}
            #form-table {
				width: 600px;
				border: 2px #d5d5d5 solid;
			}
			
			#form-table table {
				width: 100%;
				border-collapse: collapse;
			}
			
			#form-table table th {
				background-color:white;
                border: 1px #d5d5d5 solid;
				height: 30px;
			}

			#form-table table td {
				border: 1px #d5d5d5 solid;
				height: 30px;
			}
            #k{
                border: 2px #d5d5d5 solid;
                text-align: center;
            }
                
        </style>
        <script>
            
             
             function resetSelectElement(selectElement) {
                selecElement.selectedIndex = 0;  // first option is selected, or
                                                 // -1 for no option selected
            }
        </script>
    </head>
    <body>
        
        <div id="wrapper">
            
                <h1 align="center"><i>Congress Information Search</i></h1>
                <div id="form-style">
                <form class="text_center" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<!--                    onsubmit="return validate();"-->
                    <table>
                        <tr><td>Congress DataBase</td>
                            <td><select id="firstlist" name="firstlist" onchange="change1()">
                                <script>
                                 function change1(){
                                    var k=document.getElementById("firstlist");
                                    var k1=k.options[k.selectedIndex].text;
                                    var g=document.getElementById("o");
                                   if(k1=="Legislators"){

                    //                   g.remove();
                    //                   g.appendChild("p");
                    //                   p.id="i";
                                       g.innerHTML="State/Representative*";
                                   }
                                    if(k1=="Committees"){
                    //                    g.remove();
                                       g.innerHTML="Committee ID*"; 
                                    }
                                    if(k1=="Bills"){
                    //                    g.remove();
                                       g.innerHTML="Bill ID*"; 
                                    }
                                    if(k1=="Amendments"){
                    //                    g.remove();
                                       g.innerHTML="Amendment ID*"; 
                                    }



                                }
                                </script>
                                  <option value="v">Select your option</option>
                                  <option value="Legislators">Legislators</option>
                                  <option value="Committees">Committees</option>
                                  <option value="Bills">Bills</option>
                                  <option value="Amendments">Amendments</option>
                                </select>
                                <script type="text/javascript">
                                  document.getElementById('firstlist').value = "<?php echo $_GET['firstlist'];?>";
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>Chamber</td>
                            <td>
                             <input type="radio" name="chamber" id="chamber1" value="senate">senate
                            <script type="text/javascript">
                                var k="<?php echo $_GET['chamber'];?>";
                                console.log(k);
                                if(k=="senate"){
                                    document.getElementById("chamber1").checked = true;
                                }
                            </script>
                             <input type="radio" name="chamber" id="chamber2" value="house">house
                            <script type="text/javascript">
                                var k="<?php echo $_GET['chamber'];?>";
                                       console.log(k);
                                if(k=="house"){
                                    document.getElementById("chamber2").checked = true;
                                }
                            </script>
                            </td>
                        </tr>
                        <tr>
                            <td id="o" name="o" >keyword*</td>
                             <script type="text/javascript">
                                 var k="<?php echo $_GET['firstlist'];?>";
                                 if(k=="Legislators"){
                                  document.getElementById('o').innerHTML = "State/Representative*";
                                 }
                                 else if(k=="Amendments"){
                                  document.getElementById('o').innerHTML = "Amendments ID*";  
                                 }
                                 else if(k=="Committees"){
                                  document.getElementById('o').innerHTML = "Committee ID*";
                                 }
                                 else if(k=="Bills"){
                                  document.getElementById('o').innerHTML = "Bill ID*";  
                                 }
                                 else{
                                   document.getElementById('o').innerHTML = "Keyword*";
                                 }
                                 
                                 
                                </script>
                            <td>
                             <input type="text" id="firstname" name="firstname" <?php if(isset($_GET['bioguide_id'])){ echo "value="."'".$_GET['firstname1']."'"; } ?><?php if(isset($_GET['bill_id'])){ echo "value=".$_GET['bill_id']; } ?><?php if(isset($_GET['firstname'])){ echo "value="."'".$_GET['firstname']."'"; } ?> >
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="search" id="search" onclick="return validate();">
                                <script>
                                    function validate(){
                                            var p=document.getElementById("firstname").value;
                                            var p2=document.getElementById("firstlist").value;
                                            var word="";
                                            if(!p){
                                                word+="please input into the text;"   
                                            }
                                            if(p2=='v'){
                                                word+="please make an option;"

                                            }
                                            if((document.getElementById("chamber1").checked==false)&&(document.getElementById("chamber2").checked==false)){
                                                word+="please make an option of the radio;"

                                            }
                                             if(word.length>0){
                                                 alert(word);
                                                 return false;
                                             }
                                            return true;
                                }
                                </script>
                            <input id="k1" type="button" value="clear" onclick="clearform()"></td>
                                <script>
                                     function clearform(){
                                            document.getElementById("firstname").value = "";
                                            removetable(document.getElementById("form-table"));
                                            removetable(document.getElementById("k"));
                                            removetable(document.getElementById("k2"));
                                            removetable(document.getElementById("k4"));
                                            document.getElementById("o").innerHTML="Keyword*";
                        //                    var k="<?php echo $_GET['chamber'];?>";
                        //                    console.log(k);
                        //                    if(k=="senate"){
                                            document.getElementById("chamber1").checked = false;
                        //                    }
                        //                    if(k=="house"){
                                            document.getElementById("chamber2").checked = false;
                        //                    }
                                            document.getElementById('firstlist').value='v';

                                    }

                                     function removetable(Element){
                                         Element&&Element.parentNode&&Element.parentNode.removeChild(Element);
                                     }  
                                </script>
                        </tr>
                        
                    </table>
            </form>
            <div class="text_center"><a href="http://sunlightfoundation.com/" target="_blank">Powered by Sunlight Foundation</a></div>
            </div>
                    <?php
//                        $len="";
//                        $len2="";
//                        $len3="";
//                        $inpukey="";
//                        if(isset($_GET['firstname'])){
//                            $inpukey=$_GET['firstname'];
//                        }
//                        else {
//                            $len="no input";
//                            }
//                        $chamb="";
//                        if(isset($_GET['chamber'])){
//                            $chamb=$_GET['chamber'];
//                        }
//                        else {
//                            $len2=$len."no input chamber";
//                        }
//                        $option="";
//                        if(isset($_GET['firstlist'])){
//                            $option=$_GET['firstlist'];
//                        } 
//                        else {
//                            $len3=$len2."np option";
//                        }
//                           
//                        if(($inpukey!="")&&($chamb!="")&&($option!='v')){
                        date_default_timezone_set('America/New_York');    
                        if(isset($_GET['chamber'])&& isset($_GET['firstname'])&&isset($_GET['firstlist'])){
                            
                                if($_GET['firstlist']=="Legislators")
                                {
                                    $arr = explode(" ", $_GET['firstname']);   
                                    if(state_to_ab(ucwords(strtolower($_GET['firstname'])))!=''){
                                        $url = 'http://congress.api.sunlightfoundation.com/legislators?chamber='.urlencode($_GET['chamber']).'&state='.urlencode(state_to_ab(ucwords(strtolower($_GET['firstname'])))).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                        }
                                    
                                    
                                    elseif(count($arr)>2){
                                            $url = 'http://congress.api.sunlightfoundation.com/legislators?&first_name='.ucwords(strtolower($arr[0])).'&last_name='.ucwords(strtolower($arr[0])).'%20'.ucwords(strtolower($arr[2])).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                        }
                                    elseif(count($arr)==2){
                                            $url = 'http://congress.api.sunlightfoundation.com/legislators?&first_name='.ucwords(strtolower($arr[0])).'&last_name='.ucwords(strtolower($arr[1])).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                             $respon = file_get_contents($url);
                                             $json = json_decode($respon,true);
                                            
                                            if($json['count']==0){
                                            $url = 'http://congress.api.sunlightfoundation.com/legislators?chamber='.urlencode($_GET['chamber']).'&query='.rawurlencode($_GET['firstname']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                            }
            
                                        }   
                                    else{
                                        $url = 'http://congress.api.sunlightfoundation.com/legislators?chamber='.urlencode($_GET['chamber']).'&query='.urlencode($_GET['firstname']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                        }
                                }
                                if($_GET['firstlist']=="Committees")
                                {
                                        $url = 'http://congress.api.sunlightfoundation.com/committees?committee_id='.urlencode(strtoupper($_GET['firstname'])).'&chamber='.urlencode($_GET['chamber']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                }
                                if($_GET['firstlist']=="Bills")
                                {
                                        $url = 'http://congress.api.sunlightfoundation.com/bills?bill_id='.urlencode(strtolower($_GET['firstname'])).'&chamber='.urlencode($_GET['chamber']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                }
                                if($_GET['firstlist']=="Amendments")
                                {
                                        $url = 'http://congress.api.sunlightfoundation.com/amendments?amendment_id='.urlencode(strtolower($_GET['firstname'])).'&chamber='.urlencode($_GET['chamber']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
                                }
//                                print_r($url);
                                $respon = file_get_contents($url);

                                $json = json_decode($respon,true);
//                                        print_r($json);
//                                        if($json->count == 0)
                                
                                        if($json['count']==0)
                                        {
                                            echo "<div class='text_center' id='k4'>The API returned zero for the request</div>";
                                        }
                            
                                        elseif($_GET['firstlist']=="Legislators")
                                        {
                                            echo '<div id="form-table" class="text_center">';
				    ?>  
                        <table class="text_left" id="k2" name="k2">
									<tr><th>Name</th><th>State</th><th>Chamber</th><th>View Details</th></tr>
							<?php foreach($json['results'] as $value) { ?>
									<tr>
										<td><?php echo $value['first_name']; ?><?php echo $value['last_name']; ?></td>
										<td><?php echo $value['state_name']; ?></td>
										<td><?php echo $value['chamber']; ?></td>
                                        <td><a href="?chamber=<?php echo $_GET['chamber']; ?>&firstname1=<?php echo $_GET['firstname']; ?>&firstlist=<?php echo $_GET['firstlist']; ?>&state=<?php echo $value['state_name']; ?>&bioguide_id=<?php echo $value['bioguide_id']; ?>" target="_blank">View Details</a></td>
									</tr>
							<?php   }       ?>
                        </table>
                    <?php			

                            }
                                        elseif($_GET['firstlist']=="Committees")
                                        {
                                            echo '<div id="form-table" class="text_center">';
				    ?>  
                        <table class="text_center" id="k2">
									<tr><th>Committee ID</th><th>Committee Name</th><th>Chamber</th></tr>
							<?php foreach($json['results'] as $value) { ?>
									<tr>
										<td><?php echo $value['committee_id']; ?></td>
										<td><?php echo $value['name']; ?></td>
										<td><?php echo $value['chamber']; ?></td>
									</tr>
							<?php   }       ?>
                        </table>
                    <?php			

                            }
                                         elseif($_GET['firstlist']=="Bills")
                                        {
                                             echo '<div id="form-table" class="text_center">';
                    ?>  
                        <table class="text_center" id="k2">
                            <tr><th>Bill ID</th><th>Short Title</th><th>Chamber</th><th>Details</th></tr>
                            <?php foreach($json['results'] as $value) { ?>
                                    <tr>
                                        <td><?php echo $value['bill_id']; ?></td>
                                        <td><?php echo $value['short_title']; ?></td>
                                        <td><?php echo $value['chamber']; ?></td>
                                        <td><a href="?chamber=<?php echo $_GET['chamber']; ?>&firstlist=<?php echo $_GET['firstlist']; ?>&bill_id=<?php echo $value['bill_id']; ?>" target="_blank">View Details</a></td>
                                    </tr>
                            <?php   }       ?>
                        </table>
                    <?php			

                            }
                                         elseif($_GET['firstlist']=="Amendments")
                                        {
                                             echo '<div id="form-table" class="text_center">';
                    ?>  
                        <table class="text_center" id="k2">
                            <tr><th>Amendment ID</th><th>Amendment Type</th><th>Chamber</th><th>Introduced On</th></tr>
                            <?php foreach($json['results'] as $value) { ?>
                                    <tr>
                                        <td><?php echo $value['amendment_id']; ?></td>
                                        <td><?php echo $value['amendment_type']; ?></td>
                                        <td><?php echo $value['chamber']; ?></td>
                                        <td><?php echo $value['introduced_on']; ?></td>
                                    </tr>
                            <?php   }       ?>
                        </table>
                    <?php			

                            }
                            
                          echo '</div>';  
                        }
                        elseif(isset($_GET['bioguide_id'])){
                             echo '<div id="k" class="text_center">';
                            $url = 'http://congress.api.sunlightfoundation.com/legislators?chamber='.urlencode($_GET['chamber']).'&state='.urlencode(state_to_ab($_GET['state'])).'&bioguide_id='.urlencode($_GET['bioguide_id']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");
//                            print_r($url);
                            $respon1 = file_get_contents($url);
                            
                            $json1 = json_decode($respon1,true);
//                            print_r($json1);
                    ?>
<!--                        <table class="k">-->
                            <?php foreach($json1['results'] as $value) { ?>
                            <p><img src="https://theunitedstates.io/images/congress/225x275/<?php echo $value['bioguide_id']?>.jpg"></p>
                            <p>Full Name    <?php echo $value['first_name']; ?><?php echo $value['last_name']; ?></p>
                            <p>Term Ends on    <?php echo $value['term_end']; ?></p>
                            <p>Website        <a href="<?php echo $value['website']; ?>"><?php echo $value['website']; ?></a></p>
                            <p>Office       <?php echo $value['office']; ?></p>
                            <p>Facebook     <?php if ($value['facebook_id']!=null) echo "<a href='http://www.facebook.com/".$value['facebook_id']."'>http://www.facebook.com/".$value['facebook_id']."</a></p>"; else echo "NA"; ?>
                            <p>Twitter   <?php if ($value['twitter_id']!=null) echo "<a href='http://www.Twitter.com/".$value['twitter_id']."'>http://www.Twitter.com/".$value['twitter_id']."</a></p>"; else echo "NA"; ?>   
                            <?php   }       ?>
                           
<!--
							
							</table>
-->
                    <?php
                          echo '</div>';   
                        }
                        
                           elseif(isset($_GET['bill_id'])){
                             echo '<div id="k" class="text_center">';
                             $url = 'http://congress.api.sunlightfoundation.com/bills?bill_id='.urlencode($_GET['bill_id']).'&chamber='.urlencode($_GET['chamber']).'&apikey='.urlencode("25ba21857897481f90b998fdcecdcb24");   
//                            print_r($url);
                            $respon1 = file_get_contents($url);
                            
                            $json1 = json_decode($respon1,true);
//                            print_r($json1);
                    ?>
<!--                        <table class="k">-->
                            <?php foreach($json1['results'] as $value) { ?>
                            <p>Bill ID    <?php echo $value['bill_id']; ?></p>
                            <p>Bill Title    <?php echo $value['short_title']; ?></p>
                            <p>Sponsor        <?php echo $value['sponsor']['first_name']; ?><?php echo $value['sponsor']['last_name']; ?></p>
                            <p>Introduced On       <?php echo $value['introduced_on']; ?></p>
                            <p>Last action with date     <?php echo $value['last_version']['version_name']; ?><?php echo $value['last_action_at']; ?></p>
                            <p>Bill URL      <a href="<?php echo $value['last_version']['urls']['pdf']; ?>"><?php echo $value['short_title']; ?><?php if($value['short_title']==null){ echo $value['bill_id']; } ?></a></p>
                            <?php   }       ?>
                           
<!--
							
							</table>
-->
                    <?php
                          echo '</div>';   
                        }
                        
                        
                        function state_to_ab( $code ){
                        //    $code = strtoupper($code);
                            $state = '';
                            if( $code == 'Alabama' ) $state = 'AL';
                            if( $code == 'Alaska' ) $state = 'AK';
                            if( $code == 'Arizona' ) $state = 'AZ';
                             if( $code == 'Arkansas' ) $state = 'AR';
                             if( $code == 'California' ) $state = 'CA';
                             if( $code == 'Colorado' ) $state = 'CO';
                             if( $code == 'Connecticut' ) $state = 'CT';
                             if( $code == 'Delaware' ) $state = 'DE';
                             if( $code == 'Florida' ) $state = 'FL';
                             if( $code == 'Georgia' ) $state = 'GA';
                             if( $code == 'Hawaii' ) $state = 'HI';
                             if( $code == 'Idaho' ) $state = 'ID';
                             if( $code == 'Illinois' ) $state = 'IL';
                             if( $code == 'Indiana' ) $state = 'IN';
                             if( $code == 'Iowa' ) $state = 'IA';
                             if( $code == 'Kansas' ) $state = 'KS';
                             if( $code == 'Kentucky' ) $state = 'KY';
                             if( $code == 'Louisiana' ) $state = 'LA';
                             if( $code == 'Maine' ) $state = 'ME';
                             if( $code == 'Maryland' ) $state = 'MD';
                             if( $code == 'Massachusetts' ) $state = 'MA';
                             if( $code == 'Michigan' ) $state = 'MI';
                             if( $code == 'Minnesota' ) $state = 'MN';
                             if( $code == 'Mississippi' ) $state = 'MS';
                             if( $code == 'Missouri' ) $state = 'MO';
                             if( $code == 'Montana' ) $state = 'MT';
                             if( $code == 'Nebraska' ) $state = 'NE';
                             if( $code == 'Nevada' ) $state = 'NV';
                             if( $code == 'New Hampshire' ) $state = 'NH';
                             if( $code == 'New Jersey' ) $state = 'NJ';
                             if( $code == 'New Mexico' ) $state = 'NM';
                             if( $code == 'New York' ) $state = 'NY';
                             if( $code == 'North Carolina' ) $state = 'NC';
                             if( $code == 'North Dakota' ) $state = 'ND';
                             if( $code == 'Ohio' ) $state = 'OH';
                             if( $code == 'Oklahoma' ) $state = 'OK';
                             if( $code == 'Oregon' ) $state = 'OR';
                             if( $code == 'Pennsylvania' ) $state = 'PA';
                             if( $code == 'Rhode Island' ) $state = 'RI';
                             if( $code == 'South Carolina' ) $state = 'SC';
                             if( $code == 'South Dakota' ) $state = 'SD';
                             if( $code == 'Tennessee' ) $state = 'TN';
                             if( $code == 'Texas' ) $state = 'TX';
                             if( $code == 'Utah' ) $state = 'UT';
                             if( $code == 'Vermont' ) $state = 'VT';
                             if( $code == 'Virginia' ) $state = 'VA';
                             if( $code == 'Washington' ) $state = 'WA';
                             if( $code == 'West Virginia' ) $state = 'WV';
                             if( $code == 'Wisconsin' ) $state = 'WI';
                             if( $code == 'Wyoming' ) $state = 'WY';

                            return $state;
                        }

                    ?>
        </div>
         
    </body>
</html>