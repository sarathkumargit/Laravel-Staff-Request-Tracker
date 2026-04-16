<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">Requests</h2>

        {{-- Create Button --}}
        <button onclick="toggleForm()" 
            class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
            Create Request
        </button>

        {{-- Request Form --}}
        <div id="requestForm" class="mb-6">
            <form method="POST" action="{{ route('requests.store') }}" class="space-y-4">
                @csrf

                <input type="text" name="title" placeholder="Title"
                    class="w-full border p-2 rounded" required>

                <textarea name="description" placeholder="Description"
                    class="w-full border p-2 rounded" rows="4"></textarea>

                <select name="priority" class="w-full border p-2 rounded">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    Submit Request
                </button>
            </form>
        </div>

        {{-- Requests List --}}
        <div class="mt-6">
            @if($requests->isEmpty())
                <div class="p-6 bg-blue-50 border border-blue-200 text-blue-900 rounded">
                    No requests have been created yet.
                </div>
            @else
                @foreach($requests as $req)
                    <div class="border p-3 mb-2 rounded shadow-sm">
                        <h3 class="font-semibold">{{ $req->title }}</h3>
                        <p>{{ $req->description }}</p>
                        <p class="text-sm text-gray-600">Status: {{ $req->status }}</p>
                        <p class="text-sm text-gray-600">Priority: {{ $req->priority }}</p>
                    </div>
                @endforeach
            @endif
        </div>

    </div>

    {{-- Toggle Script --}}
    <script>
        function toggleForm() {
            let form = document.getElementById('requestForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</x-app-layout>