#!/bin/bash

#some constants
readonly webserverHTMLdir=/var/www/html
readonly installdir=$webserverHTMLdir/SimpleStackExchange


#sudo
if (($EUID != 0)); then
  if [[ -t 1 ]]; then
    sudo "$0" "$@"
  else
    exec 1>output_file
    gksu "$0 $@"
  fi
  exit
fi

#prompt confirmation
echo "Please make sure you have these and its dependencies installed:
+> apache2
+> php5-cgi
+> mysql
Please also make sure that the apache2 home directory is in $webserverHTMLdir
This also will overwrite existing database named \"SimpleStackExchange\"
.....
Please repeat if any of the steps failed"
while true
do
    read -r -p 'Do you want to continue? (y/n)' choice
    case "$choice" in
      n|N) exit;;
      y|Y) break;;
      *) echo 'Response not valid';;
    esac
done

#check whether directory exists
if [ ! -d "$webserverHTMLdir" ]; then
  exit
fi

#this part is for copying files to apache2 root Directory
#creating directories
[ -d $installdir ] || mkdir $installdir

#installed files
filesToCopy=( SubmitQuestion.php QuestionForm.html SiteStyle.css formValidate.js dbmgr.php displayQuestion.php submitAnswer.php editQuestion.php editAnswer.php deleteQuestion.php deleteAnswer.php)

#start copying files
for i in "${filesToCopy[@]}"
do
  echo "Copying $i to $installdir/$i ..."
  cp $i $installdir/$i
  echo "Done"
done

#this part is for setting up mysql database
echo "creating database... please enter root password if prompted"
echo "GRANT ALL PRIVILEGES ON *.* TO 'IF3110'@'localhost' IDENTIFIED BY PASSWORD '*1FB87EF4D20580140DEF1E64200EA118DC4ADBE2'" | mysql -u root -p
echo "DROP DATABASE IF EXISTS SimpleStackExchange; CREATE DATABASE SimpleStackExchange;" | mysql -u IF3110 -pIF3110
mysql -u IF3110 -pIF3110 SimpleStackExchange <db.sql
echo "Done"
