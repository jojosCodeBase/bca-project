@extends('layouts.support')
@section('title', 'Tickets')
@section('breadcrumb', 'Tickets')
@section('content')
    <style>
        /* Custom CSS for additional control if needed */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on touch devices */
        }
    </style>
    <div class="container-fluid scroll-main p-lx-3 p-lg-3 p-md-3 pt-3">
        <main class="content">
            <div class="bg-light mt-2" style="margin-bottom: 7.5rem">
                <div class="row p-3 mt-3">
                    <div class="mb-1">
                        <h5>{{ $label }} Tickets</h5>
                    </div>

                    <div class="col">
                        <div class="table-responsive">
                            <div class="table-content">
                                <table class="table table-hover ">
                                    <thead>
                                        <th style="width: 70px;">ID</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr onclick="window.location='{{ route('support-ticket-view', ['id' => $ticket->id]) }}'"
                                                style="cursor:pointer;">
                                                <td>{{ $ticket->id }}</td>
                                                <td>{{ $ticket->user->name }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td>{{ $ticket->user->email }}</td>
                                                <td>
                                                    @if ($ticket->status === 0)
                                                        <span class="text-custom">Open</span>
                                                    @elseif($ticket->status === 1)
                                                        <span class="text-warning">In-progress</span>
                                                    @elseif($ticker->status === 2)
                                                        <span class="text-success">Resolved</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $uploaded->links() }} --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
