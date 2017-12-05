# ITWS2110-GroupProject-RPINoteExchange
The group project repo for ITWS2110 Fall2017 group 5


**This project uses _Laravel 5.4_**
## Installation Guide
### Prerequisite

Mac:
- Lamp
- PHP Composer (https://getcomposer.org/)

Windows:
- Xamp
- PHP Composer (https://getcomposer.org/)

Requires Apache, MySQL, PHP5

### Getting start

**Remember to substitute `[YOUR_XXX_XXX]` with your paths and names.**

1. Fork this repo (optional)

2. Clone the repo to your disk
    ```
    git clone https://github.com/[YOUR_GITHUB_USERNAME]/ITWS2110-GroupProject-RPINoteExchange.git
    ```

3. ```cd``` into your folder
    ```
    cd YOUR_FOLDER_NAME
    ```

4. Install dependency
    ```
    composer install
    ```

5. Create environment files
    ```
    cp .env.example .env
    ```

    _Notice: `.env` and `.env.example` are hidden files._
    
6. Make a virtual host for this project (optional). Make sure the `document root` is `"[PROJECT_FOLDER]/public"`

   *The following are for reference only*
    ```
    <VirtualHost *:80>
        ServerName [YOUR_SERVER_NAME]
        DocumentRoot "[YOUR_FOLDER_NAME]/public"
        SetEnv APPLICATION_ENV "development"
        SetEnv LARA_ENV local
        <Directory "[YOUR_FOLDER_NAME]/public">
            Options Indexes FollowSymLinks Includes execCGI
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>
    ```
    
        Also, don't forget to add `[YOUR_SERVER_NAME]` to your hosts file.
    
         Save & exit, restart Apache.
    
        Create a new database and name it `[YOUR_DATABASE_NAME]`.
    
7. Open the project

8. Open .env file, modify these lines like:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[YOUR_DATABASE_NAME]
    DB_USERNAME=[YOUR_USERNAME]
    DB_PASSWORD=[YOUR_PASSWORD]
    ```

9. make migration(in order to create table automatically):
    ```
    php artisan migrate
    ```

10. Generate a key:
    ```
    php artisan key:generate
    ```
    
### Done!
    
Open your browser, go to `http://[YOUR_SERVER_NAME]`

### Other issues

* To show debugging messages when developing, you should set `APP_DEBUG` to "true" in `.env` file.
* You should also run these two commands under your project root directory:
    ```
    chmod -R 777 storage/
    chmod -R 777 bootstrap/cache
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](LICENSE).
