<div class="">
    <div class="d-flex align-items-center">
        <form action="" method="GET" class="flex-grow-1 ">
            <label for="search" class="sr-only">Search</label>
            <div class="input-group">
                <input
                    style="border: 2px solid #000;border-radius: 50px;width: 100%;box-sizing: border-box;transition: border 0.3s;background-color: transparent;color: #000;padding: 10px;height: 40px;"
                    type="text"
                    id="search"
                    name="query"
                    class="form-control search-input"
                    placeholder="Search..."
                />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" style="display:none;">Search</button>
                </div>
            </div>
        </form>
        <button
            type="button"
            class="btn header-item waves-effect mr-2"
            data-toggle="modal"
            data-target="#createCustomerModal"
            style="background-color: #000; color: #fff; border-radius: 50px; height: 40px;margin-left: 10px">
            {{$title}}
        </button>
    </div>
</div>
