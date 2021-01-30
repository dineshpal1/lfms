 @include("documents.documentLayout.header")

            <!-- sidebar menu -->
            @include("documents.documentLayout.sidebar")
            <!-- /sidebar menu -->

            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include("documents.documentLayout.top_naviagation")
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
       @yield("contents")
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include("documents.documentLayout.footer")