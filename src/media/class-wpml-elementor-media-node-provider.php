<?php

class WPML_Elementor_Media_Node_Provider {

	/** @var WPML_Page_Builders_Media_Translate $media_translate */
	private $media_translate;

	/** @var WPML_Elementor_Media_Node[] */
	private $nodes = array();

	/**
	 * @param string $type
	 *
	 * @return WPML_Elementor_Media_Node
	 */
	public function get( $type ) {
		if ( ! array_key_exists( $type, $this->nodes ) ) {
			switch ( $type ) {
				case 'image':
					$node = new WPML_Elementor_Media_Node_Image( $this->get_media_translate() );
					break;

				case 'slides':
					$node = new WPML_Elementor_Media_Node_Slides( $this->get_media_translate() );
					break;

				default:
					$node = null;
			}

			$this->nodes[ $type ] = $node;
		}

		return $this->nodes[ $type ];
	}

	/** @return WPML_Page_Builders_Media_Translate */
	private function get_media_translate() {
		global $sitepress;

		if ( ! $this->media_translate ) {
			$this->media_translate = new WPML_Page_Builders_Media_Translate(
				new WPML_Translation_Element_Factory( $sitepress ),
				new WPML_Media_Image_Translate( $sitepress, new WPML_Media_Attachment_By_URL_Factory() )
			);
		}

		return $this->media_translate;
	}
}
