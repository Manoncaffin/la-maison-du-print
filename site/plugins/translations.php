<?php

Kirby::plugin('custom/translations', [
    'options' => [
        'translations' => function ($kirby) {
            return [
                'monday'    => t('days.monday'),
                'tuesday'   => t('days.tuesday'),
                'wednesday' => t('days.wednesday'),
                'thursday'  => t('days.thursday'),
                'friday'    => t('days.friday'),
                'saturday'  => t('days.saturday'),
                'sunday'    => t('days.sunday'),
            ];
        }
    ]
]);
