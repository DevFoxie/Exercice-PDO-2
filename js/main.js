// Get references to the form, password fields, and message element
const form = document.getElementById("form");
const password1El = document.getElementById("password1");
const password2El = document.getElementById("password2");
const message = document.getElementById("message");

// Validate the form when it's submitted
function validateForm() {
  // Check if the form is filled out
  if (!form.checkValidity()) {
    message.textContent = "Please fill out all fields.";
    message.style.color = "red";
    return;
  }
  // Check if the password fields match
  if (password1El.value !== password2El.value) {
    message.textContent = "The passwords do not match.";
    message.style.color = "red";
    return;
  }
  // If the form is valid and the passwords match, display a success message
  message.textContent = "Registered Successfully!";
  message.style.color = "green";
}

// Store the form data in an object and log it to the console
function storeFormData() {
  const user = {
    name: form.name.value,
    phone: form.phone.value,
    email: form.email.value,
    website: form.website.value,
    password: form.password.value,
  };
  console.log(user);
}

// Listen for the form submit event
form.addEventListener("submit", (e) => {
  // Prevent the default form submit behavior
  e.preventDefault();
  // Validate the form
  validateForm();
  // If the form is valid, store the form data
  if (message.style.color === "green") {
    storeFormData();
  }
});
