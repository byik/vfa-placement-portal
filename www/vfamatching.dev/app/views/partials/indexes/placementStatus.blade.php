<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>@include('partials.links.opportunity', array('opportunity' => $placementStatus->opportunity))</h3>
        </div>
        <div class="panel-body">
            <div class="row">
            <div class="col-xs-4">
                <div class="placementStatus-pie-chart">
                    @include('partials.charts.placementStatus-percent', array('placementStatus' => $placementStatus))
                </div>
            </div>
            <div class="col-xs-8">
                <h4>@include('partials.links.company', array('company' => $placementStatus->opportunity->company))</h4>
                <h4><em><small><strong>{{ $placementStatus->printWithDate() }}</strong></small></em></h4>
                <!-- Button trigger modal -->
                <a data-toggle="modal" href="#placementStatus-update-modal-{{ $placementStatus->id }}" class="btn
                btn-primary btn-large modal-btn form-control update-button">Update</a>
                <a data-toggle="modal" href="#placementStatus-history-modal-{{ $placementStatus->id }}" class="btn
                btn-primary btn-large modal-btn form-control">History</a>    
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal" id="placementStatus-update-modal-{{ $placementStatus->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="btn close btn-default" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Update Placement Progress: {{ $placementStatus->opportunity->title }}</h4>
            </div>
            <div class="modal-body">
                {{-- This Form POST's to /placementstatus. Data is autofilled from PlacementStatus model in $placementStatus --}}
                @include('partials.forms.placementStatus', array('placementStatus' => $placementStatus))
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <a href="" class="btn btn-primary placementStatus-submit">Update Placement Status and Submit Feedback</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Status History Modal -->
<div class="modal" id="placementStatus-history-modal-{{ $placementStatus->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="btn close btn-default" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Placement Status History: {{ $placementStatus->opportunity->title }}</h4>
            </div>
            <div class="modal-body">
                @foreach($placementStatus->history() as $oldPlacementStatus)

                @endforeach
                <div>{{ $placementStatus->fellow_id }}: {{ $placementStatus->opportunity_id }}</div>
                TODO: ADD STATUS HISTORY
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
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
    $('.placementStatus-submit').unbind().click(function(e){
        $(this).parent().parent().find('.placementStatus-form').submit();
        e.preventDefault();//don't follow the actual link
    });
    //register dropdown toggle to make datepicker appear on certain statuses
    $('.placementStatus-select').change(function(){
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