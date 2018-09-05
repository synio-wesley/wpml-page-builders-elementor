<?php

class WPML_Elementor_Media_Node_Call_To_Action extends WPML_Elementor_Media_Node {

	/**
	 * @param array  $settings
	 * @param string $target_lang
	 * @param string $source_lang
	 *
	 * @return mixed
	 */
	public function translate( $settings, $target_lang, $source_lang ) {
		if ( isset( $settings['bg_image'] ) ) {
			$settings['bg_image'] = $this->translate_image_array( $settings['bg_image'], $target_lang, $source_lang );
		}

		return $settings;
	}
}
