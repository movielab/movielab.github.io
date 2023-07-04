<?php error_reporting(E_ALL ^ E_NOTICE); 
if ( $countryCode == "US" ) {
    $uri_affilate = 'https://deqila.id/';
} elseif ( $countryCode == "AU" || $countryCode == "NL" || $countryCode == "FR" ) {
    $uri_affilate = 'https://deqila.id/';
} elseif ( $countryCode == "DE" || $countryCode == "ES" ) {
    $uri_affilate = 'https://deqila.id/';
} elseif ( $countryCode == "CA" ) {
    $uri_affilate = 'https://deqila.id/';
} elseif ( $countryCode == "ID" ) {
    $uri_affilate = 'https://deqila.id/';
} else {
    $uri_affilate = 'https://deqila.id/';
}
?>
<html>
<head>
<title>Redirecting to Secure Page</title>
<meta http-equiv="refresh" content="0;url=<?php echo $uri_affilate ;?>&sub_id=<?php echo $_GET['sub_id'];?>&title=<?php echo $_GET['title'];?>&movie=<?php echo $_GET['movie'];?>">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>
body {background:#000;}
#load {position:absolute;width:600px;height:36px;left:50%;top:40%;margin-left:-300px;overflow:visible;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;}
#load div {position:absolute;width:20px;height:36px;opacity:0;font-family:Helvetica, Arial, sans-serif;animation:move 2s linear infinite;-o-animation:move 2s linear infinite;-moz-animation:move 2s linear infinite;-webkit-animation:move 2s linear infinite;transform:rotate(180deg);-o-transform:rotate(180deg);-moz-transform:rotate(180deg);-webkit-transform:rotate(180deg);color:#35C4F0;}
#load div:nth-child(2) {animation-delay:0.2s;-o-animation-delay:0.2s;-moz-animation-delay:0.2s;-webkit-animation-delay:0.2s;}
#load div:nth-child(3) {animation-delay:0.4s;-o-animation-delay:0.4s;-webkit-animation-delay:0.4s;-webkit-animation-delay:0.4s;}
#load div:nth-child(4) {animation-delay:0.6s;-o-animation-delay:0.6s;-moz-animation-delay:0.6s;-webkit-animation-delay:0.6s;}
#load div:nth-child(5) {animation-delay:0.8s;-o-animation-delay:0.8s;-moz-animation-delay:0.8s;-webkit-animation-delay:0.8s;}
#load div:nth-child(6) {animation-delay:1s;-o-animation-delay:1s;-moz-animation-delay:1s;-webkit-animation-delay:1s;}
#load div:nth-child(7) {animation-delay:1.2s;-o-animation-delay:1.2s;-moz-animation-delay:1.2s;-webkit-animation-delay:1.2s;}
@keyframes move {0% {left:0;opacity:0;}35% {left: 41%; -moz-transform:rotate(0deg);-webkit-transform:rotate(0deg);-o-transform:rotate(0deg);transform:rotate(0deg);opacity:1;}65% {left:59%; -moz-transform:rotate(0deg); -webkit-transform:rotate(0deg); -o-transform:rotate(0deg);transform:rotate(0deg); opacity:1;}100% {left:100%; -moz-transform:rotate(-180deg); -webkit-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg);opacity:0;}}
@-moz-keyframes move {0% {left:0; opacity:0;}35% {left:41%; -moz-transform:rotate(0deg); transform:rotate(0deg);opacity:1;}65% {left:59%; -moz-transform:rotate(0deg); transform:rotate(0deg);opacity:1;}100% {left:100%; -moz-transform:rotate(-180deg); transform:rotate(-180deg);opacity:0;}}
@-webkit-keyframes move {0% {left:0; opacity:0;}35% {left:41%; -webkit-transform:rotate(0deg); transform:rotate(0deg); opacity:1;}65% {left:59%; -webkit-transform:rotate(0deg); transform:rotate(0deg); opacity:1;}100% {left:100%;-webkit-transform:rotate(-180deg); transform:rotate(-180deg); opacity:0;}}
@-o-keyframes move {0% {left:0; opacity:0;}35% {left:41%; -o-transform:rotate(0deg); transform:rotate(0deg); opacity:1;}65% {left:59%; -o-transform:rotate(0deg); transform:rotate(0deg); opacity:1;}100% {left:100%; -o-transform:rotate(-180deg); transform:rotate(-180deg); opacity:0;}}
</style>
</head>
<body>
<div id="load" class="centered"><div>G</div><div>N</div><div>I</div><div>D</div><div>A</div><div>O</div><div>L</div></div>
<!-- Histats.comSTART(aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];_Hasync.push(['Histats.start', '1,<?php echo get_webinfo('HistatsID') ;?>,4,0,0,0,00010000']);_Hasync.push(['Histats.fasi', '1']);_Hasync.push(['Histats.track_hits', '']);(function() {var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;hs.src = ('//s10.histats.com/js15_as.js');(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);})();</script><noscript><a href="/" target="_blank"><imgsrc="//sstatic1.histats.com/0.gif?<?php echo get_webinfo('HistatsID') ;?>&101" alt="free page hit counter" border="0"></a></noscript>
<!-- Histats.comEND-->
</body>
</html>