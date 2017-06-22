# Magento 2 Customer Restriction

## Features:

- Customer Registration
  * restriction by email patterns
- Customer Login
  * restriction by email patterns

## Installing the Extension
    
    composer require magekey/module-customer-restriction

## Deployment

    php bin/magento maintenance:enable                  #Enable maintenance mode
    php bin/magento setup:upgrade                       #Updates the Magento software
    php bin/magento setup:di:compile                    #Compile dependencies
    php bin/magento setup:static-content:deploy         #Deploys static view files
    php bin/magento cache:flush                         #Flush cache
    php bin/magento maintenance:disable                 #Disable maintenance mode

## Versions tested
> 2.1.7
