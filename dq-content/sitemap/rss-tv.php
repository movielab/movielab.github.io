<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dq-includes/dq-loader.php');
header("Content-Type: text/xml;charset=utf-8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
<channel>
<title><?php echo $options['webname'];?></title>
<atom:link href="<?php echo $options['url'];?>/rss.xml" rel="self" type="application/rss+xml" />
<link><?php echo $options['url'];?></link>
<description><?php echo esc_attr($options['webdescription']);?></description>
<lastBuildDate><?php echo date("r");?></lastBuildDate>
<?php 
$tanggal_cal = date( 'Y-m-d' );
$serial = unserialize( deqila_data_tv('tv','1','getAiringTodayTVShows') );if( is_array($serial['result']) ): {foreach ( $serial['result'] as $rss) {
    $date = date("r");
    $link = tv_single($rss['id'],$rss['title']); 
    echo '<item><title>'.esc_attr($rss['title']).'</title><link>'.$link.'</link><description>' .esc_attr($rss['overview']).'</description><guid>'.$link.'</guid><pubDate>'.$date.'</pubDate></item>';
} }
endif;
?>
<?php 
$tanggal_cal = date( 'Y-m-d' );
$serial = unserialize( deqila_data_tv('tv','2','getAiringTodayTVShows') );if( is_array($serial['result']) ): {foreach ( $serial['result'] as $rss) {
    $date = date("r");
    $link = tv_single($rss['id'],$rss['title']); 
    echo '<item><title>'.esc_attr($rss['title']).'</title><link>'.$link.'</link><description>' .esc_attr($rss['overview']).'</description><guid>'.$link.'</guid><pubDate>'.$date.'</pubDate></item>';
} }
endif;
?>
</channel>
</rss>