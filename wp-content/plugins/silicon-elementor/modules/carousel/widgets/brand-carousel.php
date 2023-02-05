<?php
namespace SiliconElementor\Modules\Carousel\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Control_Media;
use Elementor\Utils;
use SiliconElementor\Modules\Carousel\Skins;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Brand Carousel
 */
class Brand_Carousel extends Base {

	/**
	 * Skip widget.
	 *
	 * @var bool
	 */
	protected $_has_template_content = false;

	/**
	 * Get the name of the widget.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'sn-brand-carousel';
	}

	/**
	 * Get the title of the widget.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Brands Carousel', 'silicon-elementor' );
	}

	/**
	 * Get the icon for the widget.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-carousel';
	}

	/**
	 * Get the keywords associated with the widget.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return [ 'cards', 'carousel', 'image', 'brands' ];
	}

	/**
	 * Register the Skins with the widget.
	 *
	 * @return void
	 */
	protected function register_skins() {
		$this->add_skin( new Skins\Skin_Brand_Carousel( $this ) );
	}

	/**
	 * Get the group for this widget.
	 *
	 * @return string
	 */
	public function get_group_name() {
		return 'carousel';
	}

	/**
	 * Display Carousel.
	 *
	 * @param array  $slide repeater single control arguments.
	 * @param array  $settings control arguments.
	 * @param string $element_key slider id argument.
	 * @return void
	 */
	protected function print_slide( array $slide, array $settings, $element_key ) {

	}

	/**
	 * Register controls for this widget.
	 *
	 * @return void
	 */
	protected function register_controls() {
		parent::register_controls();

		$this->start_injection(
			[
				'at' => 'before',
				'of' => 'section_slides_style',
			]
		);

		// $this->start_controls_section(
		// 'section_pagination',
		// [
		// 'label' => esc_html__( 'Pagination', 'silicon-elementor' ),
		// 'tab'   => Controls_Manager::TAB_STYLE,
		// ]
		// );

		// $this->add_control(
		// 'pagination_class',
		// [
		// 'label'   => esc_html__( 'Pagination Class', 'silicon-elementor' ),
		// 'type'    => Controls_Manager::TEXT,
		// 'default' => 'pt-2 mt-5',
		// ]
		// );

		// $this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'silicon-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'show_card',
			[
				'type'      => Controls_Manager::SWITCHER,
				'label'     => esc_html__( 'Card', 'silicon-elementor' ),
				'default'   => 'yes',
				'label_off' => esc_html__( 'Hide', 'silicon-elementor' ),
				'label_on'  => esc_html__( 'Show', 'silicon-elementor' ),
			]
		);

		$this->add_control(
			'show_hover',
			[
				'type'      => Controls_Manager::SWITCHER,
				'label'     => esc_html__( 'Hover', 'silicon-elementor' ),
				'default'   => 'yes',
				'label_off' => esc_html__( 'Hide', 'silicon-elementor' ),
				'label_on'  => esc_html__( 'Show', 'silicon-elementor' ),
				'condition' => [
					'show_card' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_border',
			[
				'type'      => Controls_Manager::SWITCHER,
				'label'     => esc_html__( 'Border Disable', 'silicon-elementor' ),
				'default'   => 'no',
				'label_off' => esc_html__( 'No', 'silicon-elementor' ),
				'label_on'  => esc_html__( 'Yes', 'silicon-elementor' ),
			]
		);

		$this->add_control(
			'shadow',
			[
				'label'        => esc_html__( 'Enable Shadow', 'silicon-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'silicon-elementor' ),
				'label_off'    => esc_html__( 'No', 'silicon-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'card_class',
			[
				'label'       => esc_html__( 'Card Class', 'silicon-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'title'       => esc_html__( 'Add your custom class for <a> tag  without the dot. e.g: my-class', 'silicon-elementor' ),
				'default'     => 'px-2 mx-2',
				'label_block' => true,
				'description' => esc_html__( 'Additional CSS class that you want to apply to the a tag', 'silicon-elementor' ),

			]
		);

		$this->add_control(
			'card_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'silicon-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card' => 'background-color: {{VALUE}} !important;',
				],
				'condition' => [
					'show_card' => 'yes',
				],

			]
		);

		$this->add_control(
			'card_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'silicon-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-hover:hover, {{WRAPPER}} .sn-card-hover:focus' => 'background-color: {{VALUE}} !important;',
				],
				'condition' => [
					'show_hover' => 'yes',
				],
				'separator' => 'after',
			]
		);

		// $this->add_control(
		// 'wrap_class',
		// [
		// 'label'       => esc_html__( 'Image Wrap Class', 'silicon-elementor' ),
		// 'type'        => Controls_Manager::TEXT,
		// 'title'       => esc_html__( 'Add your custom class for <div> tag  without the dot. e.g: my-class', 'silicon-elementor' ),
		// 'default'     => '',
		// 'label_block' => true,
		// 'description' => esc_html__( 'Additional CSS class that you want to apply to the a tag', 'silicon-elementor' ),
		// 'condition'   => [
		// 'style' => 'style-v2',
		// ],

		// ]
		// );

		$this->add_control(
			'image_class',
			[
				'label'       => esc_html__( 'Image Class', 'silicon-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'title'       => esc_html__( 'Add your custom class for <img> tag  without the dot. e.g: my-class', 'silicon-elementor' ),
				'default'     => 'd-block mx-auto my-2',
				'label_block' => true,
				'description' => esc_html__( 'Additional CSS class that you want to apply to the img tag', 'silicon-elementor' ),
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'type'      => Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Image Width', 'silicon-elementor' ),
				'range'     => [
					'px' => [
						'min' => 100,
						'max' => 1140,
					],
				],
				'default'   => [
					'size' => 154,
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-slide img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->end_controls_section();

		$this->end_injection();

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Style', 'silicon-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-v1',
				'options' => [
					'style-v1' => 'Style v1',
					'style-v2' => 'Style v2',
				],
			],
			[
				'position' => [
					'at' => 'before',
					'of' => 'slides',
				],
			]
		);

		$this->start_injection(
			[
				'of' => 'slides',
			]
		);

		$this->end_injection();
	}

	/**
	 * Register repeater controls for this widget.
	 *
	 * @param Repeater $repeater repeater control arguments.
	 * @return void
	 */
	protected function add_repeater_controls( Repeater $repeater ) {
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'silicon-elementor' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'       => __( 'Link', 'silicon-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'silicon-elementor' ),
			]
		);

	}

