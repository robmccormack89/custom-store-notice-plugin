<?php
// (add_custom_demo_store_notice > rmcc_before_header > priority 10)
// functions which hook into a custom hook location like rmcc_before_header should be written as normal function & not a class method
// this is until I figure out how to remove action hooks with clas methods from another plugin.
// DirectToCheckout Plugin removes this function from rmcc_before_header but only on checkout. See DirectToCheckout->remove_custom_store_notice_on_checkout()
function add_custom_demo_store_notice() {
    
  if (!is_store_notice_showing()) return;
  
  $notice = get_option('woocommerce_demo_store_notice'); 
  
  if (empty($notice)) $notice = _x( 'This is a demo store for testing purposes — no orders shall be fulfilled.', 'Store notice', 'custom-store-notice' ); 

  echo apply_filters(
    'woocommerce_demo_store', 
    '<div class="woocommerce-store-notice demo_store uk-position-z-index theme-border-top"><div class="store-notice-wrap">'.wp_kses_post($notice).' <a href="#" class="woocommerce-store-notice__dismiss-link">' . esc_html_x('Dismiss', 'Store notice', 'custom-store-notice') . ' <i class="fas fa-times"></i></a></div></div>', 
    $notice
  ); 
}