# Restest

# Installation
First clone this repository, install the dependencies, and setup your .env file. . Finally generate the key.

```
git@github.com:ultr4m4n/restest.git
composer install
cp .env.example .env
php artisan key:generate
```
# Description
A simple application that display list of users with their todos & posts with comments. User can create post & todos as well.

# Pages & Features
1. Welcome page-homepage
3. Users list page-to list all users & display delete user button.
    - user detail page-to view users details, posts & todos. Can also update selected user here.
    - create user page-to display a form that allow user to create new user.
4. Todos list page
    - create todos page-to display a form that allow user to create new todos.
5. Posts list page
    - view post page
    - create post page-to display a form that allow user to create new post.
