const promocode = ["Юрий", "Промо"]

const callBtns = document.querySelectorAll('.callBtn')

if (navigator.userAgent.indexOf('Chrome') == -1) {
    callBtns.forEach(el => el.style.paddingTop = '3px')
}



let popover
let popoverTel

const red = "#D62525"
const pink = "#f1b2c7"
const green = "#1FC173"
const darkPink = '#EC6985';

    document.querySelectorAll('input[type="checkbox"]').forEach(el => {
        el.addEventListener('focus', (e) => {
            e.target.classList.add('focused')
        })

        el.addEventListener('blur', (e) => {
            e.target.classList.remove('focused')
        })
    })

    document.querySelectorAll('input[type="number"]').forEach((el, i) => {
        el.addEventListener('focus', () => {
            el.style.borderColor = darkPink
        })

        if (i === 0) {
            el.addEventListener('blur', (e) => {
                if (!e.target.value) {
                    el.style.borderColor = red
                } else {
                    el.style.borderColor = pink
                }
            })
        } else {
            el.addEventListener('blur', (e) => {
                el.style.borderColor = pink
            })
        }
    })

    document.querySelectorAll('input[type="tel"]').forEach(el => {
        IMask(
            el, {
                mask: '+{7}(000)000-00-00'
            });

            el.addEventListener('input', (e) => {

            })

        el.setCustomValidity('Заполните это поле')

        el.addEventListener('input', (e) => {
            if (e.target.value.length === 16) {
                e.target.setCustomValidity('')
            }
        })

        el.addEventListener('blur', (e) => {
            if (!e.target.value) {
                el.style.borderColor = "#D62525"
            } else if(e.target.value.length !== 16) {
                el.style.borderColor = "#D62525"
            } else {
                el.style.borderColor = "#f1b2c7"
            }
        })

        el.addEventListener('focus', () => {
            if (popoverTel) {
                popoverTel.hide()
            }

            el.style.borderColor = darkPink
        })
    })

    // email validation
    const emailInput = document.querySelector('input[type="email"]')
    const emailExp = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    emailInput.addEventListener("blur", (e) => {
        if (e.target.value.length === 0) {
            popover = new bootstrap.Popover(e.target, {
                placement: 'top',
                content: 'Это поле обязательно',
                trigger: 'manual'
            })
            e.target.style.borderColor = red
        } else if (!emailExp.test(e.target.value)) {
            e.target.style.borderColor = red

            popover = new bootstrap.Popover(e.target, {
                placement: 'top',
                content: 'Введите e-mail в формате __@__.__',
                trigger: 'manual'
            })

            popover.show()
        } else {
            e.target.style.borderColor = pink
        }
    })

    emailInput.setCustomValidity('Заполните это поле')

    emailInput.addEventListener('input', () => {
        if(emailExp.test(emailInput.value)) {
            emailInput.setCustomValidity('')
        }
    })

    emailInput.addEventListener("focus", (e) => {
        e.target.style.borderColor = darkPink

        if (popover) {
            popover.hide()
        }
    })

    var emailPopover = new bootstrap.Popover(emailInput, {
        placement: 'top',
        trigger: 'manual'
    })

    // end email validation


// forms validation

const regexpText = /^[.а-яёa-z\s-]+$/i

document.querySelectorAll('input[type="text"]').forEach(el => {
    if(el.getAttribute('name') != 'promo') {
        el.addEventListener('input', (e) => {
            if(e.target.value.length !== 0) {
                if(popover) {
                    popover.hide()
                }

                popover = new bootstrap.Popover(e.target, {
                    placement: 'top',
                    content: 'Только русские и латинские символы, пробелы, точки и тире',
                    trigger: 'manual'
                })

                if (!(regexpText.test(e.target.value))) {
                    popover.show()
                    e.target.style.borderColor = "#D62525"
                    e.target.setCustomValidity('Заполните это поле')
                } else {
                    e.target.style.borderColor = "#1FC173"
                    popover.hide()
                    e.target.setCustomValidity('')
                }
            } else {
                if(popover) {
                    popover.hide()
                }

                if (e.target.getAttribute('required')) {
                    popover = new bootstrap.Popover(e.target, {
                        placement: 'top',
                        content: 'Это обязательное поле',
                        trigger: 'manual'
                    })

                    e.target.style.borderColor = "#D62525"

                    popover.show()
                }
            }
        })

        el.addEventListener('blur', (e) => {
            if(popover) {
                popover.hide()
            }

            if (!e.target.value || !(regexpText.test(e.target.value))) {
                el.style.borderColor = red
            } else {
                el.style.borderColor = pink
            }
        })

        el.addEventListener('focus', () => {
            if(popover) {
                popover.hide()
            }
            el.style.borderColor = darkPink
        })
    }
})

