<?php

abstract class WPML_Elementor_Media_Node {

	/** @var WPML_Page_Builders_Media_Translate $media_translate */
	protected $media_translate;

	public function __construct( WPML_Page_Builders_Media_Translate $media_translate ) {
		$this->media_translate = $media_translate;
	}

	/**
	 * @param array $image
	 * @param string $lang
	 * @param string $source_lang
	 *
	 * @return mixed
	 */
	protected function translate_image_array( $image, $lang, $source_lang ) {
		if ( isset( $image['id'] ) && $image['id'] ) {
			$image['id'] = $this->media_translate->translate_id( $image['id'], $lang );
		}
		if ( isset( $image['url'] ) && $image['url'] ) {
			$image['url'] = $this->media_translate->translate_image_url( $image['url'], $lang, $source_lang );
		}

		return $image;
	}

	abstract function translate( $settings, $target_lang, $source_lang );
}