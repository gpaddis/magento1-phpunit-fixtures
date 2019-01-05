# Unit testing Magento 1.x modules
Unit tests are often a disregarded part of the Magento 1 module development workflow, since the setup can be very complex and often one has to solve many conflicts and issues in order to obtain a working system. This leads to the impossibility of establishing a solid CI/CD workflow and to a higher chance of introducing new bugs, especially when collaborating with other team members.

This repository contains a collection of **fixtures**, **data providers** and **tests** for the Magento 1 testing framework [Ecomdev_PHPUnit](https://github.com/EcomDev/EcomDev_PHPUnit) to help developers overcome the steep learning curve and to start immediately with the actual tests. This configuration works out of the box on [Travis-CI](https://travis-ci.org/).

The module uses [a fork of MageTestStand](https://github.com/gpaddis/MageTestStand) to fetch the latest Magento 1.9.x versions and allow the installation of external module dependencies in the composer.json.

You are free to find inspiration in the `Test` directory and use any of them in your project to setup automated module tests with Travis-CI!

## Resources
* ([English](https://www.schmengler-se.de/en/category/magento/ecomdev_phpunit/) - [German](https://www.schmengler-se.de/category/magento/ecomdev_phpunit/)) Some great articles on Ecomdev_PHPUnit By Fabian Schmengler on [his blog](https://www.schmengler-se.de/en/), updated to the latest available release (0.3.7)
