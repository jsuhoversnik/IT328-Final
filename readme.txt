# IT328-Final
A website for users to build a pc from a list of components. These pc plans can be saved to a database to be retrieved and edited at a later time. PCs are scored based on performance of key parts.

## Features

### Separates all database / business logic uing the MVC pattern.
File structure splits elements into views, model, classes to function withen the MVC pattern

### Routes all URLs and leverages a templating language using the Fat-Free framework.
All routes are defined in the index.php file and routes all the visited pages.

### Has a clearly defined database layer using PDO and prepared statements.
Database files are created that hold functions to use PDO and prepared statements to safely access and query the database. composer.json is updated to load these files, to avoid needing to require on every page.


### Data can be viewed, added, updated and deleted.
The user can select hardware components and save thier plan, once a plan is saved the user can retrieve their plan from the home page by entering their plan number

### Uses OOP, and defines multiple classes, including at least one inheritance relationship.

### Has full validation on the client side through JavaScript and server side through PHP.

### Incorporates jQuery and Ajax.
jQuery and Ajax are used to load content on plan page from database once a user clicks on different buttons.