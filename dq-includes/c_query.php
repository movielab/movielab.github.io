<?php
/**
* @author deqila.id
* @copyright 2020
*/
function debug($string){
        if ( !empty($string) ) {
                echo '<pre>'; print_r($string); echo '</pre>';
        }
}
function site_path(){
        $hostname = $_SERVER['HTTP_HOST'];
        return $hostname;
}
function is_home(){
        $host = site_url().'/';
        $current = canonical();
        if( $current == $host ){
                return true;
        } else {
                return false;
        }
}
function site_url() {
        return canonical(false, true);
}
function get_domain($url) {
    	$pieces = parse_url($url);
    	$domain = isset($pieces['host']) ? $pieces['host'] : '';
    	if ($domain) {
    	    	$web = str_replace('www.','',$domain);
    	    	return $web;
    	}
    	return false;
}
function recent_posts($limit = 9) {
	$path = $_SERVER['DOCUMENT_ROOT'] .'/cache/single/';
        if ( !file_exists( $path ) ) {
		mkdir( $path, 0755, true );
	}
        if ($handle = opendir($path)) {
                while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                                $daftar[] = $entry;
                        }
                }
	}
        if(is_array($daftar)):
                $i = 0;
                foreach ($daftar as $key => $val) {
                        if ( file_exists( $path . $val ) ) {
                                $data = @file_get_contents( $path . $val ); 
                                $unserialize[] = unserialize( $data );
                                //$uhoh['id']      = $unserialize['id'];
                                //$uhoh['slug']    = $unserialize['slug'];
                                //$uhoh['title']   = $unserialize['title'];
                                //$uhoh['pubdate'] = $unserialize['pubdate'];
                                //$damn[] = $uhoh;
	                }
                $i++;
                if($i == $limit) break;
                }
        endif;
        closedir($handle);

        if($unserialize != ''):
                return $unserialize;
        else:
                return false;

        endif;
}
function recent_search( $limit = 10 ) {
	$path = $_SERVER['DOCUMENT_ROOT'] . '/dq-content/keywords/items0.txt';
	if ( file_exists( $path ) ) {
		$data	= @file_get_contents( $path );
                $result = explode(",", $data );

                $res = array_slice($result, -$limit, $limit, true);
                if($res != ''):
			foreach($res as $hasil) {
                        	if ($hasil != '') {
                                	$recepl  = explode('|',$hasil);
                                	$a['title'] = $recepl[0];
                                	$a['type']  = $recepl[1];
                                	$output[] = $a;
                        	}
                        }
		endif;

        	if($output != ''):
                	return $output;
        	else:
                	$a['title'] = 'hello world';
                	$output[] = $a;
                	return $output;
        	endif;

	}
}
function inject_sitemap( $limit = 500, $pin = 'default', $tipe = '' ) {
	$path = $_SERVER['DOCUMENT_ROOT'] . '/dq-content/keywords/'.$pin.'.txt';
	if ( file_exists( $path ) ) {
		$data	= @file_get_contents( $path );
                $result = explode(PHP_EOL, $data );

                //$res = array_slice($result, -$limit, $limit, true);
                if($result != ''):
			foreach($result as $hasil) {
                        	if ($hasil != '') {
                                	$a['title'] = $hasil;
                                	$a['type'] = $tipe;
                                	$output[] = $a;
                        	}
                        }
                        return $output;
		endif;

	}
}
if( isset($_GET['s']) ) {
        if ( get_search_query() != "" ) {
	        if ( $options['_agc'] == 'true' ) {
                        $titlesq = strtolower( get_search_query() );
                        if( $options['filter_query'] == 'true' ) {
                                if ( bad_word( $titlesq ) !== false ) {
                                        header("Location: /");
                                        exit;
                                }
                        }
                        if ( str_word_count($titlesq) > 1 ) {
				save_word($titlesq, $_GET['q']);
	                }
	        }
        }
}
function save_word($query,$type = "") {
        if( !empty($type) ) {
                $type = '|' .$type;
	}
        $query = strtolower( $query ) . $type;
        //$query = strtolower( $query );
	$f     = 0;
        $koma  = ",";
        $root  = $_SERVER['DOCUMENT_ROOT'] . '/dq-content/keywords/'; 
        $path  = $root.'items'.$f.'.txt';
        $fp    = fopen($root.'items'.$f.'.txt', 'r');
        $fgets = fgets($fp);
        fclose($fp);

        $data  = explode($koma, $fgets);
	if( file_exists($path) ) {
		if(!empty( $query )) {
			if (in_array($query, $data)) {
				$tulis = implode($koma, $data);
			} 
        		else 
        		{
                                for ($i = 1; $i <= 1000; $i++) {
					$tulis .= $data[$i].$koma;
          		        }
                                $tulis .= $query;
        		}
			$masuk = fopen($path, 'w');
			fwrite($masuk,$tulis);
			fclose($masuk);

		}
	}
}
