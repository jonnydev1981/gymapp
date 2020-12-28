<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="row justify-content-center">
                        @isset($distancestats)
                        <div class="card" style="width: 22rem;">
                            <div class="card-body">
                              <h5 class="card-title">Distance</h5>
                              <div class="card-text">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Exercise</th>
                                        <th scope="col">Distance (KM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($distancestats as $distancestat)
                                        <tr>
                                            <th scope="row">{{ $distancestat->exercise->name }}</th>
                                            <td>{{ $distancestat->distance }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                              </div>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endisset
                
                        @isset($timestats)
                        <div class="card" style="width: 22rem;">
                            <div class="card-body">
                                <h5 class="card-title">Time</h5>
                                <div class="card-text">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Exercise</th>
                                            <th scope="col">Time (Seconds)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($timestats as $timestat)
                                            <tr>
                                                <th scope="row">{{ $timestat->exercise->name }}</th>
                                                <td>{{ $timestat->time }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endisset
                
                        @isset($weightstats)
                        <div class="card" style="width: 22rem;">
                            <div class="card-body">
                                <h5 class="card-title">Weight 1RM</h5>
                                <div class="card-text">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Exercise</th>
                                            <th scope="col">Weight (KG)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($weightstats as $weightstat)
                                            <tr>
                                                <th scope="row">{{ $weightstat->exercise->name }}</th>
                                                <td>{{ $weightstat->weight }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endisset
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
