let inputs = [
  {
    element: $("#firstname"),
    altName: "First name",
    name: "firstname",
    min: 2,
    max: 15,
    errors: [],
    validations: ["length", "whitespace", "text"],
  },
  {
    element: $("#lastname"),
    altName: "Last name",
    name: "lastname",
    min: 2,
    max: 15,
    errors: [],
    validations: ["whitespace", "text", "length"],
  },
  {
    element: $("#email"),
    altName: "Email",
    name: "email",
    errors: [],
    validations: ["email"],
  },
  {
    element: $("#password"),
    altName: "password",
    name: "password",
    min: 8,
    max: 32,
    errors: [],
    validations: ["whitespace", "length"],
  },
  {
    element: $("#repeat_password"),
    altName: "Repeat password",
    name: "repeat_password",
    min: 8,
    max: 32,
    errors: [],
    password: $("#password"),
    validations: ["whitespace", "password"],
  },
];

function textValidation(value, name) {
  var regex = /[a-zA-Z]/;

  if (!regex.test(value)) {
    return {
      valid: false,
      error: "Please enter valid " + name,
    };
  }

  return {
    valid: true,
    error: "",
  };
}

function lengthCheck(min, max, value, name) {
  if (value.length >= min && value.length <= max) {
    return {
      valid: true,
      error: "",
    };
  }
  return {
    valid: false,
    error: "Please enter " + name + " within range (" + min + "," + max + ")",
  };
}

function whiteSpaceValidation(value, name) {
  var whitespaceCount = value.split(" ").length - 1;
  if (whitespaceCount != 0) {
    return {
      valid: false,
      error: "Please remove whitespace(s) from " + name,
    };
  }

  return {
    valid: true,
    error: "",
  };
}

function emailValidation(email, name) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!regex.test(email)) {
    return {
      valid: false,
      error: "Please provide valid " + name,
    };
  }

  return {
    valid: true,
    error: "",
  };
}

function passwordValidation(password, repPass) {
  if (password != repPass) {
    return {
      valid: false,
      error: "Passwords Doesn't match ",
    };
  }

  return {
    valid: true,
    error: "",
  };
}

function validationCheck(validation, prop) {
  switch (validation) {
    case "whitespace":
      return whiteSpaceValidation(prop.element.val(), prop.altName);
    case "text":
      return textValidation(prop.element.val(), prop.altName);
    case "length":
      return lengthCheck(prop.min, prop.max, prop.element.val(), prop.altName);
    case "email":
      return emailValidation(prop.element.val(), prop.altName);
    case "password":
      return passwordValidation(prop.password.val(), prop.element.val());
  }
}

function displayErrors(errorInputs) {
  hideErrors();
  $(errorInputs).each(function (_, errorInput) {
    errorInput.element
      .css("outline-color", "red")
      .css("outline-style", "groove");

    let errorHolder = errorInput.element
      .parent(".input-wrapper")
      .find(".error-holder");
    $(errorInput.errors).each(function (_, error) {
      errorHolder.append("<li>" + error + "</li>");
    });
  });
}

function hideErrors() {
  $(inputs).each(function (_, input) {
    input.element.css("outline-style", "none");
    input.element.parent(".input-wrapper").find(".error-holder").html("");
  });
}

function prepareData(datas) {
  let prepareData = {};

  $(datas).each(function (_, data) {
    prepareData[data.name] = data.element.val();
  });

  return prepareData;
}

function setName(firstname) {
  $.ajax({
    type: 'POST',
    url: '/setname',
    data: {firstname: firstname}
  })
}

$("#sign-up").submit(function (e) {
  e.preventDefault();
  let errors = [];
  $(inputs).each(function (_, element) {
    element.errors = [];
    $(element.validations).each(function (_, validation) {
      const resultsVal = validationCheck(validation, element);
      if (!resultsVal.valid) {
        errors.push(element);
        errors[errors.length - 1].errors.push(resultsVal.error);
      }
    });
  });

  if (errors.length != 0) {
    displayErrors(errors);
  } else {
    hideErrors();
    let dataTosend = prepareData(inputs);
    $.ajax({
      type: "POST",
      url: "/sign-up",
      data: dataTosend,
      success: function (data, text) {
        if (data) {
          let firstname = inputs[0].element.val();
          alert("Hello " + firstname);
          setName(firstname);
          window.location.replace("http://127.0.0.1:8000/welcome");
        } else {
          alert("Something went wrong");
        }
      },
    });
  }
});
