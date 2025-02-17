<?php
session_start();

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost') ? '/properties' : '';
include($_SERVER['DOCUMENT_ROOT'] . $host_name . '/common/constants.php');

$type = $_REQUEST['type'];

switch ($type) {
    case "add_agent":
        addAgent($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/agents/agentslist.php');
        exit;

    break;
    case "update_agent":
            updateAgent($_REQUEST);
            header('Location: ' . MASTER_URL . '/views/agents/agentslist.php');
        exit;
    break;
    case 'get_states':
        $countryId = isset($_REQUEST['countryId']) ? intval($_REQUEST['countryId']) : 0;
        if ($countryId > 0) {
            $states = getStates($countryId);
            echo json_encode($states);
        } else {
            echo json_encode([]);
        }
        exit;
    break;
    case "change_status":   
        if($_REQUEST) {
           updateAgentStatus($_REQUEST);
        }
        echo '1';
        exit;
    break;       
    default:
        echo json_encode(['error' => 'Invalid request type']);
        break;
}
?>
