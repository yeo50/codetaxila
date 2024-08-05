<div>
    <div class="flex max-lg:flex-col mt-3 p-4 gap-2">

        <div class="space-y-3 flex-[3] max-lg:ps-4">
            <h5><span class="inline-block bg-violet-900 text-white px-2  rounded-xl">Free</span>
                Course
            </h5>
            <h1 class="text-violet-900 text-5xl  font-bold tracking-wide ">Learn HTML</h1>
            <p class="text-lg">Start at the beginning by learning HTML basics — an important foundation for
                building and
                editing web pages.</p>
            <div class="flex space-x-1">
                <span>4.6</span>
                <div class="text-amber-500"><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>

                </div>

            </div>
            <div class="flex items-center justify-between  max-lg:hidden">
                <a href="{{ route('learnHtmlTopic') }}" class="w-2/5"> <x-primary-button
                        class="w-full flex justify-center">Start
                    </x-primary-button></a>
                <div> 220 learners enrolled</div>
            </div>
        </div>
        <div class="flex-[2] p-4 ">
            <div class="space-y-3 border p-4 border-black">
                <h6 class="text-lg font-semibold ps-4"> This course includes</h6>
                <ul class="space-y-2 px-4">
                    <li class="border-b py-3 border-black"><i class="fa-solid fa-chalkboard-user me-2"></i>Instructor
                        Assistant for guided
                        coding
                        help</li>
                    <li class="border-b py-3 border-black"><i class="fa-solid fa-bars-progress me-2"></i>Projects
                        to apply new skills</li>
                    <li class="border-b py-3 border-black"><i class="fa-solid fa-clipboard-question me-2"></i>Quizzes to
                        test your knowledge
                    </li>
                    <li class="border-b py-3 "><i class="fa-solid fa-certificate me-2"></i>A certificate of
                        completion</li>
                </ul>
            </div>
        </div>
        <div class="hidden ps-4 items-center justify-between  max-lg:flex ">
            <a href="{{ route('learnHtmlTopic') }}" class="w-2/5"><x-primary-button
                    class="w-full flex justify-center">Start
                </x-primary-button> </a>
            <div> 220 learners enrolled</div>
        </div>
    </div>
    <div class="flex flex-wrap max-md:flex-col space-y-2 justify-between gap-3 mt-4">
        <div class="flex-1 px-4">
            <h4 class="text-lg font-semibold mb-3">About this course</h4>
            <p>Fun fact: all websites use HTML — even this one. It’s a fundamental part of every web developer’s
                toolkit. HTML provides the content that gives web pages structure, by using elements and tags, you can
                add text, images, videos, forms, and more. Learning HTML basics is an important first step in your web
                development journey and an essential skill for front- and back-end developers.
            </p>
        </div>
        <div class="flex-1 ps-4">
            <h4 class="text-lg font-semibold mb-3">Skills you'll gain</h4>
            <ul class="space-y-2">
                <li>
                    <span
                        class="me-1 text-white text-sm bg-black rounded-full w-5 h-5 inline-flex items-center justify-center">&#10003;</span>
                    Structure pages
                    with HTML
                </li>
                <li><span
                        class="me-1 text-white text-sm bg-black rounded-full w-5 h-5 inline-flex items-center justify-center">&#10003;</span>
                    Present data with tables</li>
                <li><span
                        class="me-1 text-white text-sm bg-black rounded-full w-5 h-5 inline-flex items-center justify-center">&#10003;</span>
                    Write
                    cleaner HTML</li>
            </ul>
        </div>
    </div>
</div>
