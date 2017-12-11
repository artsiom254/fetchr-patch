<?php

function fetchr_custom_processing($order_id){
 if (get_option('woocommerce_wc_fetchr_shipping_method_settings')['fetchr_enabled'] === 'yes'){
     $server_url = "http://dev.menavip.com/";

     if (get_option('mena_is_production') == "1")
     {
         $server_url = "http://menavip.com/";
     }

     $order = get_post( $order_id );
         $shipping_country = get_post_meta($order_id,'_shipping_country',true);
         $order_wc = new WC_Order( $order_id );

         $products = $order_wc->get_items();

         if( get_option('mena_servcie_type') == "fulfil_delivery")
         {
             // fulfilment + delivery
             menavip_fulfil_delivery ($order,$order_wc,$products,$server_url);
         }
         else
         {
             // delivery only
             menavip_delivery_only ($order,$order_wc,$products,$server_url);
         }

     }
}
