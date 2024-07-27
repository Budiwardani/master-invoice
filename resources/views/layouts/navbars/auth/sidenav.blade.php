<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}">
            <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Master Invoice</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Transaction</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'sales-letter') == true ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M428.522,0H150.261c-46.03,0-83.478,37.448-83.478,83.478v328.348H16.696C7.475,411.826,0,419.301,0,428.522
                                    C0,474.552,37.448,512,83.478,512h211.478c46.03,0,83.478-37.448,83.478-83.478V100.174h116.87c9.22,0,16.696-7.475,16.696-16.696
                                    C512,37.448,474.552,0,428.522,0z M83.478,478.609c-21.767,0-40.336-13.956-47.226-33.391h176.906
                                    c2.513,12.33,7.755,23.68,15.062,33.391H83.478z M345.043,83.478v345.043c0,27.618-22.469,50.087-50.087,50.087
                                    c-27.618,0-50.087-22.469-50.087-50.087c0-9.22-7.475-16.696-16.696-16.696h-128V83.478c0-27.618,22.469-50.087,50.087-50.087
                                    h211.524C351.28,47.353,345.043,64.7,345.043,83.478z M381.295,66.783c6.891-19.435,25.46-33.391,47.226-33.391
                                    s40.336,13.956,47.226,33.391H381.295z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="150.261" cy="116.87" r="16.696"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M294.957,100.174h-77.913c-9.22,0-16.696,7.475-16.696,16.696s7.475,16.696,16.696,16.696h77.913
                                    c9.22,0,16.696-7.475,16.696-16.696S304.177,100.174,294.957,100.174z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="150.261" cy="183.652" r="16.696"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M294.957,166.957h-77.913c-9.22,0-16.696,7.475-16.696,16.696c0,9.22,7.475,16.696,16.696,16.696h77.913
                                    c9.22,0,16.696-7.475,16.696-16.696C311.652,174.432,304.177,166.957,294.957,166.957z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="150.261" cy="250.435" r="16.696"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M294.957,233.739h-77.913c-9.22,0-16.696,7.475-16.696,16.696c0,9.22,7.475,16.696,16.696,16.696h77.913
                                    c9.22,0,16.696-7.475,16.696-16.696C311.652,241.214,304.177,233.739,294.957,233.739z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="150.261" cy="317.217" r="16.696"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M294.957,300.522h-77.913c-9.22,0-16.696,7.475-16.696,16.696s7.475,16.696,16.696,16.696h77.913
                                    c9.22,0,16.696-7.475,16.696-16.696S304.177,300.522,294.957,300.522z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M510.238,209.577l-33.391-66.783c-6.14-12.28-23.721-12.29-29.866,0l-33.391,66.783c-1.16,2.318-1.763,4.874-1.763,7.466
                                    v244.87c0,27.618,22.469,50.087,50.087,50.087S512,489.531,512,461.913v-244.87C512,214.451,511.397,211.896,510.238,209.577z
                                    M478.609,461.913c0,9.206-7.49,16.696-16.696,16.696s-16.696-7.49-16.696-16.696v-16.696h33.391V461.913z M478.609,411.826
                                    h-33.391V267.13h33.391V411.826z M478.609,233.739h-33.391v-12.754l16.696-33.391l16.696,33.391V233.739z"/>
                            </g>
                        </g>
                    </svg>
                    </div>
                    <span class="nav-link-text ms-1">Sales Letters</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'puchase-order') == true ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M461.913,378.435c27.618,0,50.087-22.469,50.087-50.087V128c0-9.22-7.475-16.696-16.696-16.696h-384V50.087
                                    C111.304,22.469,88.835,0,61.217,0H16.696C7.475,0,0,7.475,0,16.696s7.475,16.696,16.696,16.696h44.522
                                    c9.206,0,16.696,7.49,16.696,16.696c0,16.49,0,348.279,0,364.611c-19.433,6.892-33.391,25.45-33.391,47.215
                                    c0,27.618,22.469,50.087,50.087,50.087c21.766,0,40.323-13.959,47.215-33.391h272.874C421.59,498.041,440.147,512,461.913,512
                                    C489.531,512,512,489.531,512,461.913s-22.469-50.087-50.087-50.087c-21.766,0-40.323,13.959-47.215,33.391H141.824
                                    c-5.039-14.207-16.313-25.481-30.52-30.52v-36.263H461.913z M111.304,144.696h367.304v183.652c0,9.206-7.49,16.696-16.696,16.696
                                    H111.304V144.696z M461.913,445.217c9.206,0,16.696,7.49,16.696,16.696s-7.49,16.696-16.696,16.696s-16.696-7.49-16.696-16.696
                                    S452.707,445.217,461.913,445.217z M94.609,478.609c-9.206,0-16.696-7.49-16.696-16.696s7.49-16.696,16.696-16.696
                                    s16.696,7.49,16.696,16.696S103.815,478.609,94.609,478.609z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M161.391,178.087c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696
                                    s16.696-7.475,16.696-16.696V194.783C178.087,185.562,170.612,178.087,161.391,178.087z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M228.174,178.087c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696
                                    c9.22,0,16.696-7.475,16.696-16.696V194.783C244.87,185.562,237.394,178.087,228.174,178.087z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M294.957,178.087c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696
                                    s16.696-7.475,16.696-16.696V194.783C311.652,185.562,304.177,178.087,294.957,178.087z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M361.739,178.087c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696
                                    s16.696-7.475,16.696-16.696V194.783C378.435,185.562,370.96,178.087,361.739,178.087z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M428.522,178.087c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696
                                    s16.696-7.475,16.696-16.696V194.783C445.217,185.562,437.742,178.087,428.522,178.087z"/>
                            </g>
                        </g>
                    </svg>
                    </div>
                    <span class="nav-link-text ms-1">Purchase Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'shipment') == true ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M495.304,55.652H217.043c-9.22,0-16.696,7.475-16.696,16.696v50.087c-15.823,0-98.755,0-116.87,0
                                    c-27.618,0-50.087,22.469-50.087,50.087c0,11.703,0,107.704,0,119.741C13.959,299.155,0,317.713,0,339.478v66.783
                                    c0,9.22,7.475,16.696,16.696,16.696h47.393c6.892,19.433,25.45,33.391,47.215,33.391s40.323-13.959,47.215-33.391h200.526
                                    c6.892,19.433,25.45,33.391,47.215,33.391s40.323-13.959,47.215-33.391h41.828c9.22,0,16.696-7.475,16.696-16.696V306.087V72.348
                                    C512,63.127,504.525,55.652,495.304,55.652z M66.783,172.522c0-9.206,7.49-16.696,16.696-16.696h50.087v66.783H66.783V172.522z
                                    M66.783,256h83.478c9.22,0,16.696-7.475,16.696-16.696v-83.478h33.391v133.565H66.783V256z M111.304,422.957
                                    c-9.206,0-16.696-7.49-16.696-16.696s7.49-16.696,16.696-16.696c9.206,0,16.696,7.49,16.696,16.696
                                    S120.51,422.957,111.304,422.957z M200.35,389.565h-41.83c-6.892-19.433-25.45-33.391-47.215-33.391s-40.323,13.959-47.215,33.391
                                    H33.391v-50.087c0-9.206,7.49-16.696,16.696-16.696H200.35V389.565z M406.261,422.957c-9.199,0-16.682-7.479-16.695-16.674
                                    c0-0.008,0.001-0.014,0.001-0.021s-0.001-0.014-0.001-0.021c0.012-9.196,7.495-16.674,16.695-16.674
                                    c9.206,0,16.696,7.49,16.696,16.696S415.467,422.957,406.261,422.957z M478.609,389.565h-25.133
                                    c-6.892-19.433-25.45-33.391-47.215-33.391s-40.323,13.959-47.215,33.391H233.741v-66.783h244.867V389.565z M478.609,289.391
                                    H233.741c0-11.155-0.002-189.225-0.002-200.348h244.87V289.391z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M428.522,122.435H328.348c-9.22,0-16.696,7.475-16.696,16.696s7.475,16.696,16.696,16.696h100.174
                                    c9.22,0,16.696-7.475,16.696-16.696S437.742,122.435,428.522,122.435z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M428.522,189.217h-66.783c-9.22,0-16.696,7.475-16.696,16.696c0,9.22,7.475,16.696,16.696,16.696h66.783
                                    c9.22,0,16.696-7.475,16.696-16.696C445.217,196.693,437.742,189.217,428.522,189.217z"/>
                            </g>
                        </g>
                    </svg>
                    </div>
                    <span class="nav-link-text ms-1">Shipping</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'invoice') == true ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512.001 512.001" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M448.875,1.78l-59.314,29.657L330.247,1.78c-4.7-2.35-10.232-2.35-14.932,0L256,31.437L196.686,1.78
                                    c-4.7-2.35-10.232-2.35-14.932,0L122.44,31.437L63.125,1.78C52.05-3.758,38.964,4.304,38.964,16.713v445.202
                                    c0,6.324,3.573,12.104,9.229,14.933l66.78,33.39c4.7,2.35,10.232,2.35,14.932,0l59.314-29.657l59.314,29.657
                                    c4.7,2.35,10.232,2.35,14.932,0l59.314-29.657l59.314,29.657c4.7,2.35,10.232,2.35,14.932,0l66.78-33.39
                                    c5.656-2.828,9.229-8.609,9.229-14.933V16.713C473.036,4.33,459.974-3.768,448.875,1.78z M439.646,395.135v56.462l-50.085,25.043
                                    l-59.314-29.657c-2.35-1.175-4.908-1.762-7.466-1.762s-5.116,0.588-7.466,1.762L256,476.639l-59.314-29.657
                                    c-4.7-2.35-10.232-2.35-14.932,0l-59.314,29.657l-50.085-25.043v-56.462V43.726l42.619,21.31c4.7,2.35,10.232,2.35,14.932,0
                                    l59.314-29.657l59.314,29.657c4.7,2.35,10.232,2.35,14.932,0l59.314-29.657l59.314,29.657c4.7,2.35,10.232,2.35,14.932,0
                                    l42.619-21.31V395.135z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M211.48,100.189h-89.04c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h89.04
                                    c9.22,0,16.695-7.475,16.695-16.695C228.175,107.664,220.7,100.189,211.48,100.189z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M211.48,166.969h-89.04c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h89.04
                                    c9.22,0,16.695-7.475,16.695-16.695C228.175,174.444,220.7,166.969,211.48,166.969z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M211.48,233.749h-89.04c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h89.04
                                    c9.22,0,16.695-7.475,16.695-16.695C228.175,241.224,220.7,233.749,211.48,233.749z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M211.48,300.53h-89.04c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h89.04
                                    c9.22,0,16.695-7.475,16.695-16.695C228.175,308.004,220.7,300.53,211.48,300.53z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M122.44,378.44H89.05c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h33.39
                                    c9.22,0,16.695-7.475,16.695-16.695C139.135,385.915,131.66,378.44,122.44,378.44z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M222.61,378.44h-33.39c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h33.39
                                    c9.22,0,16.695-7.475,16.695-16.695C239.305,385.915,231.83,378.44,222.61,378.44z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M322.781,378.44h-33.39c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h33.39
                                    c9.22,0,16.695-7.475,16.695-16.695C339.476,385.915,332.001,378.44,322.781,378.44z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M422.951,378.44h-33.39c-9.22,0-16.695,7.475-16.695,16.695c0,9.22,7.475,16.695,16.695,16.695h33.39
                                    c9.22,0,16.695-7.475,16.695-16.695C439.646,385.915,432.171,378.44,422.951,378.44z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M352.843,191.165c-17.515-9.258-35.627-18.832-35.627-29.761c0-15.343,12.482-27.825,27.825-27.825
                                    s27.825,12.482,27.825,27.825c0,9.22,7.475,16.695,16.695,16.695c9.22,0,16.695-7.475,16.695-16.695
                                    c0-27.966-18.858-51.594-44.52-58.882v-7.898c0-9.22-7.475-16.695-16.695-16.695c-9.22,0-16.695,7.475-16.695,16.695v7.898
                                    c-25.663,7.287-44.52,30.916-44.52,58.882c0,31.046,29.616,46.701,53.413,59.28c17.515,9.258,35.627,18.832,35.627,29.761
                                    c0,15.343-12.482,27.825-27.825,27.825s-27.825-12.482-27.825-27.825c0-9.22-7.475-16.695-16.695-16.695
                                    c-9.22,0-16.695,7.475-16.695,16.695c0,27.966,18.858,51.594,44.52,58.882v7.898c0,9.22,7.475,16.695,16.695,16.695
                                    c9.22,0,16.695-7.475,16.695-16.695v-7.898c25.663-7.287,44.52-30.916,44.52-58.882
                                    C406.256,219.398,376.64,203.744,352.843,191.165z"/>
                            </g>
                        </g>
                    </svg>
                    </div>
                    <span class="nav-link-text ms-1">Invoices</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Master Data</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user/index']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15H8C5.79086 15 4 16.7909 4 19V21H20V19C20 16.7909 18.2091 15 16 15Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Master Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'master-company') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'master-company/index']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M489.739,166.957c9.22,0,16.696-7.475,16.696-16.696v-50.087c0-18.412-14.979-33.391-33.391-33.391H372.87V33.391
                                        C372.87,14.979,357.89,0,339.478,0H172.522C154.11,0,139.13,14.979,139.13,33.391v33.391H38.957
                                        c-18.412,0-33.391,14.979-33.391,33.391v50.087c0,9.22,7.475,16.696,16.696,16.696h16.696c0,13.601,0,295.377,0,311.652H22.261
                                        c-9.22,0-16.696,7.475-16.696,16.696S13.04,512,22.261,512c11.758,0,456.737,0,467.478,0c9.22,0,16.696-7.475,16.696-16.696
                                        s-7.475-16.696-16.696-16.696h-16.696c0-16.281,0-298.041,0-311.652H489.739z M172.522,33.391h166.957v33.391H172.522V33.391z
                                        M205.913,378.435h-16.696c-9.22,0-16.696,7.475-16.696,16.696s7.475,16.696,16.696,16.696h16.696v66.783H139.13V345.043h66.783
                                        V378.435z M439.652,478.609H239.304V328.348c0-9.22-7.475-16.696-16.696-16.696H122.435c-9.22,0-16.696,7.475-16.696,16.696
                                        v150.261H72.348V269.276c9.831,5.702,21.231,8.984,33.391,8.984c19.932,0,37.84-8.789,50.087-22.68
                                        c12.247,13.892,30.155,22.68,50.087,22.68c19.932,0,37.84-8.789,50.087-22.68c12.247,13.892,30.155,22.68,50.087,22.68
                                        s37.84-8.789,50.087-22.68c12.247,13.892,30.155,22.68,50.087,22.68c12.16,0,23.56-3.282,33.391-8.984V478.609z M72.348,211.478
                                        v-44.522h66.783v44.522c0,18.412-14.979,33.391-33.391,33.391S72.348,229.89,72.348,211.478z M172.522,211.478v-44.522h66.783
                                        v44.522c0,18.412-14.979,33.391-33.391,33.391C187.501,244.87,172.522,229.89,172.522,211.478z M272.696,211.478v-44.522h66.783
                                        v44.522c0,18.412-14.979,33.391-33.391,33.391C287.675,244.87,272.696,229.89,272.696,211.478z M439.652,211.478
                                        c0,18.412-14.979,33.391-33.391,33.391c-18.412,0-33.391-14.979-33.391-33.391v-44.522h66.783V211.478z M38.957,133.565v-33.391
                                        c7.607,0,423.505,0,434.087,0v33.391C454.666,133.565,50.492,133.565,38.957,133.565z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M389.565,311.652H289.391c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696h100.174
                                        c9.22,0,16.696-7.475,16.696-16.696V328.348C406.261,319.127,398.786,311.652,389.565,311.652z M372.87,411.826h-66.783v-66.783
                                        h66.783V411.826z"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Master Company</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'role') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'role/index']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'permissions') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'permissions/index']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-lock text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'setup') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'setup/index']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-cog text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Setup</span>
                </a>
            </li>
        </ul>
    </div>
    {{-- <div class="sidenav-footer mx-3 "> --}}
        {{-- <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="/img/illustrations/icon-documentation-warning.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div> --}}
        {{-- <a href="/docs/bootstrap/overview/argon-dashboard/index.html" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" type="button">Upgrade to PRO</a> --}}
    {{-- </div> --}}
</aside>
