<div>
    <section>
        <h1>
            {{$welcome}}
        </h1>
        @if (session()->has('message'))
            <h3>{{session('message')}}</h3>
        @endif
        <livewire:task />
    </section>
</div>
