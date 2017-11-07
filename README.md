# Setup

## vagrant

### Clone folders
```
$ git clone https://github.com/alexandritex2007/wp-template.git
```
### Move to project directory
```
$ cd wp-template
```
### vagrant up
```
$ vagrant up
```
### site access

[http://wp-template.dev/](http://wp-template.dev/)

## gulp

### Move to gulpfile directory
```
$ cd wp-template/wordpress/wp-content/themes/wp-template/
```
### Installing packages
```
$ npm install
```
### Start-up
```
$ gulp
```

# sql backup

### Move to project directory
```
$ cd wp-template
```
### ssh access
```
$ vagrant ssh
```
### backup
```
$ wp db export /vagrant/wordpress.sql
```
