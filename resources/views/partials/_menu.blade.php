<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        {{-- الرئيسية --}}

        <li>
            <a href="{{ route('dashboard.home',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/dashboards/*') ? 'active':'' }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<path fill="currentColor" d="M8.692 11.25V7.5q0-.336.236-.572q.235-.236.572-.236t.572.236q.236.236.236.572v3.75q0 .337-.236.572q-.236.236-.572.236t-.572-.236t-.236-.572m4.347 1.294V3.5q0-.336.235-.572q.236-.236.572-.236q.337 0 .572.236q.236.236.236.572v9.044q0 .404-.248.606q-.249.202-.557.202t-.56-.202t-.25-.606m-8.731 2.142V11.5q0-.336.235-.572q.236-.236.573-.236t.572.236t.235.572v3.187q0 .404-.248.605q-.248.202-.557.202q-.308 0-.56-.202q-.25-.201-.25-.605m1.085 5.863q-.335 0-.463-.305q-.128-.304.116-.549l3.908-3.907q.217-.218.535-.243t.565.193l2.985 2.565l6.753-6.754H18q-.213 0-.356-.144t-.144-.357t.144-.356t.356-.143h2.692q.344 0 .576.232t.232.576v2.692q0 .213-.144.356t-.357.144t-.356-.144t-.143-.356v-1.792l-6.904 6.904q-.217.217-.535.242t-.565-.193l-2.985-2.565l-3.757 3.758q-.064.06-.161.103t-.2.043" />
</svg>
                </span>
                <span class="menu-text">{{ trans('menu.dashboard-menu-title') }}</span>
                {{-- <span class="toggle-icon"></span> --}}
            </a>
            <ul>
                {{-- <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-one') ? 'active':'' }}"><a href="{{ route('dashboard.demo_one',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-one') }}</a></li> --}}
                {{-- <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-two') ? 'active':'' }}"><a href="{{ route('dashboard.demo_two',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-two') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-three')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_three',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-three') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-four')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_four',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-four') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-five')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_five',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-five') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-six')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_six',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-six') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-seven')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_seven',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-seven') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-eight')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_eight',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-eight') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-nine')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_nine',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-nine') }}</a></li>
                <li class="{{ Request::is(app()->getLocale().'/dashboards/demo-ten')  ? 'active':'' }}"><a href="{{ route('dashboard.demo_ten',app()->getLocale()) }}">{{ trans('menu.dashboard-demo-ten') }}</a></li> --}}
            </ul>
        </li>



        {{-- العملاء --}}

        <!--<li>-->
        <!--    <a class="{{Route::currentRouteName() ==  'all_clients' ? 'active' : '' }}" href="{{ route('all_clients',app()->getLocale()) }}">-->
        <!--        <span class="nav-icon "><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="16px" viewBox="0 0 448 512"><path fill="currentColor" d="M96 128a128 128 0 1 0 256 0a128 128 0 1 0-256 0m94.5 200.2l18.6 31l-33.3 123.9l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7h386.6c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9l-33.3-123.9l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2h-39.5c-12.4 0-20.1 13.6-13.7 24.2z"/></svg></span>-->
        <!--        <span class="menu-text">{{ trans('menu.clients') }}</span>-->
        <!--    </a>-->

        <!--</li>-->
<li class="has-child {{ in_array(Route::currentRouteName(), ['add_clients', 'all_clients']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
		<path d="M5 20.25c0 .414.336.75.75.75h10.652C17.565 21 18 20.635 18 19.4v-1.445M5 20.25A2.25 2.25 0 0 1 7.25 18h10.152q.339 0 .598-.045M5 20.25V6.2c0-1.136-.072-2.389 1.092-2.982C6.52 3 7.08 3 8.2 3h9.2c1.236 0 1.6.437 1.6 1.6v11.8c0 .995-.282 1.425-1 1.555" />
		<path d="M15 14c0-3.861-6-3.861-6 0" />
		<path d="M12 11a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
	</g>
