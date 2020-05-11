Steps to run webapp
1. To Call Google APIs used php.
2. It requires Google Cloud Client Library for PHP
3. Install composer  from https://getcomposer.org/
4. Installing the Google Cloud Client library locally using $ composer require google/cloud
5. The above command will add vendor folder on local.
7. http://localhost/handwriting-recognition/ is the base url.
8. After page load 'Choose File' for upload, the image file is included in setup folder.
9. After submit the original image and the recognised handwritten text will be displayed side-by-side to the user.