<link rel='stylesheet' href='<?php echo $this->getUrl("assets/styles/mini-default.min.css", true) ?>' type='text/css' class='takeover'/>
<link rel='stylesheet' href='<?php echo $this->getUrl("assets/styles/redcap_home_takeover.css", true) ?>' type='text/css' class='takeover'/>
<style>
    body {
        background-image:url('<?php echo $this->getUrl("/assets/images/stanford_quad.jpg", true) ?>');
        background-repeat: no-repeat;
    }
    #bgvid {
        background-image: url(<?php echo $this->getUrl("/assets/images/stanford_quad.jpg", true) ?>);
        background-repeat: no-repeat;
    }
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
        <video autoplay muted loop poster="<?php echo $this->getUrl("/assets/images/stanford_u.jpg", true) ?>" id="bgvid">
            <source src="<?php echo $this->getUrl("/stanford_drone.mp4", true) ?>" type="video/mp4">
        </video>
        <div class="col-sm-12 col-md-offset-1 col-md-5 home_announce">
            <div id="home_announce"></div>
        </div>

        <div class="col-sm-12 col-md-offset-1 col-md-4 info_text">
            <div id="info_text"></div>
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

    <div class="row col-sm-12 about">
        <h2 class="col-sm-12">About REDCap</h2>
        <div class="col-sm-12 col-md-3">
            <p>REDCap is a secure web platform for building and managing online databases and surveys. REDCap's streamlined process for rapidly creating and designing projects offers a vast array of tools that can be tailored to virtually any data collection strategy.</p>
        </div>
        <div class="col-sm-12 col-md-3">
            <p>REDCap provides automated export procedures for seamless data downloads to Excel and common statistical packages (SPSS, SAS, Stata, R), as well as a built-in project calendar, a scheduling module, ad hoc reporting tools, and advanced features, such as branching logic, file uploading, and calculated fields.</p>
        </div>
        <div class="col-sm-12 col-md-3">
            <p>Learn more about REDCap by watching a   brief summary video (4 min). If you would like to view other quick video tutorials of REDCap in action and an overview of its features, please see the Training Resources page.</p>
        </div>
        <div class="col-sm-12 col-md-3">
            <p>NOTICE: If you are collecting data for the purposes of human subjects research, review and approval of the project is required by your Institutional Review Board.
            <br/>If you require assistance or have any questions about REDCap, please contact redcap-help@lists.stanford.edu.</p>
        </div>
    </div>

    <div class="row col-sm-12 features">
        <h2 class="col-sm-12">REDCap Features</h2>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="build_surveys">
                <h5>Build online surveys and databases quickly and securely</h5>
                <p>Create and design your project rapidly using secure web authentication from your browser. No extra software is required.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="speed">
                <h5>Fast and flexible</h5>
                <p>Conception to production-level survey/database in less than one day.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="export_data">
                <h5>Export data to common data analysis packages</h5>
                <p>Export your data to Microsoft Excel, PDF, SAS, Stata, R, or SPSS for analysis.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="reporting">
                <h5>Ad Hoc Reporting</h5>
                <p>Create custom queries for generating reports to view or download.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="econsent">
                <h5>e-Consent</h5>
                <p>Perform informed consent electronically for participants via survey.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="contact_list">
                <h5>Easily manage a contact list of survey respondents or create a simple survey link</h5>
                <p>Build a list of email contacts, create custom email invitations, and track who responds, or you may also create a single survey link to email out or post on a website.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="scheduling">
                <h5>Scheduling</h5>
                <p>Utilize a built-in project calendar and scheduling module for organizing your events and appointments.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="mobile">
                <h5>REDCap Mobile App</h5>
                <p>Collect data offline using an app on a mobile device when there is no WiFi or cellular connection, and then later sync data back to the server.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="send_files">
                <h5>Send files to others securely</h5>
                <p>Using 'Send-It', upload and send files to multiple recipients, including existing project documents, that are too large for email attachments or that contain sensitive data.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="save_pdf">
                <h5>Save your data collection instruments as a PDF to print</h5>
                <p>Generate a PDF version of your forms and surveys for printing to collect data offline.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="advanced">
                <h5>Advanced features</h5>
                <p>Auto-validation, calculated fields, file uploading, branching/skip logic, and survey stop actions.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="api">
                <h5>REDCap API</h5>
                <p>Have external applications connect to REDCap remotely in a programmatic or automated fashion.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="data_queries">
                <h5>Data Queries</h5>
                <p>Document the process of resolving data issues using the Data Resolution Workflow module.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bullet">
            <div class="piping">
                <h5>Piping</h5>
                <p>Inject previously collected data values into question labels, survey invitation emails, etc. to provide a more customized experience.</p>
            </div>
        </div>
    </div>

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

    // GET THE CUSTOM HOME PAGE NOTIFICATION , MUST BE BEFORE THE #newPageContent MANIPULATIONS
    var info_text       = $("div.round").html();
    var home_announce   = $('#pagecontent > div:not([id])').html();
    $('#pagecontent > div:not([id])').remove();

    // do some rearranging of the furniture
    $('#pagecontent').unwrap().addClass("container");
    $('#pagecontent .row:first').remove();
    $('body, #pagecontent').css("opacity",1);

    $('#newPageContent').detach().appendTo($("#pagecontent"));
    $('#footer').detach().appendTo($("#pagecontent")).addClass("row").removeClass("col-md-12");

    var footer_content = $('#footer').html();
    $('#footer').empty();
    $("<div>").addClass("col-sm-12").html(footer_content).appendTo($("#footer"));

    // READD the HOME PAGE NOTIFICATIONS & INFOTEXT
    $("#home_announce").append(home_announce);
    setTimeout(function(){
        $("#home_announce").addClass("show");
    },1500)
    $("#info_text").append(info_text);

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

