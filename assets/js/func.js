
function user_register(stud_id, stud_fname) {
    $('body').ajaxMask();

    regStats = 0;
    regCt = -1;
    try {
        timer_register.stop();
    } catch (err) {
        console.log('Registration timer has been init');
    }

    var limit = 4;
    var ct = 1;
    var timeout = 5000;

    timer_register = $.timer(timeout, function() {
        console.log("'" + stud_fname + "' registration checking...");
        user_checkregister(stud_id, $("#user_finger_" + stud_id).html());
        if (ct >= limit || regStats == 1) {
            timer_register.stop();
            console.log("'" + stud_fname + "' registration checking end");
            if (ct >= limit && regStats == 0) {
                alert("'" + stud_fname + "' registration fail!");
                $('body').ajaxMask({
                    stop: true
                });
            }
            if (regStats == 1) {
                $("#user_finger_" + stud_id).html(regCt);
                alert("'" + stud_fname + "' registration success!");
                $('body').ajaxMask({
                    stop: true
                });
                load('user.php?action=index');
            }
        }
        ct++;
    });
}

function user_checkregister(stud_id, current) {
    $.ajax({
        url: "user.php?action=checkreg&stud_id=" + stud_id + "&current=" + current,
        type: "GET",
        success: function(data) {
            try {
                var res = jQuery.parseJSON(data);
                if (res.result) {
                    regStats = 1;
                    $.each(res, function(key, value) {
                        if (key == 'current') {
                            regCt = value;
                        }
                    });
                }
            } catch (err) {
                alert(err.message);
            }
        }
    });
}

function login_selectuser() {
    $("#button_login").attr("href", "finspot:FingerspotVer;" + $('#select_scan').val())
}
