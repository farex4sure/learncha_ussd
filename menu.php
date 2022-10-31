<?php
// DB credentials.
//include '../config.php';

session_start();

include_once 'util.php';
class Menu
{
    protected $text;
    protected $sessionId;


    function __construct()
    {
    }


    public function mainMenuRegistered($textArray, $phoneNumber)
    {
        //shows initial user menu
        $level = count($textArray);
            if ($level == 1){
        $response = "Welcome to LEARNCHAR\n";
        $response .= "1. Complete Dictionary\n";
        $response .= "2. Play Games\n";
        $response .= "3. Everything Climate\n";
        return $response;
            } else {
                 echo "END Invalid Menu";
            }
           
    }
    
    

public function Dictionary($textArray, $phoneNumber)
    {
        //shows initial user menu
        $level = count($textArray);
        $response="";
            if ($level == 1){
                echo "CON Enter word";
            }else if ($level == 2){
                $response .= "CON Select option\n";
                $response .= "1. Meaning\n";
                $response .= "2. Antonyms\n";
                $response .= "3. Synonyms\n";
                $response .= "4. Example\n";
                echo $response;
            }elseif($level == 3 AND $textArray[2] == 1){
                $word = $textArray[1];
            $curl = curl_init();
            curl_setopt_array($curl, [
              CURLOPT_URL => "https://api.dictionaryapi.dev/api/v2/entries/en/$word",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_SSL_VERIFYPEER => false,
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "content-type: application/json"
              ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                $resp = json_decode($response,true);
             $def = $resp['0']['meanings']['0']['definitions']['0']['definition'];
            echo "END $def";
            }
            }elseif($level == 3 AND $textArray[2] == 3){
            $word = $textArray[1];
            $curl = curl_init();
            curl_setopt_array($curl, [
              CURLOPT_URL => "https://api.api-ninjas.com/v1/thesaurus?word=$word",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_SSL_VERIFYPEER => false,
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => [
                "X-Api-Key: eP5SQSTsH1Cqu2u9tZ3b4w==Clan2c3pUcVbFWP1",
                "accept: application/json",
                "content-type: application/json"
              ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                $resp = json_decode($response,true);
             if(isset($resp['synonyms']['0'])){
                 
                 $sy1=$resp['synonyms']['0'];
                 $sy2=$resp['synonyms']['1'];
                 $sy3=$resp['synonyms']['2'];
                 $sy4=$resp['synonyms']['3'];
                 $sy5=$resp['synonyms']['4'];
                 
                 echo "END Synonyms of $word\n 1. $sy1 \n2. $sy2 \n3. $sy3 \n4. $sy4 \n5. $sy5";
                 
             }else{
                 echo "END No example found";
             }
            }
            }elseif($level == 3 AND $textArray[2] == 4){
                $word = $textArray[1];
            $curl = curl_init();
            curl_setopt_array($curl, [
              CURLOPT_URL => "https://api.dictionaryapi.dev/api/v2/entries/en/$word",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_SSL_VERIFYPEER => false,
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "content-type: application/json"
              ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                $resp = json_decode($response,true);
             
             if(isset($resp['0']['meanings']['0']['definitions']['0']['example'])){
                 $examps=$resp['0']['meanings']['0']['definitions']['0']['example'];
                echo "END $examps";
             }else{
                 echo "END No example found";
             }
            }
            } else {
                echo "END invalid menu";
            }
           
    }
    
    

public function Games($textArray, $phoneNumber)
    {
        //shows initial user menu
        //first
        $response="";
        
        $ans1="printer";
        $ans2="monitor";
        $ans3="mouse";
        
        //second
        $ans11="textile";
        $ans22="cutton";
        $ans33="rubber";
        
        //third
        $ans111="plants";
        $ans222="animals";
        $ans333="food";
        
        //fourth
        $ans1111="health";
        $ans2222="growth";
        $ans3333="produce";
        
        $level = count($textArray);
            if ($level == 1){
        $response .="CON Select Game:\n";
        $response .= "1. Vocabulary\n";
        $response .= "2. Spelling Games\n";
        $response .= "3. Trivia\n";
        echo $response;
            } elseif ($level == 2 && $textArray[1] == 1){
        $response .="CON Select Subject\n";
        $response .="1. Computer Science\n";
        $response .="2. Home Economics\n";
        $response .="3. Elementry Science\n";
        $response .="4. Basic Science\n";
        echo $response;
            } elseif ($level == 2 && $textArray[1] == 2){
                echo "END Under construction";
                //first option start
            } elseif ($level == 2 && $textArray[1] == 3){
        $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_URL => "https://the-trivia-api.com/api/questions?categories=history,science,arts_and_literature,geography,general_knowledge,sport_and_leisure&limit=1&difficulty=easy",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "content-type: application/json"
          ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $resp = json_decode($response,true);
        // var_dump ($resp);
          $cat = $resp['0']['category'];
          $co = $resp['0']['correctAnswer'];
          $question = $resp['0']['question'];
          $inco1 = $resp['0']['incorrectAnswers']['0'];
          $inco2 = $resp['0']['incorrectAnswers']['1'];
          $inco3 = $resp['0']['incorrectAnswers']['2'];
          
          $date=time();
          
          include 'dbconnect.php';            
            mysqli_query($conn, "INSERT INTO answers (phone,ans,date)VALUES('".$phoneNumber."','".$co."','".$date."')");
          $response="";
          $my_answers = array("$co","$inco1","$inco2","$inco3");
          shuffle($my_answers);
          
          $inc1 = $my_answers['0'];
          $inco1 = $my_answers['1'];
          $inco2 = $my_answers['2'];
          $inco3 = $my_answers['3'];
          
          include 'dbconnect.php';            
            mysqli_query($conn, "INSERT INTO options (phone,correct_opt,opt1,opt2,opt3,opt4,date)VALUES('".$phoneNumber."','".$co."','".$inc1."','".$inco1."','".$inco2."','".$inco3."','".$date."')");
          $response .="CON $question\n";
        $response .="1. $inc1\n";
        $response .="2. $inco1\n";
        $response .="3. $inco2\n";
        $response .="4. $inco3\n";
        echo $response;
        }
            } elseif($level == 3 && $textArray[2] == 1 && $textArray[1] == 1){
        $response .="CON Arrange the word\n";
        $response .="eirPtrn\n";
        echo $response;
            }elseif($level == 3 && $textArray[1] == 3){
                    include 'dbconnect.php';            
                    $users = "SELECT * FROM options WHERE phone='$phoneNumber' ORDER BY ID DESC LIMIT 1";
                    $result2s = $conn->query($users);
                    if ($result2s->num_rows > 0) {
                        while($row = $result2s->fetch_assoc()) {
                        $c_opt = $row["correct_opt"];
                        $c_opt1 = $row["opt1"];
                        $c_opt2 = $row["opt2"];
                        $c_opt3 = $row["opt3"];
                        $c_opt4 = $row["opt4"];
                        }
                    }
                if($textArray[2] == 1 && $c_opt1 === $c_opt){
                echo "END You are correct";
                include 'dbconnect.php'; 
                mysqli_query($conn, "DELETE FROM answers WHERE phone='$phoneNumber'");
                mysqli_query($conn, "DELETE FROM options WHERE phone='$phoneNumber'");
                }elseif($textArray[2] == 2 && $c_opt2 === $c_opt){
                echo "END You are correct";
                include 'dbconnect.php'; 
                mysqli_query($conn, "DELETE FROM answers WHERE phone='$phoneNumber'");
                mysqli_query($conn, "DELETE FROM options WHERE phone='$phoneNumber'");
                }elseif($textArray[2] == 3 && $c_opt3 === $c_opt){
                echo "END You are correct";
                include 'dbconnect.php'; 
                mysqli_query($conn, "DELETE FROM answers WHERE phone='$phoneNumber'");
                mysqli_query($conn, "DELETE FROM options WHERE phone='$phoneNumber'");
                }elseif($textArray[2] == 4 && $c_opt4 === $c_opt){
                echo "END You are correct";
                include 'dbconnect.php'; 
                mysqli_query($conn, "DELETE FROM answers WHERE phone='$phoneNumber'");
                mysqli_query($conn, "DELETE FROM options WHERE phone='$phoneNumber'");
                }else{
                    include 'dbconnect.php';
                    $user = "SELECT * FROM answers WHERE phone='$phoneNumber' ORDER BY ID DESC LIMIT 1";
                    $result2 = $conn->query($user);
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                    $ans = $row2["ans"];
                        }
                    }
                    echo "END You are wrong\n The answer is $ans";
                    mysqli_query($conn, "DELETE FROM answers WHERE phone='$phoneNumber'");
                    mysqli_query($conn, "DELETE FROM options WHERE phone='$phoneNumber'");
                }
            }elseif($level == 4 && $textArray[2] == 1 && $textArray[1] == 1){
        $response .="CON Arrange the word\n";
        $response .="rmotoni\n";
        echo $response;
            }elseif($level == 5 && $textArray[2] == 1 && $textArray[1] == 1){
        $response .="CON Arrange the word\n";
        $response .="emsou\n";
        echo $response;
            }elseif($level == 6 && $textArray[3] == $ans1 && $textArray[4] == $ans2 && $textArray[5] == $ans3 && $textArray[2] == 1){
        echo "END You Score 3 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1 && $textArray[4] == $ans2 && $textArray[5] == $ans3 && $textArray[2] == 1){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans1 && $textArray[4] != $ans2 && $textArray[5] == $ans3 && $textArray[2] == 1){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans1 && $textArray[4] == $ans2 && $textArray[5] != $ans3 && $textArray[2] == 1){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1 && $textArray[4] != $ans2 && $textArray[5] == $ans3 && $textArray[2] == 1){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans1 && $textArray[4] != $ans2 && $textArray[5] != $ans3 && $textArray[2] == 1){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1 && $textArray[4] != $ans2 && $textArray[5] != $ans3 && $textArray[2] == 1){
        echo "END You Score 0 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1 && $textArray[4] == $ans2 && $textArray[5] != $ans3 && $textArray[2] == 1){
        echo "END You Score 1 out of 3";
            }
            
            //second option
             elseif($level == 3 && $textArray[2] == 2){
        $response .="CON Arrange the word\n";
        $response .="xtitele\n";
        echo $response;
            }elseif($level == 4 && $textArray[2] == 2){
        $response .="CON Arrange the word\n";
        $response .="cuontt\n";
        echo $response;
            }elseif($level == 5 && $textArray[2] == 2){
        $response .="CON Arrange the word\n";
        $response .="ruerbb\n";
        echo $response;
            }elseif($level == 6 && $textArray[3] == $ans11 && $textArray[4] == $ans22 && $textArray[5] == $ans33 && $textArray[2] == 2){
        echo "END You Score 3 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans11 && $textArray[4] == $ans22 && $textArray[5] == $ans33 && $textArray[2] == 2){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans11 && $textArray[4] != $ans22 && $textArray[5] == $ans33 && $textArray[2] == 2){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans11 && $textArray[4] == $ans22 && $textArray[5] != $ans33 && $textArray[2] == 2){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans11 && $textArray[4] != $ans22 && $textArray[5] == $ans33 && $textArray[2] == 2){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans11 && $textArray[4] != $ans22 && $textArray[5] != $ans33 && $textArray[2] == 2){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans11 && $textArray[4] != $ans22 && $textArray[5] != $ans33 && $textArray[2] == 2){
        echo "END You Score 0 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans11 && $textArray[4] == $ans22 && $textArray[5] != $ans33 && $textArray[2] == 2){
        echo "END You Score 1 out of 3";
            }
            
            //third option
             elseif($level == 3 && $textArray[2] == 3){
        $response .="CON Arrange the word\n";
        $response .="anplts\n";
        echo $response;
            }elseif($level == 4 && $textArray[2] == 3){
        $response .="CON Arrange the word\n";
        $response .="anlsima\n";
        echo $response;
            }elseif($level == 5 && $textArray[2] == 3){
        $response .="CON Arrange the word\n";
        $response .="dofo\n";
        echo $response;
            }elseif($level == 6 && $textArray[3] == $ans111 && $textArray[4] == $ans222 && $textArray[5] == $ans333 && $textArray[2] == 3){
        echo "END You Score 3 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans111 && $textArray[4] == $ans222 && $textArray[5] == $ans333 && $textArray[2] == 3){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans111 && $textArray[4] != $ans222 && $textArray[5] == $ans333 && $textArray[2] == 3){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans111 && $textArray[4] == $ans222 && $textArray[5] != $ans333 && $textArray[2] == 3){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans111 && $textArray[4] != $ans222 && $textArray[5] == $ans333 && $textArray[2] == 3){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans111 && $textArray[4] != $ans222 && $textArray[5] != $ans333 && $textArray[2] == 3){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans111 && $textArray[4] != $ans222 && $textArray[5] != $ans333 && $textArray[2] == 3){
        echo "END You Score 0 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans111 && $textArray[4] == $ans222 && $textArray[5] != $ans333 && $textArray[2] == 3){
        echo "END You Score 1 out of 3";
            }
            
            
            //fourth option
             elseif($level == 3 && $textArray[2] == 4){
        $response .="CON Arrange the word\n";
        $response .="hehalt\n";
        echo $response;
            }elseif($level == 4 && $textArray[2] == 4){
        $response .="CON Arrange the word\n";
        $response .="grhowt\n";
        echo $response;
            }elseif($level == 5 && $textArray[2] == 4){
        $response .="CON Arrange the word\n";
        $response .="prceodu\n";
        echo $response;
            }elseif($level == 6 && $textArray[3] == $ans1111 && $textArray[4] == $ans2222 && $textArray[5] == $ans3333 && $textArray[2] == 4){
        echo "END You Score 3 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1111 && $textArray[4] == $ans2222 && $textArray[5] == $ans3333 && $textArray[2] == 4){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans1111 && $textArray[4] != $ans2222 && $textArray[5] == $ans3333 && $textArray[2] == 4){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans1111 && $textArray[4] == $ans2222 && $textArray[5] != $ans3333 && $textArray[2] == 4){
        echo "END You Score 2 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1111 && $textArray[4] != $ans2222 && $textArray[5] == $ans3333 && $textArray[2] == 4){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] == $ans1111 && $textArray[4] != $ans2222 && $textArray[5] != $ans3333 && $textArray[2] == 4){
        echo "END You Score 1 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1111 && $textArray[4] != $ans2222 && $textArray[5] != $ans3333 && $textArray[2] == 4){
        echo "END You Score 0 out of 3";
            }elseif($level == 6 && $textArray[3] != $ans1111 && $textArray[4] == $ans2222 && $textArray[5] != $ans3333 && $textArray[2] == 4){
        echo "END You Score 1 out of 3";
            }
            
            else{
                echo "END Wrong option";
            }
           
    }
    
    
public function Challenge($textArray, $phoneNumber)
    {
        $level = count($textArray);
        $response = "";
        if ($level == 1){
        $response .= "CON Select Option\n";
        $response .= "1. Create Climate Challenge\n";
        $response .= "2. Join Climate Challenge\n";
        $response .= "3. My Climate Challenge\n";
        $response .= "4. Check Weather Forecast\n";
        echo "$response";
        }else if ($level == 2 && $textArray[1] == 1) {
            echo "CON Create a challenge name";
        }else if ($level == 2 && $textArray[1] == 2) {
        $response .= "CON Select challenge type\n";
        $response .= "1. Flooding\n";
        $response .= "2. Rising sea levels\n";
        $response .= "3. Water scarcity\n";
        $response .= "4. Intense drought\n";
        $response .= "5. Declining biodiversity\n";
        echo $response;
        }else if ($level == 2 && $textArray[1] == 3) {
            $response .= "CON Your challenges\n";
            include 'dbconnect.php';
            $user = "SELECT * FROM challenge WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $c_names = $row2["name"];
                    $sn+=1;
                    
                    $response .= "$sn. $c_names\n";
                }
                echo $response;
            }
            
        }else if ($level == 2 && $textArray[1] == 4) {
            echo "CON Enter Location";
        }else if ($level == 3 && $textArray[1] == 1) {
            echo "CON Challenge description";
        }else if ($level == 3 && $textArray[1] == 2) {
        $response .= "CON Select challenge\n";
        $response .= "1. Wash my hands\n";
        $response .= "2. Dirty my hands\n";
        echo $response;
        }else if ($level == 3 && $textArray[1] == 3) {
            echo "END Details for your challange would be sent to you via SMS";
        }else if ($level == 3 && $textArray[1] == 4) {
            
            
            $data="country=$textArray[2]";
            $curl = curl_init();
            $encode=json_encode($data);
            curl_setopt_array($curl, [
              CURLOPT_URL => "https://learncha.mybluemix.net/predict_current_weather",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_SSL_VERIFYPEER => false,
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $data,
              CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "Content-Type: application/x-www-form-urlencoded"
              ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                $resp = json_decode($response,true);
            //  var_dump ($resp);
            // echo $response;
              
              
             $cast = $resp['forecast']['narrative_512char'];
            echo "END The Wheather for $textArray[2] is:\n $cast";
            }
            
            
        }else if ($level == 4 && $textArray[1] == 1) {
        $response .= "CON Select challenge type\n";
        $response .= "1. Flooding\n";
        $response .= "2. Rising sea levels\n";
        $response .= "3. Water scarcity\n";
        $response .= "4. Intense drought\n";
        $response .= "5. Declining biodiversity\n";
        echo $response;
        }else if ($level == 4 && $textArray[1] == 2) {
            echo "END You have successfull joined the challenge";
        }else if ($level == 5 && $textArray[1] == 1) {
            $c_name=$textArray[2];
            $c_desc=$textArray[3];
            $date=time();
            
            if($textArray[4] == 1){
                $c_type="Flooding";
            }elseif($textArray[4] == 2){
                $c_type="Rising sea levels";
            }elseif($textArray[4] == 3){
                $c_type="Water scarcity";
            }elseif($textArray[4] == 4){
                $c_type="Intense drought";
            }elseif($textArray[4] == 5){
                $c_type="Declining biodiversity";
            }
            include 'dbconnect.php';
            $insert=mysqli_query($conn, "INSERT INTO challenge (phone,name,description,type,date)VALUES('".$phoneNumber."','".$c_name."','".$c_desc."','".$c_type."','".$date."')");
            if($insert == true){
                echo "END Challenge created";
            }else{
                echo "END Error";
            }
        }
}

    

    
    
    public function addCountryCodeToPhoneNumber($phone)
    {
        return Util::$COUNTRY_CODE . substr($phone, 1);
    }}
