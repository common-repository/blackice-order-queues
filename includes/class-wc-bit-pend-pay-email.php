class WC_BIT_Pend_Pay_Email extends WC_Email {
    public function __construct() {
        $this->id = 'wc_bit_pend_pay_email';
        $this->customer_email = true;
        $this->title = 'Shipped';
        $this->description = '';

       $this->heading = 'Order Status';
       $this->subject = 'Shipped';

       $this->template_html  = 'emails/wc-customer-shipped.php';
       $this->template_plain = 'emails/plain/wc-customer-shipped.php';
       $this->template_base  = PLUGIN_PATH . 'templates/';
       $this->placeholders   = array(
            '{order_date}'   => '',
            '{order_number}' => '',
        );
       // Trigger on new paid orders
       add_action( 'woocommerce_order_status_bit-pend-pay', array( $this, 'trigger', 10, 2 ) );
       parent::__construct();
  }

  public function trigger( $order_id, $order = false ) {
        $this->setup_locale();

        if ( $order_id && ! is_a( $order, 'WC_Order' ) ) {
            $order = wc_get_order( $order_id );
        }

        if ( is_a( $order, 'WC_Order' ) ) {
            $this->object                         = $order;
            $this->recipient                      = $this->object->get_billing_email();
            $this->placeholders['{order_date}']   = wc_format_datetime( $this->object->get_date_created() );
            $this->placeholders['{order_number}'] = $this->object->get_order_number();
        }

        if ( $this->is_enabled() && $this->get_recipient() ) {
            $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
        }

        $this->restore_locale();
  }

  public function get_content_html() {
      return wc_get_template_html( $this->template_html, array(
            'order'              => $this->object,
            'email_heading'      => $this->get_heading(),
            'sent_to_admin'      => false,
            'plain_text'         => false,
            'email'              => $this,
        ), '', $this->template_base );
  }

  public function get_content_plain() {
    return wc_get_template_html( $this->template_plain, array(
            'order'              => $this->object,
            'email_heading'      => $this->get_heading(),
            'sent_to_admin'      => false,
            'plain_text'         => true,
            'email'              => $this,
        ), '', $this->template_base );
  }

} // end WC_BIT_Pend_Pay_Email class
