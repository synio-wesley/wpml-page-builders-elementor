<?php

class WPML_Elementor_Media_Node_Image_Gallery extends WPML_Elementor_Media_Node {

	/**
	 * @param array  $settings
	 * @param string $target_lang
	 * @param string $source_lang
	 *
	 * @return mixed
	 */
	public function translate( $settings, $target_lang, $source_lang ) {
		if ( isset( $settings['wp_gallery' ] ) ) {

			foreach ( $settings['wp_gallery' ] as &$image ) {
				$image = $this->translate_image_array( $image, $target_lang, $source_lang );
			}
		}

		return $settings;
	}
}