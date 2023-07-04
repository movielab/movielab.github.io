<?php 
if ( empty( $_GET['page'] ) ) { $page = 1; $hala = ''; }else{ $page = $_GET['page']; $hala = ' - '. $_GET['page'];} 
$hack_title =__('details','watch') .' '. __('menu','top_rated_movie') . ' '. date( 'Y' ) . $hala .' - ' . $options['weblogo']; 
$hack_description = short($hack_title.', Watch All Movies Online, TV online - '.$single['description']); 
$hack_keywords = strtolower( $hack_title ); 
include dirname(__DIR__) .'/header.php'; 
?>
<meta itemprop="image" content="<?php echo get_webinfo('theme_url') ;?>img/og-image-default.jpg"/>
<meta property="og:image" content="<?php echo get_webinfo('theme_url') ;?>img/og-image-default.jpg"/>
<meta name="twitter:image" content="<?php echo get_webinfo('theme_url') ;?>img/og-image-default.jpg"/> 
<?php include(ABSPATH . THMPATH . $options['theme_name'] . '/header2.php')?>
<div class="bd">
            <div class="TpRwCont cont">
                <main>
                    <?php if ( $options['728x90'] == 'true' &&  $options['468x60'] == 'true' &&  $options['320x50'] == 'true' ): ?>
                    <section class="category-list-bx cont">
                		<div class="container">
                                <div class="row">
                                <div class="hidden-xs hidden-sm hidden-md visible-lg text-center" style="margin:15px auto">
                                <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/468x60.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                                <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/468x60.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                                </div>
                                <div class="hidden-xs hidden-sm visible-md hidden-lg text-center" style="margin:15px auto">
                                <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/728x90.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg text-center" style="margin:15px auto">
                                <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/320x50.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                                </div>
                                </div>
                        </div>
                    </section>
                    <?php endif; ?>
                    <section>
                        <div class="Top">
                            <h1><?php echo __('menu','most_favourite') ;?></h1>
                        </div>
                        <div>
                            <p><?php echo __('utilities','movie_recommendation') ;?> <strong><?php echo __('menu','most_favourite') ;?> <?php echo __('menu','movies') ;?></strong> <?php echo __('utilities','des_2') ;?> </p>
                        </div>
                        <ul class="MovieList Rows AX A06 B04 C03 E20">
                                <?php if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; } $movie = unserialize( deqila_data_movie('movie',$page,'getTopRatedMovies') ); if( is_array($movie['result']) ) { foreach ( $movie['result'] as $key => $item ) { if($item['vote_count'] == 0) { $item['new_vote_count'] = 1;}else{ $item['new_vote_count'] = $item['vote_count'];} if($item['vote_count'] == 0) { $item['new_vote_average'] = 1;}else{ $item['new_vote_average'] = $item['vote_average'];} ?>
					            <li class="xxx TPostMv">
                                    <div class="TPost C post type-post status-publish format-standard has-post-thumbnail hentry">
                                        <a href="<?php echo movie_single($item['id'] , $item['title'] );?>">
                                            <div class="Image"><span class="Year"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span>
                                                <figure class="Objf TpMvPlay AAIco-play_arrow"><img width="160" height="242" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo $item['poster_path'];?>" class="lazy attachment-thumbnail size-thumbnail wp-post-image" alt="img"></figure>
                                            </div>
                                            <h2 class="Title"><?php echo $item['title'];?></h2>
                                        </a>
                                        <div class="TPMvCn anmt">
                                            <div class="Title"><?php echo $item['title'];?></div>
                                            <p class="Info"> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                            <div class="Description">
                                                <p>
                                                    <p><?php echo short($item['overview']);?></p>
                                                </p>
                                                <p class="Genre AAIco-movie_creation"><span><?php echo __('details','genre') ;?>:</span> <?php echo $item['genre'];?></p>
                                                <p class="Actors AAIco-person"><span><?php echo __('details','cast') ;?>:</span> <?php echo $item['cast'];?></p>
                                            </div> <img width="160" height="242" data-src="<?php echo $item['poster_path'];?>" class="lazy attachment-thumbnail size-thumbnail wp-post-image bg" alt="img"></div>
                                    </div>
                                </li>
                                <?php if ($key == 19)break; } } ?>
                            </ul>
                            <?php if ( $options['nativeads'] == 'true' ): ?>
                                <div style="margin-top:20px">
                                    <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/nativeads.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <nav class="navigation pagination">
                            <?php 
                            if ($movie['total_results'] > 19) : require_once( ABSPATH. '/dq-includes/o_pagination.php'); 
                            if ($movie['total_results'] > 1000) : $totalResults = 1000; else: $totalResults =$movie['total_results']; endif; 
                            $limit= 20; 
                            if ( empty( $_GET['language'] ) ) { 
                            $link = '/movie-top'; 
                            $pagination = new CSSPagination($totalResults, $limit, $link,'?' ); 
                            }else{ 
                            $link = '/'.$_GET['language'].'/movie-top'; 
                            $pagination = new CSSPagination($totalResults, $limit, $link,'?' );} 
                            $pagination->setPage($_GET['page']); 
                            echo $pagination->showPage(); endif; ?>
                        </nav>
                    </section>
                </main>
                <aside class="widget-area">
                    <?php if ( $options['300x250'] == 'true' ): ?>
                    <div class="got-dvr" style="margin-bottom:20px">
                        <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/300x250.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div id="peli_top_estrenos-2" class="Wdgt">
                        <div class="Title widget-title"><?php echo __('menu','latest_movie') ;?></div>
                        <ul class="MovieList top">
                            <?php if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; } $movie = unserialize( deqila_data_movie('movie',$page,'getUpcomingMovies')); if( is_array($movie['result']) ) { foreach ( $movie['result'] as $key => $item ) { if($item['vote_count'] == 0) { $item['new_vote_count'] = 1;}else{ $item['new_vote_count'] = $item['vote_count'];} if($item['vote_count'] == 0) { $item['new_vote_average'] = 1;}else{ $item['new_vote_average'] = $item['vote_average'];} ?>
                            <li>
                                <div class="TPost A">
                                    <a href="<?php echo movie_single($item['id'] , $item['title'] );?>">
                                        <div class="Image">
                                            <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                        </div>
                                        <div class="Title"><?php echo $item['title'];?></div>
                                    </a>
                                    <p class="Info"> <span><?php for($k=1;$k<=$item['index_rating'];$k++){?><i class="fa-star" style="color:gold;font-size: .875rem;"></i><?php }?><?php for($i=$item['empty_rating'];$i>=1;$i--){?><i class="fa-star" style="color:#8da0bc;font-size: .875rem;"></i><?php $k++; } ?></span> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                </div>
                            </li>
                             <?php if ($key == 4)break; } } ?>
                        </ul>
                    </div>
                    <div id="peli_movies-2" class="Wdgt widget_languages">
                        <div class="Title widget-title"><?php echo __('details','recomendation') ;?></div>
                        <ul class="aa-nv dfx tac" data-tbs=aa-movies>
                            <li class="fg1"><a href="#aa-mov1" class="on"><?php echo __('menu','popular_movie') ;?></a></li>
                            <li class="fg1"><a href="#aa-mov2"><?php echo __('menu','popular_tv') ;?></a></li>
                        </ul>
                        <div class="aa-cn" id="aa-movies">
                            <div id="aa-mov1" class="aa-tb anm-e on">
                                <ul class="MovieList">
                                    <?php if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; } $movie = unserialize( deqila_data_trendingMovie('trend',$page,'getTrendingMovie')); if( is_array($movie['result']) ) { foreach ( $movie['result'] as $key => $item ) { if($item['vote_count'] == 0) { $item['new_vote_count'] = 1;}else{ $item['new_vote_count'] = $item['vote_count'];} if($item['vote_count'] == 0) { $item['new_vote_average'] = 1;}else{ $item['new_vote_average'] = $item['vote_average'];} ?>
                                    <li>
                                        <div class="TPost A">
                                            <a href="<?php echo movie_single($item['id'] , $item['title'] );?>">
                                                <div class="Image">
                                                    <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                                </div>
                                                <div class="Title"><?php echo $item['title'];?></div>
                                            </a>
                                            <p class="Info"> <span><?php for($k=1;$k<=$item['index_rating'];$k++){?><i class="fa-star" style="color:gold;font-size: .875rem;"></i><?php }?><?php for($i=$item['empty_rating'];$i>=1;$i--){?><i class="fa-star" style="color:#8da0bc;font-size: .875rem;"></i><?php $k++; } ?></span> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                        </div>
                                    </li>
                                     <?php if ($key == 3)break; } } ?>
                                </ul>
                            </div>
                            <div id=aa-mov2 class="aa-tb anm-e">
                                <ul class="MovieList">
                                    <?php if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; } $movie = unserialize( deqila_data_trendingTV('trend',$page,'getTrendingTV')); if( is_array($movie['result']) ) { foreach ( $movie['result'] as $key => $item ) { if($item['vote_count'] == 0) { $item['new_vote_count'] = 1;}else{ $item['new_vote_count'] = $item['vote_count'];} if($item['vote_count'] == 0) { $item['new_vote_average'] = 1;}else{ $item['new_vote_average'] = $item['vote_average'];} ?>
                                    <li>
                                        <div class="TPost A">
                                            <a href="<?php echo tv_single($item['id'] , $item['title'] );?>">
                                                <div class="Image">
                                                    <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                                </div>
                                                <div class="Title"><?php echo $item['title'];?></div>
                                            </a>
                                            <p class="Info"> <span><?php for($k=1;$k<=$item['index_rating'];$k++){?><i class="fa-star" style="color:gold;font-size: .875rem;"></i><?php }?><?php for($i=$item['empty_rating'];$i>=1;$i--){?><i class="fa-star" style="color:#8da0bc;font-size: .875rem;"></i><?php $k++; } ?></span> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                        </div>
                                    </li>
                                     <?php if ($key == 3)break; } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if ( $options['300x250'] == 'true' ): ?>
                    <div class="got-dvr" style="margin-top:20px">
                        <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/300x250.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                    </div>
                    <?php endif; ?>
                </aside>
            </div>
        </div>
<?php get_footer(); ?>