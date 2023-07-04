<?php
$options = array(
    /*
    |--------------------------------------------------------------------------
    | License 
    |--------------------------------------------------------------------------
    */
    "theme"                 => 'CINEMADARKBLUE',
	"version"               => '3.0',
	"license"               => "unlimited",
	"username"              => "MangOpin",
	
    /*
    |--------------------------------------------------------------------------
    | Website Configuration
    |--------------------------------------------------------------------------
    */
	"url"                   => 'https://movielab.github.io',           /* tanpa '/' dibelakang */
	"weblogo"               => 'Cinemadarkblue',
	"webname"               => 'MovieLAB',
	"webdescription"        => 'Watch movies full HD online free. Watch latests episode series online. Over 9000 free streaming movies, documentaries &amp; TV shows',
	"webkeywords"           => 'watch movies free online, watch series online, watch movies free, movies online free, watch free movies online, free movies online, watch movies online free, free movie streaming, movie,tv,full,online, stream,hd',
	"email"                 => '',
	"HistatsID"             => '',
	"google_code"           => '',
	"yandex_code"           => '',
	"bing_code"             => '',
	
    /*
    |--------------------------------------------------------------------------
    | Sub ID
    |--------------------------------------------------------------------------
    | Input your Sub ID if you use Sub ID in your affiliate network
    | Masukan nama/ kode Sub ID disini jika anda menggunakan Sub ID di affiliate anda
    */
    "use_sub_id"            => "", // true or empty if true then sub_id will be show in permalink
    "sub_id"                => "", // put your sub id name here or you can call it manualy in every link
    /*
    
    /*
    |--------------------------------------------------------------------------
    | Ads
    |--------------------------------------------------------------------------
    | Enable (true) or Disable (false) Ads
    | If true Input your ads at dq-content/themes/movie/ads read Read Me!.txt for more
    */
    "160x300"               => "", // true/false if true then ads will be show
    "320x50"                => "", // true/false if true then ads will be show
    "160x600"               => "", // true/false if true then ads will be show
    "300x250"               => "", // true/false if true then ads will be show
    "300x250_invideo"       => "", // true/false if true then ads will be show
    "vastads"               => "", // true/false if true then ads will be show
    "468x60"                => "", // true/false if true then ads will be show
    "728x90"                => "", // true/false if true then ads will be show
    "nativeads"             => "", // true/false if true then ads will be show
    "redirect"              => "", // true/false if true then ads will be show
    "scriptheaderads"       => "", // true/false if true then ads will be show, this for ads script to put on header
    "scriptfooterads"       => "", // true/false if true then ads will be show, this for ads script to put on footer or before </body>
    /*

	/*
    |--------------------------------------------------------------------------
    | Player
    |--------------------------------------------------------------------------
    | choose player / pilih jenis player
    | default_player    = POP UP Register show up after click play button/POP UP Register keluar setelah klik tombol play
    | video_player      = Opening with video player first before POP UP Register show up / pembukaan dengan video player sebelum POP UP Register keluar
    | intro_player      = Opening with intro video from youtube first before POP UP Register show up / pembukaan dengan video player sebelum POP UP Register keluar
    */
    "choose_player"         => "video_player",
    /*
    
    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    | example/contoh 
    | "Tmdb_api" => "api1,api2,api3",
    | Create TMDB API KEY --> https://www.youtube.com/watch?v=OlRLKhQi85A
    */
    "Tmdb_api"              => "b1a30cb89da1beabc02395631b3aff7e",
    /*
    |--------------------------------------------------------------------------
    | Site Configuration
    |--------------------------------------------------------------------------
    */
	"bahasa"                => 'en',
	"auto_language"         => 'false', // empty or true
	"filter_query"          => 'true', // empty or true then bad words will automatically redirect to home or empty to disable
	"_seo"                  => 'true', // empty or true
	"_agc"                  => 'true', // empty or true
	"_cachemovie"           => 'true', // empty or true
	"_cachetv"              => 'true', // empty or true
    "permalink"             => 'tag', // first or tag
	"search"                => 'search', // if using "tag" on "permalink" above
	"_endurl"               => '', // end url on search
	"category_url"          => 'genres', // category permalink
	"keyword_url"           => 'keyword', // category permalink
	"year_url"              => 'year', // category permalink
    "_person"               => 'person', // person permalink
    "_company"              => 'company', // person permalink
    "_network"              => 'network', // person permalink
    /*
    |--------------------------------------------------------------------------
    | Default
    |--------------------------------------------------------------------------
    */
	"title_search_before"   => 'Search For ',
	"title_search_after"    => ' Full Movie Online in HD Quality',

    /*
    |--------------------------------------------------------------------------
    | Movie
    |--------------------------------------------------------------------------
    */
	"_movieurl"             => 'movie', // single page
	"_endmovieurl"          => '', // end of url
	"title_movie_before"    => 'Watch ',
	"title_movie_after"     => ' Full Movie Online in HD Quality',
	
    /*
    |--------------------------------------------------------------------------
    | TV Show
    |--------------------------------------------------------------------------
    */
	"_tvurl"                => 'tv', // single page
	"_endtvurl"             => '', // end of url
	"title_tv_before"       => 'Watch ',
	"title_tv_after"        => ' Full Episode Online in HD Quality',

    /*
    |--------------------------------------------------------------------------
    | Person
    |--------------------------------------------------------------------------
    */
	"people_before"       => 'Biography of ',
	"people_after"        => ' Details Online',
	
    /*
    |--------------------------------------------------------------------------
    | DMCA URL
    |--------------------------------------------------------------------------
    |
    */
	"_dmca"                 => '',

    /*
    |--------------------------------------------------------------------------
    | DO NOT MODIFY OPTIONS BELOW. UNTIL YOU KNOW WHAT ARE YOU DOING.
    |--------------------------------------------------------------------------
    */

	"theme_name"            => 'movie',
	"theme_url"             => '/dq-content/themes/movie/'
);
