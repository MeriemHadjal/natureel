<?php 

if ( is_home() ) :
    get_header( 'en' );
elseif ( is_404() ) :
    get_header( '404' );
else :
    get_header();
endif;