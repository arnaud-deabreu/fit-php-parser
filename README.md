# FIT File Parser PHP Library

> Note: This project is a work in progress (WIP) and is not ready for production use. Contributions, suggestions, and feedback are welcome as we work towards a stable release.

## Introduction
Welcome to the FIT File Parser Library, a PHP-based library designed to parse FIT files. FIT (Flexible and Interoperable Data Transfer) files are commonly used in fitness devices to store workout data. This library is inspired by the Garmin SDK but is developed independently with the goal of providing an open-source alternative for the PHP community.  
The FIT protocol documentation can be found [here](https://developer.garmin.com/fit/overview/)

> Garmin is a registered trademark of Garmin Ltd. or its subsidiaries, and this library is an independent project that is not affiliated with, endorsed by, or associated with Garmin in any way.

## Features
FIT File Parsing: Read and parse FIT files into PHP data objects.

## Installation
Currently, the library is not available via Composer. To use the library, clone this repository and include it in your project:

```bash
git clone git@github.com:arnaud-deabreu/fit-php-parser.git
```

## Usage
### Generate profile data
To generate the necessary JSON files for decoding binary strings from FIT files, you need to use the `make fitparser-gen-profile` command.  
This command requires the `Profile.xlsx` file, which is provided in the Garmin SDK.  
First, download the Garmin SDK from Garmin's Developer Website. Once downloaded, locate the Profile.xlsx file within the SDK and place it in the data folder of this project.  
After positioning the file correctly, you can run the `make fitparser-gen-profile command`, which will process the file and generate the JSON files needed for parsing and decoding FIT file data.

## Parse a FIT file

```php
<?php

use FitParser\Parser;

$parser = new Parser('path/to/fit/file.fit');
$parser->parse();

$parser->getMessages(); // FitParser\Messages\Message[]
```

## License
This library is licensed under the MIT License. See the LICENSE file for more details.

## Disclaimer
This library is in early development and should not be used in production environments. The authors are not responsible for any data loss or damage resulting from the use of this library.

## Contact
For any inquiries, please reach out via GitHub Issues.