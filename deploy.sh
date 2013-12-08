#!/bin/sh

files="index.php quiz.php result.php html.php survey.php author.php color.php compass.svg style.css"

chmod g+w $files
scp $files fosc:/srv/www