const checkboxes = document.querySelectorAll('input[type="checkbox"]')

// end reviews switches

// Burger behavior

const mobNav = document.querySelector('.mobNav');
const burger = document.querySelector('.burger')
const cross = document.querySelector('.cross')

burger.addEventListener('click', () => {
    mobNav.style.transform = "translateX(0)";
})

cross.addEventListener('click', () => {
    mobNav.style.transform = "translateX(100vw)";
})

const mobLinks = document.querySelectorAll('.mobNavList li')

mobLinks.forEach(el => el.addEventListener('click', () => {
    mobNav.style.transform = "translateX(100vw)";
}))

// end burger behavior

// smooth scroll

const transBtn = document.querySelectorAll('.transBtn')

$(document).ready(function(){
    transBtn.forEach(e => e.addEventListener("click", function (event) {
        event.preventDefault();

        if (event.target.classList.contains('burgerNavLink')) {
            burgerMenuPages.style.right = "-100%"
            body.style.overflow = "visible"
            setTimeout(() => burgerContacts.style.left = "100%", 500)
        }

        var id  = $(this).attr('href'),
            top = $(id).offset().top - 20;
        $('body,html').animate({scrollTop: top}, 700);


    }));

    if(document.querySelector('body').getBoundingClientRect().width > 992) {
        $('.slickCarousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
        })
    }

    const slideNum = document.querySelector('.controls span')
    let newNum

    $(".slick-next").click(() => {
        newNum = parseInt(slideNum.innerHTML) + 1
        if (newNum > 3) newNum = 1
        slideNum.innerHTML = newNum
    })
    $(".slick-prev").click(() => {
        newNum = parseInt(slideNum.innerHTML) - 1
        if (newNum < 1) newNum = 3
        slideNum.innerHTML = newNum
    })
})

// end smooth scroll

// programs switches

const programsList = document.querySelectorAll('.programs__list li')
const programTitle = document.querySelector('.program__title')

const orderContent = document.querySelector('#programsModal .category p')
const dadMeal = document.querySelector('#dadMeal')

programsList.forEach(el => el.addEventListener('click', (e) => {
    const target = e.target.closest('li')

    if (!target.classList.contains('active')) {
        const activate = parseInt(target.getAttribute('data-activate'))
        const forWhom = target.getAttribute('data-forwhom')

        programsList.forEach(el => el.classList.remove("active"))
        target.classList.add('active')

        programTitle.style.opacity = '0'
        setTimeout(() => {
            programTitle.innerHTML = `Программа питания для ${forWhom}`
            programTitle.style.opacity = '1'
        }, 300)

        if (activate == 3) {
            dadMeal.style.display = "none"
        } else {
            dadMeal.style.display = "block"
        }
        orderContent.style.backgroundImage = `url("../assets/programsListIcon${1 + activate}.svg")`
        orderContent.innerHTML = `Программа питания для ${forWhom}`
    }
}))

// end programs switches

// Order behavior

const orderBtn = document.querySelectorAll('.orderBtn')
const promoCheckbox = document.querySelector('#promo')
const promoInputSurround = document.querySelector('.promoInput')
const promoInput = document.querySelector('.promoInput input')

let inputExpand = true

let mainTotal = 3000
let extraTotal = 0
let sumTotal = 0
let perDay = 1500

window.promoActive = false

promoInput.addEventListener('input', (e) => {

    if(promocode.indexOf(e.target.value)  === -1) {
        promoInput.style.borderColor = red

        if (promoActive) {
            setMainTotal(Math.round(mainTotal / perDay + 1), perDay)
        }
        promoActive = false
    } else {
        promoInput.style.borderColor = green
        promoActive = true

        setMainTotal(Math.round(mainTotal / perDay - 1), perDay)
    }
})

promoInput.addEventListener('focus', (e) => {
    promoInput.style.borderColor = darkPink
})

