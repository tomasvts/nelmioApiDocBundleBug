# Installation
Clone the repository:   
```
git clone git@github.com:tomasvts/nelmioApiDocBundleBug.git
```

Install the dependencies:   
```
cd nelmioApiDocBundleBug
php composer.phar install
```

# Reproduce the error
## With the browser
1. Go to the public folder and launch the php server
```
cd public 
php -S 0.0.0.0:8084
```
2. Navigate to http://0.0.0.0:8084/api/doc

## With the console/phpunit tests
1. Execute test NelmioApiDocBundleTest.php
```
./vendor/phpunit/phpunit/phpunit tests/Integration/NelmioApiDocBundleTest.php
```
2. The output should be:
```
PHPUnit 9.6.19 by Sebastian Bergmann and contributors.

Testing App\Tests\Integration\NelmioApiDocBundleTest
[critical] Uncaught PHP Exception LogicException: "The PropertyInfo component was not able to guess the type of App\Company\Domain\Company::$edAt. You may need to add a `@var` annotation or use `@OA\Property(type="")` to make its type explicit." at ObjectModelDescriber.php line 184
F.                                                                  2 / 2 (100%)

Time: 00:00.146, Memory: 20.00 MB

There was 1 failure:

1) App\Tests\Integration\NelmioApiDocBundleTest::testValidDocumentation
There is an error in the documentation, please check the details: []
Failed asserting that 500 matches expected 200.

/Users/tomasprado/workspace/nelmioApiDocBundleBug/tests/Integration/NelmioApiDocBundleTest.php:22

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.
```
