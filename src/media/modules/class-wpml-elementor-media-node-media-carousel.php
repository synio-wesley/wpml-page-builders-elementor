<?php

class WPML_Elementor_Media_Node_Media_Carousel extends WPML_Elementor_Media_Node {

	public function translate( $settings, $target_lang, $source_lang ) {
		if ( ! isset( $settings['slides'] ) || ! is_array( $settings['slides'] ) ) {
			return $settings;
		}

		foreach ( $settings['slides'] as $slide ) {
			
		}
	}
}
