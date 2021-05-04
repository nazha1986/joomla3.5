# joomla3.5

This repository contains modules,components,plugins for joomla 3.5+

## Modules

A list of modules

### 1-mod_offline_site_countdown:

Simple offline site page based on jquery and bootstrap framework with a customizable counter with animated spinner<br>( day / hour / minute / second), and some informations regarding the reactivation of the site, it's simple to use and install.
<br/>___original jquery plugin___ :<br> http://www.jqueryscript.net/time-clock/Minimal-Countdown-Plugin-With-jQuery-Moment-js-downtime-timer.html
<br/>___JQUERY DEMO___ :<br>
http://www.jqueryscript.net/demo/Minimal-Countdown-Plugin-With-jQuery-Moment-js-downtime-timer/
#### instructions *:

  <br> **1**. Download **[mod_offline_site_contdown.zip](https://github.com/nazha1986/joomla3.5/blob/master/mod_offline_site_countdown/mod_offline_site_countdown.zip)**
  <br> **2**. install it on your joomla site
  <br> **3**. edit and manage the installed module input parameters as shown in this picture and than active module
  <br>
<br>![admin module config params](https://github.com/nazha1986/joomla3.5/blob/master/mod_offline_site_countdown/mod_offline_site_countdown%232.png)<br>
  <br> **4**. override file **offline.php** on your template you can found it on siterul.../template/offline.php
  <br>
   put this line under body tag <br>
   `<body>`<br>
   `<jdoc:include type="module" name="mod_offline_site_countdown" />`<br>
   <br> **4**. put offline your site , you should a page like this one <br>
    <br>![admin module config params](https://github.com/nazha1986/joomla3.5/blob/master/mod_offline_site_countdown/mod_offline_site_countdown%231.png)<br>
   







  

