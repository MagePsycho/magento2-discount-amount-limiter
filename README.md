<div align="center">

![Magento 2 Discount Limiter](https://i.imgur.com/d8QEHRb.png)
# Magento 2 Discount Limiter

</div>

<div align="center">

[![Packagist Version](https://img.shields.io/github/v/tag/MagePsycho/magento2-discount-amount-limiter?logo=packagist&sort=semver&label=packagist&style=for-the-badge)](https://packagist.org/packages/magepsycho/magento2-discountlimit)
[![Packagist Downloads](https://img.shields.io/packagist/dt/magepsycho/magento2-discountlimit.svg?logo=packagist&style=for-the-badge)](https://packagist.org/packages/magepsycho/magento2-discountlimit/stats)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.3_|_2.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
![License](https://img.shields.io/badge/license-MIT-green?color=%23234&style=for-the-badge)

</div>

## Overview
[Magento 2 Discount Limiter](https://www.magepsycho.com/magento2-discount-limiter.html) allows setting the maximum discount amount (upper limit) for a percentage-based cart rule.

Store owners run different promotional activities to attract customers and grow sales.  
One of the discounts they often want to use is percentage-based but with some limits.  
For example: Get `10% OFF` but up to `50$` only.


By default, Magento doesn't have such a feature of setting the maximum amount of discount (upper limit) in the cart rule.  
But with this extension, you are all set to go.

## Key Features
* Option to enable/disable the extension as per store
* Option to set the maximum amount discount

## Feature Highlights

### Limit Discount Amount
With this extension, the store admin can set the upper limit (maximum discount) for any percentage-based cart rule.

Some use cases:
* Flat `10% OFF`, up to `50$`
* `10% OFF` for first order, up to `25$`
* etc.

![M2 Discount Limiter - Cart Rule Edit Page](https://www.magepsycho.com/media/catalog/product/3/0/30-m2-discount-limiter-admin-cart-rule-max-discount.jpg)

![M2 Discount Limiter - Storefront Cart Page](https://www.magepsycho.com/media/catalog/product/4/0/40-m2-discount-limiter-storefront-maximum-discount.jpg)

## 🛠️ Installation

### 1 Using Composer (Preferred)
```
composer require magepsycho/magento2-discountlimit
```

### 2 Using Modman
```
modman init
modman clone git@github.com:MagePsycho/magento2-discount-amount-limiter.git
```

### 3 Using Zip File
* Download the [Extension Zip File](https://github.com/MagePsycho/magento2-discount-amount-limiter/archive/master.zip)
* Extract & upload the files to `/path/to/magento2/app/code/MagePsycho/DiscountLimit/`

After installation by either means, activate the extension with following steps

1. Enable the module
```
php bin/magento module:enable MagePsycho_DiscountLimit --clear-static-content
php bin/magento setup:upgrade
```
2. Flush the store cache
```
php bin/magento cache:flush
```
3. Deploy static content - *in Production mode only*
```
rm -rf pub/static/* var/view_preprocessed/*
php bin/magento setup:static-content:deploy
```
4. Go to Admin > MARKETING > Discount Limiter > Manage Settings

## Live Demo:

* [Backend Demo](http://m2default.mage-expo.com/admin_m2demo/?module=discountlimiter)
* [Frontend Demo](http://m2default.mage-expo.com/dual-handle-cardio-ball.html)

## Changelog

**Version 1.0.0 (2022-01-24)**

* Initial Release.

## Authors
- Raj KB [![Twitter Follow](https://img.shields.io/twitter/follow/rajkbnp.svg?style=social)](https://twitter.com/rajkbnp)

## Contributors

![Contributors](https://contrib.rocks/image?repo=MagePsycho/magento2-discount-amount-limiter)

## To Contribute
Any contribution to the development of `Magento 2 Discount Limiter` is highly welcome.  
The best possibility to provide any code is to open a [pull request on GitHub](https://github.com/MagePsycho/magento2-discount-amount-limiter/pulls).

## Need Support?
If you encounter any problems or bugs, please create an issue on [GitHub](https://github.com/MagePsycho/magento2-discount-amount-limiter/issues).

Please [visit our store](https://www.magepsycho.com/extensions/magento-2.html) for more FREE / paid extensions OR [contact us](https://magepsycho.com/contact) for customization / development services.