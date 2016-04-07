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
- `php database/commands/up` Creates all tables
- `php database/commands/down` Drops all tables
- `php database/commands/provision` Drops and recreates all tables

