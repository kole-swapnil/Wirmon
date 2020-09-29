<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Questions for Wirmon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include "common.php"?>

    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">

      <style>
        @media only screen and (max-width: 521px)
{
  #h_wirmon
  {

    margin-top: 2px !important;
    height: 50px !important;
    width: 150px !important;
  }

}
@media only screen and (max-width: 767px)
{
  #h_wirmon
  {
    margin-top: 2px !important;
    height: 50px !important;
    width: 150px !important;
  }
}

    </style>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="top">




<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png" id="h_wirmon" style="height:70px;width: 200px;margin-top:20px;"></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="about.php" >About</a></li>
              <li><a href="job-listings.php">Jobs</a> </li>
              <li class="has-children">
                <a data-toggle="collapse" data-target="#collapseItem0">Services</a>
                <ul class="dropdown">
                  <li><a href="services.php">Services</a></li>
                  <li><a href="portfolio.php">Portfolio</a></li>
                  <li><a href="faq.php">Frequently Ask Questions</a></li>
                </ul>
              </li>
              <li><a href="contact.php">Contact</a></li>
              <li class="d-lg-none"><a href="login.php"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.php">Log In</a></li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="login.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
              <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu" id = "navicon" style="height:130px;width:130px;"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_11.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Frequently Ask Questions</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>FAQ</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="accordion">
      <div class="container">

        <div class="row accordion justify-content-center block__76208">
          <div class="col-lg-6">
            <img src="images/sq_img_8.jpg" alt="Image" class="img-fluid rounded">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEleven" role="button" aria-expanded="false" aria-controls="collapseEleven">  What are the best video types used for video making & marketing<span class="icon"></span></a>
              </h3>
              <div id="collapseEleven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Video marketing helps you create a video for different purposes like branding and
promotions. Depending on the campaign type, you can make strategies. Video making
includes real-life video, info graphic video, animated video etc.

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseThirteen" role="button" aria-expanded="false" aria-controls="collapseThirteen"> What are social media marketing services?
<span class="icon"></span></a>
              </h3>
              <div id="collapseThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>The services provided by a company to increase your social media presence and drive
engagement/traffic organically through multiple social media platforms

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseFourteen" role="button" aria-expanded="false" aria-controls="collapseFourteen">Why is content marketing important?<span class="icon"></span></a>
              </h3>
              <div id="collapseFourteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Consumers come across anywhere from 3000 to 9,000 ads every day. This overabundance of
marketing messages has resulted in consumers sparing hardly any attention to most
advertisements. A good content marketing strategy can elevate your brand above all the noise and can fuel customer engagement, generate leads, and build trust.

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseTwelve" role="button" aria-expanded="false" aria-controls="collapseTwelve">Does Wirmon Provide guarantee of services?<span class="icon"></span></a>
              </h3>
              <div id="collapseTwelve" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>All our programs and services & product come with an unprecedented 100% guarantee.

</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="true" aria-controls="collapseFive"> Why do I need IT Services?<span class="icon"></span></a>
              </h3>
              <div id="collapseFive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Using IT services like Web Development, Digital Marketing, etc, you can reach an enormous
audience in a way that is both cost-effective and measurable. You can save money and reach
more customers for less money than traditional methods.</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="false" aria-controls="collapseSix"> Does wirmon provide after hour emergency support?<span class="icon"></span></a>
              </h3>
              <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Team of wirmon is always ready to give you emergency support for your project.

</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseSeven" role="button" aria-expanded="false" aria-controls="collapseSeven"> What are the qualifications required to do the course?<span class="icon"></span></a>
              </h3>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Any 12th passed student bachelor post graduate student from any stream those want to learn
new skill fresher wants to make their career you can apply here for the best internship
opportunity</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseEight">  How long should developers take to code a custom website?<span class="icon"></span></a>
              </h3>
              <div id="collapseEight" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Our data on how long our developers take to code websites is based on “custom theme
