<?php

$fp = fsockopen("localhost", 80, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>HTTP<br /></p>\n";
} else {
    echo "<p style='color:green'>HTTP <a href='http://" . $_SERVER['HTTP_HOST'] . "'>GO</a><br /></p>\n";
    fclose($fp);
}
$fp = fsockopen("localhost", 2368, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>Ghost<br /></p>\n";
} else {
    echo "<p style='color:green'>Ghost <a href='http://" . $_SERVER['HTTP_HOST'] . ":2368'>GO</a><br /></p>\n";
    fclose($fp);
}
$fp = fsockopen("localhost", 10000, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>WEBMIN<br /></p>\n";
} else {
    echo "<p style='color:green'>WEBMIN <a href='https://" . $_SERVER['HTTP_HOST'] . ":10000'>GO</a><br /></p>\n";
    fclose($fp);
}
$fp = fsockopen("localhost", 4200, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>WEB CONSOLE<br /></p>\n";
} else {
    echo "<p style='color:green'>WEB CONSOLE <a href='http://" . $_SERVER['HTTP_HOST'] . ":4200'>GO</a><br /></p>\n";
    fclose($fp);
}
$fp = fsockopen("localhost", 9091, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>TORRENT<br /></p>\n";
} else {
    echo "<p style='color:green'>TORRENT <a href='http://" . $_SERVER['HTTP_HOST'] . ":9091'>GO</a><br /></p>\n";
    fclose($fp);
}
$fp = fsockopen("localhost", 9090, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>CAMERA<br /></p>\n";
} else {
    echo "<p style='color:green'>CAMERA <a href='http://" . $_SERVER['HTTP_HOST'] . ":9090/javascript_simple.html'>GO</a><br /></p>\n";
    fclose($fp);
}
$fp = fsockopen("localhost", 8200, $errno, $errstr, 3);
if (!$fp) {
    echo "<p style='color:red'>DLNA<br /></p>\n";
} else {
    echo "<p style='color:green'>DLNA <a href='http://" . $_SERVER['HTTP_HOST'] . ":8200'>GO</a><br /></p>\n";
    fclose($fp);
}
// http://checkip.dyndns.com/
$html = file_get_contents('http://checkip.dyndns.com/');
if ($html !== false) {
    $start = "<html><head><title>Current IP Check</title></head><body>Current IP Address: ";
    $end   = "</body></html>";
    $html  = str_replace($start, "", $html);
    $html  = str_replace($end, "", $html);
    $html  = str_replace(" ", "", $html);
    echo "<br /><p style='color:black'>EXTERNAL IP: ".$html."<br /></p>";
    $fp = fsockopen($html, 80, $errno, $errstr, 3);
    if (!$fp) {
        echo "<p style='color:red'>HTTP<br /></p>\n";
    } else {
        echo "<p style='color:green'>HTTP <a href='http://".$html."'>GO</a><br /></p>\n";
        fclose($fp);
    }
    $fp = fsockopen($html, 2368, $errno, $errstr, 3);
    if (!$fp) {
        echo "<p style='color:red'>Ghost<br /></p>\n";
    } else {
        echo "<p style='color:green'>Ghost <a href='http://".$html.":2368'>GO</a><br /></p>\n";
        fclose($fp);
    }	
    $fp = fsockopen($html, 10000, $errno, $errstr, 3);
    if (!$fp) {
        echo "<p style='color:red'>WEBMIN<br /></p>\n";
    } else {
        echo "<p style='color:green'>WEBMIN <a href='https://".$html.":10000'>GO</a><br /></p>\n";
        fclose($fp);
    }
    $fp = fsockopen($html, 4200, $errno, $errstr, 3);
    if (!$fp) {
        echo "<p style='color:red'>WEB CONSOLE<br /></p>\n";
    } else {
        echo "<p style='color:green'>WEB CONSOLE <a href='http://".$html.":4200'>GO</a><br /></p>\n";
        fclose($fp);
    }
    $fp = fsockopen($html, 9091, $errno, $errstr, 3);
    if (!$fp) {
        echo "<p style='color:red'>TORRENT<br /></p>\n";
    } else {
        echo "<p style='color:green'>TORRENT <a href='http://".$html.":9091'>GO</a><br /></p>\n";
        fclose($fp);
    }
    $fp = fsockopen($html, 9090, $errno, $errstr, 3);
    if (!$fp) {
        echo "<p style='color:red'>CAMERA<br /></p>\n";
    } else {
        echo "<p style='color:green'>CAMERA <a href='http://".$html.":9090/javascript_simple.html'>GO</a><br /></p>\n";
        fclose($fp);
    }
    $fp = fsockopen($html, 8200, $errno, $errstr, 3);
    if (!$fp) {
	 echo "<p style='color:red'>DLNA<br /></p>\n";
    } else {
	 echo "<p style='color:green'>DLNA <a href='http://".$html.":8200'>GO</a><br /></p>\n";
	 fclose($fp);
    }    
} else {
    echo "<br /><br /><p style='color:black'>NO EXTERNAL ADDRESS</p>";
}
?>