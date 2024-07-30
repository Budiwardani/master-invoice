@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row mt-8">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">quotation</p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle pt-2">
                                    <svg fill="#fff" width="30px" height="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6 bg-gradient-success text-center">
                                1 Pending
                            </div>
                            <div class="col-6 bg-gradient-warning text-center">
                                1 On Progress
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">phorchase order</p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle pt-2">
                                    <svg fill="#fff" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6 bg-gradient-success text-center">
                                1 Pending
                            </div>
                            <div class="col-6 bg-gradient-warning text-center">
                                1 On Shipping
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">delivery order</p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle pt-2">
                                    <svg fill="#fff" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6 bg-gradient-success text-center">
                                1 Done
                            </div>
                            <div class="col-6 bg-gradient-warning text-center">
                                1 On Progress
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Invoice</p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle pt-2">
                                    <svg fill="#fff" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6 bg-gradient-success text-center">
                                1 Done
                            </div>
                            <div class="col-6 bg-gradient-warning text-center">
                                1 On Progress
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                    <h5 class="font-weight-bolder">
                                        $103,430
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Sales overview</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('./img/carousel-1.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Get started with Argon</h5>
                                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('./img/carousel-2.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Faster way to create web pages</h5>
                                    <p>That’s my skill. I’m not really specifically talented at anything except for the
                                        ability to learn.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('./img/carousel-3.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-trophy text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Sales by Country</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/flags/US.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">United States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">2500</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$230,900</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/flags/DE.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">3.900</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$440,000</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/flags/GB.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Great Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">1.400</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$190,700</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="./img/icons/flags/BR.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">562</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$143,960</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-mobile-button text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                                sold</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-tag text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                        <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                                open</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-box-2 text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                        <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                                closed</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-satisfied text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                        <span class="text-xs font-weight-bold">+ 430</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
