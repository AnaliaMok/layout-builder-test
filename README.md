# Layout Builder Test

An experimental Drupal 8.7.x project aimed towards testing the new core Layout Builder module.

## Project Setup
* __NOTE__: This project comes pre-configured to run using [Lando](https://docs.devwithlando.io/tutorials/drupal8.html)

1. Fork or clone this repo
2. Run `lando start` from the root of this project
3. Run `lando composer install`. This might take a while dependening on your internet connection.
4. Install Drupal using `lando drush si --db-url=mysql://drupal8:drupal8@database/drupal8` OR visit the .lndo https link provided by lando and go throuh the manual install. (All necessary information available by running `lando info`)
4. Next, run `lando drush cim -y` to get all up-to-date configuration

### Setting Up Theme Development
__NOTE__: This theme comes pre-config

1. From within `/web/themes/custom/builder`, run `npm install`
2. To run hot-reloading, run `npm run watch`
3. To run a production build, run `npm run prod`
