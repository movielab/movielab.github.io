<?php
/**
* @author deqila.id
* @copyright 2020
*/
if( isset($_GET['s']) ) {
        if ( file_exists( ABSPATH . $options['theme_url'] . 'search.php' ) ) {
                include( ABSPATH . $options['theme_url'] . 'search.php' );
                exit();
        }else {
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /");
        }
} elseif( !empty($_GET['do']) ) {
        if ( file_exists( ABSPATH . $options['theme_url'] . '/'. $_GET['do'] . '.php' ) ) {
                include( ABSPATH . $options['theme_url'] . '/'. $_GET['do'] . '.php' );
                exit();
        }elseif ( file_exists( ABSPATH . $options['theme_url'] . 'do/'. $_GET['do'] . '.php' ) ) {
                include( ABSPATH . $options['theme_url'] . 'do/'. $_GET['do'] . '.php' );
                exit();
        }else {
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /");
        }
} elseif( !empty($_GET['get']) ) {
        if ( file_exists( ABSPATH . $options['theme_url'] . 'get/'. $_GET['get'] . '.php' ) ) {
                include( ABSPATH . $options['theme_url'] . 'get/'. $_GET['get'] . '.php' );
                exit();
        }
} else {
        include( ABSPATH . $options['theme_url'] . 'index.php' );
        exit();
}