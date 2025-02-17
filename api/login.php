<?php
session_start(); 
$host_name = ($_SERVER['HTTP_HOST'] == 'localhost')?'/properties':'';
include($_SERVER['DOCUMENT_ROOT'].$host_name.'/common/constants.php');
    
$type = (isset($_REQUEST) && $_REQUEST['type']!='')?$_REQUEST['type']:'';

switch ($type) {
    case "login":
        $_REQUEST['type'] = 'MASTER';
        if(isset($_REQUEST) && $_REQUEST['email'] !=='' && $_REQUEST['password'] !== ''){
            $resultArr = getLoginAccount($_REQUEST);
            if (is_array($resultArr) && count($resultArr) >0) {
                $resultArr = $resultArr[0];
                $_SESSION['id']         = $resultArr['id'];
                $_SESSION['agentId']    = $resultArr['agentId'];
                $_SESSION['type']       = $resultArr['type'];
                $_SESSION['email']      = $resultArr['email'];

                //set cookie
                if(isset($_REQUEST['remember'])) {
                    setcookie("master_email",$_REQUEST['email'],time() + (10 * 365 * 24 * 60 * 60), '/');
                    setcookie("master_pass",$_REQUEST['password'],time() + (10 * 365 * 24 * 60 * 60), '/');
                } else{
                    unset($_COOKIE['master_email']); 
                    unset($_COOKIE['master_pass']); 
                    setcookie('master_email', '', -1, '/'); 
                    setcookie('master_pass', '', -1, '/'); 
                }

                header('Location: '.MASTER_URL.'/dashboard.php');
                exit;
                
            }
        }
        header('Location: '.MASTER_URL.'/?access=1');
        exit;
        
    break;
    case "agentLogin":
        $_REQUEST['type'] = 'AGENT';
        if(isset($_REQUEST) && $_REQUEST['email'] !=='' && $_REQUEST['password'] !== ''){
            $resultArr = getLoginAccount($_REQUEST);            
            if (is_array($resultArr) && count($resultArr) >0) {
                $resultArr = $resultArr[0];
                $_SESSION['ID']     = $resultArr['id'];
                $_SESSION['AGENTID']   = $resultArr['agentId'];
                $_SESSION['TYPE']   = $resultArr['type'];
                $_SESSION['EMAIL']  = $resultArr['email'];

                  //set cookie
                  if(isset($_REQUEST['remember'])) {
                    setcookie("agent_email",$_REQUEST['email'],time() + (10 * 365 * 24 * 60 * 60), '/');
                    setcookie("agent_pass",$_REQUEST['password'],time() + (10 * 365 * 24 * 60 * 60), '/');
                } else{
                    unset($_COOKIE['agent_email']); 
                    unset($_COOKIE['agent_pass']); 
                    setcookie('agent_email', '', -1, '/'); 
                    setcookie('agent_pass', '', -1, '/'); 
                }
                
                header('Location: '.AGENT_URL.'/dashboard.php');
                exit;
            }
        }
        header('Location: '.AGENT_URL.'/?access=1');
        exit;
        
    break;
    case "change_password":
        $currentPwd = md5($_REQUEST['currentPwd']);
        $newPwd = $_REQUEST['newPwd'];
        $confirmPwd = $_REQUEST['confirmPwd'];
        $loginId = $_REQUEST['loginId'];
        
        if ($newPwd == $confirmPwd) {
            $getloginAcc = getLoginAcc($loginId);
            $getloginAcc = $getloginAcc[0];
            $oldPwd = $getloginAcc['password'];
            if ($currentPwd == $oldPwd) {
                updatePwd($newPwd, $loginId);
                $_SESSION['error'] = 'Password update succesfully.';
            } else {
                $_SESSION['error'] = 'Current password is incorrect.';
            }
        } else {
            $_SESSION['error'] = 'New password and confirm password do not match.';
        }
        
        header('Location: ' . AGENT_URL . '/views/changePassword/changePassword.php');
        exit;
    break;
    case "logout":
        unset($_SESSION['id']);
        echo '1';
        exit;
    break;

    case "agentLogout":
        unset($_SESSION['ID']);
        echo '1';
        exit;
    break;
     
    default:
       $defalutType= $_REQUEST['MASTER'];
       if($defalutType == 'MASTER'){
        header('Location: '.MASTER_URL.'/?access=1');
       }else{
        header('Location: '.AGENT_URL.'/?access=1');
       }
    exit;
}
?>
