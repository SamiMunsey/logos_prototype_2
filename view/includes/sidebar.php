 
    <!--Side Navigation Menu (contains copied code) -->

<div class="sidenav">
  <button class="dropdown-btn" name="activate__profile_dropdown">Admin User <img src="/logos/view/media/profile-logo.png" id="homelogo" style="margin-left: 60px">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/logos/view/login.php">Log out</a>
  </div>
  <hr>
  <a href="/logos/view/home.php">Home</a>
  
  <button class="dropdown-btn" name="activate_resource_dropdown">Resources <img src="/logos/view/media/Arrow-down.svg.png" id="downarrow">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/logos/view/forms/resource_record.php">+ New resource record</a>
    <a href="/logos/view/resources.php">Manage resources</a>
      <button class="dropdown-btn" name="activate_genre_dropdown">Genres <img src="/logos/view/media/Arrow-down.svg.png" id="downarrow">
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">+ New genre</a>
        <a href="/logos/view/genres.php">Manage genres</a>
      </div>
  </div>
  <button class="dropdown-btn" name="activate_borrowers_dropdown">Borrowers <img src="/logos/view/media/Arrow-down.svg.png" id="downarrow">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/logos/view/forms/borrower_record.php">+ New borrower record</a>
    <a href="/logos/view/borrowers.php">Manage borrowers</a>

  </div>
  <button class="dropdown-btn" name="activate_circulate_dropdown">Circulate <img src="/logos/view/media/Arrow-down.svg.png" id="downarrow">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/logos/view/issue.php">Issue</a>
    <a href="/logos/view/return.php">Bulk return</a>
    <a href="/logos/view/current_loans.php">Current loans</a>
  </div>
  <a href="/logos/CC/index.php">Help</a>
</div>

<?php include $root."/logos/model/dropdown_script.php" ?>