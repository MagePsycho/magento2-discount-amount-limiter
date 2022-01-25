## Overview:
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

## Installation
1. Download the extension .zip file and extract the files.
1. Copy the extension files from src/ folder to the {your-magento2-root-dir}/app/code/MagePsycho/DiscountLimit *(create non-existing folders manually)*
1. Run the following series of commands from the SSH console of your server:
```
php bin/magento module:enable MagePsycho_DiscountLimit --clear-static-content
php bin/magento setup:upgrade
```
1. Flush the store cache
```
php bin/magento cache:flush
```
1. Deploy static content - *in Production mode only*
```
rm -rf pub/static/* var/view_preprocessed/*
php bin/magento setup:static-content:deploy
```
1. Go to Admin > MARKETING > Discount Limiter > Manage Settings

## Live Demo:

* [Backend Demo](http://m2default.mage-expo.com/admin_m2demo/?module=discountlimiter)
* [Frontend Demo](http://m2default.mage-expo.com/dual-handle-cardio-ball.html)

## Changelog

**Version 1.0.0 (2022-01-24)**

* Initial Release.
