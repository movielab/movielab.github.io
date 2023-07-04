<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/dq-includes/dq-loader.php');
$hostname = $options['url'];
header("Content-Type: text/xml;charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="'.$hostname.'/dq-includes/sitemap.xsl"?>';
?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url><loc><?php echo $hostname;?>/sitemap.xml</loc><changefreq>daily</changefreq><priority>1.0</priority></url>
<?php 
    $date = date('Y-m-d', strtotime( 'r' ));
    $link = get_webinfo('url');
     echo '<url><loc>'.$link.'/genres/action/28</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/adventure/12</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/action-adventure/10759</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/animation/16</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/comedy/35</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/crime/80</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/documentary/99</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/drama/18</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/family/10751</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/fantasy/14</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/history/36</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/horror/27</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/kids/10762</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/music/10402</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/mystery/9648</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/news/10763</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/romance/10749</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/reality/10764</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/science-fiction/878</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/sci-fi-fantasy/10765</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/soap/10766</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/talk/10767</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/tv-movie/10770</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/thriller/53</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/war/10752</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/war-politics/10768</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
     echo '<url><loc>'.$link.'/genres/western/37</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
?>
</urlset>