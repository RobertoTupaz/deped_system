@extends('applicant.html.index')
@section('body')
    <div class="h-screen">

        <div>
            <img class="h-screen fixed object-cover" src="images\DepED-MalaybalayCITY.jpg" alt="">
        </div>
        <div class="relative  top-0 h-[4rem] bg-navyblue/50 w-full overflow-hidden ">

            <div class="flex justify-between mx-[3%] ">
                {{-- left Side --}}
                <div class="flex gap-2 ">
                    <div>
                        <a href="/">
                            <img class="w-[6rem]" src="images\Deped-Logo.png" alt="DepED_logo">
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
        <div class="fixed">
            <div class="bg-white rounded-2xl mt-1 ml-1 right-0">
                <button id="menu-toggle">
                    <img class="w-12" src="\images\menu-bar.png" alt="">
                </button>
            </div>



        </div>

        {{-- Rounded with Border --}}

        <div class="mx-auto text-center border mt-[5rem] bg-white opacity-90 rounded-xl p-3 shadow-lg w-fit max-w-7xl ">

            <div class="grid">

                <table>

                    {{-- Table head --}}
                    <thead class=" bg-navyblue text-white text-lg">
                        <tr>
                            <th class="border border-white p-3">Position</th>
                            <th class="border border-white p-3">Education</th>
                            <th class="border border-white p-3">Experience</th>
                            <th class="border border-white p-3">Plantilla item No.</th>
                            <th class="border border-white p-3">Training</th>
                            <th class="border border-white p-3">Eligibility</th>
                            <th class="border border-white p-3">Salary Grade</th>
                            <th class="border border-white p-3">Posting Date</th>
                            <th class="border border-white p-3">Closing Date</th>
                            <th class="border border-white p-3">Action</th>
                        </tr>

                    </thead>

                    {{-- Table body --}}

                    <tbody class="border-b text-center text-lg">

                        <tr>
                            {{-- Position --}}
                            <td class="p-1 border-r">Department Of Education</td>

                            {{-- Education --}}
                            <td class="p-1 border-r">Teaher I</td>
                            {{-- Experience --}}
                            <td class="p-1 border-r">Teacher II</td>
                            {{-- Plantilla item No. --}}
                            <td class="p-1 border-r">OSEC-DECSB-TCH-241467-1998</td>
                            {{-- Training --}}
                            <td class="p-1 border-r">4 Years css</td>

                            {{-- Eligibility --}}
                            <td class="p-1 border-r">Yes</td>
                            {{-- Salary Grade --}}
                            <td class="p-1 border-r">90000</td>
                            {{-- Posting Date --}}
                            <td class="p-1 border-r">08 Jan 2024</td>
                            {{-- Closing  date --}}
                            <td class="p-1 border-r">18 Jan 2024</td>
                            {{-- Action --}}
                            <td class="p-1 ">
                                <button onclick="ApplyModalFunction()"
                                    class="border rounded-lg p-1 bg-navyblue text-white">Apply</button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var menuToggle = document.getElementById('menu-toggle');
                var closeMenuButton = document.getElementById('close-menu');
                var menu = document.getElementById('menu');

                menuToggle.addEventListener('click', function(event) {
                    toggleMenu();
                    event.stopPropagation(); // Prevent the click event from propagating to document
                });

                closeMenuButton.addEventListener('click', function(event) {
                    toggleMenu();
                    event.stopPropagation(); // Prevent the click event from propagating to document
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

            // For Apply button Modal
            function ApplyModalFunction(data) {
                console.log(data);
                document.getElementById("ApplyModal").classList.toggle("hidden");
            }


            function ApplyhandleClick() {
                var input = document.getElementById("ApplyInput");
                ApplyModalFunction();
            }

            // ----------------------------------------------------------------


            // Show/hide the dropdown on hover
            const dropdown = document.querySelector('.relative');
            const dropdownContent = document.querySelector('.absolute');

            dropdown.addEventListener('mouseenter', () => {
                dropdownContent.classList.remove('hidden');
            });

            dropdown.addEventListener('mouseleave', () => {
                dropdownContent.classList.add('hidden');
            });
            // ----------------------------------------------------------------
        </script>

        {{-- Modal --}}
        <div id="menu" class=" h-screen hidden opacity-85 fixed top-0 right-0 -left-80 bg-black/0">
            <div id="menu-content" class="h-screen popin text-center bg-white w-[17rem] mt-[4rem] rounded-tr-3xl">

                <div class="cursor-pointer  mr-6 pt-3 rounded-full">
                    <!-- Close mark -->
                    <div class="flex justify-between">
                        <div></div>
                        <div>
                            <button id="close-menu">
                                <img class="w-5 h-5" src="\images\x-mark.png" alt="close">
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
                        class="block px-4 py-4 font-semibold text-gray-800 duration-300 ease-out hover:bg-gray-200">Dashboard</a>
                </div>
                <div class="px-3">
                    <hr>
                </div>
                <div><a href="#"
                        class="block px-4 py-4 font-semibold text-gray-800 duration-300 ease-out hover:bg-gray-200">Application
                        History</a></div>
                <div class="px-3">
                    <hr>
                </div>
                <div><a href="#"
                        class="block px-4 py-4 font-semibold text-gray-800 duration-300 ease-out hover:bg-gray-200">Personal
                        Information</a></div>
            </div>
        </div>

        {{-- Apply Modal --}}
        <div id="ApplyModal" class="fixed hidden h-screen bg-black/70 top-0 left-0 right-0">
            <div class=" w-full flex justify-center">
                <div class="rounded-3xl py-8 bg-white mt-8 fixed">
                    <form class="px-12 grid">
                        <div>
                            <img class="w-28 mx-auto mb-3" src="/images/Deped-Logo.png" alt="depedLOGO">
                        </div>
                        <h1 class="text-center font-bold text-lg">LETTER OF INTENT</h1>
                        <div class="flex gap-1 grid-cols-2">
                            <div class="mt-2">
                                <h1 class="font-semibold mt-2">Position Title:</h1>
                            </div>
                            <div> <input
                                    class="border-b border-navyblue focus:ring-0 outline-0 text-center font-semibold py-3 m-1"
                                    type="text" value="Teaching Position" title="input" readonly></div>
                        </div>
                        <h1 class="font-semibold">Upload PDF:</h1>
                        <div class="rounded-xl p-2 m-1 bg-white border border-navyblue">
                            <label for="upload">
                                <input type="file" id="upload" value="mini.jpeg" title="input">
                            </label>
                        </div>
                        {{-- Hover Test --}}
                        <div>
                            <div class="grid bg-white px-5 py-2 border-navyblue border rounded-xl">

                                <body class="bg-gray-100">
                                    <div class="container mx-auto p-4">
                                        <div class="relative inline-block">
                                            <div
                                                class="bg-blue-500 text-white p-2 rounded-md cursor-pointer hover:bg-blue-600">
                                                Hover Me
                                            </div>
                                            <!-- Dropdown content -->
                                            <div class="absolute top-10 left-0 hidden bg-white p-2 rounded-md shadow-md">
                                                <div class="py-1">
                                                    <div class="hover:bg-gray-200 p-2">Option 1</div>
                                                    <div class="hover:bg-gray-200 p-2">Option 2</div>
                                                    <div class="hover:bg-gray-200 p-2">Option 3</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>


                        {{-- Apply Button --}}
                        <button onclick="ApplyModalFunction()"
                            class="input-default mt-2 bg-navyblue text-white hover:bg-navyblue/95 hover:shadow-md">Apply</button>
                        <button type="button" onclick="ApplyModalFunction()"
                            class="input-default mt-2 bg-rose-500 text-white hover:bg-rose-500/95 hover:shadow-md">Cancel</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
