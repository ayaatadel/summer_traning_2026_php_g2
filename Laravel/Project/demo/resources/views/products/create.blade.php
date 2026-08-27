<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | {{ config('app.name') }}</title>
    <x-bootstrap-Css></x-bootstrap-Css>
    <style>
        body {
            background: #f5f4ef;
            color: #17231f
        }

        .form-wrap {
            max-width: 850px;
            margin: auto;
            padding: 48px 24px
        }

        .form-card {
            background: #fff;
            border: 1px solid #dfe3dc;
            padding: clamp(1.5rem, 4vw, 3rem)
        }

        .form-title {
            font-family: Georgia, serif;
            font-size: clamp(2.2rem, 5vw, 3.8rem)
        }

        .form-copy,
        .form-label {
            color: #6d7974
        }

        .form-control,
        .form-select {
            border-radius: 0;
            border-color: #dfe3dc;
            padding: .75rem
        }

        .btn {
            border-radius: 0
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <main class="form-wrap">
        <section class="form-card"><span class="text-uppercase fw-bold small"
                style="color:#e68167;letter-spacing:.14em">Catalog / New item</span>
            <h1 class="form-title mt-2">Add a product</h1>
            <p class="form-copy mb-4">Give your team a clear, useful record for every item in stock.</p>
            <form action="{{ route('products.store') }}" method="post">@csrf<div class="row g-3">
                    <div class="col-md-8"><label class="form-label" for="name">Product name</label><input
                            class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}" required>@error('name')<div class="invalid-feedback">{{ $message
                            }}</div>@enderror</div>
                    <div class="col-md-4"><label class="form-label" for="category_id">Category</label><select
                            class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id" required>
                            <option value="">Choose...</option>@foreach($categories as $category)<option
                                value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{
                                $category->name }}</option>@endforeach
                        </select>@error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    <div class="col-md-6"><label class="form-label" for="price">Price</label><input
                            class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            type="number" step="0.01" min="0" value="{{ old('price') }}" required>@error('price')<div
                            class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    <div class="col-md-6"><label class="form-label" for="quantity">Quantity</label><input
                            class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
                            type="number" min="0" value="{{ old('quantity', 0) }}" required>@error('quantity')<div
                            class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    <div class="col-12"><label class="form-label" for="description">Description</label><textarea
                            class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" rows="4">{{ old('description') }}</textarea>@error('description')<div
                            class="invalid-feedback">{{ $message }}</div>@enderror</div>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-4"><a class="btn btn-outline-secondary px-4"
                        href="{{ route('dashboard') }}">Cancel</a><button class="btn btn-dark px-4" type="submit">Save
                        product</button></div>
            </form>
        </section>
    </main>
    <x-bootstrap-js></x-bootstrap-js>
</body>

</html>