	/**
	 * Slider defaults.
	 *
	 * @return string
	 */
	protected function get_repeater_defaults() {
		$placeholder_image_src = Utils::get_placeholder_image_src();

		return [
			[
				'image' => [
					'url' => $placeholder_image_src,
				],
			],
			[
				'image' => [
					'url' => $placeholder_image_src,
				],
			],
			[
				'image' => [
					'url' => $placeholder_image_src,
				],
			],
			[
				'image' => [
					'url' => $placeholder_image_src,
				],
			],
		];
	}

	/**
	 * Get slider settings
	 *
	 * @param array $slide the slides settings.
	 * @param array $settings the widget settings.
	 * @param array $element_key the element_key slider id.
	 * @param array $count the widget settings.
	 * @return void
	 */
	public function print_image_slide( array $slide, array $settings, $element_key, $count ) {

		$image_url = $slide['image']['url'];
		$card_link = ! empty( $slide['link'] ) ? $slide['link'] : '#';

		$image_class = [];
		if ( $settings['image_class'] ) {
			$image_class[] = $settings['image_class'];
		}

		if ( 'yes' === $settings['show_card'] ) {
			if ( 'style-v1' === $settings['style'] ) {
				$card_class = [ 'card', 'card-body' ];
			} else {
				$card_class = [ 'card' ];
			}
		}
		if ( 'yes' === $settings['show_hover'] ) {
			if ( 'yes' === $settings['show_card'] ) {
				$card_class[] = 'card-hover ';
			}
		}
		if ( 'yes' === $settings['show_border'] ) {
			$card_class[] = 'border-0';
		}
		if ( 'yes' === $settings['shadow'] ) {
			$card_class[] = 'shadow-sm';
		}
		if ( $settings['card_class'] ) {
			$card_class[] = $settings['card_class'];
		}
		$wrap_class = [];
		if ( 'yes' === $settings['show_card'] ) {
			$wrap_class[] = 'card-body';

		}

		$this->add_render_attribute(
			'card-' . $element_key,
			[
				'class' => $card_class,
				'href'  => $card_link,
			]
		);
		$this->add_render_attribute(
			'wrap-' . $element_key,
			[
				'class' => $wrap_class,
			]
		);
		$this->add_render_attribute(
			'image-' . $element_key,
			[
				'class' => $image_class,
				'src'   => $image_url,
				'width' => $settings['width']['size'],
				'alt'   => Control_Media::get_image_alt( $slide['image'] ),
			]
		);

		if ( $image_url ) {
			$this->skin_slide_start( $settings, $element_key );
			?>
			<!-- <div class="swiper-slide py-3"> -->
				<a <?php $this->print_render_attribute_string( 'card-' . $element_key ); ?>>
					<?php if ( 'style-v2' === $settings['style'] && 'yes' === $settings['show_card'] ) { ?>
						<div <?php $this->print_render_attribute_string( 'wrap-' . $element_key ); ?>>
					<?php } ?>
						<img <?php $this->print_render_attribute_string( 'image-' . $element_key ); ?>>
					<?php if ( 'style-v2' === $settings['style'] && 'yes' === $settings['show_card'] ) { ?>
						</div>
					<?php } ?>

				</a>
			</div>
			<?php
		}
	}

}
