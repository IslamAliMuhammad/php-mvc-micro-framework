# PHP MVC micro-framework

PHP micro-framework that built upon MVC workflow .

## Getting Started

### Installing

1. Install [XAMPP](https://www.apachefriends.org/index.html) on your local machine. (*Optional*)

2. Start Apache server and MySQL database server from XAMPP. (*Optional*)

3. Navigate to xampp\htdocs from your command line then enter:

    ```
    git clone https://github.com/IslamAliMuhammad/PHP-MVC-FRAMEWORK.git
    ```
4. Enter `localhost/{Apace server port}/PHP-MVC-FRAMEWORK` to your browser.

### Files structure 

- __PHP\-MVC\-FRAMEWORK__
   - [README.md](README.md)
   - __app__
     - [bootstrap.php](app/bootstrap.php) Contain files needed to initially loaded.
     - __config__
       - [config.php](app/config/config.php)
     - __controllers__
       - [Pages.php](app/controllers/Pages.php) The default controller contains the index() method which is the default method.
     - __libraries__
       - [Controller.php](app/libraries/Controller.php) Base class of controllers which has two methods:
         - model($model) Instantiate model we pass to.
         - view($view, $data = []) load view we pass to along with data we need to inject to the view.

       - [Core.php](app/libraries/Core.php) Extract controller, method, params from URL then load the controller and execute the method with the params.
       - [Database.php](app/libraries/Database.php) Database Class which use PDO to establish a connection and interact with the database.
     - __views__
       - __inc__
         - [footer.php](app/views/inc/footer.php)
         - [header.php](app/views/inc/header.php)
       - __pages__
         - [about.php](app/views/pages/about.php)
         - [index.php](app/views/pages/index.php)
   - __public__
     - __css__
       - [style.css](public/css/style.css)
     - [index.php](public/index.php) This is the main file loaded which will load [bootstrap.php](app/bootstrap.php) and inistatiate [Core.php](app/libraries/Core.php).
     - __js__
       - [main.js](public/js/main.js)

### Start building upon the framework

#### Project as a guide 

[POST-APP](https://github.com/IslamAliMuhammad/POST-APP) you can use this project as a reference to use the framework. 

#### Configure your app

 1. Change the root folder with your desire name.
 2. Navigate to app/config/config.php and input your configurations.
 3. Navigate to the public folder, select .htaccess file and in RewriteBase /PHP-MVC-FRAMEWORK/public change /PHP-MVC-FRAMEWORK/ to your root folder name.
 4. Instantiate the model you created inside corresponding controller constructor throw model($model) method which is part of the Controller base class.

 #### Utilize your database
 
 1. Create a models folder inside the app folder.
 2. Create your model inside the models folder.
 3. Instantiate Database class in the model constructor which will create a connection with database based on your configurations, then now you can use methods inside Database instance to interact with the database. 

- [Database Library Methods:](app/libraries/Database.php)
    - [`query`](#query)
    - [`bind`](#bind)
    - [`execute`](#execute)
    - [`resultSet`](#resultSet)
    - [`single`](#single)
    - [`rowCount`](#rowCount)

#### `query`

Method Signature:

```js
query($sql)
```
- Prepare SQL statement.
- $sql: `<String>` sql prepared statement

##### `bind` 

Method Signature:

```js
bind($params, $value, $type)
```
- Bind values with a prepared statement.
- $params: `<String>` parameter in your prepared statement.
- $value: `<String>` value will pass to parameter.
- $type: (optional) default value `null` type of value you will pass.

##### `execute`

Method Signature:

```js
execute()
```
- Return true if prepared statement execution is successful false other wise. 

##### `resultSet`

Method Signature:

```js
resultSet()
```
- Return array of objects represent rows as results (include internal execute() function call)

##### `single`

Method Signature:

```js
single()
```
- Return single object represent single row as result (include internal execute() function call) 

##### `rowCount`

Method Signature:

```js
rowCount()
```
- Return number of rows affected by the last SQL statement

#### Load view with data

Inside your controller use `view` method which is part of base Controller class.

```js
view($view, $data = [])
```
- $view: `<String>` path of view inside [views](app/views/) folder that will load.
- $data: `<array>` data that will pass to the view.

#### Adding a feature to my app 

1. Navigate to the app/controller create a new file that represents a new controller (any controller needs to extend base Controller class).
2. Navigate to app/views and create a new folder that represents views for the controller was created 
3. Navigate to the app/model create a new model class that handles database (model class must instantiate  Database library to interact with the database through the Database library that interacts with the actual database through PDO).
4. Create a method inside the controller was created that method responsible for instantiating model and load the view with data get from model. 






