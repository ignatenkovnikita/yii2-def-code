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
    ]
],
```


Install

```bash
./console/yii migrate --migrationPath=vendor/ignatenkovnikita/defcode/migrations/  
```