window.onload = function() {

    var jobType = sessionStorage.getItem(jobType);
    var client = sessionStorage.getItem(client);
    var jobNumber = sessionStorage.getItem(jobNumber);
    var projectName = sessionStorage.getItem(projectName);
    var reviewDate = sessionStorage.getItem(projectName);
    var liveDate = sessionStorage.getItem(liveDate);
    var productionBudget = sessionStorage.getItem(productionBudget);
    
    $('select').selectpicker("refresh");
    if (jobType !== null) $('#jobType').val(jobType);
    if (client !== null) $('button[data-id="client"]').attr("title", client);
    if (jobNumber !== null) $('#jobno').val(jobNumber);
    if (projectName !== null) $('#projectName').val(projectName);
    if (reviewDate !== null) $('#reviewDate').val(reviewDate);
    if (liveDate !== null) $('#jobno').val(liveDate);
    if (productionBudget !== null) $('#jobno').val(productionBudget);
}

$(document).ready(function(){
     
    
    $('#myTab li:eq(' + location.hash.substring(1) + ') a').tab('show');
    
    // CUSTOM SELECT BOX
    $('select').selectpicker();
    
    
    $('#myTab a').click(function (e) {
      if ($(this).hasClass("disabled")) {
        e.preventDefault();
        return false;
      }
    });
    
    /* NEXT AND PREVIOUS BUTTONS FUNCTIONS */
    myTabs = $('#myTab li').length;
    myTabsActive = 0; //or yours active tab
    tabNext = function() {
        var index = myTabsActive + 1;
        index = index >= myTabs ? 0 : index;

        $('#myTab li:eq(' + index + ') a').tab('show');
        myTabsActive = index;
        location.hash = index;
    }

    tabPrev = function() {
        var index = myTabsActive - 1;
        index = index < 0 ? myTabs - 1 : index;
        $('#myTab li:eq(' + index + ') a').tab('show');
        myTabsActive = index;
        location.hash = index;
    }

    
    $('#myTab a').click(function (e) {
	e.preventDefault();
  
	var url = "/brief/forms/" + $("#jobType").val() + ".html";
  	var href = this.hash;
  	var pane = $(this);
	
	// ajax load from data-url
	$(href).load(url,function(result){      
	    pane.tab('show');
	});
});
    
    /* DATEPICKER FUNCTION */
    $('.datepick').datepicker({
    format: "dd/mm/yyyy",
    daysOfWeekDisabled: "0,6",
    autoclose: true,
    todayHighlight: true
    });
    
    $('i[data-toggle="popover"]').popover();
    
    /* STEP 3 - WORK TYPE SWITCHER */
    $('button[data-id="workType"]').on('DOMSubtreeModified propertychange', function() {
        if($(this).attr("title") === "Email"){
                $("#workSpecifics").text("This email...");
                $("#workType1").attr("name", "animation");
                $("#workType1").val("Contains Animation");
                $("#workType1Label").text("Contains animation");
                $("#workType2").attr("name", "responsiveLayout");
                $("#workType2").val("Responsive Layout");
                $("#workType2Label").text("Is a responsive layout");
                $("#workType3").attr("name", "dynamicContent");
                $("#workType3").val("Dynamic Content");
                $("#workType3Label").text("Contains dynamic data");
                $("#workType4").attr("name", "lotusNotes");
                $("#workType4").val("Lotus Notes Compatible");
                $("#workType4Label").html("Needs to be &lt; Lotus Notes 6 compatible");
            }
            if($(this).attr("title") === "Landing Page"){
                $("#workSpecifics").text("This landing page...");
                $("#workType1").attr("name", "responsiveLayout");
                $("#workType1").val("Responsive Layout");
                $("#workType1Label").text("Is a responsive layout");
                $("#workType2").attr("name", "interactiveElements");
                $("#workType2").val("Interactive Elements");
                $("#workType2Label").text("Contains interactive elements");
                $("#workType3").attr("name", "outdatedBrowsers");
                $("#workType3").val("Outdated Browsers");
                $("#workType3Label").html("Needs to support outdated browsers <i id='popover' class='fa fa-info-circle' data-toggle='popover' data-content='Internet Explorer 7 and below is classed as outdated.'></i>");
                $("#workType4").attr("name", "cookieAlert");
                $("#workType4").val("Cookie Alert");
                $("#workType4Label").text("Requires a cookie alert");
            }
            if($(this).attr("title") === "Microsite"){
                $("#workSpecifics").text("This microsite...");
                $("#workType1").attr("name", "responsiveLayout");
                $("#workType1").val("Responsive Layout");
                $("#workType1Label").text("Is a responsive layout");
                $("#workType2").attr("name", "interactiveElements");
                $("#workType2").val("Interactive Elements");
                $("#workType2Label").text("Contains interactive elements");
                $("#workType3").attr("name", "outdatedBrowsers");
                $("#workType3").val("Outdated Browsers");
                $("#workType3Label").text("Needs to support outdated browsers");
                $("#workType4").attr("name", "cookieAlert");
                $("#workType4").val("Cookie Alert");
                $("#workType4Label").text("Requires a cookie alert");
            }
    });
    
    $('input.limited').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger"
    });
    

//    $("#proofForm").validate({
//    
//        // Specify the validation rules
//        rules: {
//            customer: "required",
//            company: "required",
//            telephone: "required",
//            email: {
//                required: true,
//                email: true
//            },
//            brief: "required"
//        },
//        
//        // Specify the validation error messages
//        messages: {
//            customer: "Please enter your name",
//            company: "Please enter your company name",
//            telephone: "Please enter your telephone number",
//            email: "Please enter a valid email address",
//            brief: "Please give us details on what you require"
//        }
//        
//    });
    
    $('#proofForm').livequery(function() {
        $("#jobTypeSummary").html($('button[data-id="workType"]').attr("title"));
        $("#clientSummary").html($('button[data-id="client"]').attr("title"));
        $("#jobnoSummary").html($('#jobno').val());
});

    
});

window.onbeforeunload = function() {
    sessionStorage.setItem(jobType,  $('button[data-id="workType"]').attr("title"));
    sessionStorage.setItem(client, $('button[data-id="client"]').attr("title"));
    sessionStorage.setItem(jobNumber, $('#jobno').val());
    sessionStorage.setItem(projectName, $('#projectName').val());
    sessionStorage.setItem(reviewDate, $('#reviewDate').val());
    sessionStorage.setItem(liveDate, $('#liveDate').val());
    sessionStorage.setItem(productionBudget, $('#productionBudget').val());
}