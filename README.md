Omnidesk Bundle
===============

``` php
$request = new CreateCasesRequest();
$request
    ->setUserEmail('mail@mail.ru')
    ->setUserPhone('+79102492320')
    ->setSubject('тест')
    ->setContent('тест')
    ->setContentHtml('<p>тест</p>');
dump($this->container->get('service.cases')->create($request));

$request = new GetCasesRequest();
dump($this->container->get('service.cases')->get($request));

$request = new ViewCasesRequest();
$request->setCaseId(6778642);
dump($this->container->get('service.cases')->view($request));
```
