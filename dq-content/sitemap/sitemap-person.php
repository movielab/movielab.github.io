<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/dq-includes/dq-loader.php');
$hostname = $options['url'];
header("Content-Type: text/xml;charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="'.$hostname.'/dq-includes/sitemap.xsl"?>';
?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url><loc><?php echo $hostname;?>/sitemap.xml</loc><changefreq>daily</changefreq><priority>1.0</priority></url>
<?php 
$Movies = unserialize( deqila_data_persons('persons',1, 'getPopularPersons') );if( is_array($Movies['result']) ):foreach ( (array) $Movies['result'] as $sitemap ) {
    $date = date('Y-m-d', strtotime( 'r' ));
    $link = sitemap_person_seo($sitemap['id'] , $sitemap['title'] );
     echo '<url><loc>'.$link.'</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
} 
endif;
$Movies = unserialize( deqila_data_persons('persons',2, 'getPopularPersons') );if( is_array($Movies['result']) ):foreach ( (array) $Movies['result'] as $sitemap ) {
    $date = date('Y-m-d', strtotime( 'r' ));
    $link = sitemap_person_seo($sitemap['id'] , $sitemap['title'] );
     echo '<url><loc>'.$link.'</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
} 
endif;
$Movies = unserialize( deqila_data_persons('persons',3, 'getPopularPersons') );if( is_array($Movies['result']) ):foreach ( (array) $Movies['result'] as $sitemap ) {
    $date = date('Y-m-d', strtotime( 'r' ));
    $link = sitemap_person_seo($sitemap['id'] , $sitemap['title'] );
     echo '<url><loc>'.$link.'</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
} 
endif;
$Movies = unserialize( deqila_data_persons('persons',4, 'getPopularPersons') );if( is_array($Movies['result']) ):foreach ( (array) $Movies['result'] as $sitemap ) {
    $date = date('Y-m-d', strtotime( 'r' ));
    $link = sitemap_person_seo($sitemap['id'] , $sitemap['title'] );
     echo '<url><loc>'.$link.'</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
} 
endif;
$Movies = unserialize( deqila_data_persons('persons',5, 'getPopularPersons') );if( is_array($Movies['result']) ):foreach ( (array) $Movies['result'] as $sitemap ) {
    $date = date('Y-m-d', strtotime( 'r' ));
    $link = sitemap_person_seo($sitemap['id'] , $sitemap['title'] );
     echo '<url><loc>'.$link.'</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
} 
endif;
?>
</urlset>