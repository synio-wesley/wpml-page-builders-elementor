<?php

class WPML_Elementor_Media_Node_Slides extends WPML_Elementor_Media_Node {

	/**
	 * @param array  $settings
	 * @param string $target_lang
	 * @param string $source_lang
	 *
	 * @return mixed
	 */
	public function translate( $settings, $target_lang, $source_lang ) {
		if ( ! isset( $settings['slides'] ) || ! is_array( $settings['slides'] ) ) {
			return $settings;
		}

		foreach ( $settings['slides'] as &$slide ) {

			if ( isset( $slide['background_image'] ) ) {
				$slide['background_image'] = $this->translate_image_array( $slide['background_image'], $target_lang, $source_lang );
			}
		}

		return $settings;
	}
}
