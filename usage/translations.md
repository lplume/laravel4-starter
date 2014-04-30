## Translations and Localization

Laravel makes it pretty easy to translate an application, and this app is no different. Check out the [localization docs at the Laravel website](http://laravel.com/docs/localization) for a great overview.

Basically, all of the non-dynamic text strings are held in a series of PHP array files within the `app/lang` directory. This demo app ships with English (all within the `app/lang/en` directory), but you can easily localize it for another language by adding translated versions of those files and putting them in their own directory within `lang`.

For example:

	/app
		/lang
			/en
				messages.php
			/es
				messages.php

To change the language libraries Laravel uses, change the `locale` setting at `app/config /app.php`. Using the example above, you would change

	'locale' => 'en',

to

	'locale' => 'es',

in the `app/config /app.php` file.

### Supporting multiple languages at once
If you need to support multiple languages at one time (for example, if you needed to provide both English and Spanish translations, where a user could select their preferred language), you can check out  [mcamara/laravel-localization](https://github.com/mcamara/laravel-localization). I did not include it in this package because I didn't want to weigh it down with features not everyone needs, but it seems to be a good solution.