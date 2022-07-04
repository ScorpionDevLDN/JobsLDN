<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item mb-2 {{ (request()->is('admin/home')) ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{route('admin.home')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                          fill="#000000" fill-rule="nonzero"/>
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                          fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            @canany('category-list','city-list',
            'per-list',
            'currency-list',
            'type-list',
            'role-list',
            'user-list')

                <li class="menu-item menu-item-submenu mb-2" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">

                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                 version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>

                        <span class="menu-text">Jobs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">

                            @can('category-list')
                                <li class="menu-item {{ (request()->is('admin/categories')) ? 'menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{route('admin.categories.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon"></span>
                                        <span class="menu-text">Categories</span>
                                    </a>
                                </li>
                            @endcan

                            @can('city-list')
                                <li class="menu-item {{ (request()->is('admin/cities')) ? 'menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{route('admin.cities.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon"></span>
                                        <span class="menu-text">Cities</span>
                                    </a>
                                </li>
                            @endcan

                            @can('per-list')
                                <li class="menu-item {{ (request()->is('admin/pers')) ? 'menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{route('admin.pers.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon"></span>
                                        <span class="menu-text">Pers</span>
                                    </a>
                                </li>
                            @endcan

                            @can('currency-list')
                                <li class="menu-item {{ (request()->is('admin/currencies')) ? 'menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{route('admin.currencies.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon"></span>
                                        <span class="menu-text">Currencies</span>
                                    </a>
                                </li>
                            @endcan

                            @can('type-list')
                                <li class="menu-item {{ (request()->is('admin/types')) ? 'menu-item-active' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{route('admin.types.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon"></span>
                                        <span class="menu-text">Types</span>
                                    </a>
                                </li>
                            @endcan

                            <li class="menu-item {{ (request()->is('admin/get-jobs')) ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('admin.get-jobs.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon"></span>
                                    <span class="menu-text">Posts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcanany

            <li class="menu-item mb-2 {{ (request()->is('admin/pages')) ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{route('admin.pages.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Substract.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z"
                                          fill="#000000" fill-rule="nonzero"/>
                                    <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z"
                                          fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                    <span class="menu-text">Pages</span>
                    </span>
                </a>
            </li>

            <li class="menu-item {{ (request()->is('admin/newsletter')) ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{route('admin.newsletter.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="fab fa-mailchimp"></i>
										</span>
                    <span class="menu-text">Newsletter</span>
                </a>
            </li>

            <li class="menu-item mb-2 {{ (request()->is('admin/contacts')) ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{route('admin.contacts')}}" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Headphones.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M19,16 L19,12 C19,8.13400675 15.8659932,5 12,5 C8.13400675,5 5,8.13400675 5,12 L5,16 L19,16 Z M21,16 L3,16 L3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 L21,16 Z"
                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M5,14 L6,14 C7.1045695,14 8,14.8954305 8,16 L8,19 C8,20.1045695 7.1045695,21 6,21 L5,21 C3.8954305,21 3,20.1045695 3,19 L3,16 C3,14.8954305 3.8954305,14 5,14 Z M18,14 L19,14 C20.1045695,14 21,14.8954305 21,16 L21,19 C21,20.1045695 20.1045695,21 19,21 L18,21 C16.8954305,21 16,20.1045695 16,19 L16,16 C16,14.8954305 16.8954305,14 18,14 Z"
                                      fill="#000000"/>
                            </g>
                        </svg>
                    </span>
                    <span class="menu-text">Contacts</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu mb-2 {{ (request()->is('admin/get-payments')) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
            										<span class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
        <rect fill="#000000" x="2" y="8" width="20" height="3"/>
        <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    <span class="menu-text">Payment</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
            				<span class="menu-link">
            					<span class="menu-text">Payment</span>
            				</span>
                        </li>

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{route('admin.get-payments.index')}}" class="menu-link">
                                <span class="svg-icon menu-icon"></span>
                                <span class="menu-text">Payments</span>
                            </a>
                        </li>

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{route('admin.transactions')}}" class="menu-link">
                                <span class="svg-icon menu-icon"></span>
                                <span class="menu-text">Transactions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item mb-2 {{ (request()->is('admin/sliders')) ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{route('admin.sliders.index')}}" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Settings4.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    <span class="menu-text">Sliders</span>
                </a>
            </li>
            {{--Users--}}
            @can('user-list')

                <li class="menu-item menu-item-submenu mb-2" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
            										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                width="24px" height="24px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                        <span class="menu-text">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
            				<span class="menu-link">
            					<span class="menu-text">Users</span>
            				</span>
                            </li>
                            <li class="menu-item {{ (request()->is('admin/roles')) ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('admin.roles.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon"></span>
                                    <span class="menu-text">Roles</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('admin.admins.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon"></span>
                                    <span class="menu-text">Admins</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('admin.get_companies.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon"></span>
                                    <span class="menu-text">Companies</span>
                                </a>
                            </li>

                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('admin.get_job_seekers')}}" class="menu-link">
                                    <span class="svg-icon menu-icon"></span>
                                    <span class="menu-text">Job Seekers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan


            <li class="menu-item mb-2 {{ (request()->is('admin/settings')) ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{route('admin.settings.index')}}" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Settings4.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    <span class="menu-text">Settings</span>
                </a>
            </li>


            <li class="menu-item mb-2" aria-haspopup="true">
                <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
                <a href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Sign-out.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                          fill="#000000" fill-rule="nonzero" opacity="0.3"
                                          transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                    <rect fill="#000000" opacity="0.3"
                                          transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) "
                                          x="13"
                                          y="6" width="2" height="12" rx="1"/>
                                    <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                          fill="#000000" fill-rule="nonzero"
                                          transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                </g>
                            </svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Logout</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>