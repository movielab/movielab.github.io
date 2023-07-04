<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/dq-includes/dq-loader.php'); 
$hostname = $options['url'];
header("Content-Type: text/xml;charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="'.$hostname.'/dq-includes/sitemap.xsl"?>';
echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
echo '<sitemap><loc>'.$hostname.'</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
echo '<sitemap><loc>'.$hostname.'/sitemap-post.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
echo '<sitemap><loc>'.$hostname.'/sitemap-movie.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
echo '<sitemap><loc>'.$hostname.'/sitemap-tv.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
echo '<sitemap><loc>'.$hostname.'/sitemap-genres.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
echo '<sitemap><loc>'.$hostname.'/sitemap-person.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
echo '<sitemap><loc>'.$hostname.'/sitemap-other.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
if ( $options['_agc'] == 'true' ) {
echo '<sitemap><loc>'.$hostname.'/sitemap-misc.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
}
if ($handle = opendir($_SERVER['DOCUMENT_ROOT'] .'/sitemaps/')) {
        while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry != "sitemap.php" && $entry != "index.php") {
                        echo '<sitemap><loc>'.$hostname.'/'.$entry.'.xml</loc><lastmod>'.date('c', strtotime(date("r")) ).'</lastmod></sitemap>';
                }
        }
        closedir($handle);
}
?></sitemapindex>
