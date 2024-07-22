# Refactoring & unit testing challenge

## How to use this repsitory and complete the assignment
Hello! First of all - welcome and congrats that we can meet on this stage of the process! 

Below you will find the home assignment we prepared for you. Some guidelines:
1. To create your copy, Use the green "Use this template" button on the top right. It should be set as private repo. Do not use Fork feature.
2. Complete the task as described below.
3. When done, give access to the repo to the hiring manager and other people provided.
4. Send us the link to the PULL REQUEST in your repo, so we can review your work. 

Good luck!


## Task description

Please look at [`src/DoctorSlotsSynchronizer.php`](src/DoctorSlotsSynchronizer.php). Add unit tests using your favourite framework to test its business logic. Refactor any part of the code if you find it useful for architectural and testing purposes.

The business requirements are not given, you need to reverse-engineer them from the code. There are no hidden bugs (as far as we know), you don't have to focus on fixing the behaviour, but rather on refactoring the code and proving using unit tests that it is correct.

The aim is to use unit testing, but if you'd like to propose a solution, we're curious about it as well.

## Installation
Only the vendor API is dockerized and configured to work with `docker-compose`. However, feel free to dockerize the rest of the project if you find it helpful.

To run the container, use `docker-compose up -d`.
After a while, the vendor API serving doctors will be accessible on `http://localhost:2137`.

## Hints

- Show us your skills.
- Remember to write tests that test business logic, not implementation.
- It's up to you how much time you want to spend.
- If you could do something better, but it's too much work, please put a comment on what you would improve.
- If something is unclear, don't hesitate to ask.


# How to run the challenge:

## Important aspects
The project has now a Makefile for easiness of usage.
The dockerized project uses symfony-docker (based on FrankenPHP), which is kind of recommended by Symfony https://symfony.com/doc/current/setup/docker.html, which provides a quick way to start the project.

## Start the project
1. Run `make start` to build and start the project: This will install all the dependencies and start the containers.
2. `make test` will run all the unit tests.
3. Run `make sync` to run the code

### Why does it fail? 
The database is not configured. I configured a SQLite (in memory) database, but I did not create any migration for it. 
At some extent, I felt like I was adding too much Symfony to the test, and I'm not sure if it was the goal, nor making
the database work. So instead, I separated the concerns of the classes and made assertions in the tests, when a repository
save method is called. 

## How would I approach a refactor like this?
1. Integration tests: Setting up integration tests for the public interface of DoctorSlotsSynchronizer, checking database inserts.
2. Interface creation: As I did, create a new interface.
3. Create a new class that implements the interface, with the new refactored code. 
4. Switching between one implementation or the other in the Integration test should not have any difference. Tests should pass for both. 
5. Once that happens, and added unit tests, switch using a feature flag if needed. 

## Improvements?
Many. For instance, I can think about DI, some Factories (usually I like to keep it simple until needed), configurations in yaml, etc.
