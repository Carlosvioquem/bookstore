## Requierements

-   ~~PHP 8.1~~ PHP 8.2 (laravel-localization requirement)
-   [Laravel 10](https://laravel.com/docs/10.x)
-   [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
-   [Paquete laravel-localization](https://github.com/mcamara/laravel-localization)

## Decisions

-   Bootstrap installed using laravel/ui
-   2024_04_18_170842_create_books_table.php
    -   Foreign key author_id, cascade on delete, restrict on update. (No reason to update an Author ID)

## Files Created

-   app/Http/Controllers/
    -   AuthorController.php
    -   BookController.php
-   app/Interfaces/
    -   AuthorRepositoryInterface.php
    -   BookRepositoryInterface.php
-   app/Models/
    -   Author.php
    -   Books.php
-   app/Providers/
    -   RepositoryServiceProvider.php
-   app/Repositories/
    -   AuthorRepository.php
    -   BookRepository.php
-   resources/views/
    -   layouts/app.blade.php
    -   author/index.blade.php
    -   author/create.blade.php
    -   author/edit.blade.php
    -   book/index.blade.php
    -   book/create.blade.php
    -   book/edit.blade.php
    -   home.blade.php
-   lang/
    -   es.json
-   database/factories/
    -   AuthorFactory
    -   BookFactory
-   database/migrations/
    -   2024_04_18_170700_create_authors_table.php
    -   2024_04_18_170842_create_books_table.php
-   database/seeders/
    -   AuthorSeeder.php
    -   BookSeeder.php

## Files Modified

-   routes
    -   web.php
-   database/seeders/
    -   DatabaseSeeder.php
-   config/
    -   app.php (providers)
