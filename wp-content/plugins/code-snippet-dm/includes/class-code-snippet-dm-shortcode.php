<?php

/**
 * Shortcode functions
 *
 * @link       devmaverick.com
 * @since      1.0.0
 *
 * @package    Code_Snippet_Dm
 * @subpackage Code_Snippet_Dm/includes
 */

/**
 *
 * This class defines all code necessary to create the shortcode.
 *
 * @since      1.0.0
 * @package    Code_Snippet_Dm
 * @subpackage Code_Snippet_Dm/includes
 * @author     George Cretu <george@devmaverick.com>
 */

class CSDM_Shortcode {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	 public function __construct() {

       add_shortcode( 'dm_code_snippet', array( $this, 'csdm_shortcode' ) );
        
 	}

	 // Add Shortcode for the code snippet
 	public function csdm_shortcode( $atts , $content = null ) {

 		// Attributes
 		$atts = shortcode_atts(
 			array(
                'background' 	    => 'yes',
				'background-mobile' => 'yes',
                'bg-color' 			=> '#abb8c3',
                'slim' 				=> 'no',
 				'theme'    			=> 'dark',
				'language' 			=> 'php',
				'wrapped'  			=> 'no',
                'height'  			=> '',
				'copy-text' 		=> 'Copy Code',
				'copy-confirmed'	=> 'Copied!',
 			),
 			$atts
 		);

        $background 		= '';
        $background_mobile 	= '';
        $slim               = '';
		$wrap 				= '';

		if ( 'yes' == $atts['background'] ) {
            $background = 'default';
            } else {
            $background = 'no-background';
		}

		if ( 'yes' == $atts['background-mobile'] ) {
            $background_mobile = '';
        } else {
            $background_mobile = 'no-background-mobile';
		}

		if ( 'yes' == $atts['wrapped'] ) {
            $wrap = 'wrap';
        } else {
            $wrap = 'no-wrap';
        }
        
        if ( 'yes' == $atts['slim'] ) {
            $slim = 'dm-slim-version';
        } else {
            $slim = 'dm-normal-version';
        }

 		return '<div class="dm-code-snippet ' . esc_attr($atts['theme']) . ' ' .  $background . ' ' .  $background_mobile . ' ' .  $slim . '" style="background-color:' . esc_attr($atts['bg-color']) . ';" snippet-height="' . esc_attr($atts['height']) . '">
			<div class="control-language">
                <div class="dm-buttons">
                    <div class="dm-buttons-left">
                        <div class="dm-button-snippet red-button"></div>
                        <div class="dm-button-snippet orange-button"></div>
                        <div class="dm-button-snippet green-button"></div>
                    </div>
                    <div class="dm-buttons-right">
                        <a id="dm-copy-raw-code">
                        <span class="dm-copy-text">'. esc_attr($atts['copy-text']) .'</span>
                        <span class="dm-copy-confirmed" style="display:none">'. esc_attr($atts['copy-confirmed']) .'</span>
                        <span class="dm-error-message" style="display:none">Use a different Browser</span></a>
                    </div>
                </div>
                <pre>
                    <code id="dm-code-raw" class="' . $wrap . ' language-' . esc_attr($atts['language']) . '">' . do_shortcode($content) . '</code>
                </pre>
			</div>
        </div>';

 	}

}
