<aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href=" {{route('khachhang.index')}} "
                  aria-expanded="false"
                  ><i class="mdi mdi-account-key"></i
                  ><span class="hide-menu">Quản lý nhân sự</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href=""
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Quản lý danh mục</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">

                  <li class="sidebar-item">
                    <a href="{{route('danhmucanpham.adddanhmuc')}}" class="sidebar-link"
                      ><i class="mdi mdi-pencil"></i><span class="hide-menu"> Thêm mới danh mục </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{route('danhmucsanpham.list')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Danh sách </span></a
                    >
                  </li>

                </ul>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href=""
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Quản lý sản phẩm </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">

                  <li class="sidebar-item">
                    <a href="{{route('sanpham.getaddsp')}}" class="sidebar-link"
                      ><i class="mdi mdi-pencil"></i><span class="hide-menu"> Thêm mới sản phẩm </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{route('sanpham.list')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Tất cả sản phẩm </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/1" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh mặn </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/2" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh ngọt</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/3" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh trái cây </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/4" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh kem </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/5" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh crepe </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/6" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh Pizza </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/sanpham/loaisanpham/7" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Bánh su kem </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href=""
                  aria-expanded="false"
                  ><i class="mdi mdi-blur-linear"></i
                  ><span class="hide-menu">Quản lý đơn hàng </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="{{route('donhang.list')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Tất cả đơn hàng </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/donhang/loaidon/1" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Chờ giao hàng </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/donhang/loaidon/2" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Đang giao hàng </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/admin/donhang/loaidon/3" class="sidebar-link"
                      ><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Đã giao hàng </span></a
                    >
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/dangxuat/admin"
                  aria-expanded="false"
                  ><i class="mdi mdi-chart-bar"></i
                  ><span class="hide-menu">Đăng Xuất</span></a
                >
              </li>

            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