</svg>
        </span>

        <span class="menu-text">{{ trans('menu.clients') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'add_clients' ? 'active' : '' }}"
               href="{{ route('add_clients', app()->getLocale()) }}">
                {{ trans('menu.add_clients') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_clients' ? 'active' : '' }}"
               href="{{ route('all_clients', app()->getLocale()) }}">
                {{ trans('menu.all_clients') }}
            </a>
        </li>
    </ul>
</li>




        {{-- الطلبات --}}

<li class="has-child {{ in_array(Route::currentRouteName(), ['add_order', 'all_orders', 'add_transfer', 'all_transfers']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<path fill="currentColor" d="m17.371 19.827l2.84-2.796l-.626-.627l-2.214 2.183l-.955-.975l-.627.632zM6.77 8.731h10.462v-1H6.769zM18 22.116q-1.671 0-2.835-1.165Q14 19.787 14 18.116t1.165-2.836T18 14.116t2.836 1.164T22 18.116q0 1.67-1.164 2.835Q19.67 22.116 18 22.116M4 20.769V5.616q0-.672.472-1.144T5.616 4h12.769q.67 0 1.143.472q.472.472.472 1.144v5.944q-.244-.09-.484-.154q-.241-.064-.516-.1v-5.69q0-.231-.192-.424T18.384 5H5.616q-.231 0-.424.192T5 5.616V19.05h6.344q.068.41.176.802q.109.392.303.748l-.034.034l-1.135-.826l-1.346.961l-1.346-.961l-1.346.961l-1.347-.961zm2.77-4.5h4.709q.056-.275.138-.515t.192-.485H6.77zm0-3.769h7.31q.49-.387 1.05-.645q.56-.259 1.197-.355H6.769zM5 19.05V5z" />
</svg>
        </span>
        <span class="menu-text">{{ trans('menu.orders') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'add_order' ? 'active' : '' }}"
               href="{{ route('add_order', app()->getLocale()) }}">
                {{ trans('menu.add_order') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_orders' ? 'active' : '' }}"
               href="{{ route('all_orders', app()->getLocale()) }}">
                {{ trans('menu.all_orders') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'add_transfer' ? 'active' : '' }}"
               href="{{ route('add_transfer', app()->getLocale()) }}">
                {{ trans('menu.add_transfer') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_transfers' ? 'active' : '' }}"
               href="{{ route('all_transfers', app()->getLocale()) }}">
                {{ trans('menu.all_transfer') }}
            </a>
        </li>
    </ul>
</li>



        {{-- التسوق بالعمولة --}}

<li class="has-child {{ in_array(Route::currentRouteName(), ['assign_client', 'all_assign_client', 'settings']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
	<path fill="none" stroke="currentColor" d="M10.8 14v-1.7a2 2 0 0 0-2-2H7.2a2 2 0 0 0-2 2V14m9.3-3.5V9.3a2 2 0 0 0-2-2H11m-9.5 3.2V9.3a2 2 0 0 1 2-2H5m4.605-.195a1.605 1.605 0 1 1-3.21 0a1.605 1.605 0 0 1 3.21 0Zm3.8-3a1.605 1.605 0 1 1-3.21 0a1.605 1.605 0 0 1 3.21 0Zm-7.5 0a1.605 1.605 0 1 1-3.21 0a1.605 1.605 0 0 1 3.21 0Z" />
</svg>
        </span>
        <span class="menu-text">{{ trans('menu.marketing') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'assign_client' ? 'active' : '' }}"
               href="{{ route('assign_client', app()->getLocale()) }}">
                {{ trans('menu.assign_client') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_assign_client' ? 'active' : '' }}"
               href="{{ route('all_assign_client', app()->getLocale()) }}">
                {{ trans('menu.assigns_clients') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'settings' ? 'active' : '' }}"
               href="{{ route('settings', app()->getLocale()) }}">
                {{ trans('menu.settings') }}
            </a>
        </li>
    </ul>
</li>




        {{-- المستقلين --}}

<li class="has-child {{ in_array(Route::currentRouteName(), ['get_freelancer', 'get_request_freelancer', 'add_rating', 'all_rating']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<path fill="currentColor" d="M17 3h-3v2h3v16H7V5h3V3H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-5 4a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2m4 8H8v-1c0-1.33 2.67-2 4-2s4 .67 4 2zm0 3H8v-1h8zm-4 2H8v-1h4zm1-15h-2V1h2z" />
</svg>
        </span>
        <span class="menu-text">{{ trans('menu.freelancers') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'get_freelancer' ? 'active' : '' }}"
               href="{{ route('get_freelancer', app()->getLocale()) }}">
                {{ trans('menu.manage-freelancer') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'get_request_freelancer' ? 'active' : '' }}"
               href="{{ route('get_request_freelancer', app()->getLocale()) }}">
                {{ trans('menu.all-request-freelancer') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'add_rating' ? 'active' : '' }}"
               href="{{ route('add_rating', app()->getLocale()) }}">
                {{ trans('menu.rate_freelancer') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_rating' ? 'active' : '' }}"
               href="{{ route('all_rating', app()->getLocale()) }}">
                {{ trans('menu.ratings') }}
            </a>
        </li>
    </ul>
</li>






        {{-- مجالات العمل --}}

<li class="has-child {{ in_array(Route::currentRouteName(), ['all_fields', 'all_sub_fields']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<path fill="currentColor" fill-rule="evenodd" d="M22.75 8a.75.75 0 0 1-.75.75h-5a.75.75 0 0 1 0-1.5h5a.75.75 0 0 1 .75.75m0 4.5a.75.75 0 0 1-.75.75h-4a.75.75 0 0 1 0-1.5h4a.75.75 0 0 1 .75.75m-8.99-5.208l.437.436c.735.736 1.335 1.336 1.745 1.857c.42.534.734 1.098.734 1.764c0 .373-.076.741-.223 1.083c-.263.612-.775 1.006-1.372 1.33c-.583.317-1.371.63-2.338 1.015l-.19.076c-.613.244-.774.316-.897.414a1.3 1.3 0 0 0-.278.307c-.085.133-.14.3-.32.934l-.01.035c-.121.428-.227.8-.34 1.089c-.115.293-.281.622-.594.852a1.75 1.75 0 0 1-1.251.325c-.386-.048-.691-.254-.935-.454a13 13 0 0 1-.827-.786l-1.06-1.06l-2.164 2.163a.75.75 0 0 1-1.06-1.06l2.163-2.164l-1.06-1.06a13 13 0 0 1-.786-.828c-.2-.243-.406-.548-.454-.934a1.75 1.75 0 0 1 .325-1.25c.23-.314.559-.48.852-.595c.288-.113.661-.22 1.09-.34l.034-.01c.634-.18.8-.236.934-.32a1.3 1.3 0 0 0 .307-.278c.098-.123.17-.284.414-.896l.076-.192c.384-.966.698-1.754 1.015-2.337c.324-.597.718-1.109 1.33-1.372a2.75 2.75 0 0 1 1.083-.223c.666 0 1.23.314 1.764.734c.521.41 1.121 1.01 1.857 1.745m-5.624 9.191L6.58 14.927l-.008-.01l-.009-.008l-1.556-1.556c-.348-.348-.569-.57-.714-.746a1 1 0 0 1-.125-.179a.25.25 0 0 1 .04-.155a1 1 0 0 1 .197-.096c.212-.083.514-.17.986-.303l.088-.025c.504-.143.901-.255 1.243-.474a2.8 2.8 0 0 0 .677-.61c.252-.318.404-.702.598-1.189l.091-.23c.407-1.023.689-1.727.958-2.222c.266-.49.454-.645.604-.71a1.3 1.3 0 0 1 .492-.101c.164 0 .397.068.835.413c.443.348.98.883 1.759 1.662l.366.366c.779.779 1.314 1.316 1.662 1.758c.345.439.413.672.413.836c0 .169-.035.337-.102.492c-.064.15-.219.338-.709.604c-.495.269-1.199.55-2.222.958l-.23.091c-.488.194-.87.346-1.189.598a2.8 2.8 0 0 0-.61.677c-.219.342-.331.739-.474 1.243l-.025.088c-.134.472-.22.774-.303.986a1 1 0 0 1-.096.197a.25.25 0 0 1-.155.04a1 1 0 0 1-.18-.125a12 12 0 0 1-.745-.714" clip-rule="evenodd" />
	<path fill="currentColor" d="M22 17.75a.75.75 0 0 0 0-1.5h-9a.75.75 0 0 0 0 1.5z" />
</svg>
        </span>
        <span class="menu-text">{{ trans('menu.fields') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <!-- عرض المجالات الرئيسية -->
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_fields' ? 'active' : '' }}"
               href="{{ route('all_fields', app()->getLocale()) }}">
                {{ trans('menu.main_fields') }}
            </a>
        </li>
        <!-- عرض المجالات الفرعية -->
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_sub_fields' ? 'active' : '' }}"
               href="{{ route('all_sub_fields', app()->getLocale()) }}">
                {{ trans('menu.sub_fields') }}
            </a>
        </li>
                <li>


                                <a class="{{ Route::currentRouteName() == 'all_keywords' ? 'active' : '' }}"
               href="{{ route('all_keywords', app()->getLocale()) }}">
                الكلمات المفتاحية
            </a>

        </li>
    </ul>
</li>




<li class="has-child {{ in_array(Route::currentRouteName(), ['TransfersMethods.all','managementTeam.add', 'SalesTeam.add', 'all_settings']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<path fill="none" stroke="currentColor" stroke-width="2" d="M16 16c0-1.105-3.134-2-7-2s-7 .895-7 2s3.134 2 7 2s7-.895 7-2ZM2 16v4.937C2 22.077 5.134 23 9 23s7-.924 7-2.063V16M9 5c-4.418 0-8 .895-8 2s3.582 2 8 2M1 7v5c0 1.013 3.582 2 8 2M23 4c0-1.105-3.1-2-6.923-2s-6.923.895-6.923 2s3.1 2 6.923 2S23 5.105 23 4Zm-7 12c3.824 0 7-.987 7-2V4M9.154 4v10.166M9 9c0 1.013 3.253 2 7.077 2S23 10.013 23 9" />
</svg>
        </span>
        <span class="menu-text">{{ trans('menu.work_team') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'managementTeam.add' ? 'active' : '' }}"
               href="{{ route('managementTeam.add', app()->getLocale()) }}">
                {{ trans('menu.management_team') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'SalesTeam.add' ? 'active' : '' }}"
               href="{{ route('SalesTeam.add', app()->getLocale()) }}">
                {{ trans('menu.sales_team') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'all_settings' ? 'active' : '' }}"
               href="{{ route('all_settings', app()->getLocale()) }}">
                {{ trans('menu.Budgets') }}
            </a>
        </li>
        <li class="layout">
            <a class="{{ Route::currentRouteName() == 'TransfersMethods.all' ? 'active' : '' }}"
               href="{{ route('TransfersMethods.all', app()->getLocale()) }}">
                {{ trans('menu.transfers_methods') }}
            </a>
        </li>
    </ul>
</li>


        {{-- التقارير المالية --}}

<li class="has-child {{ in_array(Route::currentRouteName(), ['inventory.all', 'inventory.update']) ? 'active' : '' }}">
    <a href="#" class="">
        <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		<path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2" />
		<path d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2m5 6h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3H10m2 0v1m0-8v1" />
	</g>
</svg>
        </span>
        <span class="menu-text">{{ trans('menu.money_report') }}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="layout">
            <a href="{{ route('inventory.all', app()->getLocale()) }}"
               class="{{ Route::currentRouteName() == 'inventory.all' ? 'active' : '' }}">
                <span class="menu-text">جرد</span>
            </a>
        </li>
        <li class="layout">
            <a href="{{ route('inventory.update', app()->getLocale()) }}"
               class="{{ Route::currentRouteName() == 'inventory.update' ? 'active' : '' }}">
                <span class="menu-text">تحديثات الجرد</span>
            </a>
        </li>
    </ul>
</li>




        {{-- المستخدمين --}}
        {{-- @if (Auth::user()->role == "المدير التنفيذي" || Auth::user()->role == "مدير المبيعات" || Auth::user()->role == "مدير الموارد البشرية" || Auth::user()->role == "مسؤول المبيعات") --}}

        <li>
            <a class="{{Route::currentRouteName() ==  'get_user' ? 'active' : '' }}" href="{{ route('get_user',app()->getLocale()) }}">
                <span class="nav-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		<path d="M11.5 15H7a4 4 0 0 0-4 4v2m18.378-4.374a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
		<circle cx="10" cy="7" r="4" />
	</g>
</svg>
                    </span>
                <span class="menu-text">{{ trans('menu.users') }}</span>
            </a>

        </li>


        {{-- @endif --}}





        {{-- الفرانشيز --}}
        @can('عرض الفرانشيز')
        <li >

            <a class="{{Route::currentRouteName() ==  'all_new_franchise' ? 'active' : '' }}" href="{{ route('all_new_franchise',app()->getLocale()) }}">
                <span class="nav-icon">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 8 8">
	<path fill="currentColor" d="M.75 0C.34 0 0 .34 0 .75v5.5c0 .41.34.75.75.75h4.5c.41 0 .75-.34.75-.75V5H5v1H1V1h2V0zM6 0v1C3.95 1 2.3 2.54 2.06 4.53C2.27 3.65 3.05 3 4 3h2v1l2-2z" />
</svg>
                    </span>

                <span class="menu-text">{{ trans('menu.franchise') }}</span>
{{--                <span class="toggle-icon"></span>--}}
            </a>

{{--            <ul>--}}
{{--                <span class="nav-icon uil uil-window-section"></span>--}}
{{--                --}}
{{--                <li class="layout"><a class="{{Route::currentRouteName() ==  'all_new_franchise' ? 'active' : '' }}" href="{{ route('all_new_franchise',app()->getLocale()) }}">{{ trans('menu.all_new_franchise') }}</a></li>--}}
{{--                --}}{{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'all_franchise' ? 'active' : '' }}" href="{{ route('add_clients',app()->getLocale()) }}">{{ trans('menu.add_franchise') }}</a></li> --}}
{{--            </ul>--}}
        </li>
@endcan









        {{-- الصلاحيات --}}

        <li class="has-child">
            <a href="#" class="">
                <span class="nav-icon">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
	<path fill="currentColor" d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8m0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6s6 2.685 6 6s-2.685 6-6 6m0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4m2.595 7.811a3.5 3.5 0 0 1 0-1.622l-.992-.573l1-1.732l.992.573A3.5 3.5 0 0 1 17 14.645V13.5h2v1.145c.532.158 1.012.44 1.405.812l.992-.573l1 1.732l-.991.573a3.5 3.5 0 0 1 0 1.622l.991.573l-1 1.732l-.992-.573a3.5 3.5 0 0 1-1.405.812V22.5h-2v-1.145a3.5 3.5 0 0 1-1.405-.812l-.992.573l-1-1.732zM18 19.5a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3" />
</svg>
                    </span>
                <span class="menu-text">{{ trans('menu.roles_and_permissions') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>

            <li class="layout"><a class="{{Route::currentRouteName() ==  'roles.index' ? 'active' : '' }}" href="{{ route('roles.index',app()->getLocale()) }}">{{ trans('menu.add_role') }}</a></li>

            <li class="layout"><a class="{{Route::currentRouteName() ==  'roles.all' ? 'active' : '' }}" href="{{ route('roles.all',app()->getLocale()) }}">{{ trans('menu.roles') }}</a></li>

                {{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'add_permission' ? 'active' : '' }}" href="{{route('add_permission',app()->getLocale())}}">{{ trans('menu.add_permission') }}</a></li> --}}
               {{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'all_permissions' ? 'active' : '' }}" href="{{ route('all_permissions',app()->getLocale()) }}">{{ trans('menu.permissions') }}</a></li> --}}
                {{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'add_role' ? 'active' : '' }}" href="{{ route('add_role',app()->getLocale()) }}">{{ trans('menu.add_role') }}</a></li> --}}
               {{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'all_roles' ? 'active' : '' }}" href="{{ route('all_roles',app()->getLocale()) }}">{{ trans('menu.roles') }}</a></li>
                <li class="layout"><a class="{{Route::currentRouteName() ==  'add_permission_to_roles' ? 'active' : '' }}" href="{{ route('add_permission_to_roles',app()->getLocale()) }}">{{ trans('menu.add_permission_to_roles') }}</a></li>
                <li class="layout"><a class="{{Route::currentRouteName() ==  'all_roles_permissions' ? 'active' : '' }}" href="{{ route('all_roles_permissions',app()->getLocale()) }}">{{ trans('menu.all_roles_permissions') }}</a></li> --}}
                {{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'request_freelancer' ? 'active' : '' }}" href="{{route('request_freelancer',app()->getLocale())}}">{{ trans('menu.request-freelancer') }}</a></li> --}}
                {{-- <li class="layout"><a class="{{Route::currentRouteName() ==  'get_request_freelancer' ? 'active' : '' }}" href="{{route('get_request_freelancer',app()->getLocale())}}">{{ trans('menu.all-request-freelancer') }}</a></li> --}}
            </ul>
        </li>



        {{-- مصاريف التشغيل  --}}

{{--        <li class="has-child">--}}
{{--                    <a href="#" class="">--}}
{{--                        <span class="nav-icon uil uil-window-section"></span>--}}
{{--                        <span class="menu-text">{{ trans('menu.operating_expenses') }}</span>--}}
{{--                        <span class="toggle-icon"></span>--}}
{{--                    </a>--}}
{{--                    <ul>--}}
{{--                        <li class="layout"><a class="{{Route::currentRouteName() ==  'add_operating' ? 'active' : '' }}" href="{{ route('add_operating',app()->getLocale()) }}">{{ trans('menu.add_operating_expenses') }}</a></li>--}}
{{--                        <li class="layout"><a class="{{Route::currentRouteName() ==  'all_operatings' ? 'active' : '' }}" href="{{ route('all_operatings',app()->getLocale()) }}">{{ trans('menu.all_operating_expenses') }}</a></li>--}}

{{--                    </ul>--}}
{{--        </li>--}}



        {{--  اعدادات الجرد  --}}

{{--        <li class="has-child">--}}
{{--                    <a href="#" class="">--}}
{{--                        <span class="nav-icon uil uil-window-section"></span>--}}
{{--                        <span class="menu-text">{{ trans('menu.inventory_settings') }}</span>--}}
{{--                        <span class="toggle-icon"></span>--}}
{{--                    </a>--}}
{{--                    <ul>--}}
{{--                        <li class="layout"><a class="{{Route::currentRouteName() ==  'add_setting' ? 'active' : '' }}" href="{{ route('add_setting',app()->getLocale()) }}">{{ trans('menu.Budgets') }}</a></li>--}}
{{--                        <li class="layout"><a class="{{Route::currentRouteName() ==  'all_settings' ? 'active' : '' }}" href="{{ route('all_settings',app()->getLocale()) }}">{{ trans('menu.all_settings') }}</a></li>--}}

{{--                    </ul>--}}
{{--        </li>--}}






        {{--   المكتبة التعليمية  --}}


        <li>
            <a class="{{Route::currentRouteName() ==  'create.educational' ? 'active' : '' }}" href="{{ route('create.educational',app()->getLocale()) }}">
                        <span class="nav-icon">

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
	<path fill="currentColor" d="M101.667 400H464V16H100.667A60.863 60.863 0 0 0 40 76.667V430.25h.011c0 .151-.011.3-.011.453c0 35.4 27.782 65.3 60.667 65.3H464V464H100.667C85.664 464 72 448.129 72 430.7c0-16.64 13.585-30.7 29.667-30.7M360 48.333v172.816l-48.4-42.49L264 220.9V48.333ZM232 48v216h31.641l48.075-42.659L360.305 264H392V48h40v320H136.08L136 48Zm-131.333 0H104l.076 320h-2.413A59.8 59.8 0 0 0 72 375.883V76.917A28.825 28.825 0 0 1 100.667 48" />
</svg>
                            </span>
                        <span class="menu-text">{{ trans('menu.educational') }}</span>
                    </a>

        </li>




        {{--   الجرد  --}}

{{--         <li>--}}
{{--            <a href="{{ route('inventory.all',app()->getLocale()) }}" class="{{Route::currentRouteName() ==  'inventory.all' ? 'active' : '' }}">--}}
{{--                <span class="nav-icon uil uil-create-dashboard"></span>--}}
{{--                <span class="menu-text">جرد</span>--}}
{{--            </a>--}}

{{--        </li>--}}


{{--        <li>--}}
{{--            <a href="{{ route('inventory.update',app()->getLocale()) }}" class="{{Route::currentRouteName() ==  'inventory.report' ? 'active' : '' }}">--}}
{{--                <span class="nav-icon uil uil-create-dashboard"></span>--}}
{{--                <span class="menu-text">تحديثات الحرد</span>--}}
{{--            </a>--}}

{{--        </li>--}}

        {{-- الوضع --}}
        {{-- <li class="has-child">
            <a href="#" class="">
                <span class="nav-icon uil uil-window-section"></span>
                <span class="menu-text">{{ trans('menu.layout-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="l_sidebar"><a href="#" data-layout="light">{{ trans('menu.layout-light-mode') }}</a></li>
                <li class="l_sidebar"><a href="#" data-layout="dark">{{ trans('menu.layout-dark-mode') }}</a></li>
                <li class="l_navbar"><a href="#" data-layout="top">{{ trans('menu.layout-top-menu') }}</a></li>
                <li class="layout"><a href="{{ Helper::get_translation_url( 'ar' ) }}">{{ trans('menu.layout-rtl') }}</a></li>
                <li class="layout"><a href="{{ Helper::get_translation_url( 'en' ) }}">{{ trans('menu.layout-ltr') }}</a></li>
            </ul>
        </li> --}}
        {{-- <li>
            <a href="{{ route('changelog',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/changelog') ? 'active':'' }}">
                <span class="nav-icon uil uil-arrow-growth"></span>
                <span class="menu-text">{{ trans('menu.changelog-menu-title') }}</span>
                <span class="badge badge-info-10 menuItem rounded-pill">1.0.1</span>
            </a>
        </li> --}}
        {{-- <li class="menu-title mt-30">
            <span>Applications</span>
        </li> --}}
        {{-- <li class="has-child {{ Request::is(app()->getLocale().'/applications/email/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/email/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-envelope"></span>
                <span class="menu-text">{{ trans('menu.email-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/email/inbox') ? 'active':'' }}" href="{{ route('email.inbox',app()->getLocale()) }}">{{ trans('menu.email-inbox') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/email/read') ? 'active':'' }}" href="{{ route('email.read',app()->getLocale()) }}">{{ trans('menu.email-read') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('chat',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/chat') ? 'active':'' }}">
                <span class="nav-icon uil uil-chat"></span>
                <span class="menu-text">{{ trans('menu.chat-menu-title') }}</span>
                <span class="badge badge-success menuItem rounded-circle">3</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/ecommerce/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-bag"></span>
                <span class="menu-text text-initial">{{ trans('menu.ecommerce-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('ecommerce.products',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/products') ? 'active':'' }}">{{ trans('menu.ecommerce-products') }}</a></li>
                <li><a href="{{ route('ecommerce.product_detail',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/product-detail') ? 'active':'' }}">{{ trans('menu.ecommerce-product-details') }}</a></li>
                <li><a href="{{ route('ecommerce.add_product',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/add-product') ? 'active':'' }}">{{ trans('menu.ecommerce-product-add') }}</a></li>
                <li><a href="{{ route('ecommerce.cart',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/cart') ? 'active':'' }}">{{ trans('menu.ecommerce-cart') }}</a></li>
                <li><a href="{{ route('ecommerce.orders',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/orders') ? 'active':'' }}">{{ trans('menu.ecommerce-orders') }}</a></li>
                <li><a href="{{ route('ecommerce.sellers',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/sellers') ? 'active':'' }}">{{ trans('menu.ecommerce-sellers') }}</a></li>
                <li><a href="{{ route('ecommerce.invoice',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/invoice') ? 'active':'' }}">{{ trans('menu.ecommerce-invoices') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/project/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/project/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-folder"></span>
                <span class="menu-text">{{ trans('menu.project-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('project.project_list',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/project/list') ? 'active':'' }}">{{ trans('menu.project-title') }}</a></li>
                <li><a href="{{ route('project.project_detail',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/project/project-detail') ? 'active':'' }}">{{ trans('menu.project-detail') }}</a></li>
                <li><a href="{{ route('project.create_project',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/project/create') ? 'active':'' }}">{{ trans('menu.create-project') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('calendar',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-calendar-alt"></span>
                <span class="menu-text">{{ trans('menu.calendar-menu-title') }}</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/user/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/user/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-users-alt"></span>
                <span class="menu-text">{{ trans('menu.user-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('user.member',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/member') ? 'active':'' }}">{{ trans('menu.user-team') }}</a></li>
                <li><a href="{{ route('user.grid',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/grid') ? 'active':'' }}">{{ trans('menu.user-grid') }}</a></li>
                <li><a href="{{ route('user.list',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/list') ? 'active':'' }}">{{ trans('menu.user-list') }}</a></li>
                <li><a href="{{ route('user.grid_style',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/grid-style') ? 'active':'' }}">{{ trans('menu.user-grid-style') }}</a></li>
                <li><a href="{{ route('user.group',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/group') ? 'active':'' }}">{{ trans('menu.user-group') }}</a></li>
                <li><a href="{{ route('user.add',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/add') ? 'active':'' }}">{{ trans('menu.user-add') }}</a></li>
                <li><a href="{{ route('user.table',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/user/table') ? 'active':'' }}">{{ trans('menu.user-table') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/contact/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/contact/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-at"></span>
                <span class="menu-text">{{ trans('menu.contact-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/contact/grid') ? 'active':'' }}" href="{{ route('contact.grid',app()->getLocale()) }}">{{ trans('menu.contact-grid') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/contact/list') ? 'active':'' }}" href="{{ route('contact.list',app()->getLocale()) }}">{{ trans('menu.contact-list') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/contact/create') ? 'active':'' }}" href="{{ route('contact.create',app()->getLocale()) }}">{{ trans('menu.contact-create') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('note',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/note') ? 'active':'' }}">
                <span class="nav-icon uil uil-clipboard-notes"></span>
                <span class="menu-text">{{ trans('menu.note-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('todo',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/todo') ? 'active':'' }}">
                <span class="nav-icon uil uil-check-square"></span>
                <span class="menu-text">{{ trans('menu.todo-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('kanban',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/kanban') ? 'active':'' }}">
                <span class="nav-icon uil uil-expand-arrows"></span>
                <span class="menu-text">{{ trans('menu.kanban-menu-title') }}</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/import_export/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/import_export/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-exchange"></span>
                <span class="menu-text">{{ trans('menu.ie-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/import_export/import') ? 'active':'' }}" href="{{ route('import_export.import',app()->getLocale()) }}">{{ trans('menu.ie-import') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/import_export/export') ? 'active':'' }}" href="{{ route('import_export.export',app()->getLocale()) }}">{{ trans('menu.ie-export') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/import_export/export-selected') ? 'active':'' }}" href="{{ route('import_export.export_selected',app()->getLocale()) }}">{{ trans('menu.ie-export-selected') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('filemanager',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/filemanager') ? 'active':'' }}">
                <span class="nav-icon uil uil-repeat"></span>
                <span class="menu-text">{{ trans('menu.filemanager-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('task',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/task') ? 'active':'' }}">
                <span class="nav-icon uil uil-lightbulb-alt"></span>
                <span class="menu-text">{{ trans('menu.task-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('bookmark',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/bookmark') ? 'active':'' }}">
                <span class="nav-icon uil uil-bookmark"></span>
                <span class="menu-text">{{ trans('menu.bookmark-menu-title') }}</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/social/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/social/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-apps"></span>
                <span class="menu-text">{{ trans('menu.social-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li class="nav-item"><a href="{{ route('social.profile',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/social/profile') ? 'active':'' }}">{{ trans('menu.social-profile') }}</a></li>
                <li><a href="{{ route('social.profile_settings',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/social/profile-settings') ? 'active':'' }}">{{ trans('menu.social-profile-setting') }}</a></li>
                <!-- <li class="nav-item"><a class="nav-link {{ Request::is(app()->getLocale().'/applications/social/timeline') ? 'active':'' }}" href="{{ route('social.timeline',app()->getLocale()) }}">{{ trans('menu.social-timeline') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is(app()->getLocale().'/applications/social/activity') ? 'active':'' }}" href="{{ route('social.activity',app()->getLocale()) }}">{{ trans('menu.social-activity') }}</a></li> -->
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/pages/course/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/pages/course/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-books"></span>
                <span class="menu-text">{{ trans('menu.course-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/pages/course/list') ? 'active':'' }}" href="{{ route('pages.course.list',app()->getLocale()) }}">{{ trans('menu.course-list') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/pages/course/detail') ? 'active':'' }}" href="{{ route('pages.course.detail',app()->getLocale()) }}">{{ trans('menu.course-detail') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/support/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/support/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-user"></span>
                <span class="menu-text">{{ trans('menu.support-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/support/support-ticket') ? 'active':'' }}" href="{{ route('support.support_ticket',app()->getLocale()) }}">{{ trans('menu.support-ticket') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/support/support-details') ? 'active':'' }}" href="{{ route('support.support_detail',app()->getLocale()) }}">{{ trans('menu.support-ticket-detail') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/support/new-ticket') ? 'active':'' }}" href="{{ route('support.new_ticket',app()->getLocale()) }}">{{ trans('menu.support-new-ticket') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/job/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/job/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-search"></span>
                <span class="menu-text">{{ trans('menu.job-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/job/job-search') ? 'active':'' }}" href="{{ route('job.job_search',app()->getLocale()) }}">{{ trans('menu.job-search') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/job/job-search-list') ? 'active':'' }}" href="{{ route('job.job_search_list',app()->getLocale()) }}">{{ trans('menu.job-search-list') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/job/job-detail') ? 'active':'' }}" href="{{ route('job.job_detail',app()->getLocale()) }}">{{ trans('menu.job-detail') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/job/job-apply') ? 'active':'' }}" href="{{ route('job.job_apply',app()->getLocale()) }}">{{ trans('menu.job-apply') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/table/*') || Request::is(app()->getLocale().'/pages/dynamic-table') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/table/*') || Request::is(app()->getLocale().'/pages/dynamic-table') ? 'active':'' }}">
                <span class="nav-icon uil uil-table"></span>
                <span class="menu-text">{{ trans('menu.table-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('table.basic',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/table/basic') ? 'active':'' }}">{{ trans('menu.table-basic') }}</a></li>
                <li><a href="{{ route('table.data',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/table/data') ? 'active':'' }}">{{ trans('menu.table-data') }}</a></li>
                <li><a href="{{ route('pages.dynamic_table',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/dynamic-table') ? 'active':'' }}">{{ trans('menu.dynamic-table-menu-title') }}</a></li>
            </ul>
        </li>
        <li class="menu-title mt-30">
            <span>CRUD</span>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/customer/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/customer/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-database"></span>
                <span class="menu-text">{{ trans('menu.customer-crud-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/customer/list') ? 'active':'' }}" href="{{ route('customer.list',app()->getLocale()) }}">{{ trans('menu.customer-view-all') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/customer/create') ? 'active':'' }}" href="{{ route('customer.create',app()->getLocale()) }}">{{ trans('menu.customer-add-new') }}</a></li>
            </ul>
        </li>
        <li class="menu-title mt-30">
            <span>Features</span>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/ui/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/ui/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-layers"></span>
                <span class="menu-text">{{ trans('menu.ui-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/alert') ? 'active':'' }}" href="{{ route('ui.alert',app()->getLocale()) }}">{{ trans('menu.ui-alert') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/avatar') ? 'active':'' }}" href="{{ route('ui.avatar',app()->getLocale()) }}">{{ trans('menu.ui-avatar') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/badge') ? 'active':'' }}" href="{{ route('ui.badge',app()->getLocale()) }}">{{ trans('menu.ui-badge') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/breadcrumps') ? 'active':'' }}" href="{{ route('ui.breadcrumps',app()->getLocale()) }}">{{ trans('menu.ui-breadcrumb') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/button') ? 'active':'' }}" href="{{ route('ui.button',app()->getLocale()) }}">{{ trans('menu.ui-button') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/card') ? 'active':'' }}" href="{{ route('ui.card',app()->getLocale()) }}">{{ trans('menu.ui-card') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/carousel') ? 'active':'' }}" href="{{ route('ui.carousel',app()->getLocale()) }}">{{ trans('menu.ui-carousel') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/checkbox') ? 'active':'' }}" href="{{ route('ui.checkbox',app()->getLocale()) }}">{{ trans('menu.ui-checkbox') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/collapse') ? 'active':'' }}" href="{{ route('ui.collapse',app()->getLocale()) }}">{{ trans('menu.ui-collapse') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/comments') ? 'active':'' }}" href="{{ route('ui.comments',app()->getLocale()) }}">{{ trans('menu.ui-comment') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/dashboard-base') ? 'active':'' }}" href="{{ route('ui.dashboard_base',app()->getLocale()) }}">{{ trans('menu.ui-dashboard-base') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/datepicker') ? 'active':'' }}" href="{{ route('ui.datepicker',app()->getLocale()) }}">{{ trans('menu.ui-date-picker') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/drawer') ? 'active':'' }}" href="{{ route('ui.drawer',app()->getLocale()) }}">{{ trans('menu.ui-drawer') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/drag-drop') ? 'active':'' }}" href="{{ route('ui.drag_drop',app()->getLocale()) }}">{{ trans('menu.ui-drag-drop') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/dropdown') ? 'active':'' }}" href="{{ route('ui.dropdown',app()->getLocale()) }}">{{ trans('menu.ui-dropdown') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/empty') ? 'active':'' }}" href="{{ route('ui.empty',app()->getLocale()) }}">{{ trans('menu.ui-empty') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/grid') ? 'active':'' }}" href="{{ route('ui.grid',app()->getLocale()) }}">{{ trans('menu.ui-grid') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/input') ? 'active':'' }}" href="{{ route('ui.input',app()->getLocale()) }}">{{ trans('menu.ui-input') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/list') ? 'active':'' }}" href="{{ route('ui.list',app()->getLocale()) }}">{{ trans('menu.ui-list') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/menu') ? 'active':'' }}" href="{{ route('ui.menu',app()->getLocale()) }}">{{ trans('menu.ui-menu') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/message') ? 'active':'' }}" href="{{ route('ui.message',app()->getLocale()) }}">{{ trans('menu.ui-message') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/modals') ? 'active':'' }}" href="{{ route('ui.modals',app()->getLocale()) }}">{{ trans('menu.ui-modal') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/notification') ? 'active':'' }}" href="{{ route('ui.notification',app()->getLocale()) }}">{{ trans('menu.ui-notification') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/page-header') ? 'active':'' }}" href="{{ route('ui.page_header',app()->getLocale()) }}">{{ trans('menu.ui-page-header') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/pagination') ? 'active':'' }}" href="{{ route('ui.pagination',app()->getLocale()) }}">{{ trans('menu.ui-pagination') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/progress') ? 'active':'' }}" href="{{ route('ui.progress',app()->getLocale()) }}">{{ trans('menu.ui-progress') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/radio') ? 'active':'' }}" href="{{ route('ui.radio',app()->getLocale()) }}">{{ trans('menu.ui-radio') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/rate') ? 'active':'' }}" href="{{ route('ui.rate',app()->getLocale()) }}">{{ trans('menu.ui-rate') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/result') ? 'active':'' }}" href="{{ route('ui.result',app()->getLocale()) }}">{{ trans('menu.ui-result') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/select') ? 'active':'' }}" href="{{ route('ui.select',app()->getLocale()) }}">{{ trans('menu.ui-select') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/skeleton') ? 'active':'' }}" href="{{ route('ui.skeleton',app()->getLocale()) }}">{{ trans('menu.ui-skeleton') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/slider') ? 'active':'' }}" href="{{ route('ui.slider',app()->getLocale()) }}">{{ trans('menu.ui-slider') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/spinner') ? 'active':'' }}" href="{{ route('ui.spinner',app()->getLocale()) }}">{{ trans('menu.ui-spinner') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/statistic') ? 'active':'' }}" href="{{ route('ui.statistic',app()->getLocale()) }}">{{ trans('menu.ui-statistic') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/steps') ? 'active':'' }}" href="{{ route('ui.steps',app()->getLocale()) }}">{{ trans('menu.ui-step') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/switch') ? 'active':'' }}" href="{{ route('ui.switch',app()->getLocale()) }}">{{ trans('menu.ui-switch') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/tab') ? 'active':'' }}" href="{{ route('ui.tab',app()->getLocale()) }}">{{ trans('menu.ui-tab') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/tags') ? 'active':'' }}" href="{{ route('ui.tags',app()->getLocale()) }}">{{ trans('menu.ui-tag') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/timeline') ? 'active':'' }}" href="{{ route('ui.timeline',app()->getLocale()) }}">{{ trans('menu.ui-timeline') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/timeline2') ? 'active':'' }}" href="{{ route('ui.timeline2',app()->getLocale()) }}">{{ trans('menu.ui-timeline2') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/timeline3') ? 'active':'' }}" href="{{ route('ui.timeline3',app()->getLocale()) }}">{{ trans('menu.ui-timeline3') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/timepicker') ? 'active':'' }}" href="{{ route('ui.timepicker',app()->getLocale()) }}">{{ trans('menu.ui-time-picker') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/ui/uploads') ? 'active':'' }}" href="{{ route('ui.uploads',app()->getLocale()) }}">{{ trans('menu.ui-upload') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/chart/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/chart/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-chart"></span>
                <span class="menu-text">{{ trans('menu.chart-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/chart/chartjs') ? 'active':'' }}" href="{{ route('chart.chartjs',app()->getLocale()) }}">{{ trans('menu.chart-js') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/chart/apexchart') ? 'active':'' }}" href="{{ route('chart.apexchart',app()->getLocale()) }}">{{ trans('menu.apex-chart') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/chart/google') ? 'active':'' }}" href="{{ route('chart.google',app()->getLocale()) }}">{{ trans('menu.chart-google') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/chart/peity') ? 'active':'' }}" href="{{ route('chart.peity',app()->getLocale()) }}">{{ trans('menu.chart-peity') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/form/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/form/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-keyhole-circle"></span>
                <span class="menu-text">{{ trans('menu.form-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/form/basic') ? 'active':'' }}" href="{{ route('form.basic',app()->getLocale()) }}">{{ trans('menu.form-basic') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/form/layout') ? 'active':'' }}" href="{{ route('form.layout',app()->getLocale()) }}">{{ trans('menu.form-layout') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/form/element') ? 'active':'' }}" href="{{ route('form.element',app()->getLocale()) }}">{{ trans('menu.form-element') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/form/component') ? 'active':'' }}" href="{{ route('form.component',app()->getLocale()) }}">{{ trans('menu.form-component') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/form/validation') ? 'active':'' }}" href="{{ route('form.validation',app()->getLocale()) }}">{{ trans('menu.form-validation') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/widget/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/widget/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-server"></span>
                <span class="menu-text">{{ trans('menu.widget-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/widget/chart') ? 'active':'' }}" href="{{ route('widget.chart',app()->getLocale()) }}">{{ trans('menu.widget-chart') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/widget/mixed') ? 'active':'' }}" href="{{ route('widget.mixed',app()->getLocale()) }}">{{ trans('menu.widget-mixed') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/widget/card') ? 'active':'' }}" href="{{ route('widget.card',app()->getLocale()) }}">{{ trans('menu.widget-card') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/wizard/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/wizard/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-square"></span>
                <span class="menu-text">{{ trans('menu.wizard-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('wizard.one',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/wizard/one') ? 'active':'' }}">{{ trans('menu.wizard-one') }}</a></li>
                <li><a href="{{ route('wizard.two',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/wizard/two') ? 'active':'' }}">{{ trans('menu.wizard-two') }}</a></li>
                <li><a href="{{ route('wizard.three',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/wizard/three') ? 'active':'' }}">{{ trans('menu.wizard-three') }}</a></li>
                <li><a href="{{ route('wizard.four',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/wizard/four') ? 'active':'' }}">{{ trans('menu.wizard-four') }}</a></li>
                <li><a href="{{ route('wizard.five',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/wizard/five') ? 'active':'' }}">{{ trans('menu.wizard-five') }}</a></li>
            </ul>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/icon/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/icon/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-grid"></span>
                <span class="menu-text">{{ trans('menu.icon-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('icon.unicon',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/icon/unicon') ? 'active':'' }}">{{ trans('menu.icon-unicon') }}</a></li>
                <li><a href="{{ route('icon.awesome',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/icon/awesome') ? 'active':'' }}">{{ trans('menu.icon-awesome') }}</a></li>
                <li><a href="{{ route('icon.lineawesome',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/icon/lineawesome') ? 'active':'' }}">{{ trans('menu.icon-line') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('editor',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/editor') ? 'active':'' }}">
                <span class="nav-icon uil uil-edit"></span>
                <span class="menu-text">{{ trans('menu.editor-menu-title') }}</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/map/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/map/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-map"></span>
                <span class="menu-text">{{ trans('menu.map-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('map.google',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/map/google') ? 'active':'' }}">{{ trans('menu.map-google') }}</a></li>
                <li><a href="{{ route('map.leaflet',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/map/leaflet') ? 'active':'' }}">{{ trans('menu.map-leaflet') }}</a></li>
                <li><a href="{{ route('map.vector',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/map/vector') ? 'active':'' }}">{{ trans('menu.map-vector') }}</a></li>
            </ul>
        </li>
        <li class="menu-title mt-30">
            <span>Pages</span>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/pages/gallery/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/pages/gallery/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-images"></span>
                <span class="menu-text">{{ trans('menu.gallery-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('pages.gallery1',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/gallery/gallery1') ? 'active':'' }}">{{ trans('menu.gallery-one') }}</a></li>
                <li>
                    <a href="{{ route('pages.gallery2',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/gallery/gallery2') ? 'active':'' }}">{{ trans('menu.gallery-two') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('pages.pricing',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/pricing') ? 'active':'' }}">
                <span class="nav-icon uil uil-bill"></span>
                <span class="menu-text">{{ trans('menu.pricing-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.banner',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/banner') ? 'active':'' }}">
                <span class="nav-icon uil uil-thumbs-up"></span>
                <span class="menu-text">{{ trans('menu.banner-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.testimonial',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/testimonial') ? 'active':'' }}">
                <span class="nav-icon uil uil-book-open"></span>
                <span class="menu-text">{{ trans('menu.testimonial-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.faq',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/faq') ? 'active':'' }}">
                <span class="nav-icon uil uil-question-circle"></span>
                <span class="menu-text">{{ trans('menu.faq-menu-title') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('pages.search_result',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/search/result') ? 'active':'' }}">
                <span class="nav-icon uil uil-credit-card-search"></span>
                <span class="menu-text">{{ trans('menu.search-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.blank',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/blank') ? 'active':'' }}">
                <span class="nav-icon uil uil-circle"></span>
                <span class="menu-text">{{ trans('menu.blank-menu-title') }}</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/pages/knowledge/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/pages/knowledge/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-window"></span>
                <span class="menu-text">{{ trans('menu.knowledge-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/pages/knowledge/base') ? 'active':'' }}" href="{{ route('pages.knowledge_base',app()->getLocale()) }}">{{ trans('menu.knowledge-base') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/pages/knowledge/all-articles') ? 'active':'' }}" href="{{ route('pages.all_articles',app()->getLocale()) }}">{{ trans('menu.knowledge-all-article') }}</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/pages/knowledge/article') ? 'active':'' }}" href="{{ route('pages.article',app()->getLocale()) }}">{{ trans('menu.knowledge-single-article') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('pages.support',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/support/center') ? 'active':'' }}">
                <span class="nav-icon uil uil-headphones"></span>
                <span class="menu-text">{{ trans('menu.support-menu-title') }}</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/pages/blog/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/pages/blog/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-images"></span>
                <span class="menu-text">{{ trans('menu.blog-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('pages.blog.one',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/blog/one') ? 'active':'' }}">{{ trans('menu.blog-style-one') }}</a></li>
                <li><a href="{{ route('pages.blog.two',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/blog/two') ? 'active':'' }}">{{ trans('menu.blog-style-two') }}</a></li>
                <li><a href="{{ route('pages.blog.three',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/blog/three') ? 'active':'' }}">{{ trans('menu.blog-style-three') }}</a></li>
                <li><a href="{{ route('pages.blog.detail',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/blog/detail') ? 'active':'' }}">{{ trans('menu.blog-detail') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('pages.terms',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/terms-and-condition') ? 'active':'' }}">
                <span class="nav-icon uil uil-question-circle"></span>
                <span class="menu-text">{{ trans('menu.terms-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.maintenance',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/maintenance') ? 'active':'' }}">
                <span class="nav-icon uil uil-airplay"></span>
                <span class="menu-text">{{ trans('menu.maintenance-menu-title') }}</span>
            </a>
        </li>
        <!-- <li>
            <a href="{{ route('pages.setting',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/setting') ? 'active':'' }}">
                <span class="nav-icon uil uil-setting"></span>
                <span class="menu-text">{{ trans('menu.setting-menu-title') }}</span>
            </a>
        </li> -->
        <li>
            <a href="{{ route('pages.404',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/404') ? 'active':'' }}">
                <span class="nav-icon uil uil-exclamation-triangle"></span>
                <span class="menu-text">{{ trans('menu.not-found-menu-title') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.coming_soon',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/coming-soon') ? 'active':'' }}">
                <span class="nav-icon uil uil-sync"></span>
                <span class="menu-text">{{ trans('menu.coming-soon-menu-title') }}</span>
            </a>
        </li>
        @if(Request::is(app()->getLocale().'/dashboards/demo-five'))
            <div class="card sidebar__feature shadow-none bg-transparent border-0 py-sm-50 px-sm-35 text-center">
                <div class="px-15 mb-sm-35 mb-20">
                    <img src="{{ asset('assets/img/sidebar-feature.png') }}" alt="book">
                </div>
                <h3>Get More Feature by Upgrading</h3>
                <button type="button" class="btn btn-primary inline-flex mt-sm-35 mt-20">
                    Go Premium
                </button>
            </div>
        @endif
    </ul> --}}

</div>
