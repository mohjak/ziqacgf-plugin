<?php

namespace ZAD\IslamQA\Competitions\GoogleForms\PostTypes;

use ZAD\IslamQA\Competitions\GoogleForms\Interfaces\Hookable;
use ZAD\IslamQA\Competitions\GoogleForms\Interfaces\CustomPostType;

class Form implements CustomPostType, Hookable
{
    use PostTypeLabelUtility;

    const KEY = 'form';

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_post_type(self::KEY, [
            'public' => true,
            'show_ui' => true,
            'menu_position' => 6,
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'publicly_queryable' => true,
            'rewrite' => array('slug' => 'form'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'labels' => $this->generate_labels('Form', 'Forms'),
            'menu_icon' => 'dashicons-feedback',
        ]);
    }
}
