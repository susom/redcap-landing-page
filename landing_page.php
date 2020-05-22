<?php
/** @var \Stanford\LandingPage\LandingPage $this */

// Initialize vars as global since this file might get included inside a function
global $shibboleth_username_field, $auth_meth, $homepage_announcement, $homepage_customtext,  $homepage_grant_cite, $homepage_custom_text
       , $sendit_enabled, $edoc_field_option_enabled, $api_enabled
       , $homepage_contact, $homepage_contact_url, $homepage_contact_email;

// Is user authenticated?  If we are doing noauth on index page, we need to manually do this:
if ($auth_meth == "shibboleth") {
    if (!empty($shibboleth_username_field)) {
        // Custom username field
        $userid = $_SESSION['username'] = strtolower($_SERVER[$shibboleth_username_field]);
    } else {
        // Default value
        $userid = $_SESSION['username'] = strtolower($_SERVER['REMOTE_USER']);
    }
    defined("USERID") or define("USERID", strtolower($userid));
}

$authenticated = false;
if (defined("USERID") && !empty(USERID)) {
    // Authenticated
    $authenticated = true;
    $this->emDebug("Authenticated", USERID);
} else {
    // Not Authenticated
    $this->emDebug("Not authenticated");
}

// EVERYTHING BELOW IS PRINTED OUT AND INJECTED INTO THE REDCap homepage
// BUILD NEW PAGE WITH DEFAULT HEADER AND INCLUDES then PRINT ONTO PAGE
$objHtmlPage = new HtmlPage();
$objHtmlPage->addExternalJS(APP_PATH_JS . "base.js");
// $objHtmlPage->addStylesheet("jquery-ui.min.css", 'screen,print');
$objHtmlPage->addStylesheet("style.css", 'screen,print');
$objHtmlPage->addStylesheet("home.css", 'screen,print');
$objHtmlPage->PrintHeader();

// OVERIDES/DEFAULTS, SET in the EM Config in Control Settings
$default_bg_image       = "stanford_quad.jpg";
$default_bg_video       = "stanford_drone.mp4";
$body_background_url    = empty($this->getSystemSetting("background-image-url"))    ? $this->getAssetUrl($default_bg_image) : $this->getSystemSetting("background-image-url");
$background_video_url   = empty($this->getSystemSetting("background-video-url"))    ? $this->getAssetUrl($default_bg_video) : $this->getSystemSetting("background-video-url");
$urlencoded_addy        = empty($this->getSystemSetting("contact-address"))         ? urlencode("Vanderbilt University") : urlencode($this->getSystemSetting("contact-address"));

