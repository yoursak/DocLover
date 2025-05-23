@extends('sw.layout.master')

@section('title', 'CraftMyDoc - PDF to Word')

@section('meta_description', 'Convert any PDF to a Word (.docx) file easily with CraftMyDoc.')
@section('meta_keywords', 'PDF to Word, PDF converter, Word file, PDF to DOCX')

@section('content')
    <section class="pt-12 px-4 bg-gray-50">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-gray-800">Convert PDF to Word Instantly</h2>
            <p class="text-lg text-gray-600 mt-3">Upload your PDF and download a .docx file instantly.</p>
        </div>
    </section>

    <section class="py-10 px-4">
        <div
            class="flex flex-col sm:flex-row sm:justify-center sm:space-x-8 space-y-4 sm:space-y-0 bg-indigo-50 rounded-2xl p-6 max-w-2xl mx-auto mb-8 shadow">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 flex items-center justify-center bg-indigo-700 text-white rounded-full font-bold">1
                </div>
                <span class="text-gray-800 font-semibold">Upload PDF</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 flex items-center justify-center bg-indigo-700 text-white rounded-full font-bold">2
                </div>
                <span class="text-gray-800 font-semibold">Convert to Word</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 flex items-center justify-center bg-indigo-700 text-white rounded-full font-bold">3
                </div>
                <span class="text-gray-800 font-semibold">Download Word File</span>
            </div>
        </div>

        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-10 max-w-3xl mx-auto text-center bg-white shadow-md"
            id="uploadSection">
            <p class="text-lg font-medium mb-4">Drop your PDF file here <span class="text-gray-500">or</span></p>
            <label
                class="inline-flex items-center bg-indigo-700 text-white font-semibold px-6 py-3 rounded-md cursor-pointer hover:bg-indigo-800">
                <i class="fas fa-upload mr-2"></i>
                Upload PDF
                <input type="file" id="pdfInput" class="hidden" accept=".pdf" onchange="previewPDF(event)" />
            </label>
            <p class="text-sm text-gray-500 mt-4">Max file size: 25MB. Only PDF supported.</p>
        </div>

        <div id="convertSection" class="mt-8 max-w-3xl mx-auto text-center">
            <button id="convertBtn"
                class="bg-gray-800 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:bg-green-700 hidden"
                onclick="convertPDFtoWord()">
                <i class="fas fa-file-word mr-2"></i>
                Convert to Word
            </button>
        </div>

        <div id="downloadSection"
            class="hidden mt-8 max-w-3xl mx-auto text-center bg-white shadow-lg rounded-2xl p-6 border border-gray-200">

            <div class="flex flex-col items-center">
                <div class="w-16 h-16 flex items-center justify-center bg-green-100 text-green-600 rounded-full mb-4">
                    <i class="fas fa-check-circle text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Conversion Successful!</h3>
                <p class="text-gray-600 mt-2">Your Word (.docx) file is ready for download.</p>
                <div class="flex flex-wrap justify-center mt-6 space-x-4">
                    <button id="downloadBtn"
                        class="mt-4 bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700"
                        onclick="downloadWord()">
                        <i class="fas fa-download mr-2"></i>
                        Download Word
                    </button>
                    <button id="convertAgainBtn"
                        class="mt-4 bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg hover:bg-gray-800"
                        onclick="convertAgain()">
                        <i class="fas fa-sync-alt mr-2"></i>
                        Convert Again
                    </button>
                </div>
            </div>
        </div>


        <!-- Loader (hidden by default) -->
        <div id="loaderSection" class="hidden fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50">
            <div class="text-center">
                <div class="w-16 h-16 border-4 border-blue-500 border-dashed rounded-full animate-spin mx-auto mb-4"></div>
                <p class="text-gray-700 font-semibold text-lg">Converting PDF to Doc, please wait...</p>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-18 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                @foreach ([['⚡', 'Quick Conversion', 'Upload your PDF and get a DOC file instantly.'], ['🔐', 'Secure & Private', 'Files are encrypted and never stored.'], ['📱', 'Any Device, Anywhere', 'Works seamlessly on desktop, tablet, and mobile.']] as $feature)
                    <div class="p-6 rounded-lg">
                        <div class="text-4xl">{{ $feature[0] }}</div>
                        <h3 class="text-xl font-bold text-gray-900 mt-4">{{ $feature[1] }}</h3>
                        <p class="text-gray-600 mt-2">{{ $feature[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How to Convert -->
    <section class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-4">How to Convert PDF to DOC</h2>
            <p class="text-lg text-gray-600 mb-8">Just follow these simple steps to convert your PDF into an editable Word
                document.</p>
            <div class="text-left max-w-2xl mx-auto">
                <ol class="space-y-6 list-none">
                    @foreach ([['Upload your PDF file', 'Drag & drop or click to browse and upload.'], ['Start conversion', 'Click the convert button to convert your PDF to DOC.'], ['Download the DOC file', 'Your editable Word document will be ready to download.']] as $index => $step)
                        <li class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 text-white font-bold rounded-full">
                                {{ $index + 1 }}
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $step[0] }}</h3>
                                <p class="text-gray-600">{{ $step[1] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    <!-- FAQs --> @include('ads.ad1')
    <section class="py-12 bg-gray-100">
        <div class="bg-white p-6 md:p-12">
            <div class="text-center mb-8">
                <h2 class="text-xl font-semibold text-gray-800">Rate this tool</h2>
                <div class="flex items-center justify-center mt-2 space-x-1 text-yellow-500">
                    <i class="fas fa-star text-yellow-500"></i>
                    <i class="fas fa-star text-yellow-500"></i>
                    <i class="fas fa-star text-yellow-500"></i>
                    <i class="fas fa-star text-yellow-500"></i>
                    <i class="fas fa-star text-yellow-500"></i>
                    <span class="text-gray-700 ml-2 font-medium">4.8 / 5 - 150,000+ users</span>
                </div>
            </div>

            @include('sw.components.tools')
        </div>
    </section>


    <script>
        let docBlobUrl = null;
        let convertedFileName = "converted-word-file.docx";

        function previewPDF(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById("convertBtn").classList.remove("hidden");
            }
        }

        function convertPDFtoWord() {
            const fileInput = document.getElementById('pdfInput');
            if (fileInput.files.length === 0) {
                alert("Please upload a PDF file first.");
                return;
            }

            // Show loader
            document.getElementById("loaderSection").classList.remove("hidden");

            const pdfFile = fileInput.files[0];
            const formData = new FormData();
            formData.append('pdf_file', pdfFile);

            document.getElementById("convertBtn").innerText = "Processing...";
            document.getElementById("convertBtn").disabled = true;

            fetch("{{ route('convert.convertPDFtoWord') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw new Error("Conversion failed");
                    return response.blob();
                })
                .then(blob => {
                    docBlobUrl = URL.createObjectURL(blob);

                    setTimeout(() => {
                        document.getElementById("downloadSection").classList.remove("hidden");
                        document.getElementById("uploadSection").classList.add("hidden");
                        document.getElementById("convertBtn").classList.add("hidden");
                        document.getElementById("loaderSection").classList.add("hidden"); // Hide loader
                    }, 2000); // Smooth scroll to download section
                })
                .catch(error => {
                    alert("Error during conversion. Please try again.");
                    console.error(error);
                    document.getElementById("loaderSection").classList.add("hidden"); // Hide loader
                    document.getElementById("convertBtn").innerText = "Convert to Word";
                    document.getElementById("convertBtn").disabled = false;
                });
        }

        function downloadWord() {
            if (docBlobUrl) {
                const fileInput = document.getElementById("pdfInput");
                let fileName = "pdf-to-word";
                if (fileInput.files.length > 0) {
                    fileName = fileInput.files[0].name.replace(/\.[^/.]+$/, "").replace(/\s+/g, "_");
                }

                const link = document.createElement('a');
                link.href = docBlobUrl;
                link.download = `${fileName}.docx`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(docBlobUrl);
            }
        }

        function convertAgain() {
            location.reload();
        }
    </script>

@endsection
