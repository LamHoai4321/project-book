<!DOCTYPE html>
<html lang="zxx">
@include('Login.LoginCss')
<body>

<div class="login-wrap" style="background-image: url(user/images/background-login.jpg);">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng Nhập</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng Kí</label>
		<div class="login-form">
			<div class="sign-in-htm" style="padding-top:30px">
		<form class="sign-in-htm" action="{{ route('getLogin') }}" method="post">
			{{ csrf_field() }}
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="Email" type="text" class="input" name="txtEmail">
				</div>
				<div class="group">
					<label for="pass" class="label">Mật khẩu</label>
					<input id="pass" type="password" class="input" data-type="password" name="txtMatKhau">
					@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Nhớ mật khẩu </label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Đăng Nhập">
				</div>
				<div class="hr"></div>
				
				<div class="foot-lnk" style="margin-top:25px">
					<a href="/" style="color:white;"><i class="fas fa-home"></i> Trang chủ</a>
				</div>
		</form>
			</div>
		<form class="sign-up-htm" action="{{ route('getregister') }}" method="post">
			{{ csrf_field() }}
			<div class="sign-up-htm" style="padding-top:30px">
				<div class="group">
					<label for="user" class="label">Họ Tên</label>
					<input id="user" type="text" class="input" name="HoTen">
				</div>
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text" class="input" name="Email">
				</div>
				<div class="group">
					<label for="pass" class="label">Mật khẩu</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Xác thực mật khẩu</label>
					<input id="pass" type="password" class="input" data-type="password" name="repassword">
				</div>
				@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
				<div class="group">
					<input type="submit" class="button" value="Đăng Kí">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Bạn đã có tài khoản? Đăng nhập.</a>
				</div>
			</div>
		</form>
		
		</div>
	</div>
</div>
</body>

</html>
