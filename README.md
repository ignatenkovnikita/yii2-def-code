# yii2-def-code
Yii2 Def Code Module

### Install

```bash
composer require ignatenkovnikita/yii2-def-code:dev-master
```


Add to backend config
```php
'defcode' => [
    'class' => 'ignatenkovnikita\defcode\Module',
    'controllerNamespace' => \ignatenkovnikita\defcode\Module::backendControllerNamespace(),
    'viewPath' => '@vendor/ignatenkovnikita/yii2-def-code/backend/views',
],
```

Add to console config
```php
'bootstrap' => ['def-code']
'modules' => [
    ...
    'def-code' => [
        'class' => \ignatenkovnikita\defcode\Module::class,
        'listUrl' => [
            DefCode::TYPE_ABC9 => 'https://rossvyaz.ru/data/DEF-9xx.csv',
        ],
        'smscLogin' => 'SMSC_LOGIN',
        'smscPassword' => 'SMSC_PASSWORD',
    ],
    ...
],
```

Apply Migration

```bash
./console/yii migrate/create --migrationPath=vendor/ignatenkovnikita/yii2-def-code/migrations/  
```

Workflow load and import data:
- Download files, command 
 ```php
./console/yii def-code/download-all
```
- After import files, command
```php
./console/yii def-code/import
```
- Delete old files
```php
./console/yii def-code/delete-old-files
```

Mnp download full and import
```bash
./console/yii mnp/download
./console/yii mnp/import
```
Mnp download detail, date yesterday, advise run in hour night
```bash
./console/yii mnp/download-detail
./console/yii mnp/import-detail
```


TODO
- add test
- refactoring
