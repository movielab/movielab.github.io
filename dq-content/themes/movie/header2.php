<link rel='stylesheet' href='<?php echo get_webinfo('theme_url') ;?>css/dashicons.min.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?php echo get_webinfo('theme_url') ;?>css/main.css' type='text/css' media='all'>
<script src='<?php echo get_webinfo('theme_url') ;?>js/jquery.min.js'></script>
<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.3/respond.min.js"></script><![endif]-->
<?php if ( get_webinfo('scriptheaderads') == 'true' && !empty(get_webinfo('scriptheaderads')) ):?>
<?php $adspath = ABSPATH . THMPATH . 'movie/ads/scriptheaderads.php'; $adscode = file_get_contents($adspath,NULL); if(isset($adscode) and !empty($adscode)): ?>
<?php echo $adscode; ?><?php endif; ?><?php endif; ?>
</head>
<body class="slider">
    <div id="aa-wp">
        <header class="Header">
            <div class="cont">
                <div class="top dfx alg-cr jst-sb">
                    <figure class="logo"> <a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>"><img style="float: left;" src="<?php echo get_webinfo('theme_url') ;?>img/logo1.png" alt="logo"><h2 style="float: left;" class="name_web"><?php echo get_webinfo( 'webname' ) ;?></h2></a></figure> 
                    <span class="MenuBtn aa-tgl" data-tgl="aa-wp"><i></i><i></i><i></i></span> 
                    <span class="MenuBtnClose aa-tgl" data-tgl="aa-wp"></span>
                    <div class="Rght BgA dfxc alg-cr fg1">
                        <div class="Search">
                            <form method="POST" action="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/search/" id="searchform"> <span class="Form-Icon"> <input id="srch-term" name="s" type="text" placeholder="<?php echo __('menu','search_form') ;?>" autocomplete="off"> <button type="submit"><i class="fa-search"></i></button> </span></form>
                        </div>
                        <div class="login dfx"> 
                            <a href="/rc?sub_id=<?php echo get_webinfo('sub_id');?>" class="Button link aa-mdl"><?php echo __('modal','sign_in') ;?></a> 
                            <a href="/rc?sub_id=<?php echo get_webinfo('sub_id');?>" class="Button aa-mdl"><?php echo __('modal','register') ;?></a> 
                        </div>
                        <nav class="Menu fg1">
                            <ul>
                                <li class="AAIco-home menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
                                    <a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>" title="Home"><?php echo __('menu','home') ;?></a>
                                </li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                    <a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/movies" title="Movies"><?php echo __('menu','movies') ;?></a>
                                </li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                    <a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/series" title="Series"><?php echo __('menu','tv_shows') ;?></a>
                                </li>
                                <li id="menu-item-1953" class="AAIco-movie_creation menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1953"><a href="#"><?php echo __('menu','genre') ;?></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/action/28" title="action"><?php echo __('utilities', 'action');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/adventure/12" title="adventure"><?php echo __('utilities', 'adventure');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/action-adventure/10759" title="action adventure"><?php echo __('utilities', 'action_adventure');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/animation/16" title="animation"><?php echo __('utilities', 'animation');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/comedy/35" title="comedy"><?php echo __('utilities', 'comedy');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/crime/80" title="crime"><?php echo __('utilities', 'crime');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/documentary/99" title="documentary"><?php echo __('utilities', 'documentary');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/drama/18" title="drama"><?php echo __('utilities', 'drama');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/family/10751" title="family"><?php echo __('utilities', 'family');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/fantasy/14" title="fantasy"><?php echo __('utilities', 'fantasy');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/history/36" title="history"><?php echo __('utilities', 'history');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/horror/27" title="horror"><?php echo __('utilities', 'horror');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/kids/10762" title="kids"><?php echo __('utilities', 'kids');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/music/10402" title="music"><?php echo __('utilities', 'music');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/mystery/9648" title="mystery"><?php echo __('utilities', 'mystery');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/news/10763" title="news"><?php echo __('utilities', 'news');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/romance/10749" title="romance"><?php echo __('utilities', 'romance');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/reality/10764" title="reality"><?php echo __('utilities', 'reality');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/science-fiction/878" title="science-fiction"><?php echo __('utilities', 'science_fiction');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/sci-fi-fantasy/10765" title="sci-fi-fantasy"><?php echo __('utilities', 'sci-fi_fantasy');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/soap/10766" title="soap"><?php echo __('utilities', 'soap');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/talk/10767" title="talk"><?php echo __('utilities', 'talk');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/tv-movie/10770" title="tv-movie"><?php echo __('utilities', 'tv_movie');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/thriller/53" title="thriller"><?php echo __('utilities', 'thriller');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/war/10752" title="war"><?php echo __('utilities', 'war');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/war-politics/10768" title="war-politics"><?php echo __('utilities', 'war_politics');?></a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php if ( empty( $_GET['language'] ) ) { echo get_webinfo('url');}else{ echo get_webinfo('url').'/'.$_GET['language'];}?>/genres/western/37" title="western"><?php echo __('utilities', 'western');?></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-1953" class="AAIco-movie_creation menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1953"><a href=#><?php echo __('menu','language') ;?></a>
                                    <ul class="sub-menu">
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/sq" title="Albanian">Albanian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ar" title="Arabic">Arabic</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/hy" title="Armenian">Armenian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/be" title="Belarusian">Belarusian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/bs" title="Bosnian">Bosnian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/bg" title="Bulgarian">Bulgarian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/zh" title="Chinese">Chinese</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/hr" title="Croatian">Croatian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/cs" title="Czech">Czech</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/da" title="Danish">Danish</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/nl" title="Dutch">Dutch</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/en" title="English">English</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/et" title="Estonian">Estonian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/tl" title="Filipino">Filipino</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/fr" title="French">French</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ka" title="Georgian">Georgian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/de" title="German">German</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/el" title="Greek">Greek</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/hi" title="Hindi">Hindi</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/hu" title="Hungarian">Hungarian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/id" title="Indonesian">Indonesian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ga" title="Irish">Irish</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/it" title="Italian">Italian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ja" title="Japanese">Japanese</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ko" title="Korean">Korean</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/la" title="Latin">Latin</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ms" title="Malay">Malay</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ne" title="Nepali">Nepali</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/no" title="Norwegian">Norwegian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/pl" title="Polish">Polish</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/pt" title="Portugese">Portugese</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ro" title="Romanian">Romanian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/ru" title="Russian">Russian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/sr" title="Serbian">Serbian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/es" title="Spanish">Spanish</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/sv" title="Swedish">Swedish</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/th" title="Thai">Thai</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/tr" title="Turkish">Turkish</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/uk" title="Ukrainian">Ukrainian</a></li>
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a class="dropdown-item" href="<?php echo get_webinfo('url') ;?>/vi" title="Vietnamese">Vietnamese</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>