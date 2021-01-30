        @include("Admin.adminLayout.admin_header")
            <!-- sidebar menu -->
          @include("Admin.adminLayout.admin_sidebar")
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
    @include("Admin.adminLayout.admin_top_navigation")
        <!-- /top navigation -->

        <!-- page content -->
       @yield("contents")
        <!-- /page content -->

        <!-- footer content -->
       @include("Admin.adminLayout.admin_footer")

        