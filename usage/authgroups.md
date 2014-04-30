## Authorization Groups

Authorization and brute-force prevention for this system is provided via [Sentry 2](https://github.com/cartalyst/sentry). By default, the login lockout is 5 failed login attempts.

### Change the default failed login lockout number
To change these settings, edit your `/vendor/cartalyst/sentry/src/config/config.php` file locally.

### Default Access Groups
By default, when you run the `php artisan app:install` command, three default groups are created:

* __Admin__: Can access user management, settings
* __Author__: Can create new posts, can not access user management or settings
* __User__: Can leave a comment

A user that is not logged in can read posts but cannot leave comments.

These groups are initially created in `/app/commands/AppCommand.php`, a file you shouldn't need to change unless you have other defaults in mind for your application.

	// Create the blog author group
	$group = Sentry::getGroupProvider()->create(array(
		'name'        => 'Authors',
		'permissions' => array(
		'superuser' 	=> 0,
		'admin' 		=> 0,
		'posts.write' 	=> 1,
		'posts.read' 	=> 1,
		'users' 		=> 0
		)
	));

In Sentry, things like `posts.write` and `posts.read` are completely arbitrary.

The developer decides what to call these access masks, and then through the code determines what a user can or cannot access. I mention this because the documentation for this particular feature was, at the time of this writing, somewhat lackluster, and it took a bit of searching to figure out how to use it.

So for our purposes, we started with `admin`, `posts.write`, and `posts.read` because they are relevant to the sample blog application we're using in this project, but if you were creating an image gallery, forum, or anything else, you'd want to figure out what those access masks look like.

## Using access groups
Access permissions in Sentry are stored as a JSON string with the group info. As you're developing your software, these Sentry methods will come in handy:

To __create new access groups__, in this example called `Super Administrators` and `Managers`:

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Super Administrators',
		'permissions' => array(
				'system' => 1,
		),
	));

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Managers',
		'permissions' => array(
			'system.products' => 1,
			'system.store' => 1,
			'system.profile' => 1,
		),
	));

Then __assign a user to the group__:

	Sentry::getUser()->addGroup( Sentry::getGroupProvider()->findByName('Managers') );

Check __if a user has a particular access__:

	if ( Sentry::getUser()->hasAnyAccess(['system','system.products']) )
	{
		// will be able to do a thing
	}

Check __if a user is Super Administrator__ (only this group has the 'system' access)

	if ( Sentry::getUser()->hasAnyAccess(['system']) )
	{
		// will be able to do a thing
	}

Get __all groups a particular user belongs to__:

	try
	{
		// Find the user using the user id
		$user = Sentry::getUserProvider()->findById(1);

		// Get the user groups
		$groups = $user->getGroups();
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		echo 'User was not found.';
	}

Find the Administrator __group by name__:

	$admin = Sentry::findGroupByName('Administrator');

	// Check if the user is in the administrator group
	if ($user->inGroup($admin)) {
		// User is in Administrator group
	} else {
		// User is not in Administrator group
	}

(These examples were shamelessly nicked from [a StackOverflow post](http://stackoverflow.com/questions/17012553/how-to-implement-sentry-2-permissions-with-laravel-4) that explains it better than the Sentry docs themselves do.)