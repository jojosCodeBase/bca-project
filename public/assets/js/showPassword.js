const passwordInput = document.getElementById('password');
const showPasswordCheckbox = document.getElementById('checkbox');

showPasswordCheckbox.addEventListener('change', function() {
  if (this.checked) {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
  }
});