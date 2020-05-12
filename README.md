# itpm testing application

This is example of testing application in PHP. This is educational project, so any code provided as-is.

## Used technologies
* PHP 7.2
* Apache 2.4 (for local developemnt and testing)
* Bootstrap 4 (for quick UI design and creation)
* git

## Code structure

The project itself is very simple, so the folder structure is also quite straightforward.

I've tried to use Model-View-Controller (MVC) principle here, though there are no direct namings of these concepts.

* index.php - root file, the user always interacts with it. this file determines which `view` to render based on session data. It also contains HTML foundtation/template.
* views/ - presentation files, their role is to render some data/controls to user, allow him to interact with it and then pass data to `actions`
* actions/ - business logic is written here. It contains actions for starting a test, answering a question, navigating through questions and finishing the test.
* db/ - database files, that load questions from text file into array, including the questions database itself (testdb.txt) file.

## Workflow

The user opens the site, index.php file requires the `intro.php` view and shows it to user. User enters his name and presses "Submit". `start.php` action fills data in the user session, and starts the test by redirecting back to index.php. Now, because testing is started, index.php shows the `test.php` view. This view fetches current question from DB, checks previous answers and then shows the question UI to the user. The answers are sent to `answer.php` action, which writes user's answer to session store and proceeds to next question. The process is repeated until the last question is reached. After that, test.php builds the summary and shows the `result.php`, clearing the session data for user, allowing him to pass the test again.

## Remarks

Due to being an education project, not much time was spent on designing a full-fledged testing engine, which should use a real database like MySQL/PostgreSQL for storing questions, users, answers and results.

## by Nikita Kogut (MrOnlineCoder)