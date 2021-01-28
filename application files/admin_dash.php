<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin dash</title>
    <link rel ="stylesheet" href = "../css/style.css">
    <link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>

    <input type ="checkbox" id ="check">

    <header>

      <label  for ="check">
        <i class = "fa fa-bars" id ="sidebar_btn"></i>
      </label>

      <div class ="left_area">
        <h3>E-<span>Learning</span></h3>
      </div>

      <div class="right_area">
        <a href ="Login.php" class = "logout_btn">Logout</a>
      </div>

        <div class="sidebar">
          <center>
            <img src = "../images/filer.jpg" class ="profile_image" alt ="">
              <h4>Admin</h4>
          </center>

            <a href ="#"><i class="fas fa-desktop" aria-hidden="true"></i><span>Dashboard</span></a>
            <a href ="#"><i class="fas fa-cogs" aria-hidden="true"></i><span>Components</span></a>
            <a href ="#"><i class="fas fa-table" aria-hidden="true"></i><span>Tables</span></a>
            <a href ="#"><i class="fas fa-th" aria-hidden="true"></i><span>Forms</span></a>
            <a href ="#"><i class="fas fa-info-circle" aria-hidden="true"></i><span>About</span></a>
            <a href ="#"><i class="fas fa-sliders-h" aria-hidden="true"></i><span>Settings</span></a>

    </header>
  </body>
</html>
