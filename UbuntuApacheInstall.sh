#!/bin/bash

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

#some constants
readonly webserverHTMLdir=/var/www/html
readonly installdir=$webserverHTMLdir/SimpleStackExchange

#check whether directory exists
if [ ! -d "$webserverHTMLdir" ]; then
  exit
fi

#creating directories
[ -d $installdir ] || mkdir $installdir

#installed files
filesToCopy=( SubmitQuestion.php QuestionForm.html SiteStyle.css formValidate.js)

#start copying files
for i in "${filesToCopy[@]}"
do
  echo "Copying $i to $installdir/$i ..."
  cp $i $installdir/$i
  echo "Done"
done
