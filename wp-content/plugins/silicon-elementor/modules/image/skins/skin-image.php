<?php
namespace SiliconElementor\Modules\Image\Skins;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor;
use Elementor\Skin_Base;
use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use SiliconElementor\Plugin;
use Elementor\Control_Media;
use Elementor\Repeater;
use Elementor\Utils;
use SiliconElementor\Core\Utils as SNUtils;

/**
 * Skin Image Silicon
 */
class Skin_Image extends Skin_Base {

	/**
	 * Constructor.
	 *
	 * @param Elementor\Widget_Base $parent The widget settings.
	 * @return void
	 */
	public function __construct( Elementor\Widget_Base $parent ) {
		parent::__construct( $parent );
		add_filter( 'elementor/widget/print_template', array( $this, 'skin_print_template' ), 10, 2 );
		add_action( 'elementor/element/image/section_image/after_section_end', [ $this, 'add_content_control' ], 10 );
		add_action( 'elementor/element/image/section_style_image/after_section_end', [ $this, 'modifying_style_sections' ], 10 );
	}

	/**
	 * Get the id of the skin.
	 *
	 * @return string
	 */
	public function get_id() {
		return 'si-image';
	}

	/**
	 * Get the title of the skin.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'LightGallery - Video', 'silicon-elementor' );
	}

	/**
	 * Added control of the Content tab.
	 */
	public function add_content_control() {

		$disable_controls = [
			'link_to',
			'inline_svg',
			'color',
		];

		foreach ( $disable_controls as $control ) {
			$this->parent->update_control(
				$control,
				[
					'condition' => [
						'_skin!' => 'si-image',
					],
				]
			);
		}

		$this->parent->start_injection(
			[
				'at' => 'after',
				'of' => 'image_class',
			]
		);

		$this->add_control(
			'link',
			[
				'type'        => Controls_Manager::URL,
				'label'       => esc_html__( 'Link', 'silicon-elementor' ),
				'default'     => [
					'url' => esc_url( 'https://www.youtube.com/watch?v=LBfAnFX15nc', 'silicon-elementor' ),
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'silicon-elementor' ),

			]
		);

		$this->add_control(
			'play_button',
			[
				'type'      => Controls_Manager::SWITCHER,
				'label'     => esc_html__( 'Enable Play Button?', 'silicon-elementor' ),
				'default'   => 'yes',
				'label_on'  => esc_html__( 'Show', 'silicon-elementor' ),
				'label_off' => esc_html__( 'Hide', 'silicon-elementor' ),
			]
		);

		$this->add_control(
			'button_size',
			[
				'label'     => esc_html__( 'Size', 'silicon-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'xl',
				'options'   => [
					''   => esc_html__( 'Default', 'silicon-elementor' ),
					'sm' => esc_html__( 'Small', 'silicon-elementor' ),
					'lg' => esc_html__( 'Large', 'silicon-elementor' ),
					'xl' => esc_html__( 'Extra Large', 'silicon-elementor' ),
				],
				'condition' => [
					$this->get_control_id( 'play_button' ) => 'yes',
				],
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label'            => esc_html__( 'Icon', 'silicon-elementor' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => [
					'value' => 'bx bx-play',
				],
				'skin'             => 'inline',
				'label_block'      => false,
				'condition'        => [
					$this->get_control_id( 'play_button' ) => 'yes',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'      => esc_html__( 'Icon Size', 'silicon-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .sn-button-icon' => 'font-size: {{SIZE}}{{UNIT}} !important;',
				],
				'condition'  => [
					$this->get_control_id( 'play_button' ) => 'yes',
				],
			]
		);

		$this->parent->end_injection();
	}

