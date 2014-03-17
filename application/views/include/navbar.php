 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MyParts</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo isActive($pageName,"frontpage")?>"><a href="<?php echo  base_url()?>">Home</a></li>
            <li class="<?php echo isActive($pageName,"parts")?>"><a href="<?php echo  base_url('parts')?>">Parts</a></li>
            <li class="<?php echo isActive($pageName,"about")?>"><a href="<?php echo  base_url('about')?>">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $username ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo  base_url('auth')?>">Profile</a></li>
                <li><a href="<?php echo  base_url('auth/logout')?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>