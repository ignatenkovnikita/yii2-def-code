# yii2-def-code
Yii2 Def Code Module




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
./console/yii migrate --migrationPath=vendor/ignatenkovnikita/defcode/migrations/  
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

TODO
- add test
- refactoring