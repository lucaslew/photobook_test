# Commision Calculator

A company that is selling business cards, brochures, yearbooks and mugs and has a group of sales person, at the end of each month, each salesman will enter the quantity of products that they have sold and the system will auto calculate the total sales amount and commision that they are getting.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You will need to have two components below to run this project.

```
PHP - Laravel Framework
Javascript - React.js Framework
```

### Running the app

Steps:

Download this repo.

```
git clone https://github.com/lucaslew/photobook_test.git photobook_test
```

Repo consists of two directories

```
commcal - PHP
commisioncalculator - ReactJs
```

Commcal (PHP) already contains the compiled version of ReactJS. So just need to navigate to commcal directory and run

```
php artisan serve

Navigate to: http://localhost:8000/index.html
```

## Running the tests

```
cd commcal
vendor/bin/phpunit tests/Unit/CommisionTest.php
```


## Authors

* **Lucas Lew** - *Initial work*

