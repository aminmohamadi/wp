<?php
	acf_add_local_field_group(
		array(
			'key'                   => 'group_621748bc4f913',
			'title'                 => 'سیلیکون - گزینه های پاورقی',
			'fields'                => array(
				array(
					'key'               => 'field_62176065fa1df',
					'label'             => 'پاورقی سفارشی',
					'name'              => 'silicon_enable_footer',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_621748c33c241',
					'label'             => 'نوع پاورقی',
					'name'              => 'silicon_footer_variant',
					'type'              => 'select',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_62176065fa1df',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'none'           => 'پیش فرض',
						'static-content' => 'پاورقی استاتیک',
						'no-footer'      => 'هیچ یک',
					),
					'default_value'     => false,
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'return_format'     => 'value',
					'ajax'              => 0,
					'placeholder'       => '',
				),
				array(
					'key'               => 'field_62175efe8e1f4',
					'label'             => 'پاورقی های ثابت',
					'name'              => 'silicon_static_footers',
					'type'              => 'relationship',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_621748c33c241',
								'operator' => '==',
								'value'    => 'static-content',
							),
							array(
								'field'    => 'field_62176065fa1df',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'post_type'         => array(
						0 => 'mas_static_content',
					),
					'taxonomy'          => '',
					'filters'           => array(
						0 => 'search',
						1 => 'post_type',
						2 => 'taxonomy',
					),
					'elements'          => '',
					'min'               => 1,
					'max'               => 1,
					'return_format'     => 'id',
				),
				array(
					'key' => 'field_6221a4caa72d3',
					'label' => 'متن حق چاپ',
					'name' => 'silicon_copyright_text',
					'type' => 'textarea',
					'instructions' => 'فقط در پاورقی پیش فرض و 404 v1',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_621748c33c241',
								'operator' => '!=',
								'value'    => 'static-content',
							),
							array(
								'field'    => 'field_62176065fa1df',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '\'© کلیه حقوق محفوظ است. ساخته شده با <i class="bx bx-heart d-inline-block fs-lg text-gradient-primary align-middle mt-n1 mx-1"></i> توسط&nbsp; <a href="https://madrasthemes.com/" class="text-muted" target="_blank" rel="noopener">MadrasThemes</a>',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'post',
					),
				),
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'jetpack-portfolio',
					),
				),
			),
			'menu_order'            => 10,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 0,
		)
	);