promoInput.addEventListener('blur', (e) => {
    if(e.target.value != promocode) {
        promoInput.style.borderColor = red
    } else {
        promoInput.style.borderColor = pink
    }
})

const inputToggle = () => {
    if (inputExpand) {
        inputExpand = false
        promoInputSurround.classList.add('active')
        promoCheckbox.classList.add('active')
        setTimeout(() => promoInput.style.transform = "translateX(0)", 300)
        promoInput.setCustomValidity("Введите верный промокод")
    } else {
        inputExpand = true
        promoInput.style.transform = "translateX(-100%)"
        promoCheckbox.classList.remove('active')
        setTimeout(() => promoInputSurround.classList.remove('active'), 300)
        promoInput.setCustomValidity('')
    }
}

$('.discount .callBtn').click(() => {
    inputToggle()
})

let activeDay = 0
const dayMenuList = document.querySelectorAll('.dayMenu')
const daysList = document.querySelectorAll('.day')

const dishDays = document.querySelectorAll('.dishes li')

$('.downBtn').click(() => {
    if (activeDay < dayMenuList.length - 1) {
        dayMenuList[activeDay].style.transform = "translateY(-100%)"
        daysList[activeDay].style.transform = "translateY(-100%)"
        dishDays[activeDay].style.transform = "translateY(-150%)"
        activeDay++

        setTimeout(() => {
            dayMenuList[activeDay].style.transform = "translateY(0)"
            daysList[activeDay].style.transform = "translateY(0)"
            dishDays[activeDay].style.transform = "translateY(0)"
        }, 200)
    }
})

$('.upBtn').click(() => {
    if (activeDay > 0) {
        dayMenuList[activeDay].style.transform = "translateY(100%)"
        daysList[activeDay].style.transform = "translateY(100%)"
        dishDays[activeDay].style.transform = "translateY(150%)"
        activeDay--

        setTimeout(() => {
            dayMenuList[activeDay].style.transform = "translateY(0)"
            daysList[activeDay].style.transform = "translateY(0)"
            dishDays[activeDay].style.transform = "translateY(0)"
        }, 200)
    }
})

const dishes = document.querySelectorAll('.menu__list .dayMenu')
const dishesDescr = document.querySelectorAll('.dishes li')

// end order behavior

// menu switches

const days = document.querySelectorAll('.options__list li')
const amount = document.querySelector('.options .amount')
const modalTotal = document.querySelector('.modalTotal')
const amountPerDay = document.querySelector('.options .perDay')

//let activeOption = document.querySelector('.options__list .active').innerHTML.slice(0, 2)

let dadPerDay = 1500

const setMainTotal = (total, sum) => {
    mainTotal = total * sum
    perDay = sum

    setModalTotal()
}

const setExtraTotal = (total, sum) => {
    extraTotal = total * sum
    dadPerDay = sum

    setModalTotal()
}

const setModalTotal = () => {
    modalTotal.style.opacity = '0'

    sumTotal = mainTotal + extraTotal + ''

    setTimeout(() => {
        let newAmount = sumTotal.split('')
        newAmount.length === 4 ? newAmount.splice(1, 0, ' ') : newAmount.splice(2, 0, ' ')
        modalTotal.innerHTML = `${newAmount.join('')} ₽`
        modalTotal.style.opacity = '1'
    }, 300)
}

window.switchDish = (day, item) => {
    const dishesDay = dishes[day].querySelectorAll('li')

    dishesDay.forEach(el => {
        el.classList.remove('active')
    })

    dishesDay[item].classList.add('active')

    const descr = dishesDescr[day].querySelectorAll('.dish__block')

    descr.forEach(el => el.style.opacity = '0')

    setTimeout(() => {
        descr[item].style.opacity = '1'
    }, 300)
}

days.forEach(el => el.addEventListener('click', (e) => {
    const target = e.target
    if (!target.classList.contains('active')) {
        days.forEach(el => el.classList.remove('active'))
        target.classList.add("active")

        amount.style.opacity = '0'
        amountPerDay.style.opacity = '0'
        setTimeout(() => {
            let newAmount = mainTotal.toString().split('')
            newAmount.length === 4 ? newAmount.splice(1, 0, ' ') : newAmount.splice(2, 0, ' ')
            amount.innerHTML = `${newAmount.join('')} ₽`
            amount.style.opacity = '1'

            amountPerDay.innerHTML = `${perDay} ₽/день`
            amountPerDay.style.opacity = '1'
        }, 300)
    }
}))

