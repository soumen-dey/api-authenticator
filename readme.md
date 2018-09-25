# Authenticator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

A Laravel package for API Authentication with Passport.

##### **Note**: This package requires  Laravel Passport to be installed.  

## Installation

Via Composer

``` bash
$ composer require soumen-dey/api-authenticator
```

## Usage

#### Functionality

This package uses the default implementation for Auth that Laravel ships out of the box for validation and various other purposes. 

So the validation, user table structure (except for the tokens part) should be similar for both web and api.

**Note:** This package uses the default ```User``` model in the ```App\User```namespace. Feel free to modify the source code if you want to change this.

#### Adding the routes:

In your ```routes/api.php``` file, add the following:

```php
Authenticator::routes();
```

This will add the required routes which are:

```bash
POST api/register
POST api/login
```

These are the API endpoints for authenticating users. The payload for these endpoints  should be same as for the web auth, any extra payload depends on the application's logic.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.


## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Soumen Dey][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/soumen-dey/api-authenticator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/soumen-dey/api-authenticator.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/soumen-dey/api-authenticator/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/soumen-dey/api-authenticator
[link-downloads]: https://packagist.org/packages/soumen-dey/api-authenticator
[link-travis]: https://travis-ci.org/soumen-dey/api-authenticator
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/soumen-dey
[link-contributors]: ../../contributors]