	/**
	 * Added control of the Content tab.
	 *
	 * @param Elementor\Widget_Base $widget The widget settings.
	 */
	public function modifying_style_sections( Elementor\Widget_Base $widget ) {
		$this->parent     = $widget;
		$disable_controls = [
			'',
		];

		foreach ( $disable_controls as $control ) {
			$this->parent->update_control(
				$control,
				[
					'condition' => [
						'_skin!' => 'si-image',
					],
				]
			);
		}

		$this->parent->start_injection(
			[
				'at' => 'after',
				'of' => 'image_box_shadow',
			]
		);

		$this->start_controls_section(
			'section_style_caption',
			[
				'label' => esc_html__( 'Button', 'silicon-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'button_style' );

		$this->start_controls_tab(
			'button_normal',
			[
				'label' => esc_html__( 'Normal', 'silicon-elementor' ),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Button Background Color', 'silicon-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .silicon-button' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'silicon-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#3e4265',
				'selectors' => [
					'{{WRAPPER}} .silicon-button' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_hover',
			[
				'label' => esc_html__( 'Hover', 'silicon-elementor' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__( 'Button Hover Color', 'silicon-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#6366f1',
				'selectors' => [
					'{{WRAPPER}} .silicon-button:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Icon Hover Color', 'silicon-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .silicon-button:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->parent->end_injection();
	}

	/**
	 * Render.
	 *
	 * @return void
	 */
	public function render() {

		$parent   = $this->parent;
		$settings = $parent->get_settings_for_display();

		$skin_control_ids = [
			'link',
			'play_button',
			'button_size',
			'selected_icon',
			'icon_size',
		];

		$skin_settings = [];

		foreach ( $skin_control_ids as $skin_control_id ) {
			$skin_settings[ $skin_control_id ] = $this->get_instance_value( $skin_control_id );
		}

		$button_class = [ 'btn', 'btn-icon', 'btn-video', 'silicon-button', 'stretched-link', 'd-flex' ];

		if ( ! empty( $skin_settings['button_size'] ) ) {
			$button_class[] = 'btn-' . $skin_settings['button_size'];
		}

		$link = $skin_settings['link']['url'];

		$parent->add_render_attribute(
			'button',
			[
				'href'           => $link,
				'class'          => $button_class,
				'data-bs-toggle' => 'video',
			]
		);

		$image_class = $settings['image_class'];
		$image_src   = $settings['image']['url'];

		$parent->add_render_attribute(
			'image_attribute',
			[
				'class' => $image_class,
				'src'   => $image_src,
				'alt'   => Control_Media::get_image_alt( $settings['image'] ),
			]
		);

		?><div class="position-relative rounded-3 overflow-hidden">
			<?php if ( 'yes' === $skin_settings['play_button'] ) : ?>
			<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
				<a <?php $parent->print_render_attribute_string( 'button' ); ?>>
					<?php
					if ( ! isset( $skin_settings['selected_icon']['value']['url'] ) ) {
						?>
						<i class="<?php echo esc_attr( $skin_settings['selected_icon']['value'] ); ?> sn-button-icon" aria-hidden="true"></i>
						<?php
					}
					if ( isset( $skin_settings['selected_icon']['value']['url'] ) ) {
						Icons_Manager::render_icon( $skin_settings['selected_icon'] );
					}
					?>
				</a>
			</div>
			<?php endif; ?>
			<span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-35"></span>
			<?php
			$image_html = wp_kses_post( Group_Control_Image_Size::get_attachment_image_html( $settings, 'image', 'image' ) );
			echo wp_kses_post( $this->add_class_to_image_html( $image_html, $image_class ) );
			?>
		</div>
		<?php
	}
	/**
	 * Render the Image class and size..
	 *
	 * @param string $image_html image_html arguments.
	 * @param array  $img_classes attributes.
	 * @return string
	 */
	public function add_class_to_image_html( $image_html, $img_classes ) {
		if ( is_array( $img_classes ) ) {
			$str_class = implode( ' ', $img_classes );
		} else {
			$str_class = $img_classes;
		}

		if ( false === strpos( $image_html, 'class="' ) ) {
			$image_html = str_replace( '<img', '<img class="' . esc_attr( $str_class ) . '"', $image_html );
		} else {
			$image_html = str_replace( 'class="', 'class="' . esc_attr( $str_class ) . ' ', $image_html );
		}

		return $image_html;
	}

	/**
	 * Skin print template.
	 *
	 * @param array $content the content.
	 * @param array $widget widget name.
	 * @return string
	 */
	public function skin_print_template( $content, $widget ) {
		if ( 'image' === $widget->get_name() ) {
			return '';
		}
		return $content;
	}
}
