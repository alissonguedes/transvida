<?php

Route::prefix("/")->group(function () {

	Route::any("/", ["App\Http\Controllers\Main\HomeController", "index"])->name("main.home");
	Route::get("/home", ["App\Http\Controllers\Main\HomeController", "index"])->name("main.home");
	Route::any("/contact", ["App\Http\Controllers\Main\HomeController", "index"])->name("main.contact");
	Route::prefix("/embaixada")->group(function ($router) use ($route) {
		Route::any("/", ["App\Http\Controllers\Main\GaleriaController", "index"])->name("main.page.embaixada");
		Route::get("/{page?}", ["App\Http\Controllers\Main\GaleriaController", "show"])->name("main.page.embaixada.show_page");
	});
	Route::any("/galeria", ["App\Http\Controllers\Main\GaleriaController", "index"])->name("main.galeria");
	Route::get("/api/token", ["App\Http\Controllers\Main\ApiController", "token"])->name("main.api.token");
	Route::get("/api/translate/{lang}", ["App\Http\Controllers\Main\ApiController", "translate"])->name("main.api.translate");
	Route::get("/about-us", ["App\Http\Controllers\Main\AboutController", "index"])->name("main.about");
	Route::get("/services", ["App\Http\Controllers\Main\AboutController", "services"])->name("main.services");
	Route::any("/health", ["App\Http\Controllers\Main\AboutController", "health"])->name("main.health");

});

Route::prefix("/admin")->group(function () {

	Route::any("/", ["App\Http\Controllers\Admin\HomeController", "index"])->name("admin.index");
	Route::any("/login", ["App\Http\Controllers\Admin\HomeController", "index"])->name("admin.login");
	Route::any("/dashboard", ["App\Http\Controllers\Admin\HomeController", "index"])->name("admin.dashboard");
	Route::any("/database", ["App\Http\Controllers\Admin\HomeController", "index"])->name("admin.database");
	Route::prefix("/menus")->group(function ($router) use ($route) {
		Route::any("/", ["App\Http\Controllers\Admin\MenusController", "index"])->name("admin.menus");
		Route::get("/add", ["App\Http\Controllers\Admin\MenusController", "show_form"])->name("admin.menus.add");
		Route::patch("/{id}", ["App\Http\Controllers\Admin\MenusController", "patch"])->name("admin.menus.patch");
		Route::delete("/", ["App\Http\Controllers\Admin\MenusController", "delete"])->name("admin.menus.delete");
		Route::get("/{id}", ["App\Http\Controllers\Admin\MenusController", "show_form"])->name("admin.menus.edit");
		Route::put("/", ["App\Http\Controllers\Admin\MenusController", "edit"])->name("admin.menus.put");
		Route::post("/", ["App\Http\Controllers\Admin\MenusController", "create"])->name("admin.menus.post");
	});
	Route::get("/api/token", ["App\Http\Controllers\Admin\ApiController", "token"])->name("admin.api.token");
	Route::get("/api/translate/{lang}", ["App\Http\Controllers\Admin\ApiController", "translate"])->name("admin.api.translate");
	Route::patch("/config", ["App\Http\Controllers\Admin\ConfigController", "patch"])->name("admin.config.patch");
	Route::any("/users", ["App\Http\Controllers\Admin\UserController", "index"])->name("admin.users");

});

Route::prefix("/auth")->group(function () {

	Route::any("/login", ["App\Http\Controllers\AuthController", "index"])->name("account.auth.login");
	Route::post("/login", ["App\Http\Controllers\AuthController", "login_validate"])->name("account.auth.login");
	Route::any("/logout", ["App\Http\Controllers\AuthController", "logout"])->name("logout");

});

Route::prefix("/clinica")->group(function () {

	Route::any("/", ["App\Http\Controllers\Clinica\HomeController", "index"])->name("clinica.index");
	Route::get("/api/token", ["App\Http\Controllers\Clinica\ApiController", "token"])->name("clinica.api.token");
	Route::patch("/config", ["App\Http\Controllers\Clinica\ConfigController", "patch"])->name("clinica.config.patch");
	Route::prefix("/pacientes")->group(function ($router) use ($route) {
		Route::any("/", ["App\Http\Controllers\Clinica\PacientesController", "index"])->name("clinica.pacientes.index");
		Route::post("/", ["App\Http\Controllers\Clinica\PacientesController", "create"])->name("clinica.pacientes.post");
		Route::get("/{id}", ["App\Http\Controllers\Clinica\PacientesController", "form"])->name("clinica.pacientes.edit");
		Route::any("/cadastro", ["App\Http\Controllers\Clinica\PacientesController", "form"])->name("clinica.pacientes.add");
		Route::patch("/{id}", ["App\Http\Controllers\Clinica\PacientesController", "patch"])->name("clinica.pacientes.patch");
		Route::delete("/", ["App\Http\Controllers\Clinica\PacientesController", "delete"])->name("clinica.pacientes.delete");
		Route::put("/", ["App\Http\Controllers\Clinica\PacientesController", "edit"])->name("clinica.pacientes.put");
	});
	Route::prefix("/prontuarios")->group(function ($router) use ($route) {
		Route::any("/", ["App\Http\Controllers\Clinica\ProntuariosController", "index"])->name("clinica.prontuarios.index");
		Route::post("/", ["App\Http\Controllers\Clinica\ProntuariosController", "create"])->name("clinica.prontuarios.post");
		Route::get("/{id}", ["App\Http\Controllers\Clinica\ProntuariosController", "form"])->name("clinica.prontuarios.edit");
		Route::any("/cadastro", ["App\Http\Controllers\Clinica\ProntuariosController", "form"])->name("clinica.prontuarios.add");
		Route::patch("/{id}", ["App\Http\Controllers\Clinica\ProntuariosController", "patch"])->name("clinica.prontuarios.patch");
		Route::delete("/", ["App\Http\Controllers\Clinica\ProntuariosController", "delete"])->name("clinica.prontuarios.delete");
		Route::put("/", ["App\Http\Controllers\Clinica\ProntuariosController", "edit"])->name("clinica.prontuarios.put");
	});
	Route::any("/medicos", ["App\Http\Controllers\Clinica\MedicosController", "index"])->name("clinica.medicos.index");
	Route::prefix("/especialidades")->group(function ($router) use ($route) {
		Route::any("/", ["App\Http\Controllers\Clinica\EspecialidadesController", "index"])->name("clinica.especialidades.index");
		Route::get("/cadastro", ["App\Http\Controllers\Clinica\EspecialidadesController", "form"])->name("clinica.especialidades.add");
		Route::post("/", ["App\Http\Controllers\Clinica\EspecialidadesController", "create"])->name("clinica.especialidades.post");
		Route::any("/{id}", ["App\Http\Controllers\Clinica\EspecialidadesController", "form"])->name("clinica.especialidades.edit");
		Route::patch("/{id}", ["App\Http\Controllers\Clinica\EspecialidadesController", "patch"])->name("clinica.especialidades.patch");
		Route::delete("/", ["App\Http\Controllers\Clinica\EspecialidadesController", "delete"])->name("clinica.especialidades.delete");
		Route::put("/", ["App\Http\Controllers\Clinica\EspecialidadesController", "edit"])->name("clinica.especialidades.put");
	});

});

Route::prefix("/teste")->group(function () {

	Route::any("/", ["App\Http\Controllers\Teste\HomeController", "index"])->name("teste.index");

});
