#move lang fa file
cp -r doc/install/filemanager/fa vendor/tomatophp/filament-media-manager/resources/lang/
cp  doc/install/expection/ExceptionResource.php vendor/bezhansalleh/filament-exceptions/src/Resources/ExceptionResource.php
cp -r doc/install/expection/fa /var/www/neovel.local/vendor/bezhansalleh/filament-exceptions/resources/lang




php artisan module:migrate-fresh --seed
php artisan module:seed User
php artisan module:seed Mag




























-------footer---------
php artisan module:migrate-fresh Ecommerce
php artisan module:seed Ecommerce
php artisan module:seed Mag
-------endfooter---------

