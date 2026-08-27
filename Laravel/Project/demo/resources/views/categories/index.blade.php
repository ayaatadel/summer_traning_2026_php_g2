<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | {{ config('app.name') }}</title>
    <x-bootstrap-Css></x-bootstrap-Css>
    <style>
        body {
            background: #f5f4ef;
            color: #17231f;
        }

        .page-wrap {
            max-width: 1240px;
            margin: auto;
            padding: 48px 24px;
        }

        .page-kicker {
            color: #e68167;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .page-title {
            font-family: Georgia, serif;
            font-size: clamp(2.4rem, 5vw, 4rem);
            margin: .45rem 0 .3rem;
        }

        .page-copy {
            color: #6d7974;
        }

        .table-card {
            background: #fff;
            border: 1px solid #dfe3dc;
            padding: 1.5rem;
        }

        .table thead th {
            color: #6d7974;
            font-size: .7rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            border-bottom-width: 1px;
        }

        .table td {
            padding: 1rem .75rem;
            border-color: #edf0eb;
            vertical-align: middle;
        }

        .category-mark {
            width: 38px;
            height: 38px;
            display: inline-grid;
            place-items: center;
            background: #c9e8d5;
            color: #17231f;
            font-weight: 700;
        }

        .category-name {
            font-weight: 600;
        }

        .category-description {
            color: #6d7974;
            max-width: 430px;
        }

        .action-btn {
            min-width: 68px;
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <main class="page-wrap">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div><span class="page-kicker">Catalog / Organization</span>
                <h1 class="page-title">Categories</h1>
                <p class="page-copy mb-0">Keep your product catalog easy to browse and maintain.</p>
            </div><a class="btn btn-dark rounded-0 px-4" href="{{ route('categories.create') }}">+ Add category</a>
        </div>
        <section class="table-card table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>@forelse($categories as $category)<tr>
                        <td class="text-secondary">{{ $category->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3"><span class="category-mark">{{
                                    strtoupper(substr($category->name, 0, 1)) }}</span><span class="category-name">{{
                                    $category->name }}</span></div>
                        </td>
                        <td class="category-description">{{ $category->description }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2"><a
                                    class="btn btn-sm btn-outline-dark action-btn"
                                    href="{{ route('categories.show', $category->id) }}">View</a><a
                                    class="btn btn-sm btn-outline-secondary action-btn"
                                    href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">@csrf
                                    @method('delete')<button class="btn btn-sm btn-outline-danger action-btn"
                                        type="submit">Delete</button></form>
                            </div>
                        </td>
                    </tr>@empty<tr>
                        <td colspan="4" class="text-center text-secondary py-5">No categories found.</td>
                    </tr>@endforelse</tbody>
            </table>
        </section>
    </main>
    <x-bootstrap-js></x-bootstrap-js>
</body>

</html>