<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>localhost protection by Helior</title>
    <!--Cobe By Helior-->
<style>
body {
    background-color:black;
}
h1 {
    color:aqua;
    font-family: 'Courier';
}
.ip {
    color:aqua;
    font-family: 'Courier';
}
</style>
</head>
<body>
<center>
    <h1>You are going through an IP check so your IP is logged</h1>
    <div class="ip">
    <?php   $ip = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        $ip = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
$iplogado = array(
    "IP" => "$ip",
    "Data" => date('d/m/y -> h:m:s'),
);
if($ip == '::1') { // ::1 is yout localhost ip
    echo 'Ok Your IP Is Correct!';
    header("location: your archive or folder here"); // Enter the name of your folder or file that will be accessed if the ip is released 
} else {
    echo '[!!ERROR!!] YOUR IP DOES NOT HAVE ACCESS!<br>';
    echo "Your  IP: " . $iplogado["IP"] . "<br>Date AND Hour: " . $iplogado["Data"];
}
?>
</div>
</center>
</body>
</html>
