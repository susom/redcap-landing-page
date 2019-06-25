<?php
global $shibboleth_username_field, $auth_meth;

// Is user authenticated?  Because we are doing noauth on index page, we need to manually do this:
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

if (defined("USERID")) {
    // Authenticated
    $this->emDebug("Authenticated");
} else {
    // Not Authenticated
    $this->emDebug("Not authenticated");
}

$objHtmlPage = new HtmlPage();
$objHtmlPage->addExternalJS(APP_PATH_JS . "base.js");
$objHtmlPage->addStylesheet("jquery-ui.min.css", 'screen,print');
$objHtmlPage->addStylesheet("style.css", 'screen,print');
$objHtmlPage->addStylesheet("home.css", 'screen,print');
$objHtmlPage->PrintHeader();

// // Display tabs (except if viewing FAQ in a new window)
include APP_PATH_VIEWS . 'HomeTabs.php';

// Initialize vars as global since this file might get included inside a function
global $homepage_announcement, $homepage_grant_cite, $homepage_custom_text
    , $sendit_enabled, $edoc_field_option_enabled, $api_enabled
    , $homepage_contact, $homepage_contact_url, $homepage_contact_email;

// OVERIDES/DEFAULTS , in the EM Config
$body_background_url    = empty($this->getSystemSetting("background-image-url"))    ? $this->getUrl("/assets/images/stanford_quad.jpg", true, true) : $this->getSystemSetting("background-image-url");
$background_video_url   = empty($this->getSystemSetting("background-video-url"))    ? $this->getUrl("/stanford_drone.mp4", true, true)  : $this->getSystemSetting("background-video-url");
$urlencoded_addy        = empty($this->getSystemSetting("contact-address"))         ? urlencode("Vanderbilt University") : urlencode($this->getSystemSetting("contact-address"));
$homepage_announcement  = empty($this->getSystemSetting("home-announce-override"))  ? $homepage_announcement : $this->getSystemSetting("home-announce-override");
$homepage_custom_text   = empty($this->getSystemSetting("splash-info-override"))    ? $homepage_custom_text : $this->getSystemSetting("splash-info-override");
?>
<link rel='stylesheet' href='<?php echo $this->getUrl("assets/styles/mini-default.min.css", true, true) ?>' type='text/css' class='takeover'/>
<link rel='stylesheet' href='<?php echo $this->getUrl("assets/styles/redcap_home_takeover.css", true, true) ?>' type='text/css' class='takeover'/>
<style>
    body {
        background-image:url('<?php echo $body_background_url ?>');
        background-repeat: no-repeat;
    }
    .team figure{
        background-position:50%;
        background-repeat: no-repeat;
    }

    .icon{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_wiki.png", true) ?>);
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_1{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_faq.png", true) ?>);
        background-position:50% 10%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_2{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_videos.png", true) ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_3{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_hours.png", true) ?>) ;
        background-position:50% 20%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_4{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_training.png", true) ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_5{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_email.png", true) ?>) ;
        background-position:50% 40%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon_6{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_pro_services.png", true) ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:25%;
    }

    .features .bullet div.build_surveys:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_survey.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.speed:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_speed.png", true) ?>);
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.export_data:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_export.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.reporting:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_data.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.econsent:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_econsent.png", true) ?>);
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.contact_list:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_contacts.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.scheduling:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_scheduling.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.mobile:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_mobile.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.send_files:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_send_files.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.save_pdf:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_printer.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.advanced:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_advanced.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.api:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_api.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.data_queries:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_faq.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:55%;
    }
    .features .bullet div.piping:after{
        background-color:#fff;
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_piping.png", true) ?>) ;
        background-position:50%;
        background-repeat: no-repeat;
        background-size:20%;
    }
