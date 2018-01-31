# Files Unrenamed

This is an alpha, proof-of-concept module. It is intended as a starting point for those wanting to take the idea further and who will do their own due diligence around security. Use at your own risk.

## Security considerations

This module bypasses the santization of filenames that is normally done by the ProcessWire core. It does some basic sanitization using `$sanitizer->text()` but this may not be sufficient for all circumstances.

If `$sanitizer->text()` interferes with special characters in your filenames you will have to add your own custom sanitization to the module.

## Windows

Prior to version 7.1 (with internal_encoding set to UTF-8), PHP has problems working with files containing special characters on Windows. Read more [here](http://blog.garr.co.uk/php/2015/09/22/php-windows-and-utf-8-filenames.html).

If you are running PW on Windows with PHP < 7.1 and want to use this module with filenames containing special characters you'll have some extra work to do.

1. Download and install [php-wfio](https://github.com/kenjiuno/php-wfio).
2. Copy the saveUpload() method code from /wire/core/WireUpload.php to WireUploadRenamed.php.
3. Edit usages of rename() and move_uploaded_file() in this method to use php-wfio. See the [documentation](https://github.com/kenjiuno/php-wfio) and the [article](http://blog.garr.co.uk/php/2015/09/22/php-windows-and-utf-8-filenames.html) mentioned above.

## Usage

[Install](http://modules.processwire.com/install-uninstall/) the Files Unrenamed module (FieldtypeFilesUnrenamed).

Create a new Files Unrenamed field and use as per a normal Files field.
