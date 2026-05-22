@props(['univ', 'categories', 'univGrouped'])

@php
    $categoriesJson = json_encode($categories->values()->all());
@endphp

<div class="admin-card">
    <h3>Upload Partner Logo</h3>

    <form action="{{ route('admin.upload.university') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'univ-preview')">
        <div id="univ-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>

        <div class="combobox-wrapper">
            <input type="hidden" name="category" id="category-hidden">
            <input type="text" id="category-display" class="input" placeholder="Kategori (pilih atau ketik baru)" autocomplete="off">
            <div id="category-dropdown" class="combobox-dropdown" style="display:none;"></div>
        </div>

        <button type="submit" class="btn-primary">Upload Partner</button>
    </form>

    <h4>Partner Saat Ini:</h4>

    @forelse ($univGrouped as $categoryName => $items)
        <div class="partner-group">
            <div class="partner-group-title">{{ $categoryName }}</div>
            <div class="gallery-list">
                @foreach ($items as $university)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $university->filename) }}" alt="img">
                        <form action="{{ route('admin.delete.university', $university->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p style="color:var(--text-muted);font-size:0.88rem;">Belum ada partner logo.</p>
    @endforelse
</div>

<script>
(function () {
    const categories = {!! $categoriesJson !!};
    const display    = document.getElementById('category-display');
    const hidden     = document.getElementById('category-hidden');
    const dropdown   = document.getElementById('category-dropdown');

    function renderOptions(query) {
        const q       = query.trim().toLowerCase();
        const matches = categories.filter(c => c.toLowerCase().includes(q));

        dropdown.innerHTML = '';

        if (matches.length === 0 && q === '') {
            const empty = document.createElement('div');
            empty.className = 'combobox-option combobox-option--empty';
            empty.textContent = 'Belum ada kategori tersimpan';
            dropdown.appendChild(empty);
        } else {
            matches.forEach(cat => {
                const opt = document.createElement('div');
                opt.className = 'combobox-option';
                opt.textContent = cat;
                opt.addEventListener('mousedown', (e) => {
                    e.preventDefault();
                    display.value = cat;
                    hidden.value  = cat;
                    closeDropdown();
                });
                dropdown.appendChild(opt);
            });
        }

        const exactMatch = categories.some(c => c.toLowerCase() === q);
        if (q !== '' && !exactMatch) {
            const addOpt = document.createElement('div');
            addOpt.className = 'combobox-option combobox-option--new';
            addOpt.textContent = 'Tambah: ' + query.trim();
            addOpt.addEventListener('mousedown', (e) => {
                e.preventDefault();
                display.value = query.trim();
                hidden.value  = query.trim();
                closeDropdown();
            });
            dropdown.appendChild(addOpt);
        }
    }

    function openDropdown() {
        renderOptions(display.value);
        dropdown.style.display = 'block';
    }

    function closeDropdown() {
        dropdown.style.display = 'none';
    }

    display.addEventListener('focus', openDropdown);

    display.addEventListener('input', function () {
        hidden.value = display.value.trim();
        renderOptions(display.value);
        dropdown.style.display = 'block';
    });

    display.addEventListener('blur', function () {
        setTimeout(closeDropdown, 150);
    });

    display.addEventListener('change', function () {
        if (display.value.trim() === '') {
            hidden.value = '';
        }
    });
})();
</script>
