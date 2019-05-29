<style>
.navbar-nav li i,
nav.navbar .ml-auto li:last-child,
nav.navbar .ml-auto li.loggedInUsername,
.message-center-container,
body > div:not(#pagecontainer){
    display:none !important;
}
#pagecontent{
    opacity:0;
}
</style>
<script>
$(document).ready( function() {
    // first disable all the css baggage from redcap
    $('link').prop("disabled", true);

    // next pop the nav bar right out
    $('nav.navbar').detach().insertBefore("#pagecontent").attr("id","fixed_nav");
    $('nav.navbar button.collapsed').addClass("hidden-md").addClass("hidden-lg");
    $('.nav.navbar-nav.ml-auto').unwrap();
    $('.navbar-brand img').attr("src","http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/redcap_logo.png");

    // do some rearranging of the furniture
    $('#pagecontent').unwrap().addClass("container");
    $('#pagecontent .row:first').remove();
    $('#pagecontent').css("opacity",1);

    $('#newPageContent').detach().appendTo($("#pagecontent"));
    $('#footer').detach().appendTo($("#pagecontent")).addClass("row").removeClass("col-md-12");

    var footer_content = $('#footer').html();
    $('#footer').empty();
    $("<div>").addClass("col-sm-12").html(footer_content).appendTo($("#footer"));

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
<style>
html,* {
    font-family: "Open Sans", "Montserrat", "Helvetica Neue", Helvetica, sans-serif !important;
}

/* LETS HIJACK SOME OF THE DEFAULT Mini.css STYLES */

body,
.container{
    margin:0;
    padding:0;
    color:#333;
}
body {
    background:url('http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/hoover_tower.jpg') no-repeat;
    background-attachment: fixed;
    background-position: 31% 9%;
}
/* NAV STUFF */
#fixed_nav {
    position:fixed;
    margin:initial;
    width:100%;
    min-height:57px;
    z-index:100;
    padding:10px !important;
    border:none !important;
    background-color:transparent !important;
}
#fixed_nav.scrolling{
    background-color: #fff !important;
}

.navbar-brand {
    float:left;
    display:inline-block;
    padding:0 !important;
}

.navbar-brand img{
    padding:0 !important;
    margin:0 !important;
}

#fixed_nav a:hover{
    background-color:initial;
}
#fixed_nav a{
    font-size:77%;
    text-transform:uppercase;
    color:#fff !important;
    padding:8px 10px !important;
    opacity:.75;
    transition: opacity .20s;
}
#fixed_nav a:hover{
    opacity:1;
}
#fixed_nav.scrolling a{
    color:#333 !important;
}

#fixed_nav li,
#fixed_nav ul{
    display:inline-block;
    margin:0; padding:0;
}
#fixed_nav ul {
    float:left;
    margin:15px 15px 0 50px;
}
#fixed_nav ul.ml-auto{
    float:right;
    margin:15px 30px 0 0;
}
#fixed_nav li {
    margin-left:10px;
}
#fixed_nav li b,
#fixed_nav li span{
    padding:0 3px !important;
    margin:0 3px !important;
    text-transform:capitalize;
}
#fixed_nav li i {
    display:none;
}

/* FOOTER STUFF*/
#footer{
    color:#777;
    background-color:#212121;
    text-align:center;
    padding:15px 0;
}
#footer a:link{
    color:#777;
}

/*page sections*/
#newPageContent > .row:not(.splash){
    background:#fff;
    min-height:20vh;
    padding:40px 0;
}
#newPageContent h2{
    text-align:Center;
    margin-bottom:40px;
    text-transform:uppercase;
}

