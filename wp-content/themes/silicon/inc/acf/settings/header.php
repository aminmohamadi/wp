<?php
/**
 * Acf Header Settings
 *
 * @package silicon
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_62170d662bb22',
		'title'                 => 'سیلیکون - گزینه های سرصفحه',
		'fields'                => array(
			array(
				'key'               => 'field_62170d80cf629',
				'label'             => 'هدر سفارشی',
				'name'              => 'custom_header',
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
				'ui_on_text'        => 'فعال',
				'ui_off_text'       => 'غیرفعال',
			),
			array(
				'key'               => 'field_623859de62a94',
				'label'             => 'موقعیت نوار ناوبری',
				'name'              => 'navbar_position',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
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
					'default'           => 'پیش فرض',
					'fixed-top'         => 'فیکس',
					'position-absolute' => 'مطلق',
				),
				'default_value'     => 'default',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 0,
				'return_format'     => 'value',
				'ajax'              => 0,
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_62385a3c62a95',
				'label'             => 'نوار را در اسکرول بچسبانید',
				'name'              => 'stick_navbar_on_scroll',
				'type'              => 'radio',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
							'operator' => '==',
							'value'    => '1',
						),
						array(
							'field'    => 'field_623859de62a94',
							'operator' => '!=',
							'value'    => 'fixed-top',
						),
					),
				),
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => array(
					'yes' => 'بله',
					'no'  => 'خیر',
				),
				'allow_null'        => 0,
				'other_choice'      => 0,
				'default_value'     => 'no',
				'layout'            => 'vertical',
				'return_format'     => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key'               => 'field_62385a8c62a96',
				'label'             => 'متن نوار ناوبری',
				'name'              => 'navbar_text',
				'type'              => 'radio',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
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
					'light' => 'روشن',
					'dark'  => 'تاریک',
				),
				'allow_null'        => 0,
				'other_choice'      => 0,
				'default_value'     => 'light',
				'layout'            => 'vertical',
				'return_format'     => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key'               => 'field_62385ac462a97',
				'label'             => 'پس زمینه',
				'name'              => 'background',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
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
					'default'  => 'شفاف',
					'bg-light' => 'روشن',
					'bg-dark'  => 'تاریک',
				),
				'default_value'     => 'default',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 0,
				'return_format'     => 'value',
				'ajax'              => 0,
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_62171c4e06281',
				'label'             => 'سایه فعال شود؟',
				'name'              => 'enable_shadow',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
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
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => 'فعال',
				'ui_off_text'       => 'غیرفعال',
			),
			array(
				'key'               => 'field_62171c7c06282',
				'label'             => 'سایه حالت تاریک را غیرفعال کنید',
				'name'              => 'disable_dark_mode_shadow',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171c4e06281',
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
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => 'فعال',
				'ui_off_text'       => 'غیرفعال',
			),
			array(
				'key'               => 'field_62171cc406283',
				'label'             => 'خط',
				'name'              => 'border',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
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
					'none'   => 'هیچ یک',
					'top'    => 'بالا',
					'right'  => 'راست',
					'bottom' => 'پایین',
					'left'   => 'چپ',
				),
				'default_value'     => 'none',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 1,
				'ajax'              => 0,
				'return_format'     => 'value',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_62171d5509a9c',
				'label'             => 'رنگ خط',
				'name'              => 'border_color',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171cc406283',
							'operator' => '!=',
							'value'    => 'none',
						),
						array(
							'field'    => 'field_62170d80cf629',
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
					'primary'   => 'اولیه',
					'secondary' => 'ثانویه',
					'success'   => 'موفق',
					'danger'    => 'خطر',
					'warning'   => 'هشدار',
					'light'     => 'روشن',
					'dark'      => 'تاریک',
					'link'      => 'لینک',
				),
				'default_value'     => 'primary',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 1,
				'ajax'              => 0,
				'return_format'     => 'value',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_62171f0d31520',
				'label'             => 'فعال کردن دکمه اکنون خرید کنید؟',
				'name'              => 'enable_buy_now_button',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62170d80cf629',
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
				'message'           => '',
				'default_value'     => 0,
				'ui'                => 1,
				'ui_on_text'        => 'فعال',
				'ui_off_text'       => 'غیرفعال',
			),
			array(
				'key'               => 'field_62171f3e31521',
				'label'             => 'نماد دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_icon',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
				'default_value'     => 'bx bx-cart',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_62171fd431522',
				'label'             => 'رنگ دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_color',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
					'primary'   => 'اولیه',
					'secondary' => 'ثانویه',
					'success'   => 'موفق',
					'danger'    => 'خطر',
					'warning'   => 'هشدار',
					'light'     => 'روشن',
					'dark'      => 'تاریک',
					'link'      => 'لینک',
				),
				'default_value'     => 'primary',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 1,
				'ajax'              => 0,
				'return_format'     => 'value',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_6217204931523',
				'label'             => 'متن دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_text',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
				'default_value'     => 'اکنون خرید کنید',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_6217207531524',
				'label'             => 'لینک دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_link',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
				'default_value'     => '#',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_6217209431525',
				'label'             => 'سایز دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_size',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
					'sm'   => 'کوچک',
					'\'\'' => 'متوسط',
					'lg'   => 'بزرگ',
				),
				'default_value'     => 'sm',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 0,
				'return_format'     => 'value',
				'ajax'              => 0,
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_6217211231526',
				'label'             => 'شکل دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_shape',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
					'rounded'      => 'پیش فرض',
					'rounded-pill' => 'قرص',
					'rounded-0'    => 'مربع',
				),
				'default_value'     => 'rounded',
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 1,
				'ajax'              => 0,
				'return_format'     => 'value',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_621721c931527',
				'label'             => 'CSS دکمه اکنون خرید کنید',
				'name'              => 'buy_now_button_css',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_62171f0d31520',
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
				'default_value'     => 'fs-sm',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
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
		'menu_order'            => 0,
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
