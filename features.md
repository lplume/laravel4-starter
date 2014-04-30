## Features

* Twitter Bootstrap 3.1.1
* jQuery 1.10.2
* Custom CLI Installer
* Translation-ready with internationalization files
* Custom Error Pages:
	* 403 for forbidden page access
	* 404 for not found pages
	* 500 for internal server errors
	* 503 for the maintenance page
* Back-end
	* User and Group management
	* Manage blog posts and comments
	* Login brute-force prevention via [Sentry 2](https://github.com/cartalyst/sentry) - default lockout is 5 failed login attempts
* Front-end
	* User login, registration, activation and forgot password
	* User account area
	* Blog functionality with comments
	* Contact us page
* Packages included:
	* [Cartalyst Sentry 2 - Authentication and Authorization package](https://github.com/cartalyst/sentry)

### Brute-force Lockout Settings

The default Sentry setting is to lockout the user for 15 minutes after 5 failed login attempts. To
change these settings, edit your `/vendor/cartalyst/sentry/src/config/config.php` file locally.


## Requirements

- PHP 5.3.7 or later
- MCrypt PHP Extension
