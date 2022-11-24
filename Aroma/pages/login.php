<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Вход / Регистрация</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Главная</a></li>
						<li class="breadcrumb-item active" aria-current="page">Вход / Регистрация</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Еще не зарегистрированы?</h4>
						<p>Создайте аккаунт на нашем сайте</p>
						<a class="button button-account" href="/register">Создать аккаунт</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Авторизуйтесь</h3>
					<form class="row login_form" onsubmit="sendForm(this); return false;">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" name="pass" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'" required>
						</div>

						<p id="info" style="color: red; padding-left: 1.5rem;"></p>


						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Войти</button>
							<!-- <a href="#">Forgot Password?</a> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->


<!-- Модальное окно -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Успешная авторизация.
				</h5>
			</div>
			<div class="modal-body -centered">
				Вы успешно авторизовались и будете перенаправлены на страницу
				личного кабинета через 3 секунды.
			</div>
		</div>
	</div>
</div>

<script>
	async function sendForm(form) {
		info.innerText = "";
		let formData = new FormData(form);

		let response = await fetch("authUser", {
			method: "POST",
			body: formData,
		});
		let res = await response.json();

		if (res.result == "success") {
			$("#myModal").modal("show");
			setTimeout(() => {
				location.href = "http://rosenblum.p-host.in/lk.php";
			}, 3000);
		} else if (res.result == "exist") {
			info.innerText = "Такого пользователя не существует!";
		}
	}
</script>