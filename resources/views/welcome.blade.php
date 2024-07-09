<x-layout>
    <main class="font-sans antialiased dark:bg-black dark:text-white/50 pt-2">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 rounded-t-xl">


            <div class="w-full flex flex-col justify-center items-center px-6 selection:bg-[#FF2D20]
            selection:text-white">
                <img src="{{ asset('images/image1.png') }}" alt="" class="mb-4">
                <span class="text-center text-sm">
                    PocketPal is a modern finance tracking platform made for
                    students by students <br> that changes
                    how students use financial data to track their expenses.
                </span>
                <img src="{{ asset('images/image2.png') }}" alt="" class="py-4">
            </div>
        </div>

        <div class="bg-blue-900 p-4 rounded-b-xl">
            <div class="text-white flex flex-row justify-between items-center">
                <span class="text-6xl text-center font-bold p-24">
                    ALL YOUR <br> EXPENSES <br> IN ONE PLACE
                </span>
                <img src="{{ asset('images/image4.png') }}" alt="">
            </div>

            <div class="text-white flex flex-row justify-between items-center">
                <img src="{{ asset('images/image5.png') }}" alt="">
                <span class="text-6xl text-center font-bold p-24">
                   FINANCIAL ANALYSIS <br> & REPORTS MADE EASY
                </span>
            </div>
        </div>

        <div class="mt-2 bg-gray-200 rounded-xl p-8">
            <h3 class="text-gray-400 text-2xl font-md">HOW IT WORKS</h3>
            <div class="flex justify-between items-center">
                <span class="text-7xl font-bold">
                    Do it in three easy
                    <br/>steps
                </span>
                <span class="font-md text-2xl">
                   Constantly reviewing and optimizing
                    <br/>your financial strategy,
                    <br/>you can navigate the complexities of
                    <br/>personal finances with ease and confidence.
                </span>
            </div>

            <div class="bg-blue-100 rounded-lg flex flex-rol gap-4 p-4 mt-4">
                <div class="relative p-2 rounded-lg border border-blue-200 bg-white w-2/6">
                    <h2 class="absolute p-3 rounded-full border border-blue-200 text-center">1</h2>
                    <div class=" flex flex-col gap-2 items-center justify-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 220 220"
                             fill="none">
                            <mask id="mask0_62_212" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="220" height="220">
                                <rect width="220" height="220" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_62_212)">
                                <path d="M36.9037 183.333V157.667C36.9037 152.472 38.2423 147.698 40.9197 143.344C43.597 138.99 47.154 135.667 51.5907 133.375C61.0761 128.639 70.7145 125.087 80.5058 122.719C90.2972 120.351 100.242 119.167 110.339 119.167C116 119.167 121.584 119.51 127.091 120.198C132.599 120.885 138.107 121.993 143.614 123.521L128.239 139.104C125.179 138.646 122.196 138.264 119.289 137.958C116.382 137.653 113.399 137.5 110.339 137.5C101.771 137.5 93.2805 138.531 84.866 140.594C76.4516 142.656 68.1136 145.75 59.8522 149.875C58.4753 150.639 57.3661 151.708 56.5247 153.083C55.6832 154.458 55.2625 155.986 55.2625 157.667V165H110.339V183.333H36.9037ZM128.698 192.5V164.313L179.414 113.896C180.791 112.521 182.321 111.528 184.004 110.917C185.686 110.306 187.369 110 189.052 110C190.888 110 192.647 110.344 194.33 111.031C196.013 111.719 197.543 112.75 198.92 114.125L207.411 122.604C208.635 123.979 209.591 125.507 210.28 127.188C210.968 128.868 211.312 130.549 211.312 132.229C211.312 133.91 211.006 135.629 210.394 137.385C209.782 139.142 208.788 140.708 207.411 142.083L156.924 192.5H128.698ZM142.467 178.75H151.187L178.955 150.792L174.824 146.438L170.464 142.313L142.467 170.042V178.75ZM174.824 146.438L170.464 142.313L178.955 150.792L174.824 146.438ZM110.339 110C100.242 110 91.5976 106.41 84.4071 99.2292C77.2165 92.0487 73.6213 83.4167 73.6213 73.3334C73.6213 63.2501 77.2165 54.6181 84.4071 47.4376C91.5976 40.257 100.242 36.6667 110.339 36.6667C120.436 36.6667 129.08 40.257 136.271 47.4376C143.461 54.6181 147.056 63.2501 147.056 73.3334C147.056 83.4167 143.461 92.0487 136.271 99.2292C129.08 106.41 120.436 110 110.339 110ZM110.339 91.6667C115.388 91.6667 119.71 89.8716 123.305 86.2813C126.9 82.691 128.698 78.3751 128.698 73.3334C128.698 68.2917 126.9 63.9758 123.305 60.3855C119.71 56.7952 115.388 55.0001 110.339 55.0001C105.29 55.0001 100.968 56.7952 97.373 60.3855C93.7777 63.9758 91.9801 68.2917 91.9801 73.3334C91.9801 78.3751 93.7777 82.691 97.373 86.2813C100.968 89.8716 105.29 91.6667 110.339 91.6667Z" fill="#031B96"/>
                            </g>
                        </svg>
                        <span class="font-bold text-left text-3xl">Creating your
                            <br/>personal account
                            <br/>is easy and free.</span>
                    </div>
                </div>
                <div class="relative p-2 rounded-lg border border-blue-200 bg-white w-2/6">
                    <h2 class="absolute p-3 rounded-full border border-blue-200 text-center">2</h2>
                    <div class="flex flex-col gap-2 items-center justify-center p-4">
                        <span class="font-bold text-left text-3xl">Creating your
                            <br/>personal account
                            <br/>is easy and free.</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 220 220"
                             fill="none">
                            <mask id="mask0_62_140" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="220" height="220">
                                <rect width="220" height="220" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_62_140)">
                                <path d="M45.7345 192.5C40.6858 192.5 36.3639 190.705 32.7686 187.115C29.1733 183.524 27.3757 179.208 27.3757 174.167V45.8333C27.3757 40.7917 29.1733 36.4757 32.7686 32.8854C36.3639 29.2951 40.6858 27.5 45.7345 27.5H174.246C179.295 27.5 183.617 29.2951 187.212 32.8854C190.807 36.4757 192.605 40.7917 192.605 45.8333V107.25C189.698 105.875 186.715 104.691 183.655 103.698C180.595 102.705 177.459 101.979 174.246 101.521V45.8333H45.7345V174.167H101.27C101.729 177.528 102.456 180.736 103.45 183.792C104.444 186.847 105.63 189.75 107.007 192.5H45.7345ZM45.7345 174.167V45.8333V101.521V100.833V174.167ZM64.0933 155.833H101.499C101.958 152.625 102.685 149.493 103.679 146.437C104.674 143.382 105.783 140.403 107.007 137.5H64.0933V155.833ZM64.0933 119.167H120.088C124.983 114.583 130.453 110.764 136.496 107.708C142.539 104.653 149.003 102.59 155.887 101.521V100.833H64.0933V119.167ZM64.0933 82.5H155.887V64.1667H64.0933V82.5ZM165.067 210.833C152.369 210.833 141.544 206.365 132.595 197.427C123.645 188.49 119.17 177.681 119.17 165C119.17 152.319 123.645 141.51 132.595 132.573C141.544 123.635 152.369 119.167 165.067 119.167C177.765 119.167 188.589 123.635 197.539 132.573C206.489 141.51 210.964 152.319 210.964 165C210.964 177.681 206.489 188.49 197.539 197.427C188.589 206.365 177.765 210.833 165.067 210.833ZM160.477 192.5H169.656V169.583H192.605V160.417H169.656V137.5H160.477V160.417H137.528V169.583H160.477V192.5Z" fill="#031B96"/>
                            </g>
                        </svg>
                    </div>

                </div>
                <div class="relative p-2 rounded-lg border border-blue-200 bg-white w-2/6">
                    <h2 class="absolute p-3 rounded-full border border-blue-200 text-center">3</h2>
                    <div class="flex flex-col gap-2 items-center justify-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 220 220"
                             fill="none">
                            <mask id="mask0_62_218" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="220" height="220">
                                <rect width="220" height="220" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_62_218)">
                                <path d="M18.863 192.5V174.167H202.451V192.5H18.863ZM28.0424 165V100.833H55.5806V165H28.0424ZM73.9394 165V55H101.478V165H73.9394ZM119.836 165V82.5H147.375V165H119.836ZM165.733 165V27.5H193.272V165H165.733Z" fill="#031B96"/>
                            </g>
                        </svg>
                        <span class="font-bold text-left text-3xl">Creating your
                            <br/>personal account
                            </br>is easy and free.</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-gray-400 text-2xl font-md">Testimonials</h3>
            <h2 class="text-4xl font-bold">What our users say about us</h2>

            <div class="flex flex-rol gap-4 p-4 mt-4">
                <div class="relative p-6 rounded-lg border border-blue-200 bg-white w-2/6">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="h-10 w-10 text-white absolute bg-black p-2 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>

                    <div class="flex flex-col gap-2 items-center justify-center p-4 mt-12">
                        <span class="text-xl font-md">
                            Smooth Navigation and
                             clean interface made my
                             experience enjoyable
                        </span>
                        <span class="text-lg font-bold text-center">Kwabs Frank</span>
                    </div>
                </div>
                <div class="relative p-6 rounded-lg border border-blue-200 bg-white w-2/6">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="h-10 w-10 text-white absolute bg-black p-2 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>

                    <div class="flex flex-col gap-2 items-center justify-center p-4 mt-12">
                        <span class="text-xl font-md">
                            Excellent reports generation, I was able to gain insights into my spending like never befor
                        </span>
                        <span class="text-lg font-bold text-center">Kwame Nkrumah</span>
                    </div>
                </div>
                <div class="relative p-6 rounded-lg border border-blue-200 bg-white w-2/6">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="h-10 w-10 text-white absolute bg-black p-2 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>

                    <div class="flex flex-col gap-2 items-center justify-center p-4 mt-12">
                        <span class="text-xl font-md">
                            This is an app, I can trust to help me make excellent financial decisions. I love this
                            app. Chale 5 stars!
                        </span>
                        <span class="text-lg font-bold text-center">King Promise</span>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-layout>
