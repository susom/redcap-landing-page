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
// $onHelpPageInNewWindow = (isset($_GET['action']) && $_GET['action'] == 'help' && isset($_GET['newwin']));
// if (!$onHelpPageInNewWindow) {
include APP_PATH_VIEWS . 'HomeTabs.php';
// }


// Initialize vars as global since this file might get included inside a function
global $homepage_announcement, $homepage_grant_cite, $homepage_custom_text, $sendit_enabled, $edoc_field_option_enabled, $api_enabled;
global $homepage_contact, $homepage_contact_url, $homepage_contact_email;




// $username = isset($_GET['username']) ? $_GET['username'] : '';
// if($username)
// {
// 	$user = User::getUserInfo($username);
// 	$folder_ids = isset($_GET['folder_ids']) ? explode(',', $_GET['folder_ids']) : array();
// }
// else
// {
// 	$user = User::getUserInfo(USERID);
// 	$folder_ids = array();
// }
//
// $this->emDebug("Username: $username");


$body_background_url = $this->getSystemSetting("background-image-url");
if (empty($body_background_url)) $body_background_url = $this->getUrl("/assets/images/stanford_quad.jpg", true, true);

$background_video_url = $this->getSystemSetting("background-video-url");
if (empty($background_video_url)) $background_video_url = $this->getUrl("/assets/images/stanford_quad.jpg", true, true);