const forDad = document.querySelector('#forDad')
const father = document.querySelector('.father')

const cateMain = document.querySelector('.category.main')
let dadOption = false

const addToModalTotal = (total) => {
    modalTotal.style.opacity = '0'

    const activeModalOption = cateMain.querySelector('span').innerHTML.slice(3, 5).replace(' ', '')

    total = (parseInt(total) + parseInt(activeModalOption)) + ''

    setModalTotal(total)
}

$('#dadMeal').click(() => {
    dadOption = !dadOption

    const fatherOption = parseInt(document.querySelector('.father span').innerHTML.slice(3, 5).replace(' ', ''))

    if (dadOption) {
        setExtraTotal(fatherOption, dadPerDay)

        setTimeout(() => {
            cateMain.classList.add('extra')
        }, 100)
        setTimeout(() => {
            father.style.transform = 'translateX(0)'
        }, 400)
    } else {
        setExtraTotal(0, dadPerDay)

        father.style.transform = 'translateX(100%)'
        setTimeout(() => {
            cateMain.classList.remove("extra")
        }, 300)
    }
})

// end menu switches

// answers switches

const categories = document.querySelectorAll(".categoriesList li")
const accordions = document.querySelectorAll(".accordion__child")

categories.forEach(el => el.addEventListener('click', (e) => {
    const target = e.target.closest('li')
    if (!target.classList.contains('active')) {
        categories.forEach(el => el.classList.remove('active'))
        target.classList.add("active")

        accordions.forEach(el => el.style.opacity = "0")
        setTimeout(() => {
            accordions.forEach(el => el.style.display = "none")
            accordions[target.getAttribute('data-activate')].style.display = "block"
        }, 400)
        setTimeout(() => {
            accordions[target.getAttribute('data-activate')].style.opacity = '1'
        }, 500)

    }
}))


$('.card').on('show.bs.collapse', (e) => {
    e.target.parentElement.querySelector('.vertical').style.transform = 'rotate(-90deg)'
    e.target.parentElement.querySelector('h2').classList.add('brownText')
})
$('.card').on('hide.bs.collapse', (e) => {
    e.target.parentElement.querySelector('.vertical').style.transform = 'rotate(0)'
    e.target.parentElement.querySelector('h2').classList.remove('brownText')
})

// end answers switches

// Dropdown Menu

$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.category.father .dropdown .dropdown-menu li').click(function (e) {
    document.querySelectorAll('.category.father .dropdown-menu li').forEach(el => el.classList.remove('active'))
    e.target.classList.add("active")
    $(this).parents('.dropdown').find('span').text(`на ${$(this).text()}`);
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
});

// end Dropdown Menu

const mainDropdown = document.querySelectorAll('.category.main .dropdown-menu li')
const fatherDropdown = document.querySelectorAll('.category.father .dropdown-menu li')

const mainDropdownOption = document.querySelector('.category.main .dropdown span')
const fatherDropdownOption = document.querySelector('.category.father .dropdown span')

const orderMainSwitch = (target, text) => {
    mainDropdown.forEach(el => el.classList.remove('active'))
    mainDropdown[target].classList.add("active")

    mainDropdownOption.innerHTML = `на ${text}`
}

const $callbackForm = $('#callBackForm');
$callbackForm.on('submit', function (e) {
    gtag('event', 'callback', { 'event_category' : 'callback' });
    ym(68515060,'reachGoal','callback');

    const $callbackForm = $('#callBackForm');
    const $errors = $callbackForm.find('.errors')
    const msg = $callbackForm.serialize();

    $.ajax({
               type:    'POST',
               data:    msg,
               url:     $callbackForm.attr('action'),
               success: function (data, textStatus) {
                   $errors.text('');
                   $callbackForm[0].reset();
                   $('#callBackModal').modal('hide')
                   $('#callBackThanksModal').modal('show')
               },
               error:   function (xhr, textStatus) {
                   const data = JSON.parse(xhr.responseText);
                   $errors.text('');
                   $.each(data.errors, (errorKey, messages) => {
                       $.each(messages, (messageKey, text) => {
                           $errors.append($('<div>').text(text));
                       });
                   })
               }
           });

    return false;
});
