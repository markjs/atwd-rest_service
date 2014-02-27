ATWD REST Service
=================

## Accessing the application
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/client
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/crimes/6-2013/xml
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/crimes/6-2013/json
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/crimes/6-2013/south_west/xml
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/crimes/6-2013/south_west/json
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/crimes/6-2013/put/south_west:12345/xml
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/crimes/6-2013/put/south_west:12345/json

## Viewing source code

Source code is best viewed on GitHub at http://github.com/markjs/atwd-rest_service but can also be viewed through `.phps` files on CEMS.

- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/index.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/get/all_crimes.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/get/region_crimes.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/put/region_total.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/views/all_crimes.json.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/views/all_crimes.xml.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/views/region_crimes.json.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/views/region_crimes.xml.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/views/region_total.json.phps
- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/app/views/region_total.xml.phps

The `.htaccess` file can be viewed here

- http://www.cems.uwe.ac.uk/~mj7-smith/atwd/htaccess

## Application decisions

In building the application, it was decided that routing would be done within PHP itself, rather than the alternative - configuring all routes within a number of `.htaccess` rewrite rules. This decision was made to improve agility in configuring and developing routes. The `.htaccess` file redirects all routes to `index.php` excluding those where a file directly exists at the requested address. Within `index.php`, the URLs are processed and matched against regular expressions and the appropriate PHP script included. Once the processing is completed within this script, a view file is included based on the requested format (XML or JSON). This is configured in such a way that extra formats could easily be added with separate view files and a slight change to the regular expressions in `index.php`.

## XML crime data

The XML crime data was not created by a processing script. This was taken from a provided XML file and manipulated slightly. No Schema is provided.

The XML file can be viewed here, but no creation details or scripts are available as none were used.

- http://cems.uwe.ac.uk/~mj7-smith/atwd/data/recorded_crime.xml

## Learning outcomes

In building this application I tried to focus on minimalism, trying to solve problems in as little code as is reasonable, without sacrificing simplicity and readability of code.

Through using PHP includes I learnt that include paths work relative to the parent file that is including the file you're in. To stop this from creating any issues, I made sure that all included files are ultimately included within `index.php` so all file paths are relative to the root directory of the application.

In deploying the application to the CEMS servers there was an issue with URL encoding that differed between `www.cems` and `isa.cems`. This was solved by substituting the `~` in the `.htaccess` file with an encoded `%7E`.

## Struggles

I struggled greatly with the vaugeness and inconsistencies of the provided specification. The spec missed out key details on the functionality of the application with left me a little lost when implementing certain features.
