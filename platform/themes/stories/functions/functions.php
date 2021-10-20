<?php

use Botble\ACL\Models\User;
use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;

register_page_template([
    'full-width'    => __('Full width'),
    'homepage'      => __('Homepage'),
    'right-sidebar' => __('Right sidebar'),
]);

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('Sidebar in the footer of page'),
]);

RvMedia::setUploadPathAndURLToPublic();

if (is_plugin_active('blog')) {
    add_action(BASE_ACTION_META_BOXES, function ($context, $object) {
        if (get_class($object) == Category::class && $context == 'side') {
            MetaBox::addMetaBox('additional_blog_category_fields', __('Addition Information'), function () {
                $image = null;
                $args = func_get_args();
                if (!empty($args[0])) {
                    $image = MetaBox::getMetaData($args[0], 'image', true);
                }

                return Theme::partial('blog-category-fields', compact('image'));
            }, get_class($object), $context);
        }
    }, 24, 2);

    add_action(BASE_ACTION_AFTER_CREATE_CONTENT, function ($type, $request, $object) {
        if (get_class($object) == Category::class) {
            MetaBox::saveMetaBoxData($object, 'image', $request->input('image'));
        }
    }, 230, 3);

    add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, function ($type, $request, $object) {
        if (get_class($object) == Category::class) {
            MetaBox::saveMetaBoxData($object, 'image', $request->input('image'));
        }
    }, 231, 3);

    add_action(BASE_ACTION_META_BOXES, 'add_addition_fields_in_post_screen', 30, 3);

    function add_addition_fields_in_post_screen($context, $object)
    {
        if (get_class($object) == Post::class && $context == 'top') {
            MetaBox::addMetaBox(
                'additional_post_fields',
                __('Addition Information'),
                function () {
                    $timeToRead = null;
                    $layout = null;
                    $args = func_get_args();
                    if (!empty($args[0])) {
                        $timeToRead = MetaBox::getMetaData($args[0], 'time_to_read', true);
                        $layout = MetaBox::getMetaData($args[0], 'layout', true);
                    }

                    if (!$layout && theme_option('blog_single_layout')) {
                        $layout = theme_option('blog_single_layout');
                    }

                    return Theme::partial('blog-post-fields', compact('timeToRead', 'layout'));
                },
                get_class($object),
                $context
            );
        }
    }

    add_action(BASE_ACTION_AFTER_CREATE_CONTENT, 'save_addition_post_fields', 230, 3);
    add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, 'save_addition_post_fields', 231, 3);

    function save_addition_post_fields($type, $request, $object)
    {
        if (get_class($object) == Post::class) {
            MetaBox::saveMetaBoxData($object, 'time_to_read', $request->input('time_to_read'));
            MetaBox::saveMetaBoxData($object, 'layout', $request->input('layout'));
        }
    }
}

app()->booted(function () {
    if (is_plugin_active('blog')) {
        Category::resolveRelationUsing('image', function ($model) {
            return $model->morphOne(MetaBoxModel::class, 'reference')->where('meta_key', 'image');
        });
    }
});

if (is_plugin_active('ads')) {
    AdsManager::registerLocation('panel-ads', __('Panel Ads'))
        ->registerLocation('top-sidebar-ads', __('Top Sidebar Ads'))
        ->registerLocation('bottom-sidebar-ads', __('Bottom Sidebar Ads'));
}

Form::component('themeIcon', Theme::getThemeNamespace() . '::partials.icons-field', [
    'name',
    'value'      => null,
    'attributes' => [],
]);

add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function ($form, $data) {
    if (get_class($data) == User::class && $form->getFormOption('id') == 'profile-form') {
        $form
            ->add('bio', 'textarea', [
                'label'      => __('Bio'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder' => __('Write something about yourself...'),
                ],
                'wrapper'    => [
                    'class' => $form->getFormHelper()->getConfig('defaults.wrapper_class') . ' col-md-12',
                ],
                'value'      => MetaBox::getMetaData($data, 'bio', true),
            ]);
    }
}, 127, 2);

add_action(USER_ACTION_AFTER_UPDATE_PROFILE, function ($screen, $request, $user) {
    if ($screen == USER_MODULE_SCREEN_NAME) {
        MetaBox::saveMetaBoxData($user, 'bio', $request->input('bio'));
    }
}, 127, 3);

if (!function_exists('random_color')) {
    /**
     * @return string
     */
    function random_color()
    {
        $colors = ['warning', 'primary', 'info', 'success'];

        return 'text-' . $colors[array_rand($colors)];
    }
}

if (!function_exists('get_time_to_read')) {
    /**
     * @param Post $post
     * @return string
     */
    function get_time_to_read(Post $post)
    {
        $timeToRead = MetaBox::getMetaData($post, 'time_to_read', true);

        if ($timeToRead) {
            return number_format($timeToRead);
        }

        return number_format(strlen(strip_tags($post->content)) / 300);
    }
}

if (!function_exists('get_blog_single_layouts')) {
    /**
     * @return string[]
     */
    function get_blog_single_layouts(): array
    {
        return [
            ''                   => __('Inherit'),
            'blog-right-sidebar' => __('Blog Right Sidebar'),
            'blog-left-sidebar'  => __('Blog Left Sidebar'),
            'blog-full-width'    => __('Full width'),
        ];
    }
}

if (!function_exists('get_blog_layouts')) {
    /**
     * @return string[]
     */
    function get_blog_layouts(): array
    {
        return [
            'grid' => __('Grid layout'),
            'list' => __('List layout'),
            'big'  => __('Big layout'),
        ];
    }
}

if (!function_exists('display_ad')) {
    /**
     * @param string $location
     * @param array $attributes
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function display_ad(string $location, array $attributes = []): string
    {
        if (!is_plugin_active('ads')) {
            return '';
        }

        return AdsManager::display($location, $attributes);
    }
}
