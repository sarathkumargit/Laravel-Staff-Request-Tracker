<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">Requests</h2>

        {{-- Create Button --}}
        <button onclick="toggleForm()" 
            class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
            Create Request
        </button>

        {{-- Request Form --}}
        <div id="requestForm" style="display: none;" class="mb-6">
            <form method="POST" action="{{ route('requests.store') }}">
                @csrf

                <input type="text" name="title" placeholder="Title"
                    class="w-full border p-2 mb-3 rounded" required>

                <textarea name="description" placeholder="Description"
                    class="w-full border p-2 mb-3 rounded"></textarea>

                <select name="priority" class="w-full border p-2 mb-3 rounded">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                    Submit
                </button>
            </form>
        </div>

        {{-- Requests List --}}
        <div class="mt-6">

            @if($requests->isEmpty())
                <p>No requests found.</p>
            @else

                @foreach($requests as $req)
                    <div class="border p-3 mb-3 rounded">

                        <h3 class="font-semibold">{{ $req->title }}</h3>
                        <p>{{ $req->description }}</p>

                        <p>Status: {{ $req->status }}</p>
                        <p>Priority: {{ $req->priority }}</p>

                        {{-- ADMIN ONLY --}}
                        @if(auth()->user()->role === 'admin')

                            {{-- UPDATE STATUS --}}
                            <form method="POST" action="{{ route('requests.update', $req->id) }}">
    @csrf
    @method('PATCH')

    <select name="status" onchange="this.form.submit()">
        <option value="new" {{ $req->status=='new' ? 'selected' : '' }}>New</option>
        <option value="in_progress" {{ $req->status=='in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="done" {{ $req->status=='done' ? 'selected' : '' }}>Done</option>
    </select>
</form>

                            {{-- DELETE --}}
                           <form method="POST" action="{{ route('requests.destroy', $req->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="bg-red-500 text-white px-2 py-1 mt-2 rounded">
        Delete
    </button>
</form>
                        @endif

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