
function sendInquiryData() {
    var course = $('#course').val();
    var mobile = $('#contact').val();
    var email = $('#email').val();
    var fullname = $('#fullname').val(); 
    var message = $('#message').val();

    $('#inquire_form').waitMe({
        effect : 'win8_linear',
        text : 'Sending...',
        bg : 'rgba(255,255,255,0.7)',
        color : '#000'
    });
    $.ajax({
        url: "https://docs.google.com/a/alprograms.com/forms/d/e/1FAIpQLSc9V0sIvYFOfE-FqnqhAItC_9e8yxu9-YkroN8328bHnZ3PLw/formResponse",
        data: {
                    "entry.2015075291" : email,
                    "entry.907115316" : mobile,
                    "entry.497964331" : fullname,
                    "entry.2084726495" : course,
                    "entry.1792810504" : message,

                },
        type: "POST",
        dataType: "xml",
        statusCode: {
            0: function() {
                finished('#inquire_form');
            },
            200: function() {
                finished('#inquire_form');
            }
        }
    });

}
function finished(form) {
    $('#success_message').show();
    $(form)[0].reset();
    $(form).validator('update');
    $(form).waitMe('hide');
    grecaptcha.reset();
}

function sendRegistrationData(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var mobile = $('#mobile').val();
    var telephone = $('#telephone').val();
    var cname = $('#cname').val();
    var job = $('#job').val();
    var caddress = $('#caddress').val();
    var email = $('#email').val();
    var date = $( "#date option:selected" ).text();
    var course = $('#course').val();
    var mode = $("input[name='optradio']:checked", "#registration_form").val();
    var address = $('#address').val();

    $('#registration_form').waitMe({
        effect : 'win8_linear',
        text : 'Sending...',
        bg : 'rgba(255,255,255,0.7)',
        color : '#000'
    });
    $.ajax({
        url: "https://docs.google.com/a/alprograms.com/forms/d/e/1FAIpQLSez7TQhXpligB-AY-guuvrFvzG1s5blIoltH-cPBi6UlwD8rQ/formResponse",
        data: {
                    "entry.838464878" : email,
                    "entry.136204944" : lname,
                    "entry.876955015" : fname,
                    "entry.771449290" : mobile,
                    "entry.1790732820" : telephone,
                    "entry.1450934053" : address,
                    "entry.729581753" : cname,
                    "entry.363357640" : job,
                    "entry.466991003" : caddress,
                    "entry.1769791715" : mode,
                    "entry.558593701" : date,
                    "entry.325424940" : course,
                },
        type: "POST",
        dataType: "xml",
        statusCode: { 
            0: function() {
                finished('#registration_form');
            },
            200: function() {
                finished('#registration_form');
            }
        }
    });
 
}

function sendContactData() {
    var fullname=$('#fullname').val();
    var contact=$('#contact').val();
    var email=$('#email').val();
    var message=$('#message').val();
    $('#contact_form').waitMe({
        effect : 'win8_linear',
        text : 'Sending...',
        bg : 'rgba(255,255,255,0.7)',
        color : '#000'
    });
    $.ajax({
        url:"https://docs.google.com/a/alprograms.com/forms/d/e/1FAIpQLSeWepPNs84BapOChYt0DEAM1p3TzCnaFAUytpHUxAF5emQlmA/formResponse",
        data:{"entry_1582939635":fullname,"entry_553551918":contact,"entry_183305459":email,"entry_524141743":message},
        type:"POST",
        dataType:"xml",
        statusCode: {
            0:function() {
                finished('#contact_form');
            },
            200:function(){
                finished('#contact_form');
            }
        }
    });
}