<?php

namespace SiliconElementor\Modules\Button;

use SiliconElementor\Base\Module_Base;
use SiliconElementor\Modules\Button\Skins;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Module for Button
 */
class Module extends Module_Base {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->add_actions();
	}

	/**
	 * Get Name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'override-button';
	}

	/**
	 * Add Action.
	 *
	 * @return void
	 */
	public function add_actions() {
		add_action( 'elementor/widget/button/skins_init', [ $this, 'init_skins' ], 10 );
	}

	/**
	 * Add Action.
	 *
	 * @param array $widget The widget.
	 * @return void
	 */
	public function init_skins( $widget ) {
		$widget->add_skin( new Skins\Skin_Button_Silicon( $widget ) );
		$widget->add_skin( new Skins\Skin_Button_Market( $widget ) );
		$widget->add_skin( new Skins\Skin_Button_Reviews( $widget ) );
	}
}
