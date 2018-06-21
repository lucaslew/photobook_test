# Commision Calculator

A company that is selling business cards, brochures, yearbooks and mugs and has a group of sales person, at the end of each month, each salesman will enter the quantity of products that they have sold and the system will auto calculate the total sales amount and commision that they are getting.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You will need to have components below to run this project.

```
PHP - Laravel Framework, Composer
Javascript - React.js Framework
```

### Running the app

Steps:

Download this repo.

```
git clone https://github.com/lucaslew/photobook_test.git react_comission
```

Repo consists of two directories

```
commcal - PHP
commisioncalculator - ReactJs
```

Commcal (PHP) already contains the compiled version of ReactJS. Run the app as below

```
cd photobook_test
cd commcal
composer install
php artisan serve

Navigate to: http://localhost:8000/index.html
```

## Running the tests

```
cd commcal
vendor/bin/phpunit tests/Unit/CommisionTest.php
```

## Details

# ReactJS 
Frontend code are under 'commisioncalculator/src'
```
App.css - CSS for the app
App.jsx - Component for index page
CommisionReport.jsx - Component for the commision report
ErrorMessage.jsx - Component for error message
index.js - App's index page
```

# Laravel 
Serves the application's API endpoint. Code are under 'commcal'
```
public - contains the compiled ReactJS frontend code
routes/api.php - speficy the route to the CommisionController controller
app/Http/Controllers/CommisionController.php - Controllers to accept API request
app/Classes/CommisionClass.php - Class for Commision object and provide a method 'calculateComission' to calculate commision.
```

## Authors

* **Lucas Lew** - *Initial work*

