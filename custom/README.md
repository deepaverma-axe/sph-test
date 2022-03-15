This module depends on endroid/qr-code-bundle library to generate QR code.

To install the library add below mentioned lines in root composer.json file under repository section

        {
            "type": "path",
            "url": "modules/custom/*"
        }

For reference:
    "repositories": [
        {
            "type": "composer",
            "url": "https://packages.drupal.org/8"
        },
        {
            "type": "path",
            "url": "web/modules/custom/*"
        }
    ],

After adding run the command "composer require drupal/custom:@dev"

Or you can directly hit to install the required library.
"composer require endroid/qr-code-bundle: ^3.4"