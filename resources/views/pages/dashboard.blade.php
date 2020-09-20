
<style type="text/css">
    .button-style{
        pointer-events: none;
    }
    .button-style,
    .btn{
        width: 100px;
    }
</style>
@extends('layouts.default')
@section('content')
                            <div class="row" style="margin-left: 20px;">
                                <div class="card">
                                    <h5 class="card-header">Complain information</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table"  style="width: 600px; min-width: 100%;">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">subjek</th>
                                                        <th class="border-0">date</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                    @foreach($items as $items)
                                                    <tr>
                                                        <td>{{$items->id}}</td>
                                                        <td>{{$items->sub}}</td>
                                                        <td>{{$items->date}}</td>
                                                       <td >{{-- class="btn btn-success btn-block" --}}
                                                        <div class="button-style">
                                                            @if($items->status == 'pending')
                                                                <div class="btn btn-info" role="alert">
                                                            @elseif($items->status == 'success')
                                                                <div class="btn btn-success" role="alert">
                                                            @elseif($items->status == 'failed')
                                                                <div class="btn btn-danger" role="alert">
                                                            @else
                                                                <div class="btn btn-danger" role="alert">
                                                            @endif
                                                                {{$items->status}}
                                                                </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="card" style="margin-left:60px;">
                                    <h5 class="card-header"> infofrmation status</h5>
                                    <div class="card-body">
                                        <div class="ct-chart-category ct-golden-section" style="height: 315px;"></div>
                                        <div class="text-center m-t-40">
                                            <span class="legend-item mr-3">
                                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">success : {{$pie['success']}}</span>
                                            </span>
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">failed : {{$pie['failed']}}</span>
                                            </span>
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">pending : {{$pie['pending']}}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
    <script src="{{asset('assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <script>
      var chart = new Chartist.Pie('.ct-chart-category', {
        series: [{{$pie['success']}}, {{$pie['failed']}}, {{$pie['pending']}}],
        labels: ['Bananas', 'Apples', 'Grapes']
    }, {
        donut: true,
        showLabel: false,
        donutWidth: 40

    });


    chart.on('draw', function(data) {
        if (data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();

            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            // Create animation definition while also assigning an ID to the animation for later sync usage
            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1000,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                    fill: 'freeze'
                }
            };

            // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            // We can't use guided mode as the animations need to rely on setting begin manually
            // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
            data.element.animate(animationDefinition, false);
        }
    });
    
</script>
@endsection