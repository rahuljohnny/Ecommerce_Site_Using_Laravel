{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="/admin/product/index">Products</a> </li>
                    <li><a href="/admin/product/create">Add Product</a></li>
                </ul>
            </li>


            <!-- ADMIN SIDE NAV-->

            <!-- Main menu -->

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Category
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="/admin/category">Categories</a></li>
                </ul>
            </li>



        </ul>




    </div>
</div>
