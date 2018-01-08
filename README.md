# Strips. The beginning of your beautiful, comic strips on Laravel.

## Features
- Create and organize categories & subcategoires
- Create attributes and group them in sets of attributes
- Create currencies
- Create carriers
- Create taxes and use them on products
- Create order statuses
- Create products and upload product multiple images at once, using dropzone
- Ability to create product groups
- Ability to clone a product

## Installation
- Clone repository
```
$ git clone https://github.com/GitJove/strips.git
```
- Run in your terminal
```
$ composer install
$ php artisan key:generate
```
- Setup database connection in .env file ( Change .env.example file to .env) and put the mailtrap credentials in it(MAIL_USERNAME='YOUR_UNIQUE_USERNAME' and MAIL_PASSWORD='YOUR_UNIQUE_PASSWORD')
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=strips
DB_USERNAME=homestead
DB_PASSWORD=secret

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=4899428bff3fa4
MAIL_PASSWORD=70f56cad52ea61
MAIL_ENCRYPTION=tls
```

- Install node package manager NPM
```
$ npm install
```
- Migrate tables with demo data
```
$ php artisan migrate --seed
```

- Laravel 5 Files Folders Permission and Ownership Setup
```
$ cd /dir/of/laravel
$ chmod -R 777 ./storage ./bootstrap

You may need to use sudo on these commands if you get permission denied errors, i.e.:
$ sudo cd /path/to/profimak
$ sudo chmod -R 777 ./storage ./bootstrap

For more info:
https://www.itechempires.com/2017/06/laravel-5-files-folders-permission-ownership-setup/
```
- File Storage
$ php artisan storage:link

For more info:
https://laravel.com/docs/5.5/filesystem

- Access it on
```
http://localhost/profimak/admin/login
```

## Setup
In order to use the shop and be able to add products, you must have a minimum configuration:
- Create at least one category;
- Create at least one attribute for at least one of these types: text, textarea, date, dropdown, multiple select, media;
- Create at least one attribute set;
- Create a tax (eg. VAT).

After creating these, you’re ready to add your first product.

## Known Issues
- Product image uploader not fully responsive
- Changing attribute set on a product that had an old set of media attribute type with an uploaded image and uploading a new image to media attribute type causes an error
- Cloning a product does not clone values field from attribute_product_value table

## Roadmap for v1.0
- Implement orders
- Implement users management
- Improve product image uploader
- Improve and fix styles
- Cool ideas from developers :)

