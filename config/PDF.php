<?php

return [
    /*
     * Logging
     * This will log to a file in storage_path('logs/pdf.log')
     * To use Laravel default logging set to default
     * Comment out or set to null to disable logging
     */
    'logging'           => 'custom',


    // ConstructorParams
    'mode'              => '',
    'format'            => 'A4',
    'default_font_size' => 0,
    'default_font'      => '',
    'margin_left'       => 15,
    'margin_right'      => 15,
    'margin_top'        => 16,
    'margin_bottom'     => 16,
    'margin_header'     => 9,
    'margin_footer'     => 9,
    'orientation'       => 'P',


    /**
     * Set custom temporary directory
     * The default temporary directory is vendor/mpdf/mpdf/tmp
     *
     * @see https://mpdf.github.io/installation-setup/folders-for-temporary-files.html
     * Comment the following line to keep the temporary directory
     */
    'tempDir'           => 'pdf/tmp', // Relevant to the local driver root path


    /**
     * Custom Fonts
     *  1) Add your custom fonts to one of the directories listed under
     * 'fontDir' in which Mpdf will look for fonts
     *
     * 2) Define the name of the font and its configuration under the array 'fontdata'
     *
     * @see https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html
     */

    // List of Directories Containing fonts (use absolute path)
    'fontDir'           => [
        'pdf/fonts', // Relevant to the local driver root path
        // add extra directory here
    ],
    // Fonts Configurations
    'fontdata'          => [
        // lower-case and contain no spaces
        'customfontname' => [
            'R'          => 'RegularCustomFont.ttf',
            'B'          => 'BoldCustomFont.ttd',
            'useOTL'     => 255,
            'useKashida' => 75,
        ],
        // lower-case and contain no spaces
        'arabic-font' => [
            'R'          => 'Montserrat-Arabic-Regular.ttf',
            'B'          => 'Montserrat-Arabic-Bold.ttf',
            'useOTL'     => 255,
            'useKashida' => 75,
        ],
        'shabnam' => [
            'R'          => 'Shabnam.ttf',
            'useOTL'     => 255,
            'useKashida' => 75,
        ],
    ],

];