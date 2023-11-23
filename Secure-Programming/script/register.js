const usernameInput = document.getElementById("username");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const genderInput = document.getElementById("gender");
const favoritePlayerInput = document.getElementById("favorite_player");
const ageInput = document.getElementById("age");
// const erorrMessage = document.getElementById("errorMessage");
const form = document.getElementById("RegisterForm");

form.addEventListener("submit", (event) => {
  event.preventDefault();

  // Validate username
  const username = usernameInput.value;
  if (
    username.length < 5 ||
    username.length > 20 ||
    !username.match(/^[a-zA-Z]+$/)
  ) {
    errorMessage("Username length between 5-20 or Username must be alphabet");
    return;
  }

  // Validate email
  const email = emailInput.value;
  const emailRegex = /^[\w-]+@[\w-]+.[a-zA-Z]{2,}$/;
  if (!emailRegex.test(email)) {
    errorMessage("Invalid email format");
    return;
  }

  // Validate password
  const password = passwordInput.value;
  if (password.length < 8) {
    errorMessage("Password must be at least 8 characters long");
    return;
  }

  // Validate gender
  const gender = genderInput.value;
  if (gender !== "Male" && gender !== "Female") {
    errorMessage("Please input a valid gender (Male or Female)");
    return;
  }

  // Validate favorite player
  const favoritePlayer = favoritePlayerInput.value;
  if (!favoritePlayer.match(/^[a-zA-Z]+$/)) {
    errorMessage("Favorite player must aplhabet");
    return;
  }

  // Validate age
  const age = ageInput.value;
  if (age < 1 || age > 100) {
    errorMessage("Invalid age. Please enter an age between 1 and 100");
    return;
  }

  // If all validations pass, submit the form
  form.submit();
});

function errorMessage(message) {
  // Display error message for username
  const errorMessageElement = document.getElementById("errorMessage");
  errorMessageElement.textContent = message;
  errorMessageElement.style.display = "block";
}