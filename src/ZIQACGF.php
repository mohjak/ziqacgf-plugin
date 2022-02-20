<?php

namespace ZAD\IslamQA\Competitions\GoogleForms;

use ZAD\IslamQA\Competitions\GoogleForms\Interfaces\Hookable;

/**
 * Main plugin class.
 */
final class ZIQACGF
{
    /**
     * Class instances.
     */
    private $instances = [];

    /**
     * Main method for running the plugin
     */
    public function run()
    {
        $this->create_instances();
        $this->register_hooks();
    }

    private function create_instances()
    {
        // Form
        $this->instances[PostTypes\Form::KEY] = new PostTypes\Form();

        // Winner
        $this->instances[PostTypes\Winner::KEY] = new PostTypes\Winner();
    }

    private function register_hooks()
    {
        foreach ($this->get_hookable_instances() as $instance) {
            $instance->register_hooks();
        }
    }

    private function get_hookable_instances()
    {
        return array_filter($this->instances, function ($instance) {
            return $instance instanceof Hookable;
        });
    }
}
