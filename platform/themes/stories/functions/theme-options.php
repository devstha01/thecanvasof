<?php

app()->booted(function () {
    theme_option()
        ->setField([
            'id'         => 'copyright',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Copyright'),
            'attributes' => [
                'name'    => 'copyright',
                'value'   => '© 2021 Botble Technologies. All right reserved.',
                'options' => [
                    'class'        => 'form-control',
                    'placeholder'  => __('Change copyright'),
                    'data-counter' => 250,
                ],
            ],
            'helper'     => __('Copyright on footer of site'),
        ])
        ->setField([
            'id'         => 'designed_by',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Designed by'),
            'attributes' => [
                'name'    => 'designed_by',
                'value'   => 'Designed by AliThemes | All rights reserved.',
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 250,
                ],
            ],
        ])
        ->setField([
            'id'         => 'preloader_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Preloader?'),
            'attributes' => [
                'name'    => 'preloader_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'primary_font',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'googleFonts',
            'label'      => __('Primary font'),
            'attributes' => [
                'name'  => 'primary_font',
                'value' => 'Roboto',
            ],
        ])
        ->setField([
            'id'         => 'primary_color',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Primary color'),
            'attributes' => [
                'name'  => 'primary_color',
                'value' => '#5869DA',
            ],
        ])
        ->setField([
            'id'         => 'secondary_color',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Secondary color'),
            'attributes' => [
                'name'  => 'secondary_color',
                'value' => '#2d3d8b',
            ],
        ])
        ->setField([
            'id'         => 'danger_color',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Danger color'),
            'attributes' => [
                'name'  => 'danger_color',
                'value' => '#e3363e',
            ],
        ])
        ->setField([
            'id'         => 'site_description',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'textarea',
            'label'      => __('Site description'),
            'attributes' => [
                'name'    => 'site_description',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'address',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Address'),
            'attributes' => [
                'name'    => 'address',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setSection([
            'title'      => __('Social'),
            'desc'       => __('Social links'),
            'id'         => 'opt-text-subsection-social-links',
            'subsection' => true,
            'icon'       => 'fa fa-share-alt',
        ]);

    for ($i = 1; $i <= 5; $i++) {
        theme_option()
            ->setField([
                'id'         => 'social_' . $i . '_name',
                'section_id' => 'opt-text-subsection-social-links',
                'type'       => 'text',
                'label'      => __('Name') . ' ' . $i,
                'attributes' => [
                    'name'    => 'social_' . $i . '_name',
                    'value'   => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ])
            ->setField([
                'id'         => 'social_' . $i . '_icon',
                'section_id' => 'opt-text-subsection-social-links',
                'type'       => 'themeIcon',
                'label'      => __('Icon') . ' ' . $i,
                'attributes' => [
                    'name'    => 'social_' . $i . '_icon',
                    'value'   => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ])
            ->setField([
                'id'         => 'social_' . $i . '_url',
                'section_id' => 'opt-text-subsection-social-links',
                'type'       => 'text',
                'label'      => __('URL') . ' ' . $i,
                'attributes' => [
                    'name'    => 'social_' . $i . '_url',
                    'value'   => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ])
            ->setField([
                'id'         => 'social_' . $i . '_color',
                'section_id' => 'opt-text-subsection-social-links',
                'type'       => 'customColor',
                'label'      => __('Color') . ' ' . $i,
                'attributes' => [
                    'name'    => 'social_' . $i . '_color',
                    'value'   => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ]);
    }

    theme_option()
        ->setSection([
            'title'      => __('Header'),
            'desc'       => __('Header config'),
            'id'         => 'opt-text-subsection-header',
            'subsection' => true,
            'icon'       => 'fa fa-link',
        ])
        ->setField([
            'id'         => 'action_button_text',
            'section_id' => 'opt-text-subsection-header',
            'type'       => 'text',
            'label'      => __('Action button text'),
            'attributes' => [
                'name'    => 'action_button_text',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'action_button_url',
            'section_id' => 'opt-text-subsection-header',
            'type'       => 'text',
            'label'      => __('Action button URL'),
            'attributes' => [
                'name'    => 'action_button_url',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'blog_single_layout',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'select',
            'label'      => __('Default Blog Single Layout'),
            'attributes' => [
                'name'    => 'blog_single_layout',
                'list'    => get_blog_single_layouts(),
                'value'   => 'blog-full-width',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'blog_layout',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'select',
            'label'      => __('Blog Layout'),
            'attributes' => [
                'name'    => 'blog_layout',
                'list'    => get_blog_layouts(),
                'value'   => 'grid',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ]);

    // Facebook integration
    theme_option()
        ->setSection([
            'title'      => __('Facebook Integration'),
            'desc'       => __('Facebook Integration'),
            'id'         => 'opt-text-subsection-facebook-integration',
            'subsection' => true,
            'icon'       => 'fab fa-facebook',
        ])
        ->setField([
            'id'         => 'facebook_chat_enabled',
            'section_id' => 'opt-text-subsection-facebook-integration',
            'type'       => 'select',
            'label'      => __('Enable Facebook chat?'),
            'attributes' => [
                'name'    => 'facebook_chat_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
            'helper'     => __('To show chat box on that website, please go to :link and add :domain to whitelist domains!',
                [
                    'domain' => Html::link(url('')),
                    'link'   => Html::link('https://www.facebook.com/' . theme_option('facebook_page_id') . '/settings/?tab=messenger_platform'),
                ]),
        ])
        ->setField([
            'id'         => 'facebook_page_id',
            'section_id' => 'opt-text-subsection-facebook-integration',
            'type'       => 'text',
            'label'      => __('Facebook page ID'),
            'attributes' => [
                'name'    => 'facebook_page_id',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
            'helper'     => __('You can get fan page ID using this site :link',
                ['link' => Html::link('https://findmyfbid.com')]),
        ])
        ->setField([
            'id'         => 'facebook_comment_enabled_in_post',
            'section_id' => 'opt-text-subsection-facebook-integration',
            'type'       => 'select',
            'label'      => __('Enable Facebook comment in post detail page?'),
            'attributes' => [
                'name'    => 'facebook_comment_enabled_in_post',
                'list'    => [
                    'yes' => trans('core/base::base.yes'),
                    'no'  => trans('core/base::base.no'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'facebook_comment_enabled_in_gallery',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Facebook comment in the gallery detail?'),
            'attributes' => [
                'name'    => 'facebook_comment_enabled_in_gallery',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'facebook_app_id',
            'section_id' => 'opt-text-subsection-facebook-integration',
            'type'       => 'text',
            'label'      => __('Facebook App ID'),
            'attributes' => [
                'name'        => 'facebook_app_id',
                'value'       => null,
                'options'     => [
                    'class' => 'form-control',
                ],
                'placeholder' => 'Ex: 2061237023872679',
            ],
            'helper'     => __('You can create your app in :link',
                ['link' => Html::link('https://developers.facebook.com/apps')]),
        ])
        ->setField([
            'id'         => 'facebook_admins',
            'section_id' => 'opt-text-subsection-facebook-integration',
            'type'       => 'repeater',
            'label'      => __('Facebook Admins'),
            'attributes' => [
                'name'   => 'facebook_admins',
                'value'  => null,
                'fields' => [
                    [
                        'type'       => 'text',
                        'label'      => __('Facebook Admin ID'),
                        'attributes' => [
                            'name'    => 'text',
                            'value'   => null,
                            'options' => [
                                'class'        => 'form-control',
                                'data-counter' => 40,
                            ],
                        ],
                    ],
                ],
            ],
            'helper'     => __('Facebook admins to manage comments :link',
                ['link' => Html::link('https://developers.facebook.com/docs/plugins/comments')]),
        ]);

    add_filter(THEME_FRONT_HEADER, function ($html) {
        if (theme_option('facebook_app_id')) {
            $html .= Html::meta(null, theme_option('facebook_app_id'), ['property' => 'fb:app_id'])->toHtml();
        }

        if (theme_option('facebook_admins')) {
            foreach (json_decode(theme_option('facebook_admins'), true) as $facebookAdminId) {
                if (Arr::get($facebookAdminId, '0.value')) {
                    $html .= Html::meta(null, Arr::get($facebookAdminId, '0.value'), ['property' => 'fb:admins'])
                        ->toHtml();
                }
            }
        }

        return $html;
    }, 1180);

    add_filter(THEME_FRONT_FOOTER, function ($html) {
        return $html . Theme::partial('facebook-integration');
    }, 1180);
});
