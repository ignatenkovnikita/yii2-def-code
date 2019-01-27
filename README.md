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
        'class' => \ignatenkovnikita\defcode\Module::class
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


Import Mnp
Links
https://smsc.ru/sys/get_mnp.php?login=your_login&psw=your_password
https://smsc.ru/sys/get_mnp.php?login=your_login&psw=your_password&date=17.06.2018

TODO
- add test
- refactoring
