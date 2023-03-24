@extends('admin.layouts.main')

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div class="rounded-lg border-b-4 border-pink-500 bg-gradient-to-b from-pink-200 to-pink-100 p-5 shadow-xl">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full bg-pink-600 p-5 text-white">
                            <svg class="bi bi-card-list h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Total Products</h2>
                        <p class="text-3xl font-bold">{{ $products->count() }} <span class="text-pink-500"><i
                                    class="fas fa-exchange-alt"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div
                class="rounded-lg border-b-4 border-yellow-600 bg-gradient-to-b from-yellow-200 to-yellow-100 p-5 shadow-xl">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full bg-yellow-600 p-5 text-white">
                            <svg class="bi bi-images h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                <path
                                    d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Total Portfolios<span class="md:hidden"> of
                                Product</span></h2>
                        <p class="text-3xl font-bold">{{ $portfolios->count() }} <span class="text-yellow-600"><i
                                    class="fas fa-caret-up"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div class="rounded-lg border-b-4 border-blue-500 bg-gradient-to-b from-blue-200 to-blue-100 p-5 shadow-xl">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full bg-blue-600 p-5 text-white">
                            <svg class="bi bi-envelope h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Email receiver</h2>
                        <form @submit.prevent="submit" x-data="{
                            isLoading: false,
                            email: '{{ $emailReceiver }}',
                            tempEmail: '{{ $emailReceiver }}',
                            submit(event) {
                                this.isLoading = true
                                axios.post(event.target.action, new FormData(event.target))
                                    .then(response => {
                                        this.isLoading = false;
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Email receiver has been changed!',
                                        })
                                        this.tempEmail = this.email
                                    })
                                    .catch(error => {
                                        this.isLoading = false;
                                        this.email = this.tempEmail
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: error.response.data.message,
                                        })
                                    })
                            }
                        }" action="{{ route('admin.change-email') }}"
                            method="POST">
                            @csrf
                            <input class="w-full bg-transparent text-center text-xl font-bold focus-visible:outline-none"
                                :class="isLoading && 'animate-pulse'" x-model="email" value="{{ $emailReceiver }}"
                                name="email" type="email" :disable="isLoading">
                        </form>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div class="rounded-lg border-b-4 border-green-600 bg-gradient-to-b from-green-200 to-green-100 p-5 shadow-xl">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full bg-green-600 p-5 text-white">
                            <svg class="bi bi-whatsapp h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Whatsapp Number</h2>
                        <form @submit.prevent="submit" x-data="{
                            isLoading: false,
                            whatsappNumber: '{{ $whatsappNumbers }}',
                            tempNumber: '{{ $whatsappNumbers }}',
                            submit(event) {
                                this.isLoading = true
                                axios.post(event.target.action, new FormData(event.target))
                                    .then(response => {
                                        this.isLoading = false;
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Whatsapp number has been changed!',
                                        })
                                        this.tempNumber = this.whatsappNumber
                                    })
                                    .catch(error => {
                                        this.isLoading = false;
                                        this.whatsappNumber = this.tempNumber
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: error.response.data.message,
                                        })
                                    })
                            }
                        }" action="{{ route('admin.change-whatsapp') }}"
                            method="POST">
                            @csrf
                            <input class="w-full bg-transparent text-center text-xl font-bold focus-visible:outline-none"
                                :class="isLoading && 'animate-pulse'" type="tel" x-model="whatsappNumber"
                                value="{{ $whatsappNumbers }}" name="number" :disable="isLoading">
                        </form>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div
                class="rounded-lg border-b-4 border-indigo-500 bg-gradient-to-b from-indigo-200 to-indigo-100 p-5 shadow-xl">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full bg-indigo-600 p-5 text-white">
                            <svg class="bi bi-phone" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Phone Number</h2>
                        <form @submit.prevent="submit" x-data="{
                            isLoading: false,
                            phoneNumber: '{{ $phoneNumbers }}',
                            tempNumber: '{{ $phoneNumbers }}',
                            submit(event) {
                                this.isLoading = true
                                axios.post(event.target.action, new FormData(event.target))
                                    .then(response => {
                                        this.isLoading = false;
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Phone number has been changed!',
                                        })
                                        this.tempNumber = this.phoneNumber
                                    })
                                    .catch(error => {
                                        this.isLoading = false;
                                        this.phoneNumber = this.tempNumber
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: error.response.data.message,
                                        })
                                    })
                            }
                        }" action="{{ route('admin.change-phone') }}"
                            method="POST">
                            @csrf
                            <input class="w-full bg-transparent text-center text-xl font-bold focus-visible:outline-none"
                                :class="isLoading && 'animate-pulse'" type="tel" x-model="phoneNumber"
                                value="{{ $phoneNumbers }}" name="number" :disable="isLoading">
                        </form>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div class="rounded-lg border-b-4 border-red-500 bg-gradient-to-b from-red-200 to-red-100 p-5 shadow-xl">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full bg-red-600 p-5"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Issues</h2>
                        <p class="text-3xl font-bold">3 <span class="text-red-500"><i class="fas fa-caret-up"></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>

    <div class="mt-2 flex flex-grow flex-row flex-wrap">

        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Graph Card-->
            <div class="rounded-lg border-transparent bg-white shadow-xl">
                <div
                    class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-gray-300 to-gray-100 p-2 uppercase text-gray-800">
                    <h class="font-bold uppercase text-gray-600">Graph</h>
                </div>
                <div class="p-5">
                    <canvas class="chartjs" id="chartjs-7" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-7"), {
                            "type": "bar",
                            "data": {
                                "labels": ["January", "February", "March", "April"],
                                "datasets": [{
                                    "label": "Page Impressions",
                                    "data": [10, 20, 30, 40],
                                    "borderColor": "rgb(255, 99, 132)",
                                    "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                }, {
                                    "label": "Adsense Clicks",
                                    "data": [5, 15, 10, 30],
                                    "type": "line",
                                    "fill": false,
                                    "borderColor": "rgb(54, 162, 235)"
                                }]
                            },
                            "options": {
                                "scales": {
                                    "yAxes": [{
                                        "ticks": {
                                            "beginAtZero": true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Graph Card-->
            <div class="rounded-lg border-transparent bg-white shadow-xl">
                <div
                    class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-gray-300 to-gray-100 p-2 uppercase text-gray-800">
                    <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                </div>
                <div class="p-5">
                    <canvas class="chartjs" id="chartjs-0" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-0"), {
                            "type": "line",
                            "data": {
                                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                "datasets": [{
                                    "label": "Views",
                                    "data": [65, 59, 80, 81, 56, 55, 40],
                                    "fill": false,
                                    "borderColor": "rgb(75, 192, 192)",
                                    "lineTension": 0.1
                                }]
                            },
                            "options": {}
                        });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Graph Card-->
            <div class="rounded-lg border-transparent bg-white shadow-xl">
                <div
                    class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-gray-300 to-gray-100 p-2 uppercase text-gray-800">
                    <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                </div>
                <div class="p-5">
                    <canvas class="chartjs" id="chartjs-1" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-1"), {
                            "type": "bar",
                            "data": {
                                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                "datasets": [{
                                    "label": "Likes",
                                    "data": [65, 59, 80, 81, 56, 55, 40],
                                    "fill": false,
                                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                                        "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
                                        "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                                    ],
                                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                                        "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                                        "rgb(201, 203, 207)"
                                    ],
                                    "borderWidth": 1
                                }]
                            },
                            "options": {
                                "scales": {
                                    "yAxes": [{
                                        "ticks": {
                                            "beginAtZero": true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Graph Card-->
            <div class="rounded-lg border-transparent bg-white shadow-xl">
                <div
                    class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-gray-300 to-gray-100 p-2 uppercase text-gray-800">
                    <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                </div>
                <div class="p-5"><canvas class="chartjs" id="chartjs-4" width="undefined"
                        height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-4"), {
                            "type": "doughnut",
                            "data": {
                                "labels": ["P1", "P2", "P3"],
                                "datasets": [{
                                    "label": "Issues",
                                    "data": [300, 50, 100],
                                    "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                }]
                            }
                        });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Table Card-->
            <div class="rounded-lg border-transparent bg-white shadow-xl">
                <div
                    class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-gray-300 to-gray-100 p-2 uppercase text-gray-800">
                    <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                </div>
                <div class="p-5">
                    <table class="w-full p-5 text-gray-700">
                        <thead>
                            <tr>
                                <th class="text-left text-blue-900">Name</th>
                                <th class="text-left text-blue-900">Side</th>
                                <th class="text-left text-blue-900">Role</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Obi Wan Kenobi</td>
                                <td>Light</td>
                                <td>Jedi</td>
                            </tr>
                            <tr>
                                <td>Greedo</td>
                                <td>South</td>
                                <td>Scumbag</td>
                            </tr>
                            <tr>
                                <td>Darth Vader</td>
                                <td>Dark</td>
                                <td>Sith</td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="py-2"><a href="#">See More issues...</a></p>

                </div>
            </div>
            <!--/table Card-->
        </div>

        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
            <!--Advert Card-->
            <div class="rounded-lg border-transparent bg-white shadow-xl">
                <div
                    class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-gray-300 to-gray-100 p-2 uppercase text-gray-800">
                    <h2 class="font-bold uppercase text-gray-600">Advert</h2>
                </div>
                <div class="p-5 text-center">

                    <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CK7D52JJ&placement=wwwtailwindtoolboxcom"
                        id="_carbonads_js"></script>

                </div>
            </div>
            <!--/Advert Card-->
        </div>

    </div>
@endsection
