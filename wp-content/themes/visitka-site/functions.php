<?php


function load_style_script(){
	wp_enqueue_script('jquery-google', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js');
	wp_enqueue_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js');
	wp_enqueue_script('demo', get_template_directory_uri() . '/js/demo.js');
	wp_enqueue_script('jquery-ui-1.9.2', get_template_directory_uri() . '/js/jquery-ui-1.9.2.custom.js');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('style-flexslider', get_template_directory_uri() . '/flexslider.css');
	wp_enqueue_style('style-jquery-ui-1.9.2', get_template_directory_uri() . '/css/jquery-ui-1.9.2.custom.css');
}


add_action('wp_enqueue_scripts', 'load_style_script');


function my_more_options(){
	// создаем поле опции
	// $id, $title, $callback, $page, $section, $args
	add_settings_field(
		'phone', // $id - Название опции (идентификатор)
		'Phone', // $title - Заголовок поля
		'display_phone', // $callback - callback function
		'general' // $page - Страница меню в которую будет добавлено поле
	);

	// Регистрирует новую опцию и callback функцию (функцию обратного вызова) для обработки значения опции при её сохранении в БД.
	// $option_group, $option_name, $sanitize_callback
	register_setting(
		'general', // $option_group - Название группы, к которой будет принадлежать опция. Это название должно совпадать с названием группы в функции settings_fields()
		'my_phone' // $option_name - Название опции, которая будет сохраняться в БД
	);
}
add_action('admin_init', 'my_more_options');
function display_phone(){
	echo "<input type='text' class='regular-text' name='my_phone' value='" . esc_attr(get_option('my_phone')) . "'>";
}


register_sidebar(array(
		'name' => 'Icons in a header',
		'id' => 'icons_header',
		'description' => 'Use the Text widget to add HTML code to the icons',
		'before_widget' => '',
		'after_widget' => ''
	)
);


register_sidebar(array(
		'name' => 'Clients',
		'id' => 'clients',
		'description' => 'Use the Text widget to add HTML block code to clients',
		'before_widget' => '',
		'after_widget' => ''
	)
);


register_sidebar(array(
		'name' => 'Sydbar Portfolio Records',
		'id' => 'single_portfolio',
		'description' => 'Widgets for Portfolio Records',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',
		'before_widget' => '',
		'after_widget' => ''
	)
);


register_nav_menus(array(
	'header_menu' => 'Меню в шапке',
	'footer_menu' => 'Меню в подвале'
));


add_action('init', 'slider_index');
function slider_index(){
	register_post_type('slider', array(
		'public' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_position' => 100,
		'menu_icon' => admin_url() . 'images/media-button-video.gif',
		'labels' => array(
			'name' => 'Слайдер',
			'all_items' => 'Все слайды',
			'add_new' => 'Новый слайд',
			'add_new_item' => 'Добавить слайд'
		)
	));
}


add_theme_support('post-thumbnails');


function my_list_tags($echo = true){
	$tags = get_the_tags();
	$tag_str = null;
	if($tags){
		$tag_str = '<p>';
		foreach($tags as $tag){
			$tag_str .= $tag->name . ', ';
		}
		$tag_str = rtrim($tag_str, ', ');
		$tag_str .= '</p>';
	}
	if($echo) echo $tag_str;
		else return $tag_str;
}


function get_tags_in_cat($cat_id){
	$posts = get_posts( array('category' => $cat_id, 'numberposts' => -1) );
	$tags = array();

	foreach($posts as $post){
		$post_tags = get_the_tags($post->ID);
		if( !empty($post_tags) ){
			foreach($post_tags as $tag){
				$tags[$tag->term_id] = $tag->name;
			}
		}
	}
	asort($tags);
	return $tags;	
}


function wp_corenavi(){
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999)));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 2; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

	if ($max > 1) echo '<div class="pager">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}

?>