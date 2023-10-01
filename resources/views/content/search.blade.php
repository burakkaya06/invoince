<div class="col-12 mb-2">
    <form action="{{ $url }}" method="GET" class="mb-2">
        <label for="search"></label>
        <input
            style="
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            transition: border 0.3s;
            background-repeat: no-repeat;
            background-position: 10px center;
            padding: 10px 10px 10px;
        "
            type="text"
            id="search"
            name="query"
            class="search-input"
            placeholder="Search..."
            required
        />
        <button type="submit" style="display:none;"></button>
    </form>
</div>
