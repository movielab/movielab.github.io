<?php
if ( $options['auto_language'] == 'true'){ include(ABSPATH . THMPATH . $options['theme_name'] . '/lang.php');}else{ if ( empty( isset($_GET['language'] ) ) ) { $negara = $options['bahasa'];}else{ $negara = $_GET['language'];} }
$movie_qualities = array("<span class='mli-quality blu'>BLU</span>","<span class='mli-quality hd'>HD</span>",);function randomWord($input){shuffle($input);return $input[0];};
if( !empty( $_GET['sub_id'] ) ){ $mysubid = $_GET['sub_id'];}else{ $mysubid = get_webinfo('sub_id');}
if( get_webinfo('use_sub_id') == 'true' ){ $mylinksub = '&sub_id='.$mysubid;}
include(ABSPATH . THMPATH . $options['theme_name'] . '/blockid.php');
$banned_ids = $bad_id;
if( isset($_GET['s']) ) {
        if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; }
        if ( empty($_GET['s']) ) { header('Location: /'); }
	    $arraytmdb = explode(",", $options['Tmdb_api']);
        $apikey = $arraytmdb[array_rand($arraytmdb)];
        $tmdb = new TMDB($apikey, $negara, true);
	    if ( !empty($apikey) ) {
	            $Movie = $tmdb->searchMovie( limit_word( get_search_query() ) ,$page);
		        if ( $Movie['results'] ) {
                        $output1 = array();
                        foreach((array)$Movie['results'] as $row) {
				            $item['id'] =  $row['id'];
				            if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
				            if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($apikey, 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                        	if ($row['original_title']) {
                                $item['original_title'] = $row['original_title'];
                            } else {
                                $item['original_title'] = $row['title'];
                            }
                            if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
                        	if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->searchMovie( limit_word( get_search_query() ) ,$page);
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
                            if($row['vote_average'] > 0) {
	                            $item['get_rating'] =  $row['vote_average'];
	                            $item['emp_rating'] =  11 - $item['get_rating'];
                            } else {
	                            $item['emp_rating'] = 10;
                            }
		         	        $output1['result'][] = $item;
			            }
		                $output1['total_results'][] = $Movie['total_results'];
		        }
		        $TVShow = $tmdb->searchTVShow(limit_word( get_search_query() ),$page);
		        if ( $TVShow['results'] ) {
                        $output2 = array();
                        foreach((array)$TVShow['results'] as $row) {
	                    $item['id'] =  $row['id'];
	                    if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
	                    if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($apikey, 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                        	if ($row['original_name']) {
                                $item['original_title'] = $row['original_name'];
                            } else {
                                $item['original_title'] = $row['name'];
                            }
                        if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
                        if ($row['poster_path']) {
                            $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        }else{
                            $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        }
                        if ($row['backdrop_path']) {
                            $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        }else{
                            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        }
                        if ($row['id']!=null) {
                            $rowwz = $tmdb->getTVShow( $row['id'] );
                            $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                        } 
                        if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->searchTVShow( limit_word( get_search_query() ) ,$page);
                                    $item['overview'] =  $rowww['overview'];
                            }
	                    $item['release_date'] =  $row['first_air_date'];
	                    $item['popularity'] =  $row['popularity'];
	                    $item['vote_average'] =  $row['vote_average'];
	                    $item['vote_count'] =  $row['vote_count'];
	                    if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	    $output2['result'][] = $item;
		        }
		                $output2['total_results'][] = $TVShow['total_results'];
                }
                $Person = $tmdb->searchPerson(limit_word( get_search_query() ),$page);
		        if ( $Person['results'] ) {
                        $output3 = array();
                        foreach((array)$Person['results'] as $row) {
	                        $item['id'] =  $row['id'];
                            if ($row['name']) {
                            $item['title'] = $row['name'];
                            } else {
                            $item['title'] = 'Unknown';
                            }
                            if ($row['profile_path']) {
                            $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['profile_path'];
                            }else{
                            $item['poster_path'] = get_webinfo('theme_url').'img/no-profile.jpg';
                            }
            	            $item['release_date'] =  $row['release_date'];
            	            $item['popularity'] =  $row['popularity'];
            	            $item['vote_average'] =  $row['vote_average'];
            	            $item['vote_count'] =  $row['vote_count'];
		        	        $output3['result'][] = $item;
		                }
		                $output3['total_results'][] = $Person['total_results'];
               }
            }else{
                $url = 'https://www.themoviedb.org/search/movie?query=' . limit_word( get_search_query() );
                $xpath = deqila_xpath($url);
                if ( $xpath->query("//div[@class='results']/div[@class='item poster card']")->length ) {
                	foreach ( $xpath->query("//div[@class='results']/div[@class='item poster card']") as $sect ) {
                	        $item['id'] = str_replace('/movie/','',$xpath->query(".//p[@class='flex']/a/@href",$sect)->item(0)->nodeValue);
                	        $item['title'] = trim($xpath->query(".//p[@class='flex']/a",$sect)->item(0)->nodeValue);
                	        if ($xpath->query(".//div[@class='image_content']/a/img/@data-src",$sect)->item(0)) {
                	                $item['poster_path'] = $xpath->query(".//div[@class='image_content']/a/img/@data-src",$sect)->item(0)->nodeValue;
                	        }else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                	        $item['release_date'] = trim($xpath->query(".//span[@class='release_date']",$sect)->item(0)->nodeValue);
                	        $output1['result'][] = $item;
                        }
                }
                	        
	    }
	    if ( empty( $_GET['page'] ) ) { 
                $page = 1;
        }else{ 
                $page = $_GET['page'];
                $hal = ' - ' .$page. ' ';
        }
        $hack_title = $options['title_search_before'] . ucwords(get_search_query()) . $options['title_search_after'] .' | '. $options['webname'];
        $titulo = __('utilities','search') . ' "' . ucwords(get_search_query()) . '"'.$hal;
        $hack_description = $hack_title . ' - '. get_search_query() . ' '. date('r'). ' | ' . $options['webname'] . ' - ' . $options['webdescription'];
        $hack_keywords = strtolower($hack_title). ','.strtolower(get_search_query());
} 
if( $_GET['do'] == $options['_movieurl'] ) {
	    if ( !empty($_GET['id']) ) {
	    if (is_array($banned_ids)) {foreach($banned_ids as $block_id){$bad_block_id = $block_id;if ($_GET['id'] == $block_id){ header('Location: /');}}}
        if (is_numeric( $_GET['id'] ) || strposa( $_GET['id'], 'tt' ) !== false ) { $TMDBID = $_GET['id']; }else{ header('Location: /'); }
			$arraytmdb = explode(",", $options['Tmdb_api']);
            $apikey = $arraytmdb[array_rand($arraytmdb)];
            $tmdb = new TMDB($apikey, $negara, true);
            $row = $tmdb->getMovie( $TMDBID );
			if ( $row['status_code'] == ''){
                        	$single['id'] = $row['id'];
                        	if ($row['title']!=null) {
                                	$single['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($apikey, 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $single['title'] = $rowww['title'];
                            }
                        	if ($row['original_title']) {
                                $single['original_title'] = $row['original_title'];
                            } else {
                                $single['original_title'] = $row['title'];
                            }
				            $single['release_date']  = $row['release_date'];
				            $single['year']  = date('Y', strtotime( $single['release_date'] ) );
				            $single['year_link']  = '<a itemprop="url" title="'.$single['year'].'" href="'.seoyear($single['year']).'"><span itemprop="name" style="color:inherit;">'.$single['year'].'</span></a>';
				            $single['vote_average'] = $row['vote_average'];
                            $single['vote_count'] = $row['vote_count'];
                            $single['tagline'] = $row['tagline'];
                            $single['budget'] = $row['budget'];
                            $single['revenue'] = $row['revenue'];
                            $single['homepage'] = $row['homepage'];
                            $single['popularity'] = $row['popularity'];
                            if ($row['overview']!=null) {
                            $single['description']  = $row['overview'];
                        	} else {
                            $tmdb = new TMDB($apikey, 'en', true);
                            $rowsadda = $tmdb->getMovie( $TMDBID );
                            $single['description']  = $rowsadda['overview'];
                        	}
                        	if ($row['trailers']['youtube'][0]['source']!=null) {
                                if (is_array($row['trailers']['youtube'])) {
                	            $arr_trailer = $row['trailers']['youtube'][array_rand($row['trailers']['youtube'])];
                	            $single['trailers'] = $arr_trailer['source'];
                            	}
                        	} else {
                                $tmdb = new TMDB($apikey, 'en', true);
                                $rowsaddads = $tmdb->getMovie( $TMDBID );
                                $single['trailers'] = $rowsaddads['trailers']['youtube'][0]['source'];
                        	}
                        	if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
                            if (is_array($row['alternative_titles']['titles']))
                     	    {
                             	$alternative = array();foreach($row['alternative_titles']['titles'] as $result) : $alternative[] = $result['title'];endforeach;
                             	$single['alternative_titles'] = implode(", ",$alternative);
                     	    }
                     	    if ($row['images']['backdrops']!=null) {
                                shuffle($row['images']['backdrops']);
                                foreach($row['images']['backdrops'] as $result) {
                                    $single['images'] = 'https://image.tmdb.org/t/p/w1280' . $result['file_path'];
                                }
                        	} else {
                                    $single['images'] = get_webinfo('theme_url').'img/opening.jpg';
                        	}
                        	if ($row['images']['backdrops']!=null) {
                                if (is_array($row['images']['backdrops'])){
                                $ic = 0;$gambars = array();foreach($row['images']['backdrops'] as $result) : $gambars[] = '<img itemprop="image" src="https://image.tmdb.org/t/p/w780' .$result['file_path'].'" width=272.667; height=144.617; style="text-align:right;margin-left:5px;padding:5px">';if ($ic++ == 5) break;endforeach;
                                $single['gambar'] = implode("",$gambars);
                        	    } 
                        	}
                        	if ($row['poster_path']!=null) {
                                $single['poster'] = 'https://image.tmdb.org/t/p/w342' . $row['poster_path'];
                        	} else {
                                $single['poster'] = get_webinfo('theme_url').'img/no-cover.jpg';
                        	}
                        	if (is_array($row['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($row['genres'] as $result) : $genress[] = '"'.$result['name'].'"';if ($ic++ == 4) break;endforeach;
             	     	            $single['genre2'] = implode(", ",$genress);
             	     	            $genresss  = array();foreach($row['genres'] as $result) : $genresss[] = '"'.$result['id'].'"';endforeach;
             	     	            $single['genre3'] = implode(", ",$genresss);
     	     	            }
                        	if (is_array($row['genres'])){
             	     	            $genres  = array();foreach($row['genres'] as $result) : $genres[] = '<a rel="tag" itemprop="url" href="'.seocat($result['name'],$result['id']).'" class="tag" title="'.$result['name'].'">'.$result['name'].'</a>';endforeach;
             	     	            $single['genre'] = implode(", ",$genres);
     	     	            }
     	     	            if (is_array($row['genres'])){
     	     	                    $first = reset($row['genres']);
     	     	                    $single['category'] = $first['name'];$categoryid = $first['id'];
     	     	            }
     	     	            if (is_array($row['credits']['cast'])) {
             	     	        	$ic = 0;$castss = array();foreach($row['credits']['cast'] as $result) :$castss[] = '{"@type": "Person","url": "'.seoperson($result['id'],$result['name']).'","name": "'.$result['name'].'"}';if ($ic++ == 4) break;endforeach;
             	     	        	$single['cast2'] = implode(", ",$castss);
     	     	        	}
     	     	        	if (is_array($row['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($row['credits']['cast'] as $result) :$casts[] = '<a itemprop="url" title="'.$result['name'].'" href="'.seoperson($result['id'],$result['name']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].'</span></a>';if ($ic++ == 5) break;endforeach;
             	     	        	$single['cast'] = implode(", ",$casts);
     	     	        	}
     	     	        	if (is_array($row['credits']['crew'])) {       
             	     	        	$ic = 0;$crews = array();foreach($row['credits']['crew'] as $result) :$crews[] = '<a itemprop="url" title="'.$result['name'].' ('.$result['job'].')" href="'.seoperson($result['id'],$result['name']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].' ('.$result['job'].')</span></a>';if ($ic++ == 5) break;endforeach;
             	     	        	$single['crew'] = implode(", ",$crews);
     	     	        	}
     	     	        	if (is_array($row['credits']['crew'])) {       
             	     	        	$ic = 0;$crewss = array();foreach($row['credits']['crew'] as $result) :$crewss[] = '{"@type": "Person","url": "'.seoperson($result['id'],$result['name']).'","name": "'.$result['name'].'"}';if ($ic++ == 4) break;endforeach;
             	     	        	$single['director'] = implode(", ",$crewss);
     	     	        	}
     	     	     		if (is_array($row['production_countries'])) {
             	     	     		$countrys = array();foreach($row['production_countries'] as $result) : $countrys[] = '<a itemprop="url" title="'.$result['name'].'" href="'.seocountry($result['iso_3166_1']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].'</span></a>';endforeach;
             	     	     		$single['country']  = implode( ", ",$countrys );
     	     	     	    }
                        	if ($row['runtime']!=null) {
                            $single['runtime'] = $row['runtime'];
                        	} else {
                            $single['runtime'] = '1:47:31';
                        	}
                        	if (is_array($row['keywords']['keywords'])) {
                                    $keyword_keywords = array();foreach($row['keywords']['keywords'] as $result) : $keyword_keywords[] = '"'.$result['name'].'"';endforeach;
                                    $keywords_keywords = implode(", ",$keyword_keywords);
                            }
                     	    if (is_array($row['keywords']['keywords']))
                     	    {
                             	    $keyword = array();foreach($row['keywords']['keywords'] as $result) : $keyword[] = '<a rel="tag" itemprop="url" href="'.kw_id($result['id'],$result['name']).'" class="tag" title="'.$result['name'].'">'.$result['name'].'</a>';endforeach;
                             	    $single['keyword'] = implode(", ",$keyword);
                     	    }
                     	    if (is_array($row['spoken_languages']))
                            {
                                    $language = array();foreach($row['spoken_languages'] as $result) : $language[] = $result['name'];endforeach;
                                    $single['languages'] = implode(", ",$language);
                            }
         	     	         if (is_array($row['production_companies']))
                     	    {
                             	    $production = array();foreach($row['production_companies'] as $result) : $production[] = '<a itemprop="url" href="'.seocompany($result['id'],$result['name']).'">'.$result['name'].'</a>';endforeach;
                             	    $single['studio'] = implode(", ",$production);
                             	    $productionstudio = array();foreach($row['production_companies'] as $result) : $productionstudio[] = $result['name'];endforeach;
                             	    $single['studio_name'] = implode(", ",$productionstudio);
                     	    }
                     	    if( strpos( $single['studio_name'], 'Marvel' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MMARVEL.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'DC' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MDC.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Disney' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MDISNEY.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Dreamworks' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MDREAMWORKS.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Fox' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MFOX.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Legendary' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MLEGEND.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Lions' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MLIONS.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'MGM' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MMGM.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Paramount' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MPARAMOUNT.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Columbia' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MSONY.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Universal' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MUNIVERSAL.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Warner' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MWB.mp4';
                     	    }elseif( strpos( $single['country'], 'Japan' ) !== false && strpos( $single['genre3'], '16' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/JAPAN.mp4';
                     	    }else{$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MFOX.mp4';}
     	     	     		if (is_array($row['similar']['results'])) {
                            foreach((array)$row['similar']['results'] as $similar) {
                                    $sim['id'] = $similar['id'];
                                    $sim['overview'] = $similar['overview'];
                                    if ($similar['overview']!=null) {
                                    $sim['description']  = $similar['overview'];
                                	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $rowsaddaa = $tmdb->getMovie( $TMDBID );
                                    $sim['description']  = $rowsaddaa['overview'];
                                	}
                                    $sim['release_date'] = $similar['release_date'];
                                    $sim['popularity'] = $similar['popularity'];
                                    $sim['vote_average'] = $similar['vote_average'];
                                    $sim['vote_count'] = $similar['vote_count'];
                                    if ($similar['title']!=null) {
                                    $sim['title']  = $similar['title'];
                                	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $rowsaddaa = $tmdb->getMovie( $TMDBID );
                                    $sim['title']  = $rowsaddaa['title'];
                                	}
                                    if ($similar['original_title']) {
                                        $sim['original_title'] = $similar['original_title'];
                                    } else {
                                        $sim['original_title'] = $similar['title'];
                                    }
                                    if ($similar['poster_path']) {
                                            $sim['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$similar['poster_path'];
                                    }else{
                                            $sim['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                                    }
                                    if ($similar['backdrop_path']) {
                                            $sim['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$similar['backdrop_path'];
                                    }else{
                                            $sim['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                                    }
                                    $single['similar'][] = $sim;
                            }
     	     	     		}
                            if (is_array($row['recommendations']['results'])) {
                            foreach((array)$row['recommendations']['results'] as $recommendations) {
                                    $recom['id'] = $recommendations['id'];
                                    $recom['overview'] = $recommendations['overview'];
                                    $recom['release_date'] = $recommendations['release_date'];
                                    $recom['popularity'] = $recommendations['popularity'];
                                    $recom['vote_average'] = $recommendations['vote_average'];
                                    $recom['vote_count'] = $recommendations['vote_count'];
                                    if ($similar['title']!=null) {
                                    $recom['title']  = $recommendations['title'];
                                	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $rowsaddaa = $tmdb->getMovie( $TMDBID );
                                    $recom['title']  = $rowsaddaa['title'];
                                	}
                                    if ($recommendations['original_title']) {
                                        $recom['original_title'] = $recommendations['original_title'];
                                    } else {
                                        $recom['original_title'] = $recommendations['title'];
                                    }
                                    if ($recommendations['poster_path']) {
                                            $recom['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$recommendations['poster_path'];
                                    }else{
                                            $recom['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                                    }
                                    if ($recommendations['backdrop_path']) {
                                            $recom['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$recommendations['backdrop_path'];
                                    }else{
                                            $recom['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                                    }
                                    if($recommendations['vote_count'] == 0) { 
                                        $recom['new_vote_count'] = 1;  
                                    }else{ 
                                        $recom['new_vote_count'] = $recommendations['vote_count'];} 
                                    if($recommendations['vote_count'] == 0) { 
                                        $recom['new_vote_average'] = 1; 
                                    }else{ 
                                        $recom['new_vote_average'] = $recommendations['vote_average'];}
                                    $single['recommendations'][] = $recom;
                            }
     	     	     		}
                        	$single['player'] = '<iframe class="embed-item" src="//www.youtube-nocookie.com/embed/'.$single['trailers'].'?rel=0&amp;autoplay=1&amp;controls=0&amp;showinfo=0&amp;modestbranding=1" width="600" height="315" frameborder="0" allowfullscreen=""></iframe>';
                        	$_SESSION[ $basename ] = $single;
                	}else{
                	    $url = 'https://www.themoviedb.org/movie/'.$TMDBID;
                	    $xpath = deqila_xpath($url);
                	    $single['images'] = $xpath->query('//meta[@property="og:image"][2]/@content')->item(0)->nodeValue;
                	    if ( $xpath->query("//section[@class='inner_content movie_content backdrop poster']")->length ) {
                	        foreach ( $xpath->query("//section[@class='inner_content movie_content backdrop poster']") as $sect ) {
			                    $single['title'] = trim($xpath->query(".//div[@class='title']/span/a/h2",$sect)->item(0)->nodeValue);
			                    $single['year'] = str_replace(array("(",")"),'',$xpath->query(".//span[@class='release_date']",$sect)->item(0)->nodeValue);
			                    $single['description']  = trim($xpath->query(".//div[@class='overview']/p",$sect)->item(0)->nodeValue);
			                    if ($xpath->query(".//section[@class='facts left_column']/p[4]",$ac)->length) {
			                            $single['runtime']  = str_replace('Runtime ', '', strip_tags($xpath->query(".//section[@class='facts left_column']/p[4]",$sect)->item(0)->nodeValue));
			                    }else{
			                            $single['runtime'] = '1:45:00';
			                    }
			                    //$single['country']  = preg_replace("/<\/?div[^>]*\>/i", "", $xpath->query(".//ul[@class='releases']/li",$sect)->item(0)->nodeValue);
                                $single['poster'] = $xpath->query(".//div[@class='image_content']/img[contains(@class,'poster')]/@src",$sect)->item(0)->nodeValue;
                                $single['trailers'] = get_youtube_id( limit_word( $single['title'], 6 ) );
                                $gnr  = array();
                                foreach ( $xpath->query("//section[@class='genres right_column']/ul/li") as $gr ) {
                                    $gnr[] = trim($xpath->query(".//a",$gr)->item(0)->nodeValue);
                                    $single['category'] = trim($xpath->query(".//a",$gr)->item(0)->nodeValue);
                                    $single['genre'] = implode(", ",$gnr);
                                }
                                foreach ( $xpath->query("//ol[@class='people scroller']/li[@class='card']") as $ac ) {
                    $sim['character'] = trim($xpath->query(".//p[@class='character']",$ac)->item(0)->nodeValue);
                    $sim['name'] = trim($xpath->query(".//p[1]/a",$ac)->item(0)->nodeValue);
                    if ($xpath->query(".//a/img/@data-src",$ac)->length) {
                            $sim['poster'] = $xpath->query(".//a/img/@data-src",$ac)->item(0)->nodeValue;
                    }else{
                            $sim['poster'] = get_webinfo('theme_url').'img/no-profile.jpg';
                    }
                    $single['casst'][] = $sim;
                                }
                            }
                        }else{
                        //header("HTTP/1.1 301 Moved Permanently"); 
				        //header("Location: /");
                        }
                	//}
 		}
        $hack_title = $options['title_movie_before'] . $single['title'] .' ('.$single['year'].') ' . $options['title_movie_after'] . ' - '. $options['webname'];
        $title = $options['title_movie_before'] . $single['title'] .' ('.$single['year'].')'. $options['title_movie_after'];
        $description = '<b>'. $title .'</b> - '.$single['description'];
        $hack_description = short($title.' - '.$single['description']);
        $hack_keywords = strtolower( $title );
	}else{ 
		header('Location: /'); 
	}

}
if( $_GET['do'] == $options['_tvurl'] ) {
	    if ( !empty($_GET['id']) ) {
	        if (is_array($banned_ids)) {foreach($banned_ids as $block_id){$bad_block_id = $block_id;if ($_GET['id'] == $block_id){ header('Location: /');}}}
		        //if ( empty($_GET['t']) ) { header('Location: /'); }
		        $arraytmdb = explode(",", $options['Tmdb_api']);
                $apikey = $arraytmdb[array_rand($arraytmdb)];
                $tmdb = new TMDB($apikey, $negara, true);
                if(strpos($_GET['id'], '-') !== false) {
                        $str = explode("-", $_GET['id']);
                        $TMDBID = $str[0];
                        if($str[2] != ''):
                                $row = $tmdb->getTVShow($TMDBID);
                                $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                if ($row['name']!=null) {
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                    $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                    $single['title'] = $row['name'];
                            	}else{
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                    $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                    $single['title'] = $row['name'];
                            	}
                            	$kotretan_title2 = $row3['name'];
                            	if ($row['original_name']) {
                                    $single['original_name'] = $row['original_name'];
                            	} else {
                                    $single['original_name'] = $row['name'];
                            	}
                                if($kotretan_title2 != 'Episode '.$str[2]){$title_eps = $kotretan_title2;}else{$title_eps = ' ';}
                                if(empty($row3['season_number']) or empty($row3['episode_number'])){
                                $cari_judul = $single['title'] .' - Season '.$str[1].' Episode '.$str[2].' '. $title_eps;
                                $hack_title = $options['title_tv_before'] . $single['title'] .' - Season '.$str[1].' Episode '.$str[2].' : '. $title_eps . $options['title_tv_after'] ;
                                }else{
                                $cari_judul = $single['title'] .' - Season '.$row3['season_number'].' Episode '.$row3['episode_number'].' '. $title_eps;   
                                $hack_title = $options['title_tv_before'] . $single['title'] .' - Season '.$row3['season_number'].' Episode '.$row3['episode_number'].' : '. $title_eps . $options['title_tv_after'] ;
                                }
                                $cari_judul2 = ' Season '.$row3['season_number'];
                                if ($row3['overview']!=null) {
                                    $single['description'] = $row3['overview'];
                            	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                    $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                    $single['description'] = $row3['overview'];
                            	}
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID.'-'.$str[1].'-'.$str[2];
                                $single['year'] = date('Y', strtotime( $row3['air_date'] ) );
                                $single['year_link']  = '<a itemprop="url" title="'.$single['year'].'" href="'.seoyear($single['year']).'"><span itemprop="name" style="color:inherit;">'.$single['year'].'</span></a>';
                                elseif($str[1] != ''):
                                $row = $tmdb->getTVShow($TMDBID);
                                $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                if ($row['name']!=null) {
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                    $single['title'] = $row['name'];
                            	}else{
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                    $single['title'] = $row['name'];
                            	}
                                $cari_judul = $single['title'] .' - Season '.$row2['season_number'];
                                $cari_judul2 =' Season '.$row2['season_number'];
                                $hack_title = $options['title_tv_before'] . $single['title'] .' - '. $row2['name'] . $options['title_tv_after'];
                                if ($row['overview']!=null) {
                                    $single['description'] = $row['overview'];
                            	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                    $single['description'] = $row['overview'];
                            	}
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID.'-'.$str[1];
                                $single['air_date'] = date('Y', strtotime( $row2['air_date'] ) );
                                $single['year'] = date('Y', strtotime( $row2['air_date'] ) );
                                $single['year_link']  = '<a itemprop="url" title="'.$single['year'].'" href="'.seoyear($single['year']).'"><span itemprop="name" style="color:inherit;">'.$single['year'].'</span></a>';
                                else:
                                $row = $tmdb->getTVShow($TMDBID);
                                if ($row['name']!=null) {
                                    $single['title'] = $row['name'];
                            	}else{
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $single['title'] = $row['name'];
                            	}
                                $cari_judul = $single['title'];
                                $cari_judul2 =' Season '.$row['last_seasons_number'];
                                $hack_title = $options['title_tv_before'] . $single['title'] . $options['title_tv_after'];
                                if ($row['overview']!=null) {
                                    $single['description'] = $row['overview'];
                            	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $single['description'] = $row['overview'];
                            	}
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID;
                                $single['year'] = date('Y', strtotime( $row['first_air_date'] ) );
                                $single['year_link']  = '<a itemprop="url" title="'.$single['year'].'" href="'.seoyear($single['year']).'"><span itemprop="name" style="color:inherit;">'.$single['year'].'</span></a>';

                        endif;
                } else {
                        $TMDBID = $_GET['id'];
                        $row = $tmdb->getTVShow($TMDBID);
                        if ( $row['name'] != '' ) {
                                if ($row['name']!=null) {
                                    $single['title'] = $row['name'];
                            	}else{
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $single['title'] = $row['name'];
                            	}
                                $cari_judul = $single['title'];
                                $cari_judul2 =' Season '.$row['last_seasons_number'];
                                $hack_title = $options['title_tv_before'] . $single['title'] . $options['title_tv_after'];
                                if ($row['overview']!=null) {
                                $single['description']  = $row['overview'];
                            	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $TMDBID = $_GET['id'];
                                    $row = $tmdb->getTVShow($TMDBID);
                                    $single['description']  = $row['overview'];
                            	}
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID;
                        }else{
                	            $url = 'https://www.themoviedb.org/tv/'.$TMDBID;
                	            $xpath = deqila_xpath($url);
                	            $single['images'] = $xpath->query('//meta[@property="og:image"][2]/@content')->item(0)->nodeValue;
                	            if ( $xpath->query("//section[@class='inner_content tv_content backdrop poster']")->length ) {
                	                    foreach ( $xpath->query("//section[@class='inner_content tv_content backdrop poster']") as $sect ) {
			                                    $single['title'] = trim($xpath->query(".//div[@class='title']/span/a/h2",$sect)->item(0)->nodeValue);
			                                    $cari_judul = $single['title'];
			                                    $cari_judul2 = $single['title'];
			                                    $hack_title = $options['title_tv_before'] . $single['title'] . $options['title_tv_after'];
			                                    $single['year'] = str_replace(array("(",")"),'',$xpath->query(".//span[@class='release_date']",$sect)->item(0)->nodeValue);
			                                    $single['description']  = trim($xpath->query(".//div[@class='overview']/p",$sect)->item(0)->nodeValue);
			                                    $hack_description = short($hack_title.' - '.$single['description']);
			                                    $single['runtime']  = str_replace('Runtime ', '', strip_tags($xpath->query(".//section[@class='facts left_column']/p[4]",$sect)->item(0)->nodeValue));
                                                $single['poster'] = $xpath->query(".//div[@class='image_content']/img[contains(@class,'poster')]/@src",$sect)->item(0)->nodeValue;
                                                $single['trailers'] = get_youtube_id( limit_word( $single['title'], 6 ) );
                                        }
                                        $gnr  = array();
                                        foreach ( $xpath->query("//section[@class='genres right_column']/ul/li") as $gr ) {
                                        $gnr[] = trim($xpath->query(".//a",$gr)->item(0)->nodeValue);
                                        $single['category'] = trim($xpath->query(".//a",$gr)->item(0)->nodeValue);
                                        $single['genre'] = implode(", ",$gnr);
                                        }
                                        foreach ( $xpath->query("//ol[@class='people scroller']/li[@class='card']") as $ac ) {
                                        $sim['character'] = trim($xpath->query(".//p[@class='character']",$ac)->item(0)->nodeValue);
                                        $sim['name'] = trim($xpath->query(".//p[1]/a",$ac)->item(0)->nodeValue);
                                        if ($xpath->query(".//a/img/@data-src",$ac)->length) {
                                                $sim['poster'] = $xpath->query(".//a/img/@data-src",$ac)->item(0)->nodeValue;
                                        }else{
                                                $sim['poster'] = get_webinfo('theme_url').'img/no-profile.jpg';
                                        }
                                        $single['casst'][] = $sim;
                                        }
                                }
                        }
                }
                if ( $row['name'] != '' ) {
                        include(ABSPATH . THMPATH . $options['theme_name'] . '/countryname.php');
                        $single['id'] = $row['id'];
                        $single['first_air_date'] = $row['first_air_date'];
                        $single['last_air_date'] = $row['last_air_date'];
                        $single['year'] = date('Y', strtotime( $row['last_air_date'] ) );
                        $single['year_link']  = '<a itemprop="url" title="'.$single['year'].'" href="'.seoyear($single['year']).'"><span itemprop="name" style="color:inherit;">'.$single['year'].'</span></a>';
                        $run_time0 = isset($row['episode_run_time'][0]) ? $row['episode_run_time'][0] : '26';
                        $run_time1 = isset($row['episode_run_time'][1]) ? $row['episode_run_time'][1] : '14';
                        //$run_time2 = isset($row['episode_run_time'][2]) ? $row['episode_run_time'][2] : '20';
                        $single['runtime'] = $run_time0. ':'.$run_time1;
                        $single['vote_count'] = $row['vote_count'];
                        $single['number_of_episodes'] = $row['number_of_episodes'];
                        $single['number_of_seasons'] = $row['number_of_seasons'];
                        $single['status'] = $row['status'];
                        $single['popularity'] = $row['popularity'];
                        $single['original_language'] = $row['original_language'];
                        $single['trailersss'] = get_youtube_id( limit_word( $cari_judul, 6 ) .' tv');
                        $single['player'] = '<iframe class="embed-item" src="//www.youtube-nocookie.com/embed/'.$single['trailers'].'?rel=0&amp;controls=0&amp;showinfo=0" width="600" height="315" frameborder="0" allowfullscreen=""></iframe>';
                        if ($row['videos']['results'][0]['key']!=null) {
                              $single['trailers'] = $row['videos']['results'][0]['key'];
                        } elseif ($row['videos']['results'][0]['key']=null){
                              $single['trailers'] = get_youtube_id( limit_word( $cari_judul, 6 ) .' tv');
                        } else {                                    
                            $tmdb = new TMDB($apikey, 'en', true);
                            $row = $tmdb->getTVShow($row['id']);
                            $single['trailers'] = $row['videos']['results'][1]['key'];
                        }
                        if ($row['images']['backdrops']!=null) {
                                shuffle($row['images']['backdrops']);
                                foreach($row['images']['backdrops'] as $result) {
                                    $single['images'] = 'https://image.tmdb.org/t/p/w1280' . $result['file_path'];
                        }
                        } else {
                                    $single['images'] = get_webinfo('theme_url').'img/opening.jpg';
                        }
                        if ($row['poster_path']!=null) {
                            $single['poster'] = 'https://image.tmdb.org/t/p/w342' . $row['poster_path'];
                        } else {
                            $single['poster'] = get_webinfo('theme_url').'img/no-cover.jpg';
                        }
                        if ($row['images']['backdrops']!=null) {
                                if (is_array($row['images']['backdrops'])){
                                $ic = 0;$gambars = array();foreach($row['images']['backdrops'] as $result) : $gambars[] = '<img itemprop="image" src="https://image.tmdb.org/t/p/w780' .$result['file_path'].'" width=272.667; height=144.617; style="text-align:right;margin-left:5px;padding:5px">';if ($ic++ == 5) break;endforeach;
                                $single['gambar'] = implode("",$gambars);
                        	    } 
                        	}
     	     	        if (is_array($row['genres'])){
             	     	        $genres  = array();foreach($row['genres'] as $result) : $genres[] = '<a rel="tag" itemprop="url" href="'.seocat($result['name'],$result['id']).'" class="tag" title="'.$result['name'].'">'.$result['name'].'</a>';endforeach;
             	     	        $single['genres'] = implode(", ",$genres);
     	     	        }
     	     	        if (is_array($row['genres'])){
     	     	                $first = reset($row['genres']);
     	     	                $single['category'] = $first['name'];$categoryid = $first['id'];
     	     	        }
     	     	        if (is_array($row['credits']['cast'])){       
             	     	        $ic = 0;$casts = array();foreach($row['credits']['cast'] as $result) :$casts[] = '<a itemprop="url" href="'.seoperson($result['id'],$result['name']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].'</span></a>';if ($ic++ == 5) break;endforeach;
             	     	        $single['cast'] = implode(", ",$casts);
     	     	        }
     	     	     	if (is_array($row['credits']['cast'])) {
                                foreach((array)$row['credits']['cast'] as $cast) {
                                        $sim['id'] = $cast['id'];
                                        $sim['character'] = $cast['character'];
                                        $sim['name'] = $cast['name'];
                                        if ($cast['profile_path']) {
                                                $sim['poster'] = 'https://image.tmdb.org/t/p/w342'.$cast['profile_path'];
                                        }elseif($cast['profile_path']){
                                                $sim['poster'] = 'https://image.tmdb.org/t/p/w185'.$cast['profile_path'];
                                        }else{
                                                $sim['poster'] = get_webinfo('theme_url').'img/no-profile.jpg';
                                        }
                                        $single['casst'][] = $sim;
                                }
     	     	     	}
     	     	        if (is_array($row3['credits']['cast'])){       
             	     	        $ic = 0;$casts = array();foreach($row3['credits']['cast'] as $result) :$casts[] = '<a itemprop="url" href="'.seoperson($result['id'],$result['name']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].'</span></a>';if ($ic++ == 5) break;endforeach;
             	     	        $single['cast3'] = implode(", ",$casts);
     	     	        }
     	     	        $single['vote_average'] = $row['vote_average'];
                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                        }
                        if (is_array($row['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($row['genres'] as $result) : $genress[] = '"'.$result['name'].'"';if ($ic++ == 4) break;endforeach;
             	     	            $single['genre2'] = implode(", ",$genress);
             	     	            $genresss  = array();foreach($row['genres'] as $result) : $genresss[] = '"'.$result['id'].'"';endforeach;
             	     	            $single['genre3'] = implode(", ",$genresss);
     	     	            }
     	     	        if (is_array($row['credits']['cast'])) {
             	     	        	$ic = 0;$castss = array();foreach($row['credits']['cast'] as $result) :$castss[] = '{"@type": "Person","url": "'.seoperson($result['id'],$result['name']).'","name": "'.$result['name'].'"}';if ($ic++ == 4) break;endforeach;
             	     	        	$single['cast2'] = implode(", ",$castss);
     	     	        	}
     	     	        if (is_array($row['credits']['crew'])) {       
             	     	        	$ic = 0;$crewss = array();foreach($row['credits']['crew'] as $result) :$crewss[] = '{"@type": "Person","url": "'.seoperson($result['id'],$result['name']).'","name": "'.$result['name'].'"}';if ($ic++ == 4) break;endforeach;
             	     	        	$single['director'] = implode(", ",$crewss);
     	     	        	}
                        if (is_array($row['keywords']['results'])) {
                                    $keyword_keywords = array();foreach($row['keywords']['results'] as $result) : $keyword_keywords[] = '"'.$result['name'].'"';endforeach;
                                    $keywords_keywords = implode(", ",$keyword_keywords);
                            }
                     	if (is_array($row['keywords']['results']))
                     	{
                             	$keyword = array();foreach($row['keywords']['results'] as $result) : $keyword[] = '<a rel="tag" itemprop="url" href="'.kw_id($result['id'],$result['name']).'" class="tag" title="'.$result['name'].'">'.$result['name'].'</a>';endforeach;
                             	$single['keyword'] = implode(", ",$keyword);
                     	}
                     	if (is_array($row['alternative_titles']['results']))
                     	{
                             	$alternative = array();foreach($row['alternative_titles']['results'] as $result) : $alternative[] = $result['title'];endforeach;
                             	$single['alternative_titles'] = implode(", ",$alternative);
                     	}
     	     	     	if (is_array($row['networks']))
                     	{
                                $networks = array();foreach($row['networks'] as $result) : $networks[] = '<a itemprop="url" href="'.seonetwork($result['id'],$result['name']).'">'.$result['name'].'</a>';endforeach;
                             	$single['studio'] = implode(", ",$networks);
                             	$networksstudio = array();foreach($row['networks'] as $result) : $networksstudio[] = $result['name'];endforeach;
                             	$single['studio_name'] = implode(", ",$networksstudio);
                     	}
                     	if( strpos( $single['studio_name'], 'Netflix' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/TNETFLIX.mp4';
                     	}elseif( strpos( $single['studio_name'], 'Amazon' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/TAMAZ.mp4';
                     	}elseif( strpos( $single['studio_name'], 'Disney' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MDISNEY.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Apple' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/TAPPLE.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Hulu' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/THULU.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Max' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/TMAX.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Peacock' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/TPEACOCK.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Paramount' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MPARAMOUNT.mp4';
                     	    }elseif( strpos( $single['studio_name'], 'Sony' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/MSONY.mp4';
                     	    }elseif( strpos( $single['country'], 'Japan' ) !== false && strpos( $single['genre3'], '16' ) !== false) {$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/JAPAN.mp4';
                     	    }else{$single['video_trail'] = 'https://raw.githubusercontent.com/OpinDeqila/trailvid/main/TNETFLIX.mp4';}
                     	    
                     	if (is_array($row['production_countries'])) {
             	     	     		$countrys = array();foreach($row['production_countries'] as $result) : $countrys[] = '<a itemprop="url" title="'.$result['name'].'" href="'.seocountry($result['iso_3166_1']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].'</span></a>';endforeach;
             	     	     		$single['country']  = implode( ", ",$countrys );
     	     	     	}
     	     	        if (is_array($row['credits']['crew']))
     	     	        {       
             	     	        $ic = 0;$crews = array();foreach($row['credits']['crew'] as $result) :$crews[] = '<a itemprop="url" title="'.$result['name'].' ('.$result['job'].')" href="'.seoperson($result['id'],$result['name']).'"><span itemprop="name" style="color:inherit;">'.$result['name'].' ('.$result['job'].')</span></a>';if ($ic++ == 5) break;endforeach;
             	     	        $single['crew'] = implode(", ",$crews);
     	     	        }
     	     	        if (is_array($row['credits']['crew'])){
             	     	        foreach($row['credits']['crew'] as $result) : $person = $result['name'];$personid = $result['id'];endforeach;
     	     	        }
     	     	        if (is_array($row['seasons'])) {
             	     	        $single['seasons'] = $row['seasons'];
             	     	        if($str[1] != '') {
             	     	                if (is_array($row2['episodes'])) {
             	     	                        $single['episodes'] = $row2['episodes'];
             	     	                }
             	     	        }else{
             	     	                $numItems = count($row['seasons']);
                                        $ix = 0;
                                        foreach($row['seasons'] as $key=>$value) {
                                if(++$ix === $numItems) {
                                $rowx['season_number'] = $tmdb->getTVSeason($TMDBID, '/season/'.$value['season_number']);
                                $epskur = --$ix;
                                $sea_nmbr = $value['season_number'];
                                }
                                        }
                                        $single['episodes'] = $rowx['season_number']['episodes'];
             	     	        }
     	     	        }
     	     	        if (is_array($row['similar']['results'])) {
                            foreach((array)$row['similar']['results'] as $similar) {
                                    $sim['id'] = $similar['id'];
                                    $sim['release_date'] = $similar['first_air_date'];
                                    $sim['popularity'] = $similar['popularity'];
                                    $sim['vote_average'] = $similar['vote_average'];
                                    $sim['vote_count'] = $similar['vote_count'];
                                    if ($similar['name']!=null) {
                                        $sim['title'] = $similar['name'];
                                	}else{
                                        $tmdb = new TMDB($apikey, 'en', true);
                                        $TMDBID = $similar['id'];
                                        $rowz = $tmdb->getTVShow($TMDBID);
                                        $sim['title'] = $rowz['name'];
                                	}
                                	if ($similar['id']) {
                                            $rowww = $tmdb->getTVShow( $similar['id'] );
                                            $sim['episode_run_time'] =  $rowww['last_episode_to_air']['episode_number'];
                                            $sim['release_date'] =  $rowww['last_air_date'];
                                            $sim['tv_last_episode_to_air'] = $rowww['last_episode_to_air']['episode_number'];
                                            $sim['tv_last_season_to_air'] = $rowww['last_episode_to_air']['season_number'];
                                            if (is_array($rowww['genres'])){
                     	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
                     	     	            $sim['genre'] = implode("",$genress);
                     	     	            }
                     	     	            if (is_array($rowww['credits']['cast'])) {       
                     	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
                     	     	        	$sim['cast'] = implode(", ",$casts);
             	     	        	        }
                                    }
                                    if ($similar['original_title']) {
                                    $sim['original_title'] = $similar['original_title'];
                                    } else {
                                    $sim['original_title'] = $similar['name'];
                                	}
                                    if ($similar['overview']!=null) {
                                    $sim['description']  = $similar['overview'];
                                	} else {
                                    $tmdb = new TMDB($apikey, 'en', true);
                                    $rowsadda = $tmdb->getTVShow($_GET['id']);
                                    $sim['description']  = $rowsadda['overview'];
                                	}
                                    if ($similar['poster_path']) {
                                            $sim['poster_path'] = 'https://image.tmdb.org/t/p/w185'.$similar['poster_path'];
                                    }else{
                                            $sim['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                                    }
                                    if ($similar['backdrop_path']) {
                                            $sim['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$similar['backdrop_path'];
                                    }elseif(empty($similar['backdrop_path'])){
                                            $sim['backdrop_path'] = $sim['poster_path'];
                                    }else{
                                            $sim['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                                    }
                                    if($similar['vote_count'] == 0) { 
                                        $sim['new_vote_count'] = 1;  
                                    }else{ 
                                        $sim['new_vote_count'] = $similar['vote_count'];} 
                                    if($similar['vote_count'] == 0) { 
                                        $sim['new_vote_average'] = 1; 
                                    }else{ 
                                        $sim['new_vote_average'] = $similar['vote_average'];}
                                    $single['similar'][] = $sim;
                            }
     	     	     	}
         	     	    if (is_array($row['recommendations']['results'])) {
                            foreach((array)$row['recommendations']['results'] as $recommendations) {
                                $recom['id'] = $recommendations['id'];
                                $recom['release_date'] = $recommendations['first_air_date'];
                                $recom['popularity'] = $recommendations['popularity'];
                                $recom['vote_average'] = $recommendations['vote_average'];
                                $recom['vote_count'] = $recommendations['vote_count'];
                                if ($recommendations['name']!=null) {
                                        $recom['title'] = $recommendations['name'];
                                	}else{
                                        $tmdb = new TMDB($apikey, 'en', true);
                                        $TMDBID = $recommendations['id'];
                                        $rowz = $tmdb->getTVShow($TMDBID);
                                        $recom['title'] = $rowz['name'];
                                }
                                if ($recommendations['original_title']) {
                                    $recom['original_title'] = $recommendations['original_title'];
                                    } else {
                                    $recom['original_title'] = $recom['title'];
                                    }
                                if ($recommendations['id']) {
                                            $rowww = $tmdb->getTVShow( $recommendations['id'] );
                                            $recom['episode_run_time'] =  $rowww['last_episode_to_air']['episode_number'];
                                            $recom['release_date'] =  $rowww['last_air_date'];
                                            $recom['tv_last_episode_to_air'] = $rowww['last_episode_to_air']['episode_number'];
                                            $recom['tv_last_season_to_air'] = $rowww['last_episode_to_air']['season_number'];
                                            if (is_array($rowww['genres'])){
                     	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
                     	     	            $recom['genre'] = implode("",$genress);
                     	     	            }
                     	     	            if (is_array($rowww['credits']['cast'])) {       
                     	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
                     	     	        	$recom['cast'] = implode(", ",$casts);
             	     	        	        }
                                    }
                                if ($recommendations['overview']!=null) {
                                $recom['description']  = $recommendations['overview'];
                            	} else {
                                $tmdb = new TMDB($apikey, 'en', true);
                                $rowsadda = $tmdb->getTVShow($_GET['id']);
                                $recom['description']  = $rowsadda['overview'];
                            	}
                                if ($recommendations['poster_path']) {
                                        $recom['poster_path'] = 'https://image.tmdb.org/t/p/w185'.$recommendations['poster_path'];
                                }else{
                                        $recom['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                                }
                                if ($recommendations['backdrop_path']) {
                                        $recom['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$recommendations['backdrop_path'];
                                }elseif(empty($recommendations['backdrop_path'])){
                                        $recom['backdrop_path'] = $recom['poster_path'];
                                }else{
                                        $recom['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                                }
                                if($recommendations['vote_count'] == 0) { 
                                    $recom['new_vote_count'] = 1;  
                                }else{ 
                                    $recom['new_vote_count'] = $recommendations['vote_count'];} 
                                if($recommendations['vote_count'] == 0) { 
                                    $recom['new_vote_average'] = 1; 
                                }else{ 
                                    $recom['new_vote_average'] = $recommendations['vote_average'];}
                                $single['recommendations'][] = $recom;
                            }
         	     	     }
                        }
                }else{ 
		        header('Location: /'); 
                }
}
function deqila_data_trendingMovie( $nama = 'trend', $page = 1, $get = 'getTrendingMovie', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/movie/';
	    $name	= $nama.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                        	if ($row['original_title']) {
                                $item['original_title'] = $row['original_title'];
                            } else {
                                $item['original_title'] = $row['title'];
                            }
	                        if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
            $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
                            if ($row['overview']!=null) {
            $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
                        }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachemovie') == 'true' ) {
                	    if ( !file_exists( $path ) ) {
                        	    mkdir( $path, 0755, true );
				                file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				                file_put_contents( $path . $name, serialize( $results ) );
		                }
		                }
		                return serialize( $results );
                }
        }
}
function deqila_data_trendingTV( $nama = 'trend', $page = 1, $get = 'getTrendingTV', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/tv/';
	    $name	= $nama.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                        	if ($row['original_name']) {
                                $item['original_title'] = $row['original_name'];
                            } else {
                                $item['original_title'] = $row['name'];
                            }
	                        if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['episode_run_time'] =  $rowww['last_episode_to_air']['episode_number'];
                                    $item['release_date'] =  $rowww['last_air_date'];
                                    $item['tv_last_episode_to_air'] = $rowww['last_episode_to_air']['episode_number'];
                                    $item['tv_last_season_to_air'] = $rowww['last_episode_to_air']['season_number'];
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
            $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
                            if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['first_air_date'];
                        	}
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
                        }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachetv') == 'true' ) {
                	    if ( !file_exists( $path ) ) {
                        	    mkdir( $path, 0755, true );
				                file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				                file_put_contents( $path . $name, serialize( $results ) );
		                }
		                }
		                return serialize( $results );
                }
        }
}
function deqila_data_trendingPerson( $nama = 'trendP', $page = 1, $get = 'getTrendingPerson', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/movie/';
	    $name	= $nama.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        $item['title'] =  $row['name'];
                        	if ($row['profile_path']) {
                            $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['profile_path'];
                        	}else{
                            $item['poster_path'] = get_webinfo('theme_url').'img/no-profile.jpg';
                        	}
	                        $item['known_for_department'] =  $row['known_for_department'];
	                        $item['popularity'] =  $row['popularity'];
	                        if ($row['id']) {
                                    $rowp = $tmdb->getPerson( $row['id'] );
                                    $item['birthday'] = $rowp['birthday'];
                                    $item['place_of_birth'] = $rowp['place_of_birth'];                               
                                    $item['description'] =  $rowp['biography'];
                            }
		        	        $results['result'][] = $item;
                        }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachemovie') == 'true' ) {
                	    if ( !file_exists( $path ) ) {
                        	    mkdir( $path, 0755, true );
				                file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				                file_put_contents( $path . $name, serialize( $results ) );
		                }
		                }
		                return serialize( $results );
                }
        }
}
function deqila_data_movie( $nama = 'movie', $page = 1, $get = '', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/movie/';
	    $name	= $nama.$get.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb =  new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                        	if ($row['original_title']) {
                                $item['original_title'] = $row['original_title'];
                            } else {
                                $item['original_title'] = $row['title'];
                            }
	                        if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                            if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
                            if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
                        }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachemovie') == 'true' ) {
                	    if ( !file_exists( $path ) ) {
                        	    mkdir( $path, 0755, true );
				                file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				                file_put_contents( $path . $name, serialize( $results ) );
		                }
		                }
		                return serialize( $results );
                }
        }
}
function deqila_data_tv( $nama = 'tv', $page = 1, $get = '', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/tv/';
	    $name	= $nama.$get.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
                        	if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                        	if ($row['original_name']) {
                                $item['original_title'] = $row['original_name'];
                            } else {
                                $item['original_title'] = $row['name'];
                            }
	                        if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
            $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
            $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowwww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowwww['overview'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
	                        
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachetv') == 'true' ) {
                	            if ( !file_exists( $path ) ) {
                        	            mkdir( $path, 0755, true );
				                        file_put_contents( $path . $name, serialize( $results ) );
                                }else {
				                        file_put_contents( $path . $name, serialize( $results ) );
		                        }
		                }
		                return serialize( $results );
		        }
	    }
}
function deqila_data_genre( $nama = 'genremov', $id = '', $page = 1, $get = 'GetGenreMovies', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/movie/';
	    $name	= $nama.$id.'movie'.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($id,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                            if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                            if ($row['original_title']) {
                                    $item['original_title'] = $row['original_title'];
                            } else {
                                    $item['original_title'] = $row['title'];
                            }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
            $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachemovie') == 'true' ) {
                	            if ( !file_exists( $path ) ) {
                        	            mkdir( $path, 0755, true );
				                        file_put_contents( $path . $name, serialize( $results ) );
                                }else {
				                        file_put_contents( $path . $name, serialize( $results ) );
		                        }
		                }
		                return serialize( $results );
		        }
	    }
}
function deqila_data_genre_tv( $nama = 'genretv', $id = '', $page = 1, $get = 'GetGenreTVShow', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/tv/';
	    $name	= $nama.$id.'tv'.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
	            $Movie = $tmdb->$get($id,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie);}
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
	                        if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                            if ($row['original_name']) {
                                    $item['original_title'] = $row['original_name'];
                                    } else {
                                    $item['original_title'] = $row['name'];
                                    }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
            $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
            $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['first_air_date'];
                        	} 
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachetv') == 'true' ) {
                	            if ( !file_exists( $path ) ) {
                        	            mkdir( $path, 0755, true );
				                        file_put_contents( $path . $name, serialize( $results ) );
                                }else {
				                        file_put_contents( $path . $name, serialize( $results ) );
		                        }
		                }
		                return serialize( $results );
		        }
	    }
}
function deqila_data_keyword( $id = '', $page = 1, $get = 'GetKeywordMovies', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
		$Movie = $tmdb->$get($id,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                        	if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                            if ($row['original_title']) {
                                    $item['original_title'] = $row['original_title'];
                                    } else {
                                    $item['original_title'] = $row['title'];
                            }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            }	
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                return $results;
		        }
	    
}
function deqila_data_keyword_tv( $id = '', $page = 1, $get = 'GetKeywordTVShow', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $Movie = $tmdb->$get($id,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                        	if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                            if ($row['original_name']) {
                                    $item['original_title'] = $row['original_name'];
                            } else {
                                    $item['original_title'] = $row['name'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['first_air_date'];
                        	} 
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                return $results ;
		        }
	    
}
function deqila_data_person( $nama = '', $page = 1, $get = 'searchPerson') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
		$Movie = $tmdb->$get($nama,$page);
		if ( $Movie['results'] ) {
                $results = array();
                foreach((array)$Movie['results'] as $row) {
	                    $item['id'] =  $row['id'];
                        if ($row['name']) {
                                $item['title'] = $row['name'];
                        } else {
                                $item['title'] = 'Unknown';
                        }
                        if ($row['profile_path']) {
                                $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['profile_path'];
                        }else{
                                $item['poster_path'] = get_webinfo('theme_url').'img/no-profile.jpg';
                        }
	                    $item['overview'] =  $row['overview'];
	                    $item['release_date'] =  $row['release_date'];
	                    $item['popularity'] =  $row['popularity'];
	                    $item['vote_average'] =  $row['vote_average'];
	                    $item['vote_count'] =  $row['vote_count'];
		        	    $results['result'][] = $item;
			    }
		        $results['total_results'][] = $Movie['total_results'];
		        return serialize( $results );
        }
}
function deqila_data_persons( $nama = 'persons', $page = 1, $get = 'getPopularPersons') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $path	= ABSPATH . 'cache/movie/';
	    $name	= $nama.$get.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else { 
		$Movie = $tmdb->$get($page);
		if ( $Movie['results'] ) {
                $results = array();
                foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        $item['title'] =  $row['name'];
                        	if ($row['profile_path']) {
                            $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['profile_path'];
                        	}else{
                            $item['poster_path'] = get_webinfo('theme_url').'img/no-profile.jpg';
                        	}
	                        $item['known_for_department'] =  $row['known_for_department'];
	                        $item['popularity'] =  $row['popularity'];
	                        if ($row['id']) {
                                    $rowp = $tmdb->getPerson( $row['id'] );
                                    $item['birthday'] = date('M d, Y', strtotime( $rowp['birthday']) );
                                    $item['place_of_birth'] = $rowp['place_of_birth'];                               
                                    $item['description'] =  $rowp['biography'];
                            }
		        	        $results['result'][] = $item;
                }
		        $results['total_results'][] = $Movie['total_results'];
		        if ( get_webinfo('_cachemovie') == 'true' ) {
                	   if ( !file_exists( $path ) ) {
                            mkdir( $path, 0755, true );
				            file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				            file_put_contents( $path . $name, serialize( $results ) );
		                }
		        }
		        return serialize( $results );
        }
	    }
}
function deqila_data_year( $nama = 'yeartv', $years = '', $page = 1, $get = 'discover', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/tv/';
 	    $name	= $nama.$years.'tv'.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($years,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
                        	if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                            if ($row['original_name']) {
                                $item['original_title'] = $row['original_name'];
                            } else {
                                $item['original_title'] = $row['name'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['first_air_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachetv') == 'true' ) {
                	    if ( !file_exists( $path ) ) {
                        	    mkdir( $path, 0755, true );
				                file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				                file_put_contents( $path . $name, serialize( $results ) );
		                }
		                }
		                return serialize( $results );
		        }
		       
	    }
}
function deqila_data_year_movie( $nama = 'yearmovie', $year = '', $page = 1, $get = 'discoverYearMovie', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
	    $path	= ABSPATH . 'cache/movie/';
 	    $name	= $nama.$year.'movie'.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		        $Movie = $tmdb->$get($year,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
	                        if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                            if ($row['original_title']) {
                                    $item['original_title'] = $row['original_title'];
                                    } else {
                                    $item['original_title'] = $row['title'];
                                }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                            $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                            $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
                                    $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachemovie') == 'true' ) {
                	    if ( !file_exists( $path ) ) {
                        	    mkdir( $path, 0755, true );
				                file_put_contents( $path . $name, serialize( $results ) );
                        }else {
				                file_put_contents( $path . $name, serialize( $results ) );
		                }
		                }
		                return serialize( $results );
		        }
		       
	    }
}
function deqila_data_country( $nama='tv',$country = '', $page = 1, $get = 'discoverCountry', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $path	= ABSPATH . 'cache/tv/';
	    $name	= $nama.$country.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
        $Movie = $tmdb->$get($country,$page);
		if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
	                        if ($row['name']!=null) {
                                	$item['title'] = $row['name'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['title'] = $rowww['name'];
                            }
                            if ($row['original_name']) {
                                    $item['original_title'] = $row['original_name'];
                            } else {
                                    $item['original_title'] = $row['name'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
                                $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getTVShow( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
                            if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                        	} 
	                        $item['release_date'] =  $row['first_air_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachetv') == 'true' ) {
                        	   if ( !file_exists( $path ) ) {
                                    mkdir( $path, 0755, true );
        				            file_put_contents( $path . $name, serialize( $results ) );
                                }else {
        				            file_put_contents( $path . $name, serialize( $results ) );
        		                }
        		        }
        		        return serialize( $results );
		        }
	    }
}
function deqila_data_countryMovie( $nama='movie', $country = '', $page = 1, $get = 'discoverMovieCountry', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $path	= ABSPATH . 'cache/movie/';
	    $name	= $nama.$country.$page.'_'.$negara.'.json';
	    if ( file_exists( $path . $name ) && ! deqila_expire( $path . $name ) ) {
		        $data	= file_get_contents( $path . $name );
		        return $data;
	    } else {
		$Movie = $tmdb->$get($country,$page);
		        if ( $Movie['results'] ) {
		                if ( $debug == 'true' ) { debug($Movie); }
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
	                        if ($row['id']) {
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    if (is_array($rowww['genres'])){
             	     	            $ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	            $item['genre'] = implode("",$genress);
             	     	            }
             	     	            if (is_array($rowww['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	        	$item['cast'] = implode(", ",$casts);
     	     	        	        }
                            }
	                        if ($row['title']!=null) {
                                	$item['title'] = $row['title'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['title'] = $rowww['title'];
                            }
                            if ($row['original_title']) {
                                    $item['original_title'] = $row['original_title'];
                                    } else {
                                    $item['original_title'] = $row['title'];
                                    }
                        	if ($row['poster_path']) {
                        		    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                        	}else{
                                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                        	}
                        	if ($row['backdrop_path']) {
                        	        $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                        	}else{
                                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                        	}
	                        if ($row['overview']!=null) {
                                $item['overview'] =  $row['overview'];
                        	} else {
                        	        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                                    $rowww = $tmdb->getMovie( $row['id'] );
                                    $item['overview'] =  $rowww['overview'];
                            }
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
	                        if($row['vote_average'] > 0) {
                            	$item['index_rating'] =  $row['vote_average'];
                            	$item['empty_rating'] =  11 - $item['index_rating'];
                            } else {
                            	$item['index_rating'] =  0;
                            	$item['empty_rating'] = 10;
                            }
		        	        $results['result'][] = $item;
			            }
		                $results['total_results'][] = $Movie['total_results'];
		                if ( get_webinfo('_cachemovie') == 'true' ) {
                        	   if ( !file_exists( $path ) ) {
                                    mkdir( $path, 0755, true );
        				            file_put_contents( $path . $name, serialize( $results ) );
                                }else {
        				            file_put_contents( $path . $name, serialize( $results ) );
        		                }
        		        }
        		        return serialize( $results );
		        }
	    }
}
function deqila_data_network( $nama = 'network', $network = '', $page = 1, $get = 'discoverNetwork', $debug = '') {
        global $negara;
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $Movie = $tmdb->$get($network,$page);
		if ( $Movie['results'] ) {
		    if ( $debug == 'true' ) { debug($Movie); }
                $results = array();
                foreach((array)$Movie['results'] as $row) {
	            $item['id'] =  $row['id'];
	            if ($row['id']) {
                        $rowww = $tmdb->getTVShow( $row['id'] );
                        if (is_array($rowww['genres'])){
             	     	$ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$item['genre'] = implode("",$genress);
             	        }
             	     	if (is_array($rowww['credits']['cast'])) {       
             	     	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$item['cast'] = implode(", ",$casts);
     	     	        }
                }
                $item['title'] =  $row['name'];
                if ($row['original_name']) {
                $item['original_title'] = $row['original_name'];
                } else {
                $item['original_title'] = $row['title'];
                }
                if ($row['id']!=null) {
                                $rowwz = $tmdb->getTVShow( $row['id'] );
                                $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                                $item['release_date'] =  $rowwz['last_air_date'];
                                $item['tv_last_episode_to_air'] = $rowwz['last_episode_to_air']['episode_number'];
                                $item['tv_last_season_to_air'] = $rowwz['last_episode_to_air']['season_number'];
                        	} 
                if ($row['poster_path']) {
                    $item['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['poster_path'];
                }else{
                    $item['poster_path'] = get_webinfo('theme_url') . 'img/no-cover.jpg';
                }
                if ($row['backdrop_path']) {
                    $item['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$row['backdrop_path'];
                }else{
                    $item['backdrop_path'] = get_webinfo('theme_url') . 'img/no-backdrop.jpg';
                }
	            $item['overview'] =  $row['overview'];
                if ($row['id']!=null) {
                    $rowwz = $tmdb->getTVShow( $row['id'] );
                    $item['episode_run_time'] =  $rowwz['last_episode_to_air']['episode_number'];
                    } 
	            $item['release_date'] =  $row['first_air_date'];
                $item['popularity'] =  $row['popularity'];
                $item['vote_average'] =  $row['vote_average'];
                $item['vote_count'] =  $row['vote_count'];
    	        $results['result'][] = $item;
	            }
                $results['total_results'][] = $Movie['total_results'];
		        return $results;
		  }
	    
}
if( $_GET['do'] == "category" ) {
        if ( empty( $_GET['page'] ) ) { 
                $page = 1;
        }else{ 
                $page = $_GET['page'];
                $hal = ' - ' .$page. ' ';
        }
        $title = ucwords ( strtolower ( str_replace('-',' ',$_GET['term'] ) ) );
        $hack_title = __('menu','genre') . ' ' . $title . $hal . ' | ' . $options['webname'];
        $titulo = __('menu','genre') . ' ' . $title . $hal;
        $hack_description = __('menu','genre') . ' ' . $title . ' | ' . $options['webname'] . ' - ' . $options['webdescription'];
        $hack_keywords = strtolower( strtolower ( str_replace('-',' ',$_GET['term'] ) ) )  . ',';
}
if( $_GET['get'] == "person" ) {
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $row = $tmdb->getPerson($_GET['pr']);
		if ( $row['status_code'] == ''){
            $singlep['id'] = $row['id'];
            $singlep['birthday'] = $row['birthday'];
            $singlep['popularity'] = $row['popularity'];
            $singlep['place_of_birth'] = $row['place_of_birth'];
            $singlep['known_for_department'] = $row['known_for_department'];
            $singlep['homepage'] = $row['homepage'];
		    $singlep['title'] = $row['name'];
            if ($row['profile_path']) {
                $singlep['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['profile_path'];
            }else{
                $singlep['poster_path'] = get_webinfo('theme_url').'img/no-profile.jpg';
            }
		    if (is_array($row['also_known_as'])){
                $also_known = array();foreach($row['also_known_as'] as $result) : $also_known[] = $result;endforeach;
                $singlep['known'] = implode( ", ",$also_known );
            }
            if ($row['biography']!=null) {
                $singlep['description'] =  $row['biography'];
            } else {
                $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                $rowww = $tmdb->getPerson($row['id']);
                $singlep['description'] =  $rowww['biography'];
            }
            if (is_array($row['images']['profiles'])) {
                $image_path = array();foreach( $row['images']['profiles'] as $result) : $image_path[] = '<img itemprop="image" src="//image.tmdb.org/t/p/w342'.$result['file_path'].'"/>';endforeach;
                $singlep['imagesprofiles'] = implode( "",$image_path );
            }
            if (is_array($row['movie_credits']['cast'])) {
            foreach((array)$row['movie_credits']['cast'] as $moviecredit) {
                    $movcre['id'] = $moviecredit['id'];
                    if ($moviecredit['id']) {
                        $rowww = $tmdb->getMovie( $moviecredit['id'] );
                        if (is_array($rowww['genres'])){
             	     	$ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$movcre['genre'] = implode("",$genress);
             	        }
             	     	if (is_array($rowww['credits']['cast'])) {       
             	     	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$movcre['cast'] = implode(", ",$casts);
     	     	        }
                    }
                    $movcre['overview'] = $moviecredit['overview'];
                    $movcre['release_date'] = $moviecredit['release_date'];
                    $movcre['popularity'] = $moviecredit['popularity'];
                    $movcre['vote_average'] = $moviecredit['vote_average'];
                    $movcre['vote_count'] = $moviecredit['vote_count'];
                    $movcre['title'] =  $moviecredit['title'];
                    if ($moviecredit['original_title']) {
                    $movcre['original_title'] = $moviecredit['original_title'];
                    } else {
                    $movcre['original_title'] = $moviecredit['title'];
                    }
                    if ($moviecredit['poster_path']) {
                            $movcre['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$moviecredit['poster_path'];
                    }else{
                            $movcre['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                    }
                    if ($moviecredit['backdrop_path']) {
                            $movcre['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$moviecredit['backdrop_path'];
                    }else{
                            $movcre['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                    }
                    $singlep['moviecredit'][] = $movcre;
            }
     	    }
     	    if (is_array($row['tv_credits']['cast'])) {
            foreach((array)$row['tv_credits']['cast'] as $tvcredit) {
                    $tvcre['id'] = $tvcredit['id'];
                    if ($tvcredit['id']) {
                        $rowww = $tmdb->getTVShow( $tvcredit['id'] );
                        if (is_array($rowww['genres'])){
             	     	$ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$tvcre['genre'] = implode("",$genress);
             	        }
             	     	if (is_array($rowww['credits']['cast'])) {       
             	     	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$tvcre['cast'] = implode(", ",$casts);
     	     	        }
                    }
                    $tvcre['overview'] = $tvcredit['overview'];
                    $tvcre['release_date'] = $tvcredit['first_air_date'];
                    $tvcre['popularity'] = $tvcredit['popularity'];
                    $tvcre['vote_average'] = $tvcredit['vote_average'];
                    $tvcre['vote_count'] = $tvcredit['vote_count'];
                    $tvcre['title'] =  $tvcredit['name'];
                    if ($tvcredit['original_name']) {
                    $tvcre['original_title'] = $tvcredit['original_name'];
                    } else {
                    $tvcre['original_title'] = $tvcredit['name'];
                    }
                    if ($tvcredit['poster_path']) {
                            $tvcre['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$tvcredit['poster_path'];
                    }else{
                            $tvcre['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                    }
                    if ($tvcredit['backdrop_path']) {
                            $tvcre['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$tvcredit['backdrop_path'];
                    }else{
                            $tvcre['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                    }
                    $singlep['tvcredit'][] = $tvcre;
            }
     	    }
     	    if (is_array($row['movie_credits']['crew'])) {
            foreach((array)$row['movie_credits']['crew'] as $moviecreditcrew) {
                    $movcrecrew['id'] = $moviecreditcrew['id'];
                    if ($moviecreditcrew['id']) {
                        $rowww = $tmdb->getMovie( $moviecreditcrew['id'] );
                        if (is_array($rowww['genres'])){
             	     	$ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$movcrecrew['genre'] = implode("",$genress);
             	        }
             	     	if (is_array($rowww['credits']['cast'])) {       
             	     	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$movcrecrew['cast'] = implode(", ",$casts);
     	     	        }
                    }
                    $movcrecrew['overview'] = $moviecreditcrew['overview'];
                    $movcrecrew['release_date'] = $moviecreditcrew['release_date'];
                    $movcrecrew['popularity'] = $moviecreditcrew['popularity'];
                    $movcrecrew['vote_average'] = $moviecreditcrew['vote_average'];
                    $movcrecrew['vote_count'] = $moviecreditcrew['vote_count'];
                    $movcrecrew['title'] =  $moviecreditcrew['title'];
                    if ($moviecreditcrew['original_title']) {
                    $movcrecrew['original_title'] = $moviecreditcrew['original_title'];
                    } else {
                    $movcrecrew['original_title'] = $moviecreditcrew['title'];
                    }
                    if ($moviecreditcrew['poster_path']) {
                            $movcrecrew['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$moviecreditcrew['poster_path'];
                    }else{
                            $movcrecrew['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                    }
                    if ($moviecreditcrew['backdrop_path']) {
                            $movcrecrew['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$moviecreditcrew['backdrop_path'];
                    }else{
                            $movcrecrew['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                    }
                    $singlep['moviecreditcrew'][] = $movcrecrew;
            }
     	    }
     	    if (is_array($row['tv_credits']['crew'])) {
            foreach((array)$row['tv_credits']['crew'] as $tvcreditcrew) {
                    $tvcrecrew['id'] = $tvcreditcrew['id'];
                    if ($tvcreditcrew['id']) {
                        $rowww = $tmdb->getTVShow( $tvcreditcrew['id'] );
                        if (is_array($rowww['genres'])){
             	     	$ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$tvcrecrew['genre'] = implode("",$genress);
             	        }
             	     	if (is_array($rowww['credits']['cast'])) {       
             	     	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$tvcrecrew['cast'] = implode(", ",$casts);
     	     	        }
                    }
                    $tvcrecrew['overview'] = $tvcreditcrew['overview'];
                    $tvcrecrew['release_date'] = $tvcreditcrew['first_air_date'];
                    $tvcrecrew['popularity'] = $tvcreditcrew['popularity'];
                    $tvcrecrew['vote_average'] = $tvcreditcrew['vote_average'];
                    $tvcrecrew['vote_count'] = $tvcreditcrew['vote_count'];
                    $tvcrecrew['title'] =  $tvcreditcrew['name'];
                    if ($tvcreditcrew['original_name']) {
                    $tvcrecrew['original_title'] = $tvcreditcrew['original_name'];
                    } else {
                    $tvcrecrew['original_title'] = $tvcrecrew['name'];
                    }
                    if ($tvcreditcrew['poster_path']) {
                            $tvcrecrew['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$tvcreditcrew['poster_path'];
                    }else{
                            $tvcrecrew['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                    }
                    if ($tvcreditcrew['backdrop_path']) {
                            $tvcrecrew['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$tvcreditcrew['backdrop_path'];
                    }else{
                            $tvcrecrew['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                    }
                    $singlep['tvcreditcrew'][] = $tvcrecrew;
            }
     	    }
            $hack_title = $options['people_before'] . $singlep['title'] . $options['people_after'] . ' - '. $options['webname'];
            $hack_description = short($singlep['title'].' - '.$singlep['description']);
            $hack_keywords = $singlep['title'] .' - '.$known;
        }else{
        header('Location: /');
        }
}
if( $_GET['get'] == "company" ) {
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $row = $tmdb->getCompany($_GET['id']);
		if ( $row['status_code'] == '') {
            $singlec['id'] =  $row['id'];
            $singlec['title'] = $row['name'];
            if ($row['logo_path']!=null) {
                $singlec['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['logo_path'];
            }else{
                $singlec['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
            }
            if ($row['overview']!=null) {
                        $singlec['description'] =  $row['overview'];
                    } else {
                        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                        $rowww1 = $tmdb->getMovie( $row['id'] );
                        $singlec['description'] =  $rowww1['overview'];
            }
            $singlec['headquarters'] =  $row['headquarters'];
            $singlec['homepage'] =  $row['homepage'];
            $singlec['origin_country'] =  $row['origin_country'];
            if (is_array($row['movies']['results'])) {
            foreach((array)$row['movies']['results'] as $moviecredit) {
                    $movcre['id'] = $moviecredit['id'];
                    if ($moviecredit['id']) {
                        $rowww = $tmdb->getMovie( $moviecredit['id'] );
                        if (is_array($rowww['genres'])){
             	     	$ic = 0;$genress  = array();foreach($rowww['genres'] as $result) : $genress[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$movcre['genre'] = implode("",$genress);
             	        }
             	     	if (is_array($rowww['credits']['cast'])) {       
             	     	$ic = 0;$casts = array();foreach($rowww['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 0) break;endforeach;
             	     	$movcre['cast'] = implode(", ",$casts);
     	     	        }
                    }
                    if ($moviecredit['overview']!=null) {
                        $movcre['overview'] =  $moviecredit['overview'];
                    } else {
                        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                        $rowww = $tmdb->getMovie($moviecredit['id'] );
                        $movcre['overview'] =  $rowww['overview'];
                    }
                    $movcre['release_date'] = $moviecredit['release_date'];
                    $movcre['popularity'] = $moviecredit['popularity'];
                    $movcre['vote_average'] = $moviecredit['vote_average'];
                    $movcre['vote_count'] = $moviecredit['vote_count'];
                    if ($moviecredit['title']!=null) {
                        $movcre['title'] =  $moviecredit['title'];
                    }else{
                        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], 'en', true);
                        $rowww = $tmdb->getMovie( $moviecredit['id'] );
                        $movcre['title'] =  $rowww['title'];
                    }
                    if ($moviecredit['original_title']) {
                            $movcre['original_title'] = $moviecredit['original_title'];
                        } else {
                            $movcre['original_title'] = $moviecredit['title'];
                    }
                    if ($moviecredit['poster_path']) {
                            $movcre['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$moviecredit['poster_path'];
                    }else{
                            $movcre['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
                    }
                    if ($moviecredit['backdrop_path']) {
                            $movcre['backdrop_path'] = 'https://image.tmdb.org/t/p/w1280'.$moviecredit['backdrop_path'];
                    }else{
                            $movcre['backdrop_path'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                    }
                    $singlec['moviecredit'][] = $movcre;
            }
     	    }
     	    $hack_title = $singlec['title'] . ' Studio Details - '. $options['webname'];
            $hack_description = short($singlec['title'] . ' Studio Details - '. $options['webname']);
            $hack_keywords = $singlec['title'];
        }else{
            header('Location: /');
        }
}
if( $_GET['get'] == "network" ) {
        $arraytmdb = explode(",", get_webinfo('Tmdb_api'));
        $tmdb = new TMDB($arraytmdb[array_rand($arraytmdb)], $negara, true);
        $row = $tmdb->getNetwork($_GET['id']);
		if ( $row['status_code'] == '') {
            $singlen['id'] =  $row['id'];
            $singlen['title'] = $row['name'];
            if ($row['logo_path']!=null) {
                $singlen['poster_path'] = 'https://image.tmdb.org/t/p/w342'.$row['logo_path'];
            }else{
                $singlen['poster_path'] = get_webinfo('theme_url').'img/no-cover.jpg';
            }
            $singlen['description'] =  $row['description'];
            $singlen['headquarters'] =  $row['headquarters'];
            $singlen['homepage'] =  $row['homepage'];
            $singlen['origin_country'] =  $row['origin_country'];
     	    $hack_title = $singlen['title'] . ' Studio Details - '. $options['webname'];
            $hack_description = short($singlen['title'] . ' Studio Details - '. $options['webname']);
            $hack_keywords = $singlen['title'];
        }else{
            header('Location: /');
        }
}
if( $_GET['get'] == "moviedesc" ) {
	    if ( !empty($_GET['id']) ) {
        if (is_numeric( $_GET['id'] ) || strposa( $_GET['id'], 'tt' ) !== false ) { $TMDBID = $_GET['id']; }else{ header('Location: /'); }
        $path = ABSPATH . '/cache/movie/';
		$basename = $_GET['id'].'.json';
		$arraytmdb = explode(",", $options['Tmdb_api']);
        $apikey = $arraytmdb[array_rand($arraytmdb)];
        $tmdb = new TMDB($apikey, 'en', true);
        $row = $tmdb->getMovie( $TMDBID );
			if ( $row['status_code'] == ''){
                        	$single['id'] = $row['id'];
                        	$single['title'] = $row['title'];
                        	$single['original_title'] = $row['original_title'];
				            $single['release_date']  = $row['release_date'];
				            $single['year']  = date('Y', strtotime( $single['release_date'] ) );
				            $single['vote_average'] = $row['vote_average'];
                            $single['vote_count'] = $row['vote_count'];
                            $single['tagline'] = $row['tagline'];
                            $single['budget'] = $row['budget'];
                            $single['revenue'] = $row['revenue'];
                            $single['homepage'] = $row['homepage'];
                            $single['popularity'] = $row['popularity'];
                            $single['description']  = $row['overview'];
                        	$single['trailers'] = $row['trailers']['youtube'][0]['source'];
                        	if($row['vote_average'] > 0) {
	                                $get_rating =  $row['vote_average'];
	                                $single['vote_average'] =  11 - $get_rating;
                            } else {
	                                $single['vote_average'] = 10;
                            }
                            if (is_array($row['alternative_titles']['titles']))
                     	    {
                             	    $alternative = array();foreach($row['alternative_titles']['titles'] as $result) : $alternative[] = $result['title'];endforeach;
                             	    $single['alternative_titles'] = implode(", ",$alternative);
                     	    }
                     	    if (is_array($row['images']['backdrops']))
                     	    {
                             	    $imgbackdrops = array();foreach($row['images']['backdrops'] as $result) : $imgbackdrops[] = "<img style='width: 24%;float: left;margin-right:10px;margin-bottom:10px;' src='https://image.tmdb.org/t/p/w780". $result['file_path']."'>";endforeach;
                             	    $single['images'] = implode("",$imgbackdrops);
                     	    }
                        	$single['poster'] = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
                        	if (is_array($row['genres'])){
             	     	            $genres  = array();foreach($row['genres'] as $result) : $genres[] = $result['name'];endforeach;
             	     	            $single['genre'] = implode(", ",$genres);
     	     	            }
     	     	        	if (is_array($row['credits']['cast'])) {       
             	     	        	$ic = 0;$casts = array();foreach($row['credits']['cast'] as $result) :$casts[] = $result['name'];if ($ic++ == 5) break;endforeach;
             	     	        	$single['cast'] = implode(", ",$casts);
     	     	        	}
     	     	        	if (is_array($row['credits']['crew'])) {       
             	     	        	$ic = 0;$crews = array();foreach($row['credits']['crew'] as $result) :$crews[] = $result['name'].' ('.$result['job'].')';if ($ic++ == 5) break;endforeach;
             	     	        	$single['crew'] = implode(", ",$crews);
     	     	        	}
     	     	     		if (is_array($row['production_countries'])) {
             	     	     		$countrys = array();foreach($row['production_countries'] as $result) : $countrys[] = $result['name'];endforeach;
             	     	     		$single['country']  = implode( ", ",$countrys );
     	     	     		}
                        	if ($row['runtime']!=null) {
            $single['runtime'] = $row['runtime'];
                        	} else {
            $single['runtime'] = '1:47:31';
                        	}
                     	    if (is_array($row['keywords']['keywords']))
                     	    {
                             	    $keyword = array();foreach($row['keywords']['keywords'] as $result) : $keyword[] = $result['name'];endforeach;
                             	    $single['keyword'] = implode(", ",$keyword);
                     	    }
                     	    if (is_array($row['spoken_languages']))
                            {
                                    $language = array();foreach($row['spoken_languages'] as $result) : $language[] = $result['name'];endforeach;
                                    $single['languages'] = implode(", ",$language);
                            }
         	     	         if (is_array($row['production_companies']))
                     	    {
                             	    $production = array();foreach($row['production_companies'] as $result) : $production[] = $result['name'];endforeach;
                             	    $single['companies'] = implode(", ",$production);
                     	    }
                        	$_SESSION[ $basename ] = $single;
            }
	}else{ 
		header('Location: /'); 
	}

}
if( $_GET['get'] == "tvdesc" ) {
	    if ( !empty($_GET['id']) ) {
		        $arraytmdb = explode(",", $options['Tmdb_api']);
                $apikey = $arraytmdb[array_rand($arraytmdb)];
                $tmdb = new TMDB($apikey, 'en', true);
                if(strpos($_GET['id'], '-') !== false) {
                        $str = explode("-", $_GET['id']);
                        $TMDBID = $str[0];
                        if($str[2] != ''):
                                $row = $tmdb->getTVShow($TMDBID);
                                $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                $single['title'] = $row['name'];
                                $kotretan_title = $row3['name'];
                            	if ($row['original_name']) {
            $single['original_name'] = $row['original_name'];
                            	} else {
                $single['original_name'] = $single['title'];
                            	}
                                if($kotretan_title != 'Episode '.$str[2]){$title_eps = $kotretan_title;}else{$title_eps = ' ';}
                                if(empty($row3['season_number']) or empty($row3['episode_number'])){
                                $cari_judul = $single['title'] .' - Season '.$str[1].' Episode '.$str[2].' '. $title_eps;
                                $hack_title = $options['title_tv_before'] . $single['title'] .' - Season '.$str[1].' Episode '.$str[2].' : '. $title_eps . $options['title_tv_after'] ;
                                }else{
                                $cari_judul = $single['title'] .' - Season '.$row3['season_number'].' Episode '.$row3['episode_number'].' '. $title_eps;   
                                $hack_title = $options['title_tv_before'] . $single['title'] .' - Season '.$row3['season_number'].' Episode '.$row3['episode_number'].' : '. $title_eps . $options['title_tv_after'] ;
                                }
                                $cari_judul2 = ' Season '.$row3['season_number'];
                                if(empty($row3['overview'])){
                                $single['description'] = $row['overview'];
                                }else{
                                $single['description'] = $row3['overview'];    
                                }
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID.'-'.$str[1].'-'.$str[2];
                                $single['air_date'] = date('d M Y', strtotime( $row3['air_date'] ) );
                                $single['year'] = date('Y', strtotime( $row3['air_date'] ) );
                        elseif($str[1] != ''):
                                $row = $tmdb->getTVShow($TMDBID);
                                $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                $single['title'] = $row['name'];
                                $cari_judul = $single['title'] .' - Season '.$row2['season_number'];
                                $cari_judul2 =' Season '.$row2['season_number'];
                                $hack_title = $options['title_tv_before'] . $single['title'] .' - '. $row2['name'] . $options['title_tv_after'];
                                $single['description'] = $row['overview'];
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID.'-'.$str[1];
                                $single['air_date'] = date('d M Y', strtotime( $row2['air_date'] ) );
                                $single['year'] = date('Y', strtotime( $row2['air_date'] ) );
                        else:
                                $row = $tmdb->getTVShow($TMDBID);
                                $single['title'] = $row['name'];
                                $cari_judul = $single['title'];
                                $cari_judul2 =' Season '.$row['last_seasons_number'];
                                $hack_title = $options['title_tv_before'] . $single['title'] . $options['title_tv_after'];
                                $single['description'] = $row['overview'];
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID;
                                $single['year'] = date('Y', strtotime( $row['first_air_date'] ) );

                        endif;
                } else {
                        $TMDBID = $_GET['id'];
                        $row = $tmdb->getTVShow($TMDBID);
                        if ( $row['name'] != '' ) {
                                $single['title'] = $row['name'];
                                $cari_judul = $single['title'];
                                $cari_judul2 =' Season '.$row['last_seasons_number'];
                                $hack_title = $options['title_tv_before'] . $single['title'] . $options['title_tv_after'];
                                $single['description']  = $row['overview'];
                                $hack_description = short($hack_title.' - '.$single['description']);
        	                    $hack_keywords = strtolower( $hack_title );
                                $single['server1'] = $TMDBID;
                        }
                }
                if ( $row['name'] != '' ) {
                        include(ABSPATH . THMPATH . $options['theme_name'] . '/countryname.php');
                        $single['id'] = $row['id'];
                        $single['air_date'] = $row['first_air_date'];
                        $single['last_air_date'] = $row['last_air_date'];
                        $run_time0 = isset($row['episode_run_time'][0]) ? $row['episode_run_time'][0] : '26';
                        $run_time1 = isset($row['episode_run_time'][1]) ? $row['episode_run_time'][1] : '14';
                        //$run_time2 = isset($row['episode_run_time'][2]) ? $row['episode_run_time'][2] : '20';
                        $single['runtime'] = $run_time0. ':'.$run_time1;
                        $single['vote_count'] = $row['vote_count'];
                        $single['number_of_episodes'] = $row['number_of_episodes'];
                        $single['number_of_seasons'] = $row['number_of_seasons'];
                        $single['status'] = $row['status'];
                        $single['popularity'] = $row['popularity'];
                        $single['original_language'] = $row['original_language'];
                        $single['trailersss'] = get_youtube_id( limit_word( $cari_judul, 6 ) .' tv');
                        $single['player'] = '<iframe class="embed-item" src="//www.youtube-nocookie.com/embed/'.$single['trailers'].'?rel=0&amp;controls=0&amp;showinfo=0" width="600" height="315" frameborder="0" allowfullscreen=""></iframe>';
                        if ($row['videos']['results'][0]['key']!=null) {
                              $single['trailers'] = $row['videos']['results'][0]['key'];
                        } elseif ($row['videos']['results'][0]['key']=null){
                              $single['trailers'] = get_youtube_id( limit_word( $cari_judul, 6 ) .' tv');
                        } else {                                    
                            $tmdb = new TMDB($apikey, 'en', true);
                            $row = $tmdb->getTVShow($row['id']);
                            $single['trailers'] = $row['videos']['results'][1]['key'];
                        }
                        if (is_array($row['images']['backdrops'])){
             	     	            $backdropsimg  = array();foreach($row['images']['backdrops'] as $result) : $backdropsimg[] = "<img style='width: 24%;float: left;margin-right:10px;margin-bottom:10px;' src='https://image.tmdb.org/t/p/w780". $result['file_path']."'>";endforeach;
             	     	            $single['images'] = implode("",$backdropsimg);
     	     	            }
     	     	        $single['poster'] = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
     	     	        if (is_array($row['genres'])){
             	     	        $genres  = array();foreach($row['genres'] as $result) : $genres[] = $result['name'];endforeach;
             	     	        $single['genre'] = implode(", ",$genres);
     	     	            }
     	     	        if (is_array($row['credits']['cast']))
     	     	        {       
             	     	        $casts = array();foreach($row['credits']['cast'] as $result) :$casts[] = $result['name'];endforeach;
             	     	        $single['cast'] = implode(", ",$casts);
     	     	        }
                        if($row['vote_average'] > 0) {
	                        $get_rating =  $row['vote_average'];
	                        $single['vote_average'] =  11 - $get_rating;
                        } else {
	                        $single['vote_average'] = 10;
                        }
                        if (is_array($row['keywords']['results'])) {
                                $keyword_keywords = array();foreach($row['keywords']['results'] as $result) : $keyword_keywords[] = $result['name'];endforeach;
                                $single['keyword'] = implode(", ",$keyword_keywords);
                            }
                     	if (is_array($row['alternative_titles']['results'])){
                             	$alternative = array();foreach($row['alternative_titles']['results'] as $result) : $alternative[] = $result['title'];endforeach;
                             	$single['alternative_titles'] = implode(", ",$alternative);
                     	}
     	     	     	if (is_array($row['networks']))
                     	{
                                $networks = array();foreach($row['networks'] as $result) : $networks[] = $result['name'];endforeach;
                             	$single['networks'] = implode(", ",$networks);
                     	}
     	     	        if (is_array($row['credits']['crew']))
     	     	        {       
             	     	        $crews = array();foreach($row['credits']['crew'] as $result) :$crews[] = $result['name'].' ('.$result['job'].')';endforeach;
             	     	        $single['crew'] = implode(", ",$crews);
     	     	        }
     	     	        if (is_array($row['seasons'])) {
             	     	        $single['seasons'] = $row['seasons'];
             	     	        if($str[1] != '') {
             	     	                if (is_array($row2['episodes'])) {
             	     	                        $single['episodes'] = $row2['episodes'];
             	     	                }
             	     	        }else{
             	     	                $numItems = count($row['seasons']);
                                        $ix = 0;
                                        foreach($row['seasons'] as $key=>$value) {
                                if(++$ix === $numItems) {
                                $rowx['season_number'] = $tmdb->getTVSeason($TMDBID, '/season/'.$value['season_number']);
                                $epskur = --$ix;
                                $sea_nmbr = $value['season_number'];
                                }
                                        }
                                        $single['episodes'] = $rowx['season_number']['episodes'];
             	     	        }
     	     	        }
                }
        }else{ 
		        header('Location: /'); 
        }
}
function __( $folder = '' , $query = '' ){
        global $negara;
        if ( file_exists( ABSPATH . 'dq-admin/lang/' . $negara . '/'.$folder.'.php' ) ) {
                $variable = include( ABSPATH . 'dq-admin/lang/' . $negara . '/'.$folder.'.php' );
                if ( $variable['title'] ) {
                        return $variable['title'][$query];
                }else{
                        return $variable[$query];
                }
        }else{
                $variable = include( ABSPATH . 'dq-admin/lang/en/'.$folder.'.php' );
                if ( $variable['title'] ) {
                        return $variable['title'][$query];
                }else{
                        return $variable[$query];
                }
        }
        unset($variable);
}
function seocat( $query , $id = '' ){
        global $negara;
        if ( empty( $_GET['language'] ) ) {
        if ( $query ) :
                return site_url() . '/'. get_webinfo('category_url') .'/'.sanitize_title( $query ).'/'.$id;
        else:
                return site_url().'/?terms='.$id;
        endif;
        }else{ if ( $query ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('category_url') .'/'.sanitize_title( $query ).'/'.$id;
                else:
                return site_url() .'/'. $_GET['language']. '/?terms='.$id;
        endif; }
}
function kw_id( $id , $query = '' ){
        global $negara;
        if ( empty( $_GET['language'] ) ) {
        if ( $query ) :
                return site_url() . '/'. get_webinfo('keyword_url') .'/'.sanitize_title( $query ).'/'.$id;
        else:
                return site_url().'/?terms='.$id;
        endif;
        }else{ if ( $query ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('keyword_url') .'/'.sanitize_title( $query ).'/'.$id;
                else:
                return site_url() .'/'. $_GET['language']. '/?terms='.$id;
        endif; }
}
function seoperson( $id , $query = '' ){
        global $negara;
        if ( empty( $_GET['language'] ) ) { 
        if ( $query ) :
                return site_url() . '/'. get_webinfo('_person') .'/'. $id .'/'. sanitize_title( $query );
        endif;
        }else{ if ( $query ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('_person') .'/'. $id .'/'. sanitize_title( $query );
        endif; }
}
function movie_single( $id , $query = '' ) {
        global $negara;
        global $mylinksub;
        if ( empty( $_GET['language'] ) ) { 
            if ( $query ) :
                return site_url() . '/'. get_webinfo('_movieurl') .'/'. $id .'/'. sanitize_title( $query ) . get_webinfo('_endmovieurl').$mylinksub;
        endif;
        }else{ if ( $query ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('_movieurl') .'/'. $id .'/'. sanitize_title( $query ) . get_webinfo('_endmovieurl').$mylinksub;
        endif; }
        
}
function tv_single( $id , $query = '' ) {
        global $negara;
        global $mylinksub;
        if ( empty( $_GET['language'] ) ) { 
        if ( $id ) :
                return site_url() . '/'. get_webinfo('_tvurl') .'/'. $id .'/'. sanitize_title( $query ) . get_webinfo('_endtvurl').$mylinksub;
        endif;
        }else{  if ( $id ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('_tvurl') .'/'. $id .'/'. sanitize_title( $query ) . get_webinfo('_endtvurl').$mylinksub;
        endif; }
}
function seocompany( $id , $query = '' ) {
        global $negara;
        if ( empty( $_GET['language'] ) ) { 
        if ( $id ) :
                return site_url() . '/'. get_webinfo('_company') .'/'. $id .'/'. sanitize_title( $query );
        endif;
        }else{  if ( $id ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('_company') .'/'. $id .'/'. sanitize_title( $query );
        endif; }
}
function seonetwork( $id , $query = '' ) {
        global $negara;
        if ( empty( $_GET['language'] ) ) { 
        if ( $id ) :
                return site_url() . '/'. get_webinfo('_network') .'/'. $id .'/'. sanitize_title( $query );
        endif;
        }else{  if ( $id ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('_network') .'/'. $id .'/'. sanitize_title( $query );
        endif; }
}
function seocountry( $id = '') {
        global $negara;
        if ( empty( $_GET['language'] ) ) { 
        if ( $id ) :
                return site_url() . '/'. get_webinfo('country_url') .'/'.$id;
        endif;
        }else{  if ( $id ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('country_url') .'/'.$id;
        endif; }
}
function seoyear( $id = '') {
        global $negara;
        if ( empty( $_GET['language'] ) ) { 
        if ( $id ) :
                return site_url() . '/'. get_webinfo('year_url') .'/'.$id;
        endif;
        }else{  if ( $id ) :
                return site_url() .'/'. $_GET['language']. '/'. get_webinfo('year_url') .'/'.$id;
        endif; }
}
function make_seo( $query = '' ) {
        global $options;
        if ( $query ) :
                return site_url() . '/'.$options['search'].'-'. sanitize_title($query) . $options['_endurl'];
              //return site_url() . '/?s='.urlencode($query);
        endif;
}
function sitemap_seo( $query = '' ) {
        global $options;
        if ( $query ) :
                return site_url() . '/'.$options['search'].'/'. sanitize_title($query) . $options['_endurl'];
              //return site_url() . '/?s='.urlencode($query);
        endif;
}
function sitemap_movie_single_seo( $id , $query = '' ) {
        global $negara;
        if ( $query ) :
                return site_url() . '/'. get_webinfo('_movieurl') .'/'. $id .'/'. sanitize_title( $query ) . get_webinfo('_endmovieurl');
        endif;
}
function sitemap_tv_single_seo( $id , $query = '' ) {
        global $negara;
        if ( $query ) :
                return site_url() . '/'. get_webinfo('_tvurl') .'/'. $id .'/'. sanitize_title( $query ) . get_webinfo('_endtvurl');
        endif;
}
function sitemap_person_seo( $id , $query = '' ) {
        global $negara;
        if ( $query ) :
               return site_url() . '/'. get_webinfo('_person') .'/'. $id .'/'. sanitize_title( $query );
        endif;
}
function get_youtube_id($keyword='', $num=10) {
	$keyword = str_replace('-','+',$keyword);
	$keyword = str_replace(' ','+',$keyword);
	$url  =	'https://www.bing.com/search?q='.$keyword.'+site%3Ayoutube.com&count='.$num.'&format=rss';
	$feed = get_contents($url);
	if( strpos($feed,'Ensure words are spelled correctly') !== false ){
		$url  =	'https://www.bing.com/search?q='.urldecode($keyword).'+site%3Ayoutube.com&count='.$num.'&format=rss';
		$feed = get_contents($url);
	}
	$xml = @simplexml_load_string($feed);
	$feed = $xml->channel;
	$arr_result = array();
	if ( !empty($feed->item) ) :
		foreach ($feed->item as $entry) {
			if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $entry->link, $matches)) :
				$arr_result = $matches[1];
                	endif;
		}
	endif;
	return $arr_result;
}
function covtime($youtube_time) {
        preg_match_all('/(\d+)/',$youtube_time,$parts);

        // Put in zeros if we have less than 3 numbers.
        if (count($parts[0]) == 1) {
                array_unshift($parts[0], "0", "0");
        } elseif (count($parts[0]) == 2) {
                array_unshift($parts[0], "0");
        }

        $sec_init = $parts[0][2];
        $seconds = $sec_init%60;
        $seconds_overflow = floor($sec_init/60);

        $min_init = $parts[0][1] + $seconds_overflow;
        $minutes = ($min_init)%60;
        $minutes_overflow = floor(($min_init)/60);

        $hours = $parts[0][0] + $minutes_overflow;

        if($hours != 0)
                return $hours.':'.$minutes.':'.$seconds;
        else
                return $minutes.':'.$seconds;
}
function convertToHoursMins($time, $format = '%d:%d') {
        settype($time, 'integer');
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
}
if ( empty( $_GET['language'] ) ) { 
    if (isset($_POST["s"]) && !empty($_POST["s"])) {
        header("HTTP/1.1 301 Moved Permanently"); 
	    header("Location: /".$options['search'].'/'.urlencode( $_POST["s"] ));
        }
}else{ 
    if (isset($_POST["s"]) && !empty($_POST["s"])) {
        header("HTTP/1.1 301 Moved Permanently"); 
	    header("Location: /".$_GET['language'].'/'.$options['search'].'/'.urlencode( $_POST["s"] ));
        }
}