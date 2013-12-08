#!/bin/sh

files="compass.svg index.php result.php survey.php html.php author.php color.php landing.php style.css"

chmod g+w $files
scp $files fosc:/srv/www
