<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The GIG at DST - Quote Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-maxlength.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/jquery.livequery.min.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
</head>
<body>
   <div class="fix-header">
      <div class="container">
      <div class="row">
          <div class="col-md-2 col-xs-4 gigLogo"><img src="img/logo.png" alt="The GIG at DST"></div>
          <div class="col-md-6 col-xs-8 col-md-offset-4"><ul>
           <li>call +44 (0) 20 7601 6270</li>
           <li>email: info@thegigatdst.com</li>
       </ul></div>
      </div>
       </div>
   </div>
    <div class="container" style="margin-top:50px; padding-top: 35px;">
        <div class="row">
            <div class="col-md-12"><p style="text-align: center;">Please fill out this form as accurately as possible, and your dedicated Account Manager will process this request.</p></div>
        </div>
               <ul id="myTab" class="nav nav-tabs" role="tablist">
  <li class="active disabled disabledTab"><a href="#step1" role="tab" data-toggle="tab" class="disabled">Step 1: Job type</a></li>
  <li class="disabled disabledTab"><a href="#step2" role="tab" data-toggle="tab" data-url="" class="disabled">Step 2: Job/Client details</a></li>
  <li class="disabled disabledTab"><a href="#step3" role="tab" data-toggle="tab" class="disabled">Step 3: Job specifics</a></li>
  <li class="disabled disabledTab"><a href="#step4" role="tab" data-toggle="tab" class="disabled">Step 4: Design and Assets</a></li>
  <li class="disabled disabledTab"><a href="#step5" role="tab" data-toggle="tab" class="disabled">Step 5: Design and Assets</a></li>
  <li class="disabled disabledTab"><a href="#step6" role="tab" data-toggle="tab" class="disabled">Step 6: Summary</a></li>
</ul>
                <div class="tab-content">
                <form role="form" id="proofForm" action="submit.php" method="post" enctype="multipart/form-data">
                <!-- Nav tabs -->
                <div class="tab-pane fade in active" id="step1">
            <div class="col-md-12">
            <h2>Step 1: Type of Job</h2>
            <hr />
  <div class="form-group">
    <label for="jobType">Job type</label>
    <select name="jobType" id="jobType" class="form-control">
        <option value="headsUpBrief">Heads up brief</option>
        <option value="creativeDevelopmentBrief">Creative brief</option>
        <option value="debrief">Debrief</option>
        <option value="copyBrief">Copy brief</option>
        <option value="designBrief">Design brief</option>
        <option value="amendmentBrief">Amendment brief</option>
        <option value="photoIllustrationBrief">Print artwork brief</option>
        <option value="htmlBrief">Creative Production HTML brief</option>
    </select>
  </div>
                   <a href="javascript:tabNext();" class="btn btn-default btnNext">Next</a>
                    </div></div>
    <div id="dynaContent"></div> 
</form>
        </div>
            </div>
</body>
</html>