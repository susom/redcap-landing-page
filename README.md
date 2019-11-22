# Custom REDCap Landing Page

This EM will replace the current REDCap landing page with a custom styled landing page.

##Setup

> *make sure in Control Center > General Configuration > "Redcap base URL" is set appropriately (ie http://[DOMAIN]/)*

By installing the EM, visiting the [REDCap] or [REDCap]/index.php pages will inject javascript which will modify the client side DOM and 
display the custom landing page.

The is composed of the LandingPage class and :

- landing_page.php
- assets/
  - images/
  - sytles/
  - video/

This landing_page.php repurposes the default Redcap content and places them in the new UI. Additional containers to hold new content such as "Home Page Announce" , "Team Members" , etc. which are configured in the Control Settings -> External Modules -> Module Config settings.

The landing_page html can be customized.


## Configuration for shibboleth usage

When using the Shibolleth for authentication. The following setup steps are required:

1. Add NOAUTH to REDCap's root /index.php above to allow for Shibboleth lazy auth on homepage like so:

	```
	//allow for Shibboleth lazy auth on homepage
	define("NOAUTH",true);

	// Call redcap_connect
	include dirname(__FILE__) . DIRECTORY_SEPARATOR . "redcap_connect.php";
	```

2. Configure apache to allow "lazy" Shib access to the 'root' page of REDCap with this .conf
	
	```
	# Allow 'lazy' shib access to the 'root' page of REDCap
	<LocationMatch "^\/(|index.php)$">
	  AuthType shibboleth
	  ShibRequestSetting requireSession false
	  Require shibboleth
	</LocationMatch>
	```
