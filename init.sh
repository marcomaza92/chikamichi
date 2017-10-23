#!/bin/bash
echo "Hello human... Welcome to Hipper Stack"
echo
echo "Please select an option from the menu below: "
echo
COLUMNS=1
options=(
        "Static Stack"
        "PHP Stack"
        "Javascript Stack"
        "Wordpress Stack"
        "Ionic2 Stack"
        "Quit")
select option in "${options[@]}"
do
  case $option in
    "Static Stack")
      echo "You selected: $option"
      echo
      read -p "Please enter your project name: " projectname
      echo
      echo "Wait while we create your project..."
      echo
      mkdir ./$projectname
      cd ./$projectname
      mkdir ./css ./js ./media ./font ./php
      cd ..
      cp ./common/core/*.css ./$projectname/css
      cp ./common/core/*.js ./$projectname/js
      cp ./common/libraries/*.css ./$projectname/css
      cp ./common/libraries/*.js ./$projectname/js
      cp ./common/php/*.php ./$projectname/php
      cp -r ./common/configuration/. ./$projectname
      cp ./static/*.html ./$projectname
      echo "$projectname is ready!"
      echo
      echo "Thanks for using Hipper Stack!"
      break
      ;;
    "PHP Stack")
      echo "You selected: $option"
      echo
      read -p "Please enter your project name: " projectname
      echo
      echo "Wait while we create your project..."
      echo
      mkdir ./$projectname
      cd ./$projectname
      mkdir ./classes ./instances ./resources ./views
      mkdir ./resources/core ./resources/libraries ./resources/media
      cd ..
      cp ./common/core/*.css ./$projectname/resources/core
      cp ./common/core/*.js ./$projectname/resources/core
      cp ./common/libraries/*.css ./$projectname/resources/libraries
      cp ./common/libraries/*.js ./$projectname/resources/libraries
      cp ./common/sql/crudphppdo.sql ./$projectname
      cp -r ./common/configuration/. ./$projectname
      cp ./php/*.class.php ./$projectname/classes
      cp ./php/*.instance.php ./$projectname/instances
      cp ./php/*.view.* ./$projectname/views
      cp ./php/index.php ./$projectname
      echo "$projectname is ready!"
      echo
      echo "Thanks for using Hipper Stack!"
      break
      ;;
    "Javascript Stack")
      echo "You selected: $option"
      echo
      read -p "Please enter your project name: " projectname
      echo
      echo "Wait while we create your project..."
      echo
      mkdir ./$projectname
      cd ./$projectname
      mkdir ./resources ./routes ./views
      mkdir ./resources/core ./resources/libraries ./resources/media
      cd ..
      cp ./common/core/*.css ./$projectname/resources/core
      cp ./common/core/*.js ./$projectname/resources/core
      cp ./common/libraries/*.css ./$projectname/resources/libraries
      cp ./common/libraries/*.js ./$projectname/resources/libraries
      cp ./common/sql/crudvue.sql ./$projectname
      cp -r ./common/configuration/. ./$projectname
      cp ./js/index.js ./$projectname/routes
      cp ./js/app.js ./$projectname/
      echo "$projectname is ready!"
      echo
      echo "Thanks for using Hipper Stack!"
      break
      ;;
    "Wordpress Stack")
      echo "You selected: $option"
      echo
      echo "Wordpress Stack is not ready yet"
      break
      ;;
    "Ionic2 Stack")
      echo "You selected: $option"
      echo
      echo "Ionic2 Stack is not ready yet"
      break
      ;;
    "Quit")
      echo "You selected: $option"
      echo
      echo "Bye bye. Have a nice day :)"
      break
      ;;
    *)
      echo "Try again"
  esac
done
