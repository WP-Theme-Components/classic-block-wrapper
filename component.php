<?php
/**
 * Wrap classic block content in a block, for formatting
 *
 * @package WP-Theme-Components
 * @subpackage classic-block-wrapper
 * @author Cameron Jones
 * @version 1.0.0
 */

namespace WP_Theme_Components\Classic_Block_Wrapper;

/**
 * Bail if accessed directly
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Wrap classic block content in a block, for formatting
 *
 * @since 1.0.0
 * @param string $block_content Block content.
 * @param array  $block Block object.
 * @return string
 */
function wrap_classic_posts( $block_content, $block ) {
	if ( $this->use_block_editor_for_post_type( get_post_type() ) ) {
		if ( is_null( $block['blockName'] ) && ! empty( trim( $block_content ) ) ) {
			$block_content = sprintf(
				'<div class="wp-block-classic">%1$s</div>',
				$block_content
			);
		}
	}
	return $block_content;
}

add_filter( 'render_block', __NAMESPACE__ . '\\wrap_classic_posts', 10, 2 );
