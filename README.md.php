### Installation

~~~
1. composer install
~~~

**2. Create Database**

**3. Copy file .env.example and rename to .env. Now, fill in the following fields**

* **APP_URL**
* **DB_DATABASE**
* **DB_USERNAME**
* **DB_PASSWORD**

**4. In the terminal**

~~~
php artisan key:generate
~~~

~~~
php artisan migrate
~~~

~~~
php artisan db:seed
~~~

~~~
php artisan storage:link
~~~