development” projects since it’s our main services.
While all our websites were built on WordPress,, the data is pretty representative for other
CMS solutions like Drupal or HubSpot.
Except for more advanced functionality that requires plugging or custom development, the
development work on these platforms is pretty similar with a combination of front-end
development and making sure the correct content is displayed from the CMS.
</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseNine" role="button" aria-expanded="false" aria-controls="collapseNine"> Does Choosing the best E-commerce metrics for the growth of business is use full?
<span class="icon"></span></a>
              </h3>
              <div id="collapseNine" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Selling online is more than merely producing a product and exchanging it for money. In order
to drive traffic to your ecommerce site, you need to know exactly how that traffic is
interacting with your ecommerce site. That’s where metrics come in.

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseTen" role="button" aria-expanded="false" aria-controls="collapseTen"> Does Wirmon provide job opportunity?<span class="icon"></span></a>
              </h3>
              <div id="collapseTen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Wirmon is free job portals where more than 1000 of job vacancies are registered find your
future job at wirmon with maximum package 100% secured job.

</p>
                </div>
              </div>
            </div>


            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseFifteen" role="button" aria-expanded="false" aria-controls="collapseFifteen">  Does Wirmon provide services for campus placements of college students?<span class="icon"></span></a>
              </h3>
              <div id="collapseFifteen" class="collapseFifteen" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Wirmon has a full range of IT services, Digital Service, Hr services, which is use full for
future career goals you can find a best recruiter here for the student campus placement.
</p>
                </div>
              </div>
            </div>

          </div>


        </div>

      </div>

      <button id = "xyz" style="margin:auto;text-align:center;display:grid;font-size: 18px;" onclick='change();'>Have more questions</button>
      <div class="container" style = "display:none" id="inc">

<div class="row accordion justify-content-center block__76208">
  <div class="col-lg-6">
  <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseEleven" role="button" aria-expanded="false" aria-controls="collapseEleven"> How do I create a product with you?
<span class="icon"></span></a>
      </h3>
      <div id="collapseEleven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>It is important to share your product idea, knowledge and detail of your project that you want
to update in your project with the development team which kind of product do you really
want.
</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseThirteen" role="button" aria-expanded="false" aria-controls="collapseThirteen"> How much time will it take for you to make my app?
<span class="icon"></span></a>
      </h3>
      <div id="collapseThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>According to the research on average, apps can take anywhere between three and nine
months to develop, depending on the complexity of the app and structure of your project. But
here is wirmon provide fast-forwards services for app development.


</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseFourteen" role="button" aria-expanded="false" aria-controls="collapseFourteen">  Does my website need to be mobile friendly?<span class="icon"></span></a>
      </h3>
      <div id="collapseFourteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Yes Wirmon helps you to make your website mobile friendly which kinds of tools you can
use for your website.


</p>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseEleven" role="button" aria-expanded="false" aria-controls="collapseEleven"> Are you open to go for App development on partnership basis?

<span class="icon"></span></a>
      </h3>
      <div id="collapseEleven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Yes, we are. We have a Professional partnership model for clients who want to grow in
business with us.
</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseThirteen" role="button" aria-expanded="false" aria-controls="collapseThirteen"> Do you also do marketing of mobile apps?
<span class="icon"></span></a>
      </h3>
      <div id="collapseThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Yes, we do. Marketing of mobile apps by using social media platform.


</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseFourteen" role="button" aria-expanded="false" aria-controls="collapseFourteen">  How do we communicate with the project or software development team?<span class="icon"></span></a>
      </h3>
      <div id="collapseFourteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>You can communicate with our development team via phone calls, video conferences, voice
conferences, chat, and direct email.



</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseEleven" role="button" aria-expanded="false" aria-controls="collapseEleven"> Does wirmon Provide Recruitment services?<span class="icon"></span></a>
      </h3>
      <div id="collapseEleven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Wirmon provide all kinds of recruitment services.
• Staffing services
• Talent Acquisition
• On-boarding
• Training & Development
• Campus placement
</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseThirteen" role="button" aria-expanded="false" aria-controls="collapseThirteen"> What is the mode of tranning ?
<span class="icon"></span></a>
      </h3>
      <div id="collapseThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Wirmon provide online tranning and certification course with live projects work. We offer
student an internship drive program for their effective learning

</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseFourteen" role="button" aria-expanded="false" aria-controls="collapseFourteen">   Why do you choose us?<span class="icon"></span></a>
      </h3>
      <div id="collapseFourteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>The perfect blend of mature processes, flexible delivery models, effective project
