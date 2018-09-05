<?php

class WPML_Elementor_Media_Node_Image_Box extends WPML_Elementor_Media_Node {

	/**
	 * @param array  $settings
	 * @param string $target_lang
	 * @param string $source_lang
	 *
	 * @return array
	 */
	public function translate( $settings, $target_lang, $source_lang ) {
		if ( isset( $settings['image'] ) ) {
			$settings['image'] = $this->translate_image_array( $settings['image'], $target_lang, $source_lang );
		}

		return $settings;
	}
}
