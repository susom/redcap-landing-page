<?php
namespace Stanford\LandingPage;

include_once "emLoggerTrait.php";

class LandingPage extends \ExternalModules\AbstractExternalModule {

    use emLoggerTrait;

    function __construct() {
		parent::__construct();
	}

	function redcap_every_page_top($project_id){
        global $lang;
        //$this->emDebug("On " . __FUNCTION__, 'PAGE:' . PAGE, 'BASE: ' . basename(dirname(PAGE_FULL)), 'PAGE FULL: ' . PAGE_FULL, 'URI: ' . $_SERVER['REQUEST_URI']);//, $_SERVER['asdf']);

        // Take over REDCap home page
        // Trying to deal with changes in how REDCap parses the PAGE constant...
        $page = $_SERVER['REQUEST_URI'];    // e.g.  /index.php?action=help_resources
        if ($page == "index.php" || $page == "/index.php"){
            $this->emDebug("ON Landing Page , Include NEW HTML");
            include $this->getModulePath() . "/landing_page.php";
        }
    }
}
