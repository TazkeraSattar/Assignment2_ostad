<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <form class="card">
      <h2>Registration</h2>
      <div class="row">
        <div class="input-group">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" placeholder="Enter your name" required>
        </div>
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" placeholder="Enter your username" required>
        </div>
      </div>
      <div class="row">
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="input-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" placeholder="Enter your number" required>
        </div>
      </div>
      <div class="row">
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" required>
        </div>
        <div class="input-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" placeholder="Confirm your password" required>
        </div>
      </div>
      <div class="gender-group">
        <label>Gender</label>
        <div class="gender-options">
          <label><input type="radio" name="gender" value="male"> Male</label>
          <label><input type="radio" name="gender" value="female"> Female</label>
          <label><input type="radio" name="gender" value="other"> Other</label>
        </div>
      </div>
      <div class="button-group">
        <button type="reset" class="cancel">Cancel</button>
        <button type="submit" class="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
