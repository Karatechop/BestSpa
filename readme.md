## HES CSCI E-15 Dynamic Web Applications fall 2014 Project #4. Code name: BestSpa

## Live URL
<http://p4.borisrugel.com/>

## Description
This app alows users to find and compare services offerd by spa and massage salons along with relevant salon contact inforamation.
Search functionality is available to all users. Database is managed through admin panel available to logged in admins.
Admins can search for, create new, edit existing and delete exinsting services, salons, service kinds and types of service kinds.
For those cases deletion of some database entry is not possible due to integrity constraint violation a helper functionality is implemeted
that suggests which bloking databese entries have to be deleted first.

## Demo
http://screencast.com/t/QYOw01uJ00

## Details for teaching team
Admin panel log in:
Username: admin@domain.com
Password: password


## Outside code
* Bootstrap: http://getbootstrap.com/
* Bootstrap Theme: http://bootswatch.com/superhero/
* jQuery: http://jquery.com/
* Tablesorter: http://tablesorter.com/docs/
* Former - form creation helper PHP package: http://anahkiasen.github.io/former/

## Misc
* "Learn more" and "Help" buttons on index page navigation bar are not active yet. They are not relevant for P4.
* Video presentation was a bit too short to show form validation. Forms are validated both on client side (html atributes validation) as well as on server side.


