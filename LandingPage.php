<?php
namespace Stanford\LandingPage;

include_once "emLoggerTrait.php";

// NOTE That for this to work in shibboleth, you must add a define("NOAUTH",true) to the main index.php before redcap connect.

class LandingPage extends \ExternalModules\AbstractExternalModule {

    use emLoggerTrait;

    private $LAST_MODIFIED;
    const KEY_DEFAULTS = "DEFAULTS_CREATED";

	function redcap_every_page_before_render($project_id = null){
        global $lang, $redcap_version;
        $base = basename(dirname(PAGE_FULL));
        $authenticatedHomeUrl   = APP_PATH_WEBROOT_FULL . "redcap_v" . $redcap_version . "/Home/index.php";
        $authenticatedProjUrl   = APP_PATH_WEBROOT_FULL . "redcap_v" . $redcap_version . "/ProjectSetup/index.php";

        // SKIP PAGES NOT index/home
        if ($base == "Messenger" || PAGE == "cron.php") {
            return;
        }



        ?>
        <script>
            window.onload = function(){
               var _input   = $("<input/>").attr("id","pid_jump").attr("type","text").attr("placeholder","Go To PID");
               var _submit  = $("<button/>").addClass("pid_go").text("Go");
               var _label   = $("<label/>").addClass("pid_jumper");
                _label.append(_input).append(_submit);
               var _navitem = $("<li/>").addClass("nav-item");
               _navitem.append(_label);
                $("nav.fixed-top ul").first().find(".nav-item:last-child").after(_navitem);

                _submit.click(function(){
                    var gotopid   = $("#pid_jump").val();
                    location.href = "<?php echo $authenticatedProjUrl ?>" + "?pid=" + gotopid;
                });
            };
        </script>
        <style>
            #pid_jump {
                width: 85px;
                font-size:77%;
            }
            .pid_go{
                font-size:77%;
            }
            .pid_jumper{
                position: relative;
                top: 50%;
                transform: translateY(-50%);
            }
        </style>
        <?php

        // HOME PAGE TAKEOVER
        if ( (PAGE == "index.php" || PAGE == "/") && empty($base)  ){
            // Lets take over this page and prevent other code from executing
            $this->emDebug("Run Landing Page - " . PAGE);
            // Check for arguments that require authenticated home page
            // By redirecting to home, we will skip this every_page hook and force normal redcap authentication
            if (!empty($_GET['action']) || !empty($_GET['route'])) {
                $newUrl                 = $authenticatedHomeUrl . "?" . $_SERVER['QUERY_STRING'];
                $this->emDebug("NEW URL: " . $newUrl);
                header("Location: " . $newUrl);
                exit;
            }

            // MUST BE LOGGED IN
            // action=myprojects, create,
            // route=SenditController:upload,
            // => APP_PATH_WEBROOT_FULL . "redcap_v" . VERSION . "/home/index.php?" ...

            // ONLY SHOW MESSENGER LINK IF AUTHETICATED
            // ONLY SHOW USERNAME AND ICON IF LOGGED IN OTHERWISE SHOW LOGIN BUTTON
            include $this->getModulePath() . "/landing_page.php";

            $this->exitAfterHook();
        } else {
            $this->emDebug("Page is " . PAGE. " - skipping");
        }
    }

    function redcap_module_system_enable(){
        $this->disableUserBasedSettingPermissions();

        $defaults = $this->getSystemSetting(self::KEY_DEFAULTS);
        if(!$defaults){
            //THE ACTUAL FIRST TIME THE MODULE IS ENABLED (vs disabled and re-enabled again)
            //SET SOME DEFAULT SETTING
            $this->setDefaultConfig();
        }
    }

    function redcap_module_save_configuration(){
        $this->setLastModified();
    }

    function getDefaultConfig(){
        return $this->getSystemSetting(self::KEY_DEFAULTS);
    }

    function setDefaultConfig($flag=1){
        // THIS HAPPENS THE FIRST TIME ENABLING ONLY
        $this->setSystemSetting(self::KEY_DEFAULTS,$flag);

        // SET SOME DEFAULT SETTINGS FOR HOME PAGE SLIDE IN
        $homepage_announcement_html = "";
        $homepage_announcement_html .= "<h1 style='font-size: 300%;'>Welcome to our HomePage</h1>";
        $homepage_announcement_html .= "<p>Little bit of sub-text</p>";
        $this->setSystemSetting("home-announce-override",$homepage_announcement_html);

        $homepage_customtext_html   = "";
        $homepage_customtext_html  .= "<div class='info_alert'>";
        $homepage_customtext_html  .= "<h4>Info Box Header 1</h4>";
        $homepage_customtext_html  .= "<p>Here is some info text</p>";
        $homepage_customtext_html  .= "<p>Here is some more info text</p>";
        $homepage_customtext_html  .= "</div>";
        $homepage_customtext_html  .= "<div class='info_alert'>";
        $homepage_customtext_html  .= "<h4>Info Box Header 2</h4>";
        $homepage_customtext_html  .= "<p>Here is some info text</p>";
        $homepage_customtext_html  .= "<p>Here is some more info text</p>";
        $homepage_customtext_html  .= "</div>";
        $this->setSystemSetting("splash-info-override",$homepage_customtext_html);

        // Below are SubSettings
        // A STAT MODULE
        // A TRAINING AND RESOURCE
        // A TEAM MEMBER
    }

    function setLastModified(){
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
	    return $this->framework->getUrl("getAsset.php?file=".$file."&ts=". $this->getLastModified() , true, true);
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
