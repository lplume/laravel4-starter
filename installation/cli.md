## Use custom CLI Installer Command

Now, you need to create yourself a user and finish the installation. This command will execute the script at `app/commands/AppCommand.php`. This script will create a default test user, and perform the database migrations and setup needed to get you started.

	php artisan app:install

__You will also be prompted to create your own admin user via an interactive command line interface.__ When prompted, enter your first name, last name, email and desired password. Don't worry - you can change this later once you're logged in.

(Note that [the Travis CI file](https://github.com/snipe/laravel4-starter/blob/master/.travis.yml) skips this step and instead calls the individual setup methods and just inserts the example user, since [the CI build](https://travis-ci.org/snipe/laravel4-starter.svg?branch=master) isn't interactive.)

### Default User
This interactive command line interface will also create a dummy user with Author permissions. The login for that user is:

	Login email: example@example.com
	Password: johndoe

## Important! Because this dummy user has authorship privileges, you should be sure to delete it or deactivate it when you're ready to put your app out there into the world.

### Seeding the Database
When the cli installer runs, it will also seed the database with some sample data. Loading up the sample data will give you an idea of how this should look, how your info should be structured, etc. It only pre-loads a handful of items, so you won't have to spend an hour deleting sample data.

While you're developing, if you need to reset the database to the original seeded version (minus the users, which will not be affected), execute this from the command line.

	php artisan db:seed

## Re-seeding the database will overwrite ALL of your other data. Do this ONLY during development, and with discretion.