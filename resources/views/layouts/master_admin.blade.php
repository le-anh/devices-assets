@extends('layouts.master')

@section('contents')
<div class="inner-wrapper">
    <aside id="sidebar-left" class="sidebar-left">
        <div class="sidebar-header">
            <div class="sidebar-title" style="color: aliceblue;">
                <strong> TRUE COFFEE </strong>
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">

                        <li>
                            <a href=" {{ route('admin.bill.index') }} ">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span>Bill</span>
                            </a>
                        </li>

                        <li>
                            <a href=" {{ route('admin.order.index') }} ">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span>Order</span>
                            </a>
                        </li>

                        <li>
                            <a href=" {{ route('admin.order.delivered.index') }} ">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                <span>Order-Delivered</span>
                            </a>
                        </li>

                        <li>
                            <a href=" {{ route('admin.customer.index') }} ">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>Customer</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href=" {{ route('admin.product.index') }} ">
                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                <span>Product</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </aside>

    <section role="main" class="content-body">
        <header class="page-header">
            <div class="m-2">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.index')}}">
                            <h2> <i class="fa fa-home"></i> Dashboard </h2>
                        </a>
                    </li>
                    <!-- <li> <h2> <span>Dashboard</span> </h2> </li> -->
                    @yield('breadcrumbs')
                </ol>

                <a class="sidebar-right-toggle"></a>
            </div>
        </header>

        <div class="row">
            @yield('content')
        </div>
    </section>
</div>
@endsection