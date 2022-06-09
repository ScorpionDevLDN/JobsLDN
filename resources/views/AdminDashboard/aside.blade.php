<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ (request()->is('admin/home')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
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
                <li class="menu-section">
                    <h4 class="menu-text">Job Settings</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
            										<span class="svg-icon menu-icon">
            											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                                                        <i class="fas fa-viruses text-inverse-primary"></i>
                                                        <!--end::Svg Icon-->
            										</span>
                        <span class="menu-text">Job Settings</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
            				<span class="menu-link">
            					<span class="menu-text">Pages</span>
            				</span>
                            </li>
                            @can('category-list')
                                <li class="menu-item {{ (request()->is('admin/categories')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{route('admin.categories.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="fas fa-cubes text-info"></i>
										</span>
                                        <span class="menu-text">Categories</span>
                                    </a>
                                </li>
                            @endcan

                            @can('city-list')
                                <li class="menu-item {{ (request()->is('admin/cities')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{route('admin.cities.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<img src="{{asset('assets/icons/location.svg')}}" alt="">
										</span>
                                        <span class="menu-text">Cities</span>
                                    </a>
                                </li>
                            @endcan

                            @can('per-list')
                                <li class="menu-item {{ (request()->is('admin/pers')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{route('admin.pers.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<img src="{{asset('assets/icons/wallet.svg')}}" alt="">
										</span>
                                        <span class="menu-text">Pers</span>
                                    </a>
                                </li>
                            @endcan

                            @can('currency-list')
                                <li class="menu-item {{ (request()->is('admin/currencies')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{route('admin.currencies.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="far fa-money-bill-alt text-success mr-5"></i>
                    <span class="menu-text">Currencies</span>
                    </span></a>
                                </li>
                            @endcan

                            @can('type-list')
                                <li class="menu-item {{ (request()->is('admin/types')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{route('admin.types.index')}}" class="menu-link">
                                        <img class="mr-5" src="{{asset('assets/icons/full_time.svg')}}" alt="">
                                        <span class="menu-text">Types</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcanany

            {{--Users--}}
            @can('user-list')
                <li class="menu-section">
                    <h4 class="menu-text">Users</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
            										<span class="svg-icon menu-icon">
            											<i class="fas fa-users text-inverse-primary"></i>
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
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('admin.admins.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="flaticon2-avatar text-inverse-primary"></i>
										</span>
                                    <span class="menu-text">Admins</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('admin.get_companies')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="fas fa-user-tie text-success"></i>
										</span>
                                    <span class="menu-text">Companies</span>
                                </a>
                            </li>

                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{route('admin.get_job_seekers')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="fa fa-user-cog text-primary"></i>
										</span>
                                    <span class="menu-text">Job Seekers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan

            {{--      Jobs      --}}
            <li class="menu-section">
                <h4 class="menu-text">Jobs</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item {{ (request()->is('admin/get-jobs')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.get-jobs.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="far fa-check-square text-inverse-primary"></i>
										</span>
                    <span class="menu-text">jobs</span>
                </a>
            </li>

            <li class="menu-item {{ (request()->is('admin/newsletter')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.newsletter.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="far fa-check-square text-inverse-primary"></i>
										</span>
                    <span class="menu-text">Newsletter</span>
                </a>
            </li>

            <li class="menu-item {{ (request()->is('admin/get-payments')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.get-payments.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="far fa-check-square text-inverse-primary"></i>
										</span>
                    <span class="menu-text">Payments</span>
                </a>
            </li>

            {{--layout--}}
            <li class="menu-section">
                <h4 class="menu-text">Layout</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item {{ (request()->is('admin/roles')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.roles.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="far fa-check-square text-inverse-primary"></i>
										</span>
                    <span class="menu-text">Roles</span>
                </a>
            </li>
            <li class="menu-item {{ (request()->is('admin/pages')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.pages.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="flaticon2-sheet text-inverse-primary"></i>
										</span>
                    <span class="menu-text">Dynamic Pages</span>
                </a>
            </li>
            <li class="menu-item {{ (request()->is('admin/contacts')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.contacts')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="flaticon-multimedia-2 text-inverse-primary"></i>
										</span>
                    <span class="menu-text">Contacts</span>
                </a>
            </li>
            <li class="menu-item {{ (request()->is('admin/settings')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('admin.settings.index')}}" class="menu-link">
					<span class="svg-icon menu-icon">
						<i class="fas fa-wrench text-inverse-primary"></i>
										</span>
                    <span class="menu-text">Settings</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>