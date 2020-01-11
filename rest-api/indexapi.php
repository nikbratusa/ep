<?php

require_once '../model/ShoeDB.php';

header('Content-Type: application/json');

$http_method = filter_input(INPUT_SERVER, "REQUEST_METHOD", FILTER_SANITIZE_SPECIAL_CHARS);
$server_addr = filter_input(INPUT_SERVER, "SERVER_ADDR", FILTER_SANITIZE_SPECIAL_CHARS);
#$server_addr = "10.0.2.2"; // kadar dostopamo preko Android emulatorja
$php_self = filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_SPECIAL_CHARS);
$script_uri = substr($php_self, 0, strripos($php_self, "/"));
$request = filter_input(INPUT_GET, "request", FILTER_SANITIZE_SPECIAL_CHARS);

$rules = array(
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'brand' => FILTER_SANITIZE_SPECIAL_CHARS,
    'size' => FILTER_SANITIZE_SPECIAL_CHARS,
    'price' => FILTER_VALIDATE_FLOAT,
    'id' => array(
        'filter' => FILTER_VALIDATE_INT,
        'options' => array('min_range' => 1)
    ),
);

function returnError($code, $message) {
    http_response_code($code);
    echo json_encode($message);
    exit();
}

if ($request != null) {
    $path = explode("/", $request);
} else {
    returnError(400, "Missing request path.");
}

if (isset($path[0])) {
    $resource = $path[0];
} else {
    returnError(400, "Missing resource.");
}

if (isset($path[1])) {
    $param = $path[1];
} else {
    $param = null;
}

switch ($resource) {
    case "shoes":
        if ($http_method == "GET" && $param == null) {
            // getAllShoes
            $shoes = ShoeDB::getAllShoes();
            foreach ($shoes as $_ => &$shoe) {
                $shoe["uri"] = "http://" . $server_addr .
                        $script_uri . "/shoes/" . $shoe["id"];
            }

            echo json_encode($shoes);
        } else if ($http_method == "GET" && $param != null) {
            // get
            $shoes = ShoeDB::getShoe(["id" => $param]);

            if ($shoes != null) {
                $shoe = $shoes[0];
                $shoe["uri"] = "http://" . $server_addr . $script_uri . "/shoes/" . $shoe["id"];
                echo json_encode($shoe);
            } else {
                returnError(404, "No entry for id: " . $param);
            }
        } else {
            // error
            echo returnError(404, "Unknown request: [$http_method $resource]");
        }
        break;

    default:
        returnError(404, "Invalid resource: " . $resource);
        break;
}

