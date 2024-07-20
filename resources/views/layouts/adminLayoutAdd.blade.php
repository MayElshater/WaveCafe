<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.adminIncludes.headAdd')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i></i> <span>Beverages Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
           @include('admin.adminIncludes.menuProfileQuick')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.adminIncludes.sidebar')
					<!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('admin.adminIncludes.menuFooter')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
            @include('admin.adminIncludes.navigation')
        
        <!-- /top navigation -->



        @yield('admin')
          <!-- footer content -->
          @include('admin.adminIncludes.footer')
        <!-- /footer content -->
      </div>
    </div>
    @include('admin.adminIncludes.footerjsAdd')
  </body>
</html>