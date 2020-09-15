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
                <a>Services</a>
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
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="true" aria-controls="collapseFive">What is Onsite Recruitment?<span class="icon"></span></a>
              </h3>
              <div id="collapseFive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Onsite recruitment is a service where a recruitment agency effectively becomes part of an organisation, taking care of all aspects of recruitment for that business. It means that services can be tailored exactly to the needs of the business and the workforce, establishing an efficient working partnership. The recruitment agency effectively becomes an extension of the workforce, working to improve the hiring process, reducing risk and cost per hire whilst aiding retention and staff management.</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="false" aria-controls="collapseSix"> What is payroll Service and advantages of it?<span class="icon"></span></a>
              </h3>
              <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Payroll is a list of employees who get paid by the company. Payroll also refers to the total
amount of money employer pays to the employees. As a business function, it involves:
• Developing organization pay policy including flexible benefits, leave encashment
policy, etc.
• Defining payslip components like basic, variable pay, HRA, and LTA
• Gathering other payroll inputs (e.g., organization’s food vendor may supply
information about the amount to be recovered from the employees for meals
consumed)
• The actual calculation of gross salary, statutory as well as non-statutory deductions,
and arriving at the net pay
• Releasing employee salary
• Depositing dues like TDS, PF, etc. with appropriate authorities and filing returns
</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseSeven" role="button" aria-expanded="false" aria-controls="collapseSeven"> What is On boarding Services?  <span class="icon"></span></a>
              </h3>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>When a client has a long-term need, direct hire is ideal. Direct hire positions are permanent,
usually full-time positions with benefits. A staffing agency is involved during the recruitment
and hiring process, but after an offer is accepted, the candidate goes directly on the client’s
payroll.
The process for direct hire can be a little slower because clients want to take their time when
making a long-term decision. It is ideal for candidates who are not as comfortable taking the
risk of working contract. Direct hire employees are eligible for company benefits such as
health, retirement, and PTO, and have the security of a long-term, permanent position.</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseEight"> What are the staffing services provided by WIRMON?<span class="icon"></span></a>
              </h3>
              <div id="collapseEight" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Hiring the right candidate is one of the biggest challenge of a staffing agency. If you are
looking to recruit skilled employees for your organization, contact Wirmon HR today. We
can help you with contractual as well as permanent staffing services. Wirmon’s expertise in
providing staffing solutions enables you to focus your energies on your core business
activities and spend less time on filling the contractual roles and administering the HR
processes for the contract employees.
</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseNine"> What Is Talent Acquisition?<span class="icon"></span></a>
              </h3>
              <div id="collapseNine" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Talent acquisition refers to the process of identifying and acquiring skilled workers to meet
your organizational needs. The talent acquisition team is responsible for identifying,
acquiring, assessing, and hiring candidates to fill open positions within a company. Employer
branding, future resource planning, diversifying a company’s labour force, and developing a
robust candidate pipeline are the cornerstones of talent acquisition.
In some cases, the talent acquisition team is part of an organization’s Human Resources
department. In others, Talent Acquisition is its own department that works in coordination
with HR. The skill sets of effective talent acquisition professionals include sourcing
strategies, candidate assessment, compliance and hiring standards, and fluency in
employment branding practices and corporate hiring initiatives.
</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseTen"> What if I want to changes to be made in the app once it is launched or delivered?<span class="icon"></span></a>
              </h3>
              <div id="collapseTen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>If you want the changes to be made in the app,It will cost you. We recommend having the
project scope defined before beginning the project to save time and money.
</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseEleven">  What is your project development methodology?<span class="icon"></span></a>
              </h3>
              <div id="collapseEleven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Every web or mobile app development project is unique and requires a fresh approach, but
most projects pass through some of the most command project development steps-i.e.
Requirement gathering, Some of the most command project development steps-i.e. Requirement gathering, Analysis, Solution consulting, wireframe/prototyping,
UI design, development and testing .However, depending on the scope and type of the
software development project, the sequence and
Selection of steps may vary.
</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseTwelve"> Do you work according to client's Time zone?<span class="icon"></span></a>
              </h3>
              <div id="collapseTwelve" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>All of our development team works out of our Headquarter-Bangalore, India. However,
depending on the nature of the work,
Specific situation and in case of special meetings, we can certainly stay awake to ensure we
connect during your working hours,
However, we’d prefer having this be scheduled prior to the event so that we can plan our rest
of the schedules accordingly.

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseThirteen"> What are the advantages of digital marketing services?
<span class="icon"></span></a>
              </h3>
              <div id="collapseThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Digital marketing services help you increase brand awareness, brand loyalty and drive sales
for your business.
The main advantage of Digital Marketing is that it helps you measure success, performance
and results of all the activities across all platforms in a very cost-effective way

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseFourteen">  Do you provide placement assistance?<span class="icon"></span></a>
              </h3>
              <div id="collapseFourteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>We provide placement assistance opportunity after the completion of internship duration of
intern it will depend on the intern performance how the intern has performed. They could get
placement assistance for their future job.

</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseFifteen"> Which Framework or programming languages would you use to develop a mobile
app?<span class="icon"></span></a>
              </h3>
              <div id="collapseEight" class="collapseFifteen" aria-labelledby="headingOne" data-parent="#accordion">
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
