<?php

use App\Http\Controllers\RouteController;
use App\Http\Controllers\AnnounController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\myAnnounController;
use App\Http\Controllers\addAnnounController;
use App\Http\Controllers\editAnnounController;
use App\Http\Controllers\AdminController;

Route::get('/', [RouteController::class, "home"])->name("home");
Route::get('/category', [RouteController::class, "category"])->name("category");
Route::get('/free', [RouteController::class, "free"])->name("free");

Route::get('/announ', [AnnounController::class, "announ"])->name("announ");
Route::post('/announ', [AnnounController::class, "favorite"])->middleware("auth");

Route::get('/registration', [RegistrationController::class, "registration"])->middleware("guest")->name("registration");
Route::post('/registration', [RegistrationController::class, "create"])->middleware("guest");

Route::get('/authorization', [AuthorizationController::class, "authorization"])->middleware("guest")->name("authorization");
Route::post('/authorization', [AuthorizationController::class, "login"])->middleware("guest");

Route::get('/logout', [AuthorizationController::class, "logout"])->middleware("auth")->name("logout");

Route::get('/profile', [ProfileController::class, "profile"])->middleware("auth")->name("profile");
Route::post('/profile', [ProfileController::class, "newPassword"])->middleware("auth")->name("reset.password");

Route::get('/myannoun', [myAnnounController::class, "myannoun"])->middleware("auth")->name("myannoun");
Route::post('/myannoun', [myAnnounController::class, "delete"])->middleware("auth");

Route::get('/addannoun', [addAnnounController::class, "addannoun"])->middleware("auth")->name("addannoun");
Route::post('/addannoun', [addAnnounController::class, "add"])->middleware("auth");

Route::get('/editannoun', [editAnnounController::class, "editannoun"])->middleware("auth")->name("editannoun");
Route::post('/editannoun', [editAnnounController::class, "edit"])->middleware("auth");

Route::get('/favorite', [FavoriteController::class, "favorite"])->middleware("auth")->name("favorite");
Route::post('/favorite', [FavoriteController::class, "delete"])->middleware("auth");

Route::get('/admin_consid', [AdminController::class, "adminConsid"])->middleware("auth")->name("consid");
Route::get('/admin_approv', [AdminController::class, "adminApprov"])->middleware("auth")->name("approv");
Route::post('/admin_approv', [AdminController::class, "approv"])->middleware("auth");
Route::get('/admin_reject', [AdminController::class, "adminReject"])->middleware("auth")->name("reject");
Route::post('/admin_reject', [AdminController::class, "reject"])->middleware("auth");