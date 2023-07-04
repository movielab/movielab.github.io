<?php
/**
 * The main template file
 */
include dirname(__DIR__) .'/header.php';?>
        <meta itemprop="image" content="<?php echo get_webinfo('theme_url') ;?>img/og-image-default.jpg"/>
        <meta property="og:image" content="<?php echo get_webinfo('theme_url') ;?>img/og-image-default.jpg"/>
        <meta name="twitter:image" content="<?php echo get_webinfo('theme_url') ;?>img/og-image-default.jpg"/>
        <?php include(ABSPATH . THMPATH . $options['theme_name'] . '/header2.php')?>
        <div class="bd">
            <div class="TpRwCont cont">
                <main>
                    <section>
                        <div class="Top">
                            <h1>DMCA Policy</h1>
                        </div>
                        <div>
                            <h2>DMCA Policy</h2>
                                <p><?php echo get_webinfo( 'webname' ) ;?> is an online service provider as defined in the Digital Millennium Copyright Act.</p>
                                <p></p>
                                <p>We provide a service that automatically offers users with relevant search results for various types of media.</p>
                                <p>We do not actively monitor, screen or otherwise review the media which is generated from our third party service providers.</p>
                                <p></p>
                                <p>We take copyright violation very seriously and will vigorously protect the rights of legal copyright owners.</p>
                                <p></p>
                                <p>
                                    If you are the copyright owner of content which appears on the <?php echo get_webinfo( 'webname' ) ;?> website and you did not authorize the use of the content on the third party site you must notify us in writing in order for us
                                    to identify the allegedly infringing content and take action.
                                </p>
                                <p></p>
                                <p>We will be unable to take any action if you do not provide us with the required information, so please fill out all fields accurately and completely.</p>
                                <p></p>
                                <p>Your written notice must include the following:</p>
                                <p></p>
                                <ul>
                                    <li>
                                        Specific identification of the copyrighted work which you are alleging to have been infringed. If you are alleging infringement of multiple copyrighted works with a single notification you must submit
                                        a representative list which specifically identifies each of the works that you allege are being infringed.
                                    </li>
                                    <li>
                                        Specific identification of the location and description of the material that is claimed to be infringing or to be the subject of infringing activity with enough detailed information to permit us to
                                        locate the material. You should include the specific URL or URLs of the web pages where the allegedly infringing material is located.
                                    </li>
                                    <li>
                                        Information reasonably sufficient to allow us to contact the complaining party which may include a name, address, telephone number and electronic mail address and signature at which the complaining
                                        party may be contacted.
                                    </li>
                                    <li>A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent or the law.</li>
                                    <li>
                                        A statement that the information in the notification is accurate, and under penalty of perjury that the complaining party is authorized to act on behalf of the owner of an exclusive right that is
                                        allegedly infringed.
                                    </li>
                                </ul>
                                <h3>General Copyright Questions</h3>
                                <p>For information on US copyright law and fair use, check out the following materials.</p>
                                <p></p>
                                <p><a href="#" title="">http://www.copyright.gov/fls/fl102.html</a></p>
                                <p><a href="#" title="">http://fairuse.stanford.edu/Copyright_and_Fair_Use</a></p>
                                <p><a href="#" title="">http://chillingeffects.org/fairuse/</a></p>
                                <p></p>
                                <p>For European Union countries, please see:</p>
                                <p></p>
                                <p><a href="#" title="">http://ec.europa.eu/internal_market/copyright/index_en.htm</a></p>
                                <p></p>
                                <p>Please note, this material is provided for informational purposes only. It is not, nor is it intended to be, legal advice, or a substitute for legal advice.</p>
                                <h2>DIGITAL MILLENNIUM COPYRIGHT ACT (DMCA) NOTICE</h2>
                            <p>We are in compliance with 17 U.S.C. $ 512 and the Digital Millennium Copyright Act ("DMCA"). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act ("DMCA") and other applicable intellectual property laws.</p>
                                <p>If your copyrighted material has been posted on our website or if hyperlinks to your copyrighted material are returned through our search engine and you want this material removed, you must provide a written communication that details the information listed in the following section. Please be aware that you will be liable for damages (including costs and attorneys' fees) if you misrepresent information listed on our site that is infringing on your copyrights. We suggest that you first contact an attorney for legal assistance on this matter.</p>
                                <p><strong>If you still wish to continue, The following elements must be included in your copyright infringement claim:</strong></p>
                                <p>- Provide evidence of the authorized person to act on behalf of the owner of an exclusive right that is allegedly infringed.</p>
                                <p>- Provide sufficient contact information so that we may contact you. You must also include a valid email address.</p>
                                <p>- You must identify in sufficient detail the copyrighted work claimed to have been infringed and including at least one search term under which the material appears in our search results.</p>
                                <p>- A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law.</p>
                                <p>- A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</p>
                                <p>- Must be signed by the authorized person to act on behalf of the owner of an exclusive right that is allegedly being infringed.</p>
                                <p>Send the infringement notice via <a href="//www.watchdogsecurity.online">www.watchdogsecurity.online</a> with <b>"DMCA Complaint"</b> as your subject line otherwise we won't be able to process your complaint.</p>
                                <p>Please allow up to a week for an email response. Note that emailing your complaint to other parties such as our Internet Service Provider will not expedite your request and may result in a delayed response due to the complaint not being filed properly.</p>
                        </div>
                    </section>
                </main>
                <aside class="widget-area">
                    <?php if ( $options['300x250'] == 'true' ): ?>
                    <div class="got-dvr" style="margin-bottom:20px">
                        <?php $adspath = ABSPATH . THMPATH . $options['theme_name'] . '/ads/300x250.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?><?php echo $adscode; ?><?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div id="peli_filter_lang-2" class="Wdgt widget_languages">
                        <div class="Title widget-title"><?php echo __('details','by') ;?> <?php echo __('menu','language') ;?></div>
                        <ul class="Langs-List dfx jst-cr">
                            <li><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/movie-top" class="Button"><img src="<?php echo get_webinfo('theme_url') ;?>img/latino.svg" alt="mx"></a></li>
                            <li><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/movie-popular" class="Button"><img src="<?php echo get_webinfo('theme_url') ;?>img/espana.svg" alt="es"></a></li>
                            <li><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/movie-upcoming" class="Button"><img src="<?php echo get_webinfo('theme_url') ;?>img/subti.svg" alt="us"></a></li>
                        </ul>
                    </div>
                    <div id="peli_top_estrenos-2" class="Wdgt">
                        <div class="Title widget-title"><?php echo __('menu','latest_movie') ;?></div>
                        <ul class="MovieList top">
                            <?php if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; } $movie = unserialize( deqila_data_movie('movie',$page,'getUpcomingMovies')); if( is_array($movie['result']) ) { foreach ( $movie['result'] as $key => $item ) { if($item['vote_count'] == 0) { $item['new_vote_count'] = 1;}else{ $item['new_vote_count'] = $item['vote_count'];} if($item['vote_count'] == 0) { $item['new_vote_average'] = 1;}else{ $item['new_vote_average'] = $item['vote_average'];} ?>
                            <li>
                                <div class="TPost A">
                                    <a href="<?php echo movie_single($item['id'] , $item['title'] );?>">
                                        <div class="Image">
                                            <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                        </div>
                                        <div class="Title"><?php echo $item['title'];?></div>
                                    </a>
                                    <p class="Info"> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                </div>
                            </li>
                             <?php if ($key == 3)break; } } ?>
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
                                                    <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                                </div>
                                                <div class="Title"><?php echo $item['title'];?></div>
                                            </a>
                                            <p class="Info"> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
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
                                                    <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                                </div>
                                                <div class="Title"><?php echo $item['title'];?></div>
                                            </a>
                                            <p class="Info"> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                        </div>
                                    </li>
                                     <?php if ($key == 3)break; } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="widget_random_movies-2" class="Wdgt widget_random_movies">
                        <div class="Title widget-title"><?php echo __('menu','more') ;?> <?php echo __('menu','movies') ;?></div>
                        <ul class="MovieList top">
                            <?php if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; } $movie = unserialize( deqila_data_movie('movie',$page,'getTopRatedMovies') ); if( is_array($movie['result']) ) { foreach ( $movie['result'] as $key => $item ) { if($item['vote_count'] == 0) { $item['new_vote_count'] = 1;}else{ $item['new_vote_count'] = $item['vote_count'];} if($item['vote_count'] == 0) { $item['new_vote_average'] = 1;}else{ $item['new_vote_average'] = $item['vote_average'];} ?>
                            <li>
                                <div class="TPost A">
                                    <a href="<?php echo movie_single($item['id'] , $item['title'] );?>">
                                        <div class="Image">
                                            <figure class="Objf TpMvPlay AAIco-play_arrow"><img class="lazy" src="<?php echo get_webinfo('theme_url') ;?>img/loading.gif" data-src="<?php echo $item['poster_path'];?>" alt="<?php echo $item['title'];?>"></figure>
                                        </div>
                                        <div class="Title"><?php echo $item['title'];?></div>
                                    </a>
                                    <p class="Info"> <span class="Vote AAIco-star"><?php echo $item['vote_average'];?></span> <span class="Date AAIco-date_range"><?php echo date('Y', strtotime( $item['release_date'] ) );?></span> <span class="Qlty">HD</span></p>
                                </div>
                            </li>
                             <?php if ($key == 3)break; } } ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
<?php get_footer(); ?>