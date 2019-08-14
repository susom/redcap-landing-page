<?php
namespace Stanford\LandingPage;

include_once "emLoggerTrait.php";

// NOTE That for this to work in shibboleth, you must add a define("NOAUTH",true) to the main index.php before redcap connect.

/**
 * @property \ExternalModules\FrameworkVersion2\Framework $framework
 */
class LandingPage extends \ExternalModules\AbstractExternalModule {

    use emLoggerTrait;

    private $LAST_MODIFIED;

	function redcap_every_page_before_render($project_id = null){
        global $lang, $redcap_version;
        $base = basename(dirname(PAGE_FULL));

        if ($base == "Messenger" || PAGE == "cron.php" || (!empty($_GET))) return;

        // Take over REDCap home page
        if ( (PAGE == "index.php" || PAGE == "/") && empty($base)  ){
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
//            include $this->getModulePath() . "/test.php";

            $this->exitAfterHook();
        } else {
            $this->emDebug("Page is " . PAGE. " - skipping");
        }
    }

    function redcap_module_save_configuration(){
        $this->setLastModified();
    }

    function setLastModified(){
        \ExternalModules\ExternalModules::disableUserBasedSettingPermissions();
        $ts = time();
        $this->setSystemSetting("last_modified",$ts);
        $this->LAST_MODIFIED = $ts;
    }


    function getLastModified(){
        if(empty($this->LAST_MODIFIED)){
	        $ts = $this->getSystemSetting("last_modified");
	        if(empty($ts)){
                $this->setLastModified();
            }else{
                $this->LAST_MODIFIED = $ts;
            }
        }

	    return $this->LAST_MODIFIED;
    }

    function getAssetUrl($file){
	    return $this->getUrl("getAsset.php?file=".$file."&ts=". $this->getLastModified() , true, true);
    }
    /**
     * A work-around for getting subsettings from a system-level - not currently supported
     * @param $key
     * @return array
     */
    function getSystemSubSettings($key) {
		$keys = [];
		$config = $this->getSettingConfig($key);
		foreach($config['sub_settings'] as $subSetting){
			$keys[] = $this->prefixSettingKey($subSetting['key']);
		}
		$rawSettings = \ExternalModules\ExternalModules::getSystemSettingsAsArray($this->PREFIX);
		$subSettings = [];
		foreach($keys as $key){
			$values = $rawSettings[$key]['value'];
			for($i=0; $i<count($values); $i++){
				$value = $values[$i];
				$subSettings[$i][$key] = $value;
			}
		}
		return $subSettings;
	}

}
