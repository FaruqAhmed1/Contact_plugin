<?php 

/**
 * Contact Meta Box
 * 
 */
class CMF {
    /**
     * Constructor for Class
     * 
     */
    
    public function __construct() {
        add_action ( 'add_meta_boxes',[$this,'add_contact_meta_boxes'] );
        add_action ( 'save_post',[$this,'save_contact_meta_box'] );
        
    }

    /**
     * register Contact Custom Meta
     * 
     */
    public function add_contact_meta_boxes() {
        add_meta_box(
            'contact_meta_box', 
            'Contact Details', 
            [$this,'contact_meta_box_html'], 
            'contact'
        );
    }

    /**
     * Get Contact Custom Meta
     * 
     */
    public function contact_meta_box_html( $post ){

    $email   = get_post_meta( $post->ID,  'contact_email', true );
    $phone   = get_post_meta( $post->ID,   'contact_phone', true );
    $address = get_post_meta( $post->ID, 'contact_address', true );

    wp_nonce_field( 'save_contact_meta_box_data', 'contact_meta_box_nonce' );
    ?>
    <p>
        <label for="contact_email">Email:</label>
        <input type="email" name="contact_email" value="<?php echo esc_attr( $email ); ?>" size="30" />
    </p>
    <p>
        <label for="contact_phone">Phone:</label>
        <input type="text" name="contact_phone" value="<?php echo esc_attr( $phone ); ?>" size="30" />
    </p>
    <p>
        <label for="contact_address">Address:</label>
        <input type="text" name="contact_address" value="<?php echo esc_attr( $address ); ?>" size="30" />
    </p>
    <?php

    }

    /**
     * Save Contact Custom Meta
     * 
     */
    public function save_contact_meta_box($post_id) {

        // Check if nonce is set
        if ( ! isset( $_POST['contact_meta_box_nonce'] ) ) {
            return;
        }

        // Save email
        if ( isset( $_POST['contact_email'] ) ) {
            $email = sanitize_email( $_POST['contact_email'] );
            update_post_meta( $post_id, 'contact_email', $email );
        }

        // Save Phone
        if ( isset( $_POST['contact_phone'] ) ) {
            $phone = sanitize_text_field( $_POST['contact_phone'] );
            update_post_meta( $post_id, 'contact_phone', $phone );
        }

        // Save Address
        if ( isset( $_POST['contact_address'] ) ) {
            $address = sanitize_textarea_field( $_POST['contact_address'] );
            update_post_meta( $post_id, 'contact_address', $address );
        }

    }
}