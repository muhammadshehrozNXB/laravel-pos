<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
<span>
<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
<span class="btn-icon-wrapper">
<i class="fa fa-ellipsis-v fa-w-6"></i>
</span>
</button>
</span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="mm-active">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('purchaser-list')}}">
                                <i class="metismenu-icon"></i>Purchaser List
                            </a>
                        </li>
                        <li>
                            <a href="dashboards-commerce.html">
                                <i class="metismenu-icon"></i>Commerce
                            </a>
                        </li>
                        <li>
                            <a href="dashboards-sales.html">
                                <i class="metismenu-icon">
                                </i>Sales
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i> Minimal
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="dashboards-minimal-1.html">
                                        <i class="metismenu-icon"></i>Variation 1
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboards-minimal-2.html">
                                        <i class="metismenu-icon"></i>Variation 2
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="dashboards-crm.html">
                                <i class="metismenu-icon"></i> CRM
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"
                       class="{{Request::is("products-list") || Request::is("products-type") || Request::is("suppliers-list") ? "mm-active" : ""}}">
                        <i class="metismenu-icon pe-7s-browser"></i>Products
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route("products-type")}}">
                                <i class="metismenu-icon"></i> Products Type
                            </a>
                        </li>
                        <li>
                            <a href="{{route("products-list")}}">
                                <i class="metismenu-icon"></i>Products
                            </a>
                        </li>
                        <li>
                            <a href="{{route("suppliers-list")}}">
                                <i class="metismenu-icon"></i>Suppliers
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{Request::is("customers/show") ? "mm-active" : ""}}">
                        <i class="metismenu-icon pe-7s-plugin"></i>Customers
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('customers-list')}}">
                                <i class="metismenu-icon"></i>Customers
                            </a>
                        </li>
                        <li>
                            <a href="apps-chat.html">
                                <i class="metismenu-icon"></i>Chat
                            </a>
                        </li>
                        <li>
                            <a href="apps-faq-section.html">
                                <i class="metismenu-icon"></i>FAQ Section
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>Forums
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="apps-forum-list.html">
                                        <i class="metismenu-icon"></i>Forum Listing
                                    </a>
                                </li>
                                <li>
                                    <a href="apps-forum-threads.html">
                                        <i class="metismenu-icon"></i>Forum Threads
                                    </a>
                                </li>
                                <li>
                                    <a href="apps-forum-discussion.html">
                                        <i class="metismenu-icon"></i>Forum Discussion
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{Request::is("purchase-order/show") ? "mm-active" : ""}}">
                        <i class="metismenu-icon pe-7s-plugin"></i>Purchase Order
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('customers-purchase-order')}}">
                                <i class="metismenu-icon"></i>Purchase Order
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
