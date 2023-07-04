<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="https://gmpg.org/xfn/11">
<meta name="theme-color" content="#007AFF">
<title><?php dq_title();?></title>
<meta name="robots" content="index,follow"/>
<meta http-equiv="content-language" content="en"/>
<meta name="google-site-verification" content="<?php echo get_webinfo('google_code');?>" />
<meta name="yandex-verification" content="<?php echo get_webinfo('yandex_code');?>" />
<meta name="msvalidate.01" content="<?php echo get_webinfo('bing_code');?>" />
<meta itemprop="description" name="description" content="<?php dq_description();?>"/>
<meta name="keywords" content="<?php dq_keywords();?>"/>
<meta name="author" content="<?php echo $_SERVER['SERVER_NAME'];?>"/>
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
<link rel="icon" type="image/png" href="<?php echo get_webinfo('theme_url') ;?>img/favicon.png"/>
<link rel="canonical" href="<?php echo canonical();?>"/>
<meta property="og:title" content="<?php dq_title();?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo canonical();?>"/>
<meta property="og:image:alt" content="<?php dq_title();?>"/>
<meta property="og:description" content="<?php dq_description();?>"/>
<meta property="og:site_name" content="<?php dq_title();?>"/>
<meta property="og:video" content="<?php echo canonical();?>"/>
<meta property="og:image:width" content="650"/>
<meta property="og:image:height" content="350"/>
<meta property="og:image:type" content="image/jpeg"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:description" content="<?php dq_description();?>"/>
<meta name="twitter:title" content="<?php dq_title();?>"/>
<meta name="twitter:site" content="<?php dq_title();?>"/>
<meta name="twitter:url" content="<?php echo canonical();?>"/>
<script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","url":"<?php echo canonical();?>","sameAs":["https://www.facebook.com/<?php echo $_SERVER['SERVER_NAME'];?>","https://www.instagram.com/<?php echo $_SERVER['SERVER_NAME'];?>/","https://twitter.com/<?php echo $_SERVER['SERVER_NAME'];?>"],"name":"<?php dq_title();?>","title":"<?php dq_title();?>","logo":"<?php echo get_webinfo('theme_url') ;?>img/logo.png"}</script>