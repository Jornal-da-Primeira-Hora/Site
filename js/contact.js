var $content = document.querySelector('body div#content');
var $msgAlertName = document.querySelector('body div#content div#name h4');
var $msgAlertPhone = document.querySelector('body div#content div#phone h4');
var $msgAlertYear = document.querySelector('body div#content div#year h4');
var $msgAlertMsg = document.querySelector('body div#content div#msg h4');
var $txbName = document.getElementById('txbName');
var $txbPhone = document.getElementById('txbPhone');
var $rbYes = document.getElementById('rbYes');
var $rbNo = document.getElementById('rbNo');
var $txbMsg = document.getElementById('txbMsg');
var $btnSend = document.getElementById('btnSend');
var tmpHref = '';
var tmp = '';
$txbName.addEventListener('keydown', function (key) {
    if (key.key == 'Enter') {
        if ($txbPhone.value.trim().length == 0) {
            $txbPhone.focus();
        }
        else {
            if (!$rbYes.checked && !$rbNo.checked) {
                $rbYes.focus();
                return;
            }
            if ($txbMsg.value.trim().length == 0) {
                $txbMsg.focus();
                return;
            }
            btnSend_Click();
        }
    }
});
$txbPhone.addEventListener('keydown', function (key) {
    if (key.key == 'Enter') {
        if (!$rbYes.checked && !$rbNo.checked) {
            $rbYes.focus();
        }
        else {
            if ($txbMsg.value.trim().length == 0) {
                $txbMsg.focus();
                return;
            }
            btnSend_Click();
        }
    }
});
$rbYes.addEventListener('keydown', function (key) {
    if (key.key == 'Enter') {
        if ($txbMsg.value.trim().length == 0) {
            $txbMsg.focus();
            return;
        }
        btnSend_Click();
    }
});
$rbNo.addEventListener('keydown', function (key) {
    if (key.key == 'Enter') {
        if ($txbMsg.value.trim().length == 0) {
            $txbMsg.focus();
            return;
        }
        btnSend_Click();
    }
});
$btnSend.addEventListener('click', btnSend_Click);
function btnSend_Click() {
    tmpHref = '';
    if ($txbName.value.trim().length == 0) {
        $msgAlertName.style.display = 'block';
        tmpHref = 'body div#content div#name';
        document.getElementById('name').style.border = '1px solid rgb(240, 20, 20)';
    }
    else {
        $msgAlertName.style.display = 'none';
        document.getElementById('name').style.border = '1px solid #d7d7d7';
    }
    if ($txbPhone.value.trim().length == 0) {
        $msgAlertPhone.style.display = 'block';
        if (tmpHref == '') {
            tmpHref = 'body div#content div#phone';
        }
        document.getElementById('phone').style.border = '1px solid rgb(240, 20, 20)';
    }
    else {
        $msgAlertPhone.style.display = 'none';
        document.getElementById('phone').style.border = '1px solid #d7d7d7';
    }
    if ($rbYes.checked == false && $rbNo.checked == false) {
        $msgAlertYear.style.display = 'block';
        if (tmpHref == '') {
            // tmpHref = 'body div#content div#year'
            tmpHref = 'body div#content div#phone';
        }
        document.getElementById('year').style.border = '1px solid rgb(240, 20, 20)';
    }
    else {
        $msgAlertYear.style.display = 'none';
        document.getElementById('year').style.border = '1px solid #d7d7d7';
    }
    if ($txbMsg.value.trim().length == 0) {
        $msgAlertMsg.style.opacity = '1';
        if (tmpHref == '') {
            // tmpHref = 'body div#content div#msg'
            tmpHref = 'body div#content div#phone';
        }
        document.querySelector('div#content div#msg').style.border = '1px solid rgb(240, 20, 20)';
    }
    else {
        $msgAlertMsg.style.opacity = '0';
        document.querySelector('div#content div#msg').style.border = '1px solid #d7d7d7';
    }
    tmp = $rbYes.checked != false || $rbNo.checked != false;
    if ($txbName.value.trim().length != 0 && $txbPhone.value.trim().length != 0 && tmp && $txbMsg.value.trim().length != 0) {
        sendMessage($txbName.value, $txbPhone.value, $rbYes.checked, $txbMsg.value);
    }
    if (tmpHref.trim().length != 0) {
        tmp = document.querySelector(tmpHref).offsetTop + content.offsetTop - 30;
    }
    smoothScrollTo(0, tmp, 300);
}
function smoothScrollTo(endX, endY, duration) {
    var startX = window.scrollX || window.pageXOffset;
    var startY = window.scrollY || window.pageYOffset;
    var distanceX = endX - startX;
    var distanceY = endY - startY;
    var startTime = new Date().getTime();
    duration = typeof duration !== 'undefined' ? duration : 400;
    var easeInOutQuart = function (time, from, distance, duration) {
        if ((time /= duration / 2) < 1)
            return distance / 2 * time * time * time * time + from;
        return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
    };
    var timer = setInterval(function () {
        var time = new Date().getTime() - startTime;
        var newX = easeInOutQuart(time, startX, distanceX, duration);
        var newY = easeInOutQuart(time, startY, distanceY, duration);
        if (time >= duration) {
            clearInterval(timer);
        }
        window.scroll(newX, newY);
    }, 1000 / 60);
}
function sendMessage(name, phone, year, message) {
    if (!year) {
        year = 'Não';
    }
    else {
        year = 'Sim';
    }
    window.location.href = "../pages/sendemail.php?name=" + name + "&phone=" + phone + "&year=" + year + "&message=" + message;
}
