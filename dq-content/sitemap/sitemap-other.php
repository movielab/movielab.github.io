<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/dq-includes/dq-loader.php');
if(isset($_GET['type'])) { $type = $_GET['type'];} else { $type = 'other'; }
$hostname = $options['url'];
header("Content-Type: text/xml;charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="'.$hostname.'/dq-includes/sitemap.xsl"?>';
?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url><loc><?php echo $hostname;?>/sitemap.xml</loc><changefreq>daily</changefreq><priority>1.0</priority></url>
<?php
if ( $type == 'other' ) {
        $hostname = $options['url'];
        if ($handle = opendir($_SERVER['DOCUMENT_ROOT'] .'/dq-content/keywords/')) {
                while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != ".." && $entry != "sitemap.php" && $entry != "error_log" && $entry != "index.php" && $entry != "items0.txt" && $entry != "default.txt") {
                                $sitemap = str_replace('txt','xml',$entry);
                                $hold[] = $sitemap;
                        }
                }
                if ($hold) {
                        natsort($hold);
                        if(is_array($hold)):
                                foreach ($hold as $key => $val) {
                                        echo '<url><loc>'.$hostname.'/'.$val.' </loc><lastmod>'.date('Y-m-d', strtotime(date("r")) ).'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
                                }
                        endif;
                }
                closedir($handle);
        }
}else{
if (inject_sitemap('1', 'sitemap-'.$type ) ) {
        foreach(inject_sitemap('1000', 'sitemap-'.$type, '') as $sitemap) {
                $date = date('Y-m-d', strtotime( date('r') ));
                $link = sitemap_seo($sitemap['title'], $sitemap['type'] );  
                echo '<url><loc>'.$link.'</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
        }
}
}
?>
</urlset>