management, broad technology and domain expertise enable us to provide the best services.


</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseTwelve" role="button" aria-expanded="false" aria-controls="collapseTwelve">What do your Customers Want?<span class="icon"></span></a>
      </h3>
      <div id="collapseTwelve" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>High-standard customer service can win your clients’ hearts and make you recognizable
within your target group. Nowadays when social media play such an important role in
making decisions it’s crucial to keep an eye on the quality of customer service you provide. If
you don’t care about customers’ satisfaction, don’t expect them to care about your services or
products. That’s why wirmon provide 100% of customer satisfaction to their customer for
achievements of their long term goal.

</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5 ml-auto">
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="true" aria-controls="collapseFive"> What kind of services response can I expect?<span class="icon"></span></a>
      </h3>
      <div id="collapseFive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Service response Customer expectation encompasses everything that a customer expects from
a product, service or organization. Customer expectations are created in the minds of
customers based upon their individual experiences and what they have learned, combined
with their pre-existing experience and knowledge.</p>
        </div>
      </div>
    </div> <!-- .accordion-item -->

    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="false" aria-controls="collapseSix"> We are worried about quality; how do you assure solid projects?<span class="icon"></span></a>
      </h3>
      <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Quality is the totality of features and characteristics of a product or a service that bears on its
ability to satisfy stated or implied customer needs. Our purpose is to formulate a Quality
Assurance plan template which is a highly efficient tool to assure quality in a project and
surveil problems and drawbacks that may come up during the project execution process. The
team has a plan to do the rest of the Quality Assurance activities, such as Audit and Analysis.
Wirmon giving 100% quality assurance for projects.

</p>
        </div>
      </div>
    </div> <!-- .accordion-item -->

    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseSeven" role="button" aria-expanded="false" aria-controls="collapseSeven"> Do you offer any discounts?  <span class="icon"></span></a>
      </h3>
      <div id="collapseSeven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Wirmon offers discount to their customers with quality assurance. </p>
        </div>
      </div>
    </div> <!-- .accordion-item -->

    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseEight"> Do you provide technical support and maintenance?<span class="icon"></span></a>
      </h3>
      <div id="collapseEight" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Yes we provide technical support and application maintenance services on request. Our tech
support experts assist their clients through different channels such as online support. Basic
inquiries can be responded using the telephone, SMS, or through the website.
</p>
        </div>
      </div>
    </div> <!-- .accordion-item -->
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseNine" role="button" aria-expanded="false" aria-controls="collapseNine"> Would you replace my developer if i am not satisfied with the performance?<span class="icon"></span></a>
      </h3>
      <div id="collapseNine" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>We will certainly replace your developer if we see that there really is a shortcoming on
the developer's end.

</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseTen" role="button" aria-expanded="false" aria-controls="collapseTen"> Can I assure myself that all my business secrets and information safe with your
company?<span class="icon"></span></a>
      </h3>
      <div id="collapseTen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>Yes you can assure yourself that all information is kept confidential with the company.
Wirmon will NOT use this information other than for direct communication between you and
the company
</p>
        </div>
      </div>
    </div>


    <div class="accordion-item">
      <h3 class="mb-0 heading">
        <a class="btn-block h4" data-toggle="collapse" href="#collapseFifteen" role="button" aria-expanded="false" aria-controls="collapseFifteen"> Which Framework or programming languages would you use to develop a mobile app?<span class="icon"></span></a>
      </h3>
      <div id="collapseFifteen" class="collapseFifteen" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="body-text">
          <p>The framework or programming language that we use to develop applications depend upon
the chosen platform by the client.
</p>
        </div>
      </div>
    </div>

  </div>


</div>

</div>
    </section>

    <section class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Happy Candidates Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Elisabeth Smith</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Chris Peter</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

  <?php include_once 'footer.php'; ?>
  </div>

    <!-- SCRIPTS -->
    <script>
    var i = true;
    function change(){
      if(i==true)
      {document.getElementById('inc').style.display = 'block';
      i = false;
      }
      else{
        document.getElementById('inc').style.display = 'none';
      i = true;
      }
    }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>


    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/custom.js"></script>



  </body>
</html>
