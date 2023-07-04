<?php get_header(); ?>
<meta itemprop="image" content="<?php echo $single['images'];?>"/>
<meta property="og:image" content="<?php echo $single['images'];?>"/>
<meta name="twitter:image" content="<?php echo $single['images'];?>"/>
<script type="application/ld+json">{"@context": "http://schema.org","@type": "TVSeries","url": "<?php echo tv_single($single['id'],$single['title']);?>","name": "<?php echo $single['title'];?>","image": "<?php echo $single['images'];?>","genre": [<?php echo $single['genre2'];?>],"actor": [<?php echo $single['cast2'];?>],"director": [<?php echo $single['director'];?>],"description": "<?php echo $single['description'];?>","datePublished": "<?php echo date('d M Y', strtotime( $single['release_date'] ) );?>","keywords": [<?php echo $keywords_keywords;?>],"aggregateRating": {"@type": "AggregateRating","ratingCount": "<?php echo $single['vote_count'];?>","bestRating": "10","worstRating": "1","ratingValue": "<?php echo $single['vote_average'];?>"}}</script>
<?php include(ABSPATH . THMPATH . $options['theme_name'] . '/header2.php')?>
        <div class="bd" id="top-single" data-id="<?php echo $single['id'];?>">
            <div class="backdrop">
                <article class="TPost movtv-info cont">
                    <div class="Image">
                        <figure><img src="<?php echo $single['poster']?>" data-src="<?php echo $single['poster']?>" alt="<?php echo $single['title'];?>" class="lazy"></figure>
                    </div>
                    <header>
                        <h1 class="Title"><?php echo $cari_judul;?></h1>
                    </header>
                    <footer>
                        <div class="VotesCn">
                            <div class="Prct">
                                <div id="TPVotes" data-percent="<?php echo $single['vote_average']*10;?>"></div>
                            </div>
                        </div>
                        <p class="meta"> <span><?php echo $single['runtime'];?> <?php echo __('details','minutes') ;?></span> <span><?php echo date('Y', strtotime( $single['year'] ));?></span> <span class="Qlty">HD</span></p>
                        <ul class="ListPOpt">
                            <li class="fa-share-alt">Share</li>
                            <li><a rel="nofollow" onclick="window.open ('http://www.facebook.com/share.php?u=<?php echo movie_single($single['id'] , $single['title'] );?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');" href="javascript: void(0);" title="Share On Facebook" class="Fcb fa-facebook-f fab"></a></li>
                            <li><a rel="nofollow" onclick="window.open ('http://twitter.com/intent/tweet?status=<?php echo $single['title'] ;?>+<?php echo movie_single($single['id'] , $single['title'] );?>', 'Twitter', 'toolbar=0, status=0, width=650, height=450');" href="javascript: void(0);" title="Share On Twitter" class="Twt fa-twitter fab"></a></li>
                        </ul>
                    </footer>
                    <div class="Description">
                        <p><?php echo $single['description'];?></p>
                    </div>
                    <div class="MvTbCn on anmt" id=MvTb-Info>
                        <ul class="InfoList">
                            <li class="AAIco-adjust"><strong><?php echo __('details','genre') ;?>:</strong> <?php echo $single['genres'];?></li>
                            <li class="AAIco-adjust"><strong><?php echo __('details','studio') ;?>:</strong> <?php echo $single['studio'];?></li>
                            <li class="AAIco-adjust"><strong><?php echo __('details','keyword') ;?>:</strong> <?php echo $single['keyword'];?></li>
                            <li class="AAIco-adjust loadactor"><strong><?php echo __('details','cast') ;?>:</strong> <?php echo $single['cast'];?> </li>
                        </ul>
                    </div>
                </article>
                <div class="Image">
                    <figure class="Objf"><img src="<?php echo $single['images']?>" class="lazy" data-src="<?php echo $single['images']?>" alt="img"></figure>
                </div>
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
            </div>
            <div class="video cont">
                <ul class="_1EGcQ_0 TPlayerNv tab_language_movie">
                    <li class="open_submenu" data-number>
                        <div class="_3CT5n_0 L6v6v_0">
                            <div class="H_ndV_0 fa fa-chevron-down"></div>
                            <img src="<?php echo get_webinfo('theme_url') ;?>img/subti.svg" alt="Subtitulado" class="_15ltj_0">
                            <div class="_1R6bW_0"><span>Subtitel <span> HD</span> </span></div>
                        </div>
                        <div>
                            <ul class="sub-tab-lang hide _3eEG3_0 optm3">
                                <li data-TPlayerNv="OptS1" data-server="55625" data-quality="49" data-lang="51" class="clili L6v6v_0"><img src="<?php echo get_webinfo('theme_url') ;?>img/icon_storage.ico" class="_1EXJQ_0" style="width:16px; height: 16px;"><span class="cdtr"><span>1 - Subtitel - HD</span>
                                    <div class="parpa parpax"><?php echo __('details','watch') ;?> <?php echo __('details','hd') ;?></div>
                                    </span>
                                </li>
                                <li data-TPlayerNv="OptS2" data-server="54846" data-quality='49' data-lang="51" class="clili L6v6v_0"><img src="<?php echo get_webinfo('theme_url') ;?>img/stream_thunder.ico" class="_1EXJQ_0" style="width:16px; height: 16px;"><span class="cdtr"><span>2 - Subtitel - HD</span>
                                    <div class="parpa parpax"><?php echo __('details','watch') ;?> <?php echo __('details','hd') ;?></div>
                                    </span>
                                </li>
                                <li data-TPlayerNv="OptS3" data-server="28190" data-quality="49" data-lang="51" class="clili L6v6v_0"><img src="<?php echo get_webinfo('theme_url') ;?>img/icon_gph.ico" class="_1EXJQ_0" style="width:16px; height: 16px;"><span class="cdtr"><span>3 - Subtitel - HD</span>
                                    <div class="parpa parpax"><?php echo __('details','watch') ;?> <?php echo __('details','hd') ;?></div>
                                    </span>
                                </li>
                                <li data-TPlayerNv="OptS4" data-server="10190" data-quality="49" data-lang="51" class="clili L6v6v_0"><img src="<?php echo get_webinfo('theme_url') ;?>img/favicons.png" class="_1EXJQ_0" style="width:16px; height: 16px;">
                                    <span
                                        class="cdtr"><span>4 - Subtitel - HD</span>
                                        <div class="morp hide"></div>
                                        </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="downloadopt">
                        <div class="_3CT5n_0 L6v6v_0 fa-cloud-download-alt aa-mdl" data-mdl="mdl-downloads">
                            <div class="_1R6bW_0"><a href="/rc?sub_id=<?php echo get_webinfo('sub_id');?>&title=<?php echo $single['title'];?>&movie=<?php echo $single['id'];?>"><span><?php echo __('details','download') ;?> <span><?php echo __('details','hd') ;?></span></span></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="row message_k" style="margin-bottom: 5px;">
                    <div class="alert alert-danger" style="text-align:center; margin-bottom: 0; border-radius: 0; background-color: #d2f1ba; color: #333; border: 1px solid #abe2ad; "><i class="fa fa-exclamation-circle mr5"></i> This video option does not contain pop-up windows and the load is optimal, you can watch without cuts.</div>
                    <button type="button" class="close-message"><i class="fa-times-circle"></i></button>
                </div>
                <div class="player" id="player" height="500" width="100%">
                    <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/300x250_invideo.php'; $adscode = file_get_contents($adspath,NULL); if ( $options['300x250_invideo'] == 'true' && !empty($options['300x250_invideo']) && !empty($adscode)):?>
                                    <div class="poplayer">
                                    <div id="preroll"> 
                                    <div class="pop-wrap"> 
                                    <div class="pop-main"> 
                                    <div class="pop-html"> 
                                    <?php $adspath2 = ABSPATH . THMPATH . $options['theme_name'] . '/ads/redirect.php'; $adscode2 = file_get_contents($adspath2,NULL); if(isset($adscode2) and !empty($adscode2) and $options['redirect'] == 'true'){ ?>
                                    <div class="pop-skip"> <button class="pop-preroll-close" onclick=" window.open('<?php echo $adscode2; ?>', '_blank'); return false;">Skip Ad</button> </div> 
                                    <?php }else{ ?>
                                    <div class="pop-skip"> <button class="pop-preroll-close">Skip Ad</button> </div> 
                                    <?php }?>
                                    <div class="pop-block" style="font-size: 0;"> 
                                    <?php echo $adscode; ?>
                                    </div> 
                                    </div> 
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                    <?php endif; ?>
                    <?php if( $options['choose_player'] == 'default_player' ){ ?>
                        <div class="player-thumb">
                                <div class="player-reg-window"></div>
                                <div class="player-reg-window2">
                                    <div class="player-reg-window2-container" style="background: rgba(0, 0, 0, 1);">
                                        <div class="regis-movie"></div>
                                        <div class="clearfix">
                                            <div class="player-reg-button">
                                                <div class="player-window-loading2" style="display: block;clear:bottom"></div>
                                            </div>
                                        </div>
                                        <div align="center"> </div>
                                    </div>
                                </div>
                                <div class="player-window-loading" style="display: none;"></div>
                                <div class="player-window-play2"></div> 
                                <img class="media-shows img-fluid" src="<?php echo $single['images']?>" width="1280"/>
                            </div>
                            
                            <div class="clearfix"></div>
                    <?php } elseif ($options['choose_player'] == 'video_player'){ ?>
                        <link href="<?php echo get_webinfo('theme_url') ;?>js/video-js.css" rel="stylesheet">
                        <script src="<?php echo get_webinfo('theme_url') ;?>js/video.js"></script>
                        <div class="embed-responsive embed-responsive-16by9">
                        <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/vastads.php'; $adscode = file_get_contents($adspath,NULL); if ( $options['vastads'] == 'true' && !empty($options['vastads']) && !empty($adscode)){?>
                        <video id="video" class="video-js vjs-default-skin" controls preload="auto" height="100%" width="100%" poster="<?php echo $single['images'];?>">
                        <source src="<?php echo $single['video_trail']?>" type="video/mp4" label="SD">
                        <source src="<?php echo $single['video_trail']?>" type="video/mp4" label="HD">
                        </video>
                        <script type="text/javascript">
                        var options = {
                                        ads: {
                                        'skipAd': { 'enabled': true, 'timeOut': 5 },
                                        'servers'  : [ { 'apiAddress': '<?php echo $adscode; ?>' } ], 
                                        'schedule' : [ { 'position' : 'mid-roll', 'startTime': '00:00:00' }, { 'position' : 'post-roll' } ] 
                                        }
                                        };
                        _V_("video", options);
                        </script>
                        <?php }else{ ?>
                        <video id="video" class="video-js vjs-default-skin" controls preload="auto" height="100%" width="100%" poster="<?php echo $single['images'];?>">
                        <source src="<?php echo $single['video_trail']?>" type="video/mp4" label="SD">
                        <source src="<?php echo $single['video_trail']?>" type="video/mp4" label="HD">
                        </video>
                        <script type="text/javascript">
                        var options = {
                                    ads: {
                                    'skipAd': { 'enabled': true, 'timeOut': 5 },
                                    'servers'  : [ { 'apiAddress': '' } ], 
                                    'schedule' : [ { 'position' : 'mid-roll', 'startTime': '00:00:00' }, { 'position' : 'post-roll' } ] 
                                    }
                                    };
                        _V_("video", options);
                        </script>
                        <?php } ?>
                        </div>
                    <?php } else { ?>
                            <div class="player-thumb">
                                <div class="player-reg-window"></div>
                                <div class="player-reg-window2">
                                    <div class="player-reg-window2-container" style="background: rgba(0, 0, 0, 1);">
                                        <div class="regis-movie"></div>
                                        <div class="clearfix">
                                            <div class="player-reg-button">
                                                <div class="player-window-loading2" style="display: block;clear:bottom"></div>
                                            </div>
                                        </div>
                                        <div align="center"> </div>
                                    </div>
                                </div>
                                <div class="player-window-loading" style="display: none;"></div>
                                <div class="player-window-play2"></div> 
                                <img class="media-shows img-fluid" src="<?php echo $single['images']?>" width="1280"/>
                                <div style="display:none" id="thevideo" class="embed-responsive TPlayerTb">
                                    <iframe class="embed-responsive-item"src="//www.youtube.com/embed/<?php echo $single['trailers']?>?rel=0&amp;modestbranding=0&amp;autoplay=0&amp;autohide=1&amp;showinfo=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    <?php } ?>
                </div>
            </div>
            <div class="TpRwCont cont">
                    <main>
                        <section>
                            <?php  if (is_array($single['seasons'])) { ?>
                            <div class="select-season"> <span style="margin-right:5px;margin-bottom:5px"><?php echo __('details','season') ;?></span>
                                    <?php foreach((array)$single['seasons'] as $key => $for) : ?>
                                    <span style="margin-right:5px;margin-bottom:5px"><a href="<?php echo tv_single($single['id'].'-'.$for['season_number'] , $single['title'] );?>"><?php echo __('details','season') ;?> <?php echo $for['season_number'];?></a></span> 
                                    <?php endforeach; ?>
                            </div>
        	                <?php if (is_array($single['episodes'])) { ?>
                            <ul id="season-1" class="all-episodes MovieList Rows AX A06 B04 C03 E20 episodes ">
                                <?php foreach((array)$single['episodes'] as $eps) : 
                                if ($eps['still_path']!= null) {
                                        $singleps['poster'] = 'https://image.tmdb.org/t/p/w185' . $eps['still_path'];
                                } else {
                                        $singleps['poster'] = get_webinfo('theme_url').'img/no-backdrop.jpg';
                                }
                                ?>
                                <li class="xxx TPostMv">
                                    <div class="cv3-dots" aria-hidden="true"></div>
                                    <article class="TPost C post-<?php echo $single['id'];?> post type-post status-publish format-standard has-post-thumbnail hentry">
                                        <a href="<?php echo tv_single( $single['id'].'-'.$eps['season_number'].'-'.$eps['episode_number'] , $eps['name'] );?>">
                                            <div class="Image"><span class="Year"><?php echo $eps['season_number'];?> - <?php echo $eps['episode_number'];?></span>
                                                <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo str_replace('https://','https://i0.wp.com/',$singleps['poster']);?>" alt="Image ">"</figure>
                                            </div>
                                            <h2 class="Title"><?php echo $eps['name'];?></h2>
                                            <p></p>
                                        </a>
                                    </article>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <?php } ?>
                        </section>
                        <section>
                            <div class="Top">
                                <h2 class="Title"><?php echo __('details','similar') ;?></h2>
                            </div>
                            <ul class="MovieList Rows AX A06 B04 C03 E20">
                                <?php 
                        		    if (is_array($single['similar'])) {
                        		    foreach((array)$single['similar'] as $key => $item) {
                        		?>
                                <li class="xxx TPostMv">
                                    <div class="TPost C post type-post status-publish format-standard has-post-thumbnail hentry">
                                        <a href="<?php echo tv_single($item['id'] , $item['title'] );?>">
                                            <div class="Image"><span class="Year"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span>
                                                <figure class="Objf TpMvPlay AAIco-play_arrow"><img width="160" height="242" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo $item['poster_path'];?>" class="lazy attachment-thumbnail size-thumbnail wp-post-image" alt="img"><span class="TpTv BgA">S<?php echo $item['tv_last_season_to_air'];?> E<?php echo $item['tv_last_episode_to_air'];?></span></figure>
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
                                            </div> <img width="160" height="242" data-src="<?php echo $item['poster_path'];?>" class="lazy attachment-thumbnail size-thumbnail wp-post-image bg" alt="img"></div>
                                    </div>
                                </li>
                                <?php 
                        		    if ($key == 19)break;
                        		    }
                        		    }else{
                        		    $movie = unserialize( deqila_data_movie('movie','1', 'getNowPlayingMovies') );
                        		    if( is_array($movie['result']) ) {
                        		    foreach ( $movie['result'] as $key => $item ) {
                        		?>
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
                                            </div> <img width="160" height="242" data-src="<?php echo $item['poster_path'];?>" class="lazy attachment-thumbnail size-thumbnail wp-post-image bg" alt="img"></div>
                                    </div>
                                </li>
                                <?php 
                        		    if ($key == 19)break;
                        		    }
                        		    }
                        		    }
                        		?>
                            </ul>
                            <?php if ( $options['nativeads'] == 'true' ): ?>
                                <div style="margin-top:20px">
                                    <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/nativeads.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                                </div>
                            <?php endif; ?>
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
        <div class="modal fade show" id="mov_reg" tabindex="-1" role="dialog" aria-labelledby="mov_reg" style="display:none;background-color: rgba(0, 0, 0, 0.6)" aria-hidden="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content clearfix">
                    <div class="mlogo" style="background-image: url('<?php echo  $single['images'];?>')">
                        <div class="blackradius">
                            <img class="warningimg" src="<?php echo get_webinfo('theme_url') ;?>img/warning.png">
                            <div class="h3"><?php echo __('modal','active_your_account_free') ;?></div>
                            <p><?php echo __('modal','our_movie') ;?></p>
                            <a href="/rc?movie=<?php echo $single['id'];?>&title=<?php echo $single['title'];?>&sub_id=<?php echo get_webinfo('sub_id') ;?>" class="btn btn-lg btn-success"><?php echo __('modal','continue_watch') ;?></a>
                    </div>
                    </div>
                    <div class="modal-footer text-center clearfix"><?php echo __('modal','take_less_then') ;?></div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>