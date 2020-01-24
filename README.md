# EXADS TECHNICAL TEST (Laravel, bootstrap)

### Controllers:

1. IndexController.php

### Models:

None

### Views:

1. views/exads/abtest.blade.php
2. views/exads/array.blade.php
3. views/exads/database.blade.php
4. views/exads/fizzbuzz.blade.php
5. views/exads/index.blade.php
6. views/exads/lottery.blade.php
7. views/layouts/base.blade.php
8. views/header.blade.php

### Additional Files:

1. lang/gb/messages.php
2. Services/AbTester.php
3. Services/DateCalculator.php
4. Services/FindMissing.php
5. Services/FizzBuzz.php
6. Database/migrations/2020_01_24_000000_create_exads_test_table.php

### MySQL Database:

1. exads_test

### MySQL tables:

1. users

## Installation (docker / laradock for example)

1. Clone the project: git clone
2. cd <project-root-directory> (the folder containing the /app/ directory)
3. Clone laradock: git clone https://github.com/Laradock/laradock.git
4. Follow overview/instructions here: https://laradock.io/
5. Spin up the project containers: docker-compose up -d nginx mysql workspace
6. SSH into workspace container& run Composer update
7. Rename file <project-root>/env-example to .env
8. php artisan key:generate
9. Open project directory /public/images/tesing to see screenshots from my testing process
10. Run the project in your browser: http://localhost/index

## API Reference

Not required

## Contributors

Donal Lynch <donal.lynch.msc@gmail.com>

## License

© 2020 Donal Lynch Software, Inc.