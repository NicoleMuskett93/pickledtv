<?php

/**
 * Register Block Types (ACF)
 */

function pickledtv_register_blocks()
{

	if (function_exists('pickledtv_register_blocks')) {
		// Hero Block
		acf_register_block(array(
			'name'				=> 'pickledtv-hero',
			'title'				=> __('PickledTv Hero'),
			'description'		=> __('Create a page hero for the PickledTV website'),
			'render_template'	=> 'template-parts/blocks/hero/hero.php',
			'category'			=> 'pickledtv_category',
			'icon'				=> 'slides',
			'keywords'			=> array('pickledtv, hero'),
			'enqueue_assets'    => function () {
				wp_enqueue_style('hero-style', get_stylesheet_directory_uri() . '/template-parts/blocks/hero/hero.css', array(), '1.0.0');
			}
		));
	}
	if (function_exists('pickledtv_register_blocks')) {

		acf_register_block(array(
			'name'				=> 'pickledtv-mid-block',
			'title'				=> __('PickledTv Mid Block'),
			'description'		=> __('Create a page hero for the PickledTV website'),
			'render_template'	=> 'template-parts/blocks/mid/mid.php',
			'category'			=> 'pickledtv_category',
			'icon'				=> 'slides',
			'keywords'			=> array('pickledtv'),
			'enqueue_assets'    => function () {
				wp_enqueue_style('mid-style', get_stylesheet_directory_uri() . '/template-parts/blocks/mid/mid.css', array(), '1.0.0');
			}
		));
	}

	if (function_exists('pickledtv_register_blocks')) {
		// Hero Block
		acf_register_block(array(
			'name'				=> 'pickledtv-bot-block',
			'title'				=> __('PickledTv Bottom Block'),
			'description'		=> __('Create a page hero for the PickledTV website'),
			'render_template'	=> 'template-parts/blocks/bot/bot.php',
			'category'			=> 'pickledtv_category',
			'icon'				=> 'slides',
			'keywords'			=> array('pickledtv, bot'),
			'enqueue_assets'    => function () {
				wp_enqueue_style('title-style', get_stylesheet_directory_uri() . '/template-parts/blocks/bot/bot.css', array(), '1.0.0');
			}
		));
	}
	if (function_exists('pickledtv_register_blocks')) {
		// Hero Block
		acf_register_block(array(
			'name'				=> 'pickledtv-contact-block',
			'title'				=> __('PickledTv Contact Block'),
			'description'		=> __('Create a page hero for the PickledTV website'),
			'render_template'	=> 'template-parts/blocks/contact/contact.php',
			'category'			=> 'pickledtv_category',
			'icon'				=> 'slides',
			'keywords'			=> array('pickledtv, contact'),
			'enqueue_assets'    => function () {
				wp_enqueue_style('title-style', get_stylesheet_directory_uri() . '/template-parts/blocks/contact/contact.css', array(), '1.0.0');
			}
		));
	}
}

add_action('acf/init', 'pickledtv_register_blocks');
