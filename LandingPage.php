<?php
namespace Stanford\LandingPage;

include_once "emLoggerTrait.php";

class LandingPage extends \ExternalModules\AbstractExternalModule {

    use emLoggerTrait;

	function redcap_every_page_before_render($project_id = null){
        global $lang, $redcap_version;

        //$this->emDebug("On " . __FUNCTION__, 'PAGE:' . PAGE, 'BASE: ' . basename(dirname(PAGE_FULL)), 'PAGE FULL: ' . PAGE_FULL, 'URI: ' . $_SERVER['REQUEST_URI']);//, $_SERVER['asdf']);

        // Take over REDCap home page
        if (PAGE == "index.php" || PAGE == "/"){

            // Lets take over this page and prevent other code from executing
             $this->emDebug("Run Landing Page - " . PAGE);


            $authenticatedHomeUrl = APP_PATH_WEBROOT_FULL . "redcap_v" . $redcap_version . "/home/index.php";


            // Check for arguments that require authenticated home page
            // By redirecting to home, we will skip this every_page hook and force normal redcap authentication
            if (!empty($_GET['action']) || !empty($_GET['route'])) {
                $newUrl = $authenticatedHomeUrl . "?" . $_SERVER['QUERY_STRING'];
                $this->emDebug("NEW URL: " . $newUrl);
                header("Location: " . $newUrl);
            }

            // MUST BE LOGGED IN
            // action=myprojects, create,
            // route=SenditController:upload,
            // => APP_PATH_WEBROOT_FULL . "redcap_v" . VERSION . "/home/index.php?" ...


            // ONLY SHOW MESSENGER LINK IF AUTHETICATED
            // nav-link navbar-user-messaging

            // ONLY SHOW USERNAME AND ICON IF LOGGED IN OTHERWISE SHOW LOGIN BUTTON

            // Take over the landing page (but only once as this hook is recalled in building the html page itself
            // if (!empty($GLOBALS['LandingPageIncluded'])) {
            //     return;
            // }
            //
            // $GLOBALS['LandingPageIncluded'] = TRUE;

            $this->emDebug("Loading Custom Landing Page");
            include $this->getModulePath() . "/landing_page.php";

            $this->exitAfterHook();



            // Is user authenticated
            if (defined("USERID")) {
                // Authenticated
            } else {
                // Not Authenticated
            }

            // $this->exitAfterHook();
        } else {
            $this->emDebug("Page is " . PAGE. " - skipping");
        }
    }
}
