<?php
   $query = new WP_Query('sliders');
   while ( $query->have_posts() ) {
       $query->the_post();
    
       the_title(); // выведем заголовок поста
   }
   
   ?>