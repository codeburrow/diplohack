# Diplohack

Open data has the potential to unleash innovation and transform every sector of the economy and society. Active citizens can play a critical role in ensuring that stakeholders capture the full value of information. In the context of current European developments, participatory and co-creative processes may become catalysts for ideas tackling the challenging issues we face. How can we use open data in order to enable value creation, manage risks and engage key stakeholders? How can we make EU decision making more transparent? Join us and win a trip to the first ever European Transparency Camp in Amsterdam!

## Goal
Implement idea on a web & android app.

## Set up
- Copy .env.example and add variables as needed.

## Database
### New table
- Create a new migration similarly as with /database/migrations/UsersTableSeeder.php
- Then on /database/migrations/DatabaseSeeder.php add the respective 'up' & 'down' functions.
### Commands
- `php database/commands/up.php` Creates all tables
- `php database/commands/down.php` Drops all tables
- `php database/commands/provision` Drops and recreates all tables

## Tests
- Run all tests: `./vendor/bin/codecept run`

### Set Up
> Tests require a database dump to be stored at `tests/_data/dump.sql`. Please remember to remove any sql queries from this file which create, or use database, or do inserts. Else the test will not run properly.
1. Follow 1st & 2nd steps only at http://codeception.com/docs/modules/WebDriver#phantomjs Note the currente settings will try to test the app on the diplohack.app url. If you with to test it to a differnt url check http://stackoverflow.com/a/26467743/2790481 (not tested)
2. Create a mysql database with name: test_diplohack
3. To create a test for the API: `./vendor/bin/codecept generate:cest api Areas`. This will create a AreasCest.php where you can add your tests for the tests call on regards to Areas.
4. To create integration test: `./vendor/bin/codecept generate:cest integration Categories`

