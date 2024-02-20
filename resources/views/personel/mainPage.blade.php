<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>



<body>

    <div class="h-screen">

        <div>
            <img class="h-screen fixed object-cover" src="\images\DepED-MalaybalayCITY.jpg" alt="">
        </div>
        <div class="relative  top-0 h-[4rem] bg-nayblue/50 w-full overflow-hidden ">

            <div class="flex justify-between mx-[3%] ">
                {{-- left Side --}}
                <div class="flex gap-2 ">
                    <div>
                        <a href="/">
                            <img class="w-[6rem]" src="\images\Deped-Logo.png" alt="DepED_logo">
                        </a>
                    </div>
                    <div class=" text-white mt-3 font-bold text-2xl">
                        <h1>Division of Malaybalay City</h1>
                    </div>
                </div>

                {{-- Right Side | Account Button --}}
                <button class="bg-gray-400   text-white cursor-pointer p-2 rounded-xl font-bold mt-3">
                    Logout
                </button>

            </div>

        </div>
        {{-- Menu Panel --}}
        {{-- Menu Bar --}}
        <div class="fixed">
            <div class="rounded-2xl mt-1 ml-1 right-0">
                <button id="menu-toggle" title="button">
                    <img class="w-16" src="\images\menu-bar.png" alt="menu-bar">
                </button>
            </div>



        </div>

        {{-- Rounded with Border --}}

        <div class="mx-auto text-center mt-[1rem] bg-gray-500 opacity-90 rounded-xl p-3 shadow-lg  max-w-6xl  mb-28">


            <div class="grid bg-gray-300 rounded-xl overflow-y-scroll p-3  ">

                <div>

                    <h1 class="font-bold text-center p-4">SUMMARY OF DATA THAT IS ALREADY PUBLISHED</h1>

                    <div class="flex justify-between">
                        <div>
                            <input class="input-default" type="text" placeholder="Search"
                                oninput="handleSearch(this.value)">
                            <div id="suggestions" class="mt-2"></div>

                        </div>
                        <div>
                            <button class="border text-white input-default"
                            onclick="CreatePubmodalFunction()"
                            >Create</button>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div>

                        <div class="grid mt-3">
                            <table>
                                <thead class="bg-navyblue opacity-90 text-gray-200">
                                    <tr>
                                        <th class="border border-white p-3">No.</th>
                                        <th class="border border-white p-3">Position</th>
                                        <th class="border border-white p-3">Education</th>
                                        <th class="border border-white p-3">Experience</th>
                                        <th class="border border-white p-3">Plantilla Item No.</th>
                                        <th class="border border-white p-3">Training</th>
                                        <th class="border border-white p-3">Eligibility</th>
                                        <th class="border border-white p-3">SG</th>
                                        <th class="border border-white p-3">Posting Date</th>
                                        <th class="border border-white p-3">Closing Date</th>
                                        <th class="border border-white p-3">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="border-b">
                                        <td class="p-1 border-r">No.</td>
                                        <td class="p-1 border-r">Position</td>
                                        <td class="p-1 border-r">Education</td>
                                        <td class="p-1 border-r">Experience</td>
                                        <td class="p-1 border-r">Plantilla Item No.</td>
                                        <td class="p-1 border-r">Training</td>
                                        <td class="p-1 border-r">Eligibility</td>
                                        <td class="p-1 border-r">SG</td>
                                        <td class="p-1 border-r">Posting Date</td>
                                        <td class="p-1 border-r">Closing Date</td>
                                        <td class="p-1 ">
                                            <button class="border m-1 px-3 py-1 rounded-lg p-1 bg-navyblue text-white"
                                                onclick="PublicationmodalFunction()">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // For Menu-Bar
                document.addEventListener('DOMContentLoaded', function() {
                    var menuToggle = document.getElementById('menu-toggle');
                    var closeMenuButton = document.getElementById('close-menu');
                    var menu = document.getElementById('menu');

                    menuToggle.addEventListener('click', function(event) {
                        toggleMenu();
                        event.stopPropagation();
                    });

                    closeMenuButton.addEventListener('click', function(event) {
                        toggleMenu();
                        event.stopPropagation();
                    });

                    window.onclick = function(event) {
                        if (event.target === menu) {
                            toggleMenu();
                        }
                    };

                    function toggleMenu() {
                        menu.classList.toggle('hidden');
                        menuToggle.classList.toggle('hidden');
                    }
                });



                // ----------------------------------------------------------------

                // For Education Edit button Modal
                function PublicationmodalFunction(data) {
                    console.log(data);
                    document.getElementById("PublicationModal").classList.toggle("hidden");
                }

                function PublicationhandleClick() {
                    var input = document.getElementById("PublicationEdit");
                    PublicationmodalFunction();
                }

                // ----------------------------------------------------------------


                // For Create button for Modal
                function CreatePubmodalFunction(data) {
                    console.log(data);
                    document.getElementById("CreatePublicationModal").classList.toggle("hidden");
                }

                function CreatehandleClick() {
                    var input = document.getElementById("CreatePub");
                    CreatePubmodalFunction();
                }

                // ----------------------------------------------------------------



                function PositionFunction() {
                    document.getElementById("PositionDropdown").classList.toggle("hidden");
                }

                function PositionfilterFunction() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("PositionInput");
                    filter = input.value.toUpperCase();
                    div = document.getElementById("PositionDropdown");
                    a = div.getElementsByTagName("a");
                    for (i = 0; i < a.length; i++) {
                        txtValue = a[i].textContent || a[i].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            a[i].style.display = "";
                        } else {
                            a[i].style.display = "none";
                        }
                    }
                }

                function PositionhandleLinkClick(link) {
                    var input = document.getElementById("PositionInput");
                    input.value = link.textContent.trim();
                    // Alternatively, you can set the input value instead of placeholder
                    // input.placeholder = link.textContent.trim(); -> depende sa imong trip
                    PositionFunction();
                }




                // ----------------------------------------------------------------
            </script>

            {{--  Modal --}}
            <div id="menu" class=" h-screen hidden opacity-85 fixed top-0 right-0 -left-80 bg-black/0">
                <div id="menu-content" class="h-screen popin text-center bg-white   w-[17rem] mt-[4rem] rounded-tr-3xl">

                    <div class="cursor-pointer  mr-6 pt-3 rounded-full">
                        <!-- Close mark -->
                        <div class="flex justify-between">
                            <div></div>
                            <div>
                                <button id="close-menu">
                                    <img class="w-7 h-7" src="\images\x-mark.png" alt="close">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex p-3 gap-2 mb-3">
                        <div>
                            <img class="w-14 " src="\images\user.png" alt="">
                        </div>
                        <div class="mt-1">
                            <div>Division of Malaybalay City</div>
                            <div>depEdCasisang@gmail.com</div>
                        </div>

                    </div>
                    <div class="px-3">
                        <hr>
                    </div>
                    <div><a href="#"
                            class="block px-4 py-4 font-semibold text-gray-800 duration-300 ease-out hover:bg-gray-200">
                            PUBLICATION OF VACANCIES</a>
                    </div>
                    <div class="px-3">
                        <hr>
                    </div>
                    <div><a href="#"
                            class="block px-4 py-4 font-semibold text-gray-800 duration-300 ease-out hover:bg-gray-200">
                            INDIVIDUAL EVALUATION RESULT
                        </a></div>
                    <div class="px-3">
                        <hr>
                    </div>
                    <div>
                        <a href="#"
                            class="block px-4 py-4 font-semibold text-gray-800 duration-300 ease-out hover:bg-gray-200">
                            SIGNATORIES PAGE
                        </a>
                    </div>
                </div>
            </div>



            {{-- Publication Edit Modal --}}
            <div id="PublicationModal" class="fixed hidden h-screen bg-black/70 w-screen  top-0 left-0 right-0">
                <div class="bg-red-500 w-full flex justify-center">
                    <div class="rounded-3xl px-28 py-8 bg-white justify-around grid mt-8 fixed">

                        <div class="px-12 grid">
                            <div>
                                <img class="w-28 mx-auto mb-3" src="/images/Deped-Logo.png" alt="depedLOGO">
                            </div>

                            <div class="relative">
                                <div>
                                    <h1 class="font-semibold">Position</h1>
                                    <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                        type="text" value="Position" title="itsinput" id="PositionInput"
                                        onkeyup="PositionfilterFunction()">
                                </div>
                                {{-- Search Modal --}}
                                <div id="PositionDropdown"
                                    class="hidden bg-white px-0 py-2 absolute border -ml-3 rounded-xl text-nowrap">

                                    <a onclick="PositionhandleLinkClick()"
                                        class="cursor-pointer hover:bg-gray-300 px-24 duration-300 ease-out">text1</a>
                                    <a onclick="PositionhandleLinkClick()"
                                        class="cursor-pointer hover:bg-gray-300 px-24 duration-300 ease-out">text2</a>
                                    <a onclick="PositionhandleLinkClick()"
                                        class="cursor-pointer hover:bg-gray-300 px-24 duration-300 ease-out">text3</a>

                                </div>
                            </div>
                            <div>
                                <h1 class="font-semibold">Education</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Education" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Experience</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Experience" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Plantilla Item No.</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Plantilla Item No." title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Training</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Training" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Eligibility</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Eligibility" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">SG</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="SG" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Posting Date</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Posting Date" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Closing Date</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" value="Closing Date" title="input">
                            </div>
                            <div class="grid mt-1">
                                <button onclick="PublicationmodalFunction()"
                                    class="input-default mt-2 bg-navyblue text-white hover:bg-navyblue/95 hover:shadow-md">Save</button>
                                <button onclick="PublicationmodalFunction()"
                                    class="input-default mt-2 bg-rose-500 text-white hover:bg-rose-500/95 hover:shadow-md">Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Create Modal --}}
            <div id="CreatePublicationModal" class="fixed hidden h-screen bg-black/70 w-screen  top-0 left-0 right-0">
                <div class="bg-red-500 w-full flex justify-center">
                    <div class="rounded-3xl px-28 py-8 bg-white justify-around grid mt-8 fixed">

                        <div class="px-12 grid">

                            <div>
                                <img class="w-28 mx-auto mb-3" src="/images/Deped-Logo.png" alt="depedLOGO">
                            </div>
                            {{-- Create --}}
                                <h1 class="font-bold text-center text-lg">Create</h1>
                            <div class="relative">
                                <div>
                                    <h1 class="font-semibold">Position</h1>
                                    <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                        type="text"  title="itsinput" id="PositionInput"
                                        onkeyup="PositionfilterFunction()">
                                </div>
                                {{-- Search Modal --}}
                                <div id="PositionDropdown"
                                    class="hidden bg-white px-0 py-2 absolute border -ml-3 rounded-xl text-nowrap">

                                    <a onclick="PositionhandleLinkClick()"
                                        class="cursor-pointer hover:bg-gray-300 px-24 duration-300 ease-out">text1</a>
                                    <a onclick="PositionhandleLinkClick()"
                                        class="cursor-pointer hover:bg-gray-300 px-24 duration-300 ease-out">text2</a>
                                    <a onclick="PositionhandleLinkClick()"
                                        class="cursor-pointer hover:bg-gray-300 px-24 duration-300 ease-out">text3</a>

                                </div>
                            </div>
                            <div>
                                <h1 class="font-semibold">Education</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Experience</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text"  title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Plantilla Item No.</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Training</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Eligibility</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text"  title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">SG</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Posting Date</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text" title="input">
                            </div>
                            <div>
                                <h1 class="font-semibold">Closing Date</h1>
                                <input class="border border-navyblue focus:ring-0 outline-0 input-default"
                                    type="text"  title="input">
                            </div>
                            <div class="grid mt-1">
                                <button onclick="CreatePubmodalFunction()"
                                    class="input-default mt-2 bg-navyblue text-white hover:bg-navyblue/95 hover:shadow-md">Save</button>
                                <button onclick="CreatePubmodalFunction()"
                                    class="input-default mt-2 bg-rose-500 text-white hover:bg-rose-500/95 hover:shadow-md">Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

</body>

</html>