#bgvid {
    position: absolute;
    left: 0; top: 0;
    min-width: 100%; min-height: 100%;
    width: auto; height: auto;
    z-index: -100;
    background: url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/stanford_u.jpg) no-repeat;
    background-size: cover;
}
#newPageContent .splash:before{
    content:"";
    width:2000px;
    height:2000px;
    background: #333;
    opacity:.5;
    position:absolute;
    top:0;
    left:0;
    z-index:-99;
}
#newPageContent .splash {
    min-height:670px;
    position: relative;
    background:transparent;
    overflow:hidden;
    text-transform: uppercase;
}
.splash h1{
    margin-top:300px;
    font-size:300%;
    color:#fff;
}
.splash p{
    color:#fff;
}
.splash a.button{
    padding-left: 30px;
    padding-right:30px;
}

.about p{
    padding:20px;
}

.team fig{
    display:block;
    margin:0 0 40px;
    width:100%; height:25vh;
    text-align: center;
    cursor:pointer;
    position:relative;
}
.team fig > div{
    position:absolute;
    top:0; left:0;
    width:calc(100% - 40px);
    min-height:calc(20vh - 40px);
    text-align:left;
    opacity:0;
    padding:20px 20px;
    transition: opacity .4s;
    z-index:0;
    font-size:85%
}
.team fig:hover > div {
    opacity:1;
    color:#fff;
}
.team fig:hover > div:after {
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    margin:0 auto;
    top:0%; left:0;
    background:#333;
    opacity:.8;
    z-index:-1;
    border-radius:5px;
}
.team figure{
    display:block;
    width:100%;
    height:100%;
    max-width:20vh;
    max-height:20vh;
    margin:0 auto;
    border-radius:5px;
s}
.team figcaption{
    margin-top:5px;
    font-size:120%;
}
.team figcaption b{
    display:block;
}
.team .andy_martin figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_1558658034.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}
.team .alvaro_alvarez figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_1308928044.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}
.team .jae_lee figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_2.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}
.team .jordan_schultz figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_10.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}
.team .irvin_szeto figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_368513347.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}
.team .ryan_valentine figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_6247144.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}
.team .leeann_yasukawa figure{
    background:url('http://med.stanford.edu/researchit/about-us/our-teams/_jcr_content/main/panel_builder_316262/panel_0/panel_builder_895065504/panel_0/text_image_13.img.full.high.jpg') 50% no-repeat;
    background-size:contain;
}


#newPageContent .row.training {
    background-color:transparent;
    position:relative;
    z-index:0;
}
#newPageContent .row.training h2{
    color:#ccc;
}
#newPageContent .row.training:after{
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    top:0; left:0;
    background:#000;
    opacity:.65;
    z-index:-1;
}
#newPageContent .row.features{
    background-color:#f8f8f8;
}
#newPageContent .row.stats{
    background-color:#3f474f;
}
#newPageContent .row.contact {
    background-color:#000;
}

#newPageContent .row.features{
    min-height:50vh;
}
.stats h2,
.contact h2{
    color:#ececec;
}

.stats div  {
    text-align:center;
}
.stats h3,
.stats span{
    display:block;
    text-align:center;
    color:#ececec;
    font-size:300%;
}
.stats h3{
    margin:0; padding:0;
    font-size:100%;
}


#newPageContent .training .row {
    padding:0;
    background-color:transparent;
}
.resources{
    width:auto;
    height:20vh;
    max-height:25vh;
    max-width:25vh;
    margin:10px;
    background:#efefef;
    border:1px solid #ccc;
    border-radius:5px;
    position:relative;
    cursor:pointer;
    text-align:center;
}
.resources a {
    opacity:0;
    text-decoration: none;
}
.resources:hover a{
    position:absolute;
    top:0;
    left:0;
    width:auto;
    height:20vh;
    max-height:25vh;
    max-width:25vh;

    opacity:1;
    transition:opacity .4s;
    z-index:0;

    padding:15px;
    color:#fff;
    text-align:left;
}
.resources:hover a:after{
    content:"";
    position:absolute;
    top:0; left:0;
    width:100%;
    height:calc(100% - 30px);
    background:#333;
    opacity:.8;
    border-radius:5px;
    z-index:-1;
}

