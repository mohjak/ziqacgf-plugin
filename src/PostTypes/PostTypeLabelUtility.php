<?php

namespace ZAD\IslamQA\Competitions\GoogleForms\PostTypes;

trait PostTypeLabelUtility
{
    /**
     * Generate labels for a post type.
     *
     * @param string $singular          Uppercase, singular label.
     * @param string $plural            Uppercase, plural label.
     * @param array  $additional_labels Additional labels.
     *
     * @return array Labels.
     */
    protected function generate_labels(string $singular, string $plural, array $additional_labels = []): array
    {
        $labels = [
            'name'                  => _x($plural, 'post type general name', 'ziqacgf'),
            'singular_name'         => _x($singular, 'post type singular name', 'ziqacgf'),
            'menu_name'             => _x($plural, 'admin menu', 'ziqacgf'),
            'name_admin_bar'        => _x($singular, 'add new on admin bar', 'ziqacgf'),
            'add_new'               => _x('Add New', $singular, 'ziqacgf'),
            'add_new_item'          => __("Add New {$singular}", 'ziqacgf'),
            'new_item'              => __("New {$singular}", 'ziqacgf'),
            'edit_item'             => __("Edit {$singular}", 'ziqacgf'),
            'view_item'             => __("View {$singular}", 'ziqacgf'),
            'all_items'             => __("All {$plural}", 'ziqacgf'),
            'search_items'          => __("Search {$plural}", 'ziqacgf'),
            'parent_item_colon'     => __("Parent {$plural}:", 'ziqacgf'),
            'not_found'             => __("No {$plural} found.", 'ziqacgf'),
            'not_found_in_trash'    => __("No {$plural} found in Trash.", 'ziqacgf'),
            'archives'              => __("{$singular} Archives", 'ziqacgf'),
            'update_item'           => __("Update {$singular}", 'ziqacgf'),
            'insert_into_item'      => __("Insert into {$singular}", 'ziqacgf'),
            'uploaded_to_this_item' => __("Uploaded to this {$singular}", 'ziqacgf'),
            'items_list'            => __("{$plural} list", 'ziqacgf'),
            'items_list_navigation' => __("{$plural} list navigation", 'ziqacgf'),
            'filter_items_list'     => __("Filter {$plural} list", 'ziqacgf'),
        ];

        return array_merge($labels, $additional_labels);
    }
}
