<?php
namespace Stanford\LandingPage;

include_once "emLoggerTrait.php";
// include_once "emNotifsTrait.php";

// NOTE That for this to work in shibboleth, you must add a define("NOAUTH",true) to the main index.php before redcap connect.

class LandingPage extends \ExternalModules\AbstractExternalModule {

    use emLoggerTrait;
    // use emNotifsTrait;

	function redcap_every_page_before_render($project_id = null){
        global $lang, $redcap_version;


        $base = basename(dirname(PAGE_FULL));

        if ($base == "Messenger" || PAGE == "cron.php") return;


        $this->emDebug("On " . __FUNCTION__,
            'PAGE:' . PAGE,
            'BASE: ' . basename(dirname(PAGE_FULL)),
            'PAGE FULL: ' . PAGE_FULL,
            'URI: ' . $_SERVER['REQUEST_URI']);//, $_SERVER['asdf']);

        // Take over REDCap home page
        if ( (PAGE == "index.php" || PAGE == "/") && empty($base) ){

            // Lets take over this page and prevent other code from executing
            $this->emDebug("Run Landing Page - " . PAGE);

            $authenticatedHomeUrl = APP_PATH_WEBROOT_FULL . "redcap_v" . $redcap_version . "/home/index.php";

            // Check for arguments that require authenticated home page
            // By redirecting to home, we will skip this every_page hook and force normal redcap authentication
            if (!empty($_GET['action']) || !empty($_GET['route'])) {
                $newUrl = $authenticatedHomeUrl . "?" . $_SERVER['QUERY_STRING'];
                $this->emDebug("NEW URL: " . $newUrl);
                // header("Location: " . $newUrl);
            }


            
            // MUST BE LOGGED IN
            // action=myprojects, create,
            // route=SenditController:upload,
            // => APP_PATH_WEBROOT_FULL . "redcap_v" . VERSION . "/home/index.php?" ...

            // ONLY SHOW MESSENGER LINK IF AUTHETICATED
            // nav-link navbar-user-messaging

            // ONLY SHOW USERNAME AND ICON IF LOGGED IN OTHERWISE SHOW LOGIN BUTTON
            
            include $this->getModulePath() . "/landing_page.php";
            $this->exitAfterHook();
        } else {
            $this->emDebug("Page is " . PAGE. " - skipping");
        }
    }

}
