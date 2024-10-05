# FIT File Parser PHP Library

> [!NOTE]
> This project is a work in progress (WIP) and is not ready for production use. Contributions, suggestions, and feedback are welcome as we work towards a stable release.

![FIT PHP PARSER](https://repository-images.githubusercontent.com/843801807/8db07dea-9607-4ca7-887f-711670f7c765)

## 👋🏻 Introduction
Welcome to the FIT File Parser Library, a PHP-based library designed to parse FIT files. FIT (Flexible and Interoperable Data Transfer) files are commonly used in fitness devices to store workout data. This library is inspired by the Garmin SDK but is developed independently with the goal of providing an open-source alternative for the PHP community.  
The FIT protocol documentation can be found [here](https://developer.garmin.com/fit/overview/)

> [!IMPORTANT]
> Garmin is a registered trademark of Garmin Ltd. or its subsidiaries, and this library is an independent project that is not affiliated with, endorsed by, or associated with Garmin in any way.

## 🛠️ Features
FIT File Parsing: Read and parse FIT files into PHP data objects.
Parsing the file will give you an array of `FitParser\Records\RecordInterface` objects, which contain an array of `FitParser\Records\ValueInterface` objects.
Each `RecordInterface` contains an array of `ValueInterface` objects related to the record type.

Example:
A `FileId` record can contain an array of `Manufacturer`, `Number`, `Product`, `ProductName`, `SerialNumber`, and `TimeCreated` `ValueInterface` objects.
If a field is unknown, it will be represented by an `UnknownValue` object.

```
## 📚 Installation
To use the library, install it with this command:

```bash
composer require arnaud-deabreu/fit-php-parser
```

## 📝 Parse a FIT file

```php
<?php

use FitParser\Parser;

$parser = new Parser(
    file_get_contents('path/to/fit/file.fit')
);
$parser->parse();

$records = $parser->getRecords(); // FitParser\Records\RecordInterface[]

// Then you can get values from Records like:
$values = $records[0]->getValues(); // FitParser\Records\ValueInterface[] 
```

## 🧙🏻‍♂️ Generated Messages and Fields classes
To generate the necessary Messages and Fields classes for decoding binary strings from FIT files, you need to use the `make fitparser-gen-profile` command.  
This command requires the `Profile.xlsx` file, which is provided in the Garmin SDK.  
First, download the Garmin SDK from Garmin's Developer Website. Once downloaded, locate the Profile.xlsx file within the SDK and place it in the data folder of this project.  
After positioning the file correctly, you can run the `make fitparser-gen-profile command`, which will process the file and generate the classes needed for parsing and decoding FIT file data.

## License
This library is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Disclaimer
This library is in early development and should not be used in production environments. The authors are not responsible for any data loss or damage resulting from the use of this library.

## Contact
For any inquiries, please reach out via GitHub Issues.