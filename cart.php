<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   .login-dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
}

.login-dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.login-dropdown-content a {
  color: #000;
  padding: 10px 15px;
  display: block;
  text-decoration: none;
}

.login-dropdown-content a:hover {
  background-color: #ddd;
}

.login-dropdown:hover .login-dropdown-content {
  display: block;
}
    </style>
<header>
  <div class="header-container">
    <div class="logo">
      <a href="index.html">
        <img src="logo.png" alt="Coolmate Logo">
      </a>
    </div>
    <nav>
      <ul>
        <li class="login-dropdown">
          <a class="dropbtn" href="#">Đăng nhập</a>
          <div class="login-dropdown-content">
            <a href="#">Sign In</a>
            <a href="#">Sign Up</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</header>
<body>
    
</body>
</html>