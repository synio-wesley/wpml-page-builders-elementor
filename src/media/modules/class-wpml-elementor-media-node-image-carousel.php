<?php

class WPML_Elementor_Media_Node_Image_Carousel extends WPML_Elementor_Media_Node {

	/**
	 * @param array  $settings
	 * @param string $target_lang
	 * @param string $source_lang
	 *
	 * @return array
	 */
	public function translate( $settings, $target_lang, $source_lang ) {
		if ( isset( $settings['carousel'] ) ) {

			foreach ( $settings['carousel'] as &$carousel ) {
				$carousel = $this->translate_image_array( $carousel, $target_lang, $source_lang );
			}
		}

		return $settings;
	}
}
