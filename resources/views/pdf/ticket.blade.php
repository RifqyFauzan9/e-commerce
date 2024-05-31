<style>
    @page {
        size: 10cm 30cm landscape;
    }

    h1 {
        text-transform: uppercase;
        font-size: 4rem;
        margin-top: -1rem;
        text-shadow: 2px 2px 5px red;
    }

    h2 {
        margin-top: -2rem;
        text-transform: uppercase;
        letter-spacing: 5px;
    }

    .waktu {
        border: 1px solid yellow;
        display: inline;
        padding: 2px;
    }
</style>
@foreach ($transaction->transactionDetails as $detail)
    <div style="padding: 5px; font-family: Arial, Helvetica, sans-serif; page-break-before: always;  display: block;">
        <div style="float: left">
            <h1>{{ $event->name }}</h1>
            <h2>{{ $detail->ticket->name }}</h2>
            <div class="waktu">{{ $event->start_time->format('d M, Y') }}</div>
            {{-- <div>{{ $event->duration }} hour(s)</div> --}}
            <div style="margin-top: 2px;">{{ $event->location }}</div>
            <div style="margin-top: 10px; font-size: 28px; font-family: monospace">{{ $detail->code }}</div>
        </div>
@endforeach
</div>
