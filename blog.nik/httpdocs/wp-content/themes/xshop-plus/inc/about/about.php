<?php
/**
 * About setup
 *
 * @package xshop
 */

require_once trailingslashit( get_template_directory() ) . 'inc/about/class.about.php';

if ( ! function_exists( 'xshop_about_setup' ) ) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function xshop_about_setup() {
		$theme = wp_get_theme();
$xtheme_name = $theme->get( 'Name' );
$xtheme_domain = $theme->get( 'TextDomain' );




		$config = array(
		// Menu name under Appearance.
		'menu_name'               => sprintf( esc_html__( '%s Info', 'xshop-plus' ),$xtheme_name),
		// Page title.
		'page_name'               => sprintf( esc_html__( '%s Info', 'xshop-plus' ),$xtheme_name),
		/* translators: Main welcome title */
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %s! - Version ', 'xshop-plus' ), $theme['Name'] ),
		// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'xshop-plus' ), $theme['Name'] ),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__( 'Getting Started', 'xshop-plus' ),
				'recommended_actions' => esc_html__( 'Recommended Actions', 'xshop-plus' ),
				'useful_plugins'  => esc_html__( 'Useful Plugins', 'xshop-plus' ),
				'free_pro'  => esc_html__( 'Free Vs Pro', 'xshop-plus' ),
				),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
                    'text'   => esc_html__( 'UPGRADE X SHOP PRO', 'xshop-plus' ),
                    'url'    => 'https://wpthemespace.com/product/xshop-pro/',
                    'button' => 'danger',
                ),
                'update_url' => array(
                    'text'   => esc_html__( 'UPGRADE X BLOG PRO', 'xshop-plus' ),
                    'url'    => 'https://wpthemespace.com/product/xblog/',
                    'button' => 'danger',
                ),
                
            ),

			// Getting started.
			'getting_started' => array(
				'one' =>array(
					'title'       => esc_html__( 'Demo Content', 'xshop-plus' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'xshop-plus' ), esc_html__( 'One Click Demo Import', 'xshop-plus' ) ),
					'button_text' => esc_html__( 'UPGRADE For  Demo Content', 'xshop-plus' ),
					'button_url'  => 'https://wpthemespace.com/product/xshop-pro',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
				 
				'two' => array(
					'title'       => esc_html__( 'Theme Options', 'xshop-plus' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'xshop-plus' ),
					'button_text' => esc_html__( 'Customize', 'xshop-plus' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Show Video', 'xshop-plus' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'You may show xshop short video for better understanding', 'xshop-plus' ), esc_html__( 'One Click Demo Import', 'xshop-plus' ) ),
					'button_text' => esc_html__( 'Show video', 'xshop-plus' ),
					'button_url'  => 'https://www.youtube.com/watch?v=Cu3eFFQskCs',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
				'five' => array(
				    'title'       => esc_html__( 'Set Widgets', 'xshop-plus' ),
				    'icon'        => 'dashicons dashicons-tagcloud',
				    'description' => esc_html__( 'Set widgets in your sidebar, Offcanvas as well as footer.', 'xshop-plus' ),
				    'button_text' => esc_html__( 'Add Widgets', 'xshop-plus' ),
				    'button_url'  => admin_url().'/widgets.php',
				    'button_type' => 'link',
				    'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__( 'Theme Preview', 'xshop-plus' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'xshop-plus' ),
					'button_text' => esc_html__( 'View Demo', 'xshop-plus' ),
					'button_url'  => 'https://xshop.wpteamx.com/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
                'seven' => array(
                    'title'       => esc_html__( 'Contact Support', 'xshop-plus' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'xshop-plus' ),
                    'button_text' => esc_html__( 'Contact Support', 'xshop-plus' ),
                    'button_url'  => 'https://wpthemespace.com/support/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
				),

					'useful_plugins'        => array(
						'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'xshop-plus' ),
						'already_activated_message' => esc_html__( 'Already activated', 'xshop-plus' ),
						'version_label' => esc_html__( 'Version: ', 'xshop-plus' ),
						'install_label' => esc_html__( 'Install and Activate', 'xshop-plus' ),
						'activate_label' => esc_html__( 'Activate', 'xshop-plus' ),
						'deactivate_label' => esc_html__( 'Deactivate', 'xshop-plus' ),
						'content'                   => array(
							array(
								'slug' => 'magical-addons-for-elementor',
								'icon' => 'svg',
							),
							array(
								'slug' => 'magical-products-display'
							),
							array(
								'slug' => 'magical-posts-display'
							),
							array(
								'slug' => 'click-to-top'
							),
							array(
								'slug' => 'gallery-box',
								'icon' => 'svg',
							),
							array(
								'slug' => 'magical-blocks'
							),
							array(
								'slug' => 'easy-share-solution',
								'icon' => 'svg',
							),
							array(
								'slug' => 'wp-edit-password-protected',
								'icon' => 'svg',
							),
						),
					),
					// Required actions array.
					'recommended_actions'        => array(
						'install_label' => esc_html__( 'Install and Activate', 'xshop-plus' ),
						'activate_label' => esc_html__( 'Activate', 'xshop-plus' ),
						'deactivate_label' => esc_html__( 'Deactivate', 'xshop-plus' ),
						'content'            => array(
							'magical-blocks' => array(
								'title'       => __('Magical Products Display', 'xshop-plus' ),
								'description' => __( 'Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'xshop-plus' ),
								'plugin_slug' => 'magical-products-display',
								'id' => 'magical-products-display'
							),
							'go-pro' => array(
								'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/xshop-pro/?add-to-cart=3746">'.__('UPGRADE XSHOP PRO','xshop-plus').'</a>',
								'description' => __( 'You will get more frequent updates and quicker support with the Pro version.', 'xshop-plus' ),
								//'plugin_slug' => 'x-instafeed',
								'id' => 'go-pro'
							),
							
						),
					),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name.__(' Pro','xshop-plus'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/xshop-pro',
				/* translators: View link */
				'get_pro_theme_label' => sprintf( __( 'Get %s', 'xshop-plus' ), 'X Shop Pro' ),
				'features'            => array(
					array(
						'title'       => esc_html__( 'Daring Design for Devoted Readers', 'xshop-plus' ),
						'description' => esc_html__( 'X Shop\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'xshop-plus' ),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Mobile-Ready For All Devices', 'xshop-plus' ),
						'description' => esc_html__( 'X  makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'xshop-plus' ),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Home slider', 'xshop-plus' ),
						'description' => esc_html__( 'X Shop Plus gives you extra slider feature. You can create awesome home slider in this theme.', 'xshop-plus' ),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Widgetized Sidebars To Keep Attention', 'xshop-plus' ),
						'description' => esc_html__( 'X Shop Plus comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'xshop-plus' ),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'One Click Demo install', 'xshop-plus' ),
						'description' => esc_html__( 'You can import demo site only one click so you can setup your site like demo very easily.','xshop-plus' ),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Multiple Header Layout', 'xshop-plus' ),
						'description' => esc_html__( 'X Shop Plus gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'xshop-plus' ),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Diffrent Style Blog', 'xshop-plus' ),
						'description' => esc_html__( 'X Shop\'s PRO version comes with more blog style to display and filter posts. For instance, you can have far more control on setting the source of the posts or how they are displayed, everything to push the content to the right people and promote it by the blink of an eye.', 'xshop-plus' ),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Flexible Home Page Design', 'xshop-plus' ),
						'description' => esc_html__( 'X Shop\'s PRO version has more controll available to enable you to place widgets on Footer or Below the Post at the end of your articles.', 'xshop-plus' ),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Read Time Calculator and total words counter', 'xshop-plus' ),
						'description' => esc_html__( 'Minimal Lit\'s PRO verison has a feature to let your viewer know the read time of the standared article you have posted on the basis of words per minute which you can control on your customizer .', 'xshop-plus' ),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Advance Customizer Options', 'xshop-plus' ),
						'description' => esc_html__( 'Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'xshop-plus' ),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'Advance Pagination', 'xshop-plus' ),
						'description' => esc_html__( 'Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.','xshop-plus' ),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					
					array(
						'title'       => esc_html__( 'Premium Support and Assistance', 'xshop-plus' ),
						'description' => esc_html__( 'We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.','xshop-plus' ),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__( 'No Credit Footer Link', 'xshop-plus' ),
						'description' => esc_html__( 'You can easily remove the Theme: X Shop Plus by xshop copyright from the footer area and make the theme yours from start to finish.', 'xshop-plus' ),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

			);

		xshop_About::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'xshop_about_setup' );


//Admin notice 
function xshop_new_optins_texts() {
	global $pagenow;
    if( get_option('xshopfit5' ) || $pagenow == 'themes.php' ){
        return;
    }
	$class = 'eye-notice notice notice-warning is-dismissible';
	$message = __( '<strong style="color:green"> Good News!!</strong><strong> Xshop Pro has now come up with many ready templates.<br> Now You can easily build your site with only one click without any hassle !! Get Xshop Pro version then select your template and import. Wow!! your site now ready. So why late get your pro version today.</strong> ', 'xshop-plus' );
    $url1 = esc_url('https://wpthemespace.com/product/xshop-pro/');
    $url3 =esc_url('https://wpthemespace.com/product/xshop-pro/?add-to-cart=3746');

	printf( '<div class="%1$s" style="padding:10px 15px 20px;text-transform:uppercase"><p>%2$s</p><a target="_blank" class="button button-primary" href="%3$s" style="margin-right:10px">'.__('X Shop Pro Details','xshop-plus').'</a><a target="_blank" class="button button-primary" href="%4$s" style="margin-right:10px">'.__('Upgrade Pro','xshop-plus').'</a><button class="button button-info btnend" style="margin-left:10px">'.__('Dismiss the notice','xshop-plus').'</button></div>', esc_attr( $class ), wp_kses_post( $message ),$url1,$url3 ); 
}
add_action( 'admin_notices', 'xshop_new_optins_texts' );

function xshop_new_optins_texts_init(){
    if(isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1 ){
		delete_option( 'xshopfit4' );
        update_option( 'xshopfit5', 1);
    }
}
add_action('init','xshop_new_optins_texts_init');