?>
<link rel='stylesheet' href='<?php echo $this->getUrl("assets/styles/mini-default.min.css", true, true) ?>' type='text/css' class='takeover'/>
<link rel='stylesheet' href='<?php echo $this->getUrl("assets/styles/redcap_home_takeover.css", true, true) ?>' type='text/css' class='takeover'/>
<style>
    body {
        background-image:url('<?php echo $body_background_url ?>');
        background-repeat: no-repeat;
    }
    /*#bgvid {*/
    /*    background-image: url(*/<?php //echo $this->getUrl("/assets/images/stanford_quad.jpg", true, true) ?>/*);*/
    /*    background-repeat: no-repeat;*/
    /*}*/
    .team .andy_martin figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_1558658034.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .team .alvaro_alvarez figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_1308928044.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .team .jae_lee figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_2.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .team .jordan_schultz figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_10.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .team .irvin_szeto figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_368513347.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .team .ryan_valentine figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_6247144.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .team .leeann_yasukawa figure{
        background-image:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_13.img.full.high.jpg');
        background-position:50%;
        background-repeat: no-repeat;
    }
    .icon.wiki{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_wiki.png", true) ?>);
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon.faq{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_faq.png", true) ?>);
        background-position:50% 10%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon.videos{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_videos.png", true) ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon.hours{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_hours.png", true) ?>) ;
        background-position:50% 20%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon.training{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_training.png", true) ?>) ;
        background-position:50% 30%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon.email{
        background-image:url(<?php echo $this->getUrl("/assets/images/icon_email.png", true) ?>) ;
        background-position:50% 40%;
        background-repeat: no-repeat;
        background-size:30%;
    }
    .icon.pro_services{
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
    </div> -->

    <!-- <div class="row col-sm-12 notifs">
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


    <div class="row col-sm-12 stats">
        <h2 class="col-sm-12">REDCap Stats</h2>
        <div class="col-sm-12 col-md-3">
            <iframe allowtransparency="true" width="150" height="100" src="https://datastudio.google.com/embed/reporting/17evFt8UqrGNAmLlB4i5PScKrAXDiPWDb/page/TDxq" frameborder="0" style="border:0; border-radius:5px" allowfullscreen></iframe>
        </div>
        <div class="col-sm-12 col-md-3">
            <iframe allowtransparency="true" width="150" height="100" src="https://datastudio.google.com/embed/reporting/17evFt8UqrGNAmLlB4i5PScKrAXDiPWDb/page/TDxq" frameborder="0" style="border:0; border-radius:5px" allowfullscreen></iframe>
        </div>
        <div class="col-sm-12 col-md-3">
            <iframe allowtransparency="true" width="150" height="100" src="https://datastudio.google.com/embed/reporting/17evFt8UqrGNAmLlB4i5PScKrAXDiPWDb/page/TDxq" frameborder="0" style="border:0; border-radius:5px" allowfullscreen></iframe>
        </div>
        <div class="col-sm-12 col-md-3">
            <iframe allowtransparency="true" width="150" height="100" src="https://datastudio.google.com/embed/reporting/17evFt8UqrGNAmLlB4i5PScKrAXDiPWDb/page/TDxq" frameborder="0" style="border:0; border-radius:5px" allowfullscreen></iframe>
        </div>
    </div>

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


    <div class="row col-sm-12 training">
        <h2 class="col-sm-12">Training & Resources</h2>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon wiki">Wiki</h3>
                <a href="https://medwiki.stanford.edu/display/redcap" target="blank">You will find here Tutorials, Videos, answers to the most common questions and also instructions to use a list of custom Add-ins built at Stanford you can use in your project.</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon faq">The Application FAQ</h3>
                <a href="https://redcap.stanford.edu/index.php?action=help">Supplied by the developers of REDCap, it contains detailed information on many of REDCap's features.</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon videos">Training Videos</h3>
                <a href="https://redcap.stanford.edu/index.php?action=training">Explore these overviews of fundamental concepts and features.</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon hours">Office Hours</h3>
                <a href="https://medwiki.stanford.edu/x/vIjZB">If you have a question or require some hands-on help with REDCap, we will do our best to assist. In-person or On-line.</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon training">In-Person Training</h3>
                <a href="https://medwiki.stanford.edu/x/75U0Bw">We offer a free 3-hour Introductory REDCap class once a month. please find here the current calendar.</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon email">Email Support</h3>
                <a href="https://redcap.stanford.edu/plugins/gethelp/">We are happy to answer specific questions by emailing redcap-help@lists.stanford.edu. or by filling a consultation request.</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="resources ">
                <h3 class="icon pro_services">Professional Services</h3>
                <a href="https://medwiki.stanford.edu/x/qafZB">Services beyond the basics, a trained REDCap software engineer can assist in the many aspects of data collection and research.</a>
            </div>
        </div>
    </div>
    
    <div class="row col-sm-12 team">
        <h2 class="col-sm-12">REDCap Team</h2>
        <div class="col-sm-12 col-md-3">
            <fig class="andy_martin">
                <figure></figure>
                <div>Andrew Martin, PhD is Principal Informatics Architect and Solutions Team Leader. He has developed and managed informatics platforms for multiple biotech and drug-discovery companies, specializing in complex data mining, analysis and visualization. He received his PhD in bioorganic chemistry with Dr. Peter Schultz at UC-Berkeley studying protein dynamics and in vivo unnatural amino acid incorporation.</div>
                <figcaption>Andy Martin, PHD <b>Solutions Team Leader</b></figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3">
            <fig class="alvaro_alvarez">
                <figure></figure>
                <div>Álvaro A. Álvarez is a Systems Engineer with years of experience in data and database management as well as project management. His primary role as a REDCap Specialist is to support various research projects from the school of medicine. Prior to joining Stanford, he was Resource Coordinator at Genentech and Data Manager at Caucaseco Scientific Research Center in Columbia. </div>
                <figcaption>Álvaro Álvarez</figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3">
            <fig class="jae_lee">
                <figure></figure>
                <div>Jae Lee, MBA is the Application Engineer responsible for the client framework development platform. She worked for several years in consulting before moving to software. She has extensive application development and QA experience including both black- and white-box testing and is currently supporting the REDCap user community, offering best practices review and implementing custom feature requests.</div>
                <figcaption>Jae Lee, MBA</figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3">
            <fig class="jordan_schultz">
                <figure></figure>
                <div>Jordan Schultz is a Research Engineer currently working on implementing web applications for projects associated with Research IT. He is a recent graduate from UC-Davis where he studied computer science while playing on the volleyball team. Aside from interests in fitness, music, and technology, he is an avid foodie and is also aspiring to pursue graduate school in the future.</div>
                <figcaption>Jordan Schultz</figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3">
            <fig class="irvin_szeto">
                <figure></figure>
                <div>Irvin Szeto is a Software Developer for Research IT. He has worked within the Internet industry in the Valley for over 12 years. His interests besides crafting elegant and invisible UX/UI for his users include data mining and visualizations as pertains to his work and areas outside of work such as sports and finance.</div>
                <figcaption>Irvin Szeto</figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3">
            <fig class="ryan_valentine">
                <figure></figure>
                <div>Ryan Valentine is a REDCap Application Specialist in the RIT Solutions team with experience in customer service and data vending. His goal is to assist School of Medicine research teams with the management of their research projects. He studied Economics at Miami University.</div>
                <figcaption>Ryan Valentine</figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3">
            <fig class="leeann_yasukawa">
                <figure></figure>
                <div>Lee Ann Yasukawa, MS is the Senior Application Developer affiliated with the Cardiothoracic Surgery Research Database project. Lee Ann was originally a control systems engineer at SLAC, then spent several years as both a server side engineer and an application developer on the Coghead platform.</div>
                <figcaption>Lee Ann Yasukawa, MS</figcaption>
            </fig>
        </div>
        <div class="col-sm-12 col-md-3"></div>
    </div>


    <div class="row col-sm-12 about">
        <h2 class="col-sm-12">About REDCap</h2>
        <div class="col-sm-12 col-md-4">
            <p><?php echo $lang['info_44'] ?></p>
        </div>
        <div class="col-sm-12 col-md-4">
            <p><?php echo $lang['info_35'] ?></p>
        </div>
<!--        <div class="col-sm-12 col-md-3">-->
<!--            <p>--><?php
//                 echo $lang['info_36'];
//                 echo " <img src='".APP_PATH_IMAGES."video_small.png'> <a href='javascript:;' onclick=\"popupvid('redcap_overview_brief02','Brief Overview of REDCap')\" style='text-decoration:underline;'>{$lang['info_37']}</a>{$lang['period']} " ;
//                 echo $lang['info_38'];
//                 echo " <a href='index.php?action=training' style='text-decoration:underline;'>{$lang['info_06']}</a> ";
//                 echo $lang['global_14']. $lang['period'];
//                 ?>
<!--            </p>-->
<!--        </div>-->
        <div class="col-sm-12 col-md-4">
            <?php
                // if (trim($homepage_grant_cite) != "") {
                //     echo "<p>".$lang['info_08'] . "<b>$homepage_grant_cite</b>).</p>";
                // }
                echo "<p style='color:#C00000;'><i>".$lang['global_03'].$lang['colon']."</i> ".$lang['info_10']."</p>";
                // echo "<p>" . $lang['info_11'] . " <a style='text-decoration:underline;' href='". (trim($homepage_contact_url) == '' ? "mailto:$homepage_contact_email" : trim($homepage_contact_url)) ."'>$homepage_contact</a>". $lang['period'] . "</p>";
            ?>
        </div>
    </div>

    <?php
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


    <div class="row col-sm-12 contact">
        <div class="col-sm-12 col-md-6 map row">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=455%20Broadway%20Redwood%20city&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                </div>
                <style>
                    .mapouter{position:relative;text-align:right;height:100%;width:100%;}
                    .gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}
                </style>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 inputform row">
            <form>
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
