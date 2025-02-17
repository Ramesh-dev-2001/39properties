<?php
session_start();

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost') ? '/properties' : '';
include($_SERVER['DOCUMENT_ROOT'] . $host_name . '/master/phpmailer.php');
include('../../common/constants.php');

$type = $_REQUEST['type'];

switch ($type) {
    case "approve_status":
        if($_REQUEST) {
            updateAgentApproveStatus($_REQUEST);

            $agentArray = getAgents($_REQUEST['agentId']);
            $agentArray = $agentArray[0];

            if($agentArray['isApproved'] === '1') {
            $_REQUEST['email']    = $agentArray['email'];
            $_REQUEST['type']     = 'AGENT';
            $password             = '12345';
            $_REQUEST['password'] = md5($password);
            addAgentLogin($_REQUEST);
            }
            $agentEmail = $agentArray['email'];
            $firstName  = $agentArray['firstName'];
            $lastName   = $agentArray['lastName'];

            $body = 'Dear ' . $firstName . ',';
            

            if ($agentArray['isApproved'] === "1") {
                $data['subject'] = 'Your Agent Request Has Been Approved';
                $body .= '<p>We are pleased to inform you that your request to become an agent has been officially approved!</p>';
                $body .= '<p>You can log in using the following credentials:</p>';
                $body .= '<p><strong>Email:</strong> ' .$agentEmail. '<br>';
                $body .= '<strong>Password:</strong> ' .$password. '</p>';
                $body .= '<p>To access your account, please <a href="'.AGENT_URL.'">click here</a>.</p>';
                $body .= '<p>We appreciate your commitment and look forward to your valuable contributions as an agent.</p>';
            } else {
                $data['subject'] = 'Your Agent Request Has Been Denied';
                $body .= '<p>Thank you for your interest in becoming an agent. After careful consideration, we regret to inform you that your request has not been approved at this time.</p>';
                $body .= '<p>If you have any questions or would like to discuss your application further, please feel free to contact us.</p>';
                $body .= '<p>We encourage you to apply again in the future.</p>';
                
            }

            $body .= '<p>Support Team,<br>39properties.com</p>';
                    
            $data['body']       = $body;
            $data['to']         = $agentEmail;

            sendMail($data);                
            echo '1';
        }
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
 
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <info@39properties.com>' . "\r\n"; 

    mail($to,$subject,$content,$headers);

}
?>
