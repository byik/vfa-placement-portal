<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>@include('partials.links.opportunity', array('opportunity' => $placementStatus->opportunity))</h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-4 hidden-xs">
                <div class="placement-status-pie-chart">
                    @include('partials.charts.placement-status-percent', array('placementStatus' => $placementStatus))
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <h3><small>
                    @include('partials.links.company', array('company' => $placementStatus->opportunity->company))
                </small></h3>
                <h4><small>{{ $placementStatus->printWithDate() }}</small></h4>
                
                <!-- TODO:
                    Link opportunity title to opportunity page
                    Add company name
                    Link company name to company page
                -->
                <!-- Button trigger modal -->
                <a data-toggle="modal" href="#placementStatus-update-modal-{{ $placementStatus->id }}" class="btn
            btn-primary btn-large modal-btn form-control">Update</a>    
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="placementStatus-update-modal-{{ $placementStatus->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="btn close btn-default" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Update Placement Progress: {{ $placementStatus->opportunity->title }}</h4>
            </div>
            <div class="modal-body">
                {{-- This Form POST's to /placementstatus. Data is autofilled from PlacementStatus model in $placementStatus --}}
                {{ Form::open(array('route' => array('placementstatuses.store'), 'id'=>'placement-status-'.$placementStatus->id,'class'=>'placement-status-form')) }}
                    <fieldset>
                        {{ Form::hidden('fellow_id', $placementStatus->fellow_id) }}
                        {{ Form::hidden('opportunity_id', $placementStatus->opportunity_id) }}
                        <div class="form-group">
                            {{ Form::label('status', 'Status:') }}
                            {{ Form::select('status', array_combine(PlacementStatus::statuses(), PlacementStatus::statuses()), $placementStatus->status, array('class'=>'form-control placement-status-select')) }}
                        </div>
                        <div class="form-group">                        
                            {{ Form::label('score', 'Score:') }}
                            <ul class="list-unstyled">
                                <li>5 = I would absolutely love to work here</li>
                                <li>3 = This would be a decent fit for me</li>
                                <li>1 = I would work here only as a last resort</li>
                            </ul>
                            {{ Form::select('score', array_combine(PlacementStatus::scores(),PlacementStatus::scores()), 3, array('class'=>'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('message', 'Any comments?') }}
                            {{ Form::textarea('message', null, array('class'=>'form-control')) }}
                        </div>
                    </fieldset>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <a href="" class="btn btn-primary placement-status-submit">Update Placement Status</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- TODO
    Add Javascript validation to modal input so users don't have to submit to know their input is invalid
 -->
<script type="text/javascript">
$(document).ready(function() {  
    //unbind so the click only fires once
    $('.placement-status-submit').unbind().click(function(e){
        $(this).parent().parent().find('.placement-status-form').submit();
        e.preventDefault();//don't follow the actual link
    });
    //register dropdown toggle to make datepicker appear on certain statuses
    $('.placement-status-select').unbind().change(function(){
        //remove the old one, if exists
        $('#datepicker').remove();
        if(this.value == "{{ PlacementStatus::statuses()[2] }}" ||
                this.value == "{{ PlacementStatus::statuses()[4] }}"){ //Phone Interview Pending or On-site Interview Pending
            $(this).parent().after('<div class="form-group row" id="datepicker"><div class="col-xs-8"><label class="control-label">Interview Date</label><div class="input-group date datepicker" data-date="12-02-2012" data-date-format="mm-dd-yyyy"><input name="eventDate" class="form-control" type="text" readonly="" value="12-02-2012"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div></div></div>');
        } else if(this.value == "{{ PlacementStatus::statuses()[6] }}"){ //Offer Accepted
            $(this).parent().after('<div class="form-group row" id="datepicker"><div class="col-xs-8"><label class="control-label">Acceptance Deadline</label><div class="input-group date datepicker" data-date="12-02-2012" data-date-format="mm-dd-yyyy"><input name="eventDate" class="form-control" type="text" readonly="" value="12-02-2012"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div></div></div>');
        }

        // adding todays date as the value to the datepickers.
        var d = new Date();
        var curr_day = d.getDate();
        var curr_month = d.getMonth() + 1; //Months are zero based
        var curr_year = d.getFullYear();
        var eutoday = curr_day + "-" + curr_month + "-" + curr_year;
        var ustoday = curr_month + "-" + curr_day + "-" + curr_year;
        $("div.datepicker input").attr('value', eutoday);
        $("div.usdatepicker input").attr('value', ustoday);
        $('.datepicker').datepicker({
            autoclose: true,
            startDate: new Date()
        });
        
    });
});
</script>