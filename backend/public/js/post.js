/************** XU LY LOGIC INPUT********** */
function Validator(option) {
    var SelectorRules = {};

    function validate(inputElement, rule) {
        var errInput;
        var errElement = inputElement.parentElement.querySelector(option.errSelector);
        var rules = SelectorRules[rule.selector];
        for (var i = 0; i < rules.length; ++i) {
            errInput = rules[i](inputElement.value);
            if (errInput) break;
        }
        if (errInput) {
            errElement.innerText = errInput;
            inputElement.classList.add('valid_err');
        } else {
            errElement.innerText = '';
            inputElement.classList.remove('valid_err');
        }
        return !errInput;
    }

    var formElement = document.querySelector(option.form);
    if (formElement) {
        formElement.onsubmit = function(e) {
            e.preventDefault();
            //kiểm tra điền form hoàn thành
            var isFormDone = true;
            option.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isDone = validate(inputElement, rule);
                if (!isDone) {
                    isFormDone = false;
                }
            });
            if (isFormDone) {
                if (typeof(option.Onsubmit) === 'function') {
                    var readInputs = formElement.querySelectorAll('[name]');
                    // console.log(readInputs);
                    var formValues = Array.from(readInputs).reduce(function(values, input) {
                        if (input.type == 'file') {
                            values[input.name] = input.files;
                        } else {
                            values[input.name] = input.value;

                        }
                        return values;
                    }, {});
                    option.Onsubmit(formValues);
                }

            }
        }
        option.rules.forEach(function(rule) {
            if (Array.isArray(SelectorRules)) {
                SelectorRules[rule.selector].push(rule.test);
            } else {
                SelectorRules[rule.selector] = [rule.test];
            }
            var inputElement = formElement.querySelector(rule.selector);


            if (inputElement) {
                inputElement.onblur = function() {
                    validate(inputElement, rule);
                }
                inputElement.oninput = function() {
                    var errElement = inputElement.parentElement.querySelector(option.errSelector);
                    errElement.innerText = '';
                    inputElement.classList.remove('valid_err');
                }
            }
        });
    }
}
Validator.isValue = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : 'Vui lòng nhập thông tin vào trường này!';
        }
    };
};

// this is the id of the form
$("#form_post_product").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        beforeSend: function(request) {
            request.setRequestHeader("Authorization", getCookie('Authorization'));
        },
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data) {
            alert(data); // show response from the php script.
        }
    });


});

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}