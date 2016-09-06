# [Simple-Quiz](https://simplequiz.co.uk)
[![Software License](http://img.shields.io/badge/license-apache2-brightgreen.svg)](LICENSE)
[![Build Status](https://travis-ci.org/ElanMan/simple-quiz.png?branch=laravel)](https://travis-ci
.org/ElanMan/simple-quiz)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/77dcca19-1dd0-4a47-86b7-1ac6142e1bbd/mini.png)](https://insight.sensiolabs.com/projects/77dcca19-1dd0-4a47-86b7-1ac6142e1bbd)

Simple-Quiz is a simple framework for creating quizzes for the web, created and maintained by [Ben Hall](http://twitter.com/elanman).

PHP version > 5.6 is required


## Quick start

Three quick start options are available:

* [Download the latest release (github)](https://github.com/elanman/simple-quiz/releases/latest).
* [Download the latest release (sourceforge)](https://sourceforge.net/projects/simple-quiz/).
* Clone the repo: `git clone https://github.com/elanman/simple-quiz.git`.

## Installation

### Get The Code.
* If you are downloading from SourceForge, all project dependencies are bundled with the project.
If, however, you are cloning from GitHub or downloading the release zip file, you must run 'composer install' to 
 download all of the dependencies.
* If you don't know what composer is, take a look here: [Composer](https://getcomposer.org/)
* Unpack the downloaded code zip archive.
* Place the contents of the /public directory inside your document root.
* All other directories should be placed outside of the document root and not accessible via a web browser (look at the above diagram to see the structure).
* The mod_rewrite module (if using apache server) or [URL Rewrite](http://www.iis.net/downloads/microsoft/url-rewrite) module (if using IIS) will need to be enabled in 
your server configuration.
* Create a MySQL database called 'simple-quiz'
* Import simple-quiz.sql into MySQL using a tool like phpmyadmin or using the MySQL 'source' command.
* Change credentials in /SimpleQuiz/Utils/Base/SampleConfig.php.
* Rename SampleConfig.php to Config.php
* Default web admin user is example@gmail.com with password of 123456
* Navigate to the web accessible folder in your browser.

## Twitter Stuff
+ <http://twitter.com/QuizSimple>

## Authors

**Ben Hall**

+ <http://twitter.com/elanman>
+ <http://github.com/elanman>

## Copyright and license

Copyright 2013 Ben Hall under [the Apache 2.0 license](LICENSE).