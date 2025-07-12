
#!/bin/bash
curl -sS https://getcomposer.org/installer | php
php composer.phar install --no-dev --optimize-autoloader
cp -r vendor/ public/vendor/ 2>/dev/null || :
chmod -R 755 vendor
