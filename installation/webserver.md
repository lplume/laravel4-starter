## Set the correct document root for your server

The document root for the app should be set to the public directory. In a standard Apache virtualhost setup, that might look something like this on a standard linux LAMP stack:

	<VirtualHost *:80>
		<Directory /var/www/html/public>
			AllowOverride All
		</Directory>
		DocumentRoot /var/www/html/public
			ServerName www.example.org

			# Other directives here
	</VirtualHost>

An OS X virtualhost setup could look more like:

	<VirtualHost>
		<Directory "/Users/flashingcursor/Sites/laravel-starter/public/">
			Allow From All
			AllowOverride All
			Options +Indexes
		</Directory>
		<VirtualHost *:80>
				ServerName "snipe-it.dev"
				DocumentRoot "/Users/flashingcursor/Sites/laravel-starter/public"
		SetEnv LARAVEL_ENV development
	</VirtualHost>

