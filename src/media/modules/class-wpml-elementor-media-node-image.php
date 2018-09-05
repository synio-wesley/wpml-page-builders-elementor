<?php

class WPML_Elementor_Media_Node_Image extends WPML_Elementor_Media_Node {

	private $image_properties = array(
		'image',
		'_background_image',
		'_background_hover_image',
	);

	/**
	 * @param array  $settings
	 * @param string $target_lang
	 * @param string $source_lang
	 *
	 * @return array
	 */
	public function translate( $settings, $target_lang, $source_lang ) {
		foreach ( $this->image_properties as $image_property ) {

			if ( isset( $settings[ $image_property ] ) ) {
				$settings[ $image_property ] = $this->translate_image_array(
					$settings[ $image_property ],
					$target_lang,
					$source_lang
				);
			}
		}

		if ( isset( $settings['caption'], $settings['image']['id'] ) ) {
			$image_data          = wp_prepare_attachment_for_js( $settings['image']['id'] );
			$settings['caption'] = $image_data['caption'];
		}

		return $settings;
	}
}
