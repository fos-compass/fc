#!/bin/sh

files="readlist.php compass.svg index.php quiz.php result.php survey.php html.php author.php color.php style.css"

chmod g+w $files
scp $files fosc:/srv/www
