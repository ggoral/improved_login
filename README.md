Improved Login
==============

# Improved Login App Template

This is a [improved_login](https://github.com/ggoral/improved_login) application template.

## Installation

Clone this repository.

```bash
$ git clone git@github.com/ggoral/improved_login.git
```

Remove the origin:

```bash
$ cd improved_login
$ git remote rm origin
```


## Config the app

```bash
$ improved_login/database/load_dump.sh database.version.sql
```

## Run the app

```bash
$ improved_login/index.php
```

## Run the test suite

```bash
$ phpunit model/model_test.php
```

## File Hierarchy

```bash
$ model/model.php
$ model/model_test.php
$ view/
$ controller/controller.php
$ database/database.01.sql
$ database/load_dump.sh
```


## Contributing

1. Fork it
2. Add remote repository (`git remote add upstream https://github.com/ggoral/improved_login.git`)
3. Check change (`git pull upstream master`)
4. Add your feature (`git add feature_file`)
5. Commit your changes (`git commit -m 'Add some feature'`)
6. Push to the remote repository (`git push origin master`)
7. Create new Pull Request

