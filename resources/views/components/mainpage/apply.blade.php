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
                {{-- <div>
                    <div class="grid bg-white px-5 py-2 border-navyblue border rounded-xl">

                        <body class="bg-gray-100">
                            <div class="container mx-auto p-4">
                                <div class="relative inline-block">
                                    <div class="bg-blue-500 text-white p-2 rounded-md cursor-pointer hover:bg-blue-600">
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
                </div> --}}


                {{-- Apply Button --}}
                <button type="submit"
                    class="input-default mt-2 bg-navyblue text-white hover:bg-navyblue/95 hover:shadow-md">Apply</button>
                <button type="button" onclick="closeOpenApplyModalFunction()"
                    class="input-default mt-2 bg-rose-500 text-white hover:bg-rose-500/95 hover:shadow-md">Cancel</button>
            </form>
        </div>
    </div>
</div>



<script>
    // ----------------------------------------------------------------

    // For Apply button Modal
    function ApplyModalFunction(data) {
        closeOpenApplyModalFunction();
    }

    function closeOpenApplyModalFunction() {
        document.getElementById("ApplyModal").classList.toggle("hidden");
    }

    // ----------------------------------------------------------------


    // Show/hide the dropdown on hover
    const dropdown = document.querySelector('.relative');
    const dropdownContent = document.querySelector('.absolute');

    // dropdown.addEventListener('mouseenter', () => {
    //     dropdownContent.classList.remove('hidden');
    // });

    // dropdown.addEventListener('mouseleave', () => {
    //     dropdownContent.classList.add('hidden');
    // });
</script>
