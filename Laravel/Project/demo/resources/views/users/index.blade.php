<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | {{ config('app.name') }}</title>
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
            max-width: 540px;
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
            vertical-align: middle;
            border-color: #edf0eb;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            display: inline-grid;
            place-items: center;
            background: #253c52;
            color: #fff;
            font-weight: 700;
        }

        .user-name {
            font-weight: 600;
        }

        .user-email {
            color: #6d7974;
            font-size: .82rem;
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
            <div><span class="page-kicker">People / Directory</span>
                <h1 class="page-title">All users</h1>
                <p class="page-copy mb-0">Manage the people who keep your store moving.</p>
            </div><span class="badge text-bg-dark rounded-0 px-3 py-2">{{ $users->count() }} accounts</span>
        </div>
        <section class="table-card table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)<tr>
                        <td class="text-secondary">{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3"><span class="user-avatar">{{
                                    strtoupper(substr($user->name, 0, 1)) }}</span><span class="user-name">{{
                                    $user->name }}</span></div>
                        </td>
                        <td class="user-email">{{ $user->email }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2"><a
                                    class="btn btn-sm btn-outline-dark action-btn"
                                    href="{{ route('users.show', $user->id) }}">View</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">@method('delete')
                                    @csrf<button class="btn btn-sm btn-outline-danger action-btn"
                                        type="submit">Delete</button></form>
                            </div>
                        </td>
                    </tr>@empty<tr>
                        <td colspan="4" class="text-center text-secondary py-5">No users found.</td>
                    </tr>@endforelse
                </tbody>
            </table>
        </section>
    </main>
    <x-bootstrap-js></x-bootstrap-js>
</body>

</html>