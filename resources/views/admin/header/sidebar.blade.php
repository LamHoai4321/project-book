<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          @if(Auth::user()->LoaiTK == 1)
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tổng Quan</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/admin/slide">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Quản lý Slide</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/sach">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Quản lý sách</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/theloai">
              <i class="fas fa-newspaper menu-icon"></i>
              <span class="menu-title">Quản lý thể loại</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/theloaisach">
            <i class="fas fa-book"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý thể loại sách</span>
            </a>
          </li>
          @if(Auth::user()->LoaiTK == 1)
          <li class="nav-item">
            <a class="nav-link" href="/admin/nhacungcap">
              <i class="fas fa-home"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý nhà cung cấp</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/admin/nhaxuatban">
            <i class="fa fa-address-book" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý nhà xuất bản</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/tacgia">
            <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý tác giả</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/theloaitintuc">
            <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Danh mục tin tức</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/tintuc">
            <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý tin tức</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/kichthuoc">
            <i class="fa fa-arrows-h" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý kích thước</span>
            </a>
          </li>
          @if(Auth::user()->LoaiTK == 1)
          <li class="nav-item">
            <a class="nav-link" href="/admin/taikhoan">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Quản lý tài khoản</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
          <a class="nav-link" href="/admin/hoadon">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Quản lý đơn hàng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/binhluan" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-comments menu-icon"></i>
              <span class="menu-title">Quản lý bình luận</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/kho" aria-expanded="false" aria-controls="auth">
            <i class="fas fa-warehouse"></i>    &nbsp &nbsp &nbsp              
            <span class="menu-title">Quản lý kho</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/theloaicha" aria-expanded="false" aria-controls="auth">
            <i class="fa fa-star-half-o" aria-hidden="true"></i>    &nbsp &nbsp &nbsp              
            <span class="menu-title">Quản lý thể loại cha</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/magiamgia" aria-expanded="false" aria-controls="auth">
            <i class="fa fa-futbol-o" aria-hidden="true"></i>    &nbsp &nbsp &nbsp              
            <span class="menu-title">Quản lý mã giảm giá</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/khuyenmai" aria-expanded="false" aria-controls="auth">
            <i class="fa fa-file-image-o" aria-hidden="true"></i>   &nbsp &nbsp &nbsp              
            <span class="menu-title">Quản lý khuyến mãi sách</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('getLogout')}}">
              <i class="fas fa-sign-out-alt menu-icon"></i>
              <span class="menu-title">Đăng xuất</span>
            </a>
          </li>
        </ul>
      </nav>
      