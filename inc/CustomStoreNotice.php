<?php
namespace Rmcc;
use Timber\Timber;

/**
 * CUSTOM STORE NOTICE
 *
**/

class CustomStoreNotice extends Timber {

  public function __construct() {
    parent::__construct();
    
    // timber stuff. the usual stuff
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));
    
    // after plugins are loaded, do our stuff. this is so other plugins have a chance to do their stuff first
    add_action('plugins_loaded', array($this, 'remove_demo_store_notice'));
    
    add_action('rmcc_before_header', 'add_custom_demo_store_notice', 10);
  }
  
  // functions which hook into a custom hook location like rmcc_before_header should be written as normal function & not a class method
  // this is until I figure out how to remove action hooks with clas methods from another plugin.
  // DirectToCheckout Plugin removes this function from rmcc_before_header but only on checkout. See DirectToCheckout->remove_custom_store_notice_on_checkout()
  function add_custom_demo_store_notice() {
      
    if (!is_store_notice_showing()) return;
    
    $notice = get_option('woocommerce_demo_store_notice'); 
    
    if (empty($notice)) $notice = _x( 'This is a demo store for testing purposes — no orders shall be fulfilled.', 'Store notice', 'cautious-octo-fiesta' ); 
  
    echo apply_filters(
      'woocommerce_demo_store', 
      '<div class="woocommerce-store-notice demo_store"><div class="store-notice-wrap">'.wp_kses_post($notice).' <a href="#" class="woocommerce-store-notice__dismiss-link">' . esc_html_x('Dismiss', 'Store notice', 'cautious-octo-fiesta') . ' <i class="fas fa-times"></i></a></div></div>', 
      $notice
    ); 
  }
  
  public function remove_demo_store_notice() {
    remove_action('wp_footer', 'woocommerce_demo_store', 10);
  }

  public function add_to_twig($twig) { 
    $twig->addExtension(new \Twig_Extension_StringLoader());
    return $twig;
  }

  public function add_to_context($context) {
    return $context;    
  }

}