h3.icon{
    position: relative;
    margin-top: 50%;
    padding-top: 35%;
    top: -35%;
}
.icon.wiki{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_wiki.png) 50% 30% no-repeat;
    background-size:30%;
}
.icon.faq{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_faq.png) 50% 10% no-repeat;
    background-size:30%;
}
.icon.videos{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_videos.png) 50% 30% no-repeat;
    background-size:30%;
}
.icon.hours{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_hours.png) 50% 20% no-repeat;
    background-size:30%;
}
.icon.training{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_training.png) 50% 30% no-repeat;
    background-size:30%;
}
.icon.email{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_email.png) 50% 40% no-repeat;
    background-size:30%;
}
.icon.pro_services{
    background:url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_pro_services.png) 50% -30% no-repeat;
    background-size:25%;
}

#newPageContent .contact h2{
    color:#333;
    text-align:left;
    margin-bottom:20px;
}
#newPageContent .row.contact{
    padding:0;
}
.contact .inputform{
    background:#fff;
    padding:80px 40px;
}
.contact form{
    margin:0 auto;
    background:none;
    border:none;
}
.contact form p{
    margin-bottom:20px;
}
.contact form .input-group{
    margin-bottom:20px;
}
.contact form label{
    margin-bottom:3px;
}
.contact form input,
.contact form textarea{
    padding:5px 10px;
    border-radius:5px;
}
.contact form textarea{
    min-height:10vh;
}
.contact form button{
    padding:5px 10px;
    border-radius:5px;
    float:right;
}

.features .bullet div p,
.features .bullet div h5{
    font-size:80% !important;
}
.features .bullet div{
    background:#ececec;
    margin:0 20px 20px 10px;
    padding:20px;
    padding-left:120px;
    text-align:left;
    position:relative;
    border-radius:100px 5px 5px 100px;
    min-height: calc(106px - 40px);
}
.features .bullet:nth-of-type(odd) div{
    padding-left:20px;
    padding-right:120px;
    margin-right:10px;
    margin-left:20px;
    border-radius:5px 100px 100px 5px;
}

.features .bullet div:after{
    content:"";
    position:absolute;
    top:0; left:0;
    width:100px;
    height:100px;
    border:3px solid #1B5E54;
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_faq.png) 50% no-repeat;
    background-size:55%;
    border-radius:100px;
}
.features .bullet:nth-of-type(odd) div:after{
    right:0;
    left:initial;
    border:3px solid #E8AA27;
}
.features .bullet div.build_surveys:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_survey.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.speed:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_speed.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.export_data:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_export.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.reporting:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_data.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.econsent:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_econsent.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.contact_list:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_contacts.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.scheduling:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_scheduling.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.mobile:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_mobile.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.send_files:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_send_files.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.save_pdf:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_printer.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.advanced:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_advanced.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.api:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_api.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.data_queries:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_faq.png) 50% no-repeat;
    background-size:55%;
}
.features .bullet div.piping:after{
    background:#fff url(http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/icon_piping.png) 50% no-repeat;
    background-size:20%;
}
</style>
<div id="newPageContent" class="row">
    <div class="row col-sm-12 splash">
        <video autoplay muted loop poster="http://localhost/redcap/modules-local/redcap_home_v9.9.9/assets/images/stanford_u.jpg" id="bgvid">
            <source src="http://localhost/redcap/modules-local/redcap_home_v9.9.9/stanford_drone.mp4" type="video/mp4">
        </video>
        <div class="col-sm-12 col-md-offset-2 col-md-5">
            <h1>Welcome to <br>REDCap @Stanford</h1>
            <p>Redcap Office Hours</p>
            <a href="#" class="button">Sign-Up Here</a>
        </div>
    </div>

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

    <div class="row col-sm-12 training">
        <h2 class="col-sm-12">Training & Resources</h2>
        <div class="col-sm-10 col-sm-offset-1 row">
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

