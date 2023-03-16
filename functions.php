<?php
/**
 * News-Hsoub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package News-Hsoub
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function news_hsoub_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on News-Hsoub, use a find and replace
		* to change 'news-hsoub' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'news-hsoub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'news-hsoub' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'news_hsoub_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'news_hsoub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_hsoub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'news_hsoub_content_width', 640 );
}
add_action( 'after_setup_theme', 'news_hsoub_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_hsoub_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'news-hsoub' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'news-hsoub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'news_hsoub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function news_hsoub_scripts() {
	wp_enqueue_style( 'news-hsoub-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'news-hsoub-style', 'rtl', 'replace' );

	wp_enqueue_script( 'news-hsoub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'news_hsoub_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// -------------------------------------------------------------------------------------------------------

// استدعاء ملقات ومكتبات التنسيقات
function hsoub_css_enqueue()
{
    wp_enqueue_style( 'swipercss', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_style( 'bootstrapstyle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css');
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), null);
    wp_enqueue_style( 'font-awesome-5', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', array(), null );
    wp_enqueue_style( 'style', get_template_directory_uri(). '/css/style.css', array(), rand(111,9999), 'all');
    wp_enqueue_style( 'article_style', get_template_directory_uri(). '/css/article.css', array(), rand(111,9999), 'all');
    wp_enqueue_style( 'search_style', get_template_directory_uri(). '/css/search.css', array(), rand(111,9999), 'all');
}
add_action('wp_enqueue_scripts', 'hsoub_css_enqueue');

// استدعاء ملقات ومكتبات الجافاسكريبت
function hsoub_script_enqueue()
{
    wp_enqueue_script( 'JQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js', array (), 1.0, true);
    wp_enqueue_script( 'swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), 1.0, true);
    wp_enqueue_script( 'popperjs', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array (), 1.0, true);
    wp_enqueue_script( 'bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array (), 1.0, true);
    wp_enqueue_script( 'script', get_template_directory_uri(). '/js/index.js', array (), rand(111,9999), true);
}
add_action('wp_enqueue_scripts', 'hsoub_script_enqueue');

// إضافة التصنيفات الرئيسية للموقع
function insert_category() {

    $categories = array('رياضة', 'تكنولوجيا', 'اقتصاد', 'أخبار');
    $slug = array('sport', 'technology', 'economy', 'news');
    
    for($i = 0; $i < 4; $i++) {
        wp_insert_term(
          $categories[$i],
          'category',
          array(
            'description '=> '',
            'slug' => $slug[$i],
          )
        );
    }
}
add_action( 'after_setup_theme', 'insert_category' );

// إضافة تصنيف افتراضي للخبر في حال عدم تحديد تصنيف له
function set_default_category( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'category' => array( 'sport' )
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'set_default_category', 10, 2 );

// إضافة قسم تصنيفات مخصصة نحدد من خلالها موقع عرض الخبر في أقسام الصفحة الرئيسية
function wpnews_register_taxonomy_front_position() {
    $labels = array(
        'name'              => _x( 'موقع العرض', 'taxonomy general name' ),
        'singular_name'     => _x( 'موقع العرض', 'taxonomy singular name' ),
        'search_items'      => __( 'ابحث عن موقع العرض' ),
        'all_items'         => __( 'جميع مواقع العرض' ),
        'parent_item'       => __( 'موقع العرض للوالدين' ),
        'parent_item_colon' => __( 'موقع العرض للوالدين' ),
        'edit_item'         => __( 'تعديل موقع العرض' ),
        'update_item'       => __( 'تحديث موقع العرض' ),
        'add_new_item'      => __( 'إضافة موقع عرض جديد' ),
        'new_item_name'     => __( 'اسم موقع العرض الجديد' ),
        'menu_name'         => __( 'موقع العرض' ),
    );
    $args   = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'front_position' ],
        'show_in_rest' => true,
    );
    register_taxonomy( 'front_position', [ 'post' ], $args );
}
add_action( 'init', 'wpnews_register_taxonomy_front_position' );

// إضافة أسماء التصنيفات المخصصة للقسم الذي أنشاناه سابقًا
function wpnews_insert_taxonomy_terms_front_position() {
    wp_insert_term( 'الأخبار الأمامية', 
        'front_position', 
        array(
            'description '=> '',
            'slug' => 'front-news',
        )
    );
    wp_insert_term( 'أخبار الرأس', 
        'front_position', 
        array(
            'description '=> '',
            'slug' => 'header-news',
        )
    );
    wp_insert_term( 'أخبار الدوار', 
        'front_position', 
        array(
            'description '=> '',
            'slug' => 'image-slider',
        )
    );
 }
 add_action( 'init', 'wpnews_insert_taxonomy_terms_front_position' );

 // إضافة موقع عرض افتراضي في حال لم يحدد موقع عرض للخبر
 function mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'front_position' => array( 'front-news' )
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'mfields_set_default_object_terms', 10, 2 );

// إنشاء قائمة علوية مخصصة يستطيع المدير التحكم فيها من المظهر/قوائم
function my_custom_menu() {
    register_nav_menu('my-custom-menu', __( 'My Custom Menu' ));
}
add_action( 'init', 'my_custom_menu' );

// إنشاء عملية البحث وتخصيص حقل البحث
function custom_search_form( $form ) {
	$form = '<form class="d-flex" role="search" method="get" action="' . home_url( '/' ) . '" >
                <input class="form-control me-2" type="search" placeholder="ابحث..." aria-label="Search" value="' . get_search_query() . '" name="s">
                <button type="submit" class="search-icon border-0 bg-white" />
                    <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>   
                </button>
            </form>';
    return $form;
}
add_filter( 'get_search_form', 'custom_search_form');

// إضافة خاصية للمنشورات تحفظ عدد المشاهدات
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        add_post_meta($postID, $count_key, '1');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// طباعة عدد المشاهدة
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        add_post_meta($postID, $count_key, '1');
        return "0 View";
    }
    return $count;
}

// إنشاء ودجات لأقسام الذيل
function init_widgets($id) {
	register_sidebar( array(
		'name'		=> 'من نحن',
		'id'		=> 'who-are-we',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=>	'<h4 class="footer-title">',
		'after_title'	=>	'</h4>'
	));

	register_sidebar(array(
		'name'		=> 'تواصل معنا',
		'id'		=> 'connect',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=>	' <h4 class="footer-title"',
		'after_title'	=>	'</h4>'
	));

	register_sidebar(array(
		'name'		=> 'وسائل التواصل',
		'id'		=> 'communication',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=>	' <h4 class="footer-title"',
		'after_title'	=>	'</h4>'
	));

    register_sidebar(array(
		'name'		=> 'تابعنا على',
		'id'		=> 'widget-4',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=>	' <h4 class="footer-title"',
		'after_title'	=>	'</h4>'
	));
}
add_action('widgets_init', 'init_widgets');

// مسح الجملة الموجودة فوق حقل التعليقات
add_filter( 'comment_form_logged_in', '__return_empty_string' );

// استدعاء ملف التعليقات الذي نخصص فيه منظر ظهور التعليقات
require get_template_directory() . '/includes/comments-helper.php';

// إضافة حقل كلمة المرور لصفحة تسجيل مستخدم جديد
add_action('register_form', function () {
    ?>
		<div class="user-pass1-wrap">
			<p>
				<label for="pass1"><?php _e( 'Password' ); ?></label>
			</p>

			<div class="wp-pwd">
				<input type="password" data-reveal="1" data-pw="<?php echo esc_attr( wp_generate_password( 16 ) ); ?>" name="pass1" id="pass1" class="input password-input" size="24" value="" autocomplete="new-password" aria-describedby="pass-strength-result" />

				<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Hide password' ); ?>">
					<span class="dashicons dashicons-hidden" aria-hidden="true"></span>
				</button>
				<div id="pass-strength-result" class="hide-if-no-js" aria-live="polite"><?php _e( 'Strength indicator' ); ?></div>
			</div>
			<div class="pw-weak">
				<input type="checkbox" name="pw_weak" id="pw-weak" class="pw-checkbox" />
				<label for="pw-weak"><?php _e( 'Confirm use of weak password' ); ?></label>
			</div>
		</div>

		<p class="description indicator-hint"><?php echo wp_get_password_hint(); ?></p>
    <?php
});

// دالة تتفحص من وجودنا في صفحة تسجيل المستخدم
function is_on_registration_page() {
    return $GLOBALS['pagenow'] == 'wp-login.php' && isset($_REQUEST['action']) && $_REQUEST['action'] == 'register';
}

// تفعيل سكريبت الجافاسكريبت لحقل كلمة المرور
add_action('login_enqueue_scripts', function () {
    if (is_on_registration_page() && !wp_script_is('user-profile')) {
        wp_enqueue_script('user-profile');
    }
});

// إخبار ووردبريس باستخدام كلمة المرور التي أدخلها المستخدم في الحقل الذي أنشأناه
add_filter('random_password', function ($password) {
    if (is_on_registration_page() && !empty($_POST['pass1'])) {
        $password = $_POST['pass1'];
    }

    return $password;
});

// تسجيل الدخول للمستخدم بعد إنشائه حساب جديد وتحويله للصفحة الرئيسية
function auto_login_new_user( $user_id ) {
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_redirect( home_url() );
    exit();
}
add_action( 'user_register', 'auto_login_new_user' );

add_action('after_setup_theme', 'remove_admin_bar');

// مسح القائمة العلوية الخاصة بووردبريس للمستخدمين العاديين فقط
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}

// استدعاء ملف المنشورات المخصصة الخاص بمقالات الرأي
require(get_template_directory() . '/includes/opinion_cpt.php');

// تحديد عدد مقالات الرأي والفيديوهات التي ستظهر في الصفحة الواحدة، خاص بنظام ترقيم الصفحات
function custom_posts_per_page( $query ) {

	if ( !is_admin() && $query->is_archive('opinion')) {
		set_query_var('posts_per_page', 3);
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

// استدعاء ملف المنشورات المخصصة الخاص بقسم الفيديوهات 
require(get_template_directory() . '/includes/video_cpt.php');