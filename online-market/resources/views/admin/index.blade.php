@extends('layouts.app')

@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light border-end ">
                <div
                    class="d-flex flex-column justify-content-between align-items-center align-items-sm-start px-3 pt-2 text-white ">
                    <!-- Заголовок меню -->
                    <div>
                        <a href="{{ route('admin.index') }}"
                           class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Admin Panel</span>
                        </a>

                        <!-- элементы меню -->
                        <ul class="nav nav-pills flex-column  align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{ route('admin.index') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i>
                                    <span class="ms-1 d-none d-sm-inline">Create product</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <hr>
                    <!-- нижнее дополнительное меню -->
                    <div class="dropdown pb-4 mb-1">
                        <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle"
                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                 class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Новый проект</a></li>
                            <li><a class="dropdown-item" href="#">Настройки</a></li>
                            <li><a class="dropdown-item" href="#">Профиль</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- содержимое -->
            <div class="col py-3">
                <div class="wrapper" bis_skin_checked="1">
                    <div class="row no-gutters" bis_skin_checked="1">
                        <div class="col-lg-6" bis_skin_checked="1">
                            <div class="contact-wrap w-100 p-md-5 p-4" bis_skin_checked="1">
                                <h3>Product Creation</h3>
                                <p class="mb-4">Fill in the fields below to create a product</p>

                                <form method="POST" id="contactForm" name="contactForm" class="contactForm mt-1"
                                      novalidate="novalidate">
                                    <div class="row mt-1" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="Product name" wfd-id="id0">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <input type="number" class="form-control" name="price" id="price"
                                                       placeholder="Price" wfd-id="id1">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <textarea name="description" class="form-control" id="message" cols="50"
                                                          rows="4" placeholder="Product description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <input type="submit" value="Create product" class="btn btn-primary"
                                                       wfd-id="id3">
                                                <div class="submitting" bis_skin_checked="1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch" bis_skin_checked="1">
                            <div class="info-wrap w-100 p-5 img img-fluid"
                                 style="background-image: url(https://ecs7.tokopedia.net/img/cache/700/product-1/2018/7/18/1552895/1552895_eeb91cc8-5d6b-4b2e-b0b9-16a7e917d0ad_750_727.jpg);"
                                 bis_skin_checked="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
