<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

  <style>
  
  h3 {
       color:red;
       font-weight:bold; 
  }

  h4 {
       color:green;
       font-weight:bold; 
  }
  p {
       color:red;
       font-weight:bold; 
  }

  </style>
</head>

      <body id="bodybooking"> 

<?php
      require_once('php/header.php');
    
 ?>

<?php

////Mahda/////

////////////validation for each part of the credit card form///////////
     $error_massages = 'first';
      if (isset($_POST["submit"])) {
   
           $error_massages = "";
                

                if (!($_POST["CCName"]== "AMEX" || $_POST["CCName"]== "VISA" || $_POST["CCName"]== "Mastercard")) {
                     $error_massages .= $error_massages ."<h3>Please insert your Credit card name.</h3><br>";
                     $credit_data["CCName"] = "";
                     } else {
                     $credit_data["CCName"] = $_POST["CCName"];
                     }


                if (!$_POST["CCNumber"]) {
                     $error_massages .= "<h3>Please insert card number.</h3><br>";
                     $credit_data["CCNumber"] = "";
                     } else {
                     $credit_data["CCNumber"] = $_POST["CCNumber"];
                     }


                if ($_POST["year"] == 00) {
                     $error_massages .= "<h3>Please insert year.</h3><br>";
                     $exp_data["year"] = "";
                     } else {
                     $exp_data["year"] = $_POST["year"];
                     }

                if ($_POST["month"] == 00) {
                     $error_massages .= "<h3>Please insert month.</h3><br>";
                     $exp_data["month"] = "";
                     } else {
                     $exp_data["month"] = $_POST["month"];
                     }

                if ($_POST["date"] == 00) {
                     $error_massages .= "<h3>Please insert date.</h3><br>";
                     $exp_data["date"] = "";
                     } else {
                     $exp_data["date"] = $_POST["date"];
                     }

                $credit_data["CCExpiry"] = implode ("-",$exp_data);

                if (!$_POST["CustomerId"]) {
                     $error_massages .= "<h3>Please insert Customer Id.</h3><br>";
                     $credit_data["CustomerId"] = "";
                     } else {
                     $credit_data["CustomerId"] = $_POST["CustomerId"];
                     }

      } 

      if ($error_massages == "") {
           $result = CreditInsert($credit_data);
           
           if ($result){
                print("<h4>The credit information was added to the database.</h4>");
                } else {
                print("<h3>There was an error with the credit data, please try again.</h3>");
                }
      }
      elseif ($error_massages != 'first'){
      ////////////////create the form and error messages/////////////////////
           print "$error_massages";
           print <<<EOF

     <form method="post" action="#">

          
           <label for="CCName" > Credit card name :</label>
           <input type="radio"  id="CCName" name="CCName" value="AMEX"/>AMEX
           <input type="radio"   name="CCName" value="VISA"/>VISA
           <input type="radio"   name="CCName" value="Mastercard"/>Mastercard
                
           <br><br>

           <label for="CCNumber">Credit card number:</label>
           <input class="" type="text" name="CCNumber" value="{$credit_data["CCNumber"]}"> <br><br> 

           <label for="CCExpiry">Expire date :</label>
                   
           <table style="margin-top: -30px" align=center>

           <tr>
                 <td >   
                      <select name="month" value=''>
                      <option value='00'>Month</option>
                      <option value='01'>January</option>
                      <option value='02'>February</option>
                      <option value='03'>March</option>
                      <option value='04'>April</option>
                      <option value='05'>May</option>
                      <option value='06'>June</option>
                      <option value='07'>July</option>
                      <option value='08'>August</option>
                      <option value='09'>September</option>
                      <option value='10'>October</option>
                      <option value='11'>November</option>
                      <option value='12'>December</option>
                      </select>

                 </td>

                 <td >   

                      <select name="date" >
                      <option value='00'>Date</option>
                      <option value='01'>01</option>
                      <option value='02'>02</option>
                      <option value='03'>03</option>
                      <option value='04'>04</option>
                      <option value='05'>05</option>
                      <option value='06'>06</option>
                      <option value='07'>07</option>
                      <option value='08'>08</option>
                      <option value='09'>09</option>
                      <option value='10'>10</option>
                      <option value='11'>11</option>
                      <option value='12'>12</option>
                      <option value='13'>13</option>
                      <option value='14'>14</option>
                      <option value='15'>15</option>
                      <option value='16'>16</option>
                      <option value='17'>17</option>
                      <option value='18'>18</option>
                      <option value='19'>19</option>
                      <option value='20'>20</option>
                      <option value='21'>21</option>
                      <option value='22'>22</option>
                      <option value='23'>23</option>
                      <option value='24'>24</option>
                      <option value='25'>25</option>
                      <option value='26'>26</option>
                      <option value='27'>27</option>
                      <option value='28'>28</option>
                      <option value='29'>29</option>
                      <option value='30'>30</option>
                      <option value='31'>31</option>
                      </select>

                 </td>
      
                 <td>  

                 <select name="year" >
                      <option value='00'>Year</option>
                      <option value='01'>2019</option>
                      <option value='02'>2020</option>
                      <option value='03'>2021</option>
                      <option value='04'>2022</option>
                      <option value='05'>2023</option>
                      <option value='06'>2024</option>
                      <option value='07'>2025</option>
                      <option value='08'>2026</option>
                      <option value='09'>2027</option>
                      <option value='10'>2028</option>
                      <option value='09'>2029</option>
                      <option value='10'>2030</option>
                
                 </td>
            </tr>
       </table>

       <br><br>

           <label for="CustomerId">Customer Id :</label>
           <input class="" type="text" name="CustomerId" value="{$credit_data["CustomerId"]}"><br><br>

          
           <input type="submit" name="submit" value="submit">
          
               

     </form>
EOF;
    
      } 
      else {
     ?>
          <br><br>
           <p id="errorcname" class="bookerror" style="display:none;"> Credit name is required to be filled!</p>
           <p id="errorcnum" class="bookerror" style="display:none;"> Credit number is required to be filled!</p>
           <p id="errormonth" class="bookerror" style="display:none;"> Month is required to be filled!</p>
           <p id="errordate" class="bookerror" style="display:none;"> Date is required to be filled!</p>
           <p id="erroryear" class="bookerror" style="display:none;"> Year is required to be filled!</p>
           <p id="errorcusid" class="bookerror" style="display:none;"> customer id is required to be filled!</p>
           <p id="correctcnum" class="bookerror" style="display:none;"> Credit number must be 16 digits number!</p>
           

           <form class="form"  name="creditform" method="post" action="#" >

                
                <label for="CCName" > Credit card name :</label>
                <input type="radio"  id="CCName" name="CCName" value="AMEX"/>AMEX
                <input type="radio"   name="CCName" value="VISA"/>VISA
                <input type="radio"   name="CCName" value="Mastercard"/>Mastercard
                
                <br><br>

                <label  for="CCNumber"> Credit card number  :</label>
                <input  id="CCNumber" type="text" name="CCNumber"  >  <br><br>
           
                <label for="CCExpiry">Expire date  :</label>   
                         
                <table style="margin: -27px  100px" >

                    <tr>
                          <td >   
                               <select id="month" name="month" value=''>
                               <option value='00'>Month</option>
                               <option value='01'>January</option>
                               <option value='02'>February</option>
                               <option value='03'>March</option>
                               <option value='04'>April</option>
                               <option value='05'>May</option>
                               <option value='06'>June</option>
                               <option value='07'>July</option>
                               <option value='08'>August</option>
                               <option value='09'>September</option>
                               <option value='10'>October</option>
                               <option value='11'>November</option>
                               <option value='12'>December</option>
                               </select>

                          </td>

                          <td >   

                               <select id="date" name="date" >
                               <option value='00'>Date</option>
                               <option value='01'>01</option>
                               <option value='02'>02</option>
                               <option value='03'>03</option>
                               <option value='04'>04</option>
                               <option value='05'>05</option>
                               <option value='06'>06</option>
                               <option value='07'>07</option>
                               <option value='08'>08</option>
                               <option value='09'>09</option>
                               <option value='10'>10</option>
                               <option value='11'>11</option>
                               <option value='12'>12</option>
                               <option value='13'>13</option>
                               <option value='14'>14</option>
                               <option value='15'>15</option>
                               <option value='16'>16</option>
                               <option value='17'>17</option>
                               <option value='18'>18</option>
                               <option value='19'>19</option>
                               <option value='20'>20</option>
                               <option value='21'>21</option>
                               <option value='22'>22</option>
                               <option value='23'>23</option>
                               <option value='24'>24</option>
                               <option value='25'>25</option>
                               <option value='26'>26</option>
                               <option value='27'>27</option>
                               <option value='28'>28</option>
                               <option value='29'>29</option>
                               <option value='30'>30</option>
                               <option value='31'>31</option>
                               </select>

                          </td>
               
                          <td>  

                          <select id="year" name="year" >
                               <option value='00'>Year</option>
                               <option value='2019'>2019</option>
                               <option value='2020'>2020</option>
                               <option value='2021'>2021</option>
                               <option value='2022'>2022</option>
                               <option value='2023'>2023</option>
                               <option value='2024'>2024</option>
                               <option value='2025'>2025</option>
                               <option value='2026'>2026</option>
                               <option value='2027'>2027</option>
                               <option value='2028'>2028</option>
                               <option value='2029'>2029</option>
                               <option value='2030'>2030</option>
                         
                          </td>
                     </tr>
                </table>

                <br><br><br>

                <label for="CustomerId">Customer Id  :</label>
                <input id="CustomerId" class="" type="text" name="CustomerId"><br><br>
             
                <input id="submitbtn" type="submit" name="submit" value="submit">

           </form>

           

<?php
       }
       
       require_once('php/footer.php');
   ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="script.js" charset="utf-8"></script>

      </body>
</html>


<?php
    // function for connecting to the database and close it
     function ConnectDB(){

            $dbh = mysqli_connect("localhost", "admin", "P@ssw0rd", "travelexperts");
            if (!$dbh){
           print("There was an error connecting :  " .mysqli_errno($dbh)." -- ".mysqli_error($dbh));
           exit;
           }
           return $dbh;
      }  

           function CloseDB($dbh){
           mysqli_close($dbh);
           }
     

     ///////////////////////// function for insert credit card information /////////////////////////
           function CreditInsert($credit_data){
               $link = ConnectDB();
      
              
               $CreditName = $credit_data['CCName'];
               $CreditNumber = $credit_data['CCNumber'];
               $ExDate = $credit_data['CCExpiry'];
               $CustomerId = $credit_data['CustomerId'];
               
               $sql = " INSERT INTO creditcards (CCName, CCNumber, CCExpiry, CustomerId)
               VALUES ('$CreditName','$CreditNumber','$ExDate','$CustomerId')";
      
               $result = mysqli_query($link, $sql);
      
      
               CloseDB($link);
               return $result;
          }

?>