<?php
echo "<script>parent.document.getElementById('_out').innerHTML = '";

include_once "smsc_api.php";

if (isset($_POST["sendsms"])) {
    $r = send_sms($_POST["register_phone"], ok_code($_POST["register_phone"]));

    if ($r[1] > 0)
        echo "Код подтверждения отправлен на номер ".$_POST["register_phone"];
}

if (isset($_POST["ok"])) {
    $oc = ok_code($_POST["register_phone"]);

    if ($oc == $_POST["code"])
        echo "Номер активирован";
    else
        echo "Неверный код подтверждения";
}

echo "'</script>";

function ok_code($s) {
    return hexdec(substr(md5($s."<секретная строка>"), 7, 5));
}