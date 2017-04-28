Omnidesk Bundle
===============

This Bundle integrate the [Omnidesk API Wrapper](https://omnidesk.ru/api/introduction/intro) into your Symfony Project.

[![Build Status](https://travis-ci.org/vragovR/omnidesk-bundle.svg?branch=master)](https://travis-ci.org/vragovR/omnidesk-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vragovR/omnidesk-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vragovR/omnidesk-bundle/?branch=master)
[![Code Climate](https://codeclimate.com/github/vragovR/omnidesk-bundle/badges/gpa.svg)](https://codeclimate.com/github/vragovR/omnidesk-bundle)

Installation
------------

### 1: Download

```bash
$ composer require vragovr/omnidesk-bunle "dev-master"
```

### 2: Enable

```php
public function registerBundles()
{
    $bundles = [
        // ...
        new OmnideskBundle\OmnideskBundle(),
    ];
}
```

### 3: Configure

```yaml
omnidesk:
  domain: your.omnidesk.domain
  email: your.omnidesk.email
  key: your.omnidesk.key
```

Cases
-----
### Add 
```php
$request = new AddCasesRequest();
$request
    ->setUserEmail('test@mail.com')
    ->setSubject('Test case')
    ->setContent('Hello world!')
    ->setContentHtml('<p>Hello world!</p>')
    ->addAttachment(new File('/path/file.jpg'));
    
$response = $this->get('omnidesk.service.cases')->add($request);
dump($response->getCases()->getId());
```
### Edit 
```php
$request = new EditCasesRequest();
$this->get('omnidesk.service.cases')->edit($request);
```
### Lists 
```php
$request = new ListCasesRequest();
$this->get('omnidesk.service.cases')->lists($request);
```
### View 
```php
$request = new ViewCasesRequest();
$this->get('omnidesk.service.cases')->view($request);
```
### Trash
```php
$request = new ViewCasesRequest();
$this->get('omnidesk.service.cases')->trash($request);
```
### Spam 
```php
$request = new ViewCasesRequest();
$this->get('omnidesk.service.cases')->spam($request);
```
### Restore
```php
$request = new ViewCasesRequest();
$this->get('omnidesk.service.cases')->restore($request);
```
### Delete 
```php
$request = new ViewCasesRequest();
$this->get('omnidesk.service.cases')->delete($request);
```