</style>
<div id="newPageContent" class="row">
    <div class="row col-sm-12 splash">
        <video autoplay muted loop id="bgvid">
            <source src="<?php echo $background_video_url ?>" type="video/mp4">
        </video>
        <div class="col-sm-12 col-md-offset-1 col-md-5 home_announce">
            <div id="home_announce">
                <?php 
                if (trim($homepage_announcement) != "" && isset($_SESSION['username'])) {
                    print(nl2br(decode_filter_tags($homepage_announcement)));
                }
                ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-offset-1 col-md-4 info_text">
            <div id="info_text">
                <?php 
                if (trim($homepage_custom_text) != "") {
                    $homepage_custom_text = nl2br(decode_filter_tags($homepage_custom_text));
                    print($homepage_custom_text);
                }
                ?>
            </div>
        </div>
    </div>

    <!-- <div id="notif" class="slide right">
        <h3>Some Messaging</h3>
        <p>Lets just do the aniation stuff</p>
    </div>

    <div class="row col-sm-12 notifs">
        <h2 class="col-sm-12">Notifs</h2>
        <div class="col-sm-12">
            <span class="toast">This is a toast message!</span>

            <label for="modal-control">Show modal</label>
            <input type="checkbox" id="modal-control" class="modal">
            <div>
              <div class="card">
                <label for="modal-control" class="modal-close" ></label>
                <h3 class="section">Modal</h3>
                <p class="section">This is a modal dialog!</p>
              </div>
            </div>
        </div>
    </div> -->

    <?php
        // STATS can be set in the EM Config
        $stats = $this->getSubSettings("redcap-stats");
        if(!empty($stats)){
    ?>
    <div class="row col-sm-12 stats">
        <h2 class="col-sm-12">REDCap Stats</h2>
        <?php 
            foreach($stats as $stat){   
            echo '<div class="col-sm-12 col-md-3">'.$stat["stat-slot"].'</div>';
            }
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
        // Resources can be set in the EM Config
        $resources = $this->getSubSettings("redcap-resources");
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
        // TEam Members can be set in the EM Config
        $team = $this->getSubSettings("redcap-team");
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
                // if (trim($homepage_grant_cite) != "") {
                //     echo "<p>".$lang['info_08'] . "<b>$homepage_grant_cite</b>).</p>";
                // }
                echo "<p style='color:#C00000;'><i>".$lang['global_03'].$lang['colon']."</i> ".$lang['info_10']."</p>";
                // echo "<p>" . $lang['info_11'] . " <a style='text-decoration:underline;' href='". (trim($homepage_contact_url) == '' ? "mailto:$homepage_contact_email" : trim($homepage_contact_url)) ."'>$homepage_contact</a>". $lang['period'] . "</p>";

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
                    .gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}
                </style>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 inputform row">
            <?php
            if (defined("USERID")) {
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
                <div class="input-group vertical">
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
                <button class="inverse large">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready( function() {
    // first disable all the css baggage from redcap
    $('link:not(.takeover)').prop("disabled", true);

    // next pop the nav bar right out
    $('nav.navbar').detach().insertBefore("#pagecontent").attr("id","fixed_nav");
    $('nav.navbar button.collapsed').addClass("hidden-md").addClass("hidden-lg");
    $('.nav.navbar-nav.ml-auto').unwrap();
    $('.navbar-brand img').attr("src","<?php echo $this->getUrl("/assets/images/redcap_logo.png", true) ?>");

    //Add Event to page 
    $(".show_general_form").click(function(){
        $(".login-container").slideUp();
        $("#general_contact").fadeIn("fast");
        return false;
    });

    //put a timer on the home page announce
    setTimeout(function(){
        $("#home_announce").addClass("show");
    },1500)

    //monitor the scroll of the page for potential interactions
    window.onscroll = function () {
        if(window.scrollY > 57){
            $("#fixed_nav").addClass("scrolling");
        }else{
            $("#fixed_nav").removeClass("scrolling");
        }
    };

//OK THAT IS GOOD FOR SETTING UP THE PAGE FOR TAKE OVER
});
</script>
<?php
$objHtmlPage->PrintFooter();
