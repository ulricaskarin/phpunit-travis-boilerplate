#  PHPUnit boilerplate
[![Build Status](https://travis-ci.org/ulricaskarin/phpunit-travis.svg?branch=master)](https://travis-ci.org/ulricaskarin/phpunit-travis-boilerplate)  
A simple boilerplate for getting PHPunit up and running for your projects. Travis included for continuous integration on GitHub. _Be sure to read the documentation for [PHPUnit](https://phpunit.de/) and [Travis CI](https://travis-ci.org/)._

##Table of contents
* [Installation and automated setup](#installation-and-automated-setup)
* [Manual setup](#manual-setup)
* [How to run tests in bash terminal vs PHPStorm IDE](#how-to-run-tests-in-bash-terminal-vs-phpstorm-ide)

## Installation and automated setup
1. Clone this repository:  ```git clone https://github.com/ulricaskarin/phpunit-boilerplate.git```  
2. In terminal: cd to ```phpunit-boilerplate```  
3. Install composer: ```composer install```  
4. Check further configuration and [instructions on how to run tests](#how-to-run-tests-in-bash-terminal-vs-phpstorm-ide)

## Manual setup
### Overview of final structure of project
```  
Project-root
│
└─── src
│   │___ Foo.php
│  
└─── tests
│   │___ FooTest.php
│  
└─── vendor
│   │___ /bin
│   │___ /composer etc...
│
│ .gitignore
│ .travis.yml
│ composer.json
│ composer.lock
│ phpunit.xml
│ README.md
```

### 1. Create composer.json file
Composer is a PHP dependency manager, handling dependencies required to your project.
Read more about **[Composer here](http://culttt.com/2013/01/07/what-is-php-composer/)**.  
* Create a file in the root of your project named: _composer.json_. It should look something like
 the below example. Read more about how to write a valid **[composer-schema here](https://getcomposer.org/doc/04-schema.md)**.
```  
{
  "name": "VendorName/ProjectName",
  "description": "Short description of package",
  "keywords": ["PHPUnit, Travis"],
  "license": "MIT",
  "authors": [
    {
      "name": "Your name",
      "email": "name@domain.com"
    }
  ],
  "require": {},
  "require-dev": {
    "phpunit/phpunit": "5.6.*"
  },
  "autoload": {
    "psr-4": {
      "model\\": "src"
    }
  }
}
```
* ```require-dev``` : requires our dev dependency of phpunit version 5.6
* ```autoload``` : specifies that the package should be autoloaded using psr-4.

### 2. Install composer
* In cmd terminal: ```composer install```  
* A new directory named ```vendor``` is created (_holding all dependencies required_) and a ```composer.lock``` file. 
* Make sure to add vendor folder to your .gitignore!

### 3. Create phpunit.xml file
* The file phpunit.xml file is where all settings for PHPUnit are defined. Should be located in the root directory. 
* ```bootstrap="vendor/autoload.php"``` : defines where autoload file generated by composer will be located.
* phpunit.xml file will add all test-classes with suffix .php found in the folder ```/tests``` to the test-suite.
* **[Read more here](https://phpunit.de/manual/current/en/appendixes.configuration.html)** how the phpunit.xml file may be configured.
```
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="vendor/autoload.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false"
         syntaxCheck="false">
    <testsuites>
        <testsuite name="FooBar Test Suite">
            <directory suffix=".php">./tests/</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

### 4. Add a simple class to test in folder ```/src``` 
```
<?php

namespace model;

class Foo
{
    // code here
}
```

### 5. Add a simple test-class in folder ```/tests```
* Note: this class requires / uses the PHPUnit framework.
```
<?php

use PHPUnit\Framework\TestCase;
use model\Foo;

class FooTest extends TestCase {

    // code here
}
```

## How to run tests in bash terminal vs PHPStorm IDE
**In cmd terminal (git bash for example)**  
* No configuration needed
* Write ```vendor/bin/phpunit``` and hit enter. Test result will show up.

**In PHPStorm IDE**  
* **1. Configuration:**
    * ```Run\Edit Configurations\``` : Press ( + ) sign to the left in the window. Scroll down and choose ```PHPUnit```
        * Name: _"Name of your choice"_
        * Test Runner: Check _"Defined in the configuration file"_
        * Check _"Use alternative configuration file"_  , browse ```...``` your project and point to your ```phpunit.xml``` file.
        * Click on the small _"config"_ symbol to the right of the browsing dots ```...``` This will open a new window for the PHPUnit
        library. 
        * Now check ```Use composer autoloader``` and browse your project pointing path to script to: ```\vendor\autoload.php```
        * Hit Apply and OK.  
        (There might be an error showing up here _"Error: Custom loader is not specified or invalid. Press Fix to edit project configuration"._       
        If this is so - just hit the **Fix-button** and then Apply and OK once again.)  
* **2. Run:**  
    * Run the test-suite by pressing ```Run``` in IDE.


