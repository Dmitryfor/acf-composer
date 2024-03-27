<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class NotificationBanner
{

    public function __construct()
    {

        /**
         * Notification Banner
         */
        $notificationBanner = new FieldsBuilder('notification_banner', [
            'title'            => 'Notification Banner',
            'menu_order'    =>    6
        ]);

        $notificationBanner

            ->addTrueFalse('banner_global_include', [
                'label'       => false,
                'ui'          => 1,
                'ui_on_text'  => 'Active',
                'ui_off_text' => 'Inactive',
            ])

            ->addText('banner_headline', [
                'label'     => 'Headline',
            ])
                ->conditional('banner_global_include', '==', 1)

            ->setLocation('options_page', '==', 'acf-options-brand-settings');

        // Register Notification Banner
        add_action('acf/init', function () use ($notificationBanner) {
            acf_add_local_field_group($notificationBanner->build());
        });
    }
}