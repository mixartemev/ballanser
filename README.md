Yii 2 Advanced Project Template
===============================

```bash
#composer global require "fxp/composer-asset-plugin"
composer create-project --prefer-dist yiisoft/yii2-app-advanced ballanser
cd ballanser
php init --env=Development --overwrite=All

#set db ssettings

php yii migrate/create create_from_table --fields="name:string(255):notNull,parent_id:integer:foreignKey(from)" --interactive=0
php yii migrate/create create_in_table   --fields="val:integer:notNull,from_id:integer:foreignKey(from),when:timestamp:defaultExpression('CURRENT_TIMESTAMP'),comment:string(255)" --interactive=0
php yii migrate/create create_to_table   --fields="name:string(255):notNull,parent_id:integer:foreignKey(to)" --interactive=0
php yii migrate/create create_out_table  --fields="val:integer:notNull,to_id:integer:foreignKey(to),when:timestamp:defaultExpression('CURRENT_TIMESTAMP'),comment:string(255)" --interactive=0

php yii gii/model --tableName=* --ns='frontend\models' --interactive=0

php yii gii/crud --modelClass='frontend\models\From' --interactive=0 --enablePjax --enableI18N --controllerClass='frontend\controllers\FromController' --viewPath=@frontend/views/from
php yii gii/crud --modelClass='frontend\models\In'   --interactive=0 --enablePjax --enableI18N --controllerClass='frontend\controllers\InController'   --viewPath=@frontend/views/in
php yii gii/crud --modelClass='frontend\models\To'   --interactive=0 --enablePjax --enableI18N --controllerClass='frontend\controllers\ToController'   --viewPath=@frontend/views/to
php yii gii/crud --modelClass='frontend\models\Out'  --interactive=0 --enablePjax --enableI18N --controllerClass='frontend\controllers\OutController'  --viewPath=@frontend/views/out
```

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
