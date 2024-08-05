<x-app-layout>
    <form action="{{ route('progresses.update', $progress->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="student_id" value="{{ $progress->student_id }}">
        <div>
            <label for="course">Course</label><br>
            <input type="text" name="course" id="course" value="{{ $progress->course }}">
        </div>
        <div>
            <label for="subject">Subject</label><br>
            <input type="text" name="subject" id="subject" value="{{ $progress->subject }}">
        </div>
        <div>
            <label for="value">Value</label> <br>
            <input type="number" name="value" id="value" value="{{ $progress->value }}">
            <x-input-error :messages="$errors->get('value')" class="mt-2" />


        </div>
        <div>
            <input type="submit" name="submit" value="Update"
                class="bg-blue-800 px-4 py-3 border rounded-lg  shadow-lg mt-4 text-white">
        </div>
    </form>
</x-app-layout>