$homepage_announcement  = empty($this->getSystemSetting("home-announce-override"))  ? $homepage_announcement    : $this->getSystemSetting("home-announce-override");
$info_boxes             = empty($this->getSystemSetting("splash-info-override"))  ? $homepage_customtext    : $this->getSystemSubSettings("splash-info-override");
$stats                  = $this->getSystemSubSettings("redcap-stats");
$resources              = $this->getSystemSubSettings("redcap-resources");
$team                   = $this->getSystemSubSettings("redcap-team");
$team                   = $this->getSystemSubSettings("redcap-team");
$goog_analytics_id      = $this->getSystemSetting("goog-analytics-id");
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $goog_analytics_id ?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo $goog_analytics_id ?>');
</script>
<!-- USE the getAssetUrl() method to fetch and cache files -->
<link rel='stylesheet' href='<?php echo $this->getAssetUrl("mini-default.min.css") ?>' type='text/css' class='takeover'/>
<link rel='stylesheet' href='<?php echo $this->getAssetUrl("redcap_home_takeover.css") ?>' type='text/css' class='takeover'/>
<style>
    <!-- THESE IMAGES ARE INCLUDED WITH THE EM, CALL THEM HERE WITH getAssetURL rather than through CSS -->
    <!-- for some reason the first style class def below a comment gets ignored? so put a dummy .junk class there -->
    .junk{}

    body{
        background-image:url('<?php echo $body_background_url ?>') !important;
        background-repeat: no-repeat;
    }
    .team figure{
        background-position:50%;
        background-repeat: no-repeat;
    }

    .icon{
        background-image:url(<?php echo $this->getAssetUrl("icon_wiki.png") ?>);
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_1{
        background-image:url(<?php echo $this->getAssetUrl("icon_faq.png") ?>);
        background-position:50% 10%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_2{
        background-image:url(<?php echo $this->getAssetUrl("icon_videos.png") ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_3{
        background-image:url(<?php echo $this->getAssetUrl("icon_hours.png") ?>) ;
        background-position:50% 20%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_4{
        background-image:url(<?php echo $this->getAssetUrl("icon_training.png") ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_5{
        background-image:url(<?php echo $this->getAssetUrl("icon_email.png") ?>) ;
        background-position:50% 40%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_6{
        background-image:url(<?php echo $this->getAssetUrl("icon_pro_services.png") ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:25%;
    }

    .features .bullet div.build_surveys:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_survey.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.speed:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_speed.png") ?>);
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.export_data:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_export.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.reporting:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_data.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.econsent:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_econsent.png") ?>);
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.contact_list:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_contacts.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.scheduling:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_scheduling.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.mobile:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_mobile.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.send_files:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_send_files.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.save_pdf:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_printer.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.advanced:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_advanced.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.api:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_api.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.data_queries:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_faq.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.piping:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getAssetUrl("icon_piping.png") ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:20%;
    }
</style>
<?php
// Display tabs (except if viewing FAQ in a new window)
include APP_PATH_VIEWS . 'HomeTabs.php';
if (!$authenticated) {
    // Not Authenticated , HIDE NAVE BAR ITEMS AND SHOW LOGIN BUTTON
    ?>
    <style>
        .navbar-nav .nav-item:not(.active) {
            display:none !important;
        }
    </style>
    <script>
        if($(".redcap_signin").length < 1){
            var login = $("<div>").addClass("button").addClass("redcap_signin").text("Sign In").click(function(){
                location.href= app_path_webroot_full + 'redcap_v' + redcap_version + '/Home/index.php';
            });
            $(".nav-item.active .nav-link").attr("href", app_path_webroot_full + 'redcap_v' + redcap_version + '/Home/index.php?action=myprojects');
            $(".nav.ml-auto").append(login);
        }
    </script>
    <?php
}
?>
<!-- CUSTOM HOME PAGE BODY HTML PLACED HERE -->
<div id="newPageContent" class="row">
    <div class="row col-sm-12 splash">
        <?php if($show_bg_video){ ?>
            <video autoplay muted loop id="bgvid">
                <source id="bgvidsrc"  type="video/mp4">
            </video>
        <?php } ?>
        <div class="col-sm-12 col-md-offset-1 col-md-5 home_announce">
            <div id="home_announce">
                <?php 
                if (trim($homepage_announcement) != "" ) {
                    print(nl2br(decode_filter_tags($homepage_announcement)));
                }
                ?>
            </div>
        </div>
        <?php
            if(!empty($info_boxes)){
        ?>
            <div class="col-sm-12 col-md-offset-1 col-md-4 info_text">
            <div id="info_text">
            <?php 
                foreach($info_boxes as $info_box){ 
                    if(empty($info_box["info-box"])){
                        continue;
                    }
                    $info_texts .= nl2br(decode_filter_tags($info_box["info-box"]));
                }
                echo $info_texts;
            ?>
            </div>
            </div>
        <?php   
            }
        ?>
    </div>
    
    <?php
        if(!empty($stats)){
    ?>
        <div class="row col-sm-12 stats">
        <h2 class="col-sm-12">REDCap Stats</h2>
        <?php 
            $cnt        = 0;
            $statslots  = "";
            foreach($stats as $stat){ 
                if(empty($stat["stat-slot"])){
                    continue;
                }
                $statslots .= '<div class="col-sm-12 col-md-MDSIZE">'.$stat["stat-slot"].'</div>';
                $cnt++;
            }
            $mdsize         = round(12/$cnt);
            $statslots_html = str_replace("MDSIZE",$mdsize,$statslots);
            echo $statslots_html;
        ?>
    </div>
    <?php   
        }
    ?>
    
    <div class="row col-sm-12 features">
        <h2 class="col-sm-12"><?php echo $lang['info_12'] ?></h2>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="build_surveys">
                <h5><?php echo $lang['info_13'] ?></h5>
                <p><?php echo $lang['info_14'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="speed">
                <h5><?php echo $lang['info_15'] ?></h5>
                <p><?php echo $lang['info_16'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="export_data">
                <h5><?php echo $lang['info_19'] ?></h5>
                <p><?php echo $lang['info_20'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="reporting">
                <h5><?php echo $lang['info_23'] ?></h5>
                <p><?php echo $lang['info_24'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="econsent">
                <h5><?php echo $lang['info_45'] ?></h5>
                <p><?php echo $lang['info_46'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="contact_list">
                <h5><?php echo $lang['info_32'] ?></h5>
                <p><?php echo $lang['info_33'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="scheduling">
                <h5><?php echo $lang['global_25'] ?></h5>
                <p><?php echo $lang['info_18'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="mobile">
                <h5><?php echo $lang['global_118'] ?></h5>
                <p><?php echo $lang['info_43'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="send_files">
                <h5><?php echo $lang['info_21'] ?></h5>
                <p><?php echo $lang['info_22'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="save_pdf">
                <h5><?php echo $lang['info_25'] ?></h5>
                <p><?php echo $lang['info_26'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="advanced">
                <h5><?php echo $lang['info_13'] ?></h5>
                <p><?php echo $lang['info_13'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="api">
                <h5>REDCap API</h5>
                <p><?php echo $lang['info_31'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="data_queries">
                <h5><?php echo $lang['info_39'] ?></h5>
                <p><?php echo $lang['info_40'] ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="piping">
                <h5><?php echo $lang['info_41'] ?></h5>
                <p><?php echo $lang['info_42'] ?></p>
            </div>
        </div>
    </div>

    <?php
        if(!empty($resources)){
    ?>
    <div class="row col-sm-12 training">
        <h2 class="col-sm-12">Training & Resources</h2>
        <?php
            foreach($resources as $idx => $resource){
                $inline_style = !empty($resource["resource-icon"]) ? "style='background:url(".$resource["resource-icon"].") 50% no-repeat; background-size:55%'" : "";
                echo '<div class="col-sm-12 col-md-3">
                        <div class="resources ">
                            <h3 class="icon icon_'.$idx.'" '.$inline_style.'>'.$resource["resource-name"].'</h3>
                            <a href="'.$resource["resource-link"].'" target="blank">'.$resource["resource-description"].'</a>
                        </div>
                    </div>';
            }
        ?>
    </div>
    <?php
        }
    ?>

    <?php
        if(!empty($team)){
    ?>
        <div class="row col-sm-12 team">
            <h2 class="col-sm-12">Our Team</h2>
            <?php 
                foreach($team as $member){   
                echo "<div class='col-sm-12 col-md-3'>
                            <fig>
                                <figure style='background-image:url(".$member["team-member-pic"].")'></figure>
                                <div>".$member["team-member-bio"]."</div>
                                <figcaption>".$member["team-member-name"]."</figcaption>
                            </fig>
                        </div>";
                }
            ?>
        </div>
    <?php   
        }
    ?>

    <div class="row col-sm-12 about">
        <h2 class="col-sm-12">About REDCap</h2>
        <div class="col-sm-12 col-md-4">
            <p><?php echo $lang['info_44'] ?></p>
        </div>
        <div class="col-sm-12 col-md-4">
            <p><?php echo $lang['info_35'] ?></p>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php
                echo "<p style='color:#C00000;'><i>".$lang['global_03'].$lang['colon']."</i> ".$lang['info_10']."</p>";
                $citation_info = $this->getSystemSetting("citation-info");
                if (!empty($citation_info)) {
            ?>
                <div>
                    <h2 class="col-sm-12">Citation Information</h2>
                    <div class="col-sm-12 col-md-12">
                        <p><?php echo $citation_info ?></p>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
    
    <div class="row col-sm-12 contact">
        <div class="col-sm-12 col-md-6 map row">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $urlencoded_addy ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                </div>
                <style>
                    .mapouter{position:relative;text-align:right;height:100%;width:100%;}
                    .gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;min-height:300px;}
                </style>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 inputform row">
            <?php
            if(!$authenticated) {
                ?>
                    <div class="login-container">
                        <h2>Do you have a SUnet ID?</h2>
                        <p>Use your network username and password to login to REDCap.</p>
                        <form class="form-buttons is-shortened" method="post" action="/login">
                            <button type="submit" class="btn btn-primary btn-full-width">Continue</button>
                            <input type="hidden" name="redirect_url" value="/files">
                            <input type="hidden" name="request_token" value="b85c1500f691bcf87a3efc43854b4b453a31090025828181e9455e7cc5b425b4">
                            <input type="hidden" name="login_page_source" value="sso-prompt-login">
                        </form>
                        <p><a href="#" class="show_general_form">Don't have a SUnet ID?</a></p>
                    </div>
                <?php
            }
            ?>  
            <form id="general_contact">
                <h2>Contact Us</h2>
                <p>If you require assistance or have any questions about REDCap, please contact.</p>

                <a href="mailto:redcap-help@lists.stanford.edu?subject=REDCap Information Request" class="button inverse">Send us an Email!</a>
                <!-- <div class="input-group vertical">
                    <label for="fullname">Name</label>
                    <input type="text" id="fullname" placeholder="Your Name"/>
                </div>
                <div class="input-group vertical">
                    <label for="your_email">Email</label>
                    <input type="text" id="your_email" placeholder="Your Email"/>
                </div>
                <div class="input-group vertical">
                    <label for="message">Message</label>
                    <textarea id="message" placeholder="Your Message"></textarea>
                </div> 
                <button class="inverse large">Submit</button>-->
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready( function() {
    //START : SETTING UP PAGE FOR TAKE OVER , THIS BLOCK OF JS MODIFYS DOM TO SET UP INJECTION OF ABOVE CUSTOM HTML
    // first disable all the css baggage from redcap
    $('link:not(.takeover)').prop("disabled", true);

    // next pop the nav bar right out
    $('nav.navbar').detach().insertBefore("#pagecontent").attr("id","fixed_nav");
    $('nav.navbar button.collapsed').addClass("hidden-md").addClass("hidden-lg");
    $('.nav.navbar-nav.ml-auto').unwrap();
    $('.navbar-brand img').attr("src","<?php echo $this->getAssetUrl("redcap_logo.png") ?>");
    $("#nav-tab-sendit").next().remove();
    $("#nav-tab-sendit,#nav-tab-help-resources").remove();
    $(".navbar-nav.ml-auto li:not([id])").remove();
    var username = $("#nav-tab-logout .nav-link span b");
    username.text("("+username.text()+")");
    $("#nav-tab-logout .nav-link span").remove();
    $("#nav-tab-logout .nav-link").append(username);
    //END : OK THAT IS GOOD FOR SETTING UP THE PAGE FOR TAKE OVER

    //Add Event to contact form
    $(".show_general_form").click(function(){
        $(".login-container").slideUp();
        $("#general_contact").fadeIn("fast");
        return false;
    });

    // Add Event for small view slide menu
    $(".navbar-toggler").click(function(){
        if($(this).parent().hasClass("showmenu")){
            $(this).parent().removeClass("showmenu");
        }else{
            $(this).parent().addClass("showmenu");
        }
        return;
    });

    //put a timer on the home page announce sliding in
    setTimeout(function(){
        $("#home_announce").addClass("show");
    },1500)

    //monitor the scroll of the page for potential interactive things
    $("#fixed_nav").addClass("scrolling");
    window.onscroll = function () {
        if(window.scrollY > 57){
            // $("#fixed_nav").addClass("scrolling");
        }else{
            // $("#fixed_nav").removeClass("scrolling");
        }
    };

    //smoothing the background video transitioning in
    $(window).bind("load",function(){
        var tmpimg      = new Image();
        tmpimg.src      = "<?php echo $body_background_url ?>";
        tmpimg.onload   = function(){

            <?php if($show_bg_video) { ?>
            $("#newPageContent .splash").addClass("black");
            <?php } ?>
            
            setTimeout(function(){
                document.getElementById("bgvidsrc").src = "<?php echo $background_video_url?>";
                document.getElementById("bgvid").load();
            },100);
        }
    });

    //PID GOTO JUMP
    var _input   = $("<input/>").attr("id","pid_jump").attr("type","text").attr("placeholder","Go To PID");
    var _label   = $("<label/>").addClass("pid_jumper");
    _label.append(_input);
    var _navitem = $("<li/>").addClass("nav-item").attr("id", "pid_jumper");
    _navitem.append(_label);
    $("nav.fixed-top .navbar-nav.ml-auto").append(_navitem);
    
    _input.keypress(function (e) {
      if (e.which == 13) {
        var gotopid   = $("#pid_jump").val();
        location.href = "<?php echo $authenticatedProjUrl ?>" + "?pid=" + gotopid;
        return false;    //<---- Add this line
      }
    });
});
</script>
<?php
$objHtmlPage->PrintFooter();
