<?php
session_start();

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost') ? '/properties' : '';
include($_SERVER['DOCUMENT_ROOT'] . $host_name . '/common/constants.php');

require_once("phpmailer.php");

$type = $_REQUEST['type'];

switch ($type) {
    case 'auto':
        $jsonArray = []; 
        $results   = [];

        if($_REQUEST['term'] !='') {
            $cityDetails = getCityDetailsBySearch($_REQUEST);
            if (is_array($cityDetails) && count($cityDetails) > 0) { 
                foreach($cityDetails as $city)
                {  
                    $results[trim($city['cityName'])][] = trim($city['area']);
                }

                foreach($results as $city => $result)
                {   
                    array_push($jsonArray, array('label'=>trim($city),'value' =>  trim($city))); 
                    foreach($result as $area){    
                        array_push($jsonArray, array(
                            'label'=> $city.', '.$area, 
                            'value'=> $city.', '.$area)
                        );
                    }
                } 
            }
        }
        
        if(count($jsonArray) === 0 ) {
            array_push($jsonArray, array(
                'label'=> 'No Results', 
                'value'=> '')
            );
        }

        echo(json_encode($jsonArray));
        die;       
    break;
    
    case"update_property_views":
        $PropDetails = getProperty($_REQUEST['propertyId']);
        $PropDetails = $PropDetails[0];
        updatePropertyViews(array('views'=>($PropDetails['views']+1),'propertyId' => $_REQUEST['propertyId'])); 
    break;   

    case "add_customer":
        addCustomer($_REQUEST);
        $agentsArr      = getAgents($_REQUEST['agentId']);
        $agentsArr      = $agentsArr[0];
        
        $agentfirstName = $agentsArr['firstName'];
        $agentlastName  = $agentsArr['lastName'];
        $agentEmail     = $agentsArr['email'];

        $data['subject']    = 'Request From Customer';

        $body  = 'To '.$agentfirstName.',';
        $body .= '<p>You are getting Request from one of the our customer.</p>';
        $body .=  '<h4>--Customer Details--</h4>';
        $body .= '<p>Customer Name: ' . $_REQUEST['name'] . '</p>';
        $body .= '<p>Email: ' . $_REQUEST['email'] . '</p>';
        $body .= '<p>Mobile: ' . $_REQUEST['mobile'] . '</p>';
        $body .= '<p>Message: ' . $_REQUEST['message'] . '</p>';

        $body .=  '<p>Support Team,</p>';
        $body .=  '<p>39properties.com</p>';

        $data['body']       = $body;
        $data['to']         = $agentEmail;

        sendMail($data);                
        echo '1';

    break;
    case "add_user":
        $_REQUEST['authId']='1';
        $userId = addAuthUser($_REQUEST);
        print_r($userId);
        die;
        header('Location: ' . PROPERTY_URL . '/login.php');
        exit;
    break;
    default:
        echo json_encode(['error' => 'Invalid request type']);
        break;
}


function sendMail($data = array())
{
    $subject    = $data['subject'];
    $content    = $data['body'];
    $to         = $data['to'];
 
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <info@39properties.com>' . "\r\n"; 

    mail($to,$subject,$content,$headers);

}

?>