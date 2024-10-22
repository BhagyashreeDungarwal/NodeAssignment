// /common/express_api.php
<?php
$url = 'http://localhost:3000/api'; // Replace with your Express API URL
$data = array('key' => 'value');

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo 'Error calling Express API';
}

echo $result;
?>
