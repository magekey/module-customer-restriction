# Magento 2 Customer Restriction

## Features:

Navigate to **Stores** > **Configuration** > **Customers** section > **Customer Restriction**

- Customer Registration
  * restriction by email patterns
  * set error message
- Customer Login
  * restriction by email patterns
  * set error message

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
