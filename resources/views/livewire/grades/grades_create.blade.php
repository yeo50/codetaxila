<x-app-layout>
    <form action="{{ route('grades.store') }}" method="POST" class=" block w-3/5 mx-auto mt-4 p-5">
        @csrf
        <div>
            <label for="subject">Choose Subject</label> <br>
            <select name="subject" id="subject" class="mt-2">
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="js">JavaScript</option>
            </select>
        </div>
        <div>
            <label for="value">Value</label> <br>
            <input type="number" name="value" id="value" class="mt-2">
        </div>
        <div>
            <input type="hidden" name="student_id" value="{{ Auth()->user()->student->id }}">
        </div>
        <div class="mt-2">
            <input type="submit" value="submit" class="p-4 bg-blue-700 " name="submit">
        </div>
    </form>

</x-app-layout>
