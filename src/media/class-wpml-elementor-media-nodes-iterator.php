<?php

class WPML_Elementor_Media_Nodes_Iterator implements IWPML_PB_Media_Nodes_Iterator {

	/** @var WPML_Elementor_Media_Node_Provider $node_provider */
	private $node_provider;

	public function __construct( WPML_Elementor_Media_Node_Provider $node_provider ) {
		$this->node_provider = $node_provider;
	}

	/**
	 * @param array $data_array
	 * @param string $lang
	 * @param string $source_lang
	 *
	 * @return array
	 */
	public function translate( $data_array, $lang, $source_lang ) {
		foreach ( $data_array as &$node ) {
			if ( $node['elements'] ) {
				$node['elements'] = $this->translate( $node['elements'], $lang, $source_lang );
			} elseif ( isset( $node['elType'], $node['widgetType'], $node['settings'] )
			           && 'widget' === $node['elType']
			) {
				$node = $this->translate_node( $node, $lang, $source_lang );
			}
		}

		return $data_array;
	}

	/**
	 * @param stdClass $node_data
	 * @param string   $lang
	 * @param string   $source_lang
	 *
	 * @return stdClass
	 */
	private function translate_node( $node_data, $lang, $source_lang ) {
		$node = $this->node_provider->get( $node_data['widgetType'] );

		if ( $node ) {
			$node_data['settings'] = $node->translate( $node_data['settings'], $lang, $source_lang );
		}

		return $node_data;
	}
}
