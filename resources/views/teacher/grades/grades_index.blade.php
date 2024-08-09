<x-app-layout>
    <table class="border">
        <tr class="border border-black text-center">
            <th class="p-2 text-center">Student Id</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student Phone</th>

            <th colspan="3" class="text-center  p-2">Grades</th>

        </tr>

        @foreach ($students as $student)
            <tr class="border border-black text-center ">
                <td class="p-2">{{ $student->id }}</td>
                <td class="p-2">{{ $student->fname }} {{ $student->lname }}</td>
                <td class="p-2">{{ $student->email }}</td>
                <td class="p-2">{{ $student->phone }}</td>

                @if ($student->grades->isNotEmpty())
                    @php
                        $gradeCount = $student->grades->count();
                    @endphp
                    @foreach ($student->grades as $grade)
                        <td class="px-2">{{ $grade->subject }} {{ $grade->value }}</td>
                    @endforeach
                    @if ($gradeCount < 3 && $gradeCount < 2)
                        @for ($i = 1; $i < 3; $i++)
                            <td></td>
                        @endfor
                    @elseif ($gradeCount == 2 && $gradeCount < 3)
                        <td></td>
                    @endif
                @else
                    <td colspan="3"></td>
                @endif
                <td class="p-2 text-center bg-red-300"><a href="{{ route('grades.create', ['id' => $student->id]) }}"
                        class="text-blue-600">Insert
                        grades</a></td>

            </tr>
        @endforeach
    </table>



</x-app-layout>
