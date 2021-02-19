<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helior Proteçao</title>
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
    <h1>Voce Esta Passando Por Uma Verificacao De IP Portanto Seu IP Esta Logado</h1>
    <div class="ip">
    <?php   $ip = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        $ip = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
        $url = file_get_contents("http://ip-api.com/json/".$ip."?fields=4202041");
$deixarbnt =  str_replace('"continent":', '➜ Your Continent: ', $url);
$deixarbnt1 = str_replace('country', '➜ Your Country: ', $deixarbnt);
$deixarbnt2 = str_replace('"', '', $deixarbnt1);
$deixarbnt3 = str_replace('regionName', '➜ Your Region: ', $deixarbnt2);
$deixarbnt4 = str_replace('city', '➜ Your City: ', $deixarbnt3);
$deixarbnt5 = str_replace('district', '➜ Your District: ', $deixarbnt4);
$deixarbnt6 = str_replace('}', ' ', $deixarbnt5);
$deixarbnt7 = str_replace('zip', '➜ Your Zip Code: ', $deixarbnt6);
$deixarbnt8 = str_replace('isp', '➜ Your Isp: ', $deixarbnt7);
$deixarbnt9 = str_replace('org', '➜ Your Org: ', $deixarbnt8);
$deixarbnt10 = str_replace('as', '➜ Your As: ', $deixarbnt9);
$deixarbnt11 = str_replace('asname', '➜ Your Asname: ', $deixarbnt10);
$deixarbnt12 = str_replace('reverse', '➜ Your Reverse IP: ', $deixarbnt11);
$deixarbnt13 =  str_replace(',', "<br>", $deixarbnt12);
$deixarbnt14 =  str_replace('{', "<br>", $deixarbnt13);
$deixarbnt15 =  str_replace(':', "", $deixarbnt14);
echo $deixarbnt15;
$iplogado = array(
    "IP" => "$ip",
    "Data" => date('d/m/y -> h:m:s'),
);
if($ip == '::1') {
    echo 'Ok Seu IP Esta Correto!';
    header("location: ippassou"); die('Não ignore meu cabeçalho...');
} else {
    echo '[!!ERROR!!] SEU IP NAO POSSUI ACESSO!<br>';
    echo 'UM RELATORIO COM O IP FOI ENVIADO AO HELIOR!<br>';
    echo "Seu IP: " . $iplogado["IP"] . "<br>Data E Hora: " . $iplogado["Data"];
}
?>
</div>
</center>
</body>
</html>