@extends('personel.html.index')
@section('body')
    <form action="/personel/addJobs" method="POST">
        @csrf
        <label>Position</label>
        <input type="text" name="position" placeholder="Position" class="border">
        <br>
        <label>Category</label>
        <input type="text" name="category" placeholder="Category" class="border">
        <br>
        <label>Education</label>
        <input type="text" name="education" placeholder="Education" class="border">
        <br>
        <label>Experience</label>
        <input type="text" name="experience" placeholder="Experience" class="border">
        <br>
        <label>Plantilla item no.</label>
        <br>
        <textarea id="w3review" name="plantilla_item_no" rows="4" cols="50" class="border"></textarea>
        <br>
        <label>Training</label>
        <input type="text" name="training" placeholder="Training" class="border">
        <br>
        <label>Eligibility</label>
        <input type="text" name="eligibility" placeholder="Eligibility" class="border">
        <br>
        <label>Salary Grade</label>
        <input type="text" name="salaryGrade" placeholder="Salary Grade" class="border">
        <br>
        <label>Posting Date</label>
        <input type="date" name="postingDate" placeholder="Posting Date" class="border">
        <br>
        <label>Closing Date</label>
        <input type="date" name="closingDate" placeholder="Closing Date" class="border">
        <br>
        <button type="submit" class="border">---Post---</button>
    </form>

    <script>
        document.getElementById('postingDate').valueAsDate = new Date();
        document.getElementById('closingDate').valueAsDate = new Date();
    </script>
@endsection
