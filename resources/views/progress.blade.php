<x-app-layout>
    @if (session('message'))
        <p class="text-center py-2 border border-red-500 text-red-500">{{ session('message') }}</p>
    @endif
    <table class="w-full space-y-6 ">
        <tr class="m-3 mb-4">
            <th>Course</th>
            <th>Subject</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        @foreach ($progresses as $progress)
            <tr class="space-y-2 text-center my-2">
                <td>{{ $progress->course }}</td>
                <td>{{ $progress->subject }}</td>
                <td>{{ $progress->value }}</td>
                <td><a href="{{ route('progresses.edit', $progress->id) }}">Edit</a>
                    <form action="{{ route('progresses.destroy', $progress->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="px-4 py-1 rounded-lg text-white bg-red-700">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</x-app-layout>
