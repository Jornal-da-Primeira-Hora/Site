const $content        = document.querySelector ('body div#content')              as HTMLTimeElement
const $msgAlertName   = document.querySelector ('body div#content div#name h4' ) as HTMLTimeElement
const $msgAlertPhone  = document.querySelector ('body div#content div#phone h4') as HTMLTimeElement
const $msgAlertYear   = document.querySelector ('body div#content div#year h4' ) as HTMLTimeElement
const $msgAlertMsg    = document.querySelector ('body div#content div#msg h4'  ) as HTMLTimeElement
const $txbName        = document.getElementById('txbName')                       as HTMLInputElement
const $txbPhone       = document.getElementById('txbPhone')                      as HTMLInputElement
const $rbYes          = document.getElementById('rbYes')                         as HTMLInputElement
const $rbNo           = document.getElementById('rbNo')                          as HTMLInputElement
const $txbMsg         = document.getElementById('txbMsg')                        as HTMLInputElement
const $btnSend        = document.getElementById('btnSend')                       as HTMLLinkElement
var tmpHref           = ''
var tmp               = ''

$txbName.addEventListener('keydown', key => {
    if (key.key == 'Enter') {
        if ($txbPhone.value.trim().length == 0) {
            $txbPhone.focus()
        }
        else {
            if (!$rbYes.checked && !$rbNo.checked) {
                $rbYes.focus()
                return
            }
            if ($txbMsg.value.trim().length == 0) {
                $txbMsg.focus()
                return
            }
            btnSend_Click();
        }
    }
})

$txbPhone.addEventListener('keydown', key => {
    if (key.key == 'Enter') {
        if (!$rbYes.checked && !$rbNo.checked) {
            $rbYes.focus()
        }
        else {
            if ($txbMsg.value.trim().length == 0) {
                $txbMsg.focus()
                return
            }
            btnSend_Click();
        }
    }
})

$rbYes.addEventListener('keydown', key => {
    if (key.key == 'Enter') {
        if ($txbMsg.value.trim().length == 0) {
            $txbMsg.focus()
            return
        }
        btnSend_Click()
    }
})
$rbNo.addEventListener('keydown', key => {
    if (key.key == 'Enter') {
        if ($txbMsg.value.trim().length == 0) {
            $txbMsg.focus()
            return
        }
        btnSend_Click()
    }
})

$btnSend.addEventListener('click', btnSend_Click)


function btnSend_Click() {
    tmpHref = ''
    
    if ($txbName.value.trim().length == 0) {
        $msgAlertName.style.display = 'block'
        
        tmpHref = 'body div#content div#name'
        document.getElementById('name').style.border = '1px solid rgb(240, 20, 20)'
    }
    else {
        $msgAlertName.style.display = 'none'
        document.getElementById('name').style.border = '1px solid #d7d7d7'
    }
    

    if ($txbPhone.value.trim().length == 0) {
        $msgAlertPhone.style.display = 'block'

        if (tmpHref == '') {
            tmpHref = 'body div#content div#phone'
        }
        document.getElementById('phone').style.border = '1px solid rgb(240, 20, 20)'
    }
    else {
        $msgAlertPhone.style.display = 'none'
        document.getElementById('phone').style.border = '1px solid #d7d7d7'
    }


    if ($rbYes.checked == false && $rbNo.checked == false) {
        $msgAlertYear.style.display = 'block'

        if (tmpHref == '') {
            // tmpHref = 'body div#content div#year'
            tmpHref = 'body div#content div#phone'
        }
        document.getElementById('year').style.border = '1px solid rgb(240, 20, 20)'
    }
    else {
        $msgAlertYear.style.display = 'none'
        document.getElementById('year').style.border = '1px solid #d7d7d7'
    }
    

    if ($txbMsg.value.trim().length == 0) {
        $msgAlertMsg.style.opacity = '1'

        if (tmpHref == '') {
            // tmpHref = 'body div#content div#msg'
            tmpHref = 'body div#content div#phone'
        }
        document.querySelector('div#content div#msg').style.border = '1px solid rgb(240, 20, 20)'
    }
    else {
        $msgAlertMsg.style.opacity = '0'
        document.querySelector('div#content div#msg').style.border = '1px solid #d7d7d7'
    }
    

    tmp = $rbYes.checked != false || $rbNo.checked != false
    if ($txbName.value.trim().length != 0 && $txbPhone.value.trim().length != 0 && tmp && $txbMsg.value.trim().length != 0) {
        sendMessage($txbName.value, $txbPhone.value, $rbYes.checked, $txbMsg.value)
    }

    if (tmpHref.trim().length != 0) {
        tmp = document.querySelector(tmpHref).offsetTop + content.offsetTop - 30
    }
    smoothScrollTo(0, tmp, 300)
}

function smoothScrollTo(endX, endY, duration) {
    const startX = window.scrollX || window.pageXOffset
    const startY = window.scrollY || window.pageYOffset
    const distanceX = endX - startX
    const distanceY = endY - startY
    const startTime = new Date().getTime()
  
    duration = typeof duration !== 'undefined' ? duration : 400
  
    const easeInOutQuart = (time, from, distance, duration) => {
      if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from
      return -distance / 2 * ((time -= 2) * time * time * time - 2) + from
    }
  
    const timer = setInterval(() => {
      const time = new Date().getTime() - startTime
      const newX = easeInOutQuart(time, startX, distanceX, duration)
      const newY = easeInOutQuart(time, startY, distanceY, duration)
      if (time >= duration) {
        clearInterval(timer)
      }
      window.scroll(newX, newY)
    }, 1000 / 60);
}

function sendMessage(name, phone, year, message) {
    if ( !year ) { year = 'Não' }
    else { year = 'Sim' }

    window.location.href = `../pages/sendemail.php?name=${name}&phone=${phone}&year=${year}&message=${message}`
}
