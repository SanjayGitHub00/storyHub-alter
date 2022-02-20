<?php
/**
 *  Theme Customizer Class
 * @package storyHub-alter
 */

namespace STORYHUB_ALTER\Inc;

use STORYHUB_ALTER\Inc\Traits\Singleton;

class Customizer
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         *  Load Actions
         */
        add_action('customize_register', [$this, 'storyHub_alter_customizer']);
    }

    public function storyHub_alter_customizer($wp_customize)
    {
        // Copyright Section
        $wp_customize->add_section(
            'sec_copyright', [
                'title' => 'Copyright Settings',
                'description' => 'Copyright Section'
            ]
        );
        // Field First Copyright Text Box
        $wp_customize->add_setting(
            'set_copyright', [
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            ]
        );

        $wp_customize->add_control(
            'set_copyright', [
                'label' => 'copyright',
                'description' => 'Please, Add Your Copyright Information Here',
                'section' => 'sec_copyright',
                'type' => 'text'
            ]
        );
        // End Of Copyright Section
    }
}