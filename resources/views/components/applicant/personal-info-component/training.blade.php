{{-- Training --}}
<h1 id="training" class="pt-20 font-bold text-left p-4">IV. Training</h1>
<form action="/applicant/addTraining" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-5 gap-1">
        <div>
            <h1 class="font-semibold">Title of Training</h1>
            <input class="input-default  w-full" name="title" type="text" placeholder="Title of Training">
        </div>
        <div>
            <h1 class="font-semibold">No. of Hours</h1>
            <input class="input-default  w-full" name="hours" type="text" placeholder="No. of Hours">
        </div>
        <div>
            <h1 class="font-semibold">Year Attended</h1>
            <input class="input-default  w-full" name="year_attended" type="text" placeholder="Year Attended">
        </div>
        <div>
            <h1 class="font-semibold">Attach a file</h1>
            <div class="rounded-xl p-1.5 m-1 bg-white">
                <input class="w-full" type="file" name="document">
            </div>
        </div>
        <div>
            <h1 class="font-semibold invisible">Add</h1>
            <button 
                type="submit"
                class="p-2 m-1 rounded-xl bg-white w-full">
                Add
            </button>
        </div>
    
    </div>
</form>

{{-- Table --}}
<div class="grid mt-3">
    <table>
        <thead class="z-0 bg-navyblue opacity-90 text-gray-200">
            <tr>
                <th class="border border-white p-3">Title of Training</th>
                <th class="border border-white p-3">No. of Hours</th>
                <th class="border border-white p-3">Year Attended</th>
                <th class="border border-white p-3">Documment/s</th>
                <th class="border border-white p-3">Action</th>
            </tr>
        </thead>

        <tbody>
            @php
                $j = 0;
            @endphp
            @foreach ($training as $item)
                <tr>
                    <td class="p-1 border-r">{{$item->title}}</td>
                    <td class="p-1 border-r">{{$item->training_hours_no}}</td>
                    <td class="p-1 border-r">{{$item->year_attended}}</td>
                    <td class="p-1 border-r">{{$item->document}}</td>
                    <td class=" text-center ">
                        {{-- {!! json_encode($data) !!} --}}
                        <button onclick='TrainingmyEditmodalFunction({{$j}})'
                            class="border m-1 px-3 py-1 rounded-lg p-1 bg-navyblue text-white">
                            Edit
                        </button>
                    </td>
                </tr>
                @php
                    $j++;
                @endphp
            @endforeach 

        </tbody>

    </table>
</div>


<div class="mt-3 ">
    <hr>
</div>



{{-- IV. Training --}}
<div id="TrainingmyEditModal" class="fixed hidden h-screen bg-black/70 w-screen  top-0 left-0 right-0">
    <div class="modal-content grid m-auto mt-0.5 sm:mt-0.5 md:mt-0.5 lg:mt-12 xl:mt-12 h-[40%] w-[20%]">
        <div class="flex w-full justify-center">
            <div class="rounded-3xl px-28 py-8 bg-white justify-around mt-8 fixed ">
                <form action="/applicant/editTraining" method="POST" enctype="multipart/form-data" class="grid">
                    @csrf
                    <input type="text" name="id" id="trainingID" hidden>
                    <div>
                        <img class="w-28 mx-auto mb-3" src="/images/Deped-Logo.png" alt="depedLOGO">
                    </div>
                    <h1 class="font-semibold">Title of Training</h1>
                    <input class="border border-navyblue focus:ring-0 outline-0 input-default" type="text"
                        value="Title of Training" name="title" id="trainingTitle">
                    <h1 class="font-semibold">No. of Hours</h1>
                    <input class="border border-navyblue focus:ring-0 outline-0 input-default" type="text"
                        value="No. of Hours" name="hours" id="trainingHours">
                    <h1 class="font-semibold">Year Attended</h1>
                    <input class="border border-navyblue focus:ring-0 outline-0 input-default" type="text"
                        value="Year Attended" name="year_attended" id="trainingYear">
                    <h1 class="font-semibold">Attach a file</h1>
                    <div class="rounded-xl p-2 m-1 bg-white border border-navyblue">
                        <label for="upload">
                            <input type="file" name="document" id="upload" value="mini.jpeg" title="input">
                        </label>
                    </div>
                    <button 
                        type="submit"
                        class="input-default mt-2 bg-navyblue text-white hover:bg-navyblue/95 hover:shadow-md">Save</button>
                    <button
                        type="button"
                        onclick="TrainingmyEditmodalFunction2()"
                        class="input-default mt-2 bg-rose-500 text-white hover:bg-rose-500/95 hover:shadow-md">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    // Training Data
    var trainingDatass = {!! json_encode($training->toArray(), JSON_HEX_TAG) !!};

    //   TrainingmyEditmodalFunction
    var trainingID = document.getElementById('trainingID');
    var trainingTitle = document.getElementById('trainingTitle');
    var trainingHours = document.getElementById('trainingHours');
    var trainingYear = document.getElementById('trainingYear');

    // For Traning Edit button Modal
    function TrainingmyEditmodalFunction(index) {
        console.log(index);
        trainingID.value = trainingDatass[index]['id'];
        trainingTitle.value = trainingDatass[index]['title'];
        trainingHours.value = trainingDatass[index]['training_hours_no'];
        trainingYear.value = trainingDatass[index]['year_attended'];
        document.getElementById("TrainingmyEditModal").classList.toggle("hidden");
    }
    function TrainingmyEditmodalFunction2() {
        document.getElementById("TrainingmyEditModal").classList.toggle("hidden");
    